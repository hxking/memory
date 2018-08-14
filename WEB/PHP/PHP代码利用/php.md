
## $_SERVER["PHP_SELF"]
```
$_SERVER["PHP_SELF"] 变量能够被黑客利用！
<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
http://locahost.com/index.php/%22%3E%3Cscript%3Ealert('hacked')%3C/script%3E
防御
通过使用 htmlspecialchars() 函数能够避免 $_SERVER["PHP_SELF"] 被利用。
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
```