<?php

/*
 * Ejercicio 1. Número máximo de un array
Crea una función que obtenga el número máximo de un array de números
 * */


use Dom\Element;

function ej01(array $array)
{
    $maxVal = $array[0];
    for($i = 1; $i < count($array); $i++){
        if($maxVal < $array[$i]){
            $maxVal = $array[$i];
        }
    }
    return $maxVal;
}

/*
 * Ejercicio 2. Sumatoria de un array
Crea una función que obtenga la sumatoria de un array de números.
 * */

function ej02(array $array)
{
    $sum = 0;
    for($i = 0; $i < count($array); $i++){
        $sum += $array[$i];
    }
    return $sum;
}

/*
 * Ejercicio 3. Conversión de millas a kilómetros
Crea una función que dada una distancia en millas calcule su correspondiente en kilómetros.
Nota: 1 milla = 1.60934 kilómetros
 * */

function ej03($km){
    return $km / 1.60934;
}

/*
 * Ejercicio 4. Palíndromo
Crea una función que determine si una cadena de texto es un palíndromo.
Nota: Un palíndromo es una palabra o frase que se lee igual de izquierda a derecha que de
derecha a izquierda, por ejemplo: "ana", "reconocer", "anilina".
 * */

function ej04($palabra){
    if($palabra === "") return false;
    else{
        return $palabra === strrev($palabra);
    }
}

/*
 * Ejercicio 5. Contar ocurrencias de una letra
Crea una función que cuente cuántas veces aparece una letra en un texto
 *
 * */

function ej05($cadenaTexto, $letra){
    $ocurrencias = 0;
    for($i = 0; $i < strlen($cadenaTexto); $i++){
        if($cadenaTexto[$i] === $letra){
            $ocurrencias++;
        }
    }
    return $ocurrencias;
}

/*
 *Ejercicio 6. Contar ocurrencias de una subcadena
Crea una función que cuente cuántas veces aparece una subcadena en un texto.
 * */

function ej06($texto, $subcadena) {
    $ocurrencias = 0;
    $lenTexto = strlen($texto);
    $lenSub = strlen($subcadena);
    for ($i = 0; $i <= $lenTexto; $i++) {
        if (substr($texto, $i, $lenSub) === $subcadena) {
            $ocurrencias++;
        }
    }
    return $ocurrencias;
}

/*
 * Ejercicio 7. Capitalizar palabras
Crea una función que ponga en mayúscula la primera letra de cada palabra de un texto.
Ejemplo: "hola mundo" → "Hola Mundo"
 * */
function ej07($texto) {
    $palabras = explode(" ", $texto);
    $output = "";
    for($i = 0; $i < count($palabras); $i++){
        $palabras[$i][0] = strtoupper(substr($palabras[$i], 0, 1));
        $output .= $palabras[$i].=" ";
    }
    return $output;
}
/*
 * Ejercicio 8. Suma de dígitos
Crea una función que sume los dígitos de un número.
Ejemplo: sumaDigitos(245) = 2 + 4 + 5 = 11
 * */

function ej08($num) {
    $numCifras = 0;
    while(true){
        if($num % 10 == 0){
            $numCifras ++;
        }
        else break;
    }


}









function validaInput($mensaje, $tipo) {
    $input = readline($mensaje);

    switch ($tipo) {
        case 'int':
            return filter_var($input, FILTER_VALIDATE_FLOAT) !== false ? $input : null;
        //se pueden añadir más casas para cada tipo
        default:
            return null;
    }
}
function execSeminario() {
    do{
        $ejecutaEj = validaInput("Ejercicio a ejecutar: ", "int");
        if($ejecutaEj != null) break;
    }while(true);

    $array = [2, 5, 99, 0, 1];
    switch($ejecutaEj){
        case 1:
            echo "Array original: ";
            print_r($array);
            echo "El valor máximo es: ".ej01($array);
            break;
        case 2:
            echo "Array original: ";
            print_r($array);
            echo "La sumatoria: ".ej02($array);
            break;
        case 3:
            $kms = 100;
            echo "$kms kilómetros son ".ej03($kms)." millas";

            break;
        case 4:
            $palabra1 = "perro";
            $palabra2 = "reconocer";
            $output = "Palabra 1: ".$palabra1;
            if(ej04($palabra1)) {
                $output.=" es un palíndromo.\n";
            }
            else {
                $output.=" no es un palíndromo.\n";
            }
            echo $output;
            $output = "Palabra 2: ".$palabra2;
            if(ej04($palabra2)) {
                $output.=" es un palíndromo.\n";
            }
            else {
                $output.=" no es un palíndromo.\n";
            }
            echo $output;
            break;
        case 5:
            $letra = 'n';
            $texto = "Un texto es una composición de signos codificados en un sistema de escritura que forma una unidad de sentido";

            echo "Letra:\n".$letra."\n";
            echo "Texto:\n".$texto."\n";
            echo "Apariciones de $letra: ".ej05($texto,$letra);
            break;
        case 6:
            $subcadena = "de";
            $texto = "Un texto es una composición de signos codificados en un sistema de escritura que forma una unidad de sentido";

            echo "Letra:\n".$subcadena."\n";
            echo "Texto:\n".$texto."\n";
            echo "Apariciones de $subcadena: ".ej06($texto,$subcadena);
            break;
        case 7:
            $subcadena = "hola holita, vecinito.";
            echo "Antes:\n".$subcadena."\n";
            echo "Después:\n".ej07($subcadena)."\n";
            break;
        default:
            echo "CAGASTE";
    }
}

execSeminario();

?>