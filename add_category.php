<?php
require('requirelogin.php');
include_once("connection.php");
	if(isset($_POST["btnAdd"]))
	{
		$id = $_POST['txtID'];
		$name = $_POST['txtName'];
		$des = $_POST['txtDes'];
		$err="";
		if($id=="")
		{
			$err.="<li>Enter Category ID, please</li>";
		}
		if($name=="")
		{
			$err.="<li>Enter Category Name, please</li>";
		}
		if($err!="")
		{
			echo "<ul>$err</ul>";
		}
		else
		{
		$sq="SELECT * FROM public.category WHERE cat_id='$id' or cat_name='$name'";
		$result = pg_query($conn,$sq);
			if(pg_num_rows($result)==0)
			{
				pg_query($conn, "INSERT INTO public.category (cat_id, cat_name, cat_des) VALUES ('$id', '$name', '$des')");
				echo '<meta http-equiv="refresh" content="0;URL=index1.php?page=category"/>';
			}
			else
			{
				echo "<li>Duplicate category ID</li>";
			}
	    }
	}

?>

<div class="container">
	<h2>ADD CATEGORY</h2>
	<form method="POST" class="form-horizontal" role="form">
	<div class="form-group">
		<label>Category ID:</label>
		<input type="text" class="form-control" id="txtID" name="txtID" placeholder="Enter category ID" value='<?php echo isset($_POST["txtID"])?($_POST["txtID"]):"";?>'>
	</div>
	<div class="form-group">
		<label>Category Name:</label>
		<input type="text" class="form-control" id="txtName" name="txtName" placeholder="Enter category Name" value='<?php echo isset($_POST["txtName"])?($_POST["txtName"]):"";?>'>
	</div>
	<div class="form-group">
		<label>Description:</label>
		<input type="text" class="form-control" id="txtDes" name="txtDes" placeholder="Enter description" value='<?php echo isset($_POST["txtDes"])?($_POST["txtDes"]):"";?>'>
	</div>
		<button type="submit" class="btn btn-primary" name="btnAdd" value="Add new">Submit</button>
		<button type="button" class="btn btn-danger" name="btnCancel" value="Ignore" onclick="window.location='index1.php?page=category'">Cancel</button>
	</form>
</br>
</div>