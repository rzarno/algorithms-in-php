<?php
//Given an array of integers, write a function that returns true if there is a triplet (a, b, c) that satisfies a2 + b2 = c2.

function triangle(array $arr)
{
    $squares = [];
    foreach ($arr as $num) {
        $squares[$num] = $num * $num;
	}
	sort($squares);
	
	$sq2 = $squares;
    foreach ($sq2 as $c2) {
    	echo "processing $c2\n";
        $l = 0;
        $r = count($squares) - 1;
        while ($squares[$r] > $c2) {
			$r--;
		}

		for($i = $l; $i < $r; $i++) {
			for ($j = $r; $j > $i; $j--) {
				// echo $squares[$i] . ' + ' . $squares[$j] . ' == ' . $c2 . "\n";
				if ($squares[$i] + $squares[$j] == $c2) {
				    return true;
				}
			}
		}
	}
	return false;
}


$arr1 = [3, 1, 4, 6, 5]; 
$arr2 = [10, 4, 6, 12, 5];

var_dump(triangle($arr1));
var_dump(triangle($arr2));
