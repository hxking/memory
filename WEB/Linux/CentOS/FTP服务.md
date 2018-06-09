# FTP服务：文件传输协议，上传、下载

- 互联网最开始的三个服务：
1. www 服务
2. FTP 服务
3. 邮件服务

## 安装ftp
### 安装 ftp ，linux 的 ftp软件叫做 vsftpd
> yum install vsftpd -y


## FTP连接端口：
> 控制连接: TCP 21,用于发送FTP命令信息 <br>
> 数据连接: TCP 20,用于上传、下载数据<br>
*这是主动模式的情况，被动的时候 控制连接21端口 开启，数据连接端口随机*


## FTP分为被动和主动模式

1. 主动模式：服务器从20端口主动向客户端发起连接<br>
**没写错，是20端口。是登录后，服务器才用20端口发起连接**

2. 被动模式：服务器在指定的范围内某个端口被动等待客户端连接

## FTP服务器程序
> vsftpd

## vsftpd服务的伪用户是：ftp

## 配置文件
- 主配置文件
  - /etc/vsftpd/vsftpd.conf
- 用户控制列表文件
  - /etc/vsftpd/ftpusers
  - /etc/vsftpd/user_list

## FTP登录用户
- 匿名用户
    - anonymous或ftp ,密码随意，只要包涵 @ 符就可以
- 本地用户
    - 使用Linux系统用户和密码
- 虚拟用户
    -  管理员自定义的模拟用户

## FTP默认配置文件
1. 允许匿名用户登陆
>  anonymous_enable=YES
2. 允许本地用户登陆
> local_enable=YES
3. 允许本地用户上传
> write_enable=YES
4. 本地用户上传umask值
> local_umask=022
5. 用户进入日录时，显示message文件中信息
> dirmessage.enable=YES
6. 指定信息文件
> message_file=.message
7. 激活记录日志
> xferlog_enable=YES
8. 主动模式数据传输接口
> connect_from_port_20=YES
9. 使用标准的ftP日志格式
> xferlog_std_format=YES
10. 登陆欢迎信息
> ftpd_banner
11. 允许被监听
> listen=YES   
12. 设置PAM外挂模块提供的认证服务所使用的配置文件名，即/etc/pam.d/vsftpd文件
> pam_service_name=vsftpd
13. 用户登陆限制
> uscrlist_cnablc=YES
14. 是否使用tcp_wrappers作为主机访问控制方式
> tcp_wrappers=YES 

## 常用的全局配置
1. 设置监听的IP地址
listen_address=192.168.4.1
2. 设置监听FTP服务的端口号
> listen_port=21
3. 是否允许下载文件
> download_enable=YES
4. 限制并发客户端连接数
> max_clients=0
5. 限制同一IP地址的并发连接数
> max_per_ip=0

## 被动模式配置:最少大于一万
1. 开启被动模式
> pasv_enable= YES
2. 被动模式最小端口
> pasv_min_port=24500
3. 被动模式最大端口
> pasv_max_port=24600
  
## 安全配置
1. 被动模式，连按超时时间
> accept_timeout=60
2. 主动模式，连接超时时间
> connect_timeout=60
3. 600秒没有任何操作就断开连接
> idle_session_timeout=600
4. 资料传输时，超过500秒没有完成，就断开传输
> data_connection_timeout=500

## vsftp 客户端使用命令
1. 连接ftp
> ftp ip
2. 获取帮助
> help
3. 下载
> get
4. 下载一批文件
> mget
5. 上传
> put
6. 上传一批文件
> miput
7. 退出
> exit

## 使用文件夹登录ftp
> ftp://用户名@ip

## 匿名用户配置:还要注意一下权限问题
1. 允许匿名用户访问
> anonmous_enable
2. 允许匿名用户上传
> anon_upload_enable
3. 允许匿名用户建立目录
> anon_mkdir_write_enable=YES
4. 设置上传的默认文件权限(默认是600)
> anon_umask

## 普通用户配置
1. 允许本地用户登陆
> local_enable=YES
2. 允许本地用户上传
> write_enable=YES
3. 允许本地用户上传
> local_umask=022
4. 设置本地用户的FTP根目录(注意目录权限),针对所有用户
> local_root=/var/ftp
5. 限制最大传输速率(字节/秒)
> local_max_rate=0
6. **重要：开启用户目录限制(只开启此行，会把所有用户都限制在用户主目录中)**
> chroot_local_user=YES
7. 写入/etc/vsftpd/chroot_list文件中的用户可以访问任何目录，其他用户限制在用户主目录
> chroot_local_user=YES <br>
> chroot_list_enable=YES <br>
> chroot_list_file=/etc/vsftpd/chroot_list <br>

## 用户访问控制
1. 用户访问控制列表文件
  - /etc/vsftpd/ftpusers
  - /etc/vsftpd/user_list
2. 开启用户访问控制
> userlist_enable=YES
3. 写入/etc/vsftpd/user_list 文件中的用户不能访问ftp服务器，没有写入的用户可以访问(默认就是如此),这俩句配置默认是没有的，需要自己写入
> userlist_deny=YES
> userlist_file=/etc/vsftpd/user_list
4. 修改（3），把 user_list文件反转成白名单，写入/etc/vsftpd/user_list 文件中的用户可以访问ftp服务器，没有写入的用户不能访问
> userlist_deny=NO

## 配置虚拟用户
- 配置虚拟用户登陆的步骤
1. 添加虚拟用户口令文件,文件名随意，一行用户名，一行密码
- vi /etc/vsftpd/vuser.txt <br>
    >  cangls #用户名<br>
    123 #密码<br>
    bols #用户名<br>
    123 #密码<br>

2. 生成虚拟用户口令认证文件
- 如果没有安装口令认证命令，需要安装
> yum-y install db4-utils
- 把文本文档转变为认证的数据库
> db_load　-T　-t　hash　-f　/etc/vsftpd/vuser.txt　/etc/vsftpd/vuser.db

3. 文件编辑vsftpd的PAM认证文件
- vi /etc/pam.d/vsftpd
> auth required /lib/security/pam_userdb.so db=/etc/vsftpd/vuser <br>
> account required /lib/security/pam_userdb.so db=/etc/vsftpd/vuser <br>

*#注释掉其他的行，加入此两行即可。注释掉其他行，可以禁止本地用户登陆，因为本地用户登陆时的验证依然依赖这个文件*

4. 建立本地映射用户并设置宿主目录权限
- 此用户不需要登陆，只是映射用户,用户名必须和下一步配置文件中一致
> useradd -d /home/ftproot -s /sbin/nologin vuser <br>
> chmod 755 /home/vftproot

5. 修改配置文件
- vi /etc/vsftpd/vsftpd.conf
    1. 开启虚拟用户
    > guest_enable=YES
    2. FTP虚拟用户对应的系统用户
    > guest_username=vuser
    3. PAM认证文件(默认存在)
    > pam_service_ name=vstftpd

6. 重启vsftpd服务，并测试
> service vsftpd restart

*此时虚拟用户可以登陆，查看，下载,不能上传,默认上传文件的位置是宿主用户的家日录,权限使用的是匿名用户权限进行管理*

7. 调整虚拟用户权限
- vi /etc/vsftpd/vsftpd.conf
> anonymous.enable=NO <br>

*关闭匿名用户登陆，更加安全(不影响虚拟用户登陆)* <br>

> anon_upload_enable=YES <br>
> anon_mkdir_write_enable=YES <br>
> anon_other_write_enable=YES <br>

*给虚拟用户设定权限，允许所有虚拟用户上传*

## 为每个虚拟用户建立自己的配置文件，单独定义权限

1. 指定保存虚拟用户配置文件的目录
- vi /etc/vsftpd/vsftpd.conf
> user_config_dir=/etc/vsftpd/vusers_dir <br>
2. 创建用户配置文件，并配置权限
- vi /etc/vsftpd/vusers_dir/cangls
    - 允许此用户上传
    > anon_upload_ enable=YES <br>
    > anon mkdir write enable=YES <br>
    > anon other write.enable=YES <br>
    - 给cangls指定独立的上传目录
    > local_root=/tmp/vcangls
3. 如果不给bols指定单独的配置文件，则遵守主配置文件(/etc/vsftpd/vsftpd.con)的权限



## 注意事项
1. 关闭防火墙
2. 关闭SELinux


清空防火墙：临时生效
> iptables 　-F <br>
> iptables 　-L <br>

将当前的防火墙状态保存下来
> service　iptables　save

