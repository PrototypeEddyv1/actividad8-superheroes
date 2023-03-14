<?php

namespace App\Http\Controllers;

use App\Models\Superheroe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuperheroeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Superheroes = Superheroe::orderBy('id','desc')->get();
        return view("superheroes.index",compact('Superheroes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("superheroes.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $superheroe = new Superheroe();
        $superheroe->nombreHeroe = $request->nombreHeroe;
        $superheroe->nombreReal = $request->nombreReal;
        $superheroe->infoExtra = $request->infoExtra;
        //Esto sirve para guardar la imagen que se sube
        if ($request->hasFile('imagen')){
            //Nombramos el archivo
            $archivo = $request->file('imagen');
            //$request->file('imagen')
            //Agregamos una url para guardarlo
            $destino = 'images/uploads/';
            //Creamos el nombre del archivo para que sea unico
            $nombreArchivo = time() . '-' . $archivo->getClientOriginalName();
            //Movemos la imagen solicitada a la carpeta que hemos hecho, por algun motivo nombrarlo como variable es la unica manera de guardar la imagen
            $crearArchivo = $request->file('imagen')->move($destino,$nombreArchivo);
            //Y luego en la base de datos guardamos la ruta y nombre del archivo
            $superheroe->imagen = $nombreArchivo;
        }
        $superheroe->save();
        return redirect()->route("superheroes.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Superheroe $superheroe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Superheroe $superheroe)
    {
        return view('superheroes.edit', compact('superheroe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Superheroe $superheroe)
    {
        $superheroe->nombreHeroe = $request->nombreHeroe;
        $superheroe->nombreReal = $request->nombreReal;
        $superheroe->infoExtra = $request->infoExtra;
        //Esto sirve para guardar la imagen que se sube
        if ($request->hasFile('imagen')){
            //Nombramos el archivo
            $archivo = $request->file('imagen');
            //$request->file('imagen')
            //Agregamos una url para guardarlo
            $destino = 'images/uploads/';
            //Creamos el nombre del archivo para que sea unico
            $nombreArchivo = time() . '-' . $archivo->getClientOriginalName();
            //Movemos la imagen solicitada a la carpeta que hemos hecho, por algun motivo nombrarlo como variable es la unica manera de guardar la imagen
            $crearArchivo = $request->file('imagen')->move($destino,$nombreArchivo);
            //Y luego en la base de datos guardamos la ruta y nombre del archivo
            $superheroe->imagen = $nombreArchivo;
        }
        $superheroe->save();
        return redirect()->route("superheroes.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Superheroe $superheroe)
    {
        //if(Storage::delete(['images/uploads/', $superheroe->imagen]));
        if (file_exists('images\uploads\\'.$superheroe->imagen)){
            unlink('images\uploads\\'.$superheroe->imagen);
        }
        $superheroe->delete();
        return redirect()->route("superheroes.index");

    }
}
