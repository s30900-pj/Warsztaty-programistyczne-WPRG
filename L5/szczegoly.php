<?php include "db.php"; ?>
<!DOCTYPE html>
<html>
<head><title>Szczegóły samochodu</title></head>
<body>
<?php include "panel.php"; ?>
<?php
$id = $_GET["id"];
$result = $conn->query("SELECT * FROM samochody WHERE id = $id");
$row = $result->fetch_assoc();
if ($row) {
    echo "<h2>{$row['marka']} {$row['model']}</h2>
          <p>Cena: {$row['cena']}</p>
          <p>Rok: {$row['rok']}</p>
          <p>Opis: {$row['opis']}</p>";
} else {
    echo "Samochód nie znaleziony.";
}
?>
<br><a href='index.php'>Powrót do strony głównej</a>
</body>
</html>