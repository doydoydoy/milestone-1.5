<!DOCTYPE html>
<html>
<head>
	<title>logout function</title>
</head>
<body>

	<?php
		session_start();
		session_destroy();
		echo "<script>window.location.href='template.php'</script>";
	?>

</body>
</html>


