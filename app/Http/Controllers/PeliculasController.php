<?php

namespace App\Http\Controllers;

use App\Models\peliculas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PeliculasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(id)
    {
        $datos['peliculas']=peliculas::paginate(5);
        return view('peliculas.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(id)
    {
        return view('peliculas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos=[
            'Título'=>'required|string|max:100',
            'Portada'=>'required|max:10000|mimes:jpeg,png,jpg',
            'Estudio'=>'required|string|max:100',
            'Género'=>'required|string|max:100',
            'Año'=>'required|string|max:100',
            'Director'=>'required|string|max:100',
        ];
        $mensaje=[
            'required'=>'El :attribute es Requerido'
            'Portada.required'=>'La Imagen es Requerida'
        ];
        $this->validate($request,$campos,$mensaje);
        //$datospeliculas = request()->all();
        $datospeliculas = request()->except('_token');
        if($request->hasFile(Portada)){
            $datospeliculas['Portada']=$request->file('Portada')->store('uploads','public');
        }
        peliculas::insert($datospeliculas);
        //return Response()->json($datospeliculas);
        return redirect('peliculas')->with('mensaje','agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\peliculas  $peliculas
     * @return \Illuminate\Http\Response
     */
    public function show(peliculas $peliculas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\peliculas  $peliculas
     * @return \Illuminate\Http\Response
     */
    public function edit(peliculas $peliculas)
    {
        return view('peliculas.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\peliculas  $peliculas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'Título'=>'required|string|max:100',
            'Estudio'=>'required|string|max:100',
            'Género'=>'required|string|max:100',
            'Año'=>'required|string|max:100',
            'Director'=>'required|string|max:100',
        ];
        $mensaje=[
            'required'=>'El :attribute es Requerido'
        ];
        if($request->hasFile('Portada')){
            $campos=['Portada'=>'required|max:10000|mimes:jpeg,png,jpg'];
            $mensaje=['Portada.required'=>'La Imagen es Requerida'];
        }
        $this->validate($request,$campos,$mensaje);

        $datospeliculas=request()-except(['_token','_method']);

        if($request->hasFile(Portada)){
            $peliculas=peliculas::findOrFail($id);
            Storage::delete(['public'.$peliculas->Portada]);
            $datospeliculas['Portada']=$request->file('Portada')->store('uploads','public');
        }
        peliculas::where('id','=',$id)->update(datospeliculas);
        
        //return view('peliculas.edit', compact('peliculas'));
        return redirect('peliculas')->with('mensaje','modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\peliculas  $peliculas
     * @return \Illuminate\Http\Response
     */
    public function destroy(peliculas $peliculas)
    {
        $peliculas=peliculas::findOrFail($id);
        if(Storage::delete('public/'.$peliculas->Portada)){
            peliculas::destroy($id)
        }
        peliculas::destroy($id);
        return redirect('peliculas')->with('mensaje','borrado con éxito');
    }
}
