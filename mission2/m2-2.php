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
    if($comment == "完成"){
        echo "お疲れ様！";
    }else{
        echo $_POST["comment"]." を受け付けました";
    }
    $fp = fopen("mission2.txt","w"); //ファイル
    fwrite($fp, $comment.PHP_EOL);
    fclose($fp);
}

?>