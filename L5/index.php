<?php include "db.php"; ?>
<!DOCTYPE html>
<html>
<head><title>Strona główna</title></head>
<body>
<?php include "panel.php"; ?>
<h2>5 najtańszych samochodów</h2>
<table border="1">
<tr><th>ID</th><th>Marka</th><th>Model</th><th>Cena</th></tr>
<?php
$result = $conn->query("SELECT * FROM samochody ORDER BY cena ASC LIMIT 5");
while($row = $result->fetch_assoc()) {
    echo "<tr>
            <td><a href='szczegoly.php?id={$row['id']}'>{$row['id']}</a></td>
            <td>{$row['marka']}</td>
            <td>{$row['model']}</td>
            <td>{$row['cena']}</td>
          </tr>";
}
?>
</table>
</body>
</html>