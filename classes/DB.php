
<?php 
//класс работы с бд
class DB{
    
    private static $_instance = null;
    private $_pdo,
         $_query,
         $_error = false,
         $_results,
         $_count = 0;

    private function __construct()
    {

      try {
         $this->_pdo = new PDO('pgsql:host=' . Config::get('pgsql/host') . ';port=' . Config::get('pgsql/port')
                        .';dbname=' . Config::get('pgsql/db')
                        , Config::get('pgsql/user')
                        , Config::get('pgsql/password'));

      } catch (PDOException $e) {
         die($e->getMessage());
      }
    }

    public static function getInstance() {
      if(!isset(self::$_instance)) {
         self::$_instance = new DB();
      }
      return self::$_instance;
    }

    public function query($sql, $params = array()){

    	$this->_error = false;
    	if($this->_query=$this->_pdo->prepare($sql)){
    		$x=1;
    		if(count($params)){
    			foreach ($params as $param) {
    				$this->_query->bindValue($x, $param);
    				$x++;
    			}
    		}

    		if($this->_query->execute()) {
    			$this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
    			$this->_count=$this->_query->rowCount();
    		}else{
    			$this->_error=true;
    		}
    	}
    	return $this;
    }

    public function action($action, $table, $where = array()){
    	
        if(count($where) === 3) {
    		
            $operators=array('=','>','<','>=','<=');

    		$field = $where[0];
    		$operator=$where[1];
    		$value = $where[2];

    		if (in_array($operator, $operators)){
    			
    			$sql="{$action} FROM {$table} WHERE {$field} {$operator} ?"; 

    			if (!$this->query($sql, array($value))->error()){
    				return $this;
    			}
    		}
    	}
    	return false;
    }
    //извлечь данные из дб
    public function get($table, $where){
    	return $this->action('SELECT *', $table, $where);

    }
    //извлечь все активные опросы из дб
    public function get_surveys($table, $where){
        return $this->action('SELECT survnam, survid', $table, $where);

    }
    //функция удаления из дб
    public function delete($table, $where){
    	return $this->action('DELETE *', $table, $where);

    }
    
    public function results(){
    	return $this->_results;
    }

    public function first(){
    	return $this->_results[0];
    }
    
  	public function insert($table, $fields =array()){
 		
 		if(count($fields)){
 			
            $keys=array_keys($fields);
 			$values ="";
 			$x=1;

 			foreach($fields as $field)	{
 				
                $values .="?"; 
 				    
                    if($x<count($fields)){
 					  $values .=", ";
 				    } 		

 				$x++;		
 			}

 		    $sql = "INSERT INTO {$table} (".implode(', ', $keys).") VALUES (".str_repeat ( "?," , count($keys)-1 )."?)";

 			if(!$this->query($sql,$fields)->error()){
 				return true;
 			}			
 		return false;
 		}
 	}

    public function update($table, $id, $fields){
 		$set='';
 		$x=1;

 		foreach($fields as $name => $value){
 			$set .= "{$name} = ?";
 			if($x<count($fields)){
 				$set .= ', ';
 			}
 			$x++;
 		}
 		//die($set);

 		$sql="UPDATE {$table} SET {$set} WHERE usrid = {$id}";
 		//echo $sql;

 		if(!$this->query($sql,$fields)->error()){
 			return true;
 		}
 		return false;
 	}


    public function error(){
    	return $this->_error;
    }

    public function count(){
    	return $this->_count;
    }
}﻿
?>
