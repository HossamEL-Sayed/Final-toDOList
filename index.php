

<?php 

require "./connection.php";

echo "TO DO LIST";

?>
<a href="create.php">Create</a>
<a href="update.php">Update</a>
<a href="delete.php">Delete</a>
<a href="read.php">Read</a>

<?php
try 
	{

		$sql = "SELECT * FROM lists";
		$statement = $handler->prepare($sql);
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
?>