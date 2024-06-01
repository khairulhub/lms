<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\User;

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
use Intervention\Image\ImageManager;
use Gloudemans\Shoppingcart\Facades\Cart;
use Intervention\Image\Drivers\Gd\Driver;

class CartController extends Controller
{
    public function AddToCart(Request $request, $id){
        $course = Course::find($id);

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

        return response()->json(['success' => 'Successfully Course remove from cart page']);
    }//rnd method ========== cart page =========


}
