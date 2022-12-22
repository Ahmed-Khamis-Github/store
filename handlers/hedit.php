<?php require_once '../classes/Products.php' ; ?>
<?php 
if(isset($_POST['submit'])){
     
$name=$_POST['name'];
$des=$_POST['des'] ;
$price=$_POST['price'] ;
//img
if(true){
    $data=[
        'name'=>$name ,
        'des'=>$des ,
         'price'=>$price 

    ];
    $prod= new Products ;
   $result= $prod->update($_GET['id'],$data) ; 
   if($result==true){
    header('location:../edit.php') ;

   }else{

   }
    //store in database
    // if stored in database
    if(true)
    {
        header('location:../index.php') ;
    }else{

    }
}


}else{
 header('location:../add.php') ;

}