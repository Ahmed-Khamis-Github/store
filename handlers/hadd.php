<?php session_start() ;?>
  
<?php require_once '../classes/Products.php' ; ?>
<?php require_once '../classes/helpers/img.php' ; ?>
<?php require_once '../classes/Validation/Validator.php'; ?> 
<?php 
use helpers\img ;
use validation\Validator ;
if(isset($_POST['submit'])){
     
$name=$_POST['name'];
$des=$_POST['des'] ;
$price=$_POST['price'] ;
$cat_id=$_POST['cat_id'] ;
$img=$_FILES['img'] ;
$v=new Validator();
$v->rules('name',$name,['required','string']) ;
$v->rules('des',$des,['required','string']) ;
$v->rules('price',$price,['required','numeric']) ;
$errors = $v->errors ;
 $_SESSION['errors']=$errors ;
    // var_dump($errors) ;
// die ;
//img
if(true){
    $img= new img($img) ;
    $data=[
        'name'=>$name ,
        'des'=>$des ,
        'img'=>$img->new_name ,
        'price'=>$price ,
        'cat_id'=>$cat_id 

    ];
    $prod= new Products ;
   $result= $prod->store($data) ; 
   if($result==true){
    header('location:../add.php') ;

   }else{


   }
    //store in database
    // if stored in database
    if(true)
    {
        $img->upload() ;
        header('location:../add.php') ;
    }else{

    }
}else{
    
     header('location:../add.php') ;
}


}else{
 header('location:../add.php') ;

}
?>
 