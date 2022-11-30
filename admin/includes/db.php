<?php ob_start(); ?>
<?php  

//database_connection_2 using array function for more secured db.
$db['db_host'] = "localhost";
$db['db_user'] = "root"; 
$db['db_pass'] = "";
$db['db_name'] = "db_user_system";



//database_connection_2 using array function for more secured db.
// $db['db_host'] = "localhost";
// $db['db_user'] = "cryptowi"; 
// $db['db_pass'] = "m@d6LJ6f2;lB6W";
// $db['db_name'] = "cryptowi_db_user_system";

//using uppercase function for each value of the array
foreach ($db as $key => $value) {define(strtoupper($key),$value);}
$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
 
 ?>



<?php
    /*  ---------------------------------------------------------------------------
     * 	@package	: user_management
     *	@author 	: Urnet
     *  @email      : emailurworld.net@gmail.com
     *	@version	: 
     *	@link		: http://www.urnet.com.ng
     *	@copyright	: Copyright (c) 2022, http://www.urnet.com.ng
     *	--------------------------------------------------------------------------- */
?>