Kali 2017更新源

```
一、添加更新源
leafpad /etc/apt/sources.list

二、国内更新源
#auto 
deb http://http.kali.org/kali kali-rolling main non-free contrib
中科大 deb http://mirrors.ustc.edu.cn/kali kali-rolling main non-free contrib deb-src http://mirrors.ustc.edu.cn/kali kali-rolling main non-free contrib
浙大 deb http://mirrors.zju.edu.cn/kali kali-rolling main contrib non-free deb-src http://mirrors.zju.edu.cn/kali kali-rolling main contrib non-free
东软大学 deb http://mirrors.neusoft.edu.cn/kali kali-rolling/main non-free contrib deb-src http://mirrors.neusoft.edu.cn/kali kali-rolling/main non-free contrib
重庆大学 deb http://http.kali.org/kali kali-rolling main non-free contrib deb-src http://http.kali.org/kali kali-rolling main non-free contrib
官方源 #deb http://http.kali.org/kali kali-rolling main non-free contrib #deb-src http://http.kali.org/kali kali-rolling main non-free contrib

三、更新
apt-get clean && apt-get update && apt-get upgrade -y && apt-get dist-upgrade -y 

#linux内核更新
apt-get install linux-headers-$(uname -r)

拓展
apt-get clean //清除缓存索引 
apt-get update //更新索引文件 
apt-get upgrade //更新实际的软件包文件 
apt-get dist-upgrade //根据依赖关系更新
```