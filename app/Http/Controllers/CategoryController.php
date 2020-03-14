<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
        $filterKeyword = $request->get('keyword');
        $categories = \App\Category::paginate(2);
        $status = $request->get('status');
        if($filterKeyword){
            if($status){
                $categories = \App\User::where('email', 'LIKE', "%$filterKeyword%")->where('status', $status)->paginate(2);
            } else {
                $categories = \App\User::where('email', 'LIKE', "%$filterKeyword%")->paginate(2);
            }
        }
        return view('backend.categories.index', compact('categories'));
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        //
        return view('backend.categories.create');
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
            "title" => "required|min:5|max:100",
            ])->validate();
            // Menyimpan data
            $title = $request->get('title');
            $new_category = new \App\Category;
            $new_category->title = $title;
            if($request->file('image')){
                $image_path = $request->file('image')
                ->store('category_images', 'public');
                
                $new_category->image = $image_path;
            }
            $id = \Auth::user()->id;
            //$new_category->created_by = \Auth::users()->id;
            // dengan sccript diatas ada error Method Illuminate\Auth\SessionGuard::users does not exist.
            // Sulusi mengatasi error  Method Illuminate\Auth\SessionGuard::users does not exist.
            // maka diubah
            $new_category->created_by = $id;
            $new_category->slug = \Str::slug($title, '-');
            $new_category->save();
            Alert::success('Category succesfully created', 'Create Success');
            return redirect()->route('categories.index');
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
            $category = \App\Category::findOrFail($id);
            //return view('categories.show', ['category' => $category]);
            // Cara kedua
            return view('categories.show', compact('category'));
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
            $category = \App\Category::findOrFail($id);
            //return view('categories.show', ['category' => $category]);
            // Cara kedua
            return view('categories.edit', compact('category'));
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
    