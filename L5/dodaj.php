<?php include "db.php"; ?>
<!DOCTYPE html>
<html>
<head><title>Dodaj samochód</title></head>
<body>
<?php include "panel.php"; ?>
<h2>Dodaj nowy samochód</h2>
<form method="post">
    Marka: <input type="text" name="marka"><br>
    Model: <input type="text" name="model"><br>
    Cena: <input type="number" name="cena" step="0.01"><br>
    Rok: <input type="number" name="rok"><br>
    Opis: <textarea name="opis"></textarea><br>
    <input type="submit" value="Dodaj">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $marka = $_POST["marka"];
    $model = $_POST["model"];
    $cena = $_POST["cena"];
    $rok = $_POST["rok"];
    $opis = $_POST["opis"];

    $stmt = $conn->prepare("INSERT INTO samochody (marka, model, cena, rok, opis) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssdiss", $marka, $model, $cena, $rok, $opis);
    $stmt->execute();
    echo "Samochód dodany!";
}
?>
</body>
</html>