json和array之间的转换:

```

<?php
//一个json数据
$ma= '{
    "button":[
    {   
         "type":"click",
         "name":"今日歌曲",
         "key":"V1001_TODAY_MUSIC"
     },
     {
          "name":"菜单",
          "sub_button":[
          { 
              "type":"view",
              "name":"搜索",
              "url":"http://www.soso.com/"
           },
           {
                "type":"miniprogram",
                "name":"wxa",
                "url":"http://mp.weixin.qq.com",
                "appid":"wx286b93c14bbf93aa",
                "pagepath":"pages/lunar/index"
            },
           {
              "type":"click",
              "name":"赞一下我们",
              "key":"V1001_GOOD"
           }]
      }]
}';
//把json数据转换成array
$menuarr=json_decode($ma, true);
print_r($menuarr);
echo '<br/>';


//把数组转换成json，这么转会乱码
echo json_encode($menuarr);
echo '<br/>';

//通过这个方法把array转换成json
echo $jsonmenu = my_json_encode("text", $menuarr);


function my_json_encode($type, $p)
{
    if (PHP_VERSION >= '5.4')
    {
        $str = json_encode($p, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }
    else
    {
        switch ($type)
        {
            case 'text':
                isset($p['text']['content']) && ($p['text']['content'] = urlencode($p['text']['content']));
                break;
        }
        $str = urldecode(json_encode($p));
    }
    return $str;
}


```