<?php
include '../../db/connection.php';

function registerUser($nama, $alamat, $photo, $email, $password)
{
  global $conn;

  if($photo !=""){
    $extension_accepted = ['png','jpg','svg'];
    $x = explode('.', $photo);
    $extension = strtolower(end($x));
    $file_tmp = $_FILES['photo']['tmp_name'];
    $rand = rand(1,999);
    $new_name = $rand . '-' . $photo;

    if(in_array($extension,$extension_accepted)){
      move_uploaded_file($file_tmp,'../../public/public-thumbnail/' . $new_name);
      $query = "INSERT INTO users(nama,alamat,email,password,photo) VALUES(
        '$nama','$alamat','$email','$password','$new_name'
      )";
      $result = mysqli_query($conn, $query);
      if(!$result){
        die("The query failed  : " . mysqli_errno($conn) .
          " - " . mysqli_error($conn));
      }
    }
    else{
      header("Location:../register.php?message=3");
    }
  }
  else{
    $query = "INSERT INTO users(nama,alamat,email,password) VALUES(
      '$nama','$alamat','$email','$password'
    )";
    $result = mysqli_query($conn,$query);
    if(!$result){
      die("The query failed : " . mysqli_errno($conn) .
        " - " . mysqli_error($conn));
    }
  }
}

if(isset($_POST['submit'])){
  $nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
  $alamat = filter_input(INPUT_POST, 'alamat', FILTER_SANITIZE_STRING);
  $photo = $_FILES['photo']['name'];
  $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
  $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

  //Validasi email sudah pernah digunakan / belum
  $queryValidation = "SELECT * FROM users WHERE email ='email'";
  $resultValidation = mysqli_num_rows(mysqli_query($conn, $queryValidation));
  if($resultValidation > 0){
    header("Location:../register.php?message=1");
  }
  else{
    registerUser($nama, $alamat, $photo, $email, $password);
    header("Location:../register.php?message=2");
  }
}
?>