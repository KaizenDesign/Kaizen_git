<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_Local = "127.0.0.1";
$database_Local = "test";
$username_Local = "root@localhost";
$password_Local = "";
$Local = mysql_pconnect($hostname_Local, $username_Local, $password_Local) or trigger_error(mysql_error(),E_USER_ERROR); 
?>