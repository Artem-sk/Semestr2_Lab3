<?php
    $processorName = $_POST["processors"];
    include "ConnectionDB.php";
    ##include "index.php";

    $sqlQuery = "select computers.*, processors.processor_name from computers, processors where 
    computers.fid_processor = (select id_processor from processors where processors.processor_name = \"$processorName\") 
    and 
    computers.fid_processor = processors.id_processor";

    $stmt = $pdo->query($sqlQuery);

    $result = $stmt->fetchAll(PDO::FETCH_OBJ);

    $xml = new SimpleXMLElement('<xml/>');
    
    $xml->addChild('h2', "Найденные компьютеры с типом процессора $processorName");
 


    if(count($result) == 0) 
    {
        $xml->addChild('div', "Запрос вернул пустой результат!!!");
    }
    else 
    {
        $table = $xml->addChild("table");
        $tr = $table->addChild("tr");
        foreach ($result[0] as $key => $value) {
            $head = $tr->addChild('th', "$key");
        }

        foreach ($result as $row) {
            $tr = $table->addChild("tr");
            foreach ($row as $key => $value) {
                $tr->addChild("td","$value");
            }
        }
    }

    $pdo=null;
    Header('Content-type: text/xml');
    print( $xml->asXML());
?>