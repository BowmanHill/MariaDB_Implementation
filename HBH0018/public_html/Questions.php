<!DOCTYPE html>
<html>
<body>
<style>
    {
        box-sizing: border-box;
    }
    /* Set additional styling options for the columns*/
    .column {
    float: left;
    width: 50%;
    }

    .row:after {
    content: "";
    display: table;
    clear: both;
    }
    </style>

<?php include('Query.php');?>
<h1>Results from prepared question queries<h1>

<a href="http://webhome.auburn.edu/~hbh0018">
  <button>Return to main page.</button>
</a>
<hr>
<h2>Question 1</h2>
	<p1>Show the subject names of books supplied by *supplier2*.<br></p1>
	<div class = "row">

		<div class = "column";>
			<h3>SQL Query</h3>
			<p1>
				SELECT S.CategoryName<br> 
				FROM subject as S, book as B<br> 
				WHERE B.SupplierID = 2 <br>
				AND S.SubjectID = B.SubjectID;<br>
			
			</p1>
		</div>

		<div class = "column";">
			<h3>Query Results;</h3>
			<p1>
			<?php
				QueryDB("SELECT S.CategoryName 
				FROM subject as S, book as B 
				WHERE B.SupplierID = 2 and S.SubjectID = B.SubjectID;");
			?>
			</p1>
		</div>
	</div>
<hr>
<h2>Question 2</h2>
	<p1>
	Show the name and price of the most expensive book supplied by *supplier3*.<br>
	<div class = "row">

		<div class = "column";>
			<h3>SQL Query</h3>
			<p1>
				SELECT Title, MAX(UnitPrice)<br> 
				FROM book <br>
				WHERE SupplierID = 3;<br>
			</p1>
		</div>

		<div class = "column";">
			<h3>Query Results;</h3>
			<p1>
			<?php
				QueryDB("SELECT Title, MAX(UnitPrice) 
				FROM book 
				WHERE SupplierID = 3;");
			?>
			</p1>
		</div>
	</div>

<hr>
<h2>Question 3</h2>
	<p1>
	Show the unique names of all books ordered by *lastname1 firstname1* <br>
	<div class = "row">

		<div class = "column";>
			<h3>SQL Query</h3>
			<p1>
				SELECT DISTINCT Title <br>
				FROM book as B, order_detail as OD, OrderID as OID<br>
				WHERE OID.CustomerID = 1 and OID.OrderID = OD.OrderID and B.bookID = OD.bookID;<br>
			</p1>
		</div>

		<div class = "column";">
			<h3>Query Results;</h3>
			<p1>
			<?php
				QueryDB("SELECT DISTINCT Title 
				FROM book as B, order_detail as OD, OrderID as OID
				WHERE OID.CustomerID = 1 and OID.OrderID = OD.OrderID and B.bookID = OD.bookID;");
			?>
			</p1>
		</div>
	</div>
<hr>
<h2>Question 4</h2>
	<p1>
	Show the title of books which have more than 10 units in stock.<br>
	<div class = "row">

		<div class = "column";>
			<h3>SQL Query</h3>
			<p1>
				SELECT Title <br>
				FROM book<br>
				WHERE Quantity > 10;<br>	
			</p1>
		</div>

		<div class = "column";">
			<h3>Query Results;</h3>
			<p1>
			<?php
				QueryDB("SELECT Title 
				FROM book
				WHERE Quantity > 10;");
			?>
			</p1>
		</div>
	</div>
<hr>
<h2>Question 5</h2>
	<p1>
	Show the total price *lastname1 firstname1* has paid for the books.<br>
	<div class = "row">

		<div class = "column";>
			<h3>SQL Query</h3>
			<p1>
				SELECT sum(OD.Quantity*B.UnitPrice) as TotalPrice<br>
				FROM customer as C, order_detail as OD, OrderID as OID, book as B<br>
				WHERE C.CustomerID = OID.CustomerID and OID.OrderID = OD.OrderID and OD.BookID = B.BookID<br>
				GROUP BY C.LastName, C.FirstName<br>
				HAVING C.FirstName = 'firstname1';<br>
			</p1>
		</div>

		<div class = "column";">
			<h3>Query Results;</h3>
			<p1>
			<?php
				QueryDB("SELECT sum(OD.Quantity*B.UnitPrice) as TotalPrice
				FROM customer as C, order_detail as OD, OrderID as OID, book as B
				WHERE C.CustomerID = OID.CustomerID and OID.OrderID = OD.OrderID and OD.BookID = B.BookID
				GROUP BY C.LastName, C.FirstName
				HAVING C.FirstName = 'firstname1';");
			?>
			</p1>
		</div>
	</div>
<hr>
<h2>Question 6</h2>
	<p1>
	Show the names of the customers who have paid less than $80 in totals.<br>
	<div class = "row">

		<div class = "column";>
			<h3>SQL Query</h3>
			<p1>
				SELECT C.FirstName, C.LastName<br>
				FROM customer as C, order_detail as OD, OrderID as OID, book as B<br>
				WHERE C.CustomerID = OID.CustomerID and OID.OrderID = OD.OrderID and OD.BookID = B.BookID<br>
				GROUP BY C.LastName, C.FirstName<br>
				HAVING sum(OD.Quantity*B.UnitPrice) < 80;<br>
			</p1>
		</div>

		<div class = "column";">
			<h3>Query Results;</h3>
			<p1>
			<?php
				QueryDB("SELECT C.FirstName, C.LastName
				FROM customer as C, order_detail as OD, OrderID as OID, book as B
				WHERE C.CustomerID = OID.CustomerID and OID.OrderID = OD.OrderID and OD.BookID = B.BookID
				GROUP BY C.LastName, C.FirstName
				HAVING sum(OD.Quantity*B.UnitPrice) < 80;");
			?>
			</p1>
		</div>
	</div>
<hr>
<h2>Question 7</h2>
	<p1>
	Show the name of books supplied by *supplier2*.<br>
	<div class = "row">

		<div class = "column";>
			<h3>SQL Query</h3>
			<p1>
SELECT Title			SELECT Title<br>
				FROM book as B, supplier as S<br>
				WHERE B.SupplierID = S.SupplierID and S.CompanyName = 'supplier2';<br>			
			</p1>
		</div>

		<div class = "column";">
			<h3>Query Results;</h3>
			<p1>
			<?php
				QueryDB("SELECT Title
				FROM book as B, supplier as S
				WHERE B.SupplierID = S.SupplierID and S.CompanyName = 'supplier2';");
			?>
			</p1>
		</div>
	</div>
<hr>
<h2>Question 8</h2>
	<p1>
	Show the total price each customer paid and their names. List the result in descending price.<br>
	<div class = "row">

		<div class = "column";>
			<h3>SQL Query</h3>
			<p1>
				SELECT C.FirstName, C.LastName, sum(OD.Quantity*B.UnitPrice) as TotalPrice<br>
				FROM customer as C, order_detail as OD, OrderID as OID, book as B<br>
				WHERE C.CustomerID = OID.CustomerID and OID.OrderID = OD.OrderID and OD.BookID = B.BookID<br>
				GROUP BY C.LastName, C.FirstName<br>
				HAVING sum(OD.Quantity*B.UnitPrice) > 0<br>
				ORDER By TotalPrice DESC;<br>
			</p1>
		</div>

		<div class = "column";">
			<h3>Query Results;</h3>
			<p1>
			<?php
				QueryDB("SELECT C.FirstName, C.LastName, sum(OD.Quantity*B.UnitPrice) as TotalPrice
				FROM customer as C, order_detail as OD, OrderID as OID, book as B
				WHERE C.CustomerID = OID.CustomerID and OID.OrderID = OD.OrderID and OD.BookID = B.BookID
				GROUP BY C.LastName, C.FirstName
				HAVING sum(OD.Quantity*B.UnitPrice) > 0
				ORDER By TotalPrice DESC;");
			?>
			</p1>
		</div>
	</div>
<hr>
<h2>Question 9</h2>
	<p1>
	Show the names of all the books shipped on 08/04/2016 and their shippers' names.<br>
	<div class = "row">

		<div class = "column";>
			<h3>SQL Query</h3>
			<p1>
				SELECT B.Title, SID.ShipperName<br>
				FROM book as B, order_detail as OD, OrderID as OID, ShipperID as SID<br>
				WHERE OID.ShippedDate = '8/4/2016' and OID.ShipperID = SID.ShipperID and OID.OrderID = OD.OrderID and OD.BookID = B.BookID;<br>			
			</p1>
		</div>

		<div class = "column";">
			<h3>Query Results;</h3>
			<p1>

			<?php
				QueryDB("SELECT B.Title, SID.ShipperName
				FROM book as B, order_detail as OD, OrderID as OID, ShipperID as SID
				WHERE OID.ShippedDate = '8/4/2016' and OID.ShipperID = SID.ShipperID and OID.OrderID = OD.OrderID and OD.BookID = B.BookID;");
			?>
			</p1>
		</div>
	</div>
<hr>
<h2>Question 10</h2>
	<p1>
	Show the unique names of all the books *lastname1 firstname1* and *lastname4 firstname4* *both* ordered.<br>
	<div class = "row">

		<div class = "column";>
			<h3>SQL Query</h3>
			<p1>
				SELECT DISTINCT B.Title<br>
				FROM book as B, order_detail as OD, OrderID as OID, customer as C<br>
				WHERE B.BookID = OD.BookID and OD.OrderID = OID.OrderID and OID.CustomerID = 1 <br>
				and B.Title IN (SELECT B.Title<br>
						FROM book as B2, order_detail as OD2, OrderID as OID2, customer as C2<br>
						WHERE B2.BookID = OD2.BookID and OD2.OrderID = OID2.OrderID and OID2.CustomerID = 4 );<br>
			</p1>
		</div>

		<div class = "column";">
			<h3>Query Results;</h3>
			<p1>
			<?php
				QueryDB("SELECT DISTINCT B.Title
				FROM book as B, order_detail as OD, OrderID as OID, customer as C
				WHERE B.BookID = OD.BookID and OD.OrderID = OID.OrderID and OID.CustomerID = 1 
				and B.Title IN (SELECT B.Title
						FROM book as B2, order_detail as OD2, OrderID as OID2, customer as C2
						WHERE B2.BookID = OD2.BookID and OD2.OrderID = OID2.OrderID and OID2.CustomerID = 4 );");
			?>
			</p1>
		</div>
	</div>
<hr>
<h2>Question 11</h2>
	<p1>
	Show the names of all the books *lastname6 firstname6* was responsible for.<br>
	<div class = "row">

		<div class = "column";>
			<h3>SQL Query</h3>
			<p1>
				SELECT DISTINCT B.Title<br>
				FROM book as B, order_detail as OD, OrderID as OID, employee as E<br>
				WHERE B.BookID = OD.BookID and OD.OrderID = OID.OrderID and OID.EmployeeID = 2<br>
				ORDER BY B.BookID<br>
			</p1>
		</div>

		<div class = "column";">
			<h3>Query Results;</h3>
			<p1>
			<?php
				QueryDB("SELECT DISTINCT B.Title
				FROM book as B, order_detail as OD, OrderID as OID, employee as E
				WHERE B.BookID = OD.BookID and OD.OrderID = OID.OrderID and OID.EmployeeID = 2
				ORDER BY B.BookID;");
			?>
			</p1>
		</div>
	</div>
<hr>
<h2>Question 12</h2>
	<p1>
	Show the names of all the ordered books and their total quantities. List the result in ascending quantity.<br>
	<div class = "row">

		<div class = "column";>
			<h3>SQL Query</h3>
			<p1>
				SELECT B.Title, OD.Quantity<br>
				FROM book as B, order_detail as OD<br>
				WHERE B.BookID = OD.BookID<br>
				ORDER BY OD.Quantity ASC;<br>
			</p1>
		</div>

		<div class = "column";">
			<h3>Query Results;</h3>
			<p1>
			<?php
				QueryDB("SELECT B.Title, OD.Quantity
				FROM book as B, order_detail as OD
				WHERE B.BookID = OD.BookID
				ORDER BY OD.Quantity ASC;");
			?>
			</p1>
		</div>
	</div>
<hr>
<h2>Question 13</h2>
	<p1>
	Show the names of the customers who ordered at least 2 books.<br>
	<div class = "row">

		<div class = "column";>
			<h3>SQL Query</h3>
			<p1>
				SELECT C.FirstName, C.LastName <br>
				FROM order_detail as OD, OrderID as OID, customer as C<br>
				WHERE OD.OrderID = OID.OrderID and OID.CustomerID = C.CustomerID <br>
				GROUP BY C.CustomerID<br>
				HAVING SUM(OD.Quantity) > 2;<br>
			</p1>
		</div>

		<div class = "column";">
			<h3>Query Results;</h3>
			<p1>
			<?php
				QueryDB("SELECT C.FirstName, C.LastName 
				FROM order_detail as OD, OrderID as OID, customer as C
				WHERE OD.OrderID = OID.OrderID and OID.CustomerID = C.CustomerID 
				GROUP BY C.CustomerID
				HAVING SUM(OD.Quantity) > 2;");
			?>
			</p1>
		</div>
	</div>
<hr>
<h2>Question 14</h2>
	<p1>
	Show the name of the customers who have ordered at least a book in *category3* or *category4* and the book names.<br>
	<div class = "row">

		<div class = "column";>
			<h3>SQL Query</h3>
			<p1>
				SELECT C.FirstName, C.LastName, B.Title<br>
				FROM customer as C <br>
				JOIN OrderID as OID on C.CustomerID = OID.CustomerID <br>
				JOIN order_detail as OD on OD.OrderID = OID.OrderID<br>
				JOIN book as B on OD.BookID = B.BookID<br>
				JOIN subject as S on S.SubjectID = B.SubjectID<br>
				WHERE S.SubjectID = 3 OR S.SubjectID = 4;<br>			
			</p1>
		</div>

		<div class = "column";">
			<h3>Query Results;</h3>
			<p1>
			<?php
				QueryDB("SELECT C.FirstName, C.LastName, B.Title
FROM customer as C 
join OrderID as OID on C.CustomerID = OID.CustomerID 
join order_detail as OD on OD.OrderID = OID.OrderID
join book as B on OD.BookID = B.BookID
join subject as S on S.SubjectID = B.SubjectID
WHERE S.SubjectID = 3 OR S.SubjectID = 4");
			?>
			</p1>
		</div>
	</div>
<hr>
<h2>Question 15</h2>
	<p1>
	Show the name of the customer who has ordered at least one book written by *author1*.<br>
	<div class = "row">

		<div class = "column";>
			<h3>SQL Query</h3>
			<p1>
				SELECT DISTINCT C.FirstName, C.LastName<br>
				FROM customer as C, OrderID as OID, order_detail as OD, book as B<br>
				WHERE C.CustomerID = OID.CustomerID and OID.OrderID = OD.OrderID and OD.BookID = B.BookID and B.Author = 'author1';<br>
			</p1>
		</div>

		<div class = "column";">
			<h3>Query Results;</h3>
			<p1>
			<?php
				QueryDB("SELECT DISTINCT C.FirstName, C.LastName
				FROM customer as C, OrderID as OID, order_detail as OD, book as B
				WHERE C.CustomerID = OID.CustomerID and OID.OrderID = OD.OrderID and OD.BookID = B.BookID and B.Author = 'author1';");
			?>
			</p1>
		</div>
	</div>
<hr>
<h2>Question 16</h2>
	<p1>
	Show the name and total sale (price of orders) of each employee.<br>
	<div class = "row">

		<div class = "column";>
			<h3>SQL Query</h3>
			<p1>
				SELECT E.FirstName, E.LastName, sum(OD.Quantity*B.UnitPrice) as TotalPrice<br>
				FROM employee as E, order_detail as OD, OrderID as OID, book as B<br>
				WHERE E.EmployeeID = OID.EmployeeID and OID.OrderID = OD.OrderID and OD.BookID = B.BookID<br>
				GROUP BY E.EmployeeID<br>
				HAVING sum(OD.Quantity*B.UnitPrice) > 0<br>
				ORDER By TotalPrice DESC;<br>
			</p1>
		</div>

		<div class = "column";">
			<h3>Query Results;</h3>
			<p1>
			<?php
				QueryDB("SELECT E.FirstName, E.LastName, sum(OD.Quantity*B.UnitPrice) as TotalPrice
				FROM employee as E, order_detail as OD, OrderID as OID, book as B
				WHERE E.EmployeeID = OID.EmployeeID and OID.OrderID = OD.OrderID and OD.BookID = B.BookID
				GROUP BY E.EmployeeID
				HAVING sum(OD.Quantity*B.UnitPrice) > 0
				ORDER By TotalPrice DESC;");
			?>
			</p1>
		</div>
	</div>
<hr>
<h2>Question 17</h2>
	<p1>
	Show the book names and their respective quantities for open orders (the orders which have not been shipped) at midnight 08/04/2016.<br>
	<div class = "row">

		<div class = "column";>
			<h3>SQL Query</h3>
			<p1>
				SELECT B.Title, OD.Quantity<br>
				FROM book as B, order_detail as OD, OrderID as OID<br>
				WHERE B.BookID = OD.BookID AND OD.OrderID = OID.OrderID AND OID.ShippedDate IS NULL;<br>
			</p1>
		</div>

		<div class = "column";">
			<h3>Query Results;</h3>
			<p1>
			<?php
				QueryDB("SELECT B.Title, OD.Quantity
				FROM book as B, order_detail as OD, OrderID as OID
				WHERE B.BookID = OD.BookID AND OD.OrderID = OID.OrderID AND OID.ShippedDate IS NULL;");
			?>
			</p1>
		</div>
	</div>
<hr>
<h2>Question 18</h2>
	<p1>
	Show the names of customers who have ordered more than 1 book and the corresponding quantities. List the result in the descending quantity.<br>
	<div class = "row">

		<div class = "column";>
			<h3>SQL Query</h3>
			<p1>
				QueryDB("SELECT C.FirstName, C.LastName, OD.Quantity<br>
				FROM customer as C, OrderID as OID, order_detail as OD, book as B<br>
				WHERE C.CustomerID = OID.CustomerID AND OID.OrderID = OD.OrderID AND OD.BookID = B.BookID AND OD.Quantity > 1;<br>			
			</p1>
		</div>

		<div class = "column";">
			<h3>Query Results;</h3>
			<p1>
			<?php
				QueryDB("SELECT C.FirstName, C.LastName, OD.Quantity
				FROM customer as C, OrderID as OID, order_detail as OD, book as B
				WHERE C.CustomerID = OID.CustomerID AND OID.OrderID = OD.OrderID AND OD.BookID = B.BookID AND OD.Quantity > 1;");
			?>
			</p1>
		</div>
	</div>
<hr>
<h2>Question 19</h2>
	<p1>
	Show the names of customers who have ordered more than 3 books and their respective telephone numbers<br>
	<div class = "row">

		<div class = "column";>
			<h3>SQL Query</h3>
			<p1>
				SELECT C.FirstName, C.LastName, C.Phone
				FROM customer as C, OrderID as OID, order_detail as OD
				WHERE (OD.Quantity) > 3 AND C.CustomerID = OID.CustomerID AND OID.OrderID = OD.OrderID;
			</p1>
		</div>

		<div class = "column";">
			<h3>Query Results;</h3>
			<p1>
			<?php
				QueryDB("SELECT C.FirstName, C.LastName, C.Phone
FROM order_detail as OD, OrderID as OID, customer as C
WHERE C.customerID = OID.CustomerID and OID.OrderID = OD.OrderID
GROUP BY C.customerID
HAVING SUM(OD.Quantity) > 3;");
			?>
			</p1>
		</div>
	</div>

<hr>
<br><br>

<a href="http://webhome.auburn.edu/~hbh0018">
  <button>Return to main page.</button>
</a>

</body>
</html>