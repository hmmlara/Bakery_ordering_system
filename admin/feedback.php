<?php
ob_start();
include_once "layout/header.php";
 include_once __DIR__."/../controller/feedback_controller.php";
 $feedbacksController=new feedbacksController();
 
 $feedbacks=$feedbacksController->getAdminFeedbacks();
 //var_dump($feedbacks);
//  if(isset($_GET['page']) && !empty($_GET['page']))
// {
//     $page=$_GET['page'];
// }
// else
// {
//     $page=1;
// }
// $result_page=$feedbacksController->getFeedbackPage($page);
?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-600">FeedBacks</h1>
                    </div>
               <!-- Start PHP -->
            
           <div class="">
              <div class="row">
                <table class="table table-striped" id="feedback_table" style="width:1250px !important">
                    <thead>
                    <!-- <th>No</th> -->
                      <tr class="bg-secondary text-white">
                        <th>No</th>
                        <th>name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Comments</th>
                        <th>Rating</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody id="delete_feedback">
                     <?php
                    for($i=0;$i<count($feedbacks);$i++)
                    {
                      
                      ?>
                        <tr class="<?php echo ($feedbacks[$i]["rating"] >= 4)? '':'bg-warning text-white'; ?>">
                      <?php
                        // echo "<td>". $number+$i ."</td>";
                        echo "<td>". 1+$i ."</td>";
                        echo "<td>".$feedbacks[$i]['name']."</td>";
                        echo "<td>".$feedbacks[$i]['email']."</td>";
                        echo "<td>".$feedbacks[$i]['address']."</td>";
                        echo "<td>".$feedbacks[$i]['comments']."</td>";
                        echo "<td>".$feedbacks[$i]['rating']."</td>";
                        echo "<td id = '".$feedbacks[$i]['id']."'><a class = 'btn btn-danger deletebtn'>Delete</a></td>";
                        echo "</tr>";
                    }
 
                     ?>
                        </tbody>
                        
                </table>
               
              </div>
             
              </div>
              </div> 
            
      <!-- End the Php -->
            </div>

            
<?php
    include_once "layout/footer.php";
?>
