<?php
session_start();

/* Jeśli użytkownik nie jest zalogowany – blokada */
if (empty($_SESSION['zalogowany'])) {
    echo 'Brak dostępu – musisz być zalogowany.';
    exit;
}

/* --------------------------------------------------
   CZYSZCZENIE CIASTECZEK
--------------------------------------------------- */
if (isset($_POST['usun_cookie'])) {
    foreach ($_COOKIE as $k=>$v) setcookie($k,'',time()-3600,'/');
    header('Location: index.php');
    exit;
}

/* --------------------------------------------------
   ZAPIS DANYCH Z FORMULARZA DO COOKIE (1 tydzień)
--------------------------------------------------- */
$ttl = time() + 60*60*24*7;  // 7 dni
foreach ($_POST as $k=>$v) {
    if ($k === 'udogodnienia') {
        setcookie('udogodnienia', implode('|',$v), $ttl, '/');
    } else {
        setcookie($k, $v, $ttl, '/');
    }
}

/* specjalnie obsłuż checkbox dostawki (gdy nie zaznaczono) */
if (!isset($_POST['dostawka'])) setcookie('dostawka','',time()-3600,'/');

header('Location: podsumowanie.php');
exit;
