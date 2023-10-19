<?php
function consulta(){

    $Salida=0;          //Se iniciliza la variable
    $conexion = mysqli_connect('localhost', 'root', 'root', 'practica_03');//Se establece la conexion a la base de datos

    $sql="Select 2+1";  //Consulta SQL
    $sql.=" as suma";    //Consulta SQL
    $resultado = $conexion->query($sql);//Ejecuta la consulta

    //Recorre el recordset
    While($Fila=mysqli_fetch_assoc($resultado)){
        $Salida+=$Fila['suma'];    //Inch o acumula
    }

    return $Salida;     //Retorna la salida con dicho resultado

}

function Aprender(){

    $Salida=0;         //Se iniciliza la variable

    $Salida=2*2;       //Calcula el area de un triangulo

    return $Salida;    //Retorna la salida con dicho resultado

}

?>
