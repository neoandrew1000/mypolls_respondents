<?php 

	require_once ('core/init.php');

	$user = new User();
	if ($user->isLoggedIn()) {

		echo "Вы уже залогинены";
  	}

    if (Input::exists()){
	
 	    if (Token::check(Input::get('token'))){
 	
		 	$validate=new Validate();
		 	$validation = $validate->check($_POST, array(
					"usrnam" => array(
						"required" => true,
						"min" => 4,
						"max" => 20,
						"unique" => "usrs",
						"username" => "username"
					),
					"password" => array(
						"required" => true,
						"min" => 8,
						"password"=>"password"
					),
					"password_again" => array(
						"required" => true,
						"matches" => "password"
					),
					"frname" => array(
						"required" => true,
						"min" => 2,
						"max" => 50,
						"name"=>"name"
					),
					"lsname" => array(
						"required" => true,
						"min" => 2,
						"max" => 50,
						"name"=>"name"
					),
					"eml" => array(
						"required" => true,
						"min" => 2,
						"max" => 100,
					    "unique" => "usrs",
					    "email" =>"email"
					),		
					"phne" => array(
						"required" => true,
						"phone"=> "phone",
					    "unique" => "usrs"
					)
				));

	if ($validation->passed()) {
			$user = new user();
			
			try {
				
				$user->create(array(
					"usrnam" => Input::get("usrnam"),
					"psswd" => password_hash(Input::get("password"), PASSWORD_BCRYPT),
					"frst_nm" => Input::get("frname"),
					"lst_nm" => Input::get("lsname"),
					"eml" => Input::get("eml"),
					"phne" => Input::get("phne"),
					"joined" => date("Y-m-d H:i:s"),
					// "group_t" => 1
				));

				echo(json_encode('true'));

			} catch(Exception $e) {
				die($e->getMessage());
			}

	} else {
			
			$mass = $validation->errors();
			for($i=0; $i<count($mass); $i++) {
				$mass[$i] = $mass[$i]."<br>";
			}
			echo(json_encode($mass));
		}
    }	
}
?>