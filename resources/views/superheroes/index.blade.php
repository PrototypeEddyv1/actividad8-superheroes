<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de superheroes</title>
</head>
<body>
    <?php $padding = "10px"?>
    <table>
        <tr>
            <td style="padding:<?php echo $padding?>"><strong>Imagen</strong></td>
            <td style="padding:<?php echo $padding?>"><strong>Nombre de superheroe</strong></td>
            <td style="padding:<?php echo $padding?>"><strong>Nombre real</strong></td>
            <td style="padding:<?php echo $padding?>"><strong>Datos</strong></td>
            <td style="padding:<?php echo $padding?>"><strong>Cambios</strong></td>
        </tr>
        @foreach ($Superheroes as $superheroe)
        <tr>
            <td style="padding:<?php echo $padding?>"><img width="100" height="100" src='images/uploads/{{$superheroe->imagen}}'></td>
            <td style="padding:<?php echo $padding?>">{{$superheroe->nombreHeroe}}</td>
            <td style="padding:<?php echo $padding?>">{{$superheroe->nombreReal}}</td>
            <td style="padding:<?php echo $padding?>">{{$superheroe->infoExtra}}</td>
            <td style="padding:<?php echo $padding?>"><a href="{{route('superheroes.edit',$superheroe)}}">Editar</a></td>
        </tr>
        @endforeach
    </table>
    
    <!--Si recuerda lo que aparecio en web, al usar ->name() no importa si cambie el link de route::get(), de todas maneras llevara al create
    esto sirve para ahorrar trabajo-->
    <a href="{{route('superheroes.create')}}">Crear superheroe</a>
</body>
</html>