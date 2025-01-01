<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Books Unlimited</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.1.1.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
  </head>
  <body style="background: #ddd;">
    <div id="Content" class="container">
      <header>
        <h1 class="text-center">Books Unlimited</h1>
        <nav class="navbar navbar-expand-lg border-bottom border-3 border-warning rounded-top" style="background-color: #444;">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link text-light" href="index.php">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Browse
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="./browse.php?cat=new">New Releases</a></li>
                  <li><a class="dropdown-item" href="./browse.php?cat=best-sellers">Best Sellers</a></li>
                  <li><a class="dropdown-item" href="./browse.php?cat=staff-picks">Staff Picks</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Admin
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="./books.php">Book Records</a></li>
                  <li><a class="dropdown-item" href="./authors.php">Author Records</a></li>
                  <li><a class="dropdown-item" href="./dashboard.php">Dashboard</a></li>
                </ul>
              </li>
              <!-- ADD LINKS TO ADDITIONAL PAGES HERE-->
            </ul>
            <form role="search" onsubmit="window.location.href = './book.php?isbn=' + document.getElementById('isbn').value; return false;">
              <div class="input-group">
                <input id="isbn" type="text" class="form-control" name="isbn" placeholder="Search by ISBN">
                <div class="input-group-append">
                  <button class="btn btn-secondary" type="submit" value="Submit request">
                    <i class="fa fa-search"></i>
                  </button>
                </div>
              </div>
            </form>
        </nav>
      </header>
      <main class="bg-light">