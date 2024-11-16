あいうえお<br>

<?php 
    $greet = "Hello<br>";
    echo $greet;
    $greet = "World<br>";
    echo $greet;
    $name ="<名前>";
    //結合は"."でやる
    echo $name."さんこんにちは！<br>"
?>

あいうえお<br>

<?php
    $number = 5;
    echo $number;
    echo "<br>";
    $number = "かきくけこ";
    echo $number ;
    echo "<br>";
    
    $a = 3;
    $b = 4;
    $ab = $a * $b;
    echo $ab;
    echo "<br>";
    echo $a * $b;
    echo "<br>";
    
    $num = 5;
    echo $num;
    echo "<br>";
    $num = $num + 10;
    echo $num;
    echo "<br>";
    echo "This is ".$num;
    echo "<br>";
    
    $c = 6;
    $d = 2;
    $add = $c + $d;
    $sub = $c - $d;
    $mul = $c * $d;
    $div = $c / $d;
    $mod = $c % $d;
    echo $add;
    echo "<br>";
    echo $sub;
    echo "<br>";
    echo $mul;
    echo "<br>";
    echo $div;
    echo "<br>";
    echo $mod;
    echo "<br>";
    
    $date = date("Y/M/D H:i:s");
    echo $date;
    echo "<br>";
    
    var_dump(true);
    echo "<br>";
    var_dump(false);
    echo "<br>"; 
    $num = 4;
    var_dump($num == 4);
    echo "<br>"; 
    var_dump($num != 4);
    echo "<br>"; 
    
    if($num % 3 == 0 && $num % 5 == 0){
        echo "FizzBuzz<br>";
    }elseif($num % 3 == 0){
        echo "Fizz<br>";
    }elseif($num % 5 == 0){
        echo "Buzz<br>";
    }else{
        echo $num."<br>";
    }
    
    $items = array( "キャベツ","レタス","ハクサイ","ホウレンソウ","コマツナ" );
    // 配列の要素を表示
    echo $items[0] . "<br>";
    echo $items[1] . "<br>";
    echo $items[2] . "<br>";
    echo $items[3] . "<br>";
    echo $items[4] . "<br>";
    
    for($i = 0; $i < 7; $i++){
        echo "こんばんは！<br>";
    }
    
    $colleague = ["Ken", "Alice", "Judy", "BOSS", "Bob"];
    foreach($colleague as $name){
        if($name == "BOSS"){
            echo "Good morning ".$name."<br>";
        }else{
            echo "Hi! ".$name."<br>";
        }
    }
    
    $i = 0;
    while($i < count($colleague)){
        echo $colleague[$i]." is at work.<br>";
        $i++;
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
?>