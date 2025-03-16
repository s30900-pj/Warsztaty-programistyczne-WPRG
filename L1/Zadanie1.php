<?php
$owoce = array("jablko", "banan", "pomarancza", "gruszka", "sliwka");

foreach ($owoce as $owoc) {
    $odwrocony = "";
    for ($i = strlen($owoc) - 1; $i >= 0; $i--) {
        $odwrocony .= $owoc[$i];
    }

    $czyP = ($owoc[0] == 'p') ? "Tak" : "Nie";

    echo "Odwrocony owoc: $odwrocony <br> Zaczyna się na p?: $czyP<br>";
}
?>