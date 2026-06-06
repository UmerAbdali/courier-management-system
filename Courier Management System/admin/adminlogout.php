<?php 


session_start();

session_unset();
session_destroy();

echo"<script>
alert('you have been Logout')
window.location.href='adminlogin.php'
</script>";


?>