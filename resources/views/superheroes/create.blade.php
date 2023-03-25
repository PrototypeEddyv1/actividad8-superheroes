<!DOCTYPE html>
@extends('layouts.app')

@section('content')
<div class="container">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear superheroe</title>
</head>
<body>
    <form action="{{route("superheroes.store")}}" method="POST" enctype="multipart/form-data">
        <!--El token, es importante para mandar datos-->
        @csrf
        <h1 class="p-1 m-6 bg-success text-white">Crear superheroe</h1>
        <!--Nombre del superheroe-->
        <label>Nombre superheroe</label>
        <br>
        <input type="text" name="nombreHeroe">
        <br>
        <!--Nombre real-->
        <label>Nombre real</label>
        <br>
        <input type="text" name="nombreReal">
        <br>
        <!--Info extra-->
        <label>info extra del heroe</label>
        <br>
        <textarea name="infoExtra"></textarea>
        <br>
        <!--Imagen-->
        <label>Imagen</label>
        <br>
        <input type="file" class="btn btn-info" name="imagen" id="imagen" accept="image/*">
        <br>
        <br>
        <button type="submit" class="btn btn-success">Agregar superheroe</button>
    </form>
    <br>
    <br>
    <br>
    <form action="{{route('superheroes.index')}}">
        <button type="submit" class="btn btn-secondary">Regresar</button>
    </form>
</body>
</html>
</div>
@endsection