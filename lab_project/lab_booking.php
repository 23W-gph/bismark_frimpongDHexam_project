<?php
include ('header.php');
include ('staff_navbar.php');
?>


<div class="container my-5">
<div class="row">

<?php
                
  include 'database_connection.php';
    
  $sql="SELECT * FROM bookings WHERE booking_status=0";
 $result= mysqli_query($conn, $sql);
  $out_res=mysqli_num_rows($result);
 if ($out_res>0) {
    ?>

                <div class=" col-md-12">
                          <table class="table table-striped bg-light" padding="1px">
                          <tr>
                             <th>S.No.</th>
                             <th>Client Name</th>
                             <th>Age</th>
                             <th>Gender</th>
                             <th>Phone</th>
                             <th>Lab</th>
                             <th>Action</th>
                          </tr>

 <?php
   $i=0;
   while ($res=mysqli_fetch_assoc($result)) {
  $i++;
              
 ?>
               
                             <tr>
                              <td><?=$i?></td>
                               <td><?=$res["client_name"]?></td>
                               <td><?=$res["age"]?></td>
                               <td><?=$res["gender"]?></td>
                               <td><?=$res["phone"]?></td>
                               <td><?=$res["lab"]?></td>
                               <td><form action="" method="post">
                                   <!-- <button class="btn btn-primary"><a href="test_results.php" class="btn btn-primary">Input Results</a></button> -->
                              <a href="test_results.php" class="btn btn-primary">Input Results</a>
                               </form></td>
                              </tr>
 <?php
    }}
  ?>
                             </table>
                        </div> 
                </div>
            </div>
   
    <?php
include ('footer.php');
?>