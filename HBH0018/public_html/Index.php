<!DOCTYPE HTML>  
<html>
<head>
	<style>
		.content {max-width: 500px; margin: auto; border:1px solid black;}
		.conten {max-width: 500px; margin: auto;}
		h1 {text-align: center;}
		h2 {text-align: center;}
		
		//Column Formatting
		{box-sizing: border-box;}
		.column {float: left; width: 50%;}
		.row:after {content: ""; display: table; clear: both;}
	</style>
	
	<h1>Database Query Form</h1>
	<h2>By; Bowman Hill</h2>
	<hr>
</head>

<body>
	<div class = "conten">
	<div class = "row";>
		<div class = "column";>
			Please enter SQL statement below;
		</div>

		<div class = "column";>
			<?php
				// define variables and set to empty values
				$comment = "";
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					if (empty($_POST["comment"])) {
						$comment = "";
						echo "Please enter a non-empty statement";
					} 
					else {
						include_once('db_connection.php');
						$comment = $_POST["comment"];
					}
				}
			?>
		</div>
	</div>
	<div class = "row">	
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
				<textarea name="comment" rows="5" cols="53"><?php echo $comment;?></textarea><br><br>
		<div class = "column";>
				<input type="submit" name="submit" value="Submit"> 
			</form>
			<a href="http://webhome.auburn.edu/~hbh0018">
				<button>Reset</button>
			</a>
		</div>
	
		<div class = "column";>
			
			<form action="Questions.php" method="post">
				<input type="submit" value = "Test Prepared Questions">
			</form>
			<form action="Explore.php" method="post">
				<input type="submit" value = "Explore Database">
			</form>

		</div>
	</div>
	</div>
	<hr>
	<h2>Your Query;</h2>
	
	<div class = "content">
		<?php
			include('Query.php');
			$QueryIn = $comment;
			QueryDB($QueryIn);
		?>	
	</div>
</body>
</html>