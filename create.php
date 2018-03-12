<?php 

require "./connection.php";

?>

<form method="post">
	<label for="name" style='margin-left:50px'><b>List</b></label></br>
	<input type="text" name="name" id="name" required="required"></br></br>
	<input type="submit" name="create" value="Create">
</form>
	
<?php 

  // Create
if (isset($_POST['create']))
{
try 
{
  $stmt = $handler->prepare("INSERT INTO lists (name) VALUES (:name)");
  $stmt->bindValue(":name", $_POST['name']);
  $stmt->execute();
  echo "Successfully added the new user " . $_POST['name'] . ".";
} catch (PDOException $e) 
{
  echo "The user could not be added.".$e->getMessage();
}
}
/*function Redirect($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);
}*/

		
$sql = "SELECT name FROM lists";
$statement = $handler->prepare($sql);
$statement->execute();
$result = $statement->fetchAll();
if ($result && $statement->rowCount() > 0) 
{
?>
	<select>
	<?php	
	foreach ($result as $row) 
	{ ?>
		<option value=""><?php echo($row["name"]); ?></option> 
<?php
	}
?>
	</select>
<?php
}
?>