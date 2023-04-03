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
	<title>EMS: Faculty Dashboard</title>
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
	  <h1>Hello  <?php
	    echo $_SESSION['data']['Fac_name'];
	  ?>!</h1>
	  <p>Here is a list of courses you teach:</p>
	  <!--Class list-->
	  <table class="list">
		<tr class="title_row">
		  <td>Course ID and Name</td>
		  <td>Credits</td>
		  <td>Students</td>
		</tr>
		<?php
		  include ("../db-connection.php");
		  
		  // get courses
		  $sql="SELECT * FROM courses_tab WHERE Fac_id='".$_SESSION['uid']."';";
		  $result=$connect->query($sql);
		  
		  // display each course in rows
		  while($row = $result->fetch_assoc())
		  {
			// course id and name
			echo "<tr><td>".$row['Course_id'].": ".$row['Course_name']."</td>";
			echo "<td>".$row['credits']."</td>";
			
			/* where do we store the courses the students are taking?
			// get students
		    $sqls="SELECT * FROM courses_tab WHERE Fac_id='".$_SESSION['uid']."';";
		    $results=$connect->query($sqls);
			*/
			
			echo "<td></td></tr>";
		  }
		?>
	  </table>
	</div>
  </body>
</html>