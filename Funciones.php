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

function insertar_datos($id_tran, $nombre, $plata, $fec_ingre, $id_rol) {
    $salida = ""; // Se inicializa la variable 
    $conexion = mysqli_connect('localhost', 'root', 'root', 'practica_03'); // Se establece la conexión a la base de datos

    $sq = "INSERT INTO tb_personas (id_transaccin, Nombre, Plata, Fecha_ingreso, id_rol) VALUES ('$id_tran', '$nombre', '$plata', '$fec_ingre', '$id_rol')"; // Se define la consulta SQL para insertar un nuevo registro en la tabla tb_personas con los valores proporcionados

    $resultado = $conexion->query($sq); // Consulta SQL 

    if ($resultado) { // Si el resultado de la consulta es verdadero 
        $salida = "Registro exitoso"; // Se actualiza la variable 
    } else { // Si el resultado de la consulta es falso 
        $salida = "Error en el registro: " . $conexion->error; // Se actualiza la variable $salida con el mensaje "Error en el registro" seguido del mensaje de error específico proporcionado por MySQL
    }

    $conexion->close(); // Se cierra la conexión a la base de datos

    return $salida; // Se retorna el valor de la variable
}

function Delete_User($id_tran) {

    $conexion = mysqli_connect('localhost', 'root', 'root', 'practica_03'); // Se establece la conexión a la base de datos
    $sq = "DELETE FROM tb_personas WHERE id_transaccin = '$id_tran'"; // Se define la consulta SQL 

    if (mysqli_query($conexion, $sq)) { // Si el resultado de la consulta es verdadero 
        if (mysqli_affected_rows($conexion) > 0) {
            return 'El usuario ha sido borrado exitosamente.';  // Se retorna el mensaje de éxito
        } 
    } else { // Si el resultado de la consulta es falso 
            return 'No se pudo borrar el usuario.';  // Se retorna el mensaje de error
    }
}
/*
function insertar_datos($id_tran, $nombre, $plata, $fec_ingre, $id_rol) {
    $salida = ""; // Se inicializa la variable 
    $conexion = mysqli_connect('localhost', 'root', 'root', 'practica_03'); // Se establece la conexión a la base de datos

    $sq = "INSERT INTO tb_personas (id_transaccin, Nombre, Plata, Fecha_ingreso, id_rol) VALUES ('$id_tran', '$nombre', '$plata', '$fec_ingre', '$id_rol')"; // Se define la consulta SQL para insertar un nuevo registro en la tabla tb_personas con los valores proporcionados

    $resultado = $conexion->query($sq); // Consulta SQL 

    if ($resultado) { // Si el resultado de la consulta es verdadero 
        $salida = "Registro exitoso"; // Se actualiza la variable 
    } else { // Si el resultado de la consulta es falso 
        $salida = "Error en el registro: " . $conexion->error; // Se actualiza la variable $salida con el mensaje "Error en el registro" seguido del mensaje de error específico proporcionado por MySQL
    }

    $conexion->close(); // Se cierra la conexión a la base de datos

    return $salida; // Se retorna el valor de la variable
}*/

function insertar_sitio($sitio,$id_tran ) {
    $salida = ""; // Se inicializa la variable 
    $conexion = mysqli_connect('localhost', 'root', 'root', 'practica_03'); // Se establece la conexión a la base de datos

    $sq = "UPDATE tb_personas SET Tu_sitio = '$sitio' WHERE id_transaccin = '$id_tran'";

    $resultado = $conexion->query($sq); // Consulta SQL 

    if ($resultado) { // Si el resultado de la consulta es verdadero 
        $salida = "Actualizaste con  exito tu sitio"; // Se actualiza la variable 
    } else { // Si el resultado de la consulta es falso 
        $salida = "Error al actualizar tu sitio " . $conexion->error; // Se actualiza la variable $salida con el mensaje "Error en el registro" seguido del mensaje de error específico proporcionado por MySQL
    }

    $conexion->close(); // Se cierra la conexión a la base de datos

    return $salida; // Se retorna el valor de la variable
}

function mostrar_sitio($id_tran) {
    $salida = ''; // Se inicializa la variable 
    $conexion = mysqli_connect('localhost', 'root', 'root', 'practica_03'); // Se establece la conexión a la base de datos

    $sq = "SELECT (Tu_sitio) AS Sitio from tb_Personas where id_transaccin='$id_tran'";

    $resultado = $conexion->query($sq); // Consulta SQL 

    while ($Fila = mysqli_fetch_assoc($resultado)) {
        $salida.="<a href='".$Fila['Sitio']."'>";
        $salida.="Ve al sitio ";     
        
        $salida.="</a>";

    $conexion->close(); // Se cierra la conexión a la base de datos

    return $salida; // Se retorna el valor de la variable
}}

?>

