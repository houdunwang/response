<?php
if ( ! function_exists( 'ajax' ) ) {
	/**
	 * Ajax输出
	 *
	 * @param  mixed $data 数据
	 * @param string $type 数据类型 text html xml json
	 */
	function ajax( $data, $type = "JSON" ) {
		\houdunwang\response\Response::ajax( $data, $type );
	}
}

if ( ! function_exists( 'clientIp' ) ) {
	/**
	 * 获取客户端ip
	 * @param int $type
	 *
	 * @return mixed|string
	 */
	function clientIp( $type = 0 ) {
		$type = intval( $type );
		//保存客户端IP地址
		if ( isset( $_SERVER ) ) {
			if ( isset( $_SERVER["HTTP_X_FORWARDED_FOR"] ) ) {
				$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
			} else if ( isset( $_SERVER["HTTP_CLIENT_IP"] ) ) {
				$ip = $_SERVER["HTTP_CLIENT_IP"];
			} else if ( isset( $_SERVER["REMOTE_ADDR"] ) ) {
				$ip = $_SERVER["REMOTE_ADDR"];
			} else {
				return '';
			}
		} else {
			if ( getenv( "HTTP_X_FORWARDED_FOR" ) ) {
				$ip = getenv( "HTTP_X_FORWARDED_FOR" );
			} else if ( getenv( "HTTP_CLIENT_IP" ) ) {
				$ip = getenv( "HTTP_CLIENT_IP" );
			} else if ( getenv( "REMOTE_ADDR" ) ) {
				$ip = getenv( "REMOTE_ADDR" );
			} else {
				return '';
			}
		}
		$long     = ip2long( $ip );
		$clientIp = $long ? [ $ip, $long ] : [ "0.0.0.0", 0 ];

		return $clientIp[ $type ];
	}
}