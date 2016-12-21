# 响应组件

##介绍
Response组件服务用于 http响应的相关处理。 

[TOC]
#开始使用

####安装组件
使用 composer 命令进行安装或下载源代码使用。

```
composer require houdunwang/response
```
> HDPHP 框架已经内置此组件，无需要安装

####创建对象
```
$obj = new \houdunwang\response\Response();
```

##方法获取
query 方法支持点语法操作，支持多层数据获取。第一个字符为数据类型。

####获取数据
```
$obj->query('post.data.id');
```

####不存在时返回默认值
返回默认值指当数据不存在时返回设置的值，并不会更改原数据。
以下示例当 $_GET['id']不存在时返回默认值9
```
$obj->query('get.id',9);
```

####对数据函数处理
query 方法的第三个参数是一个函数名组成的数组，将对获取的数据通过函数进行处理后返回。
```
$obj->query('get.id',0,['intval','trim']);
```

##根据类型获取
系统支持使用 get,post,request,server,session,cookie,global获取同名的php全局变量数据。

####获得所有 $_GET 数据

```
$obj->get('cid',0,'intval'); 
//获取$_GET['cid']值 ，存在时使用intval函数处理，不存在时定义为0
```

####获得所有 $_POST 数据

```
$obj->post(); 
```

####获得POST变量并对数据执行函数处理

```
$obj->post('webname',NULL,['htmlspecialchars','strtoupper']); 
```

####获得POST变量, 不存时返回默认值

```
$obj->post('webname','后盾网'); 
```

####获得 $_SESSION['uid'] 值，并执行intval方法

```
$obj->session('uid',0,'intval'); 
```

####获得 $_COOKIE['cart'] 值

```
$obj->cookie('cart'); 
```

##设置
使用set 方法可以为$_GET,$_POST,$_REQUEST,$_SERVER设置数据，支持点语法设置多层数据，第一个参数为数据类型。

####设置变量数据

设置GET['a']['b'] 变量为后盾人

```
$obj->set('get.a.b','后盾人');
```

##获取客户端IP地址

```
$obj->ip();
```

##https请求检测

```
$obj->isHttps();
```
##判断是否为手机访问

```
$obj->isMobile();
```

##检测是否为微信客户端

```
$obj->isWeChat();
```

##判断请求来源是否为本站域名

```
$obj->isDomain();
```



