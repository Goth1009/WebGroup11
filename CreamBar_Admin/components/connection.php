<?php

  $db_name = 'mysql:host=localhost;dbname=shop_db';
  $username = 'root';
  $user_password = '';

  try {
    $conn = new PDO($db_name, $username, $user_password);
    // echo "Connected to database successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

  function unique_id(){
    $chars =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    $charsLenth = strlen($chars);
    $randomString = '';
    for($i = 0; $i < 20; $i++){
      $randomString .= $chars[mt_rand(0, $charsLenth - 1)];
    }
    return $randomString;
  }


  ?>