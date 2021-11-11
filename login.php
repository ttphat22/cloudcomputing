<?php
if(isset($_POST['btnLogin']))
{
	$email = $_POST['txtEmail'];
	$pa = $_POST['txtPass'];
	if($email == "")
	{
		echo "<li>Please enter email!</li><br/>";
	}
	if($pa == "")
	{
		echo "<li>Please enter password!</li><br/>";
	}	
	else
	{
		include_once("connection.php");
		$pass = md5($pa);
		$res = pg_query($conn, "SELECT email, password, state, firstname FROM public.customer WHERE email='$email' AND password='$pass'")
		or die(pg_result_error($conn));
		$row = pg_fetch_array($res, NULL, PGSQL_ASSOC);
		if(pg_num_rows($res)==1)
			{	
				$_SESSION["firstname"] = $row["firstname"];
				$_SESSION["email"] = $email;
				$_SESSION["admin"] = $row["state"];
				echo '<meta http-equiv="refresh" content="0;URL=index1.php"/>'; 
			}
		else
		{
			echo "<li>Email or password is incorrect!</li>";
		}
	}
}
?>
<div class="container">
	<h2>Welcome to TP Mobile</h2>
	<form id="login" name="login" method="POST">
	<div class="form-group">
		<label for="txtEmail">Email:</label>
		<input type="email" name="txtEmail" id="txtEmail" class="form-control" placeholder="Enter email">
	</div>
	<div class="form-group">
		<label for="txtPass">Password:</label>
		<input type="password" name="txtPass" id="txtPass" class="form-control" placeholder="Enter password">
	</div>
	<button type="submit" name="btnLogin" class="btn btn-primary" id="btnLogin" value="Login">Login</button>
	<button type="button" name="btnCancel" class="btn btn-danger" id="btnLogin" onclick="window.location='index1.php?'">Close</button>
	<div class="container signin">
    <br><p>Do not have an account? <a href="?page=register">Sign up</a>.</p>
    </div>
	</form>
</div>	