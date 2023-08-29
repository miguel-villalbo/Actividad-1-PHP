<!doctype html>
<html lang="en">

<head>
  <title>Ejercicio php</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
    <h1>Formulario Empleados</h1>
    <div class="container">
        <form class="d-flex" action="crud_empleados.php" method="post" >
            <div class="col">
            <div class="mb-3">
                    <label for="lbl_id" class="form-label"><b>ID</b></label>
                    <input type="text" name="txt_id" id="txt_id" class="form-control" value="0" readonly>  
                </div>
                <div class="mb-3">
                    <label for="lbl_codigo" class="form-label"><b>Codigo</b></label>
                    <input type="text" name="txt_codigo" id="txt_codigo" class="form-control" placeholder="Codigo: E001" required>  
                </div>
                <div class="mb-3">
                    <label for="lbl_nombres" class="form-label"><b>Nombres</b></label>
                    <input type="text" name="txt_nombres" id="txt_nombres" class="form-control" placeholder="Nombres: nombre1 nombre2" required>  
                </div>
                <div class="mb-3">
                    <label for="lbl_apellidos" class="form-label"><b>Apellidos</b></label>
                    <input type="text" name="txt_apellidos" id="txt_apellidos" class="form-control" placeholder="Apellidos: apellido1 apellido2" required>  
                </div>
                <div class="mb-3">
                    <label for="lbl_dirección" class="form-label"><b>Dirección</b></label>
                    <input type="text" name="txt_dirección" id="txt_dirección" class="form-control" placeholder="Dirección: #casa calle avenida lugar" required>  
                </div>
                <div class="mb-3">
                    <label for="lbl_telefono" class="form-label"><b>Telefono</b></label>
                    <input type="number" name="txt_telefono" id="txt_telefono" class="form-control" placeholder="Telefono 555" required>  
                </div>
                <div class="mb-3">
                    <label for="lbl_puesto" class="form-label"><b>puesto</b></label>
                    <select class="form-select" name="drop_puesto" id="drop_puesto">
                        <option value="0">---puesto---</option>
                        <?php
                        include("datos_conexion.php");
                        $bd_conexion = mysqli_connect($bd_host,$bd_usr,$bd_pass,$bd_nombre);
                        $bd_conexion ->real_query("select id_puesto as id_puesto,puesto from puestos;");
                        $resultado = $bd_conexion->use_result();
                        while($fila = $resultado->fetch_assoc()){
                            echo"<option value=". $fila['id_puesto'] .">". $fila['puesto'] ."</option>";
                        }
                        $bd_conexion ->close();
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="lbl_fn" class="form-label"><b>fecha_nacimiento</b></label>
                    <input type="date" name="txt_fn" id="txt_fn" class="form-control" placeholder="aaaa-mm-dd" required>  
                </div>
                <div class="mb-3">
                    <input type="submit" name="btn_agregar" id="btn_agregar" class="btn btn-primary" value="Agregar">  
                    <input type="submit" name="btn_modificar" id="btn_modificar" class="btn btn-success" value="Modificar">  
                    <input type="submit" name="btn_eliminar" id="btn_eliminar" class="btn btn-danger" value="Eliminar">  
                </div>
            </div>
            </form>
            <table class="table table-striped table-inverse table-responsive">
                <thead class="table-inverse">
                    <tr>
                        <th>Codigo</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Dirección</th>
                        <th>Telefono</th>
                        <th>Puesto</th>
                        <th>Nacimiento</th>
                    </tr>
                </thead>
                <tbody id="tbl_empleados">
                <?php
                        include("datos_conexion.php");
                        $bd_conexion = mysqli_connect($bd_host,$bd_usr,$bd_pass,$bd_nombre);
                        $bd_conexion ->real_query("SELECT e.id_Empleados as id,e.Codigo,e.Nombres,e.Apellidos,e.Dirección,e.Telefono,p.puesto,e.fecha_nacimiento,e.id_puesto FROM empleados as e inner join puestos as p on e.id_puesto = p.id_puesto;
                        ");
                        $resultado = $bd_conexion->use_result();
                        while($fila = $resultado->fetch_assoc()){
                            echo"<tr data-id=" . $fila['id'] . " data-idp=". $fila['id_puesto'] . ">";
                            echo"<td>". $fila['Codigo'] ."</td>";
                            echo"<td>". $fila['Nombres'] ."</td>";
                            echo"<td>". $fila['Apellidos'] ."</td>";
                            echo"<td>". $fila['Dirección'] ."</td>";
                            echo"<td>". $fila['Telefono'] ."</td>";
                            echo"<td>". $fila['puesto'] ."</td>";
                            echo"<td>". $fila['fecha_nacimiento'] ."</td>";
                            echo"<tr>";
                        }
                        $bd_conexion ->close();
                        ?>
                </tbody>
            </table>
        </div>
    </div>
<!---->

  <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

<script>
    $("#tbl_empleados").on('click','tr td',function (e){
        var target,id,idp,codigo,nombres,apellidos,dirección,telefono,fn;
        target =$(event.target);
        id = target.parent().data('id');
        idp = target.parent().data('idp');
        codigo = target.parent('tr').find("td").eq(0).html();
        nombres = target.parent('tr').find("td").eq(1).html();
        apellidos = target.parent('tr').find("td").eq(2).html();
        dirección = target.parent('tr').find("td").eq(3).html();
        telefono = target.parent('tr').find("td").eq(4).html();
        fn = target.parent('tr').find("td").eq(6).html();
        $("#txt_id").val(id);
        $("#txt_codigo").val(codigo);
        $("#txt_nombres").val(nombres);
        $("#txt_apellidos").val(apellidos);
        $("#txt_dirección").val(dirección);
        $("#txt_telefono").val(telefono);
        $("#txt_fn").val(fn);
        $("#drop_puesto").val(idp);
    })
</script>
</body>
</html>