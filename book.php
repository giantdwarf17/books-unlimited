<?php include('header.php'); ?>

<!-- TASK 2: COMBINE DATA MASHUPS (REST API) -->
<!-- FOLLOW THE EXAMPLES BELOW, AND MODIFY THIS PAGE TO DISPLAY ADDITIONAL DATA FROM THE OPENLIBRARY API -->

<section id="Book" class="p-5">
  <table class="table table-borderless">
    <h1 id="BookTitle" class="text-center"></h1>
    <h5 id="Author" class="text-center"></h5>
    <tbody>
      <tr>
        <td scope="col"><img id="CoverImage" src=""></th>
        <td scope="col"><p id="Summary"></p></th>
      </tr>
    </tbody>
  </table>
  <p class="text-center">If data appears to be missing, the requested book may not be in our database yet. Please ask a staff member and they will be happy to order it for you!</p>
</section>

<script>
  $(document).ready(function () {
    //The line below retrieves the value of ISBN from the URL using $_GET
    //This value is passed to book.php from the browse.php file when clicking on the title of a book
    var isbn = '<?php if(isset($_GET['isbn'])) echo($_GET['isbn']); ?>';
    var url = 'https://openlibrary.org/isbn/' + isbn + ".json";

    $.get({
      url: encodeURI(url),
      dataType: "json",
      success: function (data) {
        if (data.covers) {
          var coverId = data.covers[0]
          var cover = "https://covers.openlibrary.org/b/id/" + coverId + "-M.jpg"
        }

        //STEP 3: DISPLAY MORE DATA, USE THE LINES BELOW AS A GUIDE
        if (data.title) {
          $('#BookTitle').text(data.title);
        }
        if (data.author) {
          $('#Author').text(data.author);
        }
        if (cover) {
          $("#CoverImage").attr("src", cover);
        }
        if (data.description) {
          $('#Summary').text(data.description);
        }
        //$('#YOUR_ATTRIBUTE3').text(book.YOUR_ATTRIBUTE2);
      },
    });
  });
</script>

<?php include('footer.php'); ?>
