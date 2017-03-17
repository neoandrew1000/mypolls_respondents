<?php

class Survey{

	private $_errors = array(),
			$_db;

	public function __construct() {
		$this->_db = DB::getInstance();
	}

	//функция создания опроса
	public function create_survey($fields) {
		if (!$this->_db->insert('survs', $fields)) {
			throw new Exception("There was a problem creating poll!");
		}
	}

	//функция извлечения списка активных опросов
	public function get_survey_list() {
			
			if($this->_db->get_surveys("survs", array("active", "=", "true"))){

				return $this->_db->results();			
			}else{
				throw new Exception("There was a problem creating poll!");
			}
	}

	//функция извлечения списка опросов созданных 1 пользователем
	public function get_survey_user_list($usrid) {
			
			if($this->_db->get_surveys("survs", array("usrid", "=", $usrid))){

				return $this->_db->results();			
			}else{
				throw new Exception("There was a problem creating poll!");
			}
	}


	//функция извлечения опроса
	public function get_survey($pollid) {
		
		if ($this->_db->get('survs', array("survid", "=", $pollid))) {
			
			return $this->_db->results();
		}else{
			throw new Exception("There was a problem getting poll!");
		}
	}

	//функция добавления ответа
	public function add_answer($poll) {
		
		if ($this->_db->get('polls', array("pollid", "=", $pollid))) {
			
			return $this->_db->results();
		}else{
			throw new Exception("There was a problem getting poll!");
		}
	}
			  
}