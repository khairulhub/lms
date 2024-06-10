<?php

namespace App\Http\Controllers\Backend;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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

        $orderItem = Order::where('instructor_id',$id)->orderBy('id','DESC')->get();
        return view('instructor.orders.all_order',compact('orderItem'));
    }


    
    public function InstructorOrderDetails($payment_id){
        $payment = Payment::where('id',$payment_id)->first();
        $orderItem = Order::where('payment_id',$payment_id)->orderBy('id','DESC')->get();

        return view('instructor.orders.order_details',compact('payment','orderItem'));
    }//end method


    
}
