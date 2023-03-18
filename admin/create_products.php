<?php
ob_start();
 include_once "layout/header.php";
 include_once __DIR__."/../controller/category_controller.php";
include_once __DIR__."/../controller/product_controller.php";
 
 $categoryController=new categoryController();
 $categorires=$categoryController->getAllCategory();
 

$productController=new ProductController();

if(isset($_POST['add']))
{ 
  //var_dump($_FILES['photo']);
    $filename=$_FILES['photo']['name'];
    $filesize=$_FILES['photo']['size'];
    $fileurl=$_FILES['photo']['tmp_name'];
    $extensions=$actual_extension=explode('.',$filename);
    $actual_ext=end($extensions);
    $allowed_ext=['jpg','jpeg','png','webp'];
    if(in_array($actual_ext,$allowed_ext))
     {
         $max_size=2000000;
         if($filesize>$max_size)
         {
          echo "File size exceeds more than 2 Mb";
         }else
         {
          $photo_name=uniqid().$filename;
          move_uploaded_file($fileurl, "uploads/" . $photo_name);
         }
    }
     else{
      echo "File is not allowed!";
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
  if (!empty($_FILES['photo']))
  {
    $photo = $photo_name;
} 
else{
    $error = true;
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
    $products=$productController->addProducts($category_id,$name,$photo,$price,$description);
    var_dump($products);
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
        <a href="products.php" class="btn btn-outline-secondary">Back</a>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="col-md-8">
            <label for="" class="form-label">Categories Name</label>
            <select name="category_id" id="" class="form-control" required>
                <?php
                                   for($index=0;$index<count($categorires);$index++)
                                   {
                                    echo "<option value='".$categorires[$index]['id']."'>".$categorires[$index]['name']."</option>";
                                   }
                                ?>
            </select>

            <label for="" class="form-label">Name</label>
            <input type="text" name="name" id="" class="form-control" required>

            <label for="" class="form-label">Image</label>
            <input type="file" name="photo" id="photo" class="form-control" required>

            <label for="" class="form-label">Price</label>
            <input type="number" name="price" id="" class="form-control" required>

            <label for="" class="form-label">Description</label>
            <input type="text" name="description" id="" class="form-control" required>

            <div>
                <button type="submit" class="btn btn-outline-success mb-3 mt-3" name="add">Add</button>
            </div>
        </div>

    </form>
</div>
<?php
 include_once "layout/footer.php";
?>