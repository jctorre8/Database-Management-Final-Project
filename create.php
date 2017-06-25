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


//DROP DATABASE

$sql = "DROP DATABASE Cars";
mysql_query($sql, $con);


//CREATE
$sql = "CREATE DATABASE Cars";
if(mysql_query($sql, $con))
{
	echo "<h1>Database created successfully.</h1>";
}
else
{
	echo "<h1>Database already created.</h1> <br/>";
}
mysql_select_db("Cars", $con);


$sql = "CREATE TABLE `Connector` (
	ConnectorID int,
	Manfacturer varchar(20),
	`Pin Number` int,
	`Pin Type` varchar(20)
)";
mysql_query($sql, $con);


$sql = "CREATE TABLE `Car Component` (
	ComponentID int,
	Controller varchar(20),
	Connector varchar(20),
	Name varchar(20)
)";
mysql_query($sql, $con);

$sql = "CREATE TABLE `Controller` (
	ControllerID int,
	Name varchar(20),
	Supplier varchar(20)
)";
mysql_query($sql, $con);

$sql = "CREATE TABLE `Car` (
	CarID int,
	Model varchar(20),
	Version varchar(20),
	Type varchar(20)
)";
mysql_query($sql, $con);

$sql = "CREATE TABLE `CAN Message` (
	`Base Address` varchar(25),
	Name varchar(20),
	`CAN Bus` varchar(20)
)";
mysql_query($sql, $con);

$sql = "CREATE TABLE `CAN Signals` (
	`Address` varchar(25),
	Name varchar(20),
	`Units` varchar(20)
)";
mysql_query($sql, $con);





echo "<p>";
echo "<form action=home.php method=post>";
echo "<input type=submit name=home value=Home />";
echo "</form>";
echo "</p>";


mysql_close($con);

?>

</body>

</html>