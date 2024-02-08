<?php
include ('header.php');
include ('staff_navbar.php');
?>
<div class="container my-5">
    <div class="row">
        <div class="col-md-6">
       <?php
 include 'database_connection.php';
$sql="SELECT * FROM bookings WHERE booking_status=0";
 $result= mysqli_query($conn, $sql);
  $out_res=mysqli_num_rows($result);
 if ($out_res>0) {
    ?>

                          <table class="table table-striped bg-light" padding="1px">
                          <tr>
                             <th>S.No.</th>
                             <th>Client Name</th>
                             <th>Age</th>
                             <th>Gender</th>
                             <th>Phone</th>
                             <th>Lab</th>
                             
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
                               
                              </tr>
 <?php
    }}
  ?>
                             </table>
        </div>
        <div class="col-md-6">
            <div class="row text-center">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h3>5</h3>
                    </div>
                    <div class="card-title">Total bookings</div>
                </div>
            </div>
            <div class="col-6">
            <div class="card">
                    <div class="card-body">
                     <h3>2</h3>
                    </div>
                    <div class="card-title">Test done</div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

<?php
include ('footer.php');
?>
