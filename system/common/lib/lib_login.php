<?php
// +----------------------------------------------------------------------
// | 
// +----------------------------------------------------------------------
// | Copyright (c) 2015 http://www.baijiacms.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: baijiacms <http://www.baijiacms.com>
// +----------------------------------------------------------------------
defined('SYSTEM_IN') or exit('Access Denied');
if ( is_in_weixin()) {
if ( is_use_weixin()) {
$weixinthirdlogin = mysqld_select("SELECT id FROM " . table('thirdlogin') . " WHERE enabled=1 and `code`='weixin' and beid=:beid",array(':beid'=>$_CMS['beid']));

if(!empty($weixinthirdlogin)&&!empty($weixinthirdlogin['id']))
{
	$weixin_openid=get_weixin_openid();

	if(!empty($weixin_openid))
	{
        //邀请码
        $invitation_code = $_GP['invitationCode'];
        setcookie("invitationCode",$invitation_code,3600*24*30,"/");
        if (empty($invitation_code)) {
            $invitation_code = $_COOKIE['invitationCode'];
        }
        
		member_login_weixin($weixin_openid,$invitation_code);
	}
}
}
}


