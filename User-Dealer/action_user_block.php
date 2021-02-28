<?php
session_start();
include "connection.php";
if($_GET['user_id'])
{
	$block = mysql_query("update tbl_follow_block set block_status = 1 where user_id='$_GET[user_id]' and dealer_id='$_SESSION[dealer_id]'");
}

if($_GET['unblock_id'])
{
	$unblock = mysql_query("update tbl_follow_block set block_status = 0 where user_id='$_GET[unblock_id]' and dealer_id='$_SESSION[dealer_id]'");
}

?>