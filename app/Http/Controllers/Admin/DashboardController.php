<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Statement;
use Illuminate\Support\Facades\Storage;
use App\Notification;

class DashboardController extends Controller
{
    public function index()
    {

        $last_3_user = User::latest('id')->take(3)->get();
        // $last_3_sts = Statement::latest('id')->take(3)->get();
        $last_3_sts = Statement::join('makes', 'statements.make_id', '=', 'makes.id')
        ->join('carmodels', 'statements.model_id', '=', 'carmodels.id')
        ->select('statements.*', 'makes.title as make_title','carmodels.title as car_title')
        ->latest('statements.id')->take(3)->get();
        $total_users = User::count();
        $total_statements = Statement::count();
        // die;
        return view('admin.index', [
            'route_name'=>'admin.index',
            'statements3' => $last_3_sts,
            'users3' => $last_3_user,
            'total_users' => $total_users,
            'total_statements' => $total_statements
        ]);
    }

    public function statements()
    {
        $statements = Statement::join('makes', 'statements.make_id', '=', 'makes.id')
        ->join('carmodels', 'statements.model_id', '=', 'carmodels.id')
        ->join('users', 'statements.user_id', '=', 'users.id')
        ->select('statements.*', 'makes.title as make_title','carmodels.title as car_title',
        'users.name', 'users.last_name', 'users.phone_number as phone')
        ->latest('statements.id')->paginate(15);

        // dump($statements[0]);
        return view('admin.statements',[
            'route_name'=>'admin.statements',
            'statements' =>$statements,
        ]);        
    }

    public function item(Request $request,$locale,$id)
    {
        $user_id = Statement::where('id', $id)->first()->user_id;
        $directory = "public/statements/$user_id/$id"; // statement-id from DB.
        $files = Storage::files($directory);
        $fileData = [];
        foreach($files as $key => $file){
            $fileData[$key]['url']= Storage::url($file);
            $file_explode = explode("/",$file);
            $fileData[$key]['name']= end($file_explode);
        }
        // dump($fileData);die;
        
        $statement = Statement::join('makes', 'statements.make_id','=', 'makes.id')
                                ->join('carmodels', 'statements.model_id', '=','carmodels.id')
                                ->join('body_types', 'statements.body_type_id','=','body_types.id')
                                ->join('colors','statements.color_id','=','colors.id')
                                ->join('currencies','statements.currency_id','=','currencies.id')
                                ->join('drivetrains', 'statements.drivetrain_id','=','drivetrains.id')
                                ->join('engine_types', 'statements.engine_type_id','=', 'engine_types.id')
                                ->join('gearboxes', 'statements.gearbox_id','=','gearboxes.id')
                                ->join('steering_wheels','statements.steering_wheel_id','=','steering_wheels.id')
                                ->join('users', 'statements.user_id', '=', 'users.id')
                                ->leftJoin('notifications', 'statements.id', '=', 'notifications.statement_id')
                                ->select('statements.*','makes.title as make_title','carmodels.title as car_title',
                                'body_types.b_type','colors.color_name as color','currencies.crc_symbol',
                                'drivetrains.d_type','engine_types.e_type', 'gearboxes.g_type','steering_wheels.sw_type',
                                'users.name', 'users.last_name', 'users.email','users.phone_number as phone',
                                'notifications.message')
                                ->where('statements.id', '=', $id)
                                ->first();

        // dump($statement);

        return view('admin.st_edit', [
            'route_name'=>'admin.statements.item',
            'id'=>$id,
            'statement'=>$statement,
            'fileData'=>$fileData,

        ]);
    }

    public function update(Request $request,$locale, $id)
    {
        
        
        if ($request->status < 0) {
           # add notiofocation for this statement
           echo 'if <br>';
           if (!empty($request->message)) {
            Notification::create([
                'statement_id'=>$request->statement_id,
                'message'=>$request->message,
            ]);
           }else{
               return redirect()->back()->with('error','Rejection message can not be emty.');
           }
            
        }else{
            # check and remove note if exists
            echo 'else <br>';
            $st = Statement::where('id', $request->statement_id)->has('notification')->first();
            if($st) {
                Notification::where('statement_id', $request->statement_id)->delete();
            }            
        }

        Statement::where('id', $request->statement_id)                    
                ->update(['status' => $request->status]);

        return redirect()->back()->with('success', __('Update_statement_success'));
    }

    public function users()
    {

        $users = User::with('statement')->where('role_id','<>','1')->paginate(15);
        return view('admin.users',[
            'route_name'=>'admin.users',
            'users'=>$users,
        ]);
    }

}
