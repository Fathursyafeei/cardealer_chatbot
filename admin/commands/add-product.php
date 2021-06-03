<?php
include '../../db/connection.php';

  if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $warna = $_POST['warna'];
    $tahun = $_POST['tahun'];
    $thumbnail = $_FILES['thumbnail']['name'];
    
    if($thumbnail !=""){
      $extension_accepted = ['png','jpg','svg'];
      $x = explode('.', $thumbnail);
      $extension = strtolower(end($x));
      $file_tmp = $_FILES['thumbnail']['tmp_name'];
      $rand = rand(1,999);
      $new_name = $rand . '-' . $thumbnail;

      if(in_array($extension,$extension_accepted)){
        move_uploaded_file($file_tmp,'../../public/public-thumbnail/' . $new_name);
        $query = "INSERT INTO products(nama,harga,warna,tahun,thumbnail) VALUES(
          '$nama','$harga','$warna','$tahun','$new_name'
        )";
        $result = mysqli_query($conn, $query);
        if(!$result){
          die("The query failed  : " . mysqli_errno($conn) .
            " - " . mysqli_error($conn));
        }else{
          echo "<script>alert('Successfully Added Data.');window.location='../index.php';</script>";
        }
      }
      else{
        echo "<script>alert('Extensions aren't allowed.');window.location='../index.php';</script>";
      }
    }
    else{
      $query = "INSERT INTO products(nama,harga,warna,tahun) VALUES(
        '$nama','$harga','$warna','$tahun'
      )";
      $result = mysqli_query($conn,$query);
      if(!$result){
        die("The query failed : " . mysqli_errno($conn) .
          " - " . mysqli_error($conn));
      }else{
        echo "<script>alert('Successfully Added Data.');window.location='../index.php';</script>";
      }
    }
  }
  else{
    echo "Error, Button hasn't been pressed!";
  }
?>