<?php
date_default_timezone_set('Asia/Kolkata');
include('database.inc.php');

$sql="delete from message;";

if($con->multi_query($sql) === True)
{
    echo"<script>
    alert('Chat Deleted Successfully');
    window.location.href='index1.php';
            </script>";
}
else{
    echo "Error deleting record".$con->error;
}
$con->close();
?>