<?php
  include "connection.php";
  include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Book Request</title>
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

		.body {
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
	<br><br>
<div class="container">
  <div class="srch">
		<br>
		<form method="post" action="approval.php" name="form1">
			<input type="text" name="username" class="form-control" placeholder="Username" required=""><br>
			<input type="text" name="isbn" class="form-control" placeholder="ISBN" required=""><br>
			<button class="btn btn-default" name="submit" value="saad" type="submit">Submit</button><br>
		</form>
	</div>


  <h3 style="text-align: center;">Request for Book</h3>

	<?php
  if(isset($_SESSION['login_user']))
  {
    $sql="SELECT student.username, roll, books.isbn, name, author, edition, status FROM student
INNER JOIN issue_book ON student.username = issue_book.username INNER JOIN books ON issue_book.isbn = books.isbn
WHERE issue_book.approval = '' ";

    $res=mysqli_query($db,$sql);

    if(mysqli_num_rows($res)==0)
    {
      echo "<h2><b>";
      echo "There's no pending request.";
      echo "</h2></b>";
    }
    else
    {
      echo "<table class='table table-bordered table-hover' >";
  			echo "<tr style='background-color: #6db6b9e6;'>";
  				//Table header

  				echo "<th>"; echo "Student Username";  echo "</th>";
  				echo "<th>"; echo "Roll No";  echo "</th>";
  				echo "<th>"; echo "ISBN";  echo "</th>";
  				echo "<th>"; echo "Book Name";  echo "</th>";
          echo "<th>"; echo "Author Name";  echo "</th>";
          echo "<th>"; echo "Edition";  echo "</th>";
          echo "<th>"; echo "Status";  echo "</th>";

  			echo "</tr>";

  			while($row=mysqli_fetch_assoc($res))
  			{
  				echo "<tr>";
          echo "<td>"; echo $row['username']; echo "</td>";
          echo "<td>"; echo $row['roll']; echo "</td>";
          echo "<td>"; echo $row['isbn']; echo "</td>";
          echo "<td>"; echo $row['name']; echo "</td>";
          echo "<td>"; echo $row['author']; echo "</td>";
          echo "<td>"; echo $row['edition']; echo "</td>";
          echo "<td>"; echo $row['status']; echo "</td>";

  				echo "</tr>";
  			}
  		echo "</table>";
  		}
    }
    else
    {
      ?>
        <br>
        <h3 style="text-align: center; color: blue;"><b>You need to login first to see the request.</b></h3>
      <?php
    }

    ?>
	</div>
</div>
</body>
</html>
