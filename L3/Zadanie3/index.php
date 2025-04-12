<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Formularz rezerwacji</title>
</head>
<body>
    <h1>Rezerwacja hotelu</h1>

    <form method="POST" action="action.php">
        <label for="imie">Imię:</label><br>
        <input type="text" name="imie" id="imie" required><br><br>
        
        <label for="nazwisko">Nazwisko:</label><br>
        <input type="text" name="nazwisko" id="nazwisko" required><br><br>
        
        <label for="email">Adres e-mail:</label><br>
        <input type="email" name="email" id="email" required><br><br>
        
        <label for="data_pobytu">Data pobytu:</label><br>
        <input type="date" name="data_pobytu" id="data_pobytu" required><br><br>
        
        <label for="godzina_przyjazdu">Godzina przyjazdu:</label><br>
        <input type="time" name="godzina_przyjazdu" id="godzina_przyjazdu"><br><br>
        
        <fieldset>
            <legend>Udogodnienia (zaznacz, jeśli potrzebne):</legend>
            <label>
                <input type="checkbox" name="udogodnienia[]" value="Klimatyzacja"> Klimatyzacja
            </label><br>
            <label>
                <input type="checkbox" name="udogodnienia[]" value="Popielniczka"> Popielniczka
            </label><br>
            <label>
                <input type="checkbox" name="udogodnienia[]" value="Dostawka dla dziecka"> Dostawka dla dziecka
            </label><br>
        </fieldset>
        
        <br>
        <input type="submit" name="zapisz" value="Zapisz do CSV">
        <input type="submit" name="wczytaj" value="Wczytaj z CSV">
    </form>
</body>
</html>