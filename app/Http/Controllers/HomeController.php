<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Make;
use App\Carmodel;
use App\BodyType;
use App\EngineType;
use App\Gearbox;
use App\Drivetrain;
use App\Color;
use App\SteeringWheel;
use App\Currency;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // return view('home.home',[
        //     'route_name' =>'home'
        // ]);
        $last_id_array = DB::select("SELECT  AUTO_INCREMENT
        FROM    information_schema.TABLES
        WHERE   (TABLE_NAME = 'statements')");
        $last_id = $last_id_array[0]->AUTO_INCREMENT;
        $user_id = $request->user()->id;
        // dump($request->user()->id);die;

        $directory = "public/statements/$user_id/$last_id"; // statement-id from DB.
        $files = Storage::files($directory);
        $fileData = [];
        foreach($files as $key => $file){
            $fileData[$key]['url']= Storage::url($file);
            $file_explode = explode("/",$file);
            $fileData[$key]['name']= end($file_explode);
        }
        // dump($last_id);
        // dump($files);
        // dump($fileData);

        
        $makes = Make::orderBy('title', 'ASC')->get();
        $carmodels = Carmodel::orderBy('title', 'ASC')->get();
        $body_types = BodyType::all();
        $engine_types = EngineType::all();
        $gearboxes = Gearbox::all();
        $drivetrains = Drivetrain::all();
        $steeringWheels = SteeringWheel::all();
        $colors = Color::all();
        $currencies = Currency::all();

        // $user = $request->user();
        // $statements = $request->user()->statement()->get();
        $statements = DB::table('statements')
        ->join('makes', 'statements.make_id', '=', 'makes.id')
        ->join('carmodels', 'statements.model_id', '=', 'carmodels.id')
        ->leftJoin('notifications', 'statements.id', '=', 'notifications.statement_id')
        ->select('statements.*', 'makes.title as make_title','carmodels.title as car_title', 'notifications.message')
        ->where('statements.user_id',$user_id)
        ->get();

        // dump($statements);//die;
        $role = $request->user()->role()->first()->role_name;
        // dump($role);die;

        return view('home.statements.index', [
            'route_name' =>'home.statement',
            'makes' => $makes,
            'carmodels' => $carmodels,
            'body_types' => $body_types,
            'engine_types' => $engine_types,
            'gearboxes'=>$gearboxes,
            'drivetrains'=>$drivetrains,
            'steeringWheels'=>$steeringWheels,
            'colors'=> $colors,
            'currencies'=>$currencies,
            'files'=>$files,
            'fileData'=>$fileData,
            'last_id'=>$last_id,
            'user_id'=>$user_id,
            'statements'=>$statements
        ]);
    }

    
}
