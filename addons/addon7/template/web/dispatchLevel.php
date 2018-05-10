<?php
/**
 * 分销等级模板 dispatchLevel
 * User: jackdou
 * Date: 2017/8/7
 * Time: 18:06
 */

defined('SYSTEM_IN') or exit('Access Denied');?><?php  include page('header');?>

<div class="form-group">
    <h3>分销等级说明：
    </h3>
    <p>
        分销等级表示奖励的等级，当前用户为0级，该用户的推荐人为1级，推荐人的推荐人为2级，以此类推 <br>
        奖励佣金实时打入推荐人钱包
    </p>
    <h3>
        当前分销等级奖励佣金：
    </h3>
    <p>一级：<?php echo $arr[1] ?>元</p>
    <p>二级：<?php echo $arr[2] ?>元</p>
    <p>三级：<?php echo $arr[3] ?>元</p>
    <p><a href="/index.php?mod=site&name=addon7&do=editLevel&beid=<?php echo $_CMS['beid'] ?>">修改</a></p>
</div>

<?php  include page('footer');?>