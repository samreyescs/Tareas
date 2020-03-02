<?php

namespace App\Http\Controllers;

use App\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $tareas = Consultar tareas de tabla tareas
        $tareas = Tarea::all();
        // dd($tareas);
        return view('tareas.tareaIndex', compact('tareas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tareas.tareaForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->input('tarea')); // muérete y te da el parámetro $request->all()

        $request->validate([
            'tarea' => 'required|max:255',
            'descripcion' => 'required',
            'fecha_entrega' => 'required|date',
            'prioridad' => 'required|int|min:1|max:3',
        ]);

        $tarea = new Tarea();
        $tarea->tarea = $request->tarea;
        $tarea->descripcion = $request->descripcion;
        $tarea->fecha_entrega = $request->fecha_entrega;
        $tarea->prioridad = $request->prioridad;
        // dd($tarea);
        $tarea->save();

        return redirect()->route('tarea.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function show($tarea)
    {
        //
        //dd($tarea);
        //return view('tareas.tareaShow')->with(['tarea => $tarea']);

        //return view('tareas.tareaShow', compact('tarea')); // <-------- Intentar hacerlo con esto, poner en un td la información
        return view('tareas.tareaShow', ['tarea'=>Tarea::find($tarea)]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarea $tarea)
    {
        return view('tareas.tareaForm', compact('tarea'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarea $tarea)
    {
        $request->validate([
            'tarea' => 'required|max:255',
            'descripcion' => 'required',
            'fecha_entrega' => 'required|date',
            'prioridad' => 'required|int|min:1|max:3',
        ]);

        $tarea->tarea = $request->tarea;
        $tarea->descripcion = $request->descripcion;
        $tarea->fecha_entrega = $request->fecha_entrega;
        $tarea->prioridad = $request->prioridad;
        // dd($tarea);
        $tarea->save();

        return redirect()->route('tarea.show', $tarea->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarea $tarea)
    {
        $tarea->delete();
        return redirect()->route('tarea.index');
    }
}
