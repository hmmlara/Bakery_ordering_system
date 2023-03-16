<?php
ob_start();
 include_once "layout/header.php";
 include_once __DIR__."/../controller/category_controller.php";
 
 $categoryController=new categoryController();
 $categorires=$categoryController->getAllCategory();
 
include_once __DIR__."/../controller/product_controller.php";

$productController=new ProductController();
$id=$_GET['id'];

$result=$productController->editProducts($id);

 if(isset($_POST['update']))
{
      //var_dump($_FILES['photo']);
      //var_dump($result['photo']);
      $file_err = $_FILES['photo']['error'];
      $filename = ($file_err != 0)? $result[0]['image'] : $_FILES['photo']['name'];
      //$filename = $_FILES['photo']['name'];
      $filesize = $_FILES['photo']['size'];
      $fileurl = $_FILES['photo']['tmp_name'];
      $extensions = $actual_extension=explode('.', $filename);
      $actual_ext = end($extensions);
      $allowed_ext = ['jpg', 'jpeg', 'png', 'webp'];
      if (in_array($actual_ext, $allowed_ext)) {
          $max_size = 2000000;
          if ($filesize > $max_size) {
              echo "File size exceeds more than 2 Mb";
          } else {
              $name = time() . $filename;
              move_uploaded_file($fileurl, "uploads/" . $filename);
          }
      }
  $error=false;
  $category_id=$_POST['category_id'];
  if(!empty($_POST['name']))
  {
    $name=$_POST['name'];
  }else
  {
     $error=true;
  }
if(!empty($_FILES['photo']))
{
  $photo=$filename;
}
else{
  $error=true;
}

  if(!empty($_POST['price']))
  {
    $price=$_POST['price'];
  }else
  {
    $error=true;
  }
  if(!empty($_POST['description']))
  {
    $description=$_POST['description'];
  }else
  {
    $error=true;
  }
  if(!($error))
  {
    $products=$productController->updateProducts($id,$category_id,$name,$photo,$price,$description);
    if($products)
    {
        header('location:products.php');
    }
  }
}

?>

   <!-- Page Heading -->
                   <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-600 ml-4">Add Products</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-light shadow-sm"><i
                                class="fas fa-download fa-sm text-light-50"></i> Generate Report</a>
                    </div>
                   
            <div class="container">
            <div>
                    <a  href="products.php" class="btn btn-outline-secondary">Back</a>
                   </div>
                 <form action="" method="post" enctype="multipart/form-data" >
                        <div class="col-md-8">
                            <label for="" class="form-label">Categories Name</label>
                            <select name="category_id" id="" class="form-control">
                                <?php
                                   for($index=0;$index<count($categorires);$index++)
                                   {
                                    if($categorires[$index]['id']==$result[0]['category_id'])
                                    {
                                        echo "<option value='".$categorires[$index]['id']."' selected>".$categorires[$index]['name']."</option>";
                                    }
                                    else
                                    {
                                        echo "<option value='".$categorires[$index]['id']."'>".$categorires[$index]['name']."</option>";
                                    }
                                   }
                                ?>
                            </select>

                            <label for="" class="form-label">Name</label>
                            <input type="text" name="name" id="" class="form-control"  value="<?php echo $result[0]['name'];?>">

                            <img src="uploads/<?php echo $result[0]['image'] ?>" alt="" srcset="" height="100" id="img" >
                            <label for="photo" class="form-label">Image</label>
                            <input type="file" name="photo" id="photo" class="form-control" onchange="file_changed()" >
                         

                            <label for="" class="form-label">Price</label>
                            <input type="text" name="price" id="" class="form-control" value="<?php  echo $result[0]['price']; ?>">

                            <label for="" class="form-label">Description</label>
                            <input type="text" name="description" id="" class="form-control" value="<?php  echo $result[0]['description']; ?>">
                            
                            <div>
                                <button type="submit" class="btn btn-outline-success mb-3 mt-3" name="update">Update</button>
                            </div>
                        </div>

                    </form>
            </div>
<?php
 include_once "layout/footer.php";
?>