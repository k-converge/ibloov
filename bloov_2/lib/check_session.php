<?php

//all we simply want to do here is to check if the session alive or the user is logged in
  session_start();
  
  if(isset($_SESSION["id"])){
    $id=$_SESSION["id"];
  }else{
    //return false;
    header("location: ../sign-in");
  }

?>
