<?php
	//参数设定
	//var_dump($_FILES);
	$save_path = getcwd() . "/upload/";										//文件保存位置
	$upload_name = "file";												//form file name="Filedata";
	$max_file_size_in_bytes = 2147483647;
	$max_file_size_in_bytes_G=$max_file_size_in_bytes/(1024*1024);									//最大文件体积 2G
	$MAX_FILENAME_LENGTH = 260;												//最大文件名长度
	$valid_chars_regex = '.A-Z0-9_ !@#$%^&()+={}\[\]\',~`-';				//文件名禁用字符
	$conf['msg']=array(														//错误信息设置
		0=>"文件大小超出php.ini设置",
		1=>"无文件上传",
		2=>"文件名已存在",
		3=>"文件名不存在",
		4=>"文件体积大于 $max_file_size_in_bytes_G G",
		5=>"文件体积小于最小值",
		6=>"文件上传失败",
		7=>"文件名不合法",
	);
	$data=array();
	$data['status']=0;																//异步数据

	//判断系统变量
	if (isset($_POST["PHPSESSID"])) {
		session_id($_POST["PHPSESSID"]);
	} else if (isset($_GET["PHPSESSID"])) {
		session_id($_GET["PHPSESSID"]);
	}

	session_start();
	$POST_MAX_SIZE = ini_get('post_max_size');//获取php.ini 配置项
	$unit = strtoupper(substr($POST_MAX_SIZE, -1));
	$multiplier = ($unit == 'M' ? 1048576 : ($unit == 'K' ? 1024 : ($unit == 'G' ? 1073741824 : 1)));

	if ((int)$_SERVER['CONTENT_LENGTH'] > $multiplier*(int)$POST_MAX_SIZE && $POST_MAX_SIZE) {
		$data=array('msg'=>$conf['msg'][0]);
		ajaxreturn($data);
		exit;
	}

	//post数据判断
	if (!isset($_FILES[$upload_name])) {
		//echo '$_FILES['.$upload_name.']';
		$data=array('msg'=>$conf['msg'][1]);
		ajaxreturn($data);
		exit(0);
	} else if (isset($_FILES[$upload_name]["error"]) && $_FILES[$upload_name]["error"] != 0) {
		//$_FILES[$upload_name]["error"] == 0证明文件成功
		$data=array('msg'=>'error:'.$_FILES[$upload_name]["error"]);
		ajaxreturn($data);
		exit(0);
	} else if (!isset($_FILES[$upload_name]["tmp_name"]) || !@is_uploaded_file($_FILES[$upload_name]["tmp_name"])) {
		$data=array('msg'=>$conf['msg'][6].'0');
		ajaxreturn($data);
		exit(0);
	} else if (!isset($_FILES[$upload_name]['name'])) {
		$data=array('msg'=>$conf['msg'][3]);
		ajaxreturn($data);
		exit(0);
	}
	$file_size = @filesize($_FILES[$upload_name]["tmp_name"]);
	if (!$file_size || $file_size > $max_file_size_in_bytes) {
		$data=array('msg'=>$conf['msg'][4]);
		ajaxreturn($data);
		exit(0);
	}
	
	if ($file_size <= 0) {
		$data=array('msg'=>$conf['msg'][5]);
		ajaxreturn($data);
		exit(0);
	}


	$file_name = preg_replace('/[^'.$valid_chars_regex.']|\.+$/i', "", basename($_FILES[$upload_name]['name']));
	if (strlen($file_name) == 0 || strlen($file_name) > $MAX_FILENAME_LENGTH) {
		$data=array('msg'=>$conf['msg'][7]);
		ajaxreturn($data);
		exit(0);
	}
	if (!file_exists($save_path)){
		$data['log']='文件夹不存在';
		mkdir ($save_path); 
		$data['log'].='<br/>文件夹已创建';
	}
	if (file_exists($save_path . $file_name)) {
		$data=array('msg'=>$conf['msg'][2]);
		ajaxreturn($data);
		exit(0);
	}
	if (!@move_uploaded_file($_FILES[$upload_name]["tmp_name"], $save_path.$file_name)) {
		$data=array('msg'=>$conf['msg'][6].'1');
		ajaxreturn($data);
		exit(0);
	}else{
		$data=array('msg'=>'发送成功','status'=>1);
		ajaxreturn($data);
	}
	function ajaxreturn($data) {
		//echo $data;
		echo json_encode($data);
	}
?>
