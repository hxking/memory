```
Nmap:Network Mapper("网络映射器"),是一款网络扫描和嗅探工具包。Nmap是不局限于仅仅收集信息和枚举，同时可以用来作为一个漏洞探测器或安全扫描器。它是网络管理员必用的软件之一，以及用以评估网络系统保安。它可以适用于winodws,linux,mac等操作系统.

功能：基本功能有三个，一是探测一组主机是否在线；其次是扫描 主机端口，嗅探所提供的网络服务；还可以推断主机所用的操作系统 。

查看nmap版本号： nmap --version
------------------------------------------
用法：nmap [扫描类型] [设置] {目标地址}
目标地址：  可以传递主机名，IP地址，网络等.  例如：scanme.nmap.org，microsoft.com/24,192.168.0.1; 10.0.0-255.1-254

-iL <文件名>: 通过文件输入地址
-iR <IP地址数目>
--exclude <host1[hos2..>: 排除主机或者网段
--exclude <exclude_file>: 排除文件中的地址

------------------------------------------
Nmap输出的格式参数:
命名中使用时间%H,%M,%S,%m,%d,%y

Nmap输出的格式
A.-oN <文件名字>
B.-oX <文件名字>
C.-oS <文件名字>
D.-oG <文件名字>
E.-oA <文件基础名字>

输出详细和调试设置：
1.-V （最多 -VVV）
2.-d[0~9]
3.--reason
4.--packet-trace
5.--open
6.--iflist
7.--log-errors
--------------------------------------------
其他输出设置项
--append-output
--resume< 文件名>
--stylesheet<路径或者URI地址>
--webxmI(导入从Nmap.org 下载的stylesheet)

-------------------------------------------
命令行参数
Ping的类型：
1.-sL(List Scan).不做扫描，只完成DNS解析和网址的转换。
2.-sP(Ping Scan).默认发ICMP echo请求和TCP的ACK请求80端口。
3.-PN(不用ping).
4.-PS<端口号列表> (TCP SYN Ping).发TCP协议SYN标记的空包。默认扫描80端口
5.-PA<端口列表> (TCP ACK Ping).发TCP协议ACK标记的空包。默认扫描80端口
6.-PU<端口列表>(UDP Ping).默认31338
7.-PE;-PP;-PM(ICMP Ping)
8.-PO<协议列表> (IP协议ping )
9.-PR(ARP ping)

其他设置项：
1.--traceroute
2.-n (不要做DNS解析)
3.-R( DNS解析所有的地址,默认不解析不在线的IP )
4.-system-dns (使用系统DNS )
5.--dns-servers <server1> [<server2>..](使用其他DNS)
-----------------------------------------------
指定端口扫描：
-p<端口列表>
-----------------------------------------------
扫描结果：
1.Open,端口开启，有程序监听此端口
2.Closed,端口关闭，数据能到达主机，但是没有程序监听此端口。
3.Filtered,数据未能到达主机。
4.Unfiltered,数据能到达主机，但是Nmap无法判断端口开启还是关闭。
5.Open|filtered,端口没有返回值，主要出现在UDP,IP,FIN,NULL和Xmas扫描
6.Closed|filtered,只出现在IP ID idle 扫描。





```