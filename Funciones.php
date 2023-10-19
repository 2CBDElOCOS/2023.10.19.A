<?php
function consulta(){

    $Salida=0;          //Se iniciliza la variable
    $conexion = mysqli_connect('localhost', 'root', 'root', 'practica_03');//Se establece la conexion a la base de datos

    $sql="Select 2+1";  //Consulta SQL
    $sql.=" as suma";    //Consulta SQL
    $resultado = $conexion->query($sql);    //Ejecuta la consulta

    //Recorre el recordset
    While($Fila=mysqli_fetch_assoc($resultado)){
        $Salida+=$Fila['suma'];    //Inch o acumula
    }

    $conexion->close(); //Se finaliza la conexion

    return $Salida;     //Retorna la salida con dicho resultado

}



function Calculo_1(){

    $Salida=0;          //Se iniciliza la variable
    $conexion = mysqli_connect('localhost', 'root', 'root', 'practica_03');//Se establece la conexion a la base de datos

    $sql="Select 10 as n1,";  //Consulta SQL
    $sql.=" 20 as n2";    //Consulta SQL
    $resultado = $conexion->query($sql);    //Ejecuta la consulta

    //Recorre el recordset
    While($Fila=mysqli_fetch_assoc($resultado)){
        $Salida+=$Fila['n1'];      //Inch o acumula
        $Salida+=$Fila['n2'];     //Inch o acumula
    }

    $conexion->close(); //Se finaliza la conexion

    return $Salida;     //Retorna la salida con dicho resultado

}

function Calculo_2(){

    $Salida=0;          //Se iniciliza la variable
    $Mayor="Puedes continuar, tienes: ";//Define la variable junto a un mensaje
    $Menor="Prohibido, tienes: ";//Define la variable junto a un mensaje
    $conexion = mysqli_connect('localhost', 'root', 'root', 'practica_03');//Se establece la conexion a la base de datos

    $sql="Select 21";  //Consulta SQL
    $sql.=" as edad";    //Consulta SQL
    $resultado = $conexion->query($sql);    //Ejecuta la consulta

    //Recorre el recordset
    while ($Fila = mysqli_fetch_assoc($resultado)) {
        $edad = $Fila['edad'];     //Inch o acumula
        $Salida = $edad;          //Inch o acumula

        if ($Salida >= 18) {  // Verifica si el resultado es mayor o igual a 18
            $Salida=$Mayor.$Salida; 
        }else{                // Verifica si el resultado es menor a 18
            $Salida=$Menor.$Salida; 
        }
    }
    $conexion->close(); //Se finaliza la conexion

    return $Salida;     //Retorna la salida con dicho resultado
}

function Count_Users() {
    $Salida = 0; // Se inicializa la variable $Salida con el valor 0
    $conexion = mysqli_connect('localhost', 'root', 'root', 'practica_03'); // Se establece la conexión a la base de datos

    $sql = "SELECT count(*) FROM tb_personas"; // Consulta SQL 
    $resultado = $conexion->query($sql); // Se ejecuta la consulta y se guarda el resultado en la variable $resultado

    if ($resultado && mysqli_num_rows($resultado) > 0) { // Se verifica si el resultado de la consulta es válido y si contiene al menos una fila
        $Fila = mysqli_fetch_assoc($resultado); // Se obtiene la primera fila del resultado como un array asociativo
        $Salida = $Fila['count(*)']; // Se accede al valor del índice 'count(*)' en el array $Fila y se guarda en la variable $Salida
    }

    $conexion->close(); // Se cierra la conexión a la base de datos

    return $Salida; // Se retorna el valor de la variable $Salida
}

?>
