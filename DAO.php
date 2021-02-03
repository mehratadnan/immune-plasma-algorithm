<?php

class Dao { 
private $servername = "localhost";
private $username = "root";
private $password = "";
private $conn ;



//--------------------------------------------------------------------------
//connection
//--------------------------------------------------------------------------
public function connect(){
	try {
		$this->conn = new PDO("mysql:host=$this->servername;dbname=ipa", $this->username, $this->password);
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
	catch(PDOException $e)
		{
            echo $e ;
		}
}
//--------------------------------------------------------------------------
public function disconnect(){
	if($this->conn != null ){
		$this->conn = null ; 
	}	
}
//--------------------------------------------------------------------------
//end connection
//--------------------------------------------------------------------------

//--------------------------------------------------------------------------
// crud for data
//--------------------------------------------------------------------------
public function serach_data($x){
	$this->connect();
	try{
		$stmt = $this->conn->query(" SELECT count(*) as x FROM data WHERE x = '$x' ");
		$row = $stmt->fetch();
		if($row['x'] == 0 ){
			return "false" ; 
		}else{
			return "true";
		}
	}
	catch(PDOException $e){
		echo "Error: " . $e->getMessage();
	}
	$this->disconnect();
}
//--------------------------------------------------------------------------
public function edit_data($x){
	$this->connect();
	try{
		$stmt = $this->conn->prepare(" UPDATE data  SET y = y + '$y'  WHERE x = '$x'  ");
		$stmt->execute();
	}
	catch(PDOException $e){
		echo "Error: " . $e->getMessage();
	}
	$this->disconnect();
}
//--------------------------------------------------------------------------
public function insert_data($x){
    $this->connect();
	try{ 
        $stmt = $this->conn->prepare(" insert into data (x) values ('".$x."')");
		$stmt->execute();
	}
	catch(PDOException $e){
		echo "Error: " . $e->getMessage();
	}
	$this->disconnect();
}
//--------------------------------------------------------------------------
//end
//--------------------------------------------------------------------------
//--------------------------------------------------------------------------
public function getdata(){
	$this->connect();
	try{
        $array_fat = array();
		$stmt = $this->conn->query("SELECT x,COUNT(*) as y FROM data GROUP BY x HAVING COUNT(*) > 0;");
		while ($row = $stmt->fetch()) {
            array_push($array_fat, $row);
		}
		return json_encode($array_fat);
	}
	catch(PDOException $e){
		echo "Error: " . $e->getMessage();
	}
	$this->disconnect();
}




}
?>