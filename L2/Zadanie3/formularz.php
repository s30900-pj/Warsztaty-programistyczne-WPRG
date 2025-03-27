<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $iloscOsob        = isset($_POST['ilosc_osob'])      ? $_POST['ilosc_osob']      : '';
    $adres            = isset($_POST['adres'])           ? $_POST['adres']           : '';
    $karta            = isset($_POST['karta'])           ? $_POST['karta']           : '';
    $dataPrzyjazdu    = isset($_POST['data_przyjazdu'])  ? $_POST['data_przyjazdu']  : '';
    $godzinaPrzyjazdu = isset($_POST['godzina_przyjazdu']) ? $_POST['godzina_przyjazdu'] : '';
    $dostawka         = isset($_POST['dostawka'])        ? 'tak'                     : 'nie';
    $udogodnienia     = isset($_POST['udogodnienia'])    ? $_POST['udogodnienia']    : [];
    ?>
    <!DOCTYPE html>
    <html lang="pl">
    <head>
        <meta charset="UTF-8">
        <title>Podsumowanie rezerwacji</title>
        <style>
            body { font-family: Arial, sans-serif; margin: 20px; }
            .wynik { border: 1px solid #ccc; padding: 15px; }
        </style>
    </head>
    <body>

    <div class="wynik">
        <h2>Podsumowanie rezerwacji</h2>
        <p><strong>Ilość osób:</strong> <?php echo htmlspecialchars($iloscOsob); ?></p>

        <?php 
        for ($i = 1; $i <= $iloscOsob; $i++) {
            $imie_i     = isset($_POST['imie'.$i])     ? $_POST['imie'.$i]     : '';
            $nazwisko_i = isset($_POST['nazwisko'.$i]) ? $_POST['nazwisko'.$i] : '';
            $email_i    = isset($_POST['email'.$i])    ? $_POST['email'.$i]    : '';
            ?>
            <p><strong>Osoba <?php echo $i; ?>:</strong> 
                <?php echo htmlspecialchars($imie_i . ' ' . $nazwisko_i); ?>
                (E-mail: <?php echo htmlspecialchars($email_i); ?>)
            </p>
        <?php } ?>

        <p><strong>Adres:</strong> <?php echo htmlspecialchars($adres); ?></p>
        <p><strong>Karta kredytowa:</strong> <?php echo htmlspecialchars($karta); ?></p>
        <p><strong>Data przyjazdu:</strong> <?php echo htmlspecialchars($dataPrzyjazdu); ?></p>
        <p><strong>Godzina przyjazdu:</strong> <?php echo htmlspecialchars($godzinaPrzyjazdu); ?></p>
        <p><strong>Łóżko dla dziecka:</strong> <?php echo $dostawka; ?></p>

        <?php if (!empty($udogodnienia)): ?>
            <p><strong>Udogodnienia:</strong><br>
            <?php foreach ($udogodnienia as $u): ?>
                - <?php echo htmlspecialchars($u); ?><br>
            <?php endforeach; ?>
            </p>
        <?php else: ?>
            <p><strong>Udogodnienia:</strong> brak wybranych</p>
        <?php endif; ?>
    </div>

    </body>
    </html>
    <?php
} else {
    echo "Brak danych do wyświetlenia.";
}
?>