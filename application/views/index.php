<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Prueba Solutoria - Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-dark bg-dark static-top">
        <div class="container">
            <a class="navbar-brand" href="./">Prueba Solutoria</a>
            <a class="btn btn-primary" href="./mantenedor">Mantenedor de UF</a>
        </div>
    </nav>
    <section class="text-center">
        <h1 class="my-4">Gráfico que despliega datos por tipo de indicador</h1>
        <div class="col align-self-center col-md-4 offset-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <form id="form">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-form-label text-right">Selecciona el tipo de indicador: </label>
                            <select id="select1" class="form-control">
                                <option value="uf">uf</option>
                                <option value="ivp">ivp</option>
                                <option value="dolar">dolar</option>
                                <option value="dolar_intercambio">dolar_intercambio</option>
                                <option value="euro">euro</option>
                                <option value="ipc">ipc</option>
                                <option value="utm">utm</option>
                                <option value="imacec">imacec</option>
                                <option value="tpm">tpm</option>
                                <option value="libra_cobre">libra_cobre</option>
                                <option value="tasa_desempleo">tasa_desempleo</option>
                                <option value="bitcoin">bitcoin</option>
                            </select>
                        </div>
                        </div>
                        <div class="form-group align-self-center col-md-4 mb-3">
                            <button type="submit" class="form-control btn btn-primary">Generar grafico</button>
                        </div>
                    </form>
                </div>
            </div>    
            <div hidden id="wait" class="text-center mt-3">
                <h2>Se está generando el gráfico, esto tomará algunos segundos</h2>
                <i class="fa-5x fas fa-cog fa-spin"></i>
            </div>
            <div id='myDiv'>
        </div>
    </section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src='https://cdn.plot.ly/plotly-latest.min.js'></script>
<script src="<?= base_url('assets/js/index.js')?>"></script>
</body>
</html>
