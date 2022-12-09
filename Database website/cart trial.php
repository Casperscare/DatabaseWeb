<!DOCTYPE html>
<html lang="en">
<head>
  <title> </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="index1.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 
  <script>
    function js() {
    document.getElementById("parts").style.color = "yellow";
  }
  </script>

  <?php
  include 'db.php';

  ?>


</head>
<body>

<?php

?>



<nav class="navbar navbar-inverse">

    <div class="navbar-Logo">
        
    <a class="navbar-brand"><img src="Images/Logo.png" class="img-fluid" href="#"></a>
    </div>

    <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">

        <form action="index.php" method="post">
        <input type="submit" name="pre-built" value="Pre-Built Computers">
        <input type="submit" name="computer-parts" value="Computer Parts">
        <input type="submit" name="maintenance" value="Maintainance">
        
        </form>

        </ul>
  
    </div>

    <div class="searchbar collapse navbar-collapse">
          <form action="index.php" method="post">
            <li style="list-style-type:none;">
            <input type="text" name="search" id="s-bar" class="btn rounded" placeholder="Search here" aria-label="Search" 
            aria-describedby="search-addon" />
            <input type="submit" name="search_button" value="search" >
            </li>
          </form> 
    </div>

    <div class="icons dropdown show collapse navbar-collapse">



        <li style="list-style-type:none;"><a href="#">
          
        <!-- //cart trial -->
        <!-- Button trigger modal -->
<button type="button" name="shopping-cart" class="btn btn-primary glyphicon glyphicon-shopping-cart" data-toggle="modal" data-target="#exampleModalLong"></button>

<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Your Cart.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- cart trial -->


        
      <a class="glyphicon glyphicon-sort btn-secondary dropdown-toggle" href="#" role="button" 
        id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sort
      </a>
              
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" href="#">Price: Low-High</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Price: High-Low</a>
        <div class="dropdown-divider"></div>
        <!-- <a class="dropdown-item" href="#">Something else here</a> -->
        </div>
       

          <a class="glyphicon glyphicon-filter" href="#" 
          role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filter
        </a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" href="#">Price:</a>

        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Price: High-Low</a>
        <div class="dropdown-divider"></div>
        <!-- <a class="dropdown-item" href="#">Something else here</a> -->
        </div>


            
        </li>

        

    </div>
        


</nav>







</body>

</html>
