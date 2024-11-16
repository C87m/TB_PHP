<!--投稿フォームをつくり、送受信-->

<!DOCTYPE html>
<html>
    <form action="" method="post" > <!--action フォームの送信先 method="get"検索"post"保存-->
        <!--フォームの部品-->
        <input type="text" name="comment" placeholder="コメント"> <!--type="text"テキスト"email"メアド"submit"ボタン-->
        <input type="submit" value="送信">
    </form>
</html>

<?php
if(!empty($_POST["comment"])){
    $comment = $_POST["comment"];
    echo "<span style='color:red'><b>".$_POST["comment"]." </b>を受け付けました</span><br>";
    $fp = fopen("m2-4.txt","a"); //ファイル
    fwrite($fp, $comment.PHP_EOL);
    fclose($fp);
    
    if( file_exists( "m2-4.txt" ) ){
            // ファイルの内容を、変数 $lines に1行1要素の配列として定義
            $comments = file("m2-4.txt", FILE_IGNORE_NEW_LINES ); 
            foreach($comments as $line){
                echo $line."<br>";
            }
    }
}else{
    if( file_exists( "m2-4.txt" ) ){
            // ファイルの内容を、変数 $lines に1行1要素の配列として定義
            $comments = file("m2-4.txt", FILE_IGNORE_NEW_LINES ); 
            foreach($comments as $line){
                echo $line."<br>";
            }
    }
    
}

?>