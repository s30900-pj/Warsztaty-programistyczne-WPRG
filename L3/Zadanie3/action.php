<?php
$csvFile = 'rezerwacje.csv';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    

    if (isset($_POST['zapisz'])) {
        
        $fields = [
            'imie',
            'nazwisko',
            'email',
            'data_pobytu',
            'godzina_przyjazdu',
            'udogodnienia'
        ];
        
        $udogodnienia = isset($_POST['udogodnienia']) ? implode(', ', $_POST['udogodnienia']) : '';
        
        $values = [
            $_POST['imie'] ?? '',
            $_POST['nazwisko'] ?? '',
            $_POST['email'] ?? '',
            $_POST['data_pobytu'] ?? '',
            $_POST['godzina_przyjazdu'] ?? '',
            $udogodnienia
        ];
        
        $isNewFile = !file_exists($csvFile) || filesize($csvFile) === 0;
        
        $fp = fopen($csvFile, 'a');
        
        if ($isNewFile) {
            fputcsv($fp, $fields, ';');
        }
        
        fputcsv($fp, $values, ';');
        
        fclose($fp);
        
        echo "<p style='color:green;'>Dane zostały zapisane w pliku CSV.</p>";
        echo "<p><a href='index.php'>Powrót do formularza</a></p>";
    }
    if (isset($_POST['wczytaj'])) {
        if (file_exists($csvFile) && filesize($csvFile) > 0) {
            
            $fp = fopen($csvFile, 'r');
            
            echo "<h2>Lista rezerwacji (odczyt z pliku CSV):</h2>";
            echo "<table border='1' cellpadding='5' cellspacing='0'>";
            
            $rowNumber = 0;
            while (($row = fgetcsv($fp, 0, ';')) !== false) {
                echo "<tr>";
                
                if ($rowNumber === 0) {
                    foreach ($row as $header) {
                        echo "<th>" . htmlspecialchars($header) . "</th>";
                    }
                } else {
                    foreach ($row as $cell) {
                        echo "<td>" . htmlspecialchars($cell) . "</td>";
                    }
                }
                echo "</tr>";
                $rowNumber++;
            }
            
            echo "</table>";
            fclose($fp);
            
            echo "<p><a href='index.php'>Powrót do formularza</a></p>";
        } else {
            echo "<p style='color:red;'>Brak danych w pliku CSV lub plik nie istnieje.</p>";
            echo "<p><a href='index.php'>Powrót do formularza</a></p>";
        }
    }
}
?>