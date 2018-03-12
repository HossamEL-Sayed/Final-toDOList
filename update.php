<?php 

require "./connection.php";

?>

<form method="post">
	<label for="id" style='margin-left:50px'><b>ID</b></label></br>
	<input type="text" name="id" id="id"></br></br>
	<label for="name" style='margin-left:50px'><b>List</b></label></br>
	<input type="text" name="name" id="name" required="required"></br></br>
	<input type="submit" name="update" value="Update">
</form>
<?php

  // Update
if (isset($_POST['update']))
{
	$id = $_POST["id"];
	$name = $_POST["name"];
	$sql= "UPDATE lists set name = ? WHERE id= ?";
	$statement = $handler->prepare($sql);
	$statement->execute(array($name,$id));
	Redirect('http://localhost/toDoList/update.php', false);
}

function Redirect($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);
}
