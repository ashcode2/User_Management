<?php ob_start();  

//database_connection_2 using array function for more secured db.
$db['db_host'] = "localhost";
$db['db_user'] = "root"; 
$db['db_pass'] = "";
$db['db_name'] = "db_user_system";

//using uppercase function for each value of the array
foreach ($db as $key => $value) {define(strtoupper($key),$value);}
$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
 




class Database{

    //  Check Input
        public function test_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        
        //Error Success Message Alert
        public function showMessage($type, $message){
            return '<div class="alert alert-'.$type.' alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong class="text-center">'.$message.'</strong>
                    </div>';
        }
    
    
    }
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