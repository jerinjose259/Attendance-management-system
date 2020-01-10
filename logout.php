<?php
session_start();
 unset($_session["sname"]);
 session_destroy();
 echo"<script> window.location.href = 'index.php' ; </script>";
 exit();
 ?>