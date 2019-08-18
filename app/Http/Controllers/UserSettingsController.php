<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserSettingsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // $d =  Hash::make('Suro1234');
        // echo $d;die;
        return view('home.settings.edit',[
            'route_name' =>'home.settings.edit'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, $locale)
    {
        //
    }

    public function updateEmail(Request $request, User $user,$locale)
    {
        // dump($request->user()->id);die;
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string','confirmed'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('home.settings.edit', app()->getLocale())
                        ->withErrors($validator)
                        ->withInput();
        }
        
        if ( Hash::check($request->password, $request->user()->password)) {
            User::where('id', $request->user()->id)
            ->update(['email' => $request->email]);

            return redirect()->back()->with('success', __('Email_successfully_updated'));
        }else {
            return redirect()->route('home.settings.edit', app()->getLocale())
                        ->with('error', __('Password_must_to_be_valid'));
                        
        }       
    }

    public function updatePass(Request $request, User $user,$locale)
    {
        // dump($request->all());
        $validator = Validator::make($request->all(), [
            
            'old_password' => ['required'],
            'new_password' => ['required', 'string', 'regex:/(?=.*\d)(?=.*[A-Z])/','min:8', 'confirmed']
        ],[
            'old_password.required' => __('Old_password_required'),
            'new_password.required' => __('passWord descr'),
            'new_password.string' => __('passWord descr'),
            'new_password.regex' => __('passWord descr'),
            'new_password.confirmed' => __('The new password must be confirmed'),
        ]);

        if ($validator->fails()) {
            return redirect()->route('home.settings.edit', app()->getLocale())
                        ->withErrors($validator)
                        ->withInput();
        }

        if ( Hash::check($request->old_password, $request->user()->password)) {
            User::where('id', $request->user()->id)
            ->update(['password' =>  Hash::make($request->new_password)]);

            return redirect()->back()->with('success', __('Password_successfully_updated'));
        }else {
            return redirect()->route('home.settings.edit', app()->getLocale())
                        ->with('error', __('Old_password_must_to_be_valid'));
                        
        }  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
