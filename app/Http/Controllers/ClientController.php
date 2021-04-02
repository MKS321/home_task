<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Redirect;
use App\Http\Requests\UserRequest;
class ClientController extends Controller
{
    //
    public function client(){
        $data = Client::all();
        return view('admin.client.index',compact('data'));
    }
    public function create (){
        return view('admin.client.create');
    }
    public function store(UserRequest $req){
        $user = new Client;
        if ($req->hasFile('image')) {
            $image = $req->file('image');
            $name = time().'.'.$image->getClientOriginalName();
            $destinationPath = public_path('images');
            $image->move($destinationPath, $name);
            $user->image = $name;
           
         }
        $user->name = $req->get('name');
        $user->email = $req->get('email');
        $user->phone = $req->get('phone');
        $user->address = $req->get('address');
        $user->birthday = $req->get('birthday');
    
        $user->save();

     return Redirect::route('client-index');
    }
    public function edit($id){
        $data = Client::where('id', $id)->first();
        return view('admin.client.edit',compact('data'));
    }
    public function update(Request $request, $id){
        $data = Client::find($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            if ($data->image == !null) {
           
                if (file_exists(public_path('/images/'.$data->image)) )
                    { 
                        unlink((public_path('/images/'.$data->image)) );
                        
                    }
                }
                    $name = time().'.'.$image->getClientOriginalName();
                    $destinationPath = public_path('images');
                    $image->move($destinationPath, $name); 
                    $data = client::where('id', $id)->update(["image"=>$name]);
                   
         }

        $data = client::where('id', $id)->update([
        "name"=>$request->name,
        "email"=>$request->email,
        "phone"=>$request->phone,
        "address"=>$request->address,
        "birthday"=>$request->birthday,
         ]);

         return redirect::route('client-index');
    }
    public function destroy($id){
       $data = Client::findorFail($id);
       if ($data->image == !null) {
           
        if (file_exists(public_path('/images/'.$data->image)) )
            { 
                unlink((public_path('/images/'.$data->image)) );
                
            }
        }
        $data->delete();
        return redirect::route('client-index');
    }
}
