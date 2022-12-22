<?php
require_once 'MySql.php' ;
class Order extends MySql{
//get all products
public function getAll(){
    $query='SELECT * FROM orders' ;
    $stmt=$this->connect()->prepare($query) ;
    $stmt->execute() ;
    while($result=$stmt->fetchAll()){
        return $result ;
    }


}





//get one product
public function getOne($CustomerEmail ){
    $sql="SELECT * FROM orders WHERE CustomerEmail =:CustomerEmail" ;
    $stmt=$this->connect()->prepare($sql);
    $stmt->bindparam("CustomerEmail",$CustomerEmail ) ;
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
$sql='INSERT INTO orders(CustomerName,CustomerEmail,CustomerPhone,CustomerAddress) VALUES(:CustomerName,:CustomerEmail,:CustomerPhone,:CustomerAddress) ' ;



 

$stmt=$this->connect()->prepare($sql) ;
$stmt->bindparam("CustomerName",$data['CustomerName']) ;
$stmt->bindparam("CustomerEmail",$data['CustomerEmail']) ;
$stmt->bindparam("CustomerPhone",$data['CustomerPhone']) ;
$stmt->bindparam("CustomerAddress",$data['CustomerAddress']) ;
 if($stmt->execute()){
    return true ;
}else{
    return false ;
}
}


 
 
}