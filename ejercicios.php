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
    elseif (!str_contains($emmet, ".")){
        $etiqueta = $emmet;
    }

    $output = '<'.$etiqueta;
    if(empty($class)){
        $output .= '></'.$etiqueta.'>';
    }
    elseif (!empty($class) && empty($id)){
        $output .= ' class="'.$class.'"></'.$etiqueta.'>';
    }
    elseif (empty($class) && !empty($id)){
        $output .= ' id="'.$id.'"></'.$etiqueta.'>';
    }
    else {
        $output = '<'.$etiqueta.' class="'.$class.'" id="'.$id.'">';
    }

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
        if($array1[$i] === $array2[$i]){
            $verifica[$i] = true;
        }
        else{
            $verifica[$i] = false;
        }
    }
//    var_dump($verifica);
//    die();
    return $verifica;
}


/*
 * Ejercicio 16. Producto de elementos de un array
Crea una función que calcule el producto de todos los elementos en un array de números.
Ejemplo: producto([2, 3, 4]) → 24
 * */

function ej16($array, $multiplica){
    $res = 0;
    for($i = 0; $i < count($array); $i++){
        $res += $array[$i] * $multiplica;
    }
    return $res;
}

/*
 * Ejercicio 17. Filtrar números pares
Crea una función que dada un array de números, devuelva un nuevo array con solo los
números pares.
Ejemplo: filtrarPares([1, 2, 3, 4, 5, 6]) → [2, 4, 6]
 * */

function ej17($array): array
{
    return array_filter($array, function($num){
        return $num % 2 === 0;
    });
}

/*
 * Ejercicio 18. Número primo
Crea una función que determine si un número es primo.
Nota: Un número primo es un número natural mayor que 1 que solo es divisible por 1 y por
sí mismo.
 * */

function ej18($num){
    $tope = $num / 2;
    if($num % 2 === 0){
        return false;
    }
    for ($i = 3; $i <= $tope; $i += 2) {
        if ($num % $i === 0) {
            return false;
        }
    }
    return true;
}

/*
 * Ejercicio 19. Eliminar vocales
Crea una función que, dada una cadena de texto, elimine todas las vocales de la cadena.
Ejemplo: eliminarVocales("Hola Mundo") → "Hl Mnd"
 *
 * */

function ej19($texto){
    $arrayAux = str_split($texto);
    $array = array_filter($arrayAux, function($letra){
        return !str_contains("aeiouAEIOU", $letra);
    });

    $output ="";
    foreach($array as $letra){
        $output .= $letra;
    }
    return $output;
}

/*
 *Ejercicio 20. Factorial
Crea una función que calcule el factorial de un número.Nota: El factorial de un número n (representado como n!) es el producto de todos los
números enteros positivos desde 1 hasta n. Por ejemplo, 5! = 5 × 4 × 3 × 2 × 1 = 120
 * */

function ej20($n){
    $factorial = 1;
    $output = $n."! = ";
    for ($i = $n; $i >= 1; $i--) {
        $factorial *= $i;
        $output .= $i;

        // Añadir '*' excepto después del 1
        if ($i > 1) {
            $output .= " * ";
        }
    }
    $output[strlen($output)-1] = " = ";
    $output .= $factorial;

    return $output;
}

/*
 * Ejercicio 21. Invertir cadena
Crea una función que invierta una cadena de texto. Por ejemplo, "hola" debería convertirse en
"aloh".
 * */

function ej21($texto){
    $otxet = "";
    for($i = strlen($texto)-1; $i >= 0; $i--){
        $otxet .= $texto[$i];
    }
    return $otxet;
}

/*
 * Ejercicio 22. Número perfecto
Crea una función que, dado un número, devuelva true si es un número perfecto (la suma de
sus divisores propios positivos es igual al número), o false en caso contrario.
Ejemplo: 6 es un número perfecto porque sus divisores propios son 1, 2 y 3, y 1 + 2 + 3 = 6.
 * */
function ej22_sacaDivs($n){
    $divs = [];
    for($i = 1; $i <= $n/2; $i++){
        if($n % $i === 0){
            $divs[] = $i;
        }
    }
    return $divs;
}

function ej22($n){
    $divisores = ej22_sacaDivs($n);
    $sumatoria = ej02($divisores);

    echo imprimeArryLinea($divisores)."\n";
    echo "Sumatoria: ".$sumatoria."\n";

    return (int)($n === $sumatoria);
}

/*
 * Ejercicio 23. Número Armstrong
Crea una función que, dado un número entero, devuelva true si es un número Armstrong (un
número que es igual a la suma de sus propios dígitos elevados a una potencia). Por ejemplo,
153 es un número Armstrong porque 1³ + 5³ + 3³ = 153.
 * */

function ej23($n)
{
    $digitos = [];
    $strAux = strval($n);
    for($i = 0; $i < strlen($strAux); $i++){
        $digitos[] = (int)$strAux[$i];
    }

    for ($i = 1; $i < $n; $i++) {//exponentes
        $suma = 0;
        foreach($digitos as $digito){//digitos
            $suma += pow($digito, $i);
        }
        if($n === $suma)return true;
    }
    return false;
}


/*
 *Ejercicio 24. Calculadora de descuentos con constantes
Crea un programa que utilice constantes para definir diferentes tipos de descuentos
(DESCUENTO_ESTUDIANTE, DESCUENTO_JUBILADO, DESCUENTO_VIP) y una
función que calcule el precio final de un producto aplicando el descuento correspondiente
según el tipo de cliente.
Valores de las constantes: • DESCUENTO_ESTUDIANTE: 15%
• DESCUENTO_JUBILADO: 20%
• DESCUENTO_VIP: 25%
Ejemplo: calcularPrecioFinal(100, "estudiante") → 85
 * */

class Constantes {
    const DESCUENTO_ESTUDIANTE = 15;
    const DESCUENTO_JUBILADO = 20;
    const DESCUENTO_VIP = 25;
}

function ej24($precio, $descuento){
    return match (strtolower($descuento)){
        "estudiante" => $precio - ($precio/100 * Constantes::DESCUENTO_ESTUDIANTE),
        "jubilado" => $precio - ($precio/100 * Constantes::DESCUENTO_JUBILADO),
        "vip" => $precio - ($precio/100 * Constantes::DESCUENTO_VIP),
    };
}

/*
 *
 * */



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

function imprimeArryLinea($array){
    $output = "[";
    foreach ($array as $elemento){
        $output .= (int)$elemento.",";
    }
    $output[strlen($output)-1] = "]";
    return $output;
//    return $nombre.' ['.implode(", ", $array).']';//por qué si es false o 0, no se imprime????
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
            $emmet1 = "a";
            $emmet2 = "div.coche";
            $emmet3 = "div.coche#VWPolo";
            echo "Emmet 1:\n$emmet1\n";
            echo "HTML 1:\n".ej13($emmet1)."\n";
            echo "Emmet 2:\n$emmet2\n";
            echo "HTML 2:\n".ej13($emmet2)."\n";
            echo "Emmet 3:\n$emmet3\n";
            echo "HTML 3:\n".ej13($emmet3)."\n";
            break;
        case 14:
            $n = 6;
            echo ej14($n);
            break;
        case 15:
            $array1 = [1,2,3,4,5];
            $array2 = [1,2,3,4,55];

            echo imprimeArryLinea($array1, "ArrayEj1:")."\n";
            echo imprimeArryLinea($array2, "ArrayEj2:")."\n";
            echo imprimeArryLinea(ej15($array1, $array2), "Array de Verificación:")."\n";
            break;
            //DUDA
        case 16:
            $array1 = [1,2,3,4,5];
            $multiplica = 4;
            echo imprimeArryLinea($array1, "Array multiplicado por $multiplica:");
            echo " => ".ej16($array1, $multiplica);
            break;
        case 17:
            $array1 = [1,2,3,4,5,6,7,8,9];
            echo imprimeArryLinea($array1, "Array original:");
            echo "\n".imprimeArryLinea(ej17($array1), "Sólo valores pares:");
            break;
        case 18:
            $num = 17;
            if(ej18($num)) echo "El número ".$num." es primo.";
            else echo "El número ".$num." no es primo.";
            break;
        case 19:
            $texto1 = "Hola tronco esto es una texto de prueba.";
            $texto2 = ej19($texto1);

            echo "Texto original:\n$texto1\n";
            echo "Texto sin vocales:\n$texto2\n";
            break;
        case 20:
            $num = 5;
            echo "El factorial de ".$num." es:\n".ej20($num);
            break;
        case 21:
            $texto1 = "Hola tronco esto es una texto de prueba.";
            $texto2 = ej21($texto1);
            echo "Texto original:\n$texto1\n";
            echo "Texto invertido:\n$texto2\n";
            break;
        case 22:
            $num = 6;
            if(ej22($num)){
                echo "El número ".$num." es un número perfecto.";
            }
            else{
                echo "El número ".$num." no es un número perfecto.";
            }
            break;
        case 23:
            $num = 153;
            if(ej23($num)){
                echo "El numero".$num." es un número Amstrong.";
            }
            else echo "El numero ".$num." no es un número Amstrong.";
            break;
        case 24:
            $precio = 100;
            echo "El precio del producto es: ".$precio."€";
            echo "\nAplicando descuentos...\n";
            echo "Precio para estudiantes: ".ej24($precio, "estudiante")."€\n";
            echo "Precio para jubilados: ".ej24($precio, "jubilado")."€\n";
            echo "Precio para VIP: ".ej24($precio, "vip")."€\n";

            break;
        default:
            echo "CAGASTE";
    }
}

execSeminario();

?>