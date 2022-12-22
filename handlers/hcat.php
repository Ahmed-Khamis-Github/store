<?php session_start() ;?>
  
<?php require_once '../classes/Cat.php' ; ?>
 <?php require_once '../classes/Validation/Validator.php'; ?> 
<?php 
 use validation\Validator ;


 
if(isset($_POST['submit'])){
     
$cat=$_POST['type'];
$v=new Validator();
$v->rules('cat',$cat,['required','string']) ;
$errors = $v->errors ;
 $_SESSION['errors']=$errors ;
    // var_dump($errors) ;
// die ;
//img
if(true){
     $data=[
        'type'=>$cat 
        

    ];
    $prod= new Cat ;
   $result= $prod->store($data) ; 
   if($result==true){
    header('location:../index.php') ;

   }else{


   }
    //store in database
    // if stored in database
    
}else{
    
     header('location:../cat.php') ;
}


}else{
 header('location:../cat.php') ;

}
?>