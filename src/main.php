<?php
require_once 'fileOption.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
define('HOST', "localhost");
$responseModule = array(
    'body'=>array(
        'userInfo'=>array(
            'userId'=>'',
            'right'=>'',
            'score'=>''
        )
    ),
    'status'=>''
);

$action = $_GET['action'];

if ($action == 'getUserInfo') { 
    $user = stripslashes(trim($_GET['userId'])); 
    $pass = stripslashes(trim($_GET['pwd'])); 
    $userInfo =  array(
        'userId'=>'',
        'right'=>'',
        'score'=>''
    );
    
    $userInfo['userId'] = $user;
    $userInfo['score'] = 100;
    
    $response = array(
        'body'=>array(
            'userInfo'=>$userInfo
        ),
        'status'=>''
    );
    $response['status'] = '0000';
    $rtn =  json_encode($response);
    echo $rtn;
}else if( $action == 'getFileList'){
    $pathName = $_GET['pathName'];
    $fileList = fileOption::getFileList($pathName);
    $rtn =  json_encode($fileList);
    
    $rtn = iconv("GB2312", "UTF-8", $rtn); 
    echo $rtn;
}
?>
