<?php
	require('requirelogin.php');
	include_once("connection.php");
		if(isset($_GET["id"]))
		{
			$id = $_GET["id"];
			$result = pg_query($conn, "SELECT * FROM public.category WHERE cat_id='$id'");
			$row = pg_fetch_array($result, NULL, PGSQL_ASSOC);
			$cat_id = $row['cat_id'];
			$cat_name = $row['cat_name'];
			$cat_des = $row['cat_des'];
?>

<div class="container">
	<h2>UPDATE CATEGORY</h2>
	<form id="form1" name="form1" method="POST" class="form-horizontal" role="form">
		<div class="form-group">
		<label>Category ID:</label>
		<input type="text" class="form-control" id="txtID" name="txtID" readonly value='<?php echo $cat_id ;?>'>
		</div>
		<div class="form-group">
		<label>Category Name:</label>
		<input type="text" class="form-control" id="txtName" name="txtName" value='<?php echo $cat_name;?>'>
		</div>
		<div class="form-group">
		<label>Description:</label>
		<input type="text" class="form-control" id="txtDes" name="txtDes" value='<?php echo $cat_des;?>'>
		</div>
		<button type="submit" class="btn btn-primary" name="btnUpdate" value="Update">Update</button>
		<button type="button" class="btn btn-danger" name="btnCancel" onclick="window.location='index1.php?page=category'">Cancel</button>
		
	</form>
	</br>
	</div>
	<?php
	include_once("connection.php");
	if(isset($_POST["btnUpdate"]))	
	{
		$id = $_POST["txtID"];
		$name = $_POST["txtName"];
		$description = $_POST["txtDes"];
		$err="";
		if($name=="")
		{
			$err.="<li>Enter category name, please</li>";
		}
		if($err!="")
		{
			echo "<ul>$err</ul>";
		}
		else
		{
			$sq="SELECT * FROM category WHERE cat_id != '$id' and cat_name='$name'";
			$result = pg_query($conn,$sq);
			if(pg_num_rows($result)==0)
			{
				pg_query($conn, "UPDATE public.category SET cat_name = '$name', cat_des='$description' WHERE cat_id='$id'");
				echo '<meta http-equiv="refresh" content="0;URL=index1.php?page=category"/>';
			}
		}
	}
?>
<?php
}
else
{
	echo '<meta http-equiv="refresh" content="0;URL=index1.php?page=category"/>';
}

?>