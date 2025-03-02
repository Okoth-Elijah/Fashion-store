<?php 
session_start();
$error_message = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : '';
unset($_SESSION['error_message']); // Clear the error message after displaying
?>

<!doctype html>
<html lang="en">
  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Register Form</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="css/register.css">

        <script>
        // Check for PHP error message and show it as a popup
        const errorMessage = <?php echo json_encode($error_message); ?>;
        if (errorMessage) {
            alert(errorMessage); // Display the error message as a popup
        }
      </script>

    </head>
  <body>
   
            <form action="includes/register-formhandler.php"  method="post" class="register-form px-4 py-4 d-flex flex-column rounded justify-content-between">
                  <img src="img/Apparel-nest.png" class="img-fluid mx-auto" alt="logo">
                   <h3 class="register-title fw-bold">Registration Form</h3>
                <div class="form-group mt-2">
                    <label for="Username">Username</label>
                    <input type="text" name="username" id="username" placeholder="username" class="form-control form-control-md">
                </div>
                <div class="form-group mt-2">
                    <label for="Phone">Phone Number</label>
                    <div class="d-flex ">
                        <select name="country_codes" id="" class="country-codes rounded">
                            <option value="none"></option>
                            <option value="Uganda" class="c_codes">+256</option>
                            <option value="Kenya" class="c_codes">+254</option>
                            <option value="Tanzania" class="c_codes">+255</option>
                            <option value="Rwanda" class="c_codes">+250</option>
                            <option value="Burundi" class="c_codes">+257</option>
                        </select>
                        <input type="tel" name="Phone" id="Phone" placeholder="eg. 78463...." maxlength="9" class="form-control form-control-md">
                    </div>
                </div>
                <div class="form-group mt-2">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter email" class="form-control form-control-md">
                </div> 
                <div class="form-group mt-2">
                    <label for="password">Password</label>
                    <input type="password" name="pwd" id="password" placeholder="Enter password" class="form-control form-control-md">
                </div>

                <div class="form-group mt-2">
                    <label for="confirm-password">Confirm Password</label>
                    <input type="password" name="confirm-password" id="confirm-password" placeholder="confirm-password" class="form-control form-control-md">
                </div>

                <button class="btn btn-primary btn-lg mt-4">Submit</button>

                <div class="have-account d-flex gap-3 mt-2">
                    <p class="fs-5">Already Have account?</p>
                    <a class="  fs-5 text-decoration-none" href="login.php">Login</a>
                </div>
            </form>
     

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>