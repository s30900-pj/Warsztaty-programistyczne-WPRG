<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Formularz rezerwacji hotelu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .formularz {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ccc;
        }
        .wynik {
            margin-top: 20px;
            padding: 15px;
            border: 1px solid #ccc;
        }
        label {
            display: inline-block;
            width: 150px;
            margin-bottom: 6px;
        }
        .input-group {
            margin-bottom: 8px;
        }
        input[type="text"],
        input[type="email"],
        input[type="number"],
        input[type="date"],
        input[type="time"],
        input[type="password"],
        select {
            width: 200px;
            padding: 4px;
        }
        .checkbox-group {
            margin-bottom: 10px;
        }
        h2 {
            margin-top: 0;
        }
    </style>
</head>
<body>
    <h1>Formularz rezerwacji hotelu</h1>
    
    <!-- Sekcja formularza -->
    <div class="formularz">
        <form method="post" action="">
            <!-- 1. Ilość osób (lista rozwijana) -->
            <div class="input-group">
                <label for="ilosc_osob">Ilość osób:</label>
                <select name="ilosc_osob" id="ilosc_osob" required>
                    <option value="" disabled selected hidden>Wybierz</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </div>
            
            <!-- 2. Dane osoby rezerwującej -->
            <div class="input-group">
                <label for="imie">Imię (wymagane):</label>
                <input type="text" id="imie" name="imie" required>
            </div>
            <div class="input-group">
                <label for="nazwisko">Nazwisko (wymagane):</label>
                <input type="text" id="nazwisko" name="nazwisko" required>
            </div>
            <div class="input-group">
                <label for="adres">Adres:</label>
                <input type="text" id="adres" name="adres">
            </div>
            <div class="input-group">
                <label for="email">E-mail (wymagane):</label>
                <input type="email" id="email" name="email" required>
            </div>
            <!-- Opcjonalnie dane karty kredytowej -->
            <div class="input-group">
                <label for="karta">Nr karty kredytowej:</label>
                <input type="text" id="karta" name="karta" placeholder="np. 1111-2222-3333-4444">
            </div>
            
            <!-- 3. Termin pobytu, godzina przyjazdu -->
            <div class="input-group">
                <label for="data_przyjazdu">Data przyjazdu:</label>
                <input type="date" id="data_przyjazdu" name="data_przyjazdu">
            </div>
            <div class="input-group">
                <label for="godzina_przyjazdu">Godzina przyjazdu:</label>
                <input type="time" id="godzina_przyjazdu" name="godzina_przyjazdu">
            </div>
            
            <!-- 4. Dodatkowe łóżko -->
            <div class="checkbox-group">
                <label>Potrzebne łóżko dla dziecka?</label>
                <input type="checkbox" id="dostawka" name="dostawka" value="tak">
                <label for="dostawka">Tak</label>
            </div>
            
            <!-- 5. Udogodnienia -->
            <div class="checkbox-group">
                <label>Udogodnienia:</label><br>
                <input type="checkbox" id="klimatyzacja" name="udogodnienia[]" value="klimatyzacja">
                <label for="klimatyzacja">Klimatyzacja</label><br>
                
                <input type="checkbox" id="popielniczka" name="udogodnienia[]" value="popielniczka">
                <label for="popielniczka">Popielniczka dla palących</label><br>
                
                <input type="checkbox" id="tv" name="udogodnienia[]" value="telewizja">
                <label for="tv">Telewizor</label><br>
                
                <input type="checkbox" id="miniBar" name="udogodnienia[]" value="mini-bar">
                <label for="miniBar">Mini-bar</label><br>
            </div>
            
            <!-- Przycisk wysłania -->
            <div class="input-group">
                <input type="submit" value="Zarezerwuj">
            </div>
        </form>
    </div>
    
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Pobieranie danych z tablicy $_POST
    $iloscOsob = isset($_POST['ilosc_osob']) ? $_POST['ilosc_osob'] : '';
    $imie = isset($_POST['imie']) ? $_POST['imie'] : '';
    $nazwisko = isset($_POST['nazwisko']) ? $_POST['nazwisko'] : '';
    $adres = isset($_POST['adres']) ? $_POST['adres'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $karta = isset($_POST['karta']) ? $_POST['karta'] : '';
    $dataPrzyjazdu = isset($_POST['data_przyjazdu']) ? $_POST['data_przyjazdu'] : '';
    $godzinaPrzyjazdu = isset($_POST['godzina_przyjazdu']) ? $_POST['godzina_przyjazdu'] : '';
    $dostawka = isset($_POST['dostawka']) ? 'tak' : 'nie';
    $udogodnienia = isset($_POST['udogodnienia']) ? $_POST['udogodnienia'] : [];

    // Wyświetlenie podsumowania w ładny i przejrzysty sposób:
    echo '<div class="wynik">';
    echo '<h2>Podsumowanie rezerwacji</h2>';

    echo '<p><strong>Ilość osób:</strong> ' . htmlspecialchars($iloscOsob) . '</p>';
    echo '<p><strong>Rezerwujący:</strong> ' . htmlspecialchars($imie) . ' ' . htmlspecialchars($nazwisko) . '</p>';
    echo '<p><strong>Adres:</strong> ' . htmlspecialchars($adres) . '</p>';
    echo '<p><strong>E-mail:</strong> ' . htmlspecialchars($email) . '</p>';
    echo '<p><strong>Karta kredytowa:</strong> ' . htmlspecialchars($karta) . '</p>';
    echo '<p><strong>Data przyjazdu:</strong> ' . htmlspecialchars($dataPrzyjazdu) . '</p>';
    echo '<p><strong>Godzina przyjazdu:</strong> ' . htmlspecialchars($godzinaPrzyjazdu) . '</p>';
    echo '<p><strong>Potrzebne łóżko dla dziecka:</strong> ' . $dostawka . '</p>';

    if (!empty($udogodnienia)) {
        echo '<p><strong>Udogodnienia:</strong><br>';
        foreach ($udogodnienia as $u) {
            echo ' - ' . htmlspecialchars($u) . '<br>';
        }
        echo '</p>';
    } else {
        echo '<p><strong>Udogodnienia:</strong> brak wybranych.</p>';
    }

    echo '</div>';
}
?>
</body>
</html>