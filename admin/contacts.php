<?php
ob_start();
include_once "layout/header.php";
 include_once __DIR__."/../controller/contact_controller.php";
 $contactsController=new ContactController();
 
 $contacts=$contactsController->getContacts();
//var_dump($contacts);
?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-600">Contacts</h1>
                    </div>
               <!-- Start PHP -->
            
           <div class="">
              <div class="row">
                <table class="table table-striped" id="contact_table" style="width:1250px !important">
                    <thead>
                        <tr class="bg-secondary text-white">
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Comments</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                     <?php
                    for($i=0;$i<count($contacts);$i++)
                    {
                      
                      ?>
                      
                      <?php
                        echo "<td>". 1+$i ."</td>";
                        echo "<td>".$contacts[$i]['name']."</td>";
                        echo "<td>".$contacts[$i]['email']."</td>";
                        echo "<td>".$contacts[$i]['message']."</td>";
                        echo "</tr>";
                    }
 
                     ?>
                   
                    <?php
                    
                       ?>
                        </tbody>
                        
                </table>
               
              </div>
             
              </div>
              </div> 
            
      <!-- End the Php -->
            </div>

            
       
         <!-- End of Main Content -->
<?php
    include_once "layout/footer.php";
?>
