<?php

namespace App\Http\Controllers\Frontend;

// use session;
use Carbon\Carbon;

use App\Models\User;
use App\Models\Cupon;

use App\Models\Course;
use App\Models\Category;
use App\Models\WishList;

use App\Models\Course_goal;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\CourseLecture;
use App\Models\CourseSection;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManager;
use Gloudemans\Shoppingcart\Facades\Cart;
use Intervention\Image\Drivers\Gd\Driver;

class CartController extends Controller
{
    public function AddToCart(Request $request, $id){
        $course = Course::find($id);

        if (Session::has('cupon')) {
            Session::forget('cupon');
        }

        //check course is already in cart or not
        $cartItem = Cart::search(function ($cartItem, $rowId) use ($id){
            return $cartItem->id === $id;
        });

        if ($cartItem->isNotEmpty()) {
            return response()->json(['error'=> 'The course is already in your cart']);
        }

        if ($course->discount_price == Null) {
            Cart::add([
                'id' => $id,
                'name' => $request->course_name,
                'qty' => 1,
                'price' => $course->selling_price,
                'weight' => 1,
                'options' => [
                    'image' => $course->course_image,
                    'slug' => $request->course_name_slug,
                    'instructor_id' => $course->instructor_id,
                ],
            ]);
        }else{
             Cart::add([
                'id' => $id,
                'name' => $request->course_name,
                'qty' => 1,
                'price' => $course->discount_price,
                'weight' => 1,
                'options' => [
                    'image' => $course->course_image,
                    'slug' => $request->course_name_slug,
                    'instructor_id' => $course->instructor_id,
                ],
            ]);
        }

        return response()->json(['success'=> 'The course successfully added to your cart']);
    }//end method AddToCart

    public function CartData(){
        $carts = Cart::content();
        $cartTotal = Cart::total();
        $cartQty = Cart::count();


        return response()->json(array(
            'carts'=>$carts,
            'cartTotal'=>$cartTotal,
            'cartQty'=>$cartQty,
        ));
    }//end method CartData

    public function AddMiniCart(){
        $carts = Cart::content();
        $cartTotal = Cart::total();
        $cartQty = Cart::count();


        return response()->json(array(
            'carts'=>$carts,
            'cartTotal'=>$cartTotal,
            'cartQty'=>$cartQty,
        ));
    }//end method AddMiniCart



    public function RemoveMiniCart($rowId){
        Cart::remove($rowId);

        return response()->json(['success' => 'Successfully Course remove from cart']);
    }//rnd method ======= mini cart page =================



    public function MyCart(){
        return view('frontend.mycart.view_cart');
    }

    public function GetCartCourse(){
        $carts = Cart::content();
        $cartTotal = Cart::total();
        $cartQty = Cart::count();


        return response()->json(array(
            'carts'=>$carts,
            'cartTotal'=>$cartTotal,
            'cartQty'=>$cartQty,
        ));
    }//end method


    public function courseCartRemove($rowId){

        Cart::remove($rowId);

        if (Session::has('cupon')) {
            $cupon_name = Session::get('cupon')['cupon_name'];
            $cupon = Cupon::where('cupon_name',$cupon_name )->first();

            Session::put('cupon',[
                'cupon_name' => $cupon->cupon_name,
                'cupon_discount' => $cupon->cupon_discount,
                'cupon_validity' => round(Cart::total()* $cupon->cupon_discount/100),
                'total_amount' => round(Cart::total() - Cart::total() * $cupon->cupon_discount/100),
            ]);
        }

        return response()->json(['success' => 'Successfully Course remove from cart page']);
    }//rnd method ========== cart page =========






    // apply cupon code
    public function ApplyCupon(Request $request){
        $cupon = Cupon::where('cupon_name',$request->cupon_name)->where('cupon_validity','>=', Carbon::now()->format('Y-m-d'))->first();

        if ($cupon) {
            Session::put('cupon',[
                'cupon_name' => $cupon->cupon_name,
                'cupon_discount' => $cupon->cupon_discount,
                'cupon_validity' => round(Cart::total()* $cupon->cupon_discount/100),
                'total_amount' => round(Cart::total() - Cart::total() * $cupon->cupon_discount/100),
            ]);

            return response()->json(array(
                'validity' => true,
                'success' => 'cupon apply successfully',
            ));
        }else{
            return response()->json(['error' => 'cupon is invalid']);
        }
    }//end method

    // CuponCalculation

    public function CuponCalculation(){

        if(Session::has('cupon')){
            return response()->json(array(
                'subtotal' => Cart::total(),
                'cupon_name' => Session()->get('cupon')['cupon_name'],
                'cupon_discount' => Session()->get('cupon')['cupon_discount'],
                'cupon_validity' => Session()->get('cupon')['cupon_validity'],
                'total_amount' => Session()->get('cupon')['total_amount'],
            ));
        }else{
            return response()->json(array(
               'total' => Cart::total(),
            )); 
        }
    }//end function

    //start CuponRemove

    public function CuponRemove(){
        Session::forget('cupon');
        return response()->json(['success' => 'cupon remove successfully']);
    }// end section


    public function CheckoutCreate(){
        if(Auth::check()){
            if(Cart::total() > 0){
                $carts = Cart::content();
                $cartTotal = Cart::total();
                $cartQty = Cart::count();
                return view('frontend.checkout.checkout_view', compact('carts','cartTotal','cartQty'));
            }
            else{
                $notification = [
                    'message' => 'You need to add at list one course in your cart',
                    'alert-type' => 'error',
                ];
        
                return redirect()->to('/')->with($notification);
            }
        }else{
            $notification = [
                'message' => 'You need to login first',
                'alert-type' => 'error',
            ];
    
            return redirect()->route('login')->with($notification);
        }
    }

}
