<?php

namespace App\Http\Controllers;

use App\Cronos;
use http\Env\Response;
use Illuminate\Http\Request;

class CronosController extends Controller
{

    public function index()
    {
        $cronos = Cronos::all();
        return view('dashboard', compact('cronos'));
    }

    public function all()
    {
        $cronos = Cronos::all();
        return response()->json($cronos);
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

        return $cronos;
    }

    public function view($id)
    {
        $cronos = Cronos::find($id);

        if(!$cronos)
            abort(404);

        return response()->json($cronos);
    }

    public function countdown($id)
    {
        $cronos = Cronos::find($id);

        date_default_timezone_set('America/Sao_Paulo');
        $today = strtotime(date("Y-m-d H:i:s"));
        $deadline = strtotime(date("Y-m-d H:i:s", strtotime($cronos->deadline_end)));
        $diff = ($deadline - $today);
        $cronos->diff = $diff;

        if(!$cronos)
            abort(404);
            
            return view('view', compact('cronos'));
    }

    public function edit($id)
    {
        return view('edit', compact('id'));
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
        return response()->json('Project deleted successfully');
    }

}
