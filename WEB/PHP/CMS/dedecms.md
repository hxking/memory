```
网站编码：网站标题:网站描述：网站关键字：
<meta http-equiv="Content-Type" content="text/html; charset={dede:global.cfg_soft_lang/}" />
<title>{dede:global.cfg_webname/}</title>
<meta name="description" content="{dede:global.cfg_description/}" />
<meta name="keywords" content="{dede:global.cfg_keywords/}" />

网站模板目录：
{dede:global.cfg_templets_skin/}/

连接head文件：连接footer文件： 
{dede:include filename="head.htm"/}
{dede:include filename="footer.htm"/}

首页导航： left子栏目导航：       type='son'
<li><a href="{dede:global.cfg_cmsurl/}/">网站首页</a></li>
{dede:channel type='top' row='10' currentstyle="<li><a href='~typelink~' ~rel~>~typename~</a></li>"}
<li><a href='[field:typeurl/]' [field:rel/]>[field:typename/]</a></li>
{/dede:channel}

循环二级导航调用
{dede:channelartlist row=7 typeid=top currentstyle=cur}
<li><a href="{dede:field name=typeurl/}">{dede:field name=typename/}</a></li>
<ul>
{dede:channel type=son noself=yes}
<li><a href="[field:typelink/]">[field:typename/]</a></li>
{/dede:channel}   
</ul>
{/dede:channelartlist}

首页新闻列表调用：list显示数量                 	     pagesize='10'                                                   orderway='asc' 
{dede:arclist typeid="2" row='4' titlelen='60' infolen='20'}
<li><a href="[field:arcurl/]"><img src="[field:litpic/]"/><span>[field:title/]</span></a></li>
<li><span>[field:pubdate function="GetDateMK(@me)"/]</span></li>
<li>[field:description function="cn_substr(@me,100)"/]...</li>
{/dede:arclist} 

单页内容调用(文字)
{dede:sql sql='Select content from dede_arctype where id=1'}[field:content function="cn_substr (Html2text(@me),560)"/]{/dede:sql}...

指定栏目调用：调用栏目连接：
{dede:type typeid='4'}<a href="[field:typelink /]">[field:typename /]</a>{/dede:type}

列表页---------------------------------------------------------------------------------------------------------- 
列表页调用时间：内容页调用时间：
 [field:pubdate function=MyDate('Y-m-d',@me)/] 
 {dede:field.pubdate function="MyDate('Y-m-d H:i',@me)"/}

当前栏目调用：
{dede:field name='typename'/}
 
所在位置调用：
{dede:field name='position'/}

内容页---------------------------------------------------------------------------------------------------------
内容页标题
{dede:field.title/}

内容页代码调用：
{dede:field.body/}<br />{dede:field.content/}
{dede:prenext get='pre'/}<br />{dede:prenext get='next'/}

内容摘要
<p>[field:description/]...</p>
[field:description function="cn_substr(@me,100)"/]...

内容页文章摘要：
 {dede:field.description runphp='yes'}
if(@me<>'' )@me = ''.@me.'';
 {/dede:field.description}

footer---------------------------------------------------------------------------------------------------------
公司：{dede:global.cfg_gs/}<br/>
手机：{dede:global.cfg_sj/}<br />
电话：{dede:global.cfg_dh/}<br />
邮箱：{dede:global.cfg_yx/} <br />
地址：{dede:global.cfg_dz/}

底部通用代码
本网关键词：{dede:global.cfg_keywords/}<br />
电话：{dede:global.cfg_dh/}&nbsp;&nbsp;&nbsp;手机：{dede:global.cfg_sj/}<br />
版权所有：{dede:global.cfg_gs/}&nbsp;&nbsp;&nbsp;地址：{dede:global.cfg_dz/}<br />

======================================================================
指定排序方式是降序还是顺向排序，默认为降序
orderway='asc' 值为 desc（降序） 或 asc（升序） 
=======================================================================

详情页调用缩略图：
<img src="{dede:field.litpic/}" />

友情链接:
<div class="linklin"><li>友情链接：</li>{dede:flink/}</div>
<style>
.linklin li{
	list-style:none;
	margin-left:20px;
	line-height:30px;
	float:left;
	
}
</style>

分页样式:
<div class="pagination-wrapper"> 
<div class="pagination"> 
<ul>
{dede:pagelist listitem="info,index,end,pre,next,pageno" listsize="5"/}
</ul>
</div> 
</div> 

<style>
/*pages*/
.pagination-wrapper {
 clear:both;
 padding:1em 0 2em 0;
 text-align:center;
}
.pagination {
 display: inline-block;
 *display: inline;
 *zoom: 1;
 font-size:12px;
 border-radius: 3px;
 box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
}
.pagination li{
 list-style: none;
 float: left;
 display:block;
 line-height:1em;
 padding: .5em .8em;
 text-decoration: none;
 border: 1px solid #ddd;
 border-left-width: 0;
}
.pagination li a {
 display: inline-block;
 background-color: #f9f9f9;
 color: #999;
}
.pagination li a:link{
 background:#fff;
 color: #4C78A5;
}
.pagination li a:hover{
 text-decoration:none;
}
.pagination li a:link:hover {
 color: #000;
}
.pagination li.thisclass {
 background-color: #f9f9f9;
 color:#999;
}
.pagination li:first-child {
 border-left-width: 1px;
 border-radius: 3px 0 0 3px;
}
.pagination li:last-child{
 border-radius: 0 3px 3px 0;
}
.pagination .pageinfo{
 color: #444;
}
</style>


幻灯片调用
<script language='javascript'> 
linkarr = new Array();  
picarr = new Array();  
textarr = new Array();  
var swf_width=960;  
var swf_height=419;   
//文字颜色|文字位置|文字背景颜色|文字背景透明度|按键文字颜色|按键默认颜色|按键当前颜色|自动播放时间|图片过渡效果|是否显示按钮|打开方式  
var configtg='0xffffff||0x3FA61F|5|0xffffff|0xC5DDBC|0x000033|8|3|1|_blank';  
var files = "";  
var links = "";  
var texts = "";  
//这里设置调用标记  
{dede:arclist flag='c' row='5' typeid='8'}
linkarr[[field:global.autoindex/]] = "[field:arcurl/]";  
picarr[[field:global.autoindex/]]  = "[field:litpic/]";  
{/dede:arclist}  
for(i=1;i<picarr.length;i++){  
if(files=="") files = picarr[i];  
else files += "|"+picarr[i];  
}  
for(i=1;i<linkarr.length;i++){  
if(links=="") links = linkarr[i];  
else links += "|"+linkarr[i];  
}  
document.write('<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="'+ swf_width +'" height="'+ swf_height +'">');  
document.write('<param name="movie" value="{dede:global.cfg_templeturl /}/default/images/bcastr3.swf"><param name="quality" value="high">');  
document.write('<param name="menu" value="false"><param name=wmode value="opaque">');  
document.write('<param name="FlashVars" value="bcastr_file='+files+'&bcastr_link='+links+'&bcastr_title='+texts+'&bcastr_config='+configtg+'">');  
document.write('<embed src="{dede:global.cfg_templeturl /}/default/images/bcastr3.swf" wmode="opaque" FlashVars="bcastr_file='+files+'&bcastr_link='+links+'&bcastr_config='+configtg+'&menu="false" quality="high" width="'+ swf_width +'" height="'+ swf_height +'" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />'); document.write('</object>');  
</script>  

搜索页
search.htm
<form  name="formsearch" action="{dede:global.cfg_cmsurl/}/plus/search.php">
	<div class="form">
	<h4>搜索</h4>
	<input type="hidden" name="kwtype" value="0" />
	<input name="q" type="text" class="search-keyword" id="search-keyword" value="在这里搜索..." onfocus="if(this.value=='在这里搜索...'){this.value='';}"  onblur="if(this.value==''){this.value='在这里搜索...';}" />
	<select name="searchtype" class="search-option" id="search-option">
	<option value="title" selected='1'>检索标题</option>
	<option value="titlekeyword">智能模糊</option>
	</select>
	<button type="submit" class="search-submit">搜索</button>
	</div>
</form>
        
	{dede:list perpage='20'}
	<li>      				
	<h3><a href="[field:arcurl/]" target="_blank">[field:title/]</a></h3>
	<p>[field:description/]...</p>
	<span>
	<a href="[field:arcurl/]">[field:global.cfg_basehost/][field:arcurl/]</a>
	<small>分类：</small><a href="[field:typeurl/]" target="_blank">[field:typename/]</a>
	<small>点击：</small>[field:click/]
	<small>日期：</small>[field:stime/]
	</span>
	</li>
	{/dede:list}
            
	{dede:pagelist listsize='4'/}	

tr、td不换行替换用
 <div><ul><li style=" width:265px; height:250px; list-style:none; margin:0 10px; float:left;  padding-right:16px" ><img src="{dede:global.cfg_templets_skin/}/"  style="border:#CCC 1px solid; " width="265" border="0" height="200"><a href="#" style="line-height:35px; font-size:16px">名称:产品展示3</a> </li>    </ul></div>

热门标签调用：
{dede:tag row='10' getall='1' sort='month'}
<li><a href='[field:link/]'>[field:tag /]</a></li>
{/dede:tag}

<div class="info">
<small>时间:</small>{dede:field.pubdate function="MyDate('Y-m-d H:i',@me)"/}
<small>来源:</small>{dede:field.source/}
<small>作者:</small>{dede:field.writer/}
<small>点击:</small>
<script src="{dede:field name='phpurl'/}/count.php?view=yes&aid={dede:field name='id'/}&mid={dede:field name='mid'/}" type='text/javascript' language="javascript">
</script>次</div>

返回上一页：
<a href=”#” onClick=”javascript :history.back(-1);”>返回上一页</a>

留言板
<form action="/16-cms/plus/diy.php" enctype="multipart/form-data" method="post">
<input type="hidden" name="action" value="post" />
<input type="hidden" name="diyid" value="1" />
<input type="hidden" name="do" value="2" />
	<table id="GBForm" class="gform" cellspacing="0" cellpadding="0" border="0" width="100%">
		<tbody><tr><td colspan="2" id="Title" class="gf_title" align="center">欢迎您给我们留言</td></tr>
		<tr><td align="right">姓名:</td><td><input type="text" name="xingm" class="gfInput gf_name" > <span>*</span></td></tr>
		<tr><td align="right">电话:</td><td><input type="tel" name="dianh" class="gfInput gf_tel"> <span>*</span></td></tr>
		<tr><td align="right">手机号:</td><td><input type="text" name="shouj" class="gfInput gf_mobile"> <span>*</span></td></tr>
		<tr><td align="right">邮箱:</td><td><input type="text" name="youx" class="gfInput gf_email"> <span>*</span></td></tr>
		<tr><td align="right">QQ:</td><td><input type="text" name="qq" class="gfInput gf_qq"> <span>*</span></td></tr>
        <tr><td align="right">内容:</td><td><textarea name="neir" cols="50" rows="5" id="message" class=" gfInput gf_message" placeholder="您好，感谢关注本网站！如果您对我们的产品或服务感兴趣，请点击此处留言，谢谢！"></textarea> <span>*</span></td></tr>
		<tr><td align="right">&nbsp;</td><td><span style="color:#888888">请勿在留言板中发表非法言论 评论不代表本站观点</span></td></tr>
		<tr><td align="right">&nbsp;</td><td>
        <input type="hidden" name="dede_fields" value="xingm,text;dianh,text;shouj,text;youx,text;qq,text;neir,multitext" />
	   <input type="hidden" name="dede_fieldshash" value="bb8c5a3fbb85ab4530af156546a1177d" />
		<input type="submit" name="add" value="提交留言" id="GBbt" class="gbt"></td></tr>
	</tbody></table>
</form>
<style>
.gform td {padding:3px;}
.gform span {color:#f00}
.gbook {margin-top:20px;}
.gbook li{list-style:none; padding:8px; margin-bottom:10px;}
.gb_name {font-size:14px;font-weight:bold;color:#f60;margin-bottom:5px;}
.gb_nickname {overflow:hidden}
.gb_content {padding:5px;border:1px dotted #999}
.gb_replay {margin:5px 0px 5px 28px;}
.gb_info {}
.gb_page {text-align:center;}
/*留言板的宽度*/
.gfInput{ width:200px;}
</style>

点击加好友qq聊天链接
<a href="tencent://message/?uin=975686955&Site=&Menu=yes" target="_blank">这里是内容</a>
电话: 短信:
 <a href="tel:{dede:global.cfg_sj/}" title="电话">
  <a href="sms:{dede:global.cfg_sj/}" title="短信">

<a href="javascript:window.print()">打印此页</a>&nbsp;&nbsp;<a href="javascript:self.close()">关闭</a>

浏览器图标
<link href="http://www.20982.com/favicon.ico" rel="shortcut icon">

```