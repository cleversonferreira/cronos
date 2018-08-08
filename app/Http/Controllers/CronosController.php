<?php

namespace App\Http\Controllers;

use App\Cronos;
use Illuminate\Http\Request;

class CronosController extends Controller
{

    public function index()
    {
        $cronos = Cronos::all();
        return view('dashboard', compact('cronos'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $cronos = new Cronos();
        $cronos->name = $request->name;
        $cronos->deadline_start = $request->deadline_start;
        $cronos->deadline_end = $request->deadline_end;
        $cronos->progress = $request->progress;
        $cronos->save();
        return redirect()->to('/dashboard');
    }

    public function view($id)
    {
        $cronos = Cronos::find($id);
        if(!$cronos)
            abort(404);
        return view('view', compact('cronos'));
    }

    public function edit($id)
    {
        $cronos = Cronos::find($id);
        if(!$cronos)
            abort(404);
        return view('edit', compact('cronos'));
    }


    public function update(Request $request, $id)
    {
        if(!($cronos = Cronos::find($id)))
            throw new ModelNotFoundException('Not found!');
        $data = $request->all();
        $cronos->fill($data);
        $cronos->save();
        return redirect()->route('dashboard');
    }

    public function destroy($id)
    {
        if(!($cronos = Cronos::find($id)))
            throw new ModelNotFoundException('Not found!');
        $cronos->delete();
        return redirect()->route('dashboard');
    }

}
