<?php

class user {
	
	private $_db,
			$_data,
			$_sessionName,
			$_cookieName,
			$_isLoggedIn;
	
	public function __construct($user = null) {
		$this->_db = DB::getInstance();
		
		$this->_sessionName = Config::get("session/session_name");
		$this->_cookieName = Config::get("remember/cookie_name");
		
		if (!$user) {
			if (Session::exists($this->_sessionName)) {
				$user = Session::get($this->_sessionName);

				if($this->find($user)) {
					$this->_isLoggedIn = true;
				} else {
					// Logged out
				}
			}
		} else {
			$this->find($user);
		}
	}

	//функция создания нового пользователя
	public function create($fields) {
		if (!$this->_db->insert('usrs', $fields)) {
			throw new Exception("There was a problem creating the account!");
		}
	}

	//функция изменения пароля
	public function update($fields = array(), $id = null) {
		if ((!$id && ($this->isLoggedIn() || $this->data()->usrid))) {
			$id = $this->data()->usrid;
		}
	
		if (!$this->_db->update('usrs', $id, $fields)) {
			throw new Exception("There was a problem updating the account!");
		}
	}

	//функция поиска юзера
	public function find($user = null) {
		if ($user) {
			$field = (is_numeric($user)) ? "usrid" : "usrnam";
			$data = $this->_db->get("usrs", array($field, "=", $user));
			
			if ($data->count()) {
				$this->_data = $data->first();
				return true;
			}
		}
		return false;
	}

	//функция логина
	public function login($username = null, $password = null, $remember = false) {

		if (!$username && !$password && $this->exists()) {
			Session::put($this->_sessionName, $this->data()->usrid);
		} else {
			$user = $this->find($username);
	
			if ($user) {
				
				if (password_verify($password, $this->data()->psswd)) {
					Session::put($this->_sessionName, $this->data()->usrid);

					//функция "запомнить меня"
					if ($remember) {
					    $hash = Hash::unique();
						$hashCheck = $this->_db->get("user_sessions", array("usrid", "=", $this->data()->usrid));
						
						if (!$hashCheck->count()) {
							$cookie_is_set = $this->_db->insert("user_sessions", array(
								"usrid"	=> $this->data()->usrid,
								"hash"		=> $hash
							));
						} else {
							$hash = $hashCheck->first()->hash;
						}
						
						Cookie::put($this->_cookieName, $hash, Config::get("remember/cookie_expiry"));
					}
					return true;
				}
			}
		}	
		return false;
	}

	//функция проверки прав доступа
	public function hasPermission($key) {
		$group = $this->_db->get("groups", array("id", "=", $this->data()->group_t));
		
		if ($group->count()) {
			$permissions=json_decode($group->first()->permissions, true);
			
			if ($permissions[$key] == true) {
				return true;
			}
		}
		return false;
	}
	
	public function exists() {
		return (!EMPTY($this->data())) ? true : false;
	}

	//функция выхода(логаута) пользователя
	public function logout() {
		$this->_db->delete("users_session", array("usrid", "=", $this->data()->usrid));
		
		Session::delete($this->_sessionName);
		Cookie::delete($this->_cookieName);
	}
	
	public function data() {
		return $this->_data;
	}
	//взять id пользователя
	public function getid() {
		return $this->data()->usrid;
	}

	//функция проверки залогинен ли пользователь
	public function isLoggedIn() {
		return $this->_isLoggedIn;
	}
}

