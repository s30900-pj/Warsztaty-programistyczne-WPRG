<?php
session_start();

$blad = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login'] ?? '');
    $haslo = trim($_POST['haslo'] ?? '');

    // „Twarde” dane logowania
    if ($login === 'admin' && $haslo === '1234') {
        $_SESSION['zalogowany'] = true;

        /* zapamiętaj kto się logował – 30 dni */
        setcookie('ostatni_login', $login, time() + 60*60*24*30, '/');

        header('Location: index.php');
        exit;
    }
    $blad = 'Niepoprawny login lub hasło.';
}
?>
<!doctype html>
<html lang="pl"><meta charset="utf-8">
<head><title>Logowanie</title></head>
<body>
<h2>Logowanie</h2>

<?php if ($blad): ?><p style="color:red"><?=$blad?></p><?php endif; ?>

<form method="post">
    Login:  <input name="login"  value="<?=htmlspecialchars($_POST['login']??'')?>"><br><br>
    Hasło:  <input name="haslo" type="password"><br><br>
    <button>Zaloguj</button>
</form>
</body>
</html>