<?php
$N = 10;

$fibonacci = array();
$fibonacci[0] = 0;
$fibonacci[1] = 1;

for ($i = 2; $i < $N; $i++) {
    $fibonacci[$i] = $fibonacci[$i - 1] + $fibonacci[$i - 2];
}

$numer = 1; 
echo "Nieparzyste liczby Fibonacciego w zakresie 1 do $N:<br>";

foreach ($fibonacci as $liczba) {
    if ($liczba % 2 != 0) { 
        echo "$numer. $liczba<br>";
        $numer++;
    }
}
?>