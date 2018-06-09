```
DouBanSpider [2]– 豆瓣读书爬虫。可以爬下豆瓣读书标签下的所有图书，按评分排名依次存储，存储到Excel中，可方便大家筛选搜罗，比如筛选评价人数>1000的高分书籍；可依据不同的主题存储到Excel不同的Sheet ，采用User Agent伪装为浏览器进行爬取，并加入随机延时来更好的模仿浏览器行为，避免爬虫被封。

zhihu_spider [3]– 知乎爬虫。此项目的功能是爬取知乎用户信息以及人际拓扑关系，爬虫框架使用scrapy，数据存储使用mongo

bilibili-user [4]– Bilibili用户爬虫。总数据数：20119918，抓取字段：用户id，昵称，性别，头像，等级，经验值，粉丝数，生日，地址，注册时间，签名，等级与经验值等。抓取之后生成B站用户数据报告。

SinaSpider [5]– 新浪微博爬虫。主要爬取新浪微博用户的个人信息、微博信息、粉丝和关注。代码获取新浪微博Cookie进行登录，可通过多账号登录来防止新浪的反扒。主要使用 scrapy 爬虫框架。

distribute_crawler [6]– 小说下载分布式爬虫。使用scrapy,Redis, MongoDB,graphite实现的一个分布式网络爬虫,底层存储MongoDB集群,分布式使用Redis实现,爬虫状态显示使用graphite实现，主要针对一个小说站点。

CnkiSpider [7]– 中国知网爬虫。设置检索条件后，执行src/CnkiSpider.py抓取数据，抓取数据存储在/data目录下，每个数据文件的第一行为字段名称。

LianJiaSpider [8]– 链家网爬虫。爬取北京地区链家历年二手房成交记录。涵盖链家爬虫一文的全部代码，包括链家模拟登录代码。

scrapy_jingdong [9]– 京东爬虫。基于scrapy的京东网站爬虫，保存格式为csv。

QQ-Groups-Spider [10]– QQ 群爬虫。批量抓取 QQ 群信息，包括群名称、群号、群人数、群主、群简介等内容，最终生成 XLS(X) / CSV 结果文件。

wooyun_public[11]-乌云爬虫。 乌云公开漏洞、知识库爬虫和搜索。全部公开漏洞的列表和每个漏洞的文本内容存在MongoDB中，大概约2G内容；如果整站爬全部文本和图片作为离线查询，大概需要10G空间、2小时（10M电信带宽）；爬取全部知识库，总共约500M空间。漏洞搜索使用了Flask作为web server，bootstrap作为前端。

spider[12]– hao123网站爬虫。以hao123为入口页面，滚动爬取外链，收集网址，并记录网址上的内链和外链数目，记录title等信息，windows7 32位上测试，目前每24个小时，可收集数据为10万左右

findtrip [13]– 机票爬虫（去哪儿和携程网）。Findtrip是一个基于Scrapy的机票爬虫，目前整合了国内两大机票网站（去哪儿 + 携程）。

163spider [14] – 基于requests、MySQLdb、torndb的网易客户端内容爬虫

doubanspiders[15]– 豆瓣电影、书籍、小组、相册、东西等爬虫集

QQSpider [16]– QQ空间爬虫，包括日志、说说、个人信息等，一天可抓取 400 万条数据。

baidu-music-spider [17]– 百度mp3全站爬虫，使用redis支持断点续传。

tbcrawler[18]– 淘宝和天猫的爬虫,可以根据搜索关键词,物品id来抓去页面的信息，数据存储在mongodb。

stockholm [19]– 一个股票数据（沪深）爬虫和选股策略测试框架。根据选定的日期范围抓取所有沪深两市股票的行情数据。支持使用表达式定义选股策略。支持多线程处理。保存数据到JSON文件、CSV文件。

BaiduyunSpider[20]-百度云盘爬虫。

Spider[21]-社交数据爬虫。支持微博,知乎,豆瓣。

proxy pool[22]-Python爬虫代理IP池(proxy pool)。

music-163[23]-爬取网易云音乐所有歌曲的评论。

jandan_spider[24]-爬取煎蛋妹纸图片。

CnblogsSpider[25]-cnblogs列表页爬虫。

spider_smooc[26]-爬取慕课网视频。

CnkiSpider[27]-中国知网爬虫。

knowsecSpider2[28]-知道创宇爬虫题目。

aiss-spider[29]-爱丝APP图片爬虫。

SinaSpider[30]-动态IP解决新浪的反爬虫机制，快速抓取内容。

csdn-spider[31]-爬取CSDN上的博客文章。

ProxySpider[32]-爬取西刺上的代理IP，并验证代理可用性
```