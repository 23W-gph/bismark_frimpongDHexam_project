<?php
include ('header.php');
?>
<?php
    if (isset($_POST['login'])) {
		 session_start();
//linking database connection
	include 'database_connection.php';
	$userpassword = mysqli_real_escape_string($conn, $_POST['userpassword']);
	$useremail = mysqli_real_escape_string($conn, $_POST['useremail']);
	$role = mysqli_real_escape_string($conn, $_POST['role']);
	
		if ($role==1) {

			// $sql = "SELECT * FROM login WHERE username = '$ploginUsername' AND pasword ='$ploginPwd'";
			// $result = mysqli_query($conn, $sql);
			// $resultcheck = mysqli_num_rows($result);
			// if ($resultcheck<1) {
			// 	header("Location: ../../accounts.php?login=invalid3");
	        //      exit();
			// 				}else{
			// 	if ($row = mysqli_fetch_assoc($result)) {
			// 		$_SESSION['u_id']=$row['login_id'];
			// 		$_SESSION['u_fname']=$row['username'];
			// 			header("Location:staff_dashboard.php");
	        //             exit();	
			// 	}
			//  }
			 header("Location:staff_dashboard.php");
		} elseif($role==2) {
			// $sql = "SELECT * FROM login WHERE username = '$ploginUsername' AND pasword ='$ploginPwd'";
			// $result = mysqli_query($conn, $sql);
			// $resultcheck = mysqli_num_rows($result);
			// if ($resultcheck<1) {
			// 	header("Location: ../../accounts.php?login=invalid3");
	        //      exit();
			// 				}else{
			// 	if ($row = mysqli_fetch_assoc($result)) {
			// 		$_SESSION['u_id']=$row['login_id'];
			// 		$_SESSION['u_fname']=$row['username'];
			// 			header("Location:admin_dashboard.php");
	        //             exit();	
			// 	}
			//  }
			 header("Location:admin_dashboard.php");
		}else{
			$output='Select your role';
		}
		
       
    } else {
        $output='Login here';
    }
    
?>

<div class="container">
    <div class="row">
        <div class="col-md-8 m-auto col-sm-12 my-5">
            <div class="card">
                <div class="card-head">
                    <div class="card-title text-center text-danger">
                        <?=$output?>
                    </div>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <label for="">Select Your Role</label>
                        <select name="role" id="" class="form-control" required>
							<option value="">Click to select....</option>
                            <option value="1">Staff</option>
                            <option value="2">Administrator</option>
                        </select>
                        <label for="">Email</label>
                        <input type="email" name="useremail" id="" class="form-control" required>
                        <label for="">Password</label>
                        <input type="password" name="userpassword" id="" class="form-control mb-4" required>
                        
                        <button type="submit" class="btn btn-primary" name="login">Login</button>
                        <a class="btn btn-primary" href="index.php">Go Home</a>
                   </form>
                </div>
            </div>
            
        </div>
    </div>
</div>
    
    <?php
include ('footer.php');
?>