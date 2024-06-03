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


    public function AdminAddCupon(){
        return view('admin.backend.cupon.admin_add_cupon');
    }


    public function AdminStoreCupon(Request $request){
        Cupon::insert([
            'cupon_name' => strtoupper($request->cupon_name),
            'cupon_discount' => $request->cupon_discount,
            'cupon_validity' => $request->cupon_validity,
            'created_at'=> Carbon::now(),
            
        ]);
        $notification= array(
            'message' => 'Cupon Added Successfully',
            'alert-type' =>'success'
        );
        return redirect()->route('admin.all.cupon')->with($notification);
    }



    public function AdminEditCupon($id){
        $cupon = Cupon::find($id);
        return view('admin.backend.cupon.admin_edit_cupon',compact('cupon'));
    }


    public function AdminUpdateCupon(Request $request){
        $cupon_id = $request->id;

        Cupon::find($cupon_id)->update([
            'cupon_name' => $request->cupon_name,
            'cupon_discount' => $request->cupon_discount,
            'cupon_validity' => $request->cupon_validity,
            
            
        ]);
        $notification= array(
            'message' => 'SubCategory Updated  Successfully',
            'alert-type' =>'success'
        );
        return redirect()->route('admin.all.cupon')->with($notification);
    }
}
