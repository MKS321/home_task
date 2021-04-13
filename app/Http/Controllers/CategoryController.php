<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\SubCat;
use Illuminate\Http\Request;
use Redirect;

// use App\Http\Requests\CatRequest;
use App\Http\Requests\CatRequest;
class CategoryController extends Controller
{
    //
    public function main_category(){
        $data = Category::all();
        return view('admin.category.main.index',compact('data'));
    }
    public function main_category_create(){
        return view('admin.category.main.create');
    }
    public function main_category_store(Request $request){
        
        $user = new Category;
        $user->name = $request->get('name');
       
        $user->save();

     return Redirect::route('main_category-index');
    }
    public function main_category_edit($id){
        $data = Category::where('id', $id)->first();
        return view('admin.category.main.edit',compact('data'));
    }
    public function main_category_update(Request $request, $id){
        
        $data = category::where('id', $id)->update([
            "name"=>$request->name,
            
             ]);

     return Redirect::route('main_category-index');
    }
    public function main_category_destroy($id){
        $data = Category::where('id', $id)->first();
        $data->delete(); 
        return Redirect::route('main_category-index');
    }

    public function sub_category(){
        $data = SubCat::all();
        return view('admin.category.sub.index',compact('data'));
    }
    public function sub_category_create(){
        $data = Category::all();
        return view('admin.category.sub.create',compact('data'));
    }
    public function sub_category_store(CatRequest $request){

        return $request;
        $user = new SubCat;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalName();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $user->image = $name;
            
    
           
        }
               $user->cat_id = $request->get('cat_id');
               $user->name = $request->get('name');
               $user->desc = $request->get('desc');
               $user->save();

            return Redirect::route('sub_category-index');
        return $request;
    }
    public function sub_category_edit($id){
        $cat = Category::all();
        $data  = SubCat::where('id', $id)->first();
        return view('admin.category.sub.edit',compact('cat','data'));
    }
    public function sub_category_update(Request $request, $id){
        $data = SubCat::find($id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            if ($data->image == !null) {
           
                if (file_exists(public_path('/images/'.$data->image)) )
                    { 
                        unlink((public_path('/images/'.$data->image)) );
                        
                    }
                }
            $name = time().'.'.$image->getClientOriginalName();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $data  = SubCat::where('id',$id)->update(["image"=>$name, ]);
            
    
           
        }
        $data  = SubCat::where('id',$id)->update([
            "cat_id"=>$request->cat_id,
            "name"=>$request->name,

            "desc"=>$request->desc,

        ]);
        return Redirect::route('sub_category-index');

    }
    public function sub_category_destroy($id){
        $data  = SubCat::FindorFail($id);
        if ($data->image == !null) {
           
            if (file_exists(public_path('/images/'.$data->image)) )
                { 
                    unlink((public_path('/images/'.$data->image)) );
                    
                }
            }
        $data->delete();
        return Redirect::route('sub_category-index');

    }
}
