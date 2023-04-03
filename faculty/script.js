function redirect(id) {
	var root = "/EMS/faculty";
	switch(id) {
		case 0:
			window.location.href = root + "/index.php";
			break;
		case 1:
			window.location.href = root + "/profile.php";
			break;
	}
}