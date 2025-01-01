<!--TASK 1: CREATE A CHART WIDGET -->
<div id="Chart2" class="widget">LOADING...</div>

<script type="text/javascript">
    //FOLLOW THE EXAMPLE CODE BELOW TO CREATE YOUR OWN CHART WIDGET
    
    //Load the Google Charts Visualization API.
    google.charts.load('current', {'packages': ['corechart']});
    
    //Set the callback function to execute and draw the chart when the API is loaded.
    google.charts.setOnLoadCallback(drawChart);

    //The callback function that creates and draws the chart.
    function drawChart() {
        //Create a chart DataTable.
        var data = new google.visualization.DataTable();
        
        //Add columns to the chart DataTable.
        data.addColumn('string', 'Genre');
        data.addColumn('number', 'Count');
        
        //Add rows to the chart DataTable using PHP
        <?php
            require_once('login.php');
            
            $conn = new mysqli($hn, $un, $pw, $db);
            
            if ($conn->connect_error) die($conn->connect_error);  
            
            //Build a query.
            $query = <<<SQL
                SELECT a.Author_Name, COUNT(b.Author_ID) AS Count
                FROM TBL_BOOKS b
                JOIN TBL_AUTHORS a on b.Author_ID = a.Author_ID
                GROUP BY a.Author_Name;
SQL;
            
            //Send the query to the database, and retrieve the result.
            $result = $conn->query($query);
            
            if(!$result) die($conn->error);
            
            //Fetch and process the results.
            while($row = $result->fetch_assoc()) {
                echo('data.addRow(["' . $row['Author_Name'] . '", ' . $row['Count'] . ']);' . PHP_EOL);
            }
            
            $result->close();
            $conn->close();
        ?>
        
        //Customize the chart by setting the options.
        var options = {
            'title': 'Books by Author',
            'width': 400,
            'height': 300};

        //Draw the chart.
        var chart = new google.visualization.PieChart(document.getElementById('Chart2'));
        chart.draw(data, options);
    }
</script>