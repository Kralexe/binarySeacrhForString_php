<?php
$name = $argv[1];
$x = $argv[2]; 

$file = new SplFileObject($name, 'r');

function binarySearch($file, $x) 
{ 
    $l = 0;
    $file->seek(PHP_INT_MAX);
    $r = $file->key() + 1;
    while ($l <= $r)  
    { 
        $m = $l + (int)(($r - $l) / 2); 
        $file->seek($m);
        $s = preg_split("/\t/", $file->current());
        $res = strcmp($x, $s[0]); 
  
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

$result = binarySearch($file, $x); 
$file->seek($result);
$s = preg_split("/\t/", $file->current());
if ($result == -1) 
    print("Element not present"); 
else
    print($s[1]); 
?>
