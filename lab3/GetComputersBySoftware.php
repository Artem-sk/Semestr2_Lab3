<?php

    $SoftwareName = $_POST["software"];
    include "ConnectionDB.php";
    ##include "index.php";
    
    $sqlQuery = "select distinct computers.*, software.software_name from computers, software, computers_software where
    computers.ID_computer in (select fid_computer from computers_software where fid_software = 
    (select id_software from software where software_name = ?))
    and
    computers.ID_computer = computers_software.FID_computer
    and
    software.ID_software = (select id_software from software where software_name = ?)";

    $stmt = $pdo->prepare($sqlQuery);
   
    $stmt->execute(array($SoftwareName, $SoftwareName));

    echo "<h2>Найденные компьютеры с установленным ПО \"$SoftwareName\"</h2>";
    
    include "BuildTable.php";
?>