<?php


include("src/David/David.php");


$a = array("1053_at","1007_s_at","117_at");
//$a = array("P12345");

//echo detectSpecie($a);
//var_dump( array_intersect( array("a","b") , array("c","c","b")  ) );


echo "<pre>" . convertList("X", "En", $a) . "</pre>";
