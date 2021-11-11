<?php
  require('requirelogin.php');
	include_once("connection.php");
	if(isset($_POST["btnUpdate"]))	
	{
		$email = $_POST["txtEmail"];
		$first = $_POST["txtFirstName"];
    $last = $_POST["txtLastName"];
    $tel = $_POST["txtTel"];
    $address = $_POST["txtAddress"];
		$err="";
    // echo '<script>alert("'.$first.$last.'")</script>';
    if($first=="")
		{
			$err .="<ul>Please enter first name</ul>";
    }
    if($last=="")
		{
			$err .="<ul>Please enter last name</ul>";
    }
    if(!is_numeric($tel))
    {
      $err .="<ul>Phone number only enter numbers!</ul>";
    }
    if(strlen($tel)!=10)
    {
      $err .="<li>It's not a phone number!</li>";
    }
    if($address=="")
    {
      $err .="<li>Do not empty address!</li>";
    }
		if($err!="")
    {
      echo $err;
    }
		else
		{
      include_once("connection.php");
			$sq="SELECT email, firstname, lastname, tel, `address` FROM public.customer WHERE email = '$email'";
			$result = pg_query($conn,$sq);
			if(pg_num_rows($result)==1)
			{
				pg_query($conn, "UPDATE public.customer SET firstname = '$first', lastname = '$last', 
                tel = '$tel', `address` = '$address' WHERE email='$email'");
				echo '<meta http-equiv="refresh" content="0;URL=index1.php?page=cusinfor"/>';
      }
		}
  }
		if($_GET["page"]=="update_cusinfor")
		{
			$email = $_SESSION["email"];
			$result = pg_query($conn, "SELECT email, firstname, lastname, tel, `address` FROM public.customer WHERE email='$email'");
			$row = pg_fetch_array($result, NULL, PGSQL_ASSOC);
			$first = $row['firstname'];
			$last = $row['lastname'];
      $tel = $row['tel'];
      $address = $row['address'];
?>
<div class="container">
  <h2>My Information</a></h2>
  <form name="form1" method="post" class="form-horizontal" role="form">
    <div class="form-group">
      <label>Email:</label>
      <input type="email" name="txtEmail" id="txtEmail" readonly class="form-control" value="<?php echo $email; ?>">
    </div>
    <div class="form-group">
      <label>First name:</label>
      <input type="text" name="txtFirstName" id="txtFirstName" placeholder="Enter first name" class="form-control" value="<?php echo $first; ?>">
    </div>
    <div class="form-group">
      <label>Last name:</label>
      <input type="text" name="txtLastName" id="txtLastName" placeholder="Enter last name" class="form-control" value="<?php echo $last; ?>">
    </div>
    <div class="form-group">
      <label>Phone number:</label>
      <input type="text" name="txtTel" id="txtTel" placeholder="Enter phone number" class="form-control" value="<?php echo $tel; ?>">
    </div>
    <div class="form-group">
      <label>Address:</label>
      <input type="text" name="txtAddress" id="txtAddress" placeholder="Enter address" class="form-control" value="<?php echo $address; ?>">
    </div>
    <button type="submit" class="btn btn-primary" name="btnUpdate" value="Update">Update</button>
    <button type="button" class="btn btn-danger" name="btnCancel" onclick="window.location='index1.php?page=cusinfor'">Cancel</button>
    <div class="container signin">
    </br>
    </div>
  </form>
</div>
<?php 
}
?>
