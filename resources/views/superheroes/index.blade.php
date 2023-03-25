<!DOCTYPE html>
<html lang="en">
    <!--
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de superheroes</title>
</head>-->
@extends('layouts.app')

@section('content')
<div class="container">
    <body>
        <?php $padding = "10px"?>
            <table class="table table-bordered table-hover">
                <tr>
                    <td style="padding:<?php echo $padding?>"><strong>Imagen</strong></td>
                    <td style="padding:<?php echo $padding?>"><strong>Nombre de superheroe</strong></td>
                    <td style="padding:<?php echo $padding?>"><strong>Nombre real</strong></td>
                    <td style="padding:<?php echo $padding?>"><strong>Datos</strong></td>
                    <td style="padding:<?php echo $padding?>"><strong>Cambios</strong></td>
                </tr>
            @foreach ($Superheroes as $superheroe)
            <tr>
                <td style="padding:<?php echo $padding?>"><img class="img-thumbnail img-fluid" width="100" height="100" src='images/uploads/{{$superheroe->imagen}}'></td>
                <td style="padding:<?php echo $padding?>">{{$superheroe->nombreHeroe}}</td>
                <td style="padding:<?php echo $padding?>">{{$superheroe->nombreReal}}</td>
                <td style="padding:<?php echo $padding?>">{{$superheroe->infoExtra}}</td>
                <td style="padding:<?php echo $padding?>">
                    <form action="{{ route('superheroes.edit', $superheroe) }}" class="d-inline-flex">
                        @csrf
                        <br>
                        <button type="submit" class="btn btn-secondary">Editar</button>
                    </form>
                    <form action="{{ route('superheroes.destroy', $superheroe) }}" class="d-inline-flex" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('delete')
                        <br>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                  </form>
                </td>
            </tr>
            @endforeach
        </table>
        <form action="{{ route('superheroes.create') }}" >
            @csrf
            <button type="submit" class="btn btn-success">Agregar superheroe</button>
        </form>
    </body>
    </html>
</div>
@endsection