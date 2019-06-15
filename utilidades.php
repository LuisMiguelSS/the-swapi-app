<?php

    /**
    * @param int Número
    * @return string Resultado
    */
    function representacionRomana($numero) {
        $resultado = '';
        $mapa = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);

        while ($numero > 0) {
            foreach ($mapa as $romano => $entero) {
                if($numero >= $entero) {
                    $numero -= $entero;
                    $resultado .= $romano;
                    break;
                }
            }
        }
        return $resultado;
    }


    /**
    * @param array Array que ordenar
    * @param string Campo por el que ordenar
    * @return array Array ya ordenado por el campo
    */
    function ordenarPor($array,$campo) {
        $codigo_funcion_reemplazo = "return strnatcmp(\$a['$campo'], \$b['$campo']);";
        usort($array, create_function('$a,$b', $codigo_funcion_reemplazo));

        return $array;
    }

?>