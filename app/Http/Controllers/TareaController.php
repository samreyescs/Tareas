<?php

namespace App\Http\Controllers;

use App\Tarea;
use App\Categoria;
use Illuminate\Http\Request;

class TareaController extends Controller
{

    public function __construct() {
        $this->middleware('auth')->except(['index', 'show']); //only([])
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tareas = Tarea::all(); // Se le pide que de modelo tarea traigaa todo
        return view('tareas.tareaIndex', compact('tareas'));
        //return view('tareas/tareaIndex')->with(['tareas' => @tareas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all() -> pluck('nombre', 'id');
        //dd($categorias);
        return view('tareas.tareaForm', compact('categorias'));
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
            'tarea' => 'required|max:255',
            'descripcion' => 'required',
            'fecha_entrega' => 'required|date',
            'prioridad' => 'required|int|min:1|max:5'
        ]);

        $tarea = new Tarea();
        $tarea->user_id = \Auth::id();
        $tarea->tarea = $request->tarea;
        $tarea->descripcion = $request->descripcion ?? '';
        $tarea->fecha_entrega = $request->fecha_entrega;
        $tarea->prioridad = $request->prioridad;
        $tarea->categoria_id = $request->categoria_id;
        $tarea->save();
        //dd($request->all()); // los datos que estas recibiendo del form
        //dd($request->tarea);
        return  redirect()->route('tarea.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function show(Tarea $tarea)
    {
        return view('tareas.tareaShow', compact('tarea'));// mete compact
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarea $tarea)
    {
        $categorias = Categoria::all() -> pluck('nombre', 'id');
        return view('tareas.tareaForm', compact('tarea', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarea $tarea) // el request es el formulario con lo que  queremos acutualizar y la tarea es al que queremos que se modifique
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
        $tarea->categoria_id = $request->categoria_id;
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
        return  redirect()->route('tarea.index');
    }
}
