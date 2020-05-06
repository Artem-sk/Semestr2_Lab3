<!DOCTYPE html>

<html>

    <head>
    <title>Компьютеры организации</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="lab1.css">
    <script src="ScriptAJAX.js"></script>
    </head>

    <body>
        <?php
        include "ConnectionDB.php"
        ?>
       <div>
        <form action="GetComputersByProcessorType.php" method ="post">
            <select name="processors" id = "pr1">
                    <?php
                        $stmt = $pdo->query("SELECT processor_name FROM processors");
                        $result = $stmt->fetchAll();

                        foreach ($result as $key => $value) {
                            echo "<option value=\"$value[0]\">$value[0]</option>";
                        }
                    ?>
            </select>
            <input type="button" value="XML" onclick = "GetComputersByProcessorTypeXML();">
            
        </form>

        <form action="GetComputersBySoftware.php" method ="post">
        <select name="software" id = "so1">
                <?php
                    $stmt = $pdo->query("SELECT software_name from software");
                    $result = $stmt->fetchAll();

                    foreach ($result as $key => $value) {
                        echo "<option value=\"$value[0]\">$value[0]</option>";
                    }
                ?>
        </select>
        <input type="button" value="HTML" onclick = "GetComputersBySoftwareHTML();">
        </form>


        <form action="GetComputersByExpiredGuarantee.php" method ="post">
        <select name="guarantee" id = "gu1">
                <option value="<">Истекший срок гарантии</option>
                <option value=">">Действующий срок гарантии</option>
        </select>
        <input type="button" value="JSON" onclick = "GetComputersByExpiredGuaranteeJSON();">
        </form>
        </div>

        <p id = "result">
        </p>


    </body>
</html>
