<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->level == 'Admin'){
            $user = User::all();
            return view('home.user.index', compact(['user']));
        }else{
            return redirect('/login')->with('error', 'Maaf Anda tidak memiliki Akses Ke halaman User Silahkan Login Kembali');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home.user.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
            'username' => 'required',
            'password' => 'required',
            'nama' => 'required',
            'level' => 'required',
        ]);
        
        $img = $request->file('photo');
        if($img) {
            $nama = hexdec(uniqid());
            $ext = strtolower($img->getClientOriginalExtension());
            $photo = $nama.'.'.$ext;
            $img->move('assets/image/user/',$photo);
        } else {
            // Handle case where 'foto' is not uploaded
            $photo = 'default.jpg'; // Or whatever default photo you want to set
        }

        User::create([
            'photo' => $photo,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'nama' => $request->nama,
            'level' => $request->level,
            $request->except(['_token']),
        ]);
        return redirect('/user')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('home.user.edit', compact(['user']));
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
    $user = User::find($id);

    $request->validate([
        'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        'username' => 'required',
        'nama' => 'required',
        'level' => 'required',
        'password' => 'nullable|min:6',
    ]);

    // FOTO
    if ($request->hasFile('photo')) {
        $img = $request->file('photo');
        $nama = hexdec(uniqid());
        $ext = strtolower($img->getClientOriginalExtension());
        $photo = $nama . '.' . $ext;
        $img->move('assets/image/user/', $photo);
    } else {
        $photo = $user->photo;
    }

    // DATA UPDATE
    $data = [
        'photo' => $photo,
        'username' => $request->username,
        'nama' => $request->nama,
        'level' => $request->level,
    ];

    // PASSWORD HANYA JIKA DIISI
    if ($request->filled('password')) {
        $data['password'] = bcrypt($request->password);
    }

    $user->update($data);

    return redirect('/user')->with('success', 'Data berhasil diperbarui');
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
        $user->delete();
        return redirect('/user')->with('success', 'Data berhasil dihapus');
    }
}
