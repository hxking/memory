# 常用的基本命令

## 用户管理命令

1.  useradd 命令
>useradd 命令用于创建新的用户，格式为“ useradd [选项] 用户名 ”。

2.  groupadd 命令
>groupadd 命令用于创建用户组，格式为“ groupadd [选项] 群组名 ”。

3.  usermod 命令
>usermod 命令用于修改用户的属性，格式为“ usermod [选项] 用户名 ”。

4.  passwd 命令
>passwd 命令用于修改用户密码、过期时间、认证信息等，格式为“ passwd [选项] [用户名] ”。

5.  userdel 命令
>userdel 命令用于删除用户，格式为“ userdel [选项] 用户名 ”。

6.  chattr 命令
>chattr 命令用于设置文件的隐藏权限，格式为“ chattr [参数] 文件 ”。

7. lsattr 命令
>lsattr 命令用于显示文件的隐藏权限，格式为“ lsattr [参数] 文件 ”。

8. whatis 命令
> whatis 命令用于查看命令的简单描述，格式为“ whatis 命令 ”

## 文件预览命令

9. cat 命令
> cat 命令用于查看文件内容，格式为“ cat 文件 ”

10. more 命令
> more 命令以翻页形式查看文件内容(只能向下翻页),格式为“ more 文件 ”

11. less 命令
> less 命令以翻页形式查看文件内容(可上下翻页)，格式为“ less 文件 ”

12. head 命令
> head 命令查看文件的开始10行(或指定行数)，格式为“ head 文件 ”

13. tail 命令
> tail 命令查看文件的结束10行(或指定行数),格式为“ tail 文件 ”

14. grep 命令
> grep 命令基于关键字对文件内容进行搜索，格式为“ grep [关键字] 文件 ”

15. find 命令
> find 命令用来在指定目录下查找文件，格式为“ find 路径 [参数] [关键字] ”

16. cut 命令
> cut 命令基于列处理文本内容，格式为“ cut -f 1 文件 ”

17. wc 命令
> wc 命令用来统计文本信息，格式为“ wc 文件 ”

18. sort 命令
> sort 命令对文件进行排序，格式为“ sort 文件 ”

19. diff 命令
> diff 命令进行文本比价，格式为“ sort 文件1 文件2 ”

20. tr 命令
> tr 命令可以对来自标准输入的字符进行替换、压缩和删除。

21. sed 命令
> sed 命令搜索并替换文本

文件处理命令：
ls mkdir cd pwd rmdir cp mv rm touch cat more less head tail ln

权限管理命令：
修改权限 ：chmod  修改所有者 ：chown 修改所有组：chgrp 显示设置新建文件权限：umask 命令用于修改用户的属性:usermod 

文件搜索命令
文件搜索： find  文件搜索(自己建立资料库)：locate updatedb（更新locate资料库） 搜索命令所在目录：which  列出命令所在位置和帮助文档：whereis
 查找文件内容：grep

帮助命令：
man 查看命令的简单描述:whatis 查看配置文件的描述：apropos  查看内容命令：help

用户管理命令：
useradd  passwd  查看都谁在登录：who  登录信息：w 系统信息：uptime

压缩解压：
gzip gunzip  .gz文件压缩，只能压缩文件，并不保留源文件，
tar -zcvf 压缩  tar -zxvf 解压
zip unzip bzip2 bunzip

网络命令：
write wall ping ifconfig mail last lastlog traceroute netstat setup mount

关机重启：
shutdown reboot runlevel logout