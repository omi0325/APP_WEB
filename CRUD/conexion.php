<?php
#creacion de una funcion llamada conectar
#funcion, bloque de codigo que podemos mandar a llamar cuando lo necesitamos
    function conectar(){
        /* informacion del servidor*/
        $host="localhost";
        $user="root";
        $pass="";
        /* base de datos */
        $db="AW_CRUD";
        #funcion de php que permite conectar a MYSQL
        $con=mysqli_connect($host,$user,$pass);
        #Con esto nosotros le estamos diciendo que BD vamos a utilizar, pasamos la informacion 
        mysqli_select_db($con,$db);
        return $con;
    }
?>