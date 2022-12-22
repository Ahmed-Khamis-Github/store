  <?php include 'inc/header.php' ?>
  <?php if(isset($_SESSION['id']))  : ?>
    <?php  header('location:index.php') ; ?>
    <?php endif ; ?>


 <div class="container">
<form action="handlers/hlogin.php" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="name">email</label>
    <input type="text" class="form-control" name="email" id="email" aria-describedby="emailHelp">
  
  </div>

  <div class="form-group">
    <label for="price">password</label>
    <input type="text" class="form-control" name="password" id="password" aria-describedby="emailHelp">
  
  </div>

    
  <button  type="submit" name="Login" class="btn btn-primary mt-2 mx-center ">Login</button>

  </form>
  </div>