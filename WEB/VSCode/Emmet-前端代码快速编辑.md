# Emmet-前端代码快速编辑
```

官方文档：https://docs.emmet.io/

Emmet-前端开发神器:Emmet是一款编辑器插件，支持多种编辑器支持。在前端开发中，Emmet 使用缩写语法快速编写 HTML、CSS 以及实现其他的功能，极大的提高前端开发效率。

缩写
Emmet使用特殊的表达式Abbreviations，也就是缩写：这种特殊的表达式会被Emmet解析并转义成结构化的代码块。Emmet使用类似CSS选择器的语法来描述元素在DOM树节点的位置和属性。

任何可用名称来生成HTML标签：div → <div></div> 或 foo → <foo></foo>

使用 > 生成元素子节点:  div>ul>li
    <div>
        <ul>
            <li></li>
        </ul>
    </div>

使用 + 生成元素兄弟节点:    div+p+bq
    <div></div>
    <p></p>
    <blockquote></blockquote>


使用 ^ 在元素父节点生成新的元素节点,操作符 ^ 的作用和 > 刚好相反:   div+div>p>span+em^bq
    <div></div>
    <div>
        <p><span></span><em></em></p>
        <blockquote></blockquote>
    </div>
用n个 ^ ，就可以在第n父级生成新的节点:  div+div>p>span+em^^^bq
    <div></div>
    <div>
        <p><span></span><em></em></p>
    </div>
    <blockquote></blockquote>

使用 * 生成多个相同元素:    ul>li*5
    <ul>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>

圆括号 () 是Emmet的高级用法，用来实现比较复杂的DOM结构: div>(header>ul>li*2>a)+footer>p
    <div>
        <header>
            <ul>
                <li><a href=""></a></li>
                <li><a href=""></a></li>
            </ul>
        </header>
        <footer>
            <p></p>
        </footer>
    </div>
还可以嵌套使用圆括号 ():    (div>dl>(dt+dd)*2)+footer>p
    <div>
        <dl>
            <dt></dt>
            <dd></dd>
            <dt></dt>
            <dd></dd>
        </dl>
    </div>
    <footer>
        <p></p>
    </footer>

属性操作符ID 和 CLASS

Emmet给元素添加ID和CLASS的方法和CSS的语法类似:div#header+div.page+div#footer.class1.class2.class3
    <div id="header"></div>
    <div class="page"></div>
    <div id="footer" class="class1 class2 class3"></div>

使用[attr]标记来添加自定义属性：    td[title="Hello world!" colspan=3]
    <td title="Hello world!" colspan="3"></td>

使用 $ 操作符可以对重复元素进行有序编号：   ul>li.item$*5
    <ul>
        <li class="item1"></li>
        <li class="item2"></li>
        <li class="item3"></li>
        <li class="item4"></li>
        <li class="item5"></li>
    </ul>
还可以用多个 $ 定义编号的格式:  ul>li.item$$$*5
    <ul>
        <li class="item001"></li>
        <li class="item002"></li>
        <li class="item003"></li>
        <li class="item004"></li>
        <li class="item005"></li>
    </ul>

在 $ 后面添加 @N 可以改变编号基数： ul>li.item$@3*5
    <ul>
        <li class="item3"></li>
        <li class="item4"></li>
        <li class="item5"></li>
        <li class="item6"></li>
        <li class="item7"></li>
    </ul>


文本操作符
Emmet使用 Text:{} 给元素添加文本内容

a{Click me}
会被转义为

<a href="">Click me</a>
注意： {text} 在Emmet中是被当成单独的元素来解析的，但当和其他元素结合使用时会有特殊的含义


```