<?php include "db.php"; ?>
<!DOCTYPE html>
<html>
<head><title>Wszystkie samochody</title></head>
<body>
<?php include "panel.php"; ?>
<h2>Wszystkie samochody</h2>
<table border="1">
<tr><th>ID</th><th>Marka</th><th>Model</th><th>Cena</th><th>Akcja</th></tr>
<?php
$result = $conn->query("SELECT * FROM samochody ORDER BY rok DESC");
while($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['marka']}</td>
            <td>{$row['model']}</td>
            <td>{$row['cena']}</td>
            <td><a href='szczegoly.php?id={$row['id']}'>Szczegóły</a></td>
          </tr>";
}
?>
</table>
</body>
</html>