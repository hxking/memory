yum仓库

<!-- TOC -->

- [坑：](#坑)
    - [语法](#语法)
    - [基本命令](#基本命令)
    - [常用命令](#常用命令)
    - [选项](#选项)
    - [参数](#参数)
    - [yum仓库的配置文件保存在.](#yum仓库的配置文件保存在)
    - [格式如下:](#格式如下)

<!-- /TOC -->
## 坑： ##
>yum仓库分Red Hat和CentOS，Red Hat 有些软件是收费的，不能随便用。CentOS 免费的



### 语法 ###
>yum (选项) (参数)

### 基本命令
1. 安装指定软件
>yum install software-name
2. 卸载指定软件
>yum remove software-name 
3. 升级指定软件
>yum update software-name
4. 清除yum 缓存
> yum clean all

### 常用命令
1. 通过关键字搜索需要安装的软件
>yum search keyword
2. 列出全部、安装的、最近的、软件更新
>yum list (all、installed、recent、updates)
3. 显示指定的软件信息
>yum info packagename
4. 查询哪个rpm软件包含了目标文件
>yum whatprovides filename



### 选项 ###

>-h：显示帮助信息；<br>
>-y：对所有的提问都回答“yes”；<br>
-c：指定配置文件；<br>
-q：安静模式；<br>
-v：详细模式；<br>
-d：设置调试等级（0-10）；<br>
-e：设置错误等级（0-10）；<br>
-R：设置yum处理一个命令的最大等待时间；<br>
-C：完全从缓存中运行，而不去下载或者更新任何头文件。

### 参数

>install：安装rpm软件包；<br>
update：更新rpm软件包；<br>
check-update：检查是否有可用的更新rpm软件包；<br>
remove：删除指定的rpm软件包；<br>
list：显示软件包的信息；<br>
search：检查软件包的信息；<br>
info：显示指定的rpm软件包的描述信息和概要信息；<br>
clean：清理yum过期的缓存；<br>
shell：进入yum的shell提示符；<br>
resolvedep：显示rpm软件包的依赖关系；<br>
localinstall：安装本地的rpm软件包；<br>
localupdate：显示本地rpm软件包进行更新；<br>
deplist：显示rpm软件包的所有依赖关系。<br>


### yum仓库的配置文件保存在.
>/etc/yum.repos.d/
### 格式如下:
>[LinuxCast]<br>
  name = This is LinuxCast.net rpm soft repo<br>
  baseurl =  yum源的url<br>
  enabled=I <br>
  gpgcheck=; <br>

**仓库可以使用file、http、ftp、nfs方式.<br>
yum配置文件必须以.repo结尾<br>
一个配置文件内可以保存多个仓库的配置信息<br>
/etc/yum.repos.d/ 目录下可以存在多个配置文件**