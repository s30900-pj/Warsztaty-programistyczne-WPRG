<?php
if (isset($_POST['liczba'])) {
    $liczba = $_POST['liczba'];

    if (filter_var($liczba, FILTER_VALIDATE_INT) && $liczba > 0) {
        list($czyPierwsza, $ileIteracji) = sprawdzPierwsza($liczba);

        if ($czyPierwsza) {
            echo "<p>Liczba <strong>$liczba</strong> jest liczbą pierwszą.</p>";
        } else {
            echo "<p>Liczba <strong>$liczba</strong> nie jest liczbą pierwszą.</p>";
        }
        echo "<p>Liczba iteracji pętli potrzebnych do sprawdzenia: <strong>$ileIteracji</strong>.</p>";

    } else {
        echo "<p>Podana wartość nie jest dodatnią liczbą całkowitą.</p>";
    }
} else {
    echo "<p>Nie przekazano żadnej liczby z formularza.</p>";
}

function sprawdzPierwsza($n) {
    $licznik = 0; 

    if ($n < 2) {
        return [false, $licznik];
    }

    if ($n == 2) {
        $licznik++;
        return [true, $licznik];
    }

    if ($n % 2 == 0) {
        $licznik++;
        return [false, $licznik];
    }

    for ($i = 3; $i <= sqrt($n); $i += 2) {
        $licznik++;
        if ($n % $i == 0) {
            return [false, $licznik];
        }
    }

    return [true, $licznik];
}
?>