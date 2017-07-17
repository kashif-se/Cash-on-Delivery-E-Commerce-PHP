<?php
require_once('_con.php');
function emailExist($email){
    global $conn;
    $sql="SELECT * FROM `logins` WHERE `login_name`='$email';";
    $r=$conn->query($sql);
    if($r->num_rows>0){
        return true;
    }
    return false;
}

?>