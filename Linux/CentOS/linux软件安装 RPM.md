# linux软件安装 RPM



### rpm
>rpm命令是RPM软件包的管理工具。rpm原本是Red Hat Linux发行版专门用来管理Linux各项套件的程序，由于它遵循GPL规则且功能强大方便，因而广受欢迎。逐渐受到其他发行版的采用。RPM套件管理方式的出现，让Linux易于安装，升级，间接提升了Linux的适用度。
#### 语法
>rpm (选项) (软件包)

#### 安装rpm软件包
>rpm -ivh 软件包名

#### 卸载rpm软件包
>rpm -e 软件名

#### 升级rpm软件包
>rpm -Uvh  软件名

#### 还可以通过http、ftp协议安装
>rpm -ivh http://rpm软件的路径

#### 列出所有安装的rpm软件
>rpm -qa  
#### 查询目标文件属于那个rpm包
>rpm -qf filename  
#### 查询指定已安装rpm软件的信息
>rpm -qi packagename  
#### 查询指定已安装rpm软件包含的文件
>rpm -ql packagename 
#### 查询未安装 rpm文件的信息
>rpm -qip software.rpm
#### 查询未安装rpm文件包含的文件
> rpm-qlp software.rpm

#### rpm验证
>验证一般使用非对称加密算法，所以需要一个秘钥<br/>
验证未安装的rpm文件:<br/>
rpm -K software.rpm<br/>
验证已安装的软件:<br/>
rpm -V software<br/>
如果没有密钥需要导入秘钥 : rpm --import RPM-GPG-KEY-Cent0S-6（具体导入密钥命令百度）


#### 选项
>-a：查询所有套件；<br/>
-b<完成阶段><套件档>+或-t <完成阶段><套件档>+：设置包装套件的完成阶段，并指定套件档的文件名称；<br/>
-c：只列出组态配置文件，本参数需配合"-l"参数使用；<br/>
-d：只列出文本文件，本参数需配合"-l"参数使用；<br/>
-e<套件档>或--erase<套件档>：删除指定的套件；<br/>
-f<文件>+：查询拥有指定文件的套件；<br/>
-h或--hash：套件安装时列出标记；<br/>
-i：显示套件的相关信息；<br/>
-i<套件档>或--install<套件档>：安装指定的套件档；<br/>
-l：显示套件的文件列表；<br/>
-p<套件档>+：查询指定的RPM套件档；<br/>
-q：使用询问模式，当遇到任何问题时，rpm指令会先询问用户；<br/>
-R：显示套件的关联性信息；<br/>
-s：显示文件状态，本参数需配合"-l"参数使用；<br/>
-U<套件档>或--upgrade<套件档>：升级指定的套件档；<br/>
-v：显示指令执行过程；<br/>
-vv：详细显示指令执行过程，便于排错。<br/>