<?php


namespace Firebase\JWT;

use \Firebase\JWT\Jwt;
class Manipulatejwt
{
	public $jwt;
	public $decodedjwt;
	public function __construct($key = 'some_key',$payload = array(
		'username'=>'sumeet',
		'exp'=> +3600
	)){
//		$key = 'some_key';
//		$payload = array(
//			'username'=>'sumeet',
//			'exp'=> +3600
//		);
		$this->jwt = Jwt::encode($payload, $key);
		$this->decodedjwt = Jwt::decode($this->jwt, $key, array('HS256'));
//		$arr=array($jwt, $decodedjwt);
//		return $arr;
	}
	public function getjwt(){
		return $this->jwt;
	}
	public function getdecodedjwt(){
		return $this->decodedjwt;
	}
}
