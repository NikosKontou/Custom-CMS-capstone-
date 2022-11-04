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

    public static function getCurrentTimestamp(): string
    {
        return date('Y-m-d H:i:s',time());

    }
    public static function setSiteColors(){
        if (!isset($_SESSION['site_color'])){
            $_SESSION['site_items'] = getDataFromDB::getVisibleSiteDetails();
            foreach ($_SESSION['site_items'] as $item){
                if ($item['key']=='site_color'){
                    $_SESSION['site_color']=$item['value'];
                }elseif ($item['key']=='accent_color'){
                    $_SESSION['accent_color']=$item['value'];
                }
            }
        }
    }
}
//get important site data at the start of a session
function init(): void
{
    if (!isset($_SESSION['menu_items'])){
        $_SESSION['menu_items'] = getDataFromDB::getCategories();
    }
    if(!isset($_SESSION['site_items'])){
        $_SESSION['site_items'] = getDataFromDB::getVisibleSiteDetails();

    }
}


init();
?>