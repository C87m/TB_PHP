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
if(isset($_POST["comment"])){
    echo $_POST["comment"]." を受け付けました";
}

?>