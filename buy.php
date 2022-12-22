<?php include 'inc/header.php' ?>
<?php require_once 'classes/Products.php' ?>
<?php require_once 'classes/cat.php' ?>
<div class="container">
    <div class="row"><table class="table">
        <div class="col-lg">
  <thead>
 
    <tr>
      <th scope="col">Name</th>
       <th scope="col">Price</th>
      <th  scope="col">Category</th>
      <th scope="col">Image</th>
    </tr>
  </thead>
  <tbody>
  <?php 
    if(isset($_SESSION['cart'])) :
    foreach($_SESSION['cart'] as $cart) :
    $prod=new Products() ;
    $oneproduct=$prod->getOne($cart) ;
    $cat=new Cat() ;
    $oneCat=$cat->getOne($oneproduct['cat_id']) ;
      
       
    ?>  
    <tr>
       
      <td><?php echo   $oneproduct['name'] ?></td>
       <td><?php echo   $oneproduct['price'] ?></td>
      <td><?php echo   $oneCat['type'] ?></td>
      <td style="width: 100px ;" ><img  src="images/<?php echo $oneproduct  ['img'] ?>" class="card-img-top" alt="..."></td>
    </tr>
    <?php endforeach ; ?>
    <?php endif ; ?>
    </table>
    </div>
    </div>
</div>


<div class="container">
<form action="handlers/horder.php" method="POST" >

  <div class="form-group">
    <label for="name">name</label>
    <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp">
  
  </div>

  <div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" name="email" id="email" aria-describedby="emailHelp">
  
  </div>

  <div class="form-group">
    <label for="phone">Phone</label>
    <input type="text" class="form-control" name="phone" id="phone" aria-describedby="emailHelp">
  
  </div>

  <div class="form-group">
    <label for="Address">Address</label>
    <input type="text" class="form-control" name="Address" id="Address" aria-describedby="emailHelp">
  
  </div>
  <button  type="submit" name="buy" class="btn btn-primary mt-2 mx-center mb-4">Checkout</button>

</div>

   

