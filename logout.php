<?php
if(isset($_SESSION['email'])){
    session_destroy();
    echo '<meta http-equiv="refresh" content="0;URL=index1.php"/>'; 
}
?>