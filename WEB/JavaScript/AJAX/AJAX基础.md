AJAX基础：
```

 AJAX: 
    1、首先先创建一个ajax对象才能使用ajax的方法：
    xhr = new XMLHttpRequest();
    2、创建一个新的http请求协议，设置请求的url，并设置（get || post）方式请求。
    xhr.open('get','./index.php'); ||  xhr.open('post','./index.php');
    3、对象点send  get（null） || post （请求数据）
    xhr.send(null); || xhr.send(请求数据);
    4、判断ajax对象的状态:  0：创建对象； 1：有调用open方法； 2：有调用send方法； 3：只返回一部分数据； 4：数据返回完整。 readyState
    xhr.readyState
    5、onreadystatechange 是ajax的'事件',在readyState状态发生改变的时间被触发
    xhr.onreadystatechange = function(){ alert(readyState); }
    6、responseText  以字符串的形式接收服务器端返回的信息
    xhr.responseText
    6、responseXml  以Xml的形式接收服务器端返回的信息
    xhr.responseXml

例如：
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){ 
        if(xhr.readyState == 4){
            $('#div1').text(xhr.responseText); 
        }
    }
    xhr.open('get','./index.php');
    xhr.send(null);


get方式请求：
    在js中  通过encodeURIComponent()对字符串进行编码 如：( = & 中文)
    mingzi = encodeURIComponent(mingzi);
    xhr.open('get','./index.php?name=mingzi&xingbie=男');

post方式请求：    
    var shuji = 'name=mingzi&xingbie=男';//设置要传送的信息
    //设置以from的形式传递信息，只有设置了，php的post传递的信息才能接收
    xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
    xhr.send(info);

总结：
1. ajax对象创建
var xhr = new XMLHttpRequest();
var xhr = new ActiveXObject(‘Msxml2.XMLHTTP.6.0’);
2. ajax对象成员
a)  属性：responseText、readyState、onreadystatechange
b)  方法：open()、send()、setRequestHeader()
3. get请求和post请求



jquery.ajax:
load()适合做静态文件的异步获取，
$.get()和$.post()合适对于需要传递参数到服务器页面的。

jQuery 采用了三层封装：最底层的封装方法为：$.ajax()，而通过这层封装了第二层有三种方法：.load()、$.get()和$.post()，最高层是$.getScript()和$.getJSON()方法。
load(url , data , Function)：方法是局部方法
三个参数：url(必须，请求 html 文件的 url 地址，参数类型为 String)、data(可选，发送的 key/value 数据，参数类型为 Object)、callback(可选，成功或失败的回调函数，参数类型为函数 Function)。例如：
$('input').click(function () {
    $('#box').load('test.php', { url : 'ycku'  }, function (response, status, xhr) {
        alert('返回的值为：' + response + '，状态为：' + status + '，状态是：' + xhr.statusText);
    });
});

$.get() 和$.post()：是全局方法
$.get()方法有四个参数，前面三个参数和.load()一样，多了一个第四参数 type，即服务器返回的内容格式：包括 xml、html、script、json、jsonp 和 text。第一个参数必选参数，后面三个为可选参数。
$.get() 和$.post()  get方式可以在 'test.php？name=mingzi' 而post不可以，get有三种形式传参，post有俩种
$.post()方法的使用和$.get()基本上一致，他们之间的区别也比较隐晦，基本都是背后的
不同，在用户使用上体现不出。具体区别如下：
1.GET 请求是通过 URL 提交的，而 POST 请求则是 HTTP 消息实体提交的；
2.GET 提交有大小限制（2KB），而 POST 方式不受限制；
3.GET 方式会被缓存下来，可能有安全性问题，而 POST 没有这个问题；
4.GET 方式通过$_GET[]获取，POST 方式通过$_POST[]获取。


$.ajax()：
$.ajax()是所有 ajax 方法中最底层的方法，所有其他方法都是基于$.ajax()方法的封装。
这个方法只有一个参数，传递一个各个功能键值对的对象。

$.ajax()方法对象参数：

url             String              发送请求的地址
type            String              请求方式：POST 或 GET，默认 GET
timeout         Number              设置请求超时的时间（毫秒）
data            Object 或 String    发送到服务器的数据，键值对字符串或对象
dataType        String              返回的数据类型，比如 html、xml、json 等
beforeSend      Function            发送请求前可修改 XMLHttpRequest 对象的函数
complete        Function            请求完成后调用的回调函数
success         Function            请求成功后调用的回调函数
error           Function            请求失败时调用的回调函数
global          Boolean             默认为 true，表示是否触发全局 Ajax
cache           Boolean             设置浏览器缓存响应，默认为 true。如果 dataType 类型为 script 或 jsonp 则为 false。
content         DOM                 指定某个元素为与这个请求相关的所有回调函数的上下文。
contentType     String              指 定 请 求 内 容 的 类 型 。 默 认 为application/x-www-form-urlencoded。
async           Boolean             是否异步处理。默认为 true，false 为同步处理
processData     Boolean             默认为 true，数据被处理为 URL 编码格式。如果为 false，则阻止将传入的数据处理为 URL 编码的格式。
dataFilter      Function            用来筛选响应数据的回调函数。
ifModified      Boolean             默认为 false，不进行头检测。如果为 true，进行头检测，当相应内容与上次请求改变时，请求被认为是成功的。
jsonp           String              指定一个查询参数名称来覆盖默认的 jsonp 回调参数名 callback。
username        String              在 HTTP 认证请求中使用的用户名
password        String              在 HTTP 认证请求中使用的密码
scriptCharset   String              当远程和本地内容使用不同的字符集时，用来设置 script 和 jsonp 请求所使用的字符集。
xhr             Function            用来提供 XHR 实例自定义实现的回调函数
traditional     Boolean             默认为 false，不使用传统风格的参数序列化。如为 true，则使用。

//常规形式的表单提交
$('form input[type=button]').click(function () {
    $.ajax({
        type : 'POST',
        url : 'test.php',
        data : {
            user : $('form input[name=user]').val(),
            email : $('form input[name=email]').val()
        },
        success : function (response, status, xhr) {
            alert(response);
        }
    });
});



表单序列化方法.serialize()，会智能的获取指定表单内的所有元素。这样，在面对大量表单元素时，会把表单元素内容序列化为字符串，然后再使用 Ajax 请求。
//使用.serialize()序列化表单内容
$('form input[type=button]').click(function () {
    $.ajax({
        type : 'POST',
        url : 'test.php',
        data : $('form').serialize(),
        success : function (response, status, xhr) {
            alert(response);
        }
    });
});

.serialize()方法不但可以序列化表单内的元素，还可以直接获取单选框、复选框和下拉列表框等内容。如：男 女 单选框
//使用序列化得到选中的元素内容
$(':radio').click(function () {
    $('#box').html(decodeURIComponent($(this).serialize()));
});


.serialize()方法，还有一个可以返回 JSON 数据的方法：.serializeArray()。这个方法可以直接把数据整合成键值对的 JSON 对象。
$(':radio').click(function () {
    console.log($(this).serializeArray());
    var json = $(this).serializeArray();
    $('#box').html(json[0].value);
});



有时，我们可能会在同一个程序中多次调用$.ajax()方法。而它们很多参数都相同，这个时候我们课时使用 jQuery 提供的$.ajaxSetup()请求默认值来初始化参数。
$('form input[type=button]').click(function () {
    //初始化对象重复的操作： .ajaxSetup  
    $.ajaxSetup({
        type : 'POST',
        url : 'test.php',
        data : $('form').serialize()
    });
    $.ajax({
        success : function (response, status, xhr) {
        alert(response);
        }
    });
});


使用$.param()将对象形式的键值对转为 URL 地址的字符串键值对，可以更加稳定准确的传递表单内容。因为有时程序对于复杂的序列化解析能力有限，所以直接传递 obj对象要谨慎。

jQuery 提供了两个全局事件，.ajaxStart()和.ajaxStop()。这两个全局事件，只要用户触发了 Ajax，请求开始时（未完成其他请求）激活.ajaxStart()，请求结束时（所有请求都结束了）激活.ajaxStop()。

$(document).ajaxStart(function () {
    $('.loading').show();   // 显示提示信息，正在加载，请稍后
    }).ajaxStop(function () {
    $('.loading').hide();  // 隐藏信息
});

设置加载超时：timeout : 500

$.ajax()方法错误处理： error : function () {}
$.post()错误处理：$.post(). error : function () {}


.ajaxSuccess()，对应一个局部方法：.success()，请求成功完成时执行。
.ajaxComplete()，对应一个局部方法：.complete()，请求完成后注册一个回调函数。
.ajaxSend()，没有对应的局部方法，只有属性 beforeSend，请求发送之前要绑定的函数。
.ajaxError() ,请求失败后

```