php日志log

```
//这个方法比较好，用file_put_contents容易内存溢出
<?php
$str = '1.txt';
$line_array = 'nihao';

if(file_exists($str)){
    $f = fopen($str, 'a');//向文件追加新的信息
    fwrite($f, $line_array);//写入信息
    fclose($f);//关闭fopen资源
}else{
    $f = fopen($str, 'w');//打开的文件只能向文件写入。若文件不存在，则建立该文件，文件存在，则将该文件删去，重建一个新文件。
    fwrite($f, $line_array);//写入信息
    fclose($f);//关闭fopen资源
} 

```