# 1 安装

通过 Composer 来安装 Carbon：

```
composer require nesbot/carbon
```

PS：由于 Laravel 项目已默认安装了此包，所以不需要再次执行上面的命令。

# 2 使用

你需要通过命名空间导入 Carbon 来使用，而不需每次都提供完整的名称。

```
use Carbon\Carbon;
```

## 2.1 获取当前时间

可以同`now()` 方法获取当前的日期和时间。如果你不指定参数，它会使用 PHP 配置中的时区：

```
<?php
echo Carbon::now(); //2016-10-14 20:21:20
?>
```
如果你想使用一个不同的时区，你需要传递一个**有效的时区**作为参数：
除 `now()`外，还提供了`today()`、`tomorrow()`、`yesterday()`等静态函数，不过，它们的时间都是 `00:00:00`：

```
echo Carbon::now();                             // 2016-10-14 15:18:34
echo Carbon::today();                            // 2016-10-14 00:00:00
echo  Carbon::tomorrow();                          // 2016-10-14 00:00:00
echo Carbon::yesterday();                         // 2016-10-14 00:00:00
```

以上输出结果其实是一个 Carbon 类型的日期时间对象：

```
Carbon {#179 ▼
  +"date": "2016-06-14 00:00:00.000000"
  +"timezone_type": 3
  +"timezone": "UTC"
}
```

要想获取字符串类型的日期，可以使用下面的代码：

```
echo Carbon::today()->toDateTimeString();
echo Carbon::yesterday()->toDateTimeString();
echo Carbon::tomorrow()->toDateTimeString();
```

## 2.2 日期类型转为字符串

如上所述，默认情况下，Carbon 的方法返回的为一个日期时间对象。虽然它是一个对象，但是你却可以直接使用 echo 输出结果，因为有 `__toString`魔术方法。但是如果你想把它转为字符串，可以使用 `toDateString` 或 `toDateTimeString` 方法：

```
echo Carbon::now()->toDateString(); //2016-10-14
echo Carbon::now()->toDateTimeString(); //2016-10-14 20:22:50
```

## 2.3 日期解析

你还可以使用 `parse`方法解析任何顺序和类型的日期（结果为 Carbon 类型的日期时间对象）：

```
echo Carbon::parse('2016-10-15')->toDateTimeString(); //2016-10-15 00:00:00
echo Carbon::parse('2016-10-15')->toDateTimeString(); //2016-10-15 00:00:00
echo Carbon::parse('2016-10-15 00:10:25')->toDateTimeString(); //2016-10-15 00:10:25

echo Carbon::parse('today')->toDateTimeString(); //2016-10-15 00:00:00
echo Carbon::parse('yesterday')->toDateTimeString(); //2016-10-14 00:00:00
echo Carbon::parse('tomorrow')->toDateTimeString(); //2016-10-16 00:00:00
echo Carbon::parse('2 days ago')->toDateTimeString(); //2016-10-13 20:49:53
echo Carbon::parse('+3 days')->toDateTimeString(); //2016-10-18 20:49:53
echo Carbon::parse('+2 weeks')->toDateTimeString(); //2016-10-29 20:49:53
echo Carbon::parse('+4 months')->toDateTimeString(); //2017-02-15 20:49:53
echo Carbon::parse('-1 year')->toDateTimeString(); //2015-10-15 20:49:53
echo Carbon::parse('next wednesday')->toDateTimeString(); //2016-10-19 00:00:00
echo Carbon::parse('last friday')->toDateTimeString(); //2016-10-14 00:00:00
```

## 2.4 构造日期

你还可以使用单独的年月日来构造日期：

```
$year = '2015';
$month = '04';
$day = '12';

echo Carbon::createFromDate($year, $month, $day); //2015-04-12 20:55:59

$hour = '02';
$minute = '15':
$second = '30';

echo Carbon::create($year, $month, $day, $hour, $minute, $second); //2015-04-12 02:15:30

echo Carbon::createFromDate(null, 12, 25);  // 年默认为当前年份
```

此外，还可以传递一个有效的时区作为最后一个参数。

## 2.5 日期操作

日期操作可以通过 `add`（增加）或 `sub`（减去）跟上要增加或减去的单位来完成。例如，你想给一个日期增加指定的天数，你可以使用 `addDays`方法。此外还提供了一个`modify`方法，参数格式为 `+`或 `-` 跟上值及单位。所以，如果你想给当前日期增加一年，你可以传递`+1 year`：

```
echo Carbon::now()->addDays(25); //2016-11-09 14:00:01
echo Carbon::now()->addWeeks(3); //2016-11-05 14:00:01
echo Carbon::now()->addHours(25); //2016-10-16 15:00:01
echo Carbon::now()->subHours(2); //2016-10-15 12:00:01
echo Carbon::now()->addHours(2)->addMinutes(12); //2016-10-15 16:12:01
echo Carbon::now()->modify('+15 days'); //2016-10-30 14:00:01
echo Carbon::now()->modify('-2 days'); //2016-10-13 14:00:01
```

## 2.6 日期比较

在 `Carbon`中你可以使用下面的方法来比较日期：

*   min –返回最小日期。
*   max – 返回最大日期。
*   eq – 判断两个日期是否相等。
*   gt – 判断第一个日期是否比第二个日期大。
*   lt – 判断第一个日期是否比第二个日期小。
*   gte – 判断第一个日期是否大于等于第二个日期。
*   lte – 判断第一个日期是否小于等于第二个日期。

```
echo Carbon::now()->tzName;                        // America/Toronto
$first = Carbon::create(2012, 9, 5, 23, 26, 11);
$second = Carbon::create(2012, 9, 5, 20, 26, 11, 'America/Vancouver');

echo $first->toDateTimeString();                   // 2012-09-05 23:26:11
echo $first->tzName;                               // America/Toronto
echo $second->toDateTimeString();                  // 2012-09-05 20:26:11
echo $second->tzName;                              // America/Vancouver

var_dump($first->eq($second));                     // bool(true)
var_dump($first->ne($second));                     // bool(false)
var_dump($first->gt($second));                     // bool(false)
var_dump($first->gte($second));                    // bool(true)
var_dump($first->lt($second));                     // bool(false)
var_dump($first->lte($second));                    // bool(true)

$first->setDateTime(2012, 1, 1, 0, 0, 0);
$second->setDateTime(2012, 1, 1, 0, 0, 0);         // Remember tz is 'America/Vancouver'

var_dump($first->eq($second));                     // bool(false)
var_dump($first->ne($second));                     // bool(true)
var_dump($first->gt($second));                     // bool(false)
var_dump($first->gte($second));                    // bool(false)
var_dump($first->lt($second));                     // bool(true)
var_dump($first->lte($second));                    // bool(true)
```

要判断一个日期是否介于两个日期之间，可以使用 `between()` 方法，第三个可选参数指定比较是否可以相等，默认为`true`：

```
$first = Carbon::create(2012, 9, 5, 1);
$second = Carbon::create(2012, 9, 5, 5);
var_dump(Carbon::create(2012, 9, 5, 3)->between($first, $second));          // bool(true)
var_dump(Carbon::create(2012, 9, 5, 5)->between($first, $second));          // bool(true)
var_dump(Carbon::create(2012, 9, 5, 5)->between($first, $second, false));   // bool(false)
```

此外还提供了一些辅助方法，你可以从它们的名字中明白其含义：

```
$dt = Carbon::now();

$dt->isWeekday();
$dt->isWeekend();
$dt->isYesterday();
$dt->isToday();
$dt->isTomorrow();
$dt->isFuture();
$dt->isPast();
$dt->isLeapYear();
$dt->isSameDay(Carbon::now());
$born = Carbon::createFromDate(1987, 4, 23);
$noCake = Carbon::createFromDate(2014, 9, 26);
$yesCake = Carbon::createFromDate(2014, 4, 23);
$overTheHill = Carbon::now()->subYears(50);
var_dump($born->isBirthday($noCake));              // bool(false)
var_dump($born->isBirthday($yesCake));             // bool(true)
var_dump($overTheHill->isBirthday());              // bool(true) -> default compare it to today!
```

## 2.7 diffForHumans

“一个月前”比“30 天前”更便于阅读，很多日期库都提供了这个常见的功能，日期被解析后，有下面四种可能性：

*   当比较的时间超过当前默认时间

    *   1天前
    *   5月前
*   当用将来的时间与当前默认时间比较

    *   1小时距现在
    *   5月距现在
*   当比较的值超过另一个值

    *   1小时前
    *   5月前
*   当比较的值在另一个值之后

    *   1小时后
    *   5月后

你可以把第二个参数设置为 true 来删除“前”、“距现在”等修饰语：`diffForHumans(Carbon $other, true)`。

```
echo Carbon::now()->subDays(5)->diffForHumans();               // 5天前

echo Carbon::now()->diffForHumans(Carbon::now()->subYear());   // 1年后

$dt = Carbon::createFromDate(2011, 8, 1);

echo $dt->diffForHumans($dt->copy()->addMonth());              // 1月前
echo $dt->diffForHumans($dt->copy()->subMonth());              // 11月后

echo Carbon::now()->addSeconds(5)->diffForHumans();            // 5秒距现在

echo Carbon::now()->subDays(24)->diffForHumans();              // 3周前
echo Carbon::now()->subDays(24)->diffForHumans(null, true);    // 3周
```

## 2.8 本地化

关于时间本地化，可以参考之前写的文章：**《Laravel中Carbon时间格式本地化》**[https://9iphp.com/web/laravel/laravel-carbon-localization.html](https://9iphp.com/web/laravel/laravel-carbon-localization.html)

更多详细用法，可以参考 **Carbon 文档**。[http://carbon.nesbot.com/docs/](http://carbon.nesbot.com/docs/)

[https://9iphp.com/web/laravel/php-datetime-package-carbon.html](https://9iphp.com/web/laravel/php-datetime-package-carbon.html)
