<?php 

require "./connection.php";

?>

<form method="post">
	<label for="id" style='margin-left:50px'><b>ID</b></label></br>
	<input type="text" name="id" id="id"></br></br>
	<input type="submit" name="delete" value="Delete">

</form>
<?php

  // Delete
if (isset($_POST['delete']))
{
	$id = $_POST["id"];
	$sql= "DELETE From lists WHERE id = ?";
	$statement = $handler->prepare($sql);
	$statement->execute(array($id));
	Redirect('http://localhost/toDoList/delete.php', false);
}
function Redirect($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);
}