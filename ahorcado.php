<?php

if ($argc !== 2) {
    echo 'Número incorrecto de parametros';
    exit;
}

$secretWord = $argv[1];

echo 'Bienvenido al juego ahorcado' .PHP_EOL;
echo 'La palabra secreta tiene ' . mb_strlen($secretWord) . ' letras ' .PHP_EOL;

const MAX_ATTEMPTS = 7;

$attempts = 0;

do {
    echo 'Por favor digite una letra: ' . PHP_EOL;
    $letter = trim(fgets(STDIN));

    $letters = str_split_unicode($secretWord);

    if (in_array($letter, $letters)) {
        echo "Correcto" . PHP_EOL;
    }else {
        echo "Incorrecto" . PHP_EOL;
    }
    $attempts++;
} while ($attempts <= MAX_ATTEMPTS);

function str_split_unicode($str){
    return preg_split("//u" , $str,-1,PREG_SPLIT_NO_EMPTY );
}

// en caso de adivinar la h en "hola"
function get_guessed_world(){

    $letters = str_split_unicode($secretWord, $letterGuessed);
    $gueseedWord = '';

    foreach ($letters as $letter) {
        if (!in_array($letter, $letterGuessed)) {
            $gueseedWord .= '_';
        }else {
            $gueseedWord .= $letter;
        }
    }

    return $gueseedWord;
}
