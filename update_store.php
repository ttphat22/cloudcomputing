<?php
	require('requirelogin.php');
	include_once("connection.php");
		if(isset($_GET["id"]))
		{
			$id = $_GET["id"];
			$result = pg_query($conn, "SELECT * FROM public.store WHERE storeid='$id'");
			$row = pg_fetch_array($result, NULL, PGSQL_ASSOC);
			$store_id = $row['storeid'];
			$store_name = $row['storename'];
			$store_des = $row['storedes'];
?>

<div class="container">
	<h2>UPDATE STORE</h2>
	<form id="form1" name="form1" method="POST" class="form-horizontal" role="form">
		<div class="form-group">
		<label>Store ID:</label>
		<input type="text" class="form-control" id="txtID" name="txtID" readonly value='<?php echo $store_id ;?>'>
		</div>
		<div class="form-group">
		<label>Store Name:</label>
		<input type="text" class="form-control" id="txtName" name="txtName" value='<?php echo $store_name;?>'>
		</div>
		<div class="form-group">
		<label>Description:</label>
		<input type="text" class="form-control" id="txtDes" name="txtDes" value='<?php echo $store_des;?>'>
		</div>
		<button type="submit" class="btn btn-primary" name="btnUpdate" value="Update">Update</button>
		<button type="button" class="btn btn-danger" name="btnCancel" onclick="window.location='index1.php?page=store'">Cancel</button>
		
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
			$err.="<li>Enter store name, please</li>";
		}
		if($err!="")
		{
			echo "<ul>$err</ul>";
		}
		else
		{
			$sq="SELECT * FROM public.store WHERE storeid != '$id' and storename='$name'";
			$result = pg_query($conn,$sq);
			if(pg_num_rows($result)==0)
			{
				pg_query($conn, "UPDATE public.store SET storename = '$name', storedes='$description' WHERE storeid='$id'");
				echo '<meta http-equiv="refresh" content="0;URL=index1.php?page=store"/>';
			}
		}
	}
?>
<?php
}
else
{
	echo '<meta http-equiv="refresh" content="0;URL=index1.php?page=store"/>';
}

?>