# js常用验证

## 手机号获取和验证
```
var mobile = $('#mobile');
var phone_num = mobile.val();
var reg = /^(((13[0-9]{1})|(14[0-9]{1})|(15[0-3]{1})|(15[5-9]{1})|(17[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
if(phone_num == ''){
    $.show_alert("手机号码不能为空！");
    return false;
}else if(phone_num.length !=11){
    $.show_alert("请输入有效的手机号码！");
    return false;
}else if(!reg.test(phone_num)){
    $.show_alert("请输入有效的手机号码！");
    return false;
}
```