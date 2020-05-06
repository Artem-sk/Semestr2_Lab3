<?php
    $guarantee = $_POST["guarantee"];
    include "ConnectionDB.php";
    #include "index.php";

    $sqlQuery = "select * from computers WHERE computers.guarantee $guarantee period_diff(date_format(sysdate(),\"%Y%d\"),date_format(computers.buy_date,\"%Y%d\"))";

    $stmt = $pdo->query($sqlQuery);

    $stmt = $pdo->query($sqlQuery);

    $result = $stmt->fetchAll(PDO::FETCH_OBJ);

    $result = json_encode($result);
    print($result);

?>


