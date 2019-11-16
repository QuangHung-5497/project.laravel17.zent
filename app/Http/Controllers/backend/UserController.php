<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\User;
use App\Models\UserInfo;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('deleted_at', NULL)->paginate(10);

        return view('backend.users.index')->with(['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        if ($request->hasFile('images')){
            $file = $request->file('images');
            $name = $file->getClientOriginalName();
            $path = $file->move('users', $name);
        }else{
            dd('k co file');
        }

        $user = new User();
        
        $user->name = $request->get('name');
        $user->user_name = \Illuminate\Support\Str::slug($request->get('name'));
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $user->is_admin = $request->get('is_admin');
        $user->avata = $path;

        $user->save();

        $userinfo = new UserInfo();
        $userinfo->user_id = $user->id;
        $userinfo->phone = $request->get('phone');
        $userinfo->address = $request->get('address');
        $userinfo->age = $request->get('age');
        $userinfo->save();

        

        return redirect()->route('backend.user.index');
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

    public function detail($user_name)
    {
        $user = User::where('user_name', $user_name)->first();
        return view('backend.users.show')->with(['user'=>$user]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('backend.users.edit')->with(['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        
        $name = $request->get('name');
        $is_admin = $request->get('is_admin');

        $user = User::find($id);
        $user->name = $name;
        $user->is_admin = $is_admin;

        $user->save();

        return redirect()->route('backend.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->deleted_at = \Carbon\Carbon::now();
        $user->save();
        $url_back = url()->previous();
        return redirect($url_back);
    }
}
