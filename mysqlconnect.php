<html>
<head>
</head>

<body>

<?php
//start connection
$con = @mysql_connect("localhost", "root", "");
if(!$con) {
	die("Cannot connect: " . mysql_error());
}


//end
mysql_close($con);
?>

</body>

</html>