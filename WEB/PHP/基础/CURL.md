```

 <?php

function https_request($url, $data=null){
    //初始化 curl
    $curl = curl_init();
    //设置请求的网址
    curl_setopt($curl, CURLOPT_URL, $url);
    //数据返回后不要直接显示
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);       
    //禁止整数校验
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    // $data 存在时 开启 post
    if(!empty($data)){
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);        
        curl_setopt($curl, CURLOPT_POST, 1);        
        curl_setopt($curl, CURLOPT_POSTFILES, $data);
    }
    //执行curl 
    if(curl_exec($curl)){
        //成功返回数据
        $re = curl_multi_getcontent($curl);
    };
    //关闭 curl 资源
    curl_close($curl);
    return $re;
}
$data = array('name'=>'name','gey'=>'aa');
var_dump($data);
echo https_request('www.houdunwang.com',$data);

```