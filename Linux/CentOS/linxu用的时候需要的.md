
关闭防火墙：
systemctl stop firewalld


## httpd常用命令

查看httpd的进程：
ps -ef | grep httpd

查看httpd的运行状态
service httpd status

停止httpd
service httpd stop

启动httpd
```
service httpd start
报错：Redirecting to /bin/systemctl start httpd.service
执行：/bin/systemctl start httpd.service


## mariadb 常用命令
启动服务
systemctl start mariadb.service

添加到开机启动
systemctl enable mariadb.service

## php配置php_pdo_mysql模块
1. yum install php-pdo_mysql
