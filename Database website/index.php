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


  <?php
  include 'db.php';

  ?>


</head>

<body>

  <nav class="navbar navbar-inverse">

    <div class="navbar-Logo">

      <a class="navbar-brand"><img src="Images/Logo.png" class="img-fluid" href="#"></a>
    </div>

    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">



        <li><button class="button button" onclick="addUrlParameter('category', 'pre-built')">Pre-Built Computers</button></li>
        <li><button class="button button" onclick="addUrlParameter('category', 'parts')">Computer Parts</button></li>
        <li><button class="button button" onclick="addUrlParameter('category', 'warranties')">Maintainance</button></li>


       

      </ul>

    </div>

    <div class="searchbar collapse navbar-collapse">
      <form action="index.php" method="post">
        <li style="list-style-type:none;">
          <input type="text" name="search" id="s-bar" class="btn rounded" placeholder="Search here" aria-label="Search"
            aria-describedby="search-addon" />
          <input type="submit" name="search_button" value="search">
        </li>
      </form>
    </div>

    <div class="icons dropdown show collapse navbar-collapse">


<ul  style="list-style-type:none;">
      

          <!-- //cart trial -->
          <!-- Button trigger modal -->

          <button type="button"  name="shopping-cart" class="btn btn-primary glyphicon glyphicon-shopping-cart"
            data-toggle="modal" data-target="#exampleModalLong"></button>

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
                     <?php

                    function displayCart()
                    {
                      try {

                        echo "<tr>" .
                          "<th>Name</th>" .
                          "<th>Price</th>" .
                          "<th></th>" .

                          "</tr>";
                        foreach ($_SESSION['Cart'] as $key => $value) {
                          echo "<tr>" .
                            "<td>" . $key . "</td>" .
                            '<div class="dropdown-divider"></div>' .
                            "<td>" . $value . "</td>" .
                            '<div class="dropdown-divider"></div>' .
                            '<form action="index.php" method="post">' .
                            "<td><input type=\"submit\" name=\"$key\" value=\"Remove\" class=\"btn btn-primary\" ></td>" .
                            '</form>' .
                            "</tr>"
                          ;
                        }
                        echo "<tr>" .
                          "<th>Total</th>" .
                          "<td>" . array_sum($_SESSION['Cart']) . "</td>" .
                          "</tr>";
                      } catch (\Throwable $th) {
                        throw $th;
                      }
                    }


      foreach ($_SESSION["Cart"] as $key => $value) {

        if (isset($_POST[$key])) {
         
                        unset($_SESSION["Cart"][$key]);
                        
                       $_SEssion['Cart']=array_values($_SESSION['Cart']);
                       print_r($_SESSION["Cart"]);
                       header("Refresh:0");
                    

        }



      }
      displayCart();


      ?> 

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


                

 <!-- checkout button -->




  <!-- checkout button -->



              </div>
            </div>
          </div>



          <!-- cart trial -->


          
          <a class="glyphicon glyphicon-sort btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sort
          </a>
          <script>
            /**
             * It takes a name and a value, creates a new URL search parameter, sets the name and
             * value, and then sets the window location search to the new URL search parameter
             */
            function addUrlParameter(name, value) {
              var searchParams = new URLSearchParams(window.location.search)
              searchParams.set(name, value)
              window.location.search = searchParams.toString()

            }
          </script>

          <!-- Sort -->
          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" onclick="addUrlParameter('price', 'ASC')">Price: Low-High</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" onclick="addUrlParameter('price', 'DESC')">Price: High-Low</a>
            <div class="dropdown-divider"></div>
            <!-- <a class="dropdown-item" href="#">Something else here</a> -->
          </div>






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
        </li>

        
  </ul>

  </nav>



  <?php


try {
  $_SESSION["current"];


   $_SESSION["dbProducts"];

  $_SESSION["Cart"];
  $_SESSION["page"] ;
} catch (\Throwable $th) {
  throw $th;
}



$x = 0;
function prebuilt()
{

  $temp = "";
  $temp2 = "";

  //$current="computer";
  $sql = "SELECT * FROM computer";

  if (isset($_GET['price'])) {
    $dir = $_GET['price'];
    if ($dir == "ASC" || $dir == "DESC") {
      $sql = "$sql ORDER BY price $dir";

    }
    if ($dir == "<400" || $dir == ">400") {
      $sql = "$sql WHERE price $dir";

    }
    if ($dir == "none") {
      $sql = "SELECT * FROM computer";

    }

  }

  // echo $sql;
  $result1 = $_SESSION['dbCon']->query($sql);
  while ($row = mysqli_fetch_array($result1)) {

    $temp = $row['Name'];
    $temp2 = str_replace(" ", "-", $temp);
    $_SESSION["dbProducts"][$temp2] = $row['Price'];


    echo '<li style="list-style-type:none;"><div class="col-sm-4">';
    echo '<div class="panel panel-primary">
      <div class="panel-heading">' . $row['Name'] . '</div>
      
      <div title="Description" class="panel-footer">' . $row['Description'] . '</div>'
      . '<div class="panel-footer">' . $row['Price'] . '</div>'

      . '<form action="index.php?category=pre-built" method="post">'
      . '<div class="panel-footer">'

      . "<input type=\"submit\" name=\"$temp2\" value=\"Add To Cart\" class=\"btn btn-primary\" >
     </form></div>
     </li>";


  }
  $_SESSION["current"] = "computer";
  $_SESSION["page"] = "category=pre-built";
}


function parts()
{

  $temp = "";
  $temp2 = "";

  $sql = "SELECT * FROM product WHERE product.deleted = 0 Or product.deleted IS NULL ";

  if (isset($_GET['price'])) {
    $dir = $_GET['price'];
    if ($dir == "ASC" || $dir == "DESC") {
      $sql = "$sql ORDER BY price $dir";

    } elseif ($dir == "<400" || $dir == ">400") {
      $sql = "$sql WHERE price $dir";

    } elseif ($dir == "none") {
      $sql = "SELECT * FROM product";

    }

  }


  $result1 = $_SESSION['dbCon']->query($sql);
  while ($row = mysqli_fetch_array($result1)) {

    $temp = $row['Name'];
    $temp2 = str_replace(" ", "-", $temp);
    $_SESSION["dbProducts"][$temp2] = $row['Price'];


    echo '<li style="list-style-type:none;"><div class="col-sm-4">';
    echo '<div class="panel panel-primary">
      <div class="panel-heading">' . $row['Name'] . '</div>
      <div class="panel-body"><img src="' . $row['Image'] . '" class="img-responsive" style="width:100%" alt="Image"></div>
      <div title="Description" class="panel-footer">' . $row['Description'] . '</div>'
      . '<div class="panel-footer">' . $row['Price'] . '</div>'

      . '<form action="index.php?category=parts" method="post">'
      . '<div class="panel-footer">'

      . "<input type=\"submit\" name=\"$temp2\" value=\"Add To Cart\" class=\"btn btn-primary\" >
     </form></div>
     </li>";


  }
  $_SESSION["current"] = "product";
  $_SESSION["page"] = "category=parts";
}





function maintenance()
{
  global $resultarray;
  global $shoppingCart;

  $sql = "SELECT * FROM warranty WHERE product.deleted = 0 Or product.deleted IS NULL";

 

  if (isset($_GET['price'])) {
    $dir = $_GET['price'];

    if ($dir == "ASC" || $dir == "DESC") {
      $sql = "$sql ORDER BY price $dir";

    } elseif ($dir == "<400" || $dir == ">400") {
      $sql = "$sql WHERE price $dir";
    } elseif ($dir == "none") {
      $sql = "SELECT * FROM warranty";

    }

  }

  $result1 = $_SESSION['dbCon']->query($sql);
  while ($row = mysqli_fetch_array($result1)) {


    $temp = $row['Name'];
    $temp2 = str_replace(" ", "-", $temp);
    $_SESSION["dbProducts"][$temp2] = $row['Price'];


    echo '<li style="list-style-type:none;"><div class="col-sm-4">';
    echo '<div class="panel panel-primary">
      <div class="panel-heading">' . $row["Name"] . '</div>
      <div class="panel-body">Valid for: ' . $row['Years'] . ' years.</div>
      <div class="panel-footer">' . $row['Description'] . '</div>'
      . '<div class="panel-footer">' . $row['Price'] . '</div>'

      . '<form  action="index.php?category=warranties" method="post">'
      . '<div class="panel-footer">'

      . "<input type=\"submit\" name=\"$temp2\" value=\"Add To Cart\" class=\"btn btn-primary\" >
      
     </form></div>
     </li>";


  }
  $_SESSION["current"] = "warranty";
  $_SESSION["page"] = "category=warranties";


}


if (isset($_GET['category']) && $_GET['category'] == 'warranties') {

  maintenance();
 
}



if (isset($_GET['category']) && $_GET['category'] == 'pre-built') {

  prebuilt();
 print_r($_SESSION["Cart"]);
}
   

elseif (isset($_GET['category']) && $_GET['category'] == 'parts') {

  parts();

}




foreach ($_SESSION["dbProducts"] as $key => $value) {

  if (isset($_POST[$key])) {

 
  $_SESSION["Cart"][$key]=$value;
    
  
  }
}





function search()
{



  $search = trim($_POST['search']);


  if ($search != "") {

    $sql = "SELECT * FROM " . $_SESSION['current'] . " WHERE Name like '%$search%'";

      $cc = "index.php?" . $_SESSION['page'];
   
    $result1 = $_SESSION['dbCon']->query($sql);
      echo $cc;

    while ($row = mysqli_fetch_array($result1)) {

      $temp = $row['Name'];
      $temp2 = str_replace(" ", "-", $temp);
      $_SESSION["dbProducts"][$temp2] = $row['Price'];
      if ($_SESSION['current'] == "warranty") {
        echo '<li style="list-style-type:none;"><div class="col-sm-4">';
        echo '<div class="panel panel-primary">
      <div class="panel-heading">' . $row['Name'] . '</div>
      <div class="panel-footer">' . $row['Description'] . '</div>'
          . '<div class="panel-footer">' . $row['Price'] . '</div>'

          . "<form action=\" $cc \" method=\"post\">"
          . '<div class="panel-footer">'
          . "<input type=\"submit\" name=\"$temp2\" value=\"Add To Cart\" class=\"btn btn-primary\" >
     </form></div>
     </li>";
      }
      else {
        echo '<li style="list-style-type:none;"><div class="col-sm-4">';
        echo '<div class="panel panel-primary">
        <div class="panel-heading">' . $row['Name'] . '</div>
        <div class="panel-body"><img src="' . $row['Image'] . '" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">' . $row['Description'] . '</div>'
          . '<div class="panel-footer">' . $row['Price'] . '</div>'

          .  "<form action=\" $cc \" method=\"post\">"
          . '<div class="panel-footer">'

          . "<input type=\"submit\" name=\"$temp2\" value=\"Add To Cart\" class=\"btn btn-primary\" >
       </form></div>
       </li>";
      }


    }

  }


}



if (isset($_POST['search_button'])) {
  search();
}


?>





  <!-- 
<footer class="container-fluid text-center">
    <p class="text-light">Online Store Copyright></p>  
  </footer> -->

</body>

</html>