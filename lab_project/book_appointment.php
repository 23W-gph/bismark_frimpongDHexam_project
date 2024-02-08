<!DOCTYPE html>
<?php
include ('header.php');
include ('client_navbar.php');
?>


<?php
$res_out="";
 if(isset($_POST['submit'])){
     //linking to database connection
     include 'database_connection.php';
     $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
     $gender = mysqli_real_escape_string($conn, $_POST['gender']);
     $age = mysqli_real_escape_string($conn, $_POST['age']);
     $city = mysqli_real_escape_string($conn, $_POST['city']);
     $phone = mysqli_real_escape_string($conn, $_POST['phone']);
     $lab = mysqli_real_escape_string($conn, $_POST['lab']);
     $booking_date = mysqli_real_escape_string($conn, $_POST['booking_date']);
     $status = 0;
     
     $sqlexp = "INSERT INTO bookings (client_name, lab, age, gender, city, booking_date, submission_date, phone, booking_status) VALUES ('$fullname', '$lab', '$age', '$gender' , '$city', '$booking_date', now(), '$phone', '$status')";
     if (mysqli_query($conn, $sqlexp)){
        $res_out="Data submitted successfully";
     }else{
        $res_out ="Error Submitting the data";
    
    }

 }

?>
    <div class="container my-5">
        <div class="row">
            <div class="col-8 m-auto">
                <div class="card mb-5">
                    <div class="card-head">
                            <div class="card-title bg-dark py-3 text-light text-center">
                                Appointment booking form
                                <h5 class="text-danger"><?=$res_out?></h5>
                            </div>

                    </div>
                    <div class="card-body">
                      <form action="" method="post">
                            <label for="">Enter Your Name</label>
                            <input type="text" name="fullname" id="" class="form-control" required>
                            <label for="">Select Your Gender</label>
                            <select name="gender" id="" class="form-control" required>
                               <option value="">click to select...</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select><br>
                            <label for="">Enter Your Age</label>
                            <input type="number" name="age" id="" class="form-control" required>
                            <label for="">Enter Your City</label>
                            <input type="text" name="city" id="" class="form-control">
                            <label for="">Enter Your Phone</label>
                            <input type="tel" name="phone" id="" class="form-control" required>
                            <label for="">Select Your Prefered Laboratory</label>
                            <select name="lab" id="" class="form-control" required>
                                 <option value="">click to select...</option>
                                <option value="Lab 1">Lab 1</option>
                                <option value="Lab 2">Lab 2</option>
                                <option value="Lab 3">Lab 3</option>
                            </select><br>
                            <label for="">Appointment Date</label>
                            <input type="date" name="booking_date" id="" class="form-control mb-3" required>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-primary">Reset</button>
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <?php
include ('footer.php');
?>