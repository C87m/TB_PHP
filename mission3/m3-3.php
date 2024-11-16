<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport"
    content="width=320, height=480, initial-scale=1.0, minimum-scale=1.0, maximum-scale=2.0, user-scalable=yes">
    <meta charset="UTF-8">
    <title>mission3</title>
    </head>
    <body bgcolor="mintcream" text="midnightblue">
        <span style = "fontsize:20;"><b>掲示板<br></b></span>
        <form action="" method="post" > 
            <input type="text" name="name" placeholder="名前">
            <input type="text" name="comment" placeholder="コメント">
            <input type="submit" value="送信" style="background-color:#e6cde3; border-radius: 10px;">
        </form>
    </body>
</html>

<?php
    // 既に投稿されている内容
    $filename = "mission3.csv";
    $fp = fopen( $filename , "r");
    while( $data = fgetcsv($fp) ){
        echo "<span style='font-size: 13px;'><b>".$data[0].'</b></span><br>';
        echo $data[2].' ';
        echo "<span style='font-size: 11px; text-align:right;'>  ".$data[1]." ".$data[3].'</span>';
        echo '<br><hr>';
    }
    
    // 投稿した内容
    if(!empty($_POST["name"]) && !empty($_POST["comment"])){
        $filename = "mission3.csv";
        $fp = fopen( $filename , "r");
        $num = count(file($filename));
        fclose($fp);
        
        // CSV用に加工
        $date = date('Y/m/d H:i:s');
        $name = $_POST["name"];
        $comment = $_POST["comment"];
        $post = [
            'id' => $num + 1,
            'name' => $name,
            'comment' => $comment,
            'date' => $date
        ];
    
        $fp = fopen($filename,"a"); 
        
        echo "<span style='font-size: 13px;'><b>".$post['id'].'</b></span><br>';
        echo $post['comment'].' ';
        echo "<span style='font-size: 11px; text-align:right;'> ".$post['name']." ".$post['date'].'</span>';
        echo '<br><hr>';
        
        fputcsv($fp, $post);
        fclose($fp);
    }
        
?>