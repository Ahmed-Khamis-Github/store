<?php
if(isset($_POST['submit']))
{
    $img=$_FILES['file'] ;
    $filename=$img['name'] ;
    $tmp_name=$img['tmp_name'];
    $ext=pathinfo($filename)['extension'] ;
    $new_name=uniqid().'.'.$ext ;
    move_uploaded_file($tmp_name,'images/'.$new_name) ;
    echo $new_name ;
    

}

?>
 
<form action="test.php" method="POST" enctype="multipart/form-data">

<div class="form-group">
    <label for="img">Choose your img</label>
    <input type="file" name="file" class="form-control-file" id="img">
  </div>
   
  <button  type="submit" name="submit" class="btn btn-primary mt-2 mx-center ">Add</button>

  </form>

</form>