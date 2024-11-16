<?php

    // DB接続設定
    $dsn = 'mysql:dbname=データベース名;host=localhost';
    $user = 'ユーザー名';
    $password = 'パスワード';
    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    
    // テーブル作成
    $sql = "CREATE TABLE IF NOT EXISTS mission5"
    ." ("
    . "id INT AUTO_INCREMENT PRIMARY KEY," // id
    . "name CHAR(32)," // 名前
    . "comment TEXT," // コメント
    . "date TEXT," //日付
    . "password TEXT" // パスワード
    .");"; 
    $stmt = $pdo->query($sql);
    
    // 変数初期化
    $initial_name = "";
    $initial_comment = "";
    $initial_password = "";
    $update_message = "";
    $update_id = "";
    $update_password = "";
    $update_err_message = "";
    $delete_err_message = "";
    
    // POST受信処理
    if(!empty($_POST["name"]) && !empty($_POST["comment"])){ // 投稿
        $name = $_POST["name"];
        $comment = $_POST["comment"];
        $password = $_POST["password"];
        
        if(!empty($_POST["id"])){ // 編集モード
            $id = $_POST["id"];
            $sql = "UPDATE mission5 SET name = :name, comment = :comment, password = :password WHERE id = :id";
            $stmt = $pdo ->prepare($sql);
            $stmt -> bindParam(':id', $id, PDO::PARAM_INT);
            $stmt -> bindParam(':name', $name, PDO::PARAM_STR);
            $stmt -> bindParam(':comment', $comment, PDO::PARAM_STR);
            $stmt -> bindParam(':password', $password, PDO::PARAM_STR);
            $stmt -> execute();
            
        }else{ //投稿モード
            $date = date('Y/m/d H:i:s');
        
            $sql = "INSERT INTO mission5 (name, comment, date, password) VALUES (:name, :comment, :date, :password)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':comment', $comment, PDO::PARAM_STR); 
            $stmt->bindParam(':date', $date, PDO::PARAM_STR);
            $stmt -> bindParam(':password', $password, PDO::PARAM_STR);
            $stmt->execute();
            
        }
        
    }else if(!empty($_POST["update_id"])){ // 編集
        $id = $_POST["update_id"];
        $password = $_POST["update_password"];
        
        // 全てのidを取得
        $sql = 'SELECT id FROM mission5';
        $stmt = $pdo->query($sql);
        $results = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
        
        if(in_array($id,$results)){ // 存在するidの場合
            // 該当するidの行を取得
            $sql = 'SELECT * FROM mission5 WHERE id = :id'; 
            $stmt = $pdo -> prepare($sql);
            $stmt -> bindParam(':id', $id, PDO::PARAM_INT);
            $stmt -> execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if($result['password']==""){ // パスワードが設定されていない場合
                $update_err_message = "パスワードが設定されていないため編集できません<br>";
                
            }else if($result['password']==$password){ // パスワードが設定されている場合
                $update_id = $id;
                $initial_name = $result['name'];
                $initial_comment = $result['comment'];
                $initial_password = $result['password'];
                $update_message = $id."番目のコメントを編集します<br>";
                
            }else{ // パスワードが一致しない
                $update_err_message = "パスワードが違います<br>";
            }
            
        }else{ // 存在しないidの場合
            $update_err_message =  $id."番のコメントは存在しません<br>";
        }
        

    }else if(!empty($_POST["delete_id"])){ // 削除
        $id = $_POST["delete_id"];
        $password = $_POST["delete_password"];
        
        // すべてのidを取得
        $sql = 'SELECT id FROM mission5';
        $stmt = $pdo->query($sql);
        $results = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
        
        if(in_array($id,$results)){ // 存在するidの場合
            $sql = 'SELECT * FROM mission5 WHERE id = :id';
            $stmt = $pdo -> prepare($sql);
            $stmt -> bindParam(':id', $id, PDO::PARAM_INT);
            $stmt -> execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if($result['password']==""){ // パスワードが設定されていない場合
                $delete_err_message = "パスワードが設定されていないため削除できません<br>";
                
            }else if($result['password']==$password){ // パスワードが設定されている場合
                $sql = "DELETE from mission5 where id = :id"; 
                $stmt = $pdo -> prepare($sql);
                $stmt -> bindParam(':id', $id, PDO::PARAM_INT);
                $stmt -> execute();
                
            }else{ // パスワードが一致しない場合
                $delete_err_message =  "パスワードが違います<br>";
            }
            
        }else{ // 存在しないid
            $delete_err_message = $id."番のコメントは存在しません<br>";
        }
    }
        
?>


<!DOCTYPE html>
<!--見た目の部分-->

<html>
    <head>
    <meta name="viewport"
    content="width=320, height=480, initial-scale=1.0, minimum-scale=1.0, maximum-scale=2.0, user-scalable=yes">
    <meta charset="UTF-8">
    <title>mission5</title>
    </head>
    <body bgcolor="mintcream" text="midnightblue">
        <span style = "fontsize:20;"><b>掲示板<br></b></span>
        <?php
            echo $update_message;
        ?>
        <form action="" method="post" > 
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($update_id, ENT_QUOTES, 'UTF-8');?>" style="width:30px">
            <input type="text" name="name" placeholder="名前" value="<?php echo htmlspecialchars($initial_name, ENT_QUOTES, 'UTF-8'); ?>">
            <input type="text" name="comment" placeholder="コメント " value="<?php echo htmlspecialchars($initial_comment, ENT_QUOTES, 'UTF-8'); ?>">
            <input type="text" name="password" placeholder="編集用パスワード" value="<?php echo htmlspecialchars($initial_password, ENT_QUOTES, 'UTF-8'); ?>">
            <input type="submit" value="送信" style="background-color:#e6cde3; border-radius: 10px;">
        </form>
        
         コメント編集フォーム<br>
        <form action="" method="post" > 
            <input type="number" name="update_id" placeholder="編集したいコメント番号を選択" style="width: 200px;" min=1>
            <input type="text" name="update_password" placeholder="投稿時に入力したパスワード" style="width: 200px;">
            <input type="submit" value="編集" style="background-color:#e6cde3; border-radius: 10px;">
        </form>
        <?php
            echo $update_err_message;
        ?>
        
        <?php
        // SQLのデータを抽出
        $sql = 'SELECT * FROM mission5';
        $stmt = $pdo->query($sql);
        $results = $stmt->fetchAll(); 
        // 投稿されている内容
        foreach ($results as $row){
            echo "<span style='font-size: 13px;'><b>".$row['id'].'</b></span><br>';
            echo $row['comment'].' ';
            echo "<span style='font-size: 11px; text-align:right;'>  ".$row['name']." ".$row['date'].'</span>';
            echo "<br><hr>";
        }
        ?>


        削除申請フォーム<br>
        <form action="" method="post" > 
            <input type="number" name="delete_id" placeholder="削除したいコメント番号を選択" min = 1 style="width: 200px;">
            <input type="text" name="delete_password" placeholder="投稿時に入力したパスワード" style="width: 200px;">
            <input type="submit" value="削除" style="background-color:#e6cde3; border-radius: 10px;">
        </form>
        <?php
        echo $delete_err_message;
        ?>
        

    </body>
</html>








