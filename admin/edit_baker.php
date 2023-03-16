<?php
ob_start();
include_once 'layout/header.php';
include_once __DIR__ . '/../controller/baker_controller.php';

$id = $_GET['id'];
$bakerController = new BakerController();
$baker = $bakerController->getBaker($id);
//var_dump($baker);

if (isset($_POST["update"])) {
    //var_dump($_FILES['photo']['name']);
    $file_error = $_FILES['photo']['error'];
    $filename = ($file_error != 0)? $baker["image"] : $_FILES['photo']['name'];  
    $filesize = $_FILES['photo']['size'];
    $fileurl = $_FILES['photo']['tmp_name'];
    $extensions = $actualfile_extension = explode('.', $filename);
    $actual_ext = end($extensions);
    $allowed_ext = ['jpg', 'jpeg', 'png', 'webp'];
    
    if (in_array($actual_ext, $allowed_ext)) {
        $max_size = 2000000;
        if ($filesize > $max_size) {
            echo "File size exceeds more than 2 Mb";
        } else {
            $name = time() . $filename;
            move_uploaded_file($fileurl, "uploads/" . $filename);
            //echo "Success";
        }
    } else {
        echo "File is not allowed!";
    }

    $error = false;
    if (!empty($_POST["name"])) {
        $name = $_POST["name"];
    } else {
        $error = true;
    }
    if (!empty($_POST["position"])) {
        $position = $_POST["position"];
    } else {
        $error = true;
    }
    if (!empty($_POST['note'])) {
        $note = $_POST['note'];
    } else {
        $error = true;
    }
    if (!empty($_FILES['photo'])) {
        $photo = $filename;
    } else {
        $error = true;
    }


    if (!$error) {
        $result = $bakerController->updateBaker($id, $name, $position, $note, $photo);
        //echo $result;
        if ($result) {
            header('location:bakers.php');
            exit();
        }
    }
}


?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Baker</h1>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <a href="bakers.php" class="btn btn-primary mb-3">Back</a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <form action="" method="post" enctype="multipart/form-data">
                        <img src='uploads/<?php echo $baker['image'] ?> ' alt="" id="img" height="100">
                        <div class="mt-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control"
                                value="<?php echo $baker['name']; ?>">
                        </div>
                        <div class="mt-3">
                            <label for="position" class="form-label">Position</label>
                            <input type="text" name="position" id="position" class="form-control"
                                value="<?php echo $baker['position']; ?>">
                        </div>
                        <div class="mt-3">
                            <label for="note" class="form-label">Baker's note</label>
                            <input type="text" name="note" id="note" class="form-control"
                                value="<?php echo $baker['note'] ?>">
                        </div>
                        <div class="mt-3">
                            <label for="" class="form-label">Image</label>
                            <input type="file" name="photo" id="input" class="form-control" onchange="file_changed()">
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-primary" type="submit" name="update">Update</button>
                        </div>
                    </form>
                </div>
            </div>




        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <?php
    include_once 'layout/footer.php';
    ?>