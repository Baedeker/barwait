<html>
<head>
	<title>Database Creation</title>
</head>
<body>
	<?php
	
	if(isset($_GET["create"])){
		$host = "localhost";
		$username = "root";
		$password = "";


	#Create database
		$conn = new mysqli($host,$username,$password);

		if ($conn->connect_error){
			die("Connection failed: " . $conn->connect_error);
		}


		$create = "create database bar_wait";

		if($conn->query($create)){
			echo "Database creation successful<br>";
		}else{
			echo "Something went wrong with database creation<br>";
		}

		$dbname = "bar_wait";

		$conn->close();

	#Create tables

		$conn2 = new mysqli($host,$username,$password,$dbname);

		if(!$conn2){
			echo "Second database connection created unsuccessful<br>";
		}

		$table1 = "create table user(user_name varchar(20), level int, favorite_bars varchar(20))";

		if($conn2->query($table1)){
			echo "First table created successfully<br>";
		}else{
			echo "First table not create successfully<br>";
		}

		$table2 = "create table bar(bar_name varchar(60), current_wait int, current_cover int , worth_it_yes int, worth_it_no int)";


		if($conn2->query($table2)){
			echo "Second table created successfully<br>";
		}else{
			echo "Second table not create successfully<br>";
		}

		$table3 = "create table update_bar(bar_name varchar(60), wait_time int, cover_time int, updated_time varchar(30))";

		if($conn2->query($table3)){
			echo "Third table created successfully<br>";
		}else{
			echo "Third table not create successfully<br>";
		}


	#Creating record for user table

		$insert1 = "insert into user values ('Jane Smith',1,NULL)";

		if($conn2->query($insert1)){
			echo "First user insertion done successfully<br>";
		}else{
			echo "First user insertion not done successfully<br>";
		}

	#Creating records for bars

		$insert2 = "insert into bar values ('Looneys Pub',0,0,0,0)";

		if($conn2->query($insert2)){
			echo "First bar insertion done successfully<br>";
		}else{
			echo "First bar insertion not done successfully<br>";
		}


		$insert3 = "insert into bar values ('Cornerstone Loft & Grill',0,0,0,0)";

		if($conn2->query($insert3)){
			echo "Second bar insertion done successfully<br>";
		}else{
			echo "Second bar insertion not done successfully<br>";
		}
	
		$conn2->close();
	}
	
	



	$button = <<<EOFBODY
	<form action="{$_SERVER['PHP_SELF']}" method='get'>
		<input type="submit" name='create'value="Create Database">
	</form>

EOFBODY;

	echo $button;
	?>
</body>
</html>