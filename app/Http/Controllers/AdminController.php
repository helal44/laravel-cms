<?php

namespace App\Http\Controllers;

use App\Models\Images;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users=User::all();
        return view('layouts.admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $role=Role::all();
        return view('layouts.admin.users.create',compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        $file = $r->image;
        $file_name = time().'.'.$file->getClientOriginalName(); 
        $user=User::create(['name'=>$r->username ,'image'=>$file_name,'email'=>$r->useremail ,'password'=>$r->userpass ,'role_id'=>$r->userrole ,'is_active'=>$r->userstatus]);
        if($user){
            $file->move('images/user_images', $file_name); 
           return redirect('admin/user');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
        $users=User::find($id);
        $role=Role::all();
        return view('layouts.admin.users.edit', compact('users','role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, $id)
    {
        $file = $r->image;
        $file_name = time().'.'.$file->getClientOriginalName(); 
        $edit=User::find($id);
         $oldimage=$edit->image; // ----------->old image
                unlink(public_path().'/images/user_images/'.$oldimage);

        $edit->name=$r->username;
        $edit->image=$file_name;
        $edit->email=$r->useremail;
        $edit->password=$r->userpass;
        $edit->role_id=$r->userrole;
        $edit->is_active=$r->userstatus;
        $edit->save();

        if($edit){
               
            $file->move('images/user_images', $file_name); 
            return redirect('admin/user');
        }

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
        $image=User::find($id);
        unlink(public_path().'/images/user_images/'.$image->image);
        $delete=User::find($id)->delete();
        if($delete){
            Session::flash('Deleted_user','user is deletd');
            return redirect('admin/user');
        }
    }
}
