<?php 
session_start();

$GLOBALS['config']=array(
    'pgsql' => array(
    'host' =>'127.0.0.1',
    'port'=>'5432',
    'user'  =>'postgres',
    'password'  => '',
    'db'=> 'polls'
    ),
    'remember' => array(
        'cookie_name' => 'hash',
        'cookie_expiry' => 604800
    ),
    'session' => array(
        'session_name'=>'user',
        'token_name'=>'token'
    )
);    

//авторег классов
spl_autoload_register(function($class) {
    require_once ('classes/' . $class . '.php');
});

require_once ('functions/sanitize.php');

//генерация csrf токена и points если нет сессии
if (!Session::exists('token')){
        
    Token::generate(); 

    $points = [
            
        "list" => bin2hex(random_bytes(22)), 
        "survadd" => bin2hex(random_bytes(22)), 
        "userlist"=> bin2hex(random_bytes(22)), 
        "survedit"=> bin2hex(random_bytes(22)), 
        "survey"=> bin2hex(random_bytes(22)), 
        "answer" => bin2hex(random_bytes(22))
              ];
        foreach ($points as $key => $value) {
            Session::put($key, $value);
        }
}

if (Cookie::exists(Config::get("remember/cookie_name")) && !Session::exists(Config::get("session/session_name"))) {
    $hash = Cookie::get(Config::get("remember/cookie_name"));
    $hashCheck = DB::getInstance()->get("users_session", "*", array("hash", "=", $hash));
    
    if ($hashCheck->count()) {
        $user = new User($hashCheck->first()->usrid);
        $user->login();
    }
}