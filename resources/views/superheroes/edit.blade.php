<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar superheroe</title>
</head>
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
    <form action="{{ route('superheroes.destroy', $superheroe) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('delete')
        <br>
        <button type="submit">Eliminar</button>
  </form>
  <br>
  <a href="{{route('superheroes.index')}}">Regresar</a>
</body>
</html>