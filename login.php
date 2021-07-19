 <?php
    session_start();
 
   include("config.php");
  error_reporting(E_ERROR  | E_PARSE); 
if($_SESSION['user']){
   header("location:homepage.php");
}



$_SESSION['user']="";
$err="";



if($_SERVER["REQUEST_METHOD"]=="POST"){
     $reg_no = $_POST['username']; 

    
      $pass = $_POST['pass'];  
     $sql = "select * from user_details where username='$reg_no' and password='$pass'";  
        $result = mysqli_query($con, $sql);  
          if ($result->num_rows > 0) 
         {

             $_SESSION['user']=$reg_no;
             
            //  $_SESSION['isloggedin']=true;
             header("location:homepage.php");
            

         }
         else {
            //  $_SESSION['isloggedin']=false;
            $err="invalid username or password";
           

         }
        

}

?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            color: #002f34;
            font-weight: 700;

        }

        h1 {
            font-weight: 700;
        }

        .form-control,
        button {

            width: 70%;

        }
    </style>

</head>

<body>

    <div class="container">
        <div class="row">


            <div style="margin-top: 12%;" class="col col-12 col-lg-5  ">

                <?php if($err): ?>
                <div style="width: 70%;" class="alert alert-danger" role="alert">
                    <?php echo $err; ?>
                </div>
                <?php endif; ?>
                <h1>Login</h1>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control rounded-pill" name="username" id="exampleInputEmail1"
                            aria-describedby="emailHelp" required>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your username with anyone
                            else.</small>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="mr-5" for="exampleInputPassword1">Password</label>
                        <a style="font-size: 15px;" class="ml-5 font-weight-light" href="">Forgot Password?</a>
                        <input type="password" class="form-control rounded-pill" required name="pass"
                            id="exampleInputPassword1">
                    </div>
                    <br>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input rounded-pill" required id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">I accept the <a class="font-weight-light"
                                href="">terms and
                                conditions</a></label>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success rounded-pill disable">Submit</button>
                </form>
                <p class=" text-muted font-weight-light mt-3 ml-2 ">Don't have an account?<a class="ml-2"
                        href="register.php">Sign Up
                        Now!</a></p>




            </div>
            <div class="col d-none d-lg-block col-lg-7">
                <img  src="football.png" alt="">

            </div>
        </div>
    </div>


   
</body>

</html>