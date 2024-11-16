<?php
    $filename = "member.csv" ;
    $fp = fopen( $filename , "r");
    
    while( $data = fgetcsv($fp) ){
        // 配列の値を表示
        echo $data[0].' ';
        echo $data[1].' ';
        echo $data[2].' ';
        echo $data[3].' ';
        echo '<br>';
    }


?>