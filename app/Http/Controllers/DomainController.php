<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Domain;
use App\User;
use Illuminate\Support\Facades\Auth;
 

class DomainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $domain = Domain::all();
        // $domain = DB::table('domain')->get();

        return view('domain.index', ['domain' => $domain]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('domain.create');
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

        // return $domain;
        // Domain::create($request->all());
        return redirect()->route('domain.index')->with('succes', 'Domain berhasil di input');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Domain $domain)
    {
        // $domain = Domain::find($id);
        // return $domain;
        return view('domain.show', compact('domain'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Domain $domain)
    {
        return view('domain.edit', compact('domain'));
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
        // $domain = Domain::find($id);
        // $domain->nama_domain = $request->nama_domain;
        // $domain->update();

        // return $domain;

        $request->validate([
            'nama_domain' => 'required',
        ]);
        $domain ->update($request->all());

        return redirect()->route('domain.index')->with('succes', 'Domain berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Domain $domain)
    {
        // $domain = Domain::find($id);
        $domain->delete();
        return redirect()->route('domain.index')->with('succes', 'Domain berhasil dihapus');
    }
}
