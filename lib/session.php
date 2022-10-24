<?php
//helper class for session, may get deleted later
class Session{


    public static function destroy(){
        session_destroy();
    }
    public static function set($key, $value){
        $_SESSION[$key] = $value;
    }
    public static function get($key){
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }else{
            return false;
        }
    }


}
function init(): void
{
    if (!isset($_SESSION['menu_items'])){
        $_SESSION['menu_items'] = getDataFromDB::getCategories();
    }
}
init();
?>