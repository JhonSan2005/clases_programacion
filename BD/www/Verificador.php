<?php

    /**
    * Autor: Camilo Figueroa ( Crivera )
    * La siguiente clase se crea para verificar algunos aspectos de la instalación del aplicativo. 
    *
    */

    class Verificador
    {
        
        /**
        * Esta función es el método constructor de la clase.
        */
        function Verificador()
        {

        }

        /**
        * Método que muestra las tablas creadas o el conteo de las tablas existentes.
        * @param        conexion            Un parámetro tipo conexión, es decir, no se necesitan todos los argumentos de una conexión.
        * @param        número              El tipo de opción a escoger, 1 es retornar el html con las tablas y 2 es retornar el conteo de las tablas.
        * @return       texto               Un html con el nombre de las tablas existentes o un número con el total de tablas existentes. 
        */
        function mostrar_tablas( $conexion, $opcion = null )
        {
            $salida = "<br><br> --- Tablas instaladas --- <br>";
            $resultado = $conexion->query( "SHOW TABLES" );
            $conteo = 0;

            while( $fila = mysqli_fetch_array( $resultado ) )
            {
                $salida .= $fila[ 0 ]."<br>";
                $conteo ++;
            }

            if( $opcion == 2 ) $salida = $conteo; 

            return $salida;
        }

        /**
        * Borra un archivo del sistema.
        * @param        texto           nombre del archivo que se va a borrar.
        */
        function borrar_archivo( $nombre_archivo )
        {
            unlink( $nombre_archivo );
        }

    }