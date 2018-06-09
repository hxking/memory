## jQuery基础
```
<script></script>
$(function(){
    // 在这里写，是页面加载玩执行
})

// 选择器：

$("div")   //元素选择器
$("#id")  //id选择器 ，只能选择一个
$(".class")  //class选择器

$("*") //通配选择器， 一般不常用，选择div下（局部） 里面的所有元素可以用到
$("#id, .class, div") //群组选择器
$("#div ul li") //后代选择器
$("div.class")//限定选择器，选择div有class属性的
$(".class.class")//选择一个元素上有对个class可以用

$("div > p")//选择div下儿子辈的p标签
$(".class + p") //选择class后面的一个p标签
$(".class ~ p") //选择class后面的所有同级p标签
$("div p:first") //选择div里面的第一个p标签
$("div p:last") //选择div里面的最后一个p标签
$("div p:not(.one)") //选择div里面所有的p标签，但是排出class是one的p标签
$("div p:even") //选择div里面所有序号是偶数的p标签
$("div p:odd") //选择div里面所有序号是基数的p标签
$("div p:eq(3)") //选择div里面所有序号是3的p标签
$("div p:gt(3)")//选择div里面所有序号大于3的p标签
$("div p:lt(3)")//选择div里面所有序号小于3的p标签
$("div p:contains(你好)")//选择内容里包涵你好的p标签
$("div p:empty")//选择没有内容的p标签
$("div p:has(span)")//选择div里包涵span的p标签
$("div p:parent")//选择div里不是空的p标签
$("div p:hidden")//选择div里隐藏的p标签
$("div p:visible")//选择div里显示的p标签
$("div p[class]")//选择div里有class的p标签
$("div p[name]")//选择div里有name的p标签
$("div p[name = mingzi]")//选择div里有name等于mingzi的p标签
$("div p[name != mingzi]")//选择div里有name不等于mingzi的p标签
$("div p[class^=ho]")//选择div里有class以ho开头的标签
$("div p[class$=ho]")//选择div里有class以ho结尾的标签
$("div p[class*=ho]")//选择div里有class含有ho的标签
$("div p：first-child")//选择所有div里p标签父级下的第一个p标签，父级的第一个元素必须是p
$("div p：first-of-type")//选择所有div里p标签父级下的第一个p标签
$("div p：only-child")//选择div里独生子的p标签

// 筛选：

$("div p").eq(2)//选择div里的p标签的第2号元素
$("div p").first() //选择div里面的第一个p标签
$("div p").last() //选择div里面的最后一个p标签
$("div p").hasClass('one')//选择div里面class是one的p标签
$("div p").filter('.one')//看手册
$("div p").is('#three')//判断div下的p标签的id是不是there
$("div p").has('span')//判断div下的p标签下含有span的标签
$("div p").not('span')//排除div下的p标签下含有span的标签
$("div p").slice(2,5)//截取div下的p标签的2到4的元素
$(".one").next('p')//选择.one后面的一个p标签
$(".one").nextAll('p')//选择.one后面的所有同级p标签
$(".one").prev('p')//选择.one前面的一个p标签
$(".one").prevAll('p')//选择.one前面的所有同级p标签
$(".one").parent()//选择.one他爹
$(".one").parents()//选择.one所有的父级
$(".one").siblings()//选择.one的兄弟元素



// 表单选择器:
// :input 选取所有 input、textarea、select 和 button 元素 集合元素
// :text 选择所有单行文本框，即 type=text 集合元素
// :password 选择所有密码框，即 type=password 集合元素
// :radio 选择所有单选框，即 type=radio 集合元素
// :checkbox 选择所有复选框，即 type=checkbox 集合元素
// :submit 选取所有提交按钮，即 type=submit 集合元素
// :reset 选取所有重置按钮，即 type=reset 集合元素
// :image 选取所有图像按钮，即 type=image 集合元素
// :button 选择所有普通按钮，即 button 元素 集合元素
// :file 选择所有文件按钮，即 type=file 集合元素
// :hidden 选择所有不可见字段，即 type=hidden 集合元素

$(':input').size(); //获取所有表单字段元素
$(':text').size(); //获取单行文本框元素
$(':password').size(); //获取密码栏元素
$(':radio').size(); //获取单选框元素
$(':checkbox').size(); //获取复选框元素
$(':submit').size(); //获取提交按钮元素
$(':reset').size(); //获取重置按钮元素
$(':image').size(); //获取图片按钮元素
$(':file').size(); //获取文件按钮元素
$(':button').size(); //获取普通按钮元素
$('from:hidden').size(); //获取隐藏字段元素

// 表单过滤器:
// :enabled 选取所有可用元素 集合元素
// :disabled 选取所有不可用元素 集合元素
// :checked 选取所有被选中的元素，单选和复选字段 集合元素
// :selected 选取所有被选中的元素，下拉列表 集合元素
$(':enabled').size(); //获取可用元素
$(':disabled').size(); //获取不可用元素
$(':checked').size(); //获取单选、复选框中被选中的元素
$(':selected').size(); //获取下拉列表中被选中的元素



// 获取、修改：
$('#box').html(); //获取 html 内容
$('#box').html('<em>www.li.cc</em>'); //设置 html 内容
$('#box').text(); //获取文本内容，会自动清理 html 标签
$('#box').text('<em>www.li.cc</em>'); //设置文本内容，会自动转义 html 标签
$('input').val(); //获取表单内容
$('input').val('www.li.cc'); //设置表单内容

// 设置多个选项的选定状态，比如下拉列表、单选复选框等等，可以通过数组传递操作。
$("input").val(["check1","check2", "radio1" ]); //value 值是这些的将被选定

// 对元素本身的属性进行操作:
attr(key) //获取某个元素 key 属性的属性值
attr(key, value) //设置某个元素 key 属性的属性值
attr({key1:value2, key2:value2 ...}) //设置某个元素多个 key 属性的属性值
attr(key, function (index, value) {}) //设置某个元素 key 通过 fn 来设置
// 例：
$('div').attr('title'); //获取属性的属性值
$('div').attr('title', '我是域名'); //设置属性及属性值
$('div').attr({title:'我是域名', class:'class' , id:'id'});//等等，可以设置很多
$('div').attr('title', function (index, value) { //可以接受两个参数
return value + (index+1) + '，我是域名';});

//注意： 可以使用 attr()来创建 id 属性，但不建议这么做。也可以创建class 属性，但后面会有一个语义更好的方法来代替 attr()

$('div').removeAttr('title'); //删除指定的属性


// CSS 操作方法：
css(name)// 获取某个元素行内的 CSS 样式
css(name, value) //设置某个元素行内的 CSS 样式
css([name1, name2, name3]) //获取某个元素行内多个 CSS 样式
css({name1 : value1, name2 : value2}) //设置某个元素行内多个 CSS 样式
css(name, function (index, value){} ) //设置某个元素行内的 CSS 样式
addClass(class) //给某个元素添加一个 CSS 类
addClass(class1 class2 class3) //给某个元素添加多个 CSS 类
removeClass(class) //删除某个元素的一个 CSS 类
removeClass(class1 class2 class3) //删除某个元素的多个 CSS 类
toggleClass(class) //来回切换默认样式和指定样式
toggleClass(class1 class2 class3) //同上
toggleClass(class, switch) //来回切换样式的时候设置切换频率
toggleClass(function () {}) //通过匿名函数设置切换的规则
toggleClass(function () {}, switch) //在匿名函数设置时也可以设置频率
toggleClass(function (i, c, s) {}, switch) //在匿名函数设置时传递三个参数

// 例：
$('div').css('color'); //获取元素行内 CSS 样式的颜色
$('div').css('color', 'red'); //设置元素行内 CSS 样式颜色为红色
// 在需要设置多个样式的时候，我们可以传递多个 CSS 样式的键值对即可。
$('div').css({'background-color' : '#ccc','color' : 'red','font-size' : '20px'});
// 在 CSS 获取，而获取到的是一个对象数组，如果用传统方式进行解析需要使用 for in 遍历。
var box = $('div').css(['color', 'height', 'width']); //得到多个 CSS 样式的数组对象
for (var i in box) { alert(i + ':' + box[i]);}//逐个遍历出来
// jQuery 提供了一个遍历工具专门来处理这种对象数组，$.each()方法，
$.each(box, function (attr, value) { alert(attr + ':' + value);});//遍历 JavaScript 原生态的对象数组
// 使用 jQuery 对象的数组使用.each()方法呢？
$('div').each(function (index, element) { alert(index + ':' + element);});//index 为索引，element 为元素 DOM

$('div').addClass('red'); //添加一个 CSS 类
$('div').addClass('red bg'); //添加多个 CSS 类
$('div').removeClass('bg'); //删除一个 CSS 类
$('div').removeClass('red bg'); //删除多个 CSS 类


// 结合事件来实现 CSS 类的样式切换功能。//当点击后触发//单个样式多个样式均可
$('div').click(function () { $(this).toggleClass('red size'); });
// .toggleClass()方法的第二个参数可以传入一个布尔值，true表示执行切换到 class类，false表示执行回默认 class 类(默认的是空 class)，运用这个特性，我们可以设置切换的频率。
var count = 0;//每点击两次切换一次 red
$('div').click(function () { $(this).toggleClass('red', count++ % 3 == 0);});
// 实现样式 1 和样式 2之间的切换还必须自己写一些逻辑
$('div').click(function () {    $(this).toggleClass(function () {
    if ($(this).hasClass('red')) {
        $(this).removeClass('red');
        return 'green';
    } else {
        $(this).removeClass('green');
        return 'red';
}     });   });


width() //获取某个元素的长度
width(value) //设置某个元素的长度
width(function (index, width) {}) //通过匿名函数设置某个元素的长度
// 例：
$('div').width(); //获取元素的长度，返回的类型为 number
$('div').width('500px'); //设置了 px 单位
//index 是索引，value 是原本值    //无须调整类型，直接计算
$('div').width(function (index, value) { return value - 500; });

height() // 获取某个元素的长度
height(value) // 设置某个元素的长度
height(function (index, width) {}) // 通过匿名函数设置某个元素的长度
// 例：
$('div').height(); //获取元素的高度，返回的类型为 number
$('div').height('500px'); //设置了 px 单位
//index 是索引，value 是原本值     //无须调整类型，直接计算
$('div').height(function (index, value) { return value - 1; });



innerWidth() //获取元素宽度，包含内边距 padding
innerHeight() //获取元素高度，包含内边距 padding
outerWidth() //获取元素宽度，包含边框 border 和内边距 padding
outerHeight() //获取元素高度，包含边框 border 和内边距 padding
outerWidth(ture) //同上，且包含外边距
outerHeight(true) //同上，且包含外边距
// 例：
alert($('div').width()); //不包含
alert($('div').innerWidth()); //包含内边距 padding
alert($('div').outerWidth()); //包含内边距 padding+边框 border
alert($('div').outerWidth(true)); //包含内边距 padding+边框 border+外边距 margin


offset() //获取某个元素相对于视口的偏移位置
position() //获取某个元素相对于父元素的偏移位置
scrollTop() //获取垂直滚动条的值
scrollTop(value) //设置垂直滚动条的值
scrollLeft() //获取水平滚动条的值
scrollLeft(value) //设置水平滚动条的值
// 例：
$('strong').offset().left; //相对于视口的偏移
$('strong').position().left; //相对于父元素的偏移
$(window).scrollTop(); //获取当前滚动条的位置
$(window).scrollTop(300); //设置当前滚动条的位置



// 内部插入节点方法:

append(content)// 向指定元素内部后面插入节点 content
append(function (index, html) {}) //使用匿名函数向指定元素内部后面插入节点
appendTo(content)// 将指定元素移入到指定元素 content 内部后面
prepend(content) //向指定元素 content 内部的前面插入节点
prepend(function (index, html) {}) //使用匿名函数向指定元素内部的前面插入节点
prependTo(content) //将指定元素移入到指定元素 content 内部前面

// 外部插入节点方法:

after(content) //向指定元素的外部后面插入节点 content
after(function (index, html) {}) //使用匿名函数向指定元素的外部后面插入节点
before(content) //向指定元素的外部前面插入节点 content
before(function (index, html) {}) //使用匿名函数向指定元素的外部前面插入节点
insertAfter(content) //将指定节点移到指定元素 content 外部的后面
insertBefore(content) //将指定节点移到指定元素 content 外部的前面


// 包裹节点:

wrap(html) //向指定元素包裹一层 html 代码
wrap(element) //向指定元素包裹一层 DOM 对象节点
wrap(function (index) {}) //使用匿名函数向指定元素包裹一层自定义内容
unwrap() //移除一层指定元素包裹的内容
wrapAll(html) //用 html 将所有元素包裹到一起
wrapAll(element) //用 DOM 对象将所有元素包裹在一起
wrapInner(html) //向指定元素的子内容包裹一层 html
wrapInner(element) //向指定元素的子内容包裹一层 DOM 对象节点
wrapInner(function (index) {}) //用匿名函数向指定元素的子内容包裹一层

//复制节点
$('body').append($('div').clone(true));

//删除节点
$('div').remove(); 

//保留事件的删除节点
$('div').detach(); 

//清空节点
$('div').empty(); 

//替换节点
$('div').replaceWith('<span>节点</span>'); //将 div 替换成 span 元素
$('<span>节点</span>').replaceAll('div'); //同上



// 事件操作：
    // 绑定多个事件：jQuery 通过.bind()方法来为元素绑定这些事件。可以传递三个参数：bind(type, [data], fn)。例如：//居然可以现找，没有详细写
    $('input').bind('click mouseover', function () {     alert('点击！');    });  //例子1
    //通过对象键值对绑定多个参数
    $('input').bind({ 'mouseout' : function () { alert('移出');},'mouseover' : function () {alert('移入');}});//例子2

    $('input').unbind();     //使用 unbind 删除绑定的事件
    $('input').unbind('click'); //使用 unbind 参数删除指定类型事件
    $('input').unbind('click', fn1); //只删除 fn1 处理函数的事件  fn1是函数
// 简写事件绑定方法：
    click(fn) //鼠标 触发每一个匹配元素的 click(单击)事件
    dblclick(fn) //鼠标 触发每一个匹配元素的 dblclick(双击)事件
    mousedown(fn) //鼠标 触发每一个匹配元素的 mousedown(点击后)事件
    mouseup(fn) //鼠标 触发每一个匹配元素的 mouseup(点击弹起)事件
    mouseover(fn) //鼠标 触发每一个匹配元素的 mouseover(鼠标移入)事件
    mouseout(fn) //鼠标 触发每一个匹配元素的 mouseout(鼠标移出)事件
    mousemove(fn) //鼠标 触发每一个匹配元素的mousemove(鼠标移动)事件
    mouseenter(fn) //鼠标 触发每一个匹配元素的 mouseenter(鼠标穿过)事件
    mouseleave(fn) //鼠标 触发每一个匹配元素的 mouseleave(鼠标穿出)事件
    keydown(fn) //键盘 触发每一个匹配元素的 keydown(键盘按下)事件
    keyup(fn) //键盘 触发每一个匹配元素的 keyup(键盘按下弹起)事件
    keypress(fn) //键盘 触发每一个匹配元素的 keypress(键盘按下)事件
    unload(fn) //文档 当卸载本页面时绑定一个要执行的函数
    resize(fn) //文档 触发每一个匹配元素的 resize(文档改变大小)事件
    scroll(fn) //文档 触发每一个匹配元素的 scroll(滚动条拖动)事件
    focus(fn) //表单 触发每一个匹配元素的 focus(焦点激活)事件
    blur(fn) //表单 触发每一个匹配元素的 blur(焦点丢失)事件
    focusin(fn) //表单 触发每一个匹配元素的 focusin(焦点激活)事件
    focusout(fn) //表单 触发每一个匹配元素的 focusout(焦点丢失)事件
    select(fn) //表单 触发每一个匹配元素的 select(文本选定)事件
    change(fn) //表单 触发每一个匹配元素的 change(值改变)事件
    submit(fn) //表单 触发每一个匹配元素的 submit(表单提交)事件

// 复合事件:

    ready(fn) //当 DOM 加载完毕触发事件
    hover([fn1,]fn2) //当鼠标移入触发第一个 fn1，移出触发 fn2

// 事件对象:event 对象的属性

//通过处理函数传递事件对象   //接受事件对象参数
$('input').bind('click', function (e) { alert(e.duixiang); });//e.对象老实现

type // 获取这个事件的事件类型，例如：click
target // 获取绑定事件的 DOM 元素
data // 获取事件调用时的额外数据
relatedTarget // 获取移入移出目标点离开或进入的那个 DOM 元素
currentTarget // 获取冒泡前触发的 DOM 元素，等同与 this
pageX/pageY//  获取相对于页面原点的水平/垂直坐标
screenX/screenY // 获取显示器屏幕位置的水平/垂直坐标(非 jQuery 封装)
clientX/clientY // 获取相对于页面视口的水平/垂直坐标(非 jQuery 封装)
result // 获取上一个相同事件的返回值
timeStamp // 获取事件触发的时间戳
which // 获取鼠标的左中右键(1,2,3)，或获取键盘按键
altKey/shiftKey/ctrlKey/metaKey   // 获取是否按下了 alt、shift、ctrl(这三个非 jQuery 封装)或meta 键(IE 原生 meta 键，jQuery 做了封装)

// 冒泡和默认行为的一些方法：

preventDefault() //取消某个元素的默认行为
isDefaultPrevented() //判断是否调用了 preventDefault()方法
stopPropagation() //取消事件冒泡
isPropagationStopped() //判断是否调用了 stopPropagation()方法
stopImmediatePropagation() //取消事件冒泡，并取消该事件的后续事件处理函数
isImmediatePropagationStopped() //判断是否调用了 stopImmediatePropagation()方法
```