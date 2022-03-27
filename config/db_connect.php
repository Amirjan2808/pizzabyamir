<?php 
//connection db
$conn = mysqli_connect('localhost', "root", "", "amirbek_pizza");

// check connect
if(!$conn) {
    echo "Connection error: ". mysqli_connect_error();
}