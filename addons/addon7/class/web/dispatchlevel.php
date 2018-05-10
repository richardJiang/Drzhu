<?php
/**
 * 分销等级设置，对应后台链接
 * User: jackdou
 * Date: 2017/8/7
 * Time: 17:54
 */

$level = mysqld_select("select * FROM " . table('system_config')." where `name`='dispatch_level'");
$arr = array(1=>'0',2=>'0',3=>'0');
if ($level) {
    $arr = json_decode($level['value'],true);
}

include addons_page('dispatchLevel');