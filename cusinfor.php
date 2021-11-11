<?php
  require('requirelogin.php');
  $email=$_SESSION['email'];
  include_once("connection.php");
  $result = pg_query($conn, "SELECT email, firstname, lastname, tel, address FROM public.customer WHERE email='$email'");
  while($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)) {
?>

<div class="container">
  <h2>My Information</a></h2>
  <form name="form1" method="post" action="" class="form-horizontal" role="form">
    <div class="form-group">
      <label>Email:</label>
      <input type="email" class="form-control" readonly value="<?php echo $row['email']; ?>">
    </div>
    <div class="form-group">
      <label>First name:</label>
      <input type="text"  value="<?php echo $row['firstname']; ?>" class="form-control">
    </div>
    <div class="form-group">
      <label>Last name:</label>
      <input type="text"  value="<?php echo $row['lastname']; ?>" class="form-control">
    </div>
    <div class="form-group">
      <label>Phone number:</label>
      <input type="number" value="<?php echo $row['tel']; ?>" class="form-control">
    </div>
    <div class="form-group">
      <label>Address:</label>
      <input type="text"  class="form-control" value="<?php echo $row['address']; ?>">
    </div>
    <button type="button" class="btn btn-info"  onclick="window.location='index1.php?page=update_cusinfor'">Update</button>
    <button type="button" class="btn btn-primary" onclick="window.location='index1.php?page=passinfor'">Change Password</button>
    <button type="button" class="btn btn-danger" onclick="window.location='index1.php?'">Cancel</button>
  </form>
</div>
<?php
    }
?>