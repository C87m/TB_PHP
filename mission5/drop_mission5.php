<?php

    $dsn = 'mysql:dbname=データベース名;host=localhost';
    $user = 'ユーザー名';
    $password = 'パスワード';
    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    
    
    $sql = 'DROP TABLE mission5';
    $stmt = $pdo->query($sql);
    echo "削除完了！";
?>