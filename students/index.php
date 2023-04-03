<?php 
  session_start();
  
  if( !isset($_SESSION["uid"]) or !$_SESSION['role']==="S" ){
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
	  <h1>Hello  <?php
	    echo $_SESSION['data']['Stu_name'];
	  ?>!</h1>
	  <p>Here is a list of courses being offered:</p>
	  <!--Class list-->
	  <table class="list">
		<tr class="title_row">
		  <td>Course ID and Name</td>
		  <td>Faculty</td>
		  <td>Semesters Offered</td>
		  <td>Credits</td>
		  <td>Pre-reqisities</td>
		</tr>
		<?php
		  include ("../db-connection.php");
		  
		  // get courses
		  $sql="SELECT * FROM courses_tab;";
		  $result=$connect->query($sql);
		  
		  // display each course in rows
		  while($row = $result->fetch_assoc())
		  {
			// course id and name
			echo "<tr><td>".$row['Course_id'].": ".$row['Course_name']."</td>";
			// faculty, TODO: DEREF FACULTY ID
			echo "<td>".$row['Fac_id']."</td>";
			// offering
			echo "<td>".$row['Offered_in']."</td>";
			echo "<td>".$row['credits']."</td>";
			echo "<td>".$row['pre_req']."</td></tr>";
		  }
		?>
	  </table>
	</div>
  </body>
</html>