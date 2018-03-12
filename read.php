<?php 

require "./connection.php";

?>

<form method="post">
	<label for="name" style='margin-left:50px'><b>List</b></label></br>
	<input type="text" name="name" id="name" required="required"></br></br>
	<input type="submit" name="read" value="Read">
</form>
	
<?php 

  // Read
if (isset($_POST['read'])) 
{
	try 
	{

		$sql = "SELECT * FROM lists WHERE name = :name";
		$name = $_POST["name"];
		$statement = $handler->prepare($sql);
		$statement->bindParam(':name', $name, PDO::PARAM_STR);
		$statement->execute();
		$result = $statement->fetchAll();
	}
	catch(PDOException $error) 
	{
		echo $sql . "<br>" . $error->getMessage();
	}

	if ($result && $statement->rowCount() > 0) 
	{ ?>
			<h2>Results</h2>

			<table>
				<thead>
					<tr>
						<th>#</th>
						<th>name</th>
					</tr>
				</thead>
				<tbody>
				<?php 
				foreach ($result as $row) 
				{ ?>
					<tr>
						<td><?php echo($row["id"]); ?></td>
						<td><?php echo($row["name"]); ?></td>
					</tr>
				<?php 
				} ?>
				</tbody>
			</table>
<?php
	}
}

