<?php

namespace App\Http\Controllers\Backend;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class OrdersController extends Controller
{
    public function AdminPendingOrder(){
        $payment = Payment::where('status','pending')->orderBy('id','DESC')->get();
        return view('admin.backend.orders.pending_order',compact('payment'));
    }//end section


    public function AdminOrderDetails($payment_id){
        $payment = Payment::where('id',$payment_id)->first();
        $orderItem = Order::where('payment_id',$payment_id)->orderBy('id','DESC')->get();

        return view('admin.backend.orders.order_details',compact('payment','orderItem'));
    }//end method



    // ordeer pending confirmation
    public function AdminPendingConfirm($payment_id){
        Payment::find($payment_id)->update(['status' => 'Confirm']);

        $notification = array(
            'message' => 'Order Confirm Successfully Done',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.confirm.order')->with($notification);
    }//end method



    // admin confirm order list

    public function AdminConfirmOrder(){
        $payment = Payment::where('status','confirm')->orderBy('id','DESC')->get();
        return view('admin.backend.orders.confirm_order',compact('payment'));
    }//end section


    public function InstructorAllOrder(){
        $id = Auth::user()->id;
         $latestOrderItem = Order::where('instructor_id',$id)->select('payment_id',\DB::raw('MAX(id) as max_id'))->groupBy('payment_id');
         $orderItem = Order::joinSub( $latestOrderItem,'latest_order', function($join){
            $join->on('orders.id', '=', 'latest_order.max_id');
         })->orderBy('latest_order.max_id', 'DESC')->get();


        return view('instructor.orders.all_order',compact('orderItem'));
    }



    public function InstructorOrderDetails($payment_id){
        $payment = Payment::where('id',$payment_id)->first();
        $orderItem = Order::where('payment_id',$payment_id)->orderBy('id','DESC')->get();

        return view('instructor.orders.order_details',compact('payment','orderItem'));
    }//end method


    // ===================================invoice controller for make pdf =======
    public function InstructorOrderInvoice($payment_id){
        $payment = Payment::where('id',$payment_id)->first();
        $orderItem = Order::where('payment_id',$payment_id)->orderBy('id','DESC')->get();

        $pdf = Pdf::loadView('instructor.orders.order_pdf', compact('payment','orderItem'))->setPaper('a4')->setOption([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
    }//end method



    public function MyCourses(){
        $id = Auth::user()->id;
         $latestOrder= Order::where('user_id',$id)->select('course_id',\DB::raw('MAX(id) as max_id'))->groupBy('course_id');
         $myCourse = Order::joinSub( $latestOrder,'latest_order', function($join){
            $join->on('orders.id', '=', 'latest_order.max_id');
         })->orderBy('latest_order.max_id', 'DESC')->get();


        return view('frontend.mycourse.my_all_order',compact('myCourse'));
    }






}
