<?php
            // if (isset($_POST['logout'])) {

                  include 'connection.php';
                  session_start();
                  session_unset();
                  session_destroy();
                  header("Location:index.php");
                  exit();    
            
              ?>