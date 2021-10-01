<?php
/*incluir un archivo*/
include_once 'db.php';

/* codigo para poder inserta*/ 

if(isset($_POST['save'])){

    /* para que no haya basura */
    $fecha = $MySQLiconn->real_escape_string($_POST['fecha']);
    $autor = $MySQLiconn->real_escape_string($_POST['autor']);
    $titulo= $MySQLiconn->real_escape_string($_POST['titulo']);
    $direccion = $MySQLiconn->real_escape_string($_POST['direccion']);
    $especialidad = $MySQLiconn->real_escape_string($_POST['especialidad']);
    $editorial = $MySQLiconn->real_escape_string($_POST['editorial']);
    $id = $MySQLiconn->real_escape_string($_POST['id']);
    
    /*Query es un metodo , la consulta que realizaremos en la bd*/ 
    $SQL = $MySQLiconn->query("INSERT INTO libros(fecha,autor,titulo,direccion,especialidad,editorial,id) values('$fecha','$autor','$titulo','$direccion','$especialidad','$editorial','$id')");

    /*el simbolo "!" es negación " NO SE EJECUTA EL SQL" */
    if(!$SQL)
    {
        echo $MySQLiconn->error;
    }

}

/*Codigo para poder eliminar*/

if (isset($_GET['del'])) 
{
    $SQL = $MySQLiconn->query("DELETE FROM libros WHERE id=".$_GET['del']);
    /* Para que se recargue la misma pagina cuando eliminemos. */
    header("Location: index.php");
}


/* Codigo para cargar datos */

if (isset($_GET['edit'])) 
{
    $SQL = $MySQLiconn->query("SELECT * FROM  libros where id=".$_GET['edit']);

    /*la data que estamos extrayendo lo convierte a una array "fetch_array"*/
    $getROW = $SQL->fetch_array();
}


if (isset($_POST['update'])) {
    $SQL = $MySQLiconn->query("UPDATE libros SET fecha='"
    .$_POST['fecha']."',autor='".$_POST['autor']."',
    titulo='".$_POST['titulo']."',
    direccion='".$_POST['direccion']."',
    especialidad='".$_POST['especialidad']."',
    editorial='".$_POST['editorial']."',
    
     WHERE id="
    .$_GET['edit']);
    
    header("Location: index.php");
}

