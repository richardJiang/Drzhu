<?php
/**
 * 订单支付成功发放分销佣金
 * User: jack dou
 * Date: 2017/8/9
 * Time: 22:54
 */
class successDispatch
{
    public $payType;
    public $cms;
    public function __construct($payType, $_CMS)
    {
        $this->payType = $payType;
        $this->cms = $_CMS;
    }
    /**
     * 分销佣金
     * @param $openid
     */
    public function dispatchMoney($openid,$orderid) {

        mysqld_insert('paylog', array('typename'=>'支付成功','pdate'=>$openid."###".$orderid,'ptype'=>'success','paytype'=>'weixin',"beid"=>999));
        //支付成功，奖励一定的金钱到用户的推荐人钱包 jackdou
        //先获取分销奖励的配置
        $ordergoods = mysqld_select('select * from ' . table('shop_order_goods') . 'where orderid=:orderid',array(':orderid'=>$orderid));
		$goodsInfo = mysqld_select('select * from ' . table('shop_goods') . 'where id=:id',array(':id'=>$ordergoods["goodsid"]));
		//echo $ordersn;print_r($goodsInfo);exit;
		//
        //$level = json_decode($level['value'],true);
        $l1 = $goodsInfo['ffee']*$ordergoods['total'];
        $l2 = $goodsInfo['pfee']*$ordergoods['total'];
        $l3 = $goodsInfo['mfee']*$ordergoods['total'];
		//echo $l1;exit;
        //1级
        $member1 = mysqld_select('select * from ' . table('member') . 'where openid=:openid',array(':openid'=>$openid));
        $first = $member1['invitationCode'];
        //2级
        $member = mysqld_select('select * from ' . table('member') . 'where openid=:openid',array(':openid'=>$first));
        $second = $member['invitationCode'];
        //3级
        $member = mysqld_select('select * from ' . table('member') . 'where openid=:openid',array(':openid'=>$second));
        $third = $member['invitationCode'];
        $real1 = $member1["ffee"];
        $real2 = $member1["pfee"];
        $real3 = $member1["mfee"];
        if (!empty($first)) {
            //奖励一级推荐人
            $this->dispatch($l1,$first);
            $real1 = $member1["ffee"]+$l1;
			
        }
        if (!empty($second)) {
            //奖励二级推荐人
            $this->dispatch($l2,$second);
            $real2 = $member1["pfee"]+$l2;
        }
        if (!empty($third)) {
            //奖励三级推荐人
            $this->dispatch($l3,$third);
            $real3 = $member1["mfee"]+$l3;
        }
		//echo $real1;exit;
        ###### 分销佣金发放结束,插入单元格
        mysqld_update('member',array("ffee"=>$real1,"pfee"=>$real2,"mfee"=>$real3),array("openid"=>$openid));

    }
    public function dispatch($money,$openid)
    {
        //查询数据
        $member = mysqld_select('select * from ' . table('member') . 'where openid=:openid',array(':openid'=>$openid));
        //更新数据
        $gold = $member['gold'] + $money;
        mysqld_update('member',array('gold'=>$gold),array('openid'=>$openid));
        //日志
        mysqld_insert('paylog', array('typename'=>$openid . '账号佣金奖励到账','pdate'=>$money,'ptype'=>'success','paytype'=>$this->payType,"beid"=>$this->cms['beid']));
    }
}