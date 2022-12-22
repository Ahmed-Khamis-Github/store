 <?php include 'inc/header.php' ?>
<?php require_once 'classes/Products.php' ?>
<?php require_once 'classes/helpers/Str.php' ?>
<?php 
$prod= new Products () ;
$products=$prod->getAll() ;
 
 use helpers\Str ;

?>





<div class="container my-5">
    <div class="row">
        <?php if($products!==[]) : ?>
    <?php foreach ($products as $product ): ?>

        <div class="col-lg-4">
            <div class="card" style="width: 18rem;"  >
                <img src="images/<?php echo $product['img']?>" class="img-fluid"  >
                <div class="card-body">
                    <h5 class="card-title"><?php echo $product['name'] ?></h5>
                    <p class="text-muted"> $<?php echo $product['price'] ?></p>
                    <p class="card-text"><?php echo Str::limit($product['des'])?></p>
                    <a href="show.php?id=<?php echo $product['id']?>" class="btn btn-primary">Show More </a>
                    <?php if(isset($_SESSION['id'])) : ?>
                    <a href="edit.php?id=<?php echo $product['id']?>" class="btn btn-secondary">Edit</a>
                    <?php endif ; ?>
                </div>
            </div>
        </div>
        
         <?php endforeach ; ?>
        <?php else: ?> 
              <h1>No Products To View is shown here </h1> 

              <?php endif ;?>
    </div>
</div>














<?php include 'inc/footer.php' ?>