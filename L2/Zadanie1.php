<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Kalkulator</title>
</head>
<body>
    <h1>Kalkulator</h1>

    <form method="post" action="">
        <label for="liczba1">Pierwsza liczba:</label>
        <input type="number" name="liczba1" id="liczba1" required><br><br>

        <label for="liczba2">Druga liczba:</label>
        <input type="number" name="liczba2" id="liczba2" required><br><br>

        <label for="dzialanie">Wybierz działanie:</label>
        <select name="dzialanie" id="dzialanie">
            <option value="dodawanie">Dodawanie</option>
            <option value="odejmowanie">Odejmowanie</option>
            <option value="mnozenie">Mnożenie</option>
            <option value="dzielenie">Dzielenie</option>
        </select><br><br>

        <input type="submit" value="Oblicz">
    </form>

<?php
if (isset($_POST['liczba1']) && isset($_POST['liczba2']) && isset($_POST['dzialanie'])) {
    $liczba1 = (float)$_POST['liczba1'];
    $liczba2 = (float)$_POST['liczba2'];
    $dzialanie = $_POST['dzialanie'];

    $wynik = 0;
    $blad = false;

    switch ($dzialanie) {
        case 'dodawanie':
            $wynik = $liczba1 + $liczba2;
            break;
        case 'odejmowanie':
            $wynik = $liczba1 - $liczba2;
            break;
        case 'mnozenie':
            $wynik = $liczba1 * $liczba2;
            break;
        case 'dzielenie':
            if ($liczba2 == 0) {
                echo "<p style='color: red'>Błąd: nie można dzielić przez zero!</p>";
                $blad = true;
            } else {
                $wynik = $liczba1 / $liczba2;
            }
            break;
    }

    if (!$blad) {
        echo "<p><strong>Wynik: </strong>{$wynik}</p>";
    }
}
?>
</body>
</html>