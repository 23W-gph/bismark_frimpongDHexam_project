<?php
include ('header.php');
include ('staff_navbar.php');
?>

<?php
$res_out="";
 if(isset($_POST['submit'])){
     //linking to database connection
     include 'database_connection.php';
     $month = mysqli_real_escape_string($conn, $_POST['month']);
     $test_type = mysqli_real_escape_string($conn, $_POST['test_type']);
     $results = mysqli_real_escape_string($conn, $_POST['results']);
    //  $email = mysqli_real_escape_string($conn, $_POST['email']);
     
     //updating
     $sqlexp = "UPDATE bookings SET (user_name, email, passwd, date_of_reg) VALUES ('$username', '$email', '$pass', '$dor')";
     if (mysqli_query($conn, $sqlexp)){
        $res_out="Data submitted successfully";
     }else{
        $res_out ="Error Submitting the data";
    
    }

 }

?>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-head">
                        <?=$res_out?>
                    </div>
                    <div class="card-body">
                     <a href="index.php">Home</a>
                        <form action="" method="post">
                        
                        <label for="">Select Month</label>
                            <select name="month" id="" class="form-control">
                                <option value="Jan">Jan</option>
                                <option value="Feb">Feb</option>
                                <option value="Mar">Mar</option>
                                <option value="Apr">Apr</option>
                                <option value="May">May</option>
                                <option value="Jun">Jun</option>
                                <option value="Jul">Jul</option>
                                <option value="Aug">Aug</option>
                                <option value="Sep">Sep</option>
                                <option value="Oct">Oct</option>
                                <option value="Nov">Nov</option>
                                <option value="Dec">Dec</option>
                                
                            </select><br>
                            
                            <label for="">Select Test Type</label>
                            <select name="test_type" id="" class="form-control">
                                <option value="Malaria">Malaria</option>
                                <option value="HIV">HIV</option>
                                <option value="Sicklin">Sicklin</option>
                                <option value="HB">TB</option>
                            </select><br>
                            <label for="">Select Test Results</label>
                            <select name="results" id="" class="form-control">
                                <option value="Positive">Positive</option>
                                <option value="Negative">Negative</option>
                            </select><br>
                        
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-dark">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <?php
include ('footer.php');
?>