<?php require_once 'Mysql.php' ;
class Admin extends MySql {
    public function attempt($email,$password)
    {
        $sql='SELECT * From admins Where email=:email AND password= :password' ;
        $stmt=$this->connect()->prepare($sql) ;
        $stmt->bindParam('email',$email) ;
        $stmt->bindParam('password',$password) ;
        $stmt->execute() ;
        $result=$stmt->fetch() ;
        if($stmt->rowcount()==1){
        return $result ;

        }else{
            return null ;
        }
    }
    
    
}