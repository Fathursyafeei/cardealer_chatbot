<?php
  include '../db/connection.php';

  date_default_timezone_set('Asia/Jakarta');
  $current_time = date("y-m-d H:i:s");

  if(isset($_POST['text'])){
    $pesan = mysqli_real_escape_string($conn, $_POST['text']);
    $cek = mysqli_query($conn, "SELECT * FROM chatbot_qna WHERE pertanyaan RLIKE '[[:<:]]".$pesan."[[:>:]]'");
    $count = mysqli_num_rows($cek);

    if($count == "0"){
      $data = "Sorry I couldnt understand that";
      $recordcht = mysqli_query($conn, "INSERT INTO chatbot(user,bot,waktu) VALUES ('$pesan','$data','$current_time')");
    }else{
      while($row = mysqli_fetch_array($cek)){
        $data = $row['jawaban'];
        $recordcht = mysqli_query($conn, "INSERT INTO chatbot(user,bot,waktu) VALUES ('$pesan','$data','$current_time')");
      }
    }
  }