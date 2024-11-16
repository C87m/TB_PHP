<?php
// DB接続設定
    $dsn = 'mysql:dbname=データベース名;host=localhost';
    $user = 'ユーザー名';
    $password = 'パスワード';
    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    
    $sql = "CREATE TABLE IF NOT EXISTS tbtest"
    ." ("
    . "id INT AUTO_INCREMENT PRIMARY KEY,"
    . "name CHAR(32),"
    . "comment TEXT"
    .");"; 

    $stmt = $pdo->query($sql);
    
    $sql ='SHOW TABLES';
    $result = $pdo -> query($sql); 

    // 取得したテーブル名を表示・複数テーブルがあれば複数表示される
    foreach ($result as $row){
        echo $row[0];
        echo '<br>';
    }
    echo "<hr>";
    
    $sql ='SHOW CREATE TABLE tbtest';
    $result = $pdo -> query($sql); 

    // 取得したSQLを表示（指定したテーブルをCREATEしようと思った際のSQL）
    foreach ($result as $row){
        echo $row[1];
    }
    echo "<hr>";
    
    $name = 'ぼよよｎ';
    $comment = '（好きなコメント）'; //好きな名前、好きな言葉は自分で決めること 

    $sql = "INSERT INTO tbtest (name, comment) VALUES (:name, :comment)";
    $stmt = $pdo->prepare($sql);
    //プレースホルダに変数を宛がう
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':comment', $comment, PDO::PARAM_STR); 

    //実行
    $stmt->execute();
    
    $id = 1; //変更する投稿番号 

    $name = "（変更したい名前）";
    $comment = "（変更したいコメント）"; //変更したい名前、変更したいコメントは自分で決めること 

    $sql = 'UPDATE tbtest SET name=:name,comment=:comment WHERE id=:id';
    $stmt = $pdo->prepare($sql);
    //プレースホルダに変数を宛がう
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT); 

    //実行
    $stmt->execute();
    
    $id = 2; 

    $sql = 'delete from tbtest where id=:id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT); 

    //実行
    $stmt->execute();
    
    //$rowの添字（[ ]内）は、4-2で作成したカラムの名称に合わせる必要があります。
    $sql = 'SELECT * FROM tbtest';
    $stmt = $pdo->query($sql);
    $results = $stmt->fetchAll(); 
    
    // 【！この SQLは tbtest テーブルを削除します！】 

    $sql = 'DROP TABLE tbtest';
    $stmt = $pdo->query($sql);

    //ループして、取得したデータを表示
    foreach ($results as $row){
        //$rowの中にはテーブルのカラム名が入る
        echo $row['id'].',';
        echo $row['name'].',';
        echo $row['comment'].'<br>';
    echo "<hr>";
    }
    
 
    
    
    
    
    ?>