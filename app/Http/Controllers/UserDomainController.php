<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Domain;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserDomainController extends Controller
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
        $id_user = Auth::user();
        // $id = User::find($id_user);
        $domain = Domain::where('user_id', $id_user->id)->get();
        // $domain = Auth::user()->domain();
        // $posts = Post::with('user')->where('user_id', Auth::user()->id)->firstOrFail();
        // $domain = Domain::with('user')->where('user_id', $id_user)->firstOrFail();
        // return view('dashboard', ['posts' => $posts]);
        // $id = Auth::user()->id;
        // $userdomain = $domain->where('user_id', '=', $id)->get();

        return view('user.index', ['domain' => $domain]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::all();
        $domain = new Domain();
        $domain->nama_domain = $request->nama_domain;
        $domain->user_id = Auth::user()->id;
        $domain->save();

        return redirect()->route('user.index')->with('succes', 'Domain berhasil di input');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Domain $domain)
    {
        return view('user.show', compact('domain'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Domain $domain)
    {
        return view('user.edit', compact('domain'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Domain $domain)
    {
        $request->validate([
            'nama_domain' => 'required',
        ]);
        $domain ->update($request->all());

        return redirect()->route('user.index')->with('succes', 'Domain berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Domain $domain)
    {
        $domain->delete();
        return redirect()->route('user.index')->with('succes', 'Domain berhasil dihapus');
    }
}
