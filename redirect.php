<?php 
  session_start();
?>

<!DOCTYPE html>

<html>
	<body>
		<?php
			include ("db-connection.php");

			$uid=($_POST['userid']);
			$pwd=($_POST['password']);

			$sql="SELECT * FROM users_tab where userid='$uid' AND password='$pwd'";
			$result=$connect->query($sql);
			$row = $result->fetch_assoc(); 

			if($row['role']==='S')  //Students
			{
				$_SESSION['uid']=$row['id_number'];

				$sql1="SELECT * FROM student_tab where Stu_id=".$row['id_number'];
				$result1=$connect->query($sql1);
				$row1 = $result1->fetch_assoc();
				
				$_SESSION['data']=$row1;
				$_SESSION['role'] = "S";
				
				header('location: students/index.php');
			}
			elseif($row['role']==='F')  //Faculty
			{
				$_SESSION['uid']=$row['id_number'];

				$sql1="SELECT * FROM faculty_tab where faculty_id=".$row['id_number'];
				$result1=$connect->query($sql1);
				$row1 = $result1->fetch_assoc();
				
				$_SESSION['data']=$row1;
				$_SESSION['role'] = "F";
				header('location: faculty/index.php');
			}
			elseif($row['role']==='A')  //Admin
			{
				$_SESSION['uid']=$uid;
				$_SESSION['role'] = "A";
				header('location: admin/index.php');
			}
			else
			{
				$_SESSION['loginfail'] = true;
				header('location: login.php?tryagain=true');
			}
		 
			//-------------------------------Login Failed---------------------
		?>
	</body>
</html>