 <?php
  require('requirelogin.php');
  include_once("connection.php");
  $email=$_SESSION['email'];
  $result = pg_query($conn, "SELECT email, password FROM public.customer WHERE email='$email'");
  $row = pg_fetch_array($result, NULL, PGSQL_ASSOC);
  $pass = $row['password'];
  if(isset($_POST['btnSubmit']))
  {
      $pass1 = $_POST["txtCurrent"];
      $pass2 = $_POST["txtPass"];
      $pass3 = $_POST["txtConfirm"];
      $err = "";
      if($pass1=="")
      {
          $err .="<li>Enter current password, please!</li>"; 
      }
      if($pass2=="")
      {
          $err .="<li>Enter new password, please!</li>"; 
      }
      if($pass3=="")
      {
          $err .="<li>Enter password confirmation, please!</li>"; 
      }
      if(md5($pass1)!=$pass)
      {
          $err .="<li>Current password is incorrect!</li>";
      }
      if(strlen($pass2)<6)
      {
          $err .="<li>Password must be greater than 5 chars!</li>";
      }
      if($pass2!=$pass3)
      {
          $err .="<li>Password confirmation is incorrect!</li>";
      }
      if($err!="")
      {
          echo "<ul>$err</ul>";
      }
      else
      {
              $pwd = md5($pass3);
              pg_query($conn, "UPDATE public.customer SET password = '$pwd' WHERE email = '$email'");
              echo "<ul>Changed password successfully</ul>";
      }
  }      
?>

<div class="container">
  <h2>My Information</a></h2>
  <form name="form1" method="post" action=""  class="form-horizontal" role="form">
    <div class="form-group">
      <label>Current password:</label>
      <input type="password" name="txtCurrent" placeholder="Enter current password" id="txtCurrent" class="form-control">
    </div>
    <div class="form-group">
      <label>New password:</label>
      <input type="password" name="txtPass" placeholder="Enter new password" id="txtPass" class="form-control">
    </div>
    <div class="form-group">
      <label>Confirm password:</label>
      <input type="password" name="txtConfirm" placeholder="Enter password confirmation" id="txtConfirm" class="form-control">
    </div>
    <button type="submit" class="btn btn-info" name="btnSubmit">Update</button>
    <button type="button" class="btn btn-danger" onclick="window.location='index1.php?page=cusinfor'">Cancel</button>
  </form>
</div>