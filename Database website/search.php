
<!DOCTYPE html>
<html lang="en">

<head>
  <title> </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="trial.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>




</head>

<body>


<nav class="navbar navbar-dark bg-dark">
  <!-- Navbar pic -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container" id="ff">
    <a class="navbar-brand" href="#"><img src="Images/Logo.png" class="img-fluid" href="#"></a>
 
            <!-- Navbar pic -->

        <!-- Navbar categories-->

 
      <ul class="nav navbar-nav">

        <li><button class="button button" onclick="addUrlParameter('category', 'pre-built')">Pre-Built Computers</button></li>
        <li><button class="button button" onclick="addUrlParameter('category', 'parts')">Computer Parts</button></li>
        <li><button class="button button" onclick="addUrlParameter('category', 'warranties')">Maintainance</button></li>

      </ul>

    
 <!-- Navbar categories-->
 <div class=" searchbar collapse navbar-collapse" id="search">
      <form action="index.php" method="post">
        <li style="list-style-type:none;">
          <input type="text" name="search" id="s-bar" class="btn rounded" placeholder="Search here" aria-label="Search"
            aria-describedby="search-addon" />
          <input type="submit" name="search_button" value="search">
        </li>
      </form>
    </div>

    
    </div>

    

   <!-- Navbar cart-->
   <button type="button"  name="shopping-cart" class="btn btn-primary glyphicon glyphicon-shopping-cart"
            data-toggle="modal" data-target="#exampleModalLong" id="carticon"></button>

          <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Your Cart.</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>



                </div>



                <div class="modal-body">
                  <table style="width:100%">
           

                  </table>

                </div>

                <script>
                    function checkout() {
                      window.location.href = "formSubmit.php";
                    }
                    </script>

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                 
                  <button type="button" class="btn btn-primary" onclick=checkout()>checkout</button>
                
                </div>

    <!-- Navbar cart-->
    </div>


    <!-- Navbar Filter -->

    <div class="dropdown" >
            <button class="glyphicon glyphicon-filter" type="button" id="dropdownMenuButton" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              Filter
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" onclick="addUrlParameter('price', '<400')">Price:Below 400</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" onclick="addUrlParameter('price', '>400')">Price:Above 400</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" onclick="addUrlParameter('price', 'none')">None</a>

            </div>
          </div>
    
          <!-- Filter -->



  
    </nav>

  </nav>
</div>
</nav>




</body>

</html>