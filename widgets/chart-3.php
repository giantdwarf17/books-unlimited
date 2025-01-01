<!--TASK 2: CREATE A CHART WIDGET -->
<div id="Chart3" class="widget">LOADING...</div>

<script type="text/javascript">
    //FOLLOW THE EXAMPLE CODE IN chart1.php TO CREATE YOUR OWN CHART WIDGET
    
    //Load the Google Charts Visualization API.
    google.charts.load('current', {'packages': ['corechart']});
    
    //Set the callback function to execute and draw the chart when the API is loaded.
    google.charts.setOnLoadCallback(drawChart);

    //The callback function that creates and draws the chart.
    function drawChart() {
        //Create a chart DataTable.
        var data = new google.visualization.DataTable();
        
        //STEP 1: ADD COLUMNS TO THE CHART DATATABLE
        data.addColumn('string', 'Book Stock');
        data.addColumn('number', 'Count');
       
        //Add rows to the chart DataTable using PHP
        <?php
            require_once('login.php');
            
            $conn = new mysqli($hn, $un, $pw, $db);
            
            if ($conn->connect_error) die($conn->connect_error);
            
            //STEP 2: BUILD A QUERY
            $query = 'SELECT Title, Stock FROM TBL_BOOKS ORDER BY Stock DESC;';
        
            //Send the query to the database, and retrieve the result.
            $result = $conn->query($query);
            
            if(!$result) die($conn->error);
            
            //Fetch and process the results.
            while($row = $result->fetch_assoc()) {
                echo('data.addRow(["' . $row['Title'] . '", ' . $row['Stock'] . ']);' . PHP_EOL);
            }
            
            $result->close();
            $conn->close();
        ?>
        
        //Customize the chart by setting the options.
        var options = {
            'title': 'Book Stock',
            'width': 400,
            'height': 300
        };

        //Draw the chart.
        var chart = new google.visualization.BarChart(document.getElementById('Chart3'));
        chart.draw(data, options);
    }
</script>