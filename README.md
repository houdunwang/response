# 响应组件

##介绍
Response组件服务用于 http响应的相关处理。 

登录 [GITHUB](https://github.com/houdunwang/response)  查看源代码

[TOC]

##安装
使用 composer 命令进行安装或下载源代码使用。

```
composer require houdunwang/response
```
> HDPHP 框架已经内置此组件，无需要安装

####响应状态码

```
$obj = new \houdunwang\response\Response();
$obj->sendHttpStatus(404);
```

####发送异步

**语法：**

```
public function ajax( $data, $type = "JSON" ) 

type指返回数据类型包括：TEXT XML JSON 默认为JSON
```

**示例**

```
$data=['name'=>'后盾网','url'=>'houdunwang.com']
$obj = new \houdunwang\response\Response();
$obj->ajax($data,'xml');
```

##HDPHP
HDPHP框架中已经内置该组件所以不需要单独安装。配置项也使用配置文件进行定义，同时已经对该组件了系统服务，调用方式建议使用服务形式调用，因为更方便不需要使用use引入类。

####框架服务
hdphp中已经该组件制作成了服务。所以使用时不需要实例化对象，可直接使用服务进行操作，以下是一个功能示例代码，其他功能请查看上面的 **使用** 章节，使用方式只是使用服务调用而不需要实例化对象调用了。

```
$data=['name'=>'后盾网','url'=>'houdunwang.com']
Response::ajax($data);
```