<?php 

    $arr = ["one" => 1,"two" => 2,"there" => 3];
    $array1 = array("orange", "banana", "apple");
    $array2 = array("orange", "mango", "apple");
################################  Array  ##########################
    // print_r(array_change_key_case($arr,CASE_UPPER));
    // print_r(array_chunk($arr,1));
    // print_r(array_diff_key($array2,$array1));
    // function odd($var)
    // {
    //     return ($var % 2 == 0);
    // }
    // print_r(array_filter($arr,"odd"))
    // print_r(array_flip($arr));
    // print_r(array_intersect($array1,$array2));
    $input1 = array("a" => "green", "b" => "brown","blue", "red");
    $input2 = array("a" => "green", "B" => "brown", "yellow", "RED");
    $result = array_intersect_uassoc($input1, $input2, "strcasecmp");
    print_r($result);


?>