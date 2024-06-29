<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Imports\PermissionImport; //imports
use App\Exports\PermissionExport;  //exports
use Maatwebsite\Excel\Facades\Excel; //excel
use Spatie\Permission\Models\Permission; //permission model

class RoleController extends Controller
{
    public function AdminAllPermission(){
        $permissions = Permission::all();
        return view('admin.backend.pages.permission.all_permission',compact('permissions'));
    }//end method

    public function AdminAddPermission(){
        return view('admin.backend.pages.permission.add_permission');
    }//end method

    public function AdminStorePermission(Request $request){
        $permission = Permission::create([
        'name' => $request->name,
        'group_name' => $request->group_name,
        'created_at' => Carbon::now(),
        ]);
        $notification= array(
            'message' => 'Permission Inserted  Successfully',
            'alert-type' =>'success'
        );
        return redirect()->route('admin.all.permission')->with($notification);
    }//end method


    public function AdminEditPermission($id){
        $permission = Permission::find($id);
        return view('admin.backend.pages.permission.edit_permission',compact('permission'));
    }//end method

    public function AdminUpdatePermission(Request $request){
        $id = $request->id;
        Permission::find($id)->update([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);
        $notification= array(
           'message' => 'Permission Updated Successfully',
            'alert-type' =>'success'
        );
        return redirect()->route('admin.all.permission')->with($notification);
    }//end mehothd


    public function AdminDeletePermission($id){
        Permission::find($id)->delete();
        $notification= array(
            'message' => 'Permission Deleted Successfully',
            'alert-type' =>'success'
        );
        return redirect()->route('admin.all.permission')->with($notification);
    }//end method

    public function AdminImportPermission(){
        return view('admin.backend.pages.permission.import_permission');
    }//end method

    public function ImportPermission(Request $request){
        Excel::import(new PermissionImport, $request->file('import_file'));
        $notification = array(
            'message' => 'Permissions Imported Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.all.permission')->with($notification);
    }//end method

    public function AdminExportPermission(){
        return Excel::download(new PermissionExport, 'permission.xlsx');
    }//end method

    //===================================Role methods starts ==============================
    public function AdminAllRole(){
        $roles = Role::all();
        return view('admin.backend.pages.role.all_roles',compact('roles'));
    }//end method

    public function AdminAddRole(){
        return view('admin.backend.pages.role.add_roles');
    }//end method

    public function AdminStoreRole(Request $request){
        $roles = Role::create([
            'name' => $request->name,
            'created_at' => Carbon::now(),
            ]);
            $notification= array(
                'message' => 'Roles Inserted  Successfully',
                'alert-type' =>'success'
            );
            return redirect()->route('admin.all.role')->with($notification);
    }//end method

    public function AdminEditRole($id){
        $roles = Role::find($id);
        return view('admin.backend.pages.role.edit_role',compact('roles'));
    }

    public function AdminUpdateRole(Request $request){
        $id = $request->id;
        Role::find($id)->update([
            'name' => $request->name,
        ]);
        $notification= array(
            'message' => 'Role Updated Successfully',
            'alert-type' =>'success'
        );
        return redirect()->route('admin.all.role')->with($notification);
    }//end method

    public function AdminDeleteRole($id){
        Role::find($id)->delete();
        $notification= array(
            'message' => 'Role Deleted Successfully',
            'alert-type' =>'success'
        );
        return redirect()->route('admin.all.role')->with($notification);
    }//end method
    //===========================admin role prmission ====================================
    public function AdminRolePermission(){
        $roles = Role::all();
        $permissions = Permission::all();
        $permission_group = User::getpermissionGroup();
        return view('admin.backend.pages.rolesetup.role_permission_setup',compact('roles','permission_group','permissions'));
    }
}
