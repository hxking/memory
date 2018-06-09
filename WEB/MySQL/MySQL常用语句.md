```
//上一页，下一页查询语句
$re = Db::query("select * from jituan_news where id > '66' order by id desc limit 0,1");
$re = Db::query("select * from jituan_news where id < '66' order by id desc limit 0,1");
```

tp5:
```
//上一页，下一页查询语句
$news_id = input('news_id');
$xia = Db::name('news')->where("id > $news_id")->where('pid',$lanmu_id)->order('id asc')->find();
$shang = Db::name('news')->where("id < $news_id")->where('pid',$lanmu_id)->order('id desc')->find();
$this->assign('xia',$xia);
$this->assign('shang',$shang);
```