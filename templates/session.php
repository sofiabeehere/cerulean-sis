<!-- Cite: https://www.tutorialspoint.com/php/php_mysql_login.htm -->
<?php
   include('db_login_connect.php');
 
   session_start();
   if (isset($_SESSION) && isset($_SESSION['login_user'])) {

   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($cntn,"select username from (SELECT username, user_password FROM students UNION ALL SELECT username, user_password FROM teachers) as t1 where t1.username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   $login_session = $row['username'];

}   
   if(!isset($_SESSION['login_user']) && isset($_SESSION)){
     session_destroy();
   }

?>