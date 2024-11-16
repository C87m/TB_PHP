<?php
    // id,name,email,password
    $users = [
        [
            'id' => 1,
            'name' => 'Aさん',
            'email' => 'aaa@a.com',
            'password' => 'aaaaa'
        ],
        [
            'id' => 2,
            'name' => 'Bさん',
            'email' => 'bbb@b.com',
            'password' => 'bbbbb'
        ],
        [
            'id' => 3,
            'name' => 'Cさん',
            'email' => 'ccc@c.com',
            'password' => 'ccccc'
        ],
    ];
    
    
    // cSVファイル作成
    $filename = 'member.csv';
    $fp = fopen( $filename, 'w');
    
    foreach ($users as $line) {
        // csvフォーマットで書き出しする
        fputcsv($fp, $line);
    }
    
    fclose($fp);
    
    // ファイル書き込み
    
    $user = [
        'id' => 4,
        'name' => 'Dさん',
        'email' => 'ddd@d.com',
        'password' => 'ddddd'
    ];
    
    $filename = 'member.csv';
    //ファイルを'a'モードで開く（追記）
    $fp = fopen( $filename, 'a');
    
    fputcsv($fp, $user);
    
    fclose($fp);
    
    
?>