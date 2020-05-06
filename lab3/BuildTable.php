<?php

$result = $stmt->fetchAll(PDO::FETCH_OBJ);

if(count($result) == 0) 
    echo "<div>Запрос вернул пустой результат!!!</div>";
else 
{
    echo "<table border=\"1\">";

    echo "<tr>";
    foreach ($result[0] as $key => $value) {
        echo "<th>$key</th>";
    }
    echo "</tr>";

    foreach ($result as $row) {
        echo "<tr>";
        foreach ($row as $key => $value) {
            echo "<td>$value</td>";
        }
        echo "</th>";
    }
    echo "</table>";
}

$pdo=null;
?>