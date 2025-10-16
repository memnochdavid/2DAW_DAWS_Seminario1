<?php
/*
 * Ejercicio 1. Número máximo de un array
Crea una función que obtenga el número máximo de un array de números
 * */

$arrayEj1 = [2, 5, 99, 0, 1];

function ej01_maxFromArray(array $arrayEj1)
{
    $maxVal = $arrayEj1[0];
    for($i = 1; $i < count($arrayEj1); $i++){
        if($maxVal > $arrayEj1[$i]){
            $maxVal = $arrayEj1[$i];
        }
    }
    return $maxVal;
}

/*
 * Ejercicio 2. Sumatoria de un array
Crea una función que obtenga la sumatoria de un array de números.
 * */

function ej02_Sumatoria(array $arrayEj1)
{
    $sum = 0;
    for($i = 0; $i < count($arrayEj1); $i++){
        $sum += $arrayEj1[$i];
    }
    return $sum;
}

/*
 * Ejercicio 3. Conversión de millas a kilómetros
Crea una función que dada una distancia en millas calcule su correspondiente en kilómetros.
Nota: 1 milla = 1.60934 kilómetros
 * */

function ej03_MILES_to_KM($km){
    return $km * 1.60934;
}

/*
 * Ejercicio 4. Palíndromo
Crea una función que determine si una cadena de texto es un palíndromo.
Nota: Un palíndromo es una palabra o frase que se lee igual de izquierda a derecha que de
derecha a izquierda, por ejemplo: "ana", "reconocer", "anilina".
 * */

function ej04_isPalindromo($palabra){
    if($palabra === "") return;
    else{
        return $palabra === strrev($palabra);
    }
}

/*
 * Ejercicio 5. Contar ocurrencias de una letra
Crea una función que cuente cuántas veces aparece una letra en un texto
 *
 * */

function ej05_CuentaLetras($cadenaTexto, $letra){
    $ocurrencias = 0;
    for($i = 0; $i < strlen($cadenaTexto); $i++){
        if($cadenaTexto[$i] === $letra){
            $ocurrencias++;
        }
    }
    return $ocurrencias;
}

/*
 *
 * */