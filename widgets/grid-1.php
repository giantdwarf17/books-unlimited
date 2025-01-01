<!--TASK 3: CUSTOMIZE A GRID WIDGET -->
<script type="text/javascript">
    //Use this function to retrieve data from the OpenLibrary API.
    function getData(isbn) {
        var url = 'https://openlibrary.org/api/books?jscmd=data&bibkeys=ISBN:' + isbn;
        var html = '';
        
        $.get({
          url: url,
          dataType: "jsonp",
          success: function (data) {
            try {
                var book = data['ISBN:' + isbn];
                
                if(book) {
                    html += '<div class="details">';
                    if(book.cover) {
                        html += '<img style="float:left;padding:3px;" src="' + book.cover.small + '"/>';
                    }
                    // STEP 1: CUSTOMIZE THE HTML HERE
                    //html += '<p>' + book.ATTRIBUTE1 + '</p>';
                    //html += '<p>' + book.ATTRIBUTE2 + '</p>';
                    
                    html += '</div>';
                }
                
                $('#' + isbn).append(html);
            } catch (ex) {
                console.log(ex);
            };
          }
        });
    };
</script>

<table id="ReportGrid" class="table table-striped">
    <thead class="table-dark">
        <tr>
            <th width="10%">ID</th>
            <th>Title</th>
            <th width="10%">Publisher</th>
            <!--STEP 2: ADD ADDITIONAL COLUMNS HERE-->
        </tr>
    </thead>
    <tbody>
        <?php
            require_once('login.php');
            
            $conn = new mysqli($hn, $un, $pw, $db);
            
            if ($conn->connect_error) die($conn->connect_error);
        
            //STEP 3: CUSTOMIZE THE QUERY BELOW (HINT: JOIN THE AUTHORS TABLE)
            $query = 'SELECT * FROM TBL_BOOKS'
                    . ' JOIN TBL_PUBLISHERS ON TBL_BOOKS.Publisher_ID = TBL_PUBLISHERS.Publisher_ID'
                    . ' ORDER BY TBL_BOOKS.Title ASC;';

            $result = $conn->query($query);
            
            if(!$result) die($conn->error);
            
            $rowcount = $result->num_rows;

            for ($j = 0; $j < $rowcount; ++$j) {
                $result->data_seek($j);
                $row = $result->fetch_assoc();

                $book_id = $row['Book_ID'];
                $title = $row['Title'];
                $isbn = $row['ISBN'];
                $publisher_name = $row['Publisher_Name'];

                $tbody = <<<HTML
                <tr>
                    <td>{$book_id}
                    </td>
                    <td>
                        <span>{$title}</span>
                        <div id={$isbn}></div>
                        <script>getData('$isbn');</script>
                    </td>
                    
                    <td>{$publisher_name}</td>
                </tr>
HTML;
        
                echo($tbody);
            };

            $result->close();
            
            $conn->close();
            ?>
    </tbody>
</table>