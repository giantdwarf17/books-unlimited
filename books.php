<?php include('header.php'); ?>

<h1>Books</h1>

<?php
//FOLLOW PUBLISHERS.PHP AS AN EXAMPLE
//MODIFY THIS PAGE TO DELETE, INSERT, AND RETRIEVE DATABASE RECORDS
require_once('login.php');

//connect to a database
$conn = new mysqli($hn, $un, $pw, $db);

//if the connection fails, exit and display an error
if ($conn->connect_error) die($conn->connect_error);

//TASK 1: DELETE A RECORD
if (isset($_POST['delete']) && isset($_POST['Book_ID'])) {

    //STEP 1: RETRIEVE DATA FROM THE REQUEST
    $bookID = $_POST['Book_ID'];

    //STEP 2: BUILD A DELETE QUERY
    $query = "DELETE FROM TBL_BOOKS WHERE Book_ID = '$bookID';";
    

    //send the query to the database, and retrieve the result
    $result = $conn->query($query);

    //if the query fails, exit the script
    if (!$result) die($conn->error);
    
} else {
    //TASK 2: INSERT A NEW RECORD
    if (isset($_POST['Title']) 
            && isset($_POST['Author_ID'])
            && isset($_POST['Publisher_ID'])
            && isset($_POST['ISBN'])
            && isset($_POST['Genre'])
            && isset($_POST['Price'])
            && isset($_POST['Cost'])
            && isset($_POST['Stock'])
            && isset($_POST['Rating']))
    {

        //STEP 1: RETRIEVE DATA FROM THE REQUEST
        $title = $_POST['Title'];
        $authorID = $_POST['Author_ID'];
        $publisherID = $_POST['Publisher_ID'];
        $isbn = $_POST['ISBN'];
        
        //FOLLOW EXAMPLE ABOVE, ADD MISSING FIELDS HERE
        $genre = $_POST['Genre'];
        $price = $_POST['Price'];
        $cost = $_POST['Cost'];
        $stock = $_POST['Stock'];
        $rating = $_POST['Rating'];

        $query = <<<SQL
        INSERT INTO TBL_BOOKS (Title, Author_ID, Publisher_ID, ISBN, Genre, Price, Cost, Stock, Rating)
        VALUES ('$title', $authorID, $publisherID, '$isbn', '$genre', $price, $cost, $stock, $rating);
SQL;
    
        //MODIFY QUERY ABOVE, ADD MISSING FIELDS
        
        //send the query to the database, and retrieve the result
        $result = $conn->query($query);

        //if the query fails, exit the script
        if (!$result) die($conn->error);
    }
}
?>

<!--BEGIN: BOOK FORM-->
<div id="BookForm">
    <form method="POST">
        <table>
            <tr>
                <td><label>Title</label></td>
                <td colspan="3"><input type="text" name="Title" maxlength="250" required/></td>
            </tr>
            <tr>
                <td><label>Author</label></td>
                <td colspan="3">
                    <select name="Author_ID">
                        <?php
                            $result = $conn->query('SELECT * FROM TBL_AUTHORS ORDER BY Author_Name ASC;');
                            while($row = $result->fetch_assoc()) 
                                    echo "<option value='" . $row['Author_ID'] ."'>" . $row['Author_Name'] . "</option>\n";
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label>Publisher</label></td>
                <td colspan="3">
                    <select name="Publisher_ID">
                        <?php
                            $result = $conn->query('SELECT * FROM TBL_PUBLISHERS ORDER BY Publisher_Name ASC;');
                            while($row = $result->fetch_assoc()) 
                                    echo "<option value='" . $row['Publisher_ID'] ."'>" . $row['Publisher_Name'] . "</option>\n";
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label>ISBN</label></td>
                <td><input type="text" name="ISBN" maxlength="25" required/></td>
                <td><label>Genre</label></td>
                <td><input type="text" name="Genre" maxlength="50" required/></td>
            </tr>
            <tr>
                <td><label>Price</label></td>
                <td><input type="number" step="any" name="Price" required/></td>
                <td><label>Cost</label></td>
                <td><input type="number" step="any" name="Cost" required/></td>
            </tr>
            <tr>
                <td><label>Stock</label></td>
                <td><input type="number" min="0" step="1" name="Stock" required/></td>
                <td><label>Rating</label></td>
                <td><input type="number" step="any" min="0" max="5" name="Rating" required/></td>
            </tr>              
            <tr>
                <td></td>
                <td colspan="3"><input type="submit" value="Insert Book"/>
            </tr>
        </table>
    </form>
</div>
<!--END: BOOK FORM-->

<hr/>

<!--BEGIN: BOOK LIST-->
<div id="BookList">
    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th width="10%">ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Publisher</th>
                <th>ISBN</th>
                <th>Genre</th>
                <th>Price</th>
                <th>Cost</th>
                <th>Stock</th>
                <th>Rating</th>
                <th width="10%">Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            //TASK 3: RETRIEVE RECORDS
            
            //STEP 1: MODIFY THE SELECT QUERY BELOW TO ALSO JOIN THE AUTHORS TABLE TO THE BOOKS TABLE
            $query = <<<SQL
                SELECT * FROM TBL_BOOKS
                JOIN TBL_PUBLISHERS ON TBL_BOOKS.Publisher_ID = TBL_PUBLISHERS.Publisher_ID
                JOIN TBL_AUTHORS ON TBL_BOOKS.Author_ID = TBL_AUTHORS.Author_ID
                ORDER BY TBL_BOOKS.Title ASC;
SQL;

            //send the query to the database, and retrieve the result
            $result = $conn->query($query);

            //fetch and process the results
            $rowcount = $result->num_rows;

            for ($j = 0; $j < $rowcount; ++$j) {
                $result->data_seek($j);
                $row = $result->fetch_assoc();

                // STEP 2: ADD MISSING FIELDS BELOW
                $tbody = <<<HTML
                    <tr>
                        <td>{$row['Book_ID']}</td>
                        <td>{$row['Title']}</td>
                        <td>{$row['Author_Name']}</td>
                        <td>{$row['Publisher_Name']}</td>
                        <td>{$row['ISBN']}</td>
                        <td>{$row['Genre']}</td>
                        <td>$ {$row['Price']}</td>
                        <td>$ {$row['Cost']}</td>
                        <td>{$row['Stock']}</td>
                        <td>{$row['Rating']} / 5</td>
                        <td>
                            <form method='post'>
                                <input type='hidden' name='delete' value='yes' />
                                <input type='hidden' name='Book_ID' value="{$row['Book_ID']}" />
                                <input type='submit' value='Delete'/>
                            </form>
                        </td>
                    </tr>
HTML;

                echo($tbody);
            }

            //close the results
            $result->close();

            //close the connection
            $conn->close();
            ?>
        </tbody>
    </table>
</div>
<!--END: BOOK LIST-->

<?php include('footer.php'); ?>
