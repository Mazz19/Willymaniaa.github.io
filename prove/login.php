<?php
if(!empty($_POST) &&
strlen(trim($_POST['username']))!=0 &&
strlen(trim($_POST['password']))!=0) {
session_start();
include("php/dbconf.php");
$conn = mysql_connect(DBHOST, DBUSER, DBPASS);
mysql_select_db(DBNAME, $conn);
$query = "SELECT * FROM users
WHERE username = '".$_POST['username']."'
AND password=MD5('".$_POST['password']."')";
$result = mysql_query($query, $conn);
if(mysql_num_rows($result) != 1) {
//l'utente è nuovo
$query = "INSERT INTO users(username,password)
VALUES('".$_POST['username']."',
MD5('".$_POST['password']."'))";
mysql_query($query, $conn);
$_SESSION['xcalendar_user'] =
mysql_insert_id($conn);
} else {
//l'utente esiste già
$user = mysql_fetch_assoc($result);
$_SESSION['xcalendar_user'] = $user['id'];
}
header("Location:index.php");
exit();
}
?>