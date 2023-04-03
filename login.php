<!DOCTYPE html>

<html>
  <head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" href="https://use.typekit.net/wzl7cnl.css">
	<link rel="icon" type="image" href="Logo.png">
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>EMS: Login</title>
	<script>
      function onSubmit(token) {
        document.getElementById("demo-form").submit();
      }
	  
	  const urlParams = new URLSearchParams(window.location.search);
	  if(urlParams.has('tryagain'))
	  {
		alert("Incorrect username or password")
	  }
    </script>
  </head>
  <body>
	<div class="logo"><img src="Logo-Name.png"/></div>
    <div class="login-box">
      <form class="form" id="demo_form" name="login-form" method="POST" action="redirect.php">
	    <input class="field" name="userid" placeholder="username" />
		<input class="field" type="password" name="password" placeholder="password" /><br>
        <center><div class="g-recaptcha" data-sitekey="6LfIlk8lAAAAALBAMRYuyIR9V_eQ0-a76sO5r2Z0"></div></center>
	    <div class="buttons">
     	  <input type="submit" value="Sign-up"></input>
	      <input type="submit" value="Log-in" onclick="return grecaptcha.getResponse() != '';"></input>
	    </div>
	  </form>
    </div>
  </body>
</html>