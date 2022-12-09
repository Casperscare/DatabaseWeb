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


<form action="index.php" >
<input  class="btn btn-primary" type="submit" name="continue" value="Continue shopping" >
</form>


      <form id="form1" action="formSubmit.php" method="post" >
        <div class="mb-3">
      
          <div class="mb-3">
              <label for="Name" id="name" class="form-label">Name</label>
              <input type="text" class="form-control" name="Name">
            </div>
      
          <label for="Email" class="form-label">Email address</label>
          <input type="email" class="form-control" name="Email" aria-describedby="emailHelp">
         
        </div>
        <div class="mb-3">
          <label for="Phone" class="form-label">Phone</label>
          <input type="tel" class="form-control" name="Phone">
        </div>
      
        <div class="mb-3">
          <label for="Address" class="form-label">Address</label>
          <input type="text" class="form-control" name="Address">
        </div>
      
       
       
            <li style="list-style-type:none;">
            <input  class="btn btn-primary" type="submit" name="sea" value="Submit" >
            </li>
          </form> 
       
      </form> 
      

 

<?php


if (isset($_POST['sea'])) {


  $name = $_POST['Name'];
  $email = $_POST['Email'];
  $phone = $_POST['Phone'];
  $address = $_POST['Address'];
  $now = date("Y-m-d H:i:s");

  $total =array_sum($_SESSION['Cart']);   
  $sql = "INSERT INTO `order`(`CustomerName`, `CustomerEmail`,`CustomerPhone`, `CustomerAddress`,`Status`,`Total`,`paymentStatus`,`StoreBranchID`) 
  VALUES ('$name','$email','$phone','$address',0, '$total',0,1)";

  // $sql = "SELECT * FROM warranty";

   $result = $_SESSION['dbCon']->query($sql);

  if ($result) {
    echo "success";
    
  } else {
    echo "failed";
    
  }

}


?>


  

</body>

</html>
  
      