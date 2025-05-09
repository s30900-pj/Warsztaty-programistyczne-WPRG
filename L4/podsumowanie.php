<?php
session_start();

if (empty($_SESSION['zalogowany'])) {
    echo '<p>Brak dostępu – musisz być zalogowany, aby obejrzeć podsumowanie.</p>';
    echo '<p><a href="login.php">Logowanie</a></p>';
    exit;
}

function c($n, $def='') { return htmlspecialchars($_COOKIE[$n] ?? $def); }

$ilosc = (int)($_COOKIE['ilosc_osob'] ?? 0);

$udog = [];
if (!empty($_COOKIE['udogodnienia'])) {
    $udog = explode('|', $_COOKIE['udogodnienia']);
}
?>
<!doctype html>
<html lang="pl"><meta charset="utf-8">
<head>
    <title>Podsumowanie rezerwacji</title>
    <style>
        body{font-family:Arial;margin:20px}
        table{border-collapse:collapse;width:100%;margin-bottom:20px}
        th,td{border:1px solid #ccc;padding:6px;text-align:left}
        th{background:#eee}
    </style>
</head>
<body>

<h1>Podsumowanie Twojej rezerwacji</h1>
<p>Rezerwację złożył: <strong><?=c('ostatni_login','nieznajomy')?></strong></p>

<h2>Dane osób</h2>
<table>
<thead><tr><th>#</th><th>Imię</th><th>Nazwisko</th><th>E-mail</th></tr></thead>
<tbody>
<?php for($i=1;$i<=$ilosc;$i++): ?>
<tr>
    <td><?=$i?></td>
    <td><?=c('imie'.$i,'-')?></td>
    <td><?=c('nazwisko'.$i,'-')?></td>
    <td><?=c('email'.$i,'-')?></td>
</tr>
<?php endfor; ?>
</tbody>
</table>

<h2>Szczegóły pobytu</h2>
<table>
<tr><th>Adres</th><td><?=c('adres','-')?></td></tr>
<tr><th>Nr karty</th><td><?=c('karta','-')?></td></tr>
<tr><th>Data przyjazdu</th><td><?=c('data_przyjazdu','-')?></td></tr>
<tr><th>Godzina przyjazdu</th><td><?=c('godzina_przyjazdu','-')?></td></tr>
<tr><th>Łóżko dla dziecka</th><td><?=isset($_COOKIE['dostawka']) ? 'TAK' : 'NIE';?></td></tr>
<tr><th>Udogodnienia</th>
    <td><?= $udog ? implode(', ', $udog) : 'brak' ?></td></tr>
</table>

<p>
    <a href="index.php">Powrót do formularza</a> |
    <a href="logout.php">Wyloguj się</a>
</p>

</body>
</html>