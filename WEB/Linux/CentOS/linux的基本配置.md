# linux的基本配置



### 网卡默认连接

位置：
>cat /etc/sysconfig/network-scripts/ifcfg-'network card'

修改项：
>ONBOOT="yes"

修改命令：
> set -i '$#NOBOOT=yes#ONBOOT=no#g' /etc/sysconfig/network-scripts/ifcfg-ens33


注：
>no 的时候每次开机都需要 ifup 'network card' 才能连网<br>
yes 的时候开机自动连网


