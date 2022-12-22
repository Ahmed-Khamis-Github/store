<?php
require_once 'MySql.php' ;
class Orderdetails extends MySql{
//get all products
public function getAll(){
    $query='SELECT * FROM details' ;
    $stmt=$this->connect()->prepare($query) ;
    $stmt->execute() ;
    while($result=$stmt->fetchAll()){
        return $result ;
    }


}





//get one product
public function getOne($product_id ){
    $sql="SELECT * FROM details WHERE order_id =:order_id" ;
    $stmt=$this->connect()->prepare($sql);
    $stmt->bindparam("order_id",$product_id ) ;
    $stmt->execute() ;
    while($result=$stmt->fetchAll()){
        return $result ;
    }
}


//create new product 

public function store(array $data){
$sql='INSERT INTO details(order_id,product_id,pirceEach) VALUES(:order_id,:product_id,:pirceEach)' ;
 


 

$stmt=$this->connect()->prepare($sql) ;
$stmt->bindparam("order_id",$data['order_id']) ;
$stmt->bindparam("product_id",$data['product_id']) ;
$stmt->bindparam("pirceEach",$data['pirceEach']) ;
  if($stmt->execute()){
    return true ;
}else{
    return false ;
}
}


 
 
}