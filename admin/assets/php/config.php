<?php

// class Database{
    
//     const USERNAME = '';
//     const PASSWORD = '';
    
//     private $dsn = "mysql:host=localhost;dbname=db_user_system";
//     private $dbuser = "root";
//     private $dbpass = "";
    
//     public $conn;
    
//     public function __construct(){
//         try{
//             $this->conn = new PDO($this->dsn,$this->dbuser,$this->dbpass);
//         }catch (PDOException $e){
//             echo 'Error : '.$e->getMessage();
//         }
        
//         return $this->conn;
//     }
    
//     //Check Input
//     public function test_input($data){
//         $data = trim($data);
//         $data = stripslashes($data);
//         $data = htmlspecialchars($data);
//         return $data;
//     }
    
//     //Error Success Message Alert
//     public function showMessage($type, $message){
//         return '<div class="alert alert-'.$type.' alert-dismissible">
//                 <button type="button" class="close" data-dismiss="alert">&times;</button>
//                 <strong class="text-center">'.$message.'</strong>
//                 </div>';
//     }

    //Display time in ago
/*
    public function timeInAgo($timestamp){
        data_default_timezone_set('Asia/Kolkata');

        $timestamp = strtotime($timestamp) ? strtotime($timestamp) : $timestamp;

        $time = time() - $timestamp;

        switch($time){
            //Seconds
            case $time <= 60:
                return 'Just Now!';
            //Minutes
            case $time >= 60 && $time < 3600:
                return (round($time/60) == 1)? 'a minute ago' : round($time/60).'
                    minutes ago';
            //Hours
            case $time >= 3600 && $time < 86400:
                return(round($time/3600) == 1)? 'an hour ago' : round($time/3600).
                    'hours ago';
            //Days
            case $time >= 86400 && $time < 604800:
                return (round($time/86400) == 1)? 'a day ago' : round($time/86400).'
                    days ago';
            //Weeks
            case $time >= 604800 && $time < 2600640:
                return (round($time/604800) == 1)? 'a week ago' : round($time/604800).'
                    a weeks ago';
            //Months
            case $time >= 26006400 && $time < 31207680:
                return (round($time / 604800) == 1) ? 'a month ago' : round($time / 2600640) . '
                    months ago';
            //Months
            case $time >= 31207680:
                return (round($time/31207680) == 1) ? 'a year ago' : round($time / 31207680) . '
                    years ago'; 
        }
    }*/

// }
?>



<?php ob_start();  

//database_connection_2 using array function for more secured db.
$db['db_host'] = "localhost";
$db['db_user'] = "root"; 
$db['db_pass'] = "";
$db['db_name'] = "db_user_system";

//using uppercase function for each value of the array
foreach ($db as $key => $value) {define(strtoupper($key),$value);}
$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
 
 ?>
