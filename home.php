<html>
<head>
</head>

<body>

<?php
$con = @mysql_connect("localhost", "root", "");
if(!$con) {
	die("Cannot connect: " . mysql_error());
}
echo "<center><h1>Car Database for SER 322</h1></center> <hr />";
mysql_close($con);
?>
<form action="table1.php" method="post">
    <input id="button" type="submit" name="table1" value="Car" />
</form>
<form action="table2.php" method="post">
	<input id="button" type="submit" name="table2" value="Car Component" />
</form>
<form action="table3.php" method="post">
	<input id="button" type="submit" name="table3" value="Connector" />
</form>
<form action="table4.php" method="post">
	<input id="button" type="submit" name="table4" value="Can Message" />
</form>
<form action="table5.php" method="post">
	<input id="button" type="submit" name="table5" value="Can Signals" />
</form>
<form action="table6.php" method="post">
	<input id="button" type="submit" name="table6" value="Controller" />
</form>
</body>

</html>
