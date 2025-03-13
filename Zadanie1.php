<?php
$owoce = array("jabłko", "banan", "pomarańcza", "gruszka", "śliwka");

foreach ($owoce as $owoc) {
    $odwrocony = "";
    for ($i = strlen($owoc) - 1; $i >= 0; $i--) {
        $odwrocony .= $owoc[$i];
    }

    $czyP = ($owoc[0] == 'p') ? "Tak" : "Nie";

    echo "Odwrocony owoc: $odwrocony | Zaczyna się na 'p'?: $czyP\n";
}
?>