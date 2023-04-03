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
	  <h1>Faculty List:</h1>
	  <!--Faculty list-->
	  <table class="list">
		<?php
		  include ("../db-connection.php");
		  
		  //get department
		  $sql="SELECT * FROM department_tab WHERE INSTR(`Majors`, '{$_SESSION['data']['Stu_major']}') > 0";
		  $result=$connect->query($sql);
		  $row = $result->fetch_assoc();
		  
		  echo
		  "<tr class='title_row'>
		    <td>".$row['Dept_name']." Department Faculty</td>
		    <td>Faculty ID</td>
		  </tr>";
		  
		  //get faculty
		  $sqlf="SELECT * FROM faculty_tab WHERE department='".$row['Dept_name']."';";
		  $resultf=$connect->query($sqlf);
		  
		  //display faculty in rows
		  while($rowf = $resultf->fetch_assoc())
		  {
			//name
			echo "<tr><td>".$rowf['Fac_name']."</td>";
			//id
			echo "<td>".$rowf['Faculty_id']."</td></tr>";
		  }
		?>
	  </table>
	</div>
  </body>
</html>