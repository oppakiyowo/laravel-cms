<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Users\UpdateProfileRequest;
use App\Http\Requests\Users\CreateUsersRequest;


class userscontroller extends Controller
{
    public function index()
    {
       
        return view('users.index')->with('users', User::all());
    }

    public function create()
    {
       
        return view('users.create')->with('users', User::all());

    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUsersRequest $request)
    {
       
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>$request->role


            
        ]);

        session()->flash('success', 'users berhasil di tambah');

        return redirect(route('users.index'));
    }


    public function makeadmin(User $user)
    {
     
        $user->role = 'admin';
        $user->save();

        session()->flash('success', 'User berhasil dijadikan admin');
       return redirect(route('users.index'));

    }

    public function undoadmin(User $user)
    {
        if ($user->id == 1) {
            session()->flash('error', 'User ini tidak bisa dimenjadi writer karena merupakan administrator');
            return redirect()->route('users.index');
        }
     
        $user->role = 'writer';
        $user->save();

        session()->flash('success', 'User berhasil dijadikan writer');
       return redirect(route('users.index'));

    }

  

    public function edit()
    {
        return view('users.profile')->with('user', auth()->user());
    }

    public function Update(UpdateProfileRequest $request)
    {
        $user =auth()->user();

        $user->update([
            'name' => $request->name,
            'about'=> $request->about
        ]);

    session()->flash('success', 'Profile User berhasil di Update');
    return redirect()->back();

    }
    public function destroy(User $user)
    {
        if ($user->id == 1) {
            session()->flash('error', 'User ini Tidak bisa di Hapus');
            return redirect()->route('users.index');
        }
        
        if ($user->posts->count() >0)
        {
            session()->flash('error', 'Tidak bisa di hapus, Ada post yang menggunakan user ini');
            
            return redirect()->back();
        }
        $user->delete();

        session()->flash('success', 'User berhasil di hapus');
        return redirect(route('users.index'));
    }


    public function show($id)
    {
        return view ('errors.404');
    }
}
