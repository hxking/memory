## 绕过方法
```
Pass-01
前端禁用JS，直接上传Webshell
Pass-02
截断上传数据包，修改Content-Type为image/gif，然后放行数据包
Pass-03
重写文件解析规则绕过。上传先上传一个名为.htaccess文件，内容如下：
Pass-04
方法同Pass-03, 重写文件解析规则绕过
Pass-05
文件名后缀大小写混合绕过。05.php改成05.phP然后上传
Pass-06
利用Windows系统的文件名特性。文件名最后增加点和空格，写成06.php.，上传后保存在Windows系统上的文件名最后的一个.会被去掉，实际上保存的文件名就是06.php
Pass-07
原理同Pass-06，文件名后加点，改成07.php.
Pass-08
Windows文件流特性绕过，文件名改成08.php::$DATA，上传成功后保存的文件名其实是08.php
Pass-09
原理同Pass-06，上传文件名后加上点+空格+点，改为09.php. .
Pass-10
双写文件名绕过，文件名改成10.pphphp
Pass-11
上传路径名%00截断绕过。上传的文件名写成11.jpg, save_path改成../upload/11.php%00，最后保存下来的文件就是11.php
Pass-12
原理同Pass-11，上传路径0x00绕过。利用Burpsuite的Hex功能将save_path改成../upload/12.php【二进制00】形式
Pass-13
绕过文件头检查，添加GIF图片的文件头GIF89a，绕过GIF图片检查。
使用命令copy normal.jpg /b + shell.php /a webshell.jpg，将php一句话追加到jpg图片末尾，代码不全的话，人工补充完整。形成一个包含Webshell代码的新jpg图片，然后直接上传即可。
Pass-14
原理和示例同Pass-13，添加GIF图片的文件头绕过检查
Pass-15
原理同Pass-13，添加GIF图片的文件头绕过检查
Pass-16
原理：将一个正常显示的图片，上传到服务器。寻找图片被渲染后与原始图片部分对比仍然相同的数据块部分，将Webshell代码插在该部分，然后上传。具体实现需要自己编写Python程序，人工尝试基本是不可能构造出能绕过渲染函数的图片webshell的。
Pass-17
利用条件竞争删除文件时间差绕过。使用命令pip install hackhttp安装hackhttp模块，运行下面的Python代码即可。如果还是删除太快，可以适当调整线程并发数。
Pass-18
刚开始没有找到绕过方法，最后下载作者Github提供的打包环境，利用上传重命名竞争+Apache解析漏洞，成功绕过。
上传名字为18.php.7Z的文件，快速重复提交该数据包，会提示文件已经被上传，但没有被重命名。
Pass-19
原理同Pass-11，上传的文件名用0x00绕过。改成19.php【二进制00】.1.jpg