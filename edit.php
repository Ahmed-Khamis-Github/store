<?php include 'inc/header.php' ?>
<?php if(isset($_SESSION['id']))  : ?>

<?php require_once 'classes/Products.php' ?>

<?php
$id = $_GET['id'];
$prod = new Products();
$product = $prod->getOne($id);
 ?>

 

<div class="row">
       <div class="col-md-7 mx-auto">
<form action="handlers/hedit.php?id=<?php echo $id ?>" method="POST" enctype="multipart/form-data">
 <div class="form-group">
   <label for="name">name</label>
   <input type="text" class="form-control" name="name" value="<?php echo $product['name']?>" id="name" aria-describedby="emailHelp">
 
 </div>

 <div class="form-group">
   <label for="price">price</label>
   <input type="text" class="form-control" name="price" value="<?php echo $product['price']?>" id="price" aria-describedby="emailHelp">
 
 </div>

 <div class="form-group">
   <label for="desc">desc</label>
   <textarea class="form-control" name="des"    id="desc" rows="3"><?php echo $product['des']?></textarea>
 </div>

 
  
 <button  type="submit" name="submit" class="btn btn-primary mt-2 mx-center ">Edit</button>

 </form>

  
 </div>
 </div>
 <?php else : ?>
  <?php header('location:index.php') ?>
  <?php endif  ; ?>









