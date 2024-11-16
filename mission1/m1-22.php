<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>入力フォームを試す</title>
</head>
<body>
    <form action="" method="post"> <!--フォーム-->
        <input type="text" name="str"> <!--テキスト送信するとstrに格納される-->
        <input type="submit" name="submit"> <!--送信-->
    </form>
    <?php
            $str = $_POST["str"];
            echo $str;
    ?>
</body>
</html>