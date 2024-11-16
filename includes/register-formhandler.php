 <?php

 if($_SERVER["REQUEST_METHOD"] === "POST") {
    $f_name =htmlspecialchars( $_POST["f_name"]);
    $l_name = htmlspecialchars( $_POST["l_name"]);
    $email = htmlspecialchars($_POST["email"]);
    $phone = htmlspecialchars($_POST["Phone"]);
    $pwd = htmlspecialchars($_POST["pwd"]);
    $country_code = htmlspecialchars($_POST["country_codes"]);


    if(empty($f_name)) {
        echo "All fields must be filed";
        header("Location: ../register.php");
        exit();
    };

    $f_name = "";
    $l_name = "";
    $l_email = "";
    $phone = "";
    $pwd = "";
    $country_code = "";

    header("Location:../login.php");
    die();
    
 } else {
    header("Location:../register.php");
 }