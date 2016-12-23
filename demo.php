<?php
require 'vendor/autoload.php';
\houdunwang\response\Response::sendHttpStatus(404);
\houdunwang\response\Response::ajax(['name'=>'后盾网'],'xml');