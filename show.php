  
 
 
 
 <?php include 'inc/header.php' ?>
<?php require_once 'classes/Products.php' ?>
<?php require_once 'classes/cat.php' ?>

<?php
$id = $_GET['id'];
$prod = new Products();
$product = $prod->getOne($id);
$cat_id=$product['cat_id'] ;
$category= new Cat() ;
$cat= $category->getOne($cat_id) ;

// print_r($cat) ;
// die ;

?>


<?php if($product['id']==$_GET['id']) : ?>
<?php 

    $_SESSION['prodId']=$id ;
    if(!isset($_SESSION['cart'])){
    $_SESSION['cart']=[] ;
    }
    if(isset($_POST['cart'])){
     array_push($_SESSION['cart'],$_SESSION['prodId']) ;   
    }
?>  






<div class="container my-5">
    <div class="row">
        <div class="col-lg-6">
            <img  src="images/<?php echo $product['img'] ?>" class="card-img-top" alt="...">
        </div>
        <div class="col-lg-6 my-5">
            <h3><?php echo $product['name'] ?></h3>
            <p class="text-muted"> $<?php echo $product['price'] ?></p>
            <p class="text-muted">Category : <?php echo $cat['type'] ?></p>
            <p><?php echo ($product['des']) ?></p>
            <?php if(isset($_SESSION['id'])) : ?>
            <a href="edit.php?id=<?php echo $product['id']?>" class="btn btn-warning">Edit</a>
            <a href="handlers/hdelete.php?id=<?php echo $product['id']?>" class="btn btn-danger">Delete</a>
            <?php endif ; ?>
            <div class="row">
                <div class="col-lg-3">
            <form method="POST" action="show.php?id=<?php echo $product['id']?>">
                <input type="submit" name='cart' value="Add To Cart" class="btn btn-primary mt-2">
            </form>
            </div>
            <?php if(isset($_POST['cart'])) : ?>
                <div class="col-lg mt-2">

            <a href="buy.php" class="btn btn-success">Buy Product</a>
            </div>
            <?php endif ; ?>
            </div>
             <div class="mt-4">
            <a href="index.php" class="btn btn-secondary">Back</a>
            </div>
        </div>
        



    </div>
 














<?php include 'inc/footer.php' ?>
 
<?php else : ?>
    <h1>no products to view </h1>
    <?php endif ; ?>