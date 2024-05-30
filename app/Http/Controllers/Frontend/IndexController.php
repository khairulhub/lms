<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseLecture;
use App\Models\CourseSection;
use Carbon\Carbon;
use App\Models\Course;
use App\Models\Category;
use App\Models\Course_goal;
use App\Models\SubCategory;


use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;



class IndexController extends Controller
{
    //=============================course details page show
    public function CourseDetails($id,$slug){
        $course = Course::find($id);

        return view('frontend.course.course_details', compact('course'));

    }//end method 
}
