<?php

    // BASE URL
    function api_base_url() {
        return 'https://swapi.dev/api/';
    }

    // TRABAJO CON ARRAYS

    /**
    * Dado un número, se realiza la conversión en sus letras romanas (M,C,D,L,X,V y I)
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
    * Dada un vector y un campo, retorna esa misma lista pero
    * ya ordenado por ese campo (ascendentemente)
    * @param array Array desordenado
    * @param string Campo por el que ordenar
    * @return array Array resultado
    */
    function ordenarPor($array,$campo) {
        $codigo_funcion_reemplazo = "return strnatcmp(\$a['$campo'], \$b['$campo']);";
        usort($array, create_function('$a,$b', $codigo_funcion_reemplazo));

        return $array;
    }



    //   SWAPI

    /**
    * Al estar ordenadas las películas por orden de lanzamiento,
    * siendo la 4ª, 5ª y 6ª la 1ª, 2ª y 3ª, esta función te devuelve su mismo valor
    * pero para obtener la información de la API directamente, sin necesidad
    * de reordenación de arrays, ya que no sería tan eficiente.
    * @param int Número de película
    * @return int posicion en la API o -1 si el número de película introducido no existe
    * @see https://swapi.co/documentation
    */
    function obtenerIDPeliculaSWAPI($numero) {
        $numero_peliculas_total = json_decode(file_get_contents('https://swapi.co/api/films/'),true)['count'];

        if( $numero > $numero_peliculas_total || $numero < 1) {
            return -1; //La película no existe

        } else {

            if($numero < 4) {
                return $numero +3;

            } elseif ($numero < 7) {
                return $numero -3;

            } else {
                return $numero;
            }

        }

    //Fin de la función
    }

    /**
    * Al no poseer el API de imágenes, aquellas nuevas películas que no
    * hayan sido actualizadas con una portada se les establecerá
    * una imagen de una cámara.
    * @param int Número de la película
    * @return string Devuelve la ruta relativa hasta donde se encuentra
    * la imagen correspondiente con el episodio.
    */
    function obtenerImagenPelicula($numero) {
        switch ($numero) {
            case 1: return 'assets/tpm-episode1.jpg';
            
            case 2: return 'assets/aotc-episode2.jpg';

            case 3: return 'assets/rots-episode3.jpg';

            case 4: return 'assets/anh-episode4.jpg';

            case 5: return 'assets/tesb-episode5.jpg';

            case 6: return 'assets/rotj-episode6.jpg';

            case 7: return 'assets/tfa-episode7.jpg.jpg';

            // En caso de ser una película de la que no se posea imagen
            default: return 'assets/unknown-film.png';
        }
    }

    /**
    * Dada una cadena, devuelve otra traducida
    * con los climas correspondientes en este caso de los planetas.
    */
    function obtenerClima($cadena) {
        $vector = explode(',',$cadena);
        $resultado = '';

        for ($i=0; $i < count($vector); $i++) {

            switch ($cadena) {
                case 'temperate':
                    $resultado .= 'templado';
                    break;

                case 'tropical':
                    $resultado .= 'tropical';
                    break;

                case 'arid':
                    $resultado .= 'árido';
                    break;

                case 'frozen':
                    $resultado -= 'congelado';
                    break;

                case 'murky':
                    $resultado .= 'lóbrego';
                    break;

                default:
                    $resultado .= 'desconocido';
                    break;
            }

            if(count($vector) > 1 && $i < count($vector)) $resultado .= ', ';
        }

        return $resultado;

    }


    // NO ENCONTRADO

    function mostrarError($message,$volver = false) {
        ?>
        <div class="alert alert-danger text-center mt-5 mx-auto w-50 h-auto">
            <h4 class="font-weight-bold">Ups!</h4>
            <hr />
            <p><?= $message; ?></p>

            <?php
                if($volver) {
                    ?>
                    <a href="javascript:location.replace(document.referrer);"><i class="fas fa-arrow-alt-circle-left"></i> Volver</a>
                    <?php
                }
            ?>
        </div>
        <?php
    }

?>