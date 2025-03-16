<?php
$tekst = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has 
been the industry's standard dummy text ever since the 1500s, when an unknown printer took a 
galley of type and scrambled it to make a type specimen book. It has survived not only five 
centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was 
popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, 
and more recently with desktop publishing software like Aldus PageMaker including versions of 
Lorem Ipsum.";

$slowa = explode(" ", $tekst);

$dlugosc = count($slowa);

for ($i = 0; $i < $dlugosc; $i++) {
    $czyste_slowo = "";
    $dlugosc_slowa = strlen($slowa[$i]);

    for ($j = 0; $j < $dlugosc_slowa; $j++) {
        $znak = $slowa[$i][$j];

        if (!in_array($znak, array('.', ',', "'", "-", ":", ";", "!", "?", "(", ")", '"'))) {
            $czyste_slowo .= $znak;
        }
    }
    
    $slowa[$i] = $czyste_slowo;
}

$slowa = array_values(array_filter($slowa));

$asocjacyjna = array();

for ($i = 0; $i < count($slowa) - 1; $i += 2) {
    $asocjacyjna[$slowa[$i]] = $slowa[$i + 1];
}

foreach ($asocjacyjna as $klucz => $wartosc) {
    echo "$klucz => $wartosc<br>";
}
?>