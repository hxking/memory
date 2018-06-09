```

<script> </script>
JavaScript是一种小型的、轻量级的、面向对象的、跨平台的客户端脚本语言。
JavaScript是嵌入到浏览器软件当中的去的，只要你的电脑有浏览器就可以执行JS程序了。
JavaScript是一种面向对象的程序语言。

客户端输出方法：
    confirm()：弹出一个确认对话框。如果单击“确定按钮”返回true，如果单击“取消”返回false。
    close()：关闭窗口
    print()：打印窗口

    document.write(str);输出
    window.alert(str);弹出
    window.prompt();弹出输入框
变量的数据类型: 值是什么类型的，变量就是什么类型的。
    JS中变量的类型有：数值型、字符型、布尔型、undefined、null、array、object、function
        变量的数据类型，分两大类：
            基本数据类型：数值型、字符型、布尔型、未定义型、空型。很显著的特点：一个变量名只能存一个值。
            复合数据类型：数组、对象、函数。显著的特点：一个变量名，可能存多个值。
    1、数值型：数值型包括：整型、浮点型、NaN。
        可以进行算术运算的(加、减、乘、除)
            NaN:(数值型中还有一个很特殊的值NaN。NaN(not a number)不是一个数字。当将其它数据类型，转成数值型，转不过去，但程序又不能报错，这时将返回一个NaN的值)。
    2、字符型：用单引号或双引号引起来的一个字符串
    3、布尔型:布尔型又称逻辑型。只有两个值：true(真)、false(假)。
    4、未定义型:当一个变量定义，但未赋值时，将返回未定义型，未定义型的值只有一个undefined。当一个对象的属性不存在，也返回未定义型。
    5、空型:也可以理解为：是一个对象的占位符。
        当一个对象不存在时，将返回空型，空型的值只有一个null。
        如果你想清除一个变量的值的话，可以给赋一个null的值:var a = null; 
    6、数组：一组数的集合，称为“数组”。
        数组元素的值，可以是任何类型。如：字符型、数值型、布尔型、数组型、对象型、函数。
        数组.length  获取数组的长度
    7、函数：是将一段公共的代码进行封装，给它起个名字叫“函数”。
        函数可以一次定义，多次调用。
        函数，可以将常用的功能代码，进行封装。如：用户名的验证、验证码函数、邮箱验证、手机号码验证
        函数的定义格式：
            function functionName([参数1][,参数2][,参数N]...){
                函数的功能代码;
                [return 参数r]
            }
        函数的调用：函数定义是不会执行的，函数必须调用，才会执行。
        函数的参数：形参的个数，类型，要与实参的个数，类型一致；

判断变量的数据类型：typeof()
    typeof()测试的结果返回的是字符串。有一下几种情况： “string” 、 “number” 、 “boolean” 、 “undefined” 、 “object” 、 “function”
    另外：null、对象、数组这三种类型，都将返回 “object”。

JS中的运算符:应该考虑优先级问题
    1、算术运算符：+、-、*、/、%、++、--
    2、赋值运算符：=、+=、-=、*=、/=
    3、字符串运算符：+、+=
    4、比较运算符：>、<、>=、<=、==、!=、===、!==
        比较运算符的运算结果是布尔值(true或false)。
    5、逻辑运算符：&&、||、!
    6、三元运算符： ? :

变量的数据类型转换:变量的类型转换，一般情况是JS自动转换的，但也有些时候需要手动转换。
    1、其它类型转成布尔型:
        Boolean(a);
    2、其它类型转成字符型:
        String(a);
    3、其它类型转成数值型:
        Number(a);
        parseInt(a): 在一个字符串中，从左往右提取整型。如果遇到非整型的内容，则停止，并返回结果。注意：如果第一个字符就是非整数，则立即停止，并返回NaN。
        parseFloat(a):在一个字符串中，从左往右提取浮点型；遇到非浮点型内容，则停止提取，并返回结果。注意：如果第一个字符是非浮点型，则立即停止，并返回NaN。
js判断：
    if条件判断:else if
        if(ture || false){ tore:执行 }else{ false:执行 }

    switch分支语句：case,break,default
        switch(变量){ case 值1:代码1; break; case 值2:代码2; break; default:如果以上条件都不满足，则执行该代码;}
js循环:
    while循环：只要条件成立，就重复不断的执行循环体代码
        while(条件判断){ 如果条件为true，则执行循环体代码 };
    for循环:
        for(变量初始化 ; 条件判断 ;  变量更新){  循环体代码；}

结束语句:
    break语句:中止各种循环
        描述：break语句，用于无条件结束各种循环(退出循环)和switch。
        说明：一般情况下，需要在break语句之前加一个条件判断。换句话说：就是条件成立了，就退出循环。
    continue语句:跳出本次循环
        描述：结束本次循环，而开始下一次循环。continue之后的代码不再执行了。
        说明：一般情况下，需要在continue语句之前加一个条件判断。
    return语句：用于向函数调用者返回一个值，并立即结束函数的运行。
        return用于中止函数的运行。    break用于中止各种循环。

JS内置对象
    String对象：字符串对象，提供了对字符串进行操作的属性和方法。
        length：获取字符串的长度。如：var len = strObj.length
        toLowerCase()：将字符串中的字母转成全小写。如：strObj.toLowerCase()
        toUpperCase()：将字符串中的字母转成全大写。如：strObj.toUpperCase()
        charAt(index)：返回指定下标位置的一个字符。如果没有找到，则返回空字符串。如：strObj.charAt(index)
        indexOf()：返回一个子字符串在原始字符串中的索引值(查找顺序从左往右查找)。如果没有找到，则返回-1。如：strObj.indexOf(substr)
        lastIndexOf()：在原始字符串，从右往左查找某个子字符串。如果没找到，返回-1。如：strObj.lastIndexOf(substr)
        substr()：在原始字符串，返回一个子字符串。如：strObj.substr(startIndex [ , length])
        substring()：在原始字符串，返回一个子字符串。如：strObj.substring(startIndex [ , endIndex])
        split()：将一个字符串转成数组：将一个字符串切割成若干段。返回一个数组。如：：strObj.split(分割号)
        
    Array对象：数组对象，提供了数组操作方面的属性和方法。
        length：动态获取数组长度。如：var len = arrObj.length
        join()：将一个数组转成字符串。返回一个字符串。如：arrObj.join(连接号)
        reverse()：将数组中各元素颠倒顺序。如：arrObj.reverse()
        delete运算符，只能删除数组元素的值，而所占空间还在，总长度没变(arr.length)。
        shift()：删除数组中第一个元素，返回删除的那个值，并将长度减1。
        pop()：删除数组中最后一个元素，返回删除的那个值，并将长度减1。
        unshift()：往数组前面添加一个或多个数组元素，长度要改变。如：arrObj.unshift(“a” , “b” , “c”)
        push()：往数组结尾添加一个或多个数组元素，长度要改变。如：arrObj.push(“a” , “b” , “c”)

    Date对象：日期时间对象，可以获取系统的日期时间信息。
    Date对象的使用，必须使用new关键字来创建，否则，无法调用Date对象的属性和方法。
    注意：必须有：   var dateObject = new Date();
        dateObject.getFullYear()：获取四位的年份。
        dateObject.getMonth()：获取月份，取值0-11。
        dateObject.getDate()：获取几号，取值1-31
        dateObject.getHours()：获取小时数。
        dateObject.getMinutes()：分钟数
        dateObject.getSeconds()：秒数
        dateObject.getMilliseconds()毫秒
        dateObject.getDay()星期
        dateObject.getTime()毫秒值，距离1970年1月1日至今的毫秒值

    Number对象：数值对象。一个数值变量就是一个数值对象。
        toFixed()：将一个数值转成字符串，并进行四舍五入，保留指定位数的小数。如：：numObj.toFixed(n)
    
    Math对象：数学对象，提供了数学运算方面的属性和方法。
        Math对象是一个静态对象，换句话说：在使用Math对象，不需要创建实例。
        Math.PI：圆周率。
        Math.abs()：绝对值。如：Math.abs(-9) = 9
        Math.ceil()：向上取整(整数加1，小数去掉)。如：Math.ceil(10.2) = 11
        Math.floor()：向下取整(直接去掉小数)。如：Math.floor(9.888) = 9
        Math.round()：四舍五入。如：Math.round(4.5) = 5;    Math.round(4.1) = 4
        Math.pow(x,y)：求x的y次方。如：Math.pow(2,3) = 8
        Math.sqrt()：求平方根。如：Math.sqrt(121) = 11
        Math.random()：返回一个0到1之间的随机小数。如：Math.random() = 0.12204467732259783

    Boolean对象：布尔对象，一个布尔变量就是一个布尔对象。(没有可用的属性和方法)
    

BOM和DOM简介：
    BOM：Browser Object Model ,浏览器对象模型。
        BOM主要提供了访问和操作浏览器各组件的方式。
        浏览器组件：
            window(浏览器窗口)
            location(地址栏)
            history(浏览历史)
            screen(显示器屏幕)
            navigator(浏览器软件)
            document(网页)
    

    DOM：Document Object Model，文档对象模型。
        DOM主要提供了访问和操作HTML标记的方式。
        HTML标记：
            图片标记
            表格标记
            表单标记
            body、html标记
            ……


open()方法：打开一个新的浏览器窗口。   var winObj = window.open([url][,name][,options]);
    参数：
        url：准备在新窗口中显示哪个文件。url可以为空字符串，表示显示一个空的页面。
        name：新窗口的名字，该名字给<a>标记的target属性来用。
        options：窗口的规格。
            width：新窗口的宽度
            height：新窗口的高度
            left：新窗口距离屏幕左边的距离
            top：新窗口距离屏幕上边的距离
            menubar：是否显示菜单栏，取值：yes、no
            toolbar：是否显示工具栏。
            location：是否显示地址栏。
            status：是否显示状态栏。
            scrollbars：是否显示滚动条，不能省略s字母。
    返回值：返回一个window对象的变量，可以通过该名称跟踪该窗口。winObj具备window对象的所有属性和方法。


setTimeout()  ：炸弹 ： 时间一到，就执行JS代码一次。
setInterval() ：鞭炮 ： 重复不断的执行JS代码(周期性)。

clearTimeout()：清除延时器id变量；如：window.clearTimeout(timer)
clearInterval()：清除定时器id变量;如：window.clearInterval(timer)


screen屏幕对象：
    Width：屏幕的宽度，只读属性。
    Height：屏幕的高度，只读属性。
    availWidth：屏幕的有效宽度，不含任务栏。只读属性。
    availHeight：屏幕的有效高度，不含任务栏。只读属性。
    
navigator对象：
    appName：浏览器软件名称，主要用来判断客户使用的是什么核心的浏览器。
        如果是IE浏览器的话，返回值为：Microsoft Internet Explorer
        如果是Firefox浏览器的话，返回值为：Netscape
    appVersion：浏览器软件的核心版本号。
    systemLanguage：系统语言
    userLanguage：用户语言
    platform：平台
    
Location地址栏对象：
    href：获取地址栏中完整的地址。可以实现JS的网页跳转。location.href = “http://www.sina.com.cn”;
    host：主机名
    hostname：主机名
    pathname：文件路径及文件名
    search：查询字符串。
    protocol：协议，如：http://、ftp://
    hash：锚点名称。如：#top
    reload([true])：刷新网页。true参数表示强制刷新
    
history对象：
    length：历史记录的个数
    go(n)：同时可以实现“前进”和“后退。”
        history.go(0)  刷新网页
        history.go(-1)  后退
        history.go(1)   前进一步
        history.go(3)   前进三步
    forward()：相当于浏览器的“前进”按钮
    back()：相当于浏览器的“后退”按钮



DOM的分类：
    核心DOM：提供了同时操作HTML文档和XML文档的公共的属性和方法。
    HTML DOM：针对HTML文档提供的专用的属性方法。
    XML DOM：针对XML文档提供的专用的属性和方法。
    CSS DOM：提供了操作CSS的属性和方法。
    Event DOM：事件对象模型。如：onclick、 onload等。


HTML DOM访问HTML元素的方法(最常用)
    getElementById()：查找网页中指定id的元素对象。如：var obj = document.getElementById(id)
    getElementsByTagName(tagName)：查找指定的HTML标记，返回一个数组。如：：var arrObj = parentNode.getElementsByTagName(tagName)

    元素对象的属性：
        tagName：标签名称，与核心DOM中nodeName一样。
        className：CSS类的样式。
        id：同HTML标记id属性一样。
        title：同HTML标记的title属性一样。
        style：同HTML标记的style属性一样。
        innerHTML：包含HTML标记中的所有的内容，包括HTML标记等。
        offsetWidth：元素对象的可见宽度，不带px单位。
        offsetHeight：元素对象的可见高度，不带px单位。
        scrollWidth：元素对象的总宽度，包括滚动条中的内容，不带px单位。
        scrollHeight：元素对象的总高度，包括滚动条中的内容，不带px单位。
        scrollTop：指内容向上滚动上去了多少距离(有滚动条时才有效)，默认值为0
        scrollLeft：指内容向左滚动过去了多少距离(有滚动条时才有效)。
        

style对象： obj.style.什么属性 = "值" ；


Event DOM：事件DOM
    常用事件:
        onscroll：当拖动滚动条时
        onabort 图像加载被中断 
        onblur  元素失去焦点  
        onchange    用户改变域的内容    
        onclick 鼠标点击某个对象    
        ondblclick  鼠标双击某个对象    
        onerror 当加载文档或图像时发生某个错误 
        onfocus 元素获得焦点  
        onkeydown   某个键盘的键被按下   
        onkeypress  某个键盘的键被按下或按住    
        onkeyup 某个键盘的键被松开   
        onload  某个页面或图像被完成加载    
        onmousedown 某个鼠标按键被按下   
        onmousemove 鼠标被移动   
        onmouseout  鼠标从某元素移开    
        onmouseover 鼠标被移到某元素之上  
        onmouseup   某个鼠标按键被松开   
        onreset 重置按钮被点击 
        onresize    窗口或框架被调整尺寸  
        onselect    文本被选定   
        onsubmit    提交按钮被点击 
        onunload    用户退出页面


```