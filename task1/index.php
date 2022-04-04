<?php


function getCharacters($string)
{
    $len = strlen($string);
    for($i = $len - 1; $i > 0; $i--){
        if($string[$i] === '/'){
            echo substr($string,$i + 1);
            break;
        }
    }

}

getCharacters('mostafa//hesham/mostafa');


function nextChar($char)
{
    if(ord($char) + 1 == 123){
        echo 'a';
    }else{
        echo chr(ord($char) + 1);
    }
}

nextChar("d");