<?php

namespace App\Http\Controllers\Frontend;

// use session;
use Carbon\Carbon;

use App\Models\User;
use App\Models\Cupon;

use App\Notifications\OrderComplete;
use Illuminate\Support\Facades\Notification;

use App\Models\Course;
use App\Models\Category;
use App\Models\WishList;
use App\Models\Payment;
use App\Models\Order;

use App\Models\Course_goal;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\CourseLecture;
use App\Models\CourseSection;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\ImageManager;

use App\Mail\Orderconfirm;
use Gloudemans\Shoppingcart\Facades\Cart;
use Intervention\Image\Drivers\Gd\Driver;

use Stripe;

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

    // public function InstructorApplyCupon(Request $request){
    //     $cupon = Cupon::where('cupon_name', $request->cupon_name)
    //                   ->where('cupon_validity', '>=', Carbon::now()->format('Y-m-d'))
    //                   ->first();
    
    //     if ($cupon) {
    //         if ($cupon->course_id == $request->course_id && $cupon->instructor_id == $request->instructor_id) {
    //             Session::put('cupon', [
    //                 'cupon_name' => $cupon->cupon_name,
    //                 'cupon_discount' => $cupon->cupon_discount,
    //                 'discount_amount' => round(Cart::total() * $cupon->cupon_discount / 100),
    //                 'total_amount' => round(Cart::total() - Cart::total() * $cupon->cupon_discount / 100),
    //             ]);
    
    //             return response()->json([
    //                 'validity' => true,
    //                 'success' => 'Cupon applied successfully',
    //             ]);
    //         } else {
    //             return response()->json(['error' => 'Cupon criteria not met for this course & instructor']);
    //         }
    //     } else {
    //         return response()->json(['error' => 'Invalid Cupon!']);
    //     }
    // }

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
    }//end menthod


    public function Payment(Request $request){
        $user = User::where('role','instructor')->get();
        $user2 = User::where('role','admin')->get();
        if (Session::has('cupon'))
        {
            $total_amount = Session::get('cupon')['total_amount'];
        }
        else{
            $total_amount = round(Cart::total());
        }


        $data = array();
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['phone'] = $request->phone;
            $data['address'] = $request->address;
            $data['course_title'] = $request->course_title;
            $cartTotal = Cart::total();
            $carts = Cart::content();
           
            
        
        if($request->cash_delivery == "stripe"){
            return view('frontend.payment.stripe',compact('data','carts','cartTotal'));
        }
        elseif($request->cash_delivery == "ssl"){
            return view('frontend.payment.sslCommarce',compact('data','carts','cartTotal'));
        }
        elseif($request->cash_delivery == "handcash"){

        //create a new payment record

        $data = new Payment();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->cash_delivery = $request->cash_delivery;
        $data->total_amount = $total_amount;
        // $data->total_amount = $request->price;
        $data->payment_type = 'Direct Payment';
        $data->invoice_no = 'EOS' . mt_rand(10000000, 99999999);

        $data->order_date = Carbon::now()->format('d-F-Y');
        $data->order_month = Carbon::now()->format('F');
        $data->order_year = Carbon::now()->format('Y');
        $data->status = 'Pending';
        $data->created_at = Carbon::now();
        $data->save();

        foreach ($request->course_title as $key => $course_title) {
            $existingOrder = Order::where('user_id',Auth::user()->id)->where('course_id', $request->course_id[$key])->first();

            if ($existingOrder) {
                $notification = [
                   'message' => 'You have already enrolled this course',
                    'alert-type' => 'error',
                ];
                return redirect()->back()->with($notification);

            }//end if
            $order = new Order();
            $order->payment_id = $data->id;
            $order->user_id = Auth::user()->id;
            $order->course_id = $request->course_id[$key];
            $order->instructor_id = $request->instructor_id[$key];

            $order->course_title = $course_title;
            $order->price = $request->price[$key];

            $order->save();
        }// end foreach




            $request->session()->forget('cart');

            $paymentId = $data->id;


        // start email sending option

        $sendmail = Payment::find($paymentId);
        $data = [
            'invoice_no' => $sendmail->invoice_no,
            'amount' => $total_amount,
            'name' => $sendmail->name,
            'email' => $sendmail->email,
        ];



        Mail::to($request->email)->send(new Orderconfirm($data));


        //send notification 
        Notification::send($user, new OrderComplete($request->name));
        Notification::send($user2, new OrderComplete($request->name));


        //end email sending option
        $notification = [
            'message' => 'Your order has been placed successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('index')->with($notification);

    }

    }//end method

    public function StripeOrder(Request $request){
        if (Session::has('cupon'))
        {
            $total_amount = Session::get('cupon')['total_amount'];
        }
        else{
            $total_amount = round(Cart::total());
        }

        \Stripe\Stripe::setApiKey('sk_test_51PShl909xhMv6pOrGrZen6iPyTjbaAJtyvIlGuMVRDht84bGYaqLpwQ49oQRSAiRrEVP4DWA9zo4YiNX4Rmrm96f0040FXNBle');

        $token = $_POST['stripeToken'];
        $charge = \Stripe\Charge::create([
            'amount' => $total_amount * 100,
            'currency' => 'usd',
            'description' => 'Lms',
           'source' => $token,
           'metadata' => ['order_id' => '343434'],
        ]);


        $order_id = Payment::insertGetId([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            
            'total_amount' => $total_amount,
            'payment_type' => 'Stripe',
            'invoice_no' => 'EOS' . mt_rand(10000000, 99999999),
            'order_date' => Carbon::now()->format('d-F-Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
           'status' => 'Pending',
            'created_at' => Carbon::now(),
        ]);

        $carts = Cart::content();

        foreach($carts as $cart){
            Order::insert([
                'payment_id'=> $order_id,
                'user_id' => Auth::user()->id,
                'course_id' => $cart->id,
                'instructor_id' => $cart->options->instructor_id,
                'course_title' => $cart->name,
                'price' => $cart->price,

            ]);

        }


        if(Session::has('cupon')){
            Session::forget('cupon');
        }
        Cart::destroy();

        $notification = [
            'message' => 'Stripe Payment done successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('index')->with($notification);
    }//end method 



    public function BuyToCart(Request $request, $id){
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


    public function MarkRead(Request $request, $id) {
        $user = Auth::user();
        $notification = $user->notifications()->where('id', $id)->first();
    
        if ($notification) {
            $notification->markAsRead();
        }
        
        return response()->json(['count' => $user->unreadNotifications->count()]);
    }
    


    public function MarkReadAdmin(Request $request, $id){
        $user = Auth::user();
        $notification = $user->notifications()->where('id', $id)->first();
    
        if ($notification) {
            $notification->markAsRead();
        }
        
        return response()->json(['count' => $user->unreadNotifications->count()]);
    }//end method

    

}
