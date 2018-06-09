# laravel之Blade模板

1. 输出变量：
> {{ $name }}

2. 输出js代码：
> {!! $name !!}

3. 不解析这个：
> @{{ name }}

4. 给一个默认值：
> {{ $name or "这是默认值" }}

5. 三元运算符：
> {{ isset($name) ? $name : "假就用这个" }}

6. if：
```
@if ($str > 60)
    真显示
@else
    假显示
@endif
```

7. unless: 除非/如果不 /  除…之外
```
@unless ($str > 60)
    除了 $str > 60 的,其他的都显示
@endunless
```

8. for：   
```
@for ($i = 0; $i < 10; $i++)
    {{ $i }}
@endfor
```

9. foreach：   
```
@foreach ($users as $user)
    <p> {{ $user->id }}</p>
@endforeach
```

10. forelse：是foreach 的补充，有就显示，没有就走下面的
```
@forelse ($users as $user)
    <li>有就显示 </li>
@empty
    <p>没有就走下面的</p>
@endforelse
```

11. while:
```
@while (true)
    <p>I'm looping forever.</p>
@endwhile
```

12. 引人模版：
```
@include( '路径.模版名' );
```

13. 引人内容，要替换的部分：
```
@yield('title')
@yield('content')
@section('sidebar')
    This is the master sidebar.
@show
```

14. 替换内容：
```
@extends('layouts.app') :先引入要替换的页面，像父类一样

@section('title', 'Page Title')

@section('sidebar')
    @parent   ：这个显示sidebar 中默认的内容
    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <p>This is my body content.</p>
@endsection
```
