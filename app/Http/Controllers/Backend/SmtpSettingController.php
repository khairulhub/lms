<?php

namespace App\Http\Controllers\Backend;
use Carbon\Carbon;
use App\Models\Smtp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SmtpSettingController extends Controller
{
    public function AllSmtp(){
        $smtps = Smtp::find(1);
        return view('admin.backend.setting.smtp_setting',compact('smtps'));

    }//end section

    public function AdminUpdateSmtp(Request $request){
        $smtp_id = $request->id;

        Smtp::find($smtp_id)->update([
            'mailer' => $request->mailer,
            'host' => $request->host,
            'port' => $request->port,
            'username' => $request->username,
            'password' => $request->password,
            'encryption' => $request->encryption,
            'from_address' => $request->from_address,
        ]);
        $notification= array(
            'message' => 'SMTP Setting Updated Successfully',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }
}
