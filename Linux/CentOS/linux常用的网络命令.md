# linux常用的网络命令

1. 查看配置网络状态命令：
> ifconfig

2. 查看或设置主机名命令
> hostname　[主机名]

3. 关闭网卡：禁止该网卡设备
> ifdown　网卡设备名

4. 启动网卡：启动该网卡设备
> ifup　网卡设备名

5. 查询网络状态
> netstat [选项] <br>
选项：<br>
-t　：　列出TCP协议端口<br>
-u　：　列出UDP协议端口<br>
-n　：　不使用域名与服务器名，而使用IP地址和端口号<br>
-l　：　仅列出在监听状态网站服务<br>
-a　：　列出所有网络连接<br>
-r　:　 列出路由列表，功能和route命令一致

6. 查看路由列表：可以看到网关
> route　-n

7. 域名解析命令
> nslookup　[主机名或IP]

8. 探测指定域名或IP的网络状况
> ping　 [选项] 　IP或域名 <br>
选项：　-c 　：　指定ping包的次数

9. 远程管理与端口探测命令
> telnet 　[域名或IP]　[端口]

10. 路由跟踪命令
>  traceroute　 [选项] 　IP或域名<br>
选项: 　-n　：  使用IP，不使用域名，速度更快 <br>
**windows　的相同功能的命令是　tracert**　

11. 网络下载命令
> wget　[要下载文件的地址]

配置主机名的文件：vi /etc/sysconfig/network