<!DOCTYPE html>
<html lang="en">
@extends('layouts.app')

@section('content')
<div class="container">
<body>
    <form action="{{route('superheroes.update',$superheroe)}}" method="POST" enctype="multipart/form-data">
        <!--El token, es importante para mandar datos-->
        @csrf
        @method("put")
        <h1>Editar superheroe</h1>
        <!--Nombre del superheroe-->
        <label>Nombre superheroe</label>
        <br>
        <input type="text" name="nombreHeroe" value="{{$superheroe->nombreHeroe}}">
        <br>
        <!--Nombre real-->
        <label>Nombre real</label>
        <br>
        <input type="text" name="nombreReal" value="{{$superheroe->nombreReal}}">
        <br>
        <!--Info extra-->
        <label>info extra del heroe</label>
        <br>
        <textarea name="infoExtra">{{$superheroe->infoExtra}}</textarea>
        <br>
        <!--Imagen-->
        <label>Imagen</label>
        <br>
        <input type="file" name="imagen" id="imagen" accept="image/*" value="images/uploads/{{$superheroe->imagen}}">
        <br>
        <br>
        <button type="submit">Editar superheroe</button>
    </form>
  <br>
  <a href="{{route('superheroes.index')}}">Regresar</a>
</body>
</html>
</div>
@endsection