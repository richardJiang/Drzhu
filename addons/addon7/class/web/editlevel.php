<?php
/**
 * 修改分销等级
 * User: jackdou
 * Date: 2017/8/7
 * Time: 18:23
 */
$level = mysqld_select("select * FROM " . table('system_config')." where `name`='dispatch_level'");
$arr = array(1=>'0',2=>'0',3=>'0');
if ($level) {
    $arr = json_decode($level['value'],true);
}

  if (checksubmit("submit")) {
        $first = (int)$_GP['first'];
        $second = (int)$_GP['second'];
        $third = (int)$_GP['third'];

      $update=array(
          'value' => json_encode(array(1=>$first,2=>$second,3=>$third)),
      );

      if (empty($level)) {
          $update['name'] = 'dispatch_level';
          mysqld_insert('system_config',$update);
      } else {
          mysqld_update('system_config', $update,array('name'=>'dispatch_level'));
      }
      message('保存成功', '/index.php?mod=site&name=addon7&do=dispatchLevel&beid='.$_CMS['beid'], 'success');
  }
 include addons_page('editLevel');