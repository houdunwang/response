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

####响应状态码

```
\houdunwang\response\Response::sendHttpStatus(404);
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
\houdunwang\response\Response::ajax($data,'xml');
```


