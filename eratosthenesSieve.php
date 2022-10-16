<?php

function eratosthenesSieve($number)
{
    $primes = range(1, $number);
    $primes = array_combine($primes, $primes);
    $limit = sqrt($number);
    $current = 2;
    while ($current < $limit) {
        $multiplied = $current;
        $factor = 1;
        while ($multiplied < $number) {
            $factor++;
			$multiplied = $current * $factor; 
			if (isset($primes[$multiplied])) {
			    unset($primes[$multiplied]);
			}
		}
		$current += 1;
	}
	return $primes;
}

var_dump(eratosthenesSieve(100));
