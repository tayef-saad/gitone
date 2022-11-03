<?php
  include "connection.php";
  include "navbar.php";

  $book = null;
  $username = null;

      if(isset($_POST['submit']))
      {
        $username = $_POST['username'];
        $book = $_POST['isbn'];

      }

?>
<!DOCTYPE html>
<html>
  <head>
  	<title>Approve Request</title>
  	<meta name="viewport" content="width=device-width, initial-scale=1">

  	<style type="text/css">
  		.srch
  		{
  			padding-left: 1000px;

  		}

      .form-control
  		{
  			width: 200px;
  			height: 40px;
  		}

  		body {
    font-family: "Lato", sans-serif;
    transition: background-color .5s;
  }

  .sidenav {
    height: 100%;
    margin-top: 50px;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #222;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
  }

  .sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
  }

  .sidenav a:hover {
    color: white;
  }

  .sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
  }

  #main {
    transition: margin-left .5s;
    padding: 16px;
  }

  @media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
  }
  .img-circle
  {
  	margin-left: 20px;
  }
  .h:hover
  {
  	color:white;
  	width: 300px;
  	height: 50px;
  	background-color: #00544c;
  }
  .Approval
  {
    margin-left: 470px;
  }

  	</style>

  </head>
  <body>
  <!--_________________sidenav_______________-->

  <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="books.php">Books</a>
    <a href="request.php">Book Request</a>
    <a href="issue_info.php">Issue Information</a>
    <a href="expired.php">Expired List</a>
  </div>

  <div id="main">
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; menu</span>

  <script>
  function openNav() {
    document.getElementById("mySidenav").style.width = "300px";
    document.getElementById("main").style.marginLeft = "300px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
  }

  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.body.style.backgroundColor = "white";
  }
  </script>
  <div class="container">
    <h3 style="text-align: center;">Approve Request</h3><br>
    <form class="Approval" action="" method="post">

        <input type="hidden" name="isbn" value="<?php echo $book; ?>">

        <input type="hidden" name="username" value="<?php echo $username; ?>">

        <input type="text" name="approval" placeholder="Yes or No" required="" class="form-control" ><br>

        <input type="text" name="issue" placeholder="Issue Date yyyy-mm-dd" required="" class="form-control"><br>

        <input type="text" name="back" placeholder="Return Date yyyy-mm-dd" required="" class="form-control"><br>
        <button class="btn btn-default" type="submit" name="approved">Approve</button>
    </form>
  </div>
  </div>
  <?php
    if(isset($_POST['approved']))
    {
      mysqli_query($db, "UPDATE `issue_book` SET `approval` = '$_POST[approval]', `issue` = '$_POST[issue]', `back` = '$_POST[back]' WHERE username='$_POST[username]' AND isbn='$_POST[isbn]'; ");

      mysqli_query($db, "UPDATE books SET quantity = quantity - 1 WHERE isbn='$_POST[isbn]'; ");

      $res=mysqli_query($db, "SELECT quantity FROM books WHERE isbn='$_POST[isbn]'; ");

      while($row=mysqli_fetch_assoc($res))
      {
        if($row['quantity']==0)
        {
          mysqli_query($db, "UPDATE books SET status='not-available' WHERE isbn='$_POST[isbn]'; ");

        }
      }
      ?>
        <script type="text/javascript">
          alert("Updated Successfully.");
          window.location="request.php"
        </script>
      <?php
    }
  ?>
  </body>
</html>
