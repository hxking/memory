## ssh 默认安装的，加密传送的，比较安全
 - 默认端口：22
 - linux中的守护进程是：sshd
 - 安装服务是：OpenSSH
 - 服务端主程序：/usr/sbin/sshd
 - 客户端主程序：/usr/bin/ssh
 - 服务端的配置文件：/etc/ssh/sshd_config
 - 客户端的配置文件：/etc/ssh/ssh_config

### 服务端的基本配置：
> Port 22  　　　　　　　　　　　　　　　 端口 <br>
ListenAddress 0.0.0.0  　　　　　　　　　监听的IP  　0是监听所有<br>
Protocol 2  　　　　　　　　　　　　　　SSH版本选择 <br>
HostKey /etc/ssh/ssh_host_rsa_key  　　　 私钥保存位置<br>
ServerKeyBits 1024  　　　　　　　　　　私钥的位数 <br>
SyslogFacility AUTH  　　　　　　　　  　日志记录SSH 登陆情况<br>
LogLevel INFO   　　　　　　　　　　　　日志等级<br>
GSSAPIAuthentication yes  　　　　　　　 GSSAPI 认证开启

1. GSSAPI 认证开启
> GSSAPI 认证开启 去寻找 dns 解析，如果没有dns 登录的时候会异常缓慢，建议关闭，这个是默认开启的，关闭的时候应该去关闭客户端的，而不是去修改服务器端的

### 服务端的安全配置
> PermitRootLogin yes　　　　允许root的ssh 登陆　<br>
PubkeyAuthentication yes　　是否使用公钥验证　<br>
AuthorizedKeysFile　.ssh/authorize _keys　　  公钥的保存位置　<br>
PasswordAuthentication yes 　 允许使用密码验证登陆　<br>
PermitEmptyPasswords no 　　 不允许空密码登陆

1.　一般不允许root的ssh 登陆

### SSH 命令
>登录：　　ssh 用户名@IP <br>
第一次登录的下载非对称加密公钥，以后就不用了

### SCP 远程复制命令
> 下载：　scp　用户名@远程ip:/文件位置　　复制到本地的位置 <br>
  上传：　scp -r 本地的文件　用户名@远程ip:/复制到的位置<br>
下载:　　scp　root@192.168.44.2:/root/test.txt　.　<br>
上传:　　scp　-r　/root/123/　root@192.168.44.2/root

###　Sftp文件传送
>  sftp　root@192.168.4.2
  ls　查看服务器端数据<br>
  cd　切换服务器端目录<br>
  lls　查看本地数据<br>
  lcd　切换本地目录<br>
  get　下载<br>
  put　上传<br>

### 不用密码的钥匙对登录比较安全，++


**有一个对称加密和非对称加密知识点。pgp和gpg ，win和linux上的非对称加密工具， ssh采用的是类似的非对称加密**