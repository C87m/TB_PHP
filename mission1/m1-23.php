<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>FizzBuzzフォーム</title>
</head>
<body>
    <form action="" method="post"> <!--フォーム-->
        <input type="text" name="num"> <!--テキスト送信するとstrに格納される-->
        <input type="submit" name="submit"> <!--送信-->
    </form>
    <?php
            $num = $_POST["num"];
            if($num % 3 == 0 && $num % 5 == 0){
                echo "FizzBuzz<br>";
            }elseif($num % 3 == 0){
                echo "Fizz<br>";
            }elseif($num % 5 == 0){
                echo "Buzz<br>";
            }else{
                echo $num."<br>";
            }
    ?>
</body>
</html>