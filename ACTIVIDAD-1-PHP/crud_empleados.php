<?php
if (!empty($_POST)){
    $txt_id =  utf8_decode($_POST["txt_id"]);
    $txt_codigo =  utf8_decode($_POST["txt_codigo"]);
    $txt_nombres =  utf8_decode($_POST["txt_nombres"]);
    $txt_apellidos =  utf8_decode($_POST["txt_apellidos"]);
    $txt_dirección =  utf8_decode($_POST["txt_dirección"]);
    $txt_telefono =  utf8_decode($_POST["txt_telefono"]);
    $drop_puesto =  utf8_decode($_POST["drop_puesto"]);
    $txt_fn =  utf8_decode($_POST["txt_fn"]);

    $sql ="";

    if (isset($_POST["btn_agregar"])) {
        $sql = "INSERT INTO empleados(Codigo,Nombres,Apellidos,Dirección,Telefono,fecha_nacimiento,id_puesto)VALUES('" . $txt_codigo . "','" . $txt_nombres . "','" . $txt_apellidos . "','" . $txt_dirección . "','" . $txt_telefono . "','" . $txt_fn . "'," . $drop_puesto . ");";
    }   
    if( isset($_POST['btn_modificar'])  ){
        $sql = "update empleados set codigo='". $txt_codigo ."',nombres='". $txt_nombres ."',apellidos='". $txt_apellidos ."',dirección='". $txt_dirección ."',telefono='". $txt_telefono ."',fecha_nacimiento='". $txt_fn ."',id_puesto=". $drop_puesto ." where id_empleados = ". $txt_id.";";
    }
    if( isset($_POST['btn_eliminar'])  ){
        $sql = "delete from empleados where id_empleados = ". $txt_id.";";
    }

        include("datos_conexion.php");
                $bd_conexion = mysqli_connect($bd_host, $bd_usr, $bd_pass, $bd_nombre);

                
                if ($bd_conexion->query($sql) === true) {
                    $bd_conexion->close();
                    echo"Exito";
                    header("Location: /empresa2_php");
                } else {
                    echo "Error" . $sql . "<br>" . $bd_conexion->error;
                }
        
}

?>