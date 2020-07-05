<?php
$conn = mysqli_connect('localhost', 'root', '', 'chatlog');


$select = "SELECT * FROM logs ORDER BY id DESC";
$rs = mysqli_query($conn, $select);
$count = mysqli_num_rows($rs);
if ($count > 0){
    while ($row = mysqli_fetch_array($rs)){
        echo $row['uname']." : ".$row['msg']."<br/>";
    }
}