<!--フォームに入力された数値をテキストファイルに書き込み-->

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_1-27</title>
</head>
<body>
<a href="">リセット</a><br>
    <form action="" method="post">
        <input type="text" name="str" placeholder="何か入力">
        <input type="submit" name="submit" value="送信" >
    </form>
<br>

<?php
    if( isset( $_POST["str"] ) ){
        $str = $_POST["str"];
            
        $fp = fopen("m_127.txt","a");
        fwrite($fp, $str.PHP_EOL);
        fclose($fp);
        
        if( file_exists( "m_127.txt" ) ){
            // ファイルの内容を、変数 $lines に1行1要素の配列として定義
            $lines = file("m_127.txt", FILE_IGNORE_NEW_LINES ); 

            // 配列の内容でループ
            foreach( $lines as $line ){
                if($line % 3 == 0 && $line % 5 == 0){
                    echo "FizzBuzz<br>";
                }elseif($line % 3 == 0){
                    echo "Fizz<br>";
                }elseif($line % 5 == 0){
                    echo "Buzz<br>";
                }else{
                    echo $line."<br>";
                }
            }
        }
    }
    ?>

</body>
</html>