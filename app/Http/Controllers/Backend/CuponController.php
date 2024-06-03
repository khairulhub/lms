<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Course;
use App\Models\Cupon;
use App\Models\Category;
use App\Models\Course_goal;
use App\Models\SubCategory;

use App\Models\CourseLecture;
use App\Models\CourseSection;

use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class CuponController extends Controller
{
    public function AllCupon(){
        $cupons = Cupon::latest()->get();
        return view('admin.backend.cupon.all_cupon',compact('cupons'));
    }//end methods
}
