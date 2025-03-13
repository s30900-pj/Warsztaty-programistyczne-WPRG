<?php
$poczatek = 10; 
$koniec = 50;   

function czyPierwsza($liczba) {
    if ($liczba < 2) {
        return false; 
    }
    for ($i = 2; $i * $i <= $liczba; $i++) {
        if ($liczba % $i == 0) {
            return false; 
        }
    }
    return true; 
}

echo "Liczby pierwsze w zakresie $poczatek - $koniec: <br>\n";
for ($i = $poczatek; $i <= $koniec; $i++) {
    if (czyPierwsza($i)) {
        echo $i . " ";
    }
}
?>