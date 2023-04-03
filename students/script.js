function redirect(id) {
	var root = "/EMS/students";
	switch(id) {
		case 0:
			window.location.href = root + "/index.php";
			break;
		case 1:
			window.location.href = root + "/profile.php";
			break;
		case 2:
			window.location.href = root + "/faculty.php";
			break;
		case 3:
			window.location.href = root + "/register.php";
			break;
	}
}