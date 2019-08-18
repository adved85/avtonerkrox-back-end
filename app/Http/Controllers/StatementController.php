<?php

namespace App\Http\Controllers;

use App\Statement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

use App\Make;
use App\Carmodel;
use App\BodyType;
use App\EngineType;
use App\Gearbox;
use App\Drivetrain;
use App\Color;
use App\SteeringWheel;
use App\Currency;
use Illuminate\Support\Facades\DB;

class StatementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('home.statements.index',[
        //     'route_name' =>'home.statement'
        // ]);
        return redirect()->route('home', app()->getLocale());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // create is into HomeController.php -> index-method
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $locale)
    {
        // dump($request->mileage);die;
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|numeric|not_in:0',
            'make_id' => 'required|numeric|not_in:0',
            'model_id' =>'required|numeric|not_in:0',
            'body_type_id'=>'required|numeric|not_in:0',
            'doors'=>'required|numeric|not_in:0',
            'year'=>'required|date_format:Y',
            'mileage'=>'required|numeric',
            'engine_type_id'=>'required|numeric|not_in:0',
            'engine_value'=>'required|numeric|not_in:0',
            'pistons'=>'required|numeric|not_in:0',
            'gearbox_id'=>'required|numeric|not_in:0',
            'drivetrain_id'=>'required|numeric|not_in:0',
            'steering_wheel_id'=>'required|numeric|not_in:0',
            'color_id'=>'required|numeric|not_in:0',
            'price'=>'required|regex:/^[0-9.,]+$/',
            'currency_id'=>'required|numeric|in:1,2,3,4',
            'customs'=>'required|boolean',
            'description'=>'string|nullable',
            'thumb'=>'required|string'
            
        ],
        [
            'make_id.not_in'=> __("Make_required"),
            'make_id.numeric'=> __("Make_required"),

            'model_id.required' => __('Model_required'),
            'model_id.not_in' => __('Model_required'),
            'model_id.numeric' => __('Model_required'),

            'body_type_id.required'=> __('Body_type_required'),
            'body_type_id.numeric'=> __('Body_type_required'),
            'body_type_id.not_in'=> __('Body_type_required'),

            'doors.required'=> __('Doors_required'),
            'doors.numeric'=> __('Doors_required'),
            'doors.not_in'=> __('Doors_required'),

            'year.required'=>__('Year_reqiured'),
            'year.date_format'=>__('Year_reqiured'),

            'mileage.required' =>__('Millage_required'),
            'mileage.numeric' =>__('Millage_required'),

            'engine_type_id.required'=> __('Engine_type_required'),
            'engine_type_id.numeric'=> __('Engine_type_required'),
            'engine_type_id.not_in'=> __('Engine_type_required'),
            
            'engine_value.required'=>__('Engine_value_required'),
            'engine_value.numeric'=>__('Engine_value_required'),
            'engine_value.not_in'=>__('Engine_value_required'),

            'pistons.required'=>__('Pistons_required'),
            'pistons.numeric'=>__('Pistons_required'),
            'pistons.not_in'=>__('Pistons_required'),

            'gearbox_id.required'=>__('Gearbox_required'),
            'gearbox_id.numeric'=>__('Gearbox_required'),
            'gearbox_id.not_in'=>__('Gearbox_required'),

            'drivetrain_id.required'=>__('Drivetrain_required'),
            'drivetrain_id.numeric'=>__('Drivetrain_required'),
            'drivetrain_id.not_in'=>__('Drivetrain_required'),

            'steering_wheel_id.required'=>__('Steering_wheel_required'),
            'steering_wheel_id.numeric'=>__('Steering_wheel_required'),
            'steering_wheel_id.not_in'=>__('Steering_wheel_required'),

            'color_id.required'=>__('Color_required'),
            'color_id.numeric'=>__('Color_required'),
            'color_id.not_in'=>__('Color_required'),

            'price.required'=>__('Price_required'),
            'price.regex'=>__('Price_required'),

            'currency_id.required'=>__('Currency_required'),
            'currency_id.numeric'=>__('Currency_required'),
            'currency_id.in'=>__('Currency_required'),


            'customs.required'=>__('Customs_required'),
            'customs.boolean'=>__('Customs_required'),

            'thumb.required'=>__('Thumb_required')
        ]);

        if ($validator->fails()) {
            return redirect()->route('home', app()->getLocale())
                        ->withErrors($validator)
                        ->withInput();
        }
        // dump($request->all());die;
        $request->user()->statement()->create([
            "user_id" => $request->user_id,
            "make_id" => $request->make_id,
            "model_id"=>$request->model_id,
            "body_type_id"=>$request->body_type_id,
            "doors"=>$request->doors,
            "year"=>$request->year,
            "mileage"=>$request->mileage,
            "engine_type_id"=>$request->engine_type_id,
            "engine_value"=>$request->engine_value,
            "pistons"=>$request->pistons,
            "gearbox_id"=>$request->gearbox_id,
            "drivetrain_id"=>$request->drivetrain_id,
            "steering_wheel_id"=>$request->steering_wheel_id,
            "color_id"=>$request->color_id,
            "price"=>$request->price,
            "currency_id"=>$request->currency_id,
            "customs"=>$request->customs,
            "description"=>$request->description,
            "thumb"=>$request->thumb,
        ]);
        // dump($request->all());
        return redirect()
                ->route('home', app()->getLocale())
                ->with('success', __('Adding_Statement_Success'));
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Statement  $statement
     * @return \Illuminate\Http\Response
     */
    public function show(Statement $statement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Statement  $statement
     * @return \Illuminate\Http\Response
     */
    public function edit(Statement $statement, $locale, $st_id)
    {
        // $statement1 = Statement::where('id',$st_id)->get();
        // $statement = Statement::find($st_id);
        $makes = Make::orderBy('title', 'ASC')->get();
        $carmodels = Carmodel::orderBy('title', 'ASC')->get();
        $body_types = BodyType::all();
        $engine_types = EngineType::all();
        $gearboxes = Gearbox::all();
        $drivetrains = Drivetrain::all();
        $steeringWheels = SteeringWheel::all();
        $colors = Color::all();
        $currencies = Currency::all();

        $statement = DB::table('statements')
        ->join('makes', 'statements.make_id', '=', 'makes.id')
        ->join('carmodels', 'statements.model_id', '=', 'carmodels.id')
        ->select('statements.*', 'makes.title as make_title','carmodels.title as car_title')
        ->where('statements.id', $st_id)
        ->first();

        // dump($statement);
        $user_id = $statement->user_id;
        $directory = "public/statements/$user_id/$st_id"; // statement-id from DB.
        $files = Storage::files($directory);
        $fileData = [];
        foreach($files as $key => $file){
            $fileData[$key]['url']= Storage::url($file);
            $file_explode = explode("/",$file);
            $fileData[$key]['name']= end($file_explode);
        }

        return view('home.statements.edit',[
            'route_name' =>'home.statement.edit',
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
            'statement'=>$statement,
            'st_id'=>$st_id
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Statement  $statement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Statement $statement)
    {
        // dump($request->all());die;
        Statement::where('id', $request->id)
        ->update([
            'body_type_id'=>$request->body_type_id,
            'doors'=>$request->doors,
            'year'=>$request->year,
            'mileage'=>$request->mileage,
            'engine_type_id'=>$request->engine_type_id,
            'engine_value'=>$request->engine_value,
            'pistons'=>$request->pistons,
            'gearbox_id'=>$request->gearbox_id,
            'drivetrain_id'=>$request->drivetrain_id,
            'steering_wheel_id'=>$request->steering_wheel_id,
            'color_id'=>$request->color_id,
            'price'=>$request->price,
            'currency_id'=>$request->currency_id,
            'customs'=>$request->customs,
            'thumb'=>$request->thumb,
            'description'=>$request->description,
        ]);

        return redirect()->back()->with('success',__('Update_statement_success'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Statement  $statement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Statement $statement,$locale, $st_id)
    {
        $statement = Statement::where('id', $st_id)->first();
        $user_id = $statement->user_id;        
        Statement::destroy($st_id); // delete statement
        
        $directory = "public/statements/$user_id/$st_id";
        $files = Storage::files($directory);
        if(!empty($files)){
            Storage::deleteDirectory($directory); // delete directory === $st_id
        }
        
        $str = __('Statement_delete_success');
        $new_str = str_replace('%',$st_id,$str);
        return redirect()->route('home',$locale)->with('success', $new_str);        
    }

    public function upload(Request $request, $locale)
    {

        $validator = Validator::make($request->all(), [
        // $this->validate($request,[
            'up_images'=>'required',
            'up_images.*'=>'image|mimes:jpeg,png,jpg,gif,svg|max:10000'
        ],
        [
            'up_images.required'=>__('Please_select_for_upload'),
            'up_images.*.image'=>__('File_type_only_image'),
            'up_images.*.mimes'=>__('File_type_only_image'),
            'up_images.*.max'=>__('File_max_size'),

        ]
        );

        if($validator->fails()){
            // return redirect()->route('home', app()->getLocale())->withErrors($validator);
            return redirect()->back()->withErrors($validator);
                        
        }

        if($request->hasfile('up_images'))
        {
            // dump($request->file('up_images'));
            $statement_id = $request->statement_id;
            $user_id = $request->user()->id;
            $data = array();
            foreach($request->file('up_images') as $image)
            {
                $name=$image->getClientOriginalName();
                // $image->move(public_path().'/images/', $name);  
                // $data[] = $name;
                // $path = Storage::put("public/statements/$statement_id", $image);
                $path = Storage::putFileAs("public/statements/$user_id/$statement_id", new File($image), $name);
                $data[]=$path;
            }

            // return redirect()->route('home', app()->getLocale())->with('success', __('Upload_success'));
            return redirect()->back()->with('success', __('Upload_success'));
        }
    }
}
