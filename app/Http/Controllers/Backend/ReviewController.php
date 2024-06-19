<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function StoreReview(Request $request){
        $course = $request->course_id;
        $instructor = $request->instructor_id;

        $request->validate([
            'comment' => 'required',
        ]);
        Review::insert([
            'course_id' => $course,
            'user_id' => Auth::id(),
            'comment' => $request->comment,
            'rating' => $request->rate,
            'instructor_id' => $instructor,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Your review have send Successfully and admin will approve it.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }



    
}
