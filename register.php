<?php
  if(isset($_POST['btnSubmit']))
  {
    $email = $_POST['txtEmail'];
    $pass1 = $_POST['txtPass1'];
    $pass2 = $_POST['txtPass2'];
    $first = $_POST['txtFirst'];
    $last = $_POST['txtLast'];
    $tel = $_POST['txtTel'];
    $address = $_POST['txtAddress'];
    $err = "";
    if($email=="")
    {
      $err .="<li>Enter email, please!</li>"; 
    }
    if($pass1=="")
    {
      $err .="<li>Enter password, please!</li>"; 
    }
    if($pass2=="")
    {
      $err .="<li>Do not empty password confirmation!</li>"; 
    }
    if($first=="")
    {
      $err .="<li>Please enter first name!</li>"; 
    }
    if($last=="")
    {
      $err .="<li>Please enter last name!</li>"; 
    }
    if($address=="")
    {
      $err .="<li>Do not empty address!</li>"; 
    }
    if(strlen($pass1)<6)
    {
      $err .="<li>Password must be greater than 5 chars!</li>";
    }
    if($pass1!=$pass2)
    {
      $err .="<li>Password confirmation is incorrect!</li>";
    }
    if(!is_numeric($tel))
    {
      $err .="<li>Phone number only enter numbers!</li>";
    }
    if(strlen($tel)!=10)
    {
      $err .="<li>It's not a phone number!</li>";
    }
    if($err!="")
    {
      echo $err;
    }
    else
    {
      include_once("connection.php");
      $pass = md5($pass1);
      $sq = "SELECT * FROM public.customer WHERE email='$email' OR tel='$tel'";
      $res = pg_query($conn,$sq);
      if(pg_num_rows($res)==0)
      {
        pg_query($conn, "INSERT INTO public.customer (email, password, firstname, lastname, tel,
        address, state)
        VALUES ('$email', '$pass', '$first', '$last', '$tel', '$address', 0)") or die(pg_result_error($conn));
        echo "You have registered successfully";
      }
      else
      {
        echo "<li>Email or number phone have already existed!</li>";
      }
    }
  }
?>


<div class="container">
  <h2>Welcom to <a>TP Mobile</a></h2>
  <form name="form1" method="post" action="" class="form-horizontal" role="form">
    <div class="form-group">
      <label>Email:</label>
      <input type="email" name="txtEmail" class="form-control" id="txtEmail" placeholder="Enter email" value="<?php if (isset($email)) echo $email; ?>">
    </div>
    <div class="form-group">
      <label>Password:</label>
      <input type="password" name="txtPass1" class="form-control" id="" placeholder="Enter password">
    </div>
    <div class="form-group">
      <label>Confirm password:</label>
      <input type="password" name="txtPass2" class="form-control" id="" placeholder="Enter password">
    </div>
    <div class="form-group">
      <label>First name:</label>
      <input type="text" name="txtFirst" id="txtFirst" value="<?php if(isset($first)) echo $first; ?>" class="form-control" id="" placeholder="Enter first name">
    </div>
    <div class="form-group">
      <label>Last name:</label>
      <input type="text" name="txtLast" id="txtLast" value="<?php if(isset($last)) echo $last; ?>" class="form-control" id="" placeholder="Enter last name">
    </div>
    <div class="form-group">
      <label>Phone number:</label>
      <input type="text" name="txtTel" value="<?php if(isset($tel)) echo $tel; ?>" class="form-control" id="" placeholder="Enter phone number">
    </div>
    <div class="form-group">
      <label>Address:</label>
      <input type="text" name="txtAddress" class="form-control" id="" placeholder="Enter address">
    </div>
    <button type="submit" class="btn btn-primary" name="btnSubmit" value="Register">Submit</button>
    <button type="button" class="btn btn-danger" name="btnCancel" onclick="window.location='index1.php?'">Cancel</button>
    <div class="container signin">
    <br><p>Already have an account? <a href="?page=login">Sign in</a>.</p>
    </div>
    </br>
  </form>
</div>