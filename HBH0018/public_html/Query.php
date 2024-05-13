<?php
function QueryDB($QueryIn) {
	//Open new Connection
	include_once('db_connection.php');  
	$conn = OpenCon();
	$DROPA = explode(" ", $QueryIn);
	switch(strtolower($DROPA[0])){
		case "drop":
			echo "SQL DROP Statements are not allowed in this interface.";
			break;
		default:
			if (!$conn -> query($QueryIn)) 
			{
				if (empty($_POST["comment"]))	
				{
					echo " ";
				}
				else {
					echo("Error description: " . $conn -> error);
				}
			}
			else 
			{
				$sql = $QueryIn;
				$QT = array();
				$QT = explode(" ", $sql);
				switch(strtolower($QT[0])){
					case "select":
						$result = mysqli_query($conn, $sql);
						if ($result) 
						{
							$count = 0;
							$fieldinfo = $result -> fetch_fields();
							foreach ($fieldinfo as $val) 
							{
								printf("| %s  | ",$val->name);
								echo "  ";
							}
						echo "<br>";
						while ($row = mysqli_fetch_row($result)) 
						{
							$VarCount = count($row);
							for($x = 0; $x < $VarCount; $x++) 
							{
   								printf("| %s | ", $row[$x]);
							}
							$count++;
							echo "<br>";
  						}
						echo "<hr>".$count." rows retrieved.";
						mysqli_free_result($result);
						}
						break;
					case "show":
						$result = mysqli_query($conn, $sql);
						if ($result) 
						{
							$fieldinfo = $result -> fetch_fields();
							foreach ($fieldinfo as $val) 
							{
								printf($val->name);
								echo " ";
							}
							echo "<br>";
							while ($row = mysqli_fetch_row($result)) 
							{
								$VarCount = count($row);
								for($x = 0; $x < $VarCount; $x++) 
								{
   									printf ("%s", $row[$x]);
								}
							echo "<br>";
  							}
						mysqli_free_result($result);
						}
						break;
					case "create":
						$result = mysqli_query($conn, $sql);
						echo " Table \"".$QT[2]."\" created.";
						break;
					case "update":
						$result = mysqli_query($conn, $sql);
						echo " Table \"".$QT[2]."\" updated.";
						break;
					case "insert":
						$result = mysqli_query($conn, $sql);
						echo " Rows added to table \"".$QT[2]."\".";
						break;
					case "delete":
						$result = mysqli_query($conn, $sql);
						echo " Rows deleted from table \"".$QT[2]."\".";
						break;
					default:
						$result = mysqli_query($conn, $sql);
						echo "Query Completed.";
					}
				CloseCon($conn);
				}
	}
}
?>
