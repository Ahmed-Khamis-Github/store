<?php require_once '../classes/Products.php'; ?>
<?php
 
        $prod = new Products;
        $id=$_GET['id'] ;
        $product=$prod->getOne($id) ;
        $img=$product['img'] ;
          unlink('../images/'.$img) ;
       $result= $prod->delete($_GET['id']);
        if ($result == true) {
            header('location:../index.php');
        } else {
            echo "Failed" ;
        }
      
 
