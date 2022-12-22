<?php include 'inc/header.php' ?>

 <?php if(isset($_SESSION['id']))  : ?>


 <div class="row">
        <div class="col-md-7 mx-auto">
          <?php if(isset($_SESSION['errors'])) {
            foreach($_SESSION['errors'] as $error) {
              echo $error ;
            }
          }
          unset($_SESSION['errors']) ;
          ?>
 <form action="handlers/hadd.php" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="name">name</label>
    <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp">
  
  </div>

  <div class="form-group">
    <label for="price">price</label>
    <input type="text" class="form-control" name="price" id="price" aria-describedby="emailHelp">
  
  </div>
  <div class="form-group">
    <label for="cat_id">cat_id</label>
    <input type="text" class="form-control" name="cat_id" id="cat_id" aria-describedby="emailHelp">
  
  </div>

  <div class="form-group">
    <label for="desc">desc</label>
    <textarea class="form-control" name="des" id="desc" rows="3"></textarea>
  </div>


   <div class="form-group">
    <label for="img">Choose your img</label>
    <input type="file" name="img" class="form-control-file" id="img">
  </div>
   
  <button  type="submit" name="submit" class="btn btn-primary mt-2 mx-center ">Add</button>

  </form>

   
  </div>
  </div>
  <?php else : ?>
  <?php header('location:index.php') ?>
  <?php endif  ; ?>










 