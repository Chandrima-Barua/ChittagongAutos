<?php

$connection = new mysqli('127.0.0.1', 'root','', 'chittagongautos');

//echo $connection->connect_errno;
if ($connection->connect_errno != 0){
    echo ("Woops! Internal Error..");
}
//else{
//    echo ("Welcome!");
//}



?>