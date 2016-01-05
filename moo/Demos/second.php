<?php
session_start();
if(isset($_SESSION['id'])){
    $id=$_SESSION['id'];
    echo"<iframe src='https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=$id'></iframe>";
}
else{
  header('Location: upload.html');
}
?>