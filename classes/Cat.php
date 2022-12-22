<?php
require_once 'MySql.php' ;
class Cat extends MySql{
//get all products
public function getAll(){
    $query='SELECT * FROM cat' ;
    $stmt=$this->connect()->prepare($query) ;
    $stmt->execute() ;
    while($result=$stmt->fetchAll()){
        return $result ;
    }


}





//get one product
public function getOne($id){
    $sql="SELECT * FROM cat WHERE cat_id =:cat_id" ;
    $stmt=$this->connect()->prepare($sql);
    $stmt->bindparam("cat_id",$id) ;
    $stmt->execute() ;
    $result=$stmt->fetch() ;
    if($result==null){
        echo "no data is found" ;
        die ;
    }else{
    return $result ;
    }
}


//create new product 

public function store(array $data){
$sql='INSERT INTO cat(type) VALUES(:type) ' ;

$stmt=$this->connect()->prepare($sql) ;
$stmt->bindparam("type",$data['type']) ;
 
if($stmt->execute()){
    return true ;
}else{
    return false ;
}
}


 
}