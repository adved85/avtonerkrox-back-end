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
use App\Statement;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
        $makes = Make::orderBy('title', 'ASC')->get();
        $carmodels = Carmodel::orderBy('title', 'ASC')->get();
        $body_types = BodyType::all();
        $engine_types = EngineType::all();
        $gearboxes = Gearbox::all();
        $drivetrains = Drivetrain::all();
        $steeringWheels = SteeringWheel::all();
        $colors = Color::all();
        $currencies = Currency::all();

        return view('index',[
            'route_name' =>'index',
            'makes' => $makes,
            'carmodels' => $carmodels,
            'body_types' => $body_types,
            'engine_types' => $engine_types,
            'gearboxes'=>$gearboxes,
            'drivetrains'=>$drivetrains,
            'steeringWheels'=>$steeringWheels,
            'colors'=> $colors,
            'currencies'=>$currencies,
            // 'files'=>$files,
            // 'fileData'=>$fileData,
            // 'last_id'=>$last_id,
            // 'statements'=>$statements
        ]);
    }

    public function item(Request $request, $locale, $id)
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

        // $view = 0;
        $this_view = Statement::where('id', $id)->value('view');
        $view = ($this_view !== 0)?$this_view: 0;
        $view_plus = $view + 1;
        Statement::where('id', $id)->update(['view' => $view_plus]);
        
        $statement = Statement::join('makes', 'statements.make_id','=', 'makes.id')
                                ->join('carmodels', 'statements.model_id', '=','carmodels.id')
                                ->join('body_types', 'statements.body_type_id','=','body_types.id')
                                ->join('colors','statements.color_id','=','colors.id')
                                ->join('currencies','statements.currency_id','=','currencies.id')
                                ->join('drivetrains', 'statements.drivetrain_id','=','drivetrains.id')
                                ->join('engine_types', 'statements.engine_type_id','=', 'engine_types.id')
                                ->join('gearboxes', 'statements.gearbox_id','=','gearboxes.id')
                                ->join('steering_wheels','statements.steering_wheel_id','=','steering_wheels.id')
                                ->select('statements.*','makes.title as make_title','carmodels.title as car_title',
                                'body_types.b_type','colors.color_name as color','currencies.crc_symbol',
                                'drivetrains.d_type','engine_types.e_type','gearboxes.g_type','steering_wheels.sw_type')
                                ->where('statements.id', '=', $id)
                                ->first();
        // dump($statement);
        return view('item',[
            'id'=>$id, // for current route-link in language-bar
            'route_name'=>'item',
            'statement'=>$statement,
            'fileData'=>$fileData,
        ]);
    }

    public function search(Request $request,Statement $statement, $locale)
    {
        // dump($request->all()); // dont delete it for debug

        $statement = $statement->query();
        $statement->select('statements.*','makes.title as make_title','carmodels.title as car_title',
        'body_types.b_type','colors.color_name as color','currencies.crc_symbol',
        'drivetrains.d_type','engine_types.e_type','gearboxes.g_type','steering_wheels.sw_type')
        ->join('makes', 'statements.make_id', '=', 'makes.id')
        ->join('carmodels', 'statements.model_id', '=', 'carmodels.id')
        ->join('body_types', 'statements.body_type_id','=','body_types.id')
        ->join('colors','statements.color_id','=','colors.id')
        ->join('currencies','statements.currency_id','=','currencies.id')
        ->join('drivetrains', 'statements.drivetrain_id','=','drivetrains.id')
        ->join('engine_types', 'statements.engine_type_id','=', 'engine_types.id')
        ->join('gearboxes', 'statements.gearbox_id','=','gearboxes.id')
        ->join('steering_wheels','statements.steering_wheel_id','=','steering_wheels.id');
        

        if ($request->has('make_id') && $request->make_id > 0) {
            $statement->where('statements.make_id', $request->input('make_id'));
        }

        if($request->has('model_id') && $request->model_id > 0) {
            $statement->where('statements.model_id', $request->input('model_id'));
        }

        if($request->has('price_start') && !is_null($request->price_start)) {
            $price_start = floatval($request->input('price_start'));

            if($request->has('price_end') && !is_null($request->price_end)) {                
                $price_end = floatval($request->input('price_end'));

                if ($price_start < $price_end) {
                    $statement->whereBetween('price', [$price_start, $price_end]);
                }else{
                    $error_price = 'veradarcnel 0 <br> [price-false] kam toxnel, kveradarcni bolor@';
                }       
            }else{
                // echo 'ereq<br>';
                $statement->whereBetween('price', [$price_start,100000000]);
            }
        }

        if($request->has('price_end') && !is_null($request->price_end)) {
            $price_end = floatval($request->input('price_end'));

            if($request->has('price_start') && is_null($request->price_start)) {
                // echo 'chors<br>';
                $statement->whereBetween('price',[0,$price_end]);
            }
        }

        if($request->has('year_start') && $request->year_start > 0) {
            $year_start = floatval($request->input('year_start'));

            if($request->has('year_end') && $request->year_end > 0) {
                $year_end = floatval($request->input('year_end'));
                
                if($year_start < $year_end) {
                    // echo 'hing <br>';
                    $statement->whereBetween('year',[$year_start,$year_end]);
                }

            }else{
                // echo 'yot <br>';
                $statement->where('year','>=',$year_start);
            }            
        }

        if($request->has('year_end') && $request->year_end > 0) {
            $year_end = floatval($request->input('year_end'));

            if($request->has('year_start') && $request->year_start < 1900) {
                $statement->where('year','<=',$year_end);
            }
            
        }

        if($request->has('body_type_id') && $request->body_type_id > 0){
            $statement->where('body_type_id', $request->input('body_type_id'));
        }

        // $statements = $statement->get();
        // $segments = $request->segment(3);
        
        $statements = $statement->paginate(15);
        $queryArray = $request->all();
        // dump($statements);
        
        $makes = Make::orderBy('title', 'ASC')->get();
        $carmodels = Carmodel::orderBy('title', 'ASC')->get();
        $body_types = BodyType::all();
        $engine_types = EngineType::all();
        $gearboxes = Gearbox::all();
        $drivetrains = Drivetrain::all();
        $steeringWheels = SteeringWheel::all();
        $colors = Color::all();
        $currencies = Currency::all();

        return view('index',[
            'route_name' =>'index',
            'makes' => $makes,
            'carmodels' => $carmodels,
            'body_types' => $body_types,
            'engine_types' => $engine_types,
            'gearboxes'=>$gearboxes,
            'drivetrains'=>$drivetrains,
            'steeringWheels'=>$steeringWheels,
            'colors'=> $colors,
            'currencies'=>$currencies,
            // 'files'=>$files,
            // 'fileData'=>$fileData,
            // 'last_id'=>$last_id,
            'search_statements'=>$statements,
            'queryArray'=>$queryArray
        ]);

    }

    public function all_cars()
    {
        return view('all_cars');
    }

    public function about()
    {
        return view('about');
    }

    public function contacts()
    {
        return view('contacts');
    }
}
