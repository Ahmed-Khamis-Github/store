<?php
require_once 'MySql.php' ;
class Products extends MySql{
//get all products
public function getAll(){
    $query='SELECT * FROM products' ;
    $stmt=$this->connect()->prepare($query) ;
    $stmt->execute() ;
    while($result=$stmt->fetchAll()){
        return $result ;
    }


}





//get one product
public function getOne($id){
    $sql="SELECT * FROM products WHERE id =:id" ;
    $stmt=$this->connect()->prepare($sql);
    $stmt->bindparam("id",$id) ;
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
$sql='INSERT INTO products(name,des,img,price,cat_id) VALUES(:name,:des,:img,:price,:cat_id) ' ;

$stmt=$this->connect()->prepare($sql) ;
$stmt->bindparam("name",$data['name']) ;
$stmt->bindparam("des",$data['des']) ;
$stmt->bindparam("img",$data['img']) ;
$stmt->bindparam("price",$data['price']) ;
$stmt->bindparam("cat_id",$data['cat_id']) ;
if($stmt->execute()){
    return true ;
}else{
    return false ;
}
}


//edit

public function update($id,array $data){
    $sql="UPDATE products SET name= :name , des= :des , img= :img , price= :price WHERE id= :id " ;
    $stmt=$this->connect()->prepare($sql) ;
    $stmt->bindParam("name",$data['name']) ;
    $stmt->bindParam("des",$data['des']) ;
    $stmt->bindParam("img",$data['img']) ;
    $stmt->bindParam("price",$data['price']) ;
    $stmt->bindParam("id",$id) ;
    $stmt->execute() ;
    if($stmt->execute()){
        return true ;
    }else{
        return false ;
    }
}

public function delete($id) {
    $sql= "DELETE FROM products WHERE id = :id " ;
    $stmt=$this->connect()->prepare($sql) ;
    $stmt->bindParam("id",$id) ;
    $stmt->execute() ;
    if($stmt->execute()){
        return true ;
    }else{
        return false ;
    }
}
//delete

}