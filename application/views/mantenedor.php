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
    <title>Prueba Solutoria - Mantenedor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
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
        <h1 class="my-4">Datos históricos de UF, que se puede modificar a través de un CRUD</h1>
        <div hidden id="alerta_ingresar" class="alert alert-success" role="alert">Se ha agregado un registro</div>
        <div hidden id="alerta_editar" class="alert alert-warning" role="alert">Se ha editado un registro</div>
        <div hidden id="alerta_eliminar" class="alert alert-danger" role="alert">Se ha eliminado un registro</div>
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Añadir registro</button>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Añadir registro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                    <div class="mb-3">
                        <label for="añadir_fecha" class="form-label">Fecha:</label>
                        <input type="text" class="form-control" id="añadir_fecha">
                    </div>
                    <div class="mb-3">
                        <label for="añadir_valor" class="form-label">Valor:</label>
                        <input type="text" class="form-control" id="añadir_valor">
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="btn_añadir" type="submit" class="btn btn-success">Guardar</button>
                </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Editar registro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                    <div class="mb-3">
                        <label for="fecha_antigua" class="form-label">Fecha antigua:</label>
                        <p id="fecha_antigua"></p>
                        <label for="fecha_nueva" class="form-label">Fecha nueva:</label>
                        <input type="text" class="form-control" id="fecha_nueva">
                    </div>
                    <div class="mb-3">
                        <label for="valor_antiguo" class="form-label">Valor antiguo:</label>
                        <p id="valor_antiguo"></p>
                        <label for="valor_nuevo" class="form-label">Valor nuevo:</label>
                        <input type="text" class="form-control" id="valor_nuevo">
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="btn_editar" type="submit" class="btn btn-warning">Guardar</button>
                </div>
                </div>
            </div>
        </div>
        

        <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">Eliminar registro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Estas seguro que deseas eliminar este registro?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="btn_eliminar" type="submit" class="btn btn-danger">Eliminar</button>
                </div>
                </div>
            </div>
        </div>
        <div hidden id="wait" class="text-center mt-3">
            <h2>Se está generando la tabla, esto tomará algunos segundos</h2>
            <i class="fa-5x fas fa-cog fa-spin"></i>
        </div>
        <div id="tabla">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Fecha</th>
                        <th>Valor</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Fecha</th>
                        <th>Valor</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </tfoot>
            </table>
        </div>



    </section>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/js/mantenedor.js')?>"></script>
</body>
</html>
