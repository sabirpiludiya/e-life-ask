<?php
session_start();
include "connection.php";
if($_GET['dealer_id'])
{
	$insert_follow = mysql_query("insert into tbl_follow_block values ('','$_GET[dealer_id]','$_SESSION[user_id]','1','0')");
}

if($_GET['follow_id'])
{
	$dealer_follow = mysql_query("delete from tbl_follow_block where follow_id = '$_GET[follow_id]'");
}

?>