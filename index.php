<?php 
   class Session{

         private static $_sessionstarted = false;
           
         public static function start(){

              if (self::$_sessionstarted == false) {
                 session_start();
                 self::$_sessionstarted = true;
              }

         }

         public static function set($key , $value){
              
              $_SESSION[$key] = $value;
         }

         public static function get($key , $secondkey = false){

                 if ($secondkey == true) {

                   if (isset($_SESSION[$key][$secondkey])) 
                       return $_SESSION[$key][$secondkey];
                 }else{
                    if (isset($_SESSION[$key]))
                       return $_SESSION[$key];
                 }

                 return false;

         }

         public static function destroy(){
                
                if (self::$_sessionstarted == true) {
                  
                  session_unset();
                    session_destroy();
                }
         }


   }
    
    require_once 'app/init.php'; 



    $app = new App;
    $c = new Controller;

   

?>