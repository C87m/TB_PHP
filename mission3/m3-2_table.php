<?php
    $filename = "member.csv" ;
    $fp = fopen( $filename , "r");

    echo '<table border="1">
          <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Mail</th>
          <th>Password</th>
          </tr>'; 

    //ループ：while文でCSVファイルのデータを1つずつ繰り返し読み込む
    while($data = fgetcsv($fp)){
        // テーブルセルに配列の値を格納
        echo '<tr>';
        echo '<td>'.$data[0].'</td>';
        echo '<td>'.$data[1].'</td>';
        echo '<td>'.$data[2].'</td>';
        echo '<td>'.$data[3].'</td>';
        echo '</tr>';
    } 

    //ループ後：テーブルの閉じタグを付ける
    echo '</table>';
?>