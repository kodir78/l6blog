<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
        //
        $filterKeyword = $request->get('keyword');
        $users = \App\User::paginate(2);
        $status = $request->get('status');
        if($filterKeyword){
            if($status){
                $users = \App\User::where('email', 'LIKE', "%$filterKeyword%")->where('status', $status)->paginate(2);
            } else {
                $users = \App\User::where('email', 'LIKE', "%$filterKeyword%")->paginate(2);
            }
        }
        return view('backend.users.index', ['users' => $users]);
        
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        //
        return view('backend.users.create');
        
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        //
        $validation = \Validator::make($request->all(),[
            "name" => "required|min:5|max:100",
            "username" => "required|min:5|max:20",
            "roles" => "required",
            "phone" => "required|digits_between:10,12",
            "address" => "required|min:20|max:200",
            //"avatar" => "required",
            "email" => "required|email",
            "password" => "required",
            "password_confirmation" => "required|same:password"
            ])->validate();
            // Menyimpan data
            $new_user = new \App\User; 
            $new_user->name = $request->get('name');
            $new_user->username = $request->get('username');
            $new_user->roles = json_encode($request->get('roles'));
            $new_user->name = $request->get('name');
            $new_user->address = $request->get('address');
            $new_user->phone = $request->get('phone');
            $new_user->email = $request->get('email');
            $new_user->password = \Hash::make($request->get('password'));
            
            if($request->file('avatar')){
                $file = $request->file('avatar')->store('avatars', 'public');
                $new_user->avatar = $file;
            }
            
            $new_user->save();
            Alert::success('User succesfully created', 'Create Success');
            return redirect()->route('users.create');
        }
        
        /**
        * Display the specified resource.
        *
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
        public function show($id)
        {
            //
            $user = \App\User::findOrFail($id);
            return view('backend.users.show', ['user' => $user]);
            //return view('backend.users.show');
            
        }
        
        /**
        * Show the form for editing the specified resource.
        *
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
        public function edit($id)
        {
            //
            $user = \App\User::findOrFail($id);
            return view('backend.users.edit', ['user' => $user]);
        }
        
        /**
        * Update the specified resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
        public function update(Request $request, $id)
        {
            //
            $validation = \Validator::make($request->all(),[
                "name" => "required|min:5|max:100",
                "roles" => "required",
                "phone" => "required|digits_between:10,12",
                "address" => "required|min:20|max:200",
                ])->validate(); 
                //
                $user = \App\User::findOrFail($id);
                
                $user->name = $request->get('name');
                $user->roles = json_encode($request->get('roles'));
                $user->address = $request->get('address');
                $user->phone = $request->get('phone');
                $user->status = $request->get('status');
                $user->bio = $request->get('bio');
                if($request->file('avatar')){
                    if($user->avatar && file_exists(storage_path('app/public/' . $user->avatar))){
                        \Storage::delete('public/'.$user->avatar);
                    }
                    $file = $request->file('avatar')->store('avatars', 'public');
                    $user->avatar = $file;
                }
                
                $user->save();
                Alert::success('User succesfully updated', 'Update Success');
                return redirect()->route('users.edit', [$id]);
            }
            
            /**
            * Remove the specified resource from storage.
            *
            * @param  int  $id
            * @return \Illuminate\Http\Response
            */
            public function destroy($id)
            {
                //
            }
        }
        