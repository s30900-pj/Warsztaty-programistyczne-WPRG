<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Formularz zapisu danych</title>
</head>
<body>
<?php
if (isset($_POST['zapisz'])) {
    $imie = trim($_POST['imie'] ?? '');
    $nazwisko = trim($_POST['nazwisko'] ?? '');

    $linia = $imie . ';' . $nazwisko . PHP_EOL;

    $sciezkaPliku = '/Applications/XAMPP/xamppfiles/htdocs/WPRG/L3/Zadanie2/dane.txt';

    $plik = fopen($sciezkaPliku, 'a');

    if ($plik) {
        fwrite($plik, $linia);
        fclose($plik);
        echo '<p style="color:green;">Dane zostały zapisane!</p>';
    } else {
        echo '<p style="color:red;">Nie udało się otworzyć pliku do zapisu.</p>';
    }
}
?>


<form method="post" action="">
    <label>Imię:
        <input type="text" name="imie">
    </label><br><br>

    <label>Nazwisko:
        <input type="text" name="nazwisko">
    </label><br><br>

    <input type="submit" name="zapisz" value="Zapisz">
</form>

</body>
</html>