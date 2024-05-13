<!DOCTYPE html>
<html>
<body>

<?php include('Query.php');?>
<h1>Results of select * for each Table</h1>

<a href="http://webhome.auburn.edu/~hbh0018">
  <button>Return to main page.</button>
</a>
<hr>
<p1>
<?php
	QueryDB("SHOW Tables;");
?>
</p1>
<h2>Table 1, OrderID</h2>
			<p1>
			<?php
				QueryDB("SELECT *
				FROM OrderID 
				");
			?>
			</p1>
<hr>

<h2>Table 2, ShipperID</h2>
			<p1>
			<?php
				QueryDB("SELECT *
				FROM ShipperID
				");
			?>
			</p1>
<hr>


<h2>Table 3, book</h2>
			<p1>
			<?php
				QueryDB("SELECT *
				FROM book 
				");
			?>
			</p1>
<hr>


<h2>Table 4, customer</h2>
			<p1>
			<?php
				QueryDB("SELECT *
				FROM customer 
				");
			?>
			</p1>
<hr>


<h2>Table 5, employee</h2>
			<p1>
			<?php
				QueryDB("SELECT *
				FROM employee
				");
			?>
			</p1>
<hr>


<h2>Table 6, order_detail</h2>
			<p1>
			<?php
				QueryDB("SELECT *
				FROM order_detail
				");
			?>
			</p1>
<hr>
<h2>Table 7, subject</h2>
			<p1>
			<?php
				QueryDB("SELECT *
				FROM subject
				");
			?>
			</p1>
<hr>
<h2>Table 8, supplier</h2>
			<p1>
			<?php
				QueryDB("SELECT *
				FROM supplier
				");
			?>
			</p1>
<hr>


<br><br>

<a href="http://webhome.auburn.edu/~hbh0018">
  <button>Return to main page.</button>
</a>

</body>
</html>