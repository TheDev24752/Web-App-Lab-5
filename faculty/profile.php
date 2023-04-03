<?php 
  session_start();
  
  if( !isset($_SESSION["uid"]) or !$_SESSION['role']==="F" ){
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
	<title>EMS: Faculty Profile</title>
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
	  </tr>
	</table>
	<div class="content-box">
	  <table class="list">
		<tr class="title_row">
		  <td>Name</td>
		  <td>Date of Employment</td>
		  <td>Qualifications</td>
		  <td>Department</td>
		  <td>ID</td>
		</tr>
		<?php
		  include ("../db-connection.php");
		  
		  // get courses
		  $sql="SELECT * FROM faculty_tab WHERE Faculty_id=".$_SESSION['uid'].";";
		  $result=$connect->query($sql);
		  
		  // display each course in rows
		  while($row = $result->fetch_assoc())
		  {
			echo "<tr><td>".$row['Fac_name']."</td>";
			echo "<td>".$row['Fac_DOJ']."</td>";
			echo "<td>".$row['qualification']."</td>";
			echo "<td>".$row['department']."</td>";
			echo "<td>".$row['Faculty_id']."</td></tr>";
		  }
		?>
	  </table>
	</div>
  </body>
</html>