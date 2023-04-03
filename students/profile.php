<?php 
  session_start();
  
  if( !isset($_SESSION["uid"]) ){
	header("location: /EMS/login.php");
  }
?>

<!DOCTYPE html>

<html>
  <head>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" href="https://use.typekit.net/wzl7cnl.css">
	<link rel="icon" type="image" href="../Logo.png">
	<script src="script.js"></script>
	<title>EMS: Student Dashboard</title>
  </head>
  <body>
	<div class="logo"><img src="../Logo-Name.png"/></div>
	<table class="menu-bar">
	  <tr>
	    <td onclick="redirect(0);">
		  Courses Home
		</td>
	    <td onclick="redirect(1);">
		  View Profile
		</td>
	    <td onclick="redirect(2);">
		  View Faculty
		</td>
	    <td onclick="redirect(3);">
		  Register Courses
		</td>
	  </tr>
	</table>
	<div class="content-box">
	  <table class="list">
		<tr class="title_row">
		  <td>Name</td>
		  <td>Year</td>
		  <td>Major</td>
		  <td>CGPA</td>
		  <td>ID</td>
		</tr>
		<?php
		  include ("../db-connection.php");
		  
		  // get data
		  $sql="SELECT * FROM student_tab WHERE Stu_id=".$_SESSION['uid'].";";
		  $result=$connect->query($sql);
		  
		  // display each course in rows
		  while($row = $result->fetch_assoc())
		  {
			echo "<tr><td>".$row['Stu_name']."</td>";
			echo "<td>".$row['year_of_graduation']."</td>";
			echo "<td>".$row['Stu_major']."</td>";
			echo "<td>".$row['CGPA']."</td>";
			echo "<td>".$row['Stu_id']."</td></tr>";
		  }
		?>
	  </table>
	</div>
  </body>
</html>