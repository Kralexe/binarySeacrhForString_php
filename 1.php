<?php
$name = $argv[1];
$x = $argv[2]; 

$myfile = fopen($name, "r") or die("Unable to open file!");
$strVar = fread($myfile,filesize($name));
fclose($myfile);
//preg_replace("/\r\n|\n|\r/","",$strVar);

$arr= preg_split("/\R/", $strVar);
$y = array();
foreach ($arr as $value) {
    $f = preg_split("/\t/", $value);
    $y[] = $f[0];
    $z[] = $f[1];
}

function binarySearch($y, $x) 
{ 
    $l = 0; 
    $r = count($y)-1; 
    while ($l <= $r)  
    { 
        $m = $l + (int)(($r - $l) / 2); 
  
        $res = strcmp($x, $y[$m]); 
  
        // Check if x is present at mid 
        if ($res == 0) 
            return $m; 
  
        // If x greater, ignore left half 
        if ($res > 0) 
            $l = $m + 1; 
  
        // If x is smaller, ignore right half 
        else
            $r = $m - 1; 
    } 
  
    return -1; 
}

print_r($y);
$result = binarySearch($y, $x); 

if ($result == -1) 
    print("Element not present"); 
else
    print($z[$result]); 

?>