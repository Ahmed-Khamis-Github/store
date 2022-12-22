<?php include 'inc/header.php' ?>
<?php if(isset($_SESSION['id']))  : ?>
    <div class="container">
    <form action="handlers/hcat.php" method="POST" >
  <div class="form-group">
    <label for="name">type</label>
    <input type="text" class="form-control" name="type" id="type" aria-describedby="emailHelp">
    <button  type="submit" name="submit" class="btn btn-primary mt-2 mx-center ">Add Category</button>

  </div>
  </div>
  <?php endif ; ?>
