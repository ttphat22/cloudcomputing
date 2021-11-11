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
			$err.="<li>Enter Store ID, please</li>";
		}
		if($name=="")
		{
			$err.="<li>Enter Store Name, please</li>";
		}
		if($err!="")
		{
			echo "<ul>$err</ul>";
		}
		else
		{
		$sq="SELECT * FROM store WHERE storeid='$id' or storename='$name'";
		$result = pg_query($conn,$sq);
			if(pg_num_rows($result)==0)
			{
				pg_query($conn, "INSERT INTO public.store (storeid, storename, storedes) VALUES ('$id', '$name', '$des')");
				echo '<meta http-equiv="refresh" content="0;URL=index1.php?page=store"/>';
			}
			else
			{
				echo "<li>Duplicate store ID</li>";
			}
	    }
	}

?>

<div class="container">
	<h2>ADD Store</h2>
	<form method="POST" class="form-horizontal" role="form">
	<div class="form-group">
		<label>Store ID:</label>
		<input type="text" class="form-control" id="txtID" name="txtID" placeholder="Enter store ID" value='<?php echo isset($_POST["txtID"])?($_POST["txtID"]):"";?>'>
	</div>
	<div class="form-group">
		<label>Store Name:</label>
		<input type="text" class="form-control" id="txtName" name="txtName" placeholder="Enter store Name" value='<?php echo isset($_POST["txtName"])?($_POST["txtName"]):"";?>'>
	</div>
	<div class="form-group">
		<label>Description:</label>
		<input type="text" class="form-control" id="txtDes" name="txtDes" placeholder="Enter description" value='<?php echo isset($_POST["txtDes"])?($_POST["txtDes"]):"";?>'>
	</div>
		<button type="submit" class="btn btn-primary" name="btnAdd" value="Add new">Submit</button>
		<button type="button" class="btn btn-danger" name="btnCancel" value="Ignore" onclick="window.location='index1.php?page=store'">Cancel</button>
	</form>
</br>
</div>