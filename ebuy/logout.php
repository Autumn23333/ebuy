<?php 
// set the expiration date to one hour ago
setcookie("user", "", time()-3600);
setcookie("is_logged", "", time()-3600);
?>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	echo "<script language='javascript'>;alert('log out successfully!');</script>";
	#head to the register page
	echo "<script language='javascript'>;window.location.href='mainpage.php';</script>";
	?>
</body>
</html>