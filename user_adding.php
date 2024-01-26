<?php
                if ($_SERVER['REQUEST_METHOD']){
                    include 'config.php';
                $id =$_POST['id'];
                $name =$_POST['name'];
                $email =$_POST['email'];
                $mobile =$_POST['mobile'];
                $password = $_POST['password'];
                $status =$_POST['status'];
                
            

                $sql = "INSERT INTO `authentication` (`id`, `name`, `email`, `mobile`, `password`, `status`) VALUES ('$id', '$name', '$email', '$mobile', '$password', '$status')";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
              } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
              }
            
            

                }
        ?>