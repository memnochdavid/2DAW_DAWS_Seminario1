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
    $cifras = strval($num);
    $suma = 0;
    for($i = 0; $i < strlen($cifras); $i++){
        $suma += (int)$cifras[$i];
    }
    return $suma;
}

/*
 *Ejercicio 9. Máximo común divisor (MCD)
Crea una función que calcule el máximo común divisor de dos números naturales.
 * */

function ej09($n1, $n2) {
    $mcd = 1;
    $mayor = ($n1 > $n2) ? $n1 : $n2;
    $tope = $mayor / 2;

    for($i = 2; $i < $tope; $i++){
        if(($n1 % $i === 0) && ($n2 % $i === 0) ){
            $mcd = $i;
        }
    }
    return $mcd;
}

/*
 * Ejercicio 10. Fibonacci
Crea una función que calcule el término n-ésimo de la sucesión de Fibonacci.
Nota: En matemática, la sucesión de Fibonacci se trata de una serie infinita de números
naturales que empieza con un 0 y un 1 y continúa añadiendo números que son la suma de los
dos anteriores: 0, 1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, 144, 233, 377, 610, 987, 1597...
 * */

function ej10($n)
{
    $fibo = [0, 1];
    $pos = 2;
    while($n > 0){
        $fibo[] = $fibo[$pos-1] + $fibo[$pos-2];
        $pos += 1;
        $n--;
    }
    return $fibo;
}

/*
 * Ejercicio 11. Números primos relativos
Crea una función que determine si dos números son primos relativos.
Nota: Se dice que dos números son relativamente primos si su factor común más grande
(MCD) es 1.
 * */

function ej11($n1, $n2){
    return ej09($n1, $n2) === 1;
}

/*
 *Ejercicio 12. Número capicúa
Crea una función que determine si un número dado es capicúa.
Nota: Un número capicúa es aquel que se lee igual de izquierda a derecha que de derecha a
izquierda, por ejemplo: 121, 1331, 45654.
 * */

function ej12($n1){
    $strNum = strval($n1);
    return ej04($strNum);
}

/*
 *Ejercicio 13. Generador de tabla HTML
Crea una función que dada una cadena de texto con formato Emmet devuelva su
correspondiente etiqueta HTML, teniendo en cuenta sólo los atributos de clase e id.
 * */

function ej13($emmet){
    $output = "";
    $elementos = [];
    $etiqueta = "";
    $id = "";
    $class = "";

    if(str_contains($emmet, ".")){
        $elementos = explode(".", $emmet);
        $etiqueta = $elementos[0];
        $class = explode("#", $elementos[1])[0];
    }
    if (str_contains($emmet, "#")){
        $elementos = explode("#", $emmet);
        $id = "$elementos[1]";
    }

    $output = '<div class="'.$class.'" id="'.$id.'">';

    return $output;
}


/*
 *Ejercicio 14. Mosaico numérico
Crea una función que dado un número n imprima el siguiente 'mosaico' (para n = 6):
1
22
333
4444
55555
666666
 * */

function ej14($n)
{
    $output = "1\n";
    for($i = 0; $i <= $n; $i++){
        $output .= str_repeat("$i", $i)."\n";
    }
    return $output;
}

/*
 *Ejercicio 15. Comparar arrays elemento a elemento
Crear una función que reciba dos arrays de enteros y devuelva un array de booleanos que
determine si los elementos, uno a uno, de ambos arrays son iguales.
Ejemplo: comparar([1, 2, 3], [1, 2, 4]) → [true, true, false]
 * */

function ej15($array1, $array2){
    $verifica = [];
    for($i = 0; $i < count($array1); $i++){
        if($array1[$i] !== $array2[$i]){
            $verifica[$i] = false;
        }
        else{
//            $verifica[$i]
        }
    }
    return true;
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
        case 8:
            $num = 12995;
            $output = "La suma de los dígitos de $num es: ".ej08($num);

            echo $output;
            break;
        case 9:
            $num1 = 25;
            $num2 = 125;
            echo "El MCD de $num1 y $num2 es: ".ej09($num1,$num2);
            break;
        case 10:
            $n = 10;
            echo "Los $n primero número de Fibonacci son: ".print_r(ej10($n), true);
            break;
        case 11:
            $n1 = 7;
            $n2 = 10;
            if(ej11($n1,$n2)){
                echo "$n1 y $n2 son primos relativos.";
            } else{
                echo "$n1 y $n2 no son primos relativos.";
            }
            break;
        case 12:
            $num = 12343321;
            if(ej12($num)){
                echo "$num es capicua;";
            }else{
                echo "$num no es capicua;";
            }
            break;
        case 13:
            $emmet = "a";
            echo "Emmet:\n$emmet\n";
            echo "HTML:\n".ej13($emmet)."\n";
            break;
        case 14:
            $n = 6;
            echo ej14($n);
            break;
        default:
            echo "CAGASTE";
    }
}

execSeminario();

?>