<?php
session_start();

/* ⛔ brak sesji – brak dostępu */
if (empty($_SESSION['zalogowany'])) {
    echo '<p>Dostęp zablokowany – nie jesteś zalogowany (brak aktywnej sesji).</p>
          <p><a href="login.php">Przejdź do logowania</a></p>';
    exit;
}

/* pomocnicze funkcje do pobierania cookies */
function c($n, $def='') { return htmlspecialchars($_COOKIE[$n] ?? $def); }
function chk($name, $value) {
    if (!isset($_COOKIE['udogodnienia'])) return '';
    $u = explode('|', $_COOKIE['udogodnienia']);
    return in_array($value, $u) ? 'checked' : '';
}

/* ile osób było wybrane poprzednio */
$ilosc = isset($_COOKIE['ilosc_osob']) ? (int)$_COOKIE['ilosc_osob'] : 0;
?>
<!doctype html>
<html lang="pl"><meta charset="utf-8">
<head>
<title>Rezerwacja hotelu</title>
<style>
    body{font-family:Arial;margin:20px}
    fieldset{margin:10px 0;padding:10px}
    .hide{display:none}
    label{display:inline-block;width:150px}
</style>
<script>
function toggleOsoby(sel){
  var val = parseInt(sel.value||0);
  for(let i=1;i<=4;i++){
     document.getElementById('osoba'+i).className = (i<=val)?'':'hide';
  }
}
</script>
</head>
<body>

<h1>Formularz rezerwacji hotelu</h1>
<p>Witaj, <?=c('ostatni_login','nieznajomy')?>! <a href="logout.php">[Wyloguj się]</a></p>

<form method="post" action="formularz.php">

<!-- ─── ILOŚĆ OSÓB ───────────────────────────────────────────── -->
<label>Ilość osób:</label>
<select name="ilosc_osob" onchange="toggleOsoby(this)" required>
    <option value="" disabled <?=$ilosc? '':'selected'?>>Wybierz</option>
    <?php for($i=1;$i<=4;$i++): ?>
        <option value="<?=$i?>" <?=$ilosc==$i?'selected':''?>><?=$i?></option>
    <?php endfor; ?>
</select><br><br>

<!-- ─── DANE OSÓB ─────────────────────────────────────────────── -->
<?php for($i=1;$i<=4;$i++): $hidden = ($ilosc && $i<=$ilosc)?'':'hide'; ?>
<fieldset id="osoba<?=$i?>" class="<?=$hidden?>">
  <legend>Osoba <?=$i?></legend>
  <label>Imię:</label>      <input name="imie<?=$i?>"      value="<?=c('imie'.$i)?>"  <?=$i<=$ilosc?'required':''?>><br>
  <label>Nazwisko:</label>  <input name="nazwisko<?=$i?>"  value="<?=c('nazwisko'.$i)?>" <?=$i<=$ilosc?'required':''?>><br>
  <label>E-mail:</label>    <input type="email" name="email<?=$i?>" value="<?=c('email'.$i)?>" <?=$i<=$ilosc?'required':''?>><br>
</fieldset>
<?php endfor; ?>

<!-- ─── POZOSTAŁE POLA ───────────────────────────────────────── -->
<label>Adres:</label>           <input name="adres"           value="<?=c('adres')?>"><br>
<label>Nr karty:</label>        <input name="karta"           value="<?=c('karta')?>"><br>
<label>Data przyjazdu:</label>  <input type="date" name="data_przyjazdu"  value="<?=c('data_przyjazdu')?>"><br>
<label>Godzina przyjazdu:</label><input type="time" name="godzina_przyjazdu" value="<?=c('godzina_przyjazdu')?>"><br><br>

<label>Łóżko dla dziecka?</label>
<input type="checkbox" name="dostawka" value="tak" <?=isset($_COOKIE['dostawka'])?'checked':''?>><br><br>

<label>Udogodnienia:</label><br>
<input type="checkbox" name="udogodnienia[]" value="klimatyzacja" <?=chk('udogodnienia','klimatyzacja')?>> Klimatyzacja<br>
<input type="checkbox" name="udogodnienia[]" value="popielniczka" <?=chk('udogodnienia','popielniczka')?>> Popielniczka<br>
<input type="checkbox" name="udogodnienia[]" value="telewizja"    <?=chk('udogodnienia','telewizja')?>> Telewizor<br>
<input type="checkbox" name="udogodnienia[]" value="mini-bar"     <?=chk('udogodnienia','mini-bar')?>> Mini-bar<br><br>

<button>Zarezerwuj</button>
</form><br>

<!-- ─── CZYSZCZENIE CIASTECZEK ───────────────────────────────── -->
<form method="post" action="formularz.php">
    <button name="usun_cookie" value="1">Wyczyść formularz (usuń ciasteczka)</button>
</form>

<script> /* uaktywnij/ukryj osoby przy pierwszym wejściu */ 
if(document.querySelector('select[name=ilosc_osob]').value) 
    toggleOsoby(document.querySelector('select')); 
</script>
</body>
</html>