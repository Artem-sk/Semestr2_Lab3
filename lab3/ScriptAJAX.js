    function GetComputersBySoftwareHTML() 
        {
            const request = new XMLHttpRequest();
            const url = "GetComputersBySoftware.php";
            const params = "software=" + document.getElementById('so1').value;

            request.open("post", url, true); 
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            
            request.addEventListener("readystatechange", () => {

                if(request.readyState === 4 && request.status === 200) {    
                    console.log(request.responseText);   
                    document.getElementById('result').innerHTML = request.responseText;
                }
            });

            request.send(params);
    }

    function GetComputersByProcessorTypeXML() {

        var request = new XMLHttpRequest();
        const url = "GetComputersByProcessorType.php";
        const params = "processors=" + document.getElementById('pr1').value;

        request.open("post", url, true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        
        request.addEventListener("readystatechange", () => {
            if(request.readyState === 4 && request.status === 200) {   
                console.log(request.responseXML);    
                document.getElementById('result').innerHTML = request.responseXML.getElementsByTagName("xml")[0].innerHTML;
            }
        });
        request.send(params);
    }

    function GetComputersByExpiredGuaranteeJSON() 
        {
            const request = new XMLHttpRequest();
            const url = "GetComputersByExpiredGuarantee.php";
            const params = "guarantee=" + document.getElementById('gu1').value;

            request.open("post", url, true); 
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        
            request.addEventListener("readystatechange", () => {
                if(request.readyState === 4 && request.status === 200) {
                    console.log(request.responseText);
                    let resultHTML = "";
                    if(document.getElementById('gu1').value == "<")
                        resultHTML = "<h2>Найденные компьютеры с истекшим сроком гарантии</h2>";
                    else
                        resultHTML = "<h2>Найденные компьютеры с действующим сроком гарантии</h2>";

                    resultHTML += ParseJsonToTable(request.responseText);  
                    document.getElementById('result').innerHTML = resultHTML;
                }
            });

            request.send(params);
    }

    function ParseJsonToTable(jsonStr) 
    {
            let objCollection = JSON.parse(jsonStr);
            let table = "<table border=\"1\"";
            table += "<tr>";

            table += "<th>ID_computer</th>";
            table += "<th>netname</th>";
            table += "<th>motherboard</th>";
            table += "<th>RAM_capacity</th>";
            table += "<th>HDD_capacity</th>";
            table += "<th>monitor</th>";
            table += "<th>vendor</th>";
            table += "<th>buy_date</th>";
            table += "<th>guarantee</th>";
            table += "<th>FID_processor</th>";

            table += "</tr>";
            
            for (obj of objCollection) {
                table += "<tr>";

                table += "<th>" + obj.ID_computer + "</th>";
                table += "<th>" + obj.netname + "</th>";
                table += "<th>" + obj.motherboard + "</th>";
                table += "<th>" + obj.RAM_capacity + "</th>";
                table += "<th>" + obj.HDD_capacity + "</th>";
                table += "<th>" + obj.monitor + "</th>";
                table += "<th>" + obj.vendor + "</th>";
                table += "<th>" + obj.buy_date + "</th>";
                table += "<th>" + obj.guarantee + "</th>";
                table += "<th>" + obj.FID_processor + "</th>";

                table += "</tr>";
            }   
            
           
            table += "</table>";
            return table;
    }