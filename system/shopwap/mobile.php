<?php
defined('SYSTEM_IN') or exit('Access Denied');

require WEB_ROOT.'/system/member/lib/rank.php';
class shopwapAddons  extends BjSystemModule {
	public function do_diypage()
	{
						global $_CMS,$_GP;
						if(!empty($_GP['id']))
						{
	       		 $diyshop = mysqld_select("SELECT * FROM " . table('bj_tbk_diyshopindex')." where beid=:beid and id=:id",array(':beid'=> $_CMS['beid'],':id'=>$_GP['id'] ) );
  		}else
  		{
  			
  			 $diyshop = mysqld_select("SELECT * FROM " . table('bj_tbk_diyshopindex')." where beid=:beid and pagetype=0 order by active desc limit 1",array(':beid'=> $_CMS['beid'] ) );
  		
  		}
  		
  		
  			if(!empty($diyshop['id']))
  			{
  		
							$data=str_replace('__ATTACHMENT__',ATTACHMENT_WEBROOT,$diyshop['datas']);
				 			$diyshop['datas']=$data;
							include page('diypage_html');
							exit;
							
			}
	}
		public function do_index_pc()
	{
					$settings=globaSetting();
				$qrurl=$this->create_qrcode(WEBSITE_ROOT.mobile_url('shopindex'));
				$_SESSION['from_pc']=1;
				$isfather==1;
	        	include page('index_pc');
	}
	   function create_qrcode($homeurl,$target_file = 'shopindex_qrcode.png')
  {
  	$att_target_file = $target_file;
		$qr_dir='/cache/'.SESSION_PREFIX.'/qrcode/url/';
		$qrcode_dir=WEB_ROOT.$qr_dir;
		if(!file_exists($qrcode_dir. $att_target_file))
		{
  	include WEB_ROOT.'/includes/lib/phpqrcode/phpqrcode/phpqrcode.php';//引入PHP QR库文件
		$value=$homeurl;
		$errorCorrectionLevel = "L";
		$matrixPointSize = "4";


		if (!is_dir($qrcode_dir))
		{
			mkdirs($qrcode_dir);
		}
		$target_file = $qrcode_dir. $att_target_file;
		
		QRcode::png($value, $target_file, $errorCorrectionLevel, $matrixPointSize);
		}
  	return 	WEBSITE_ROOT.$qr_dir.$att_target_file;
  }
		public function do_time_goodlist()
	{
			$this->__mobile(__FUNCTION__);
	}
	public function do_repwd()
	{
			$this->__mobile(__FUNCTION__);
	}

			public function do_outchargegold()
	{
			$this->__mobile(__FUNCTION__);
	}
		public function do_getgoldorder()
	{
			$this->__mobile(__FUNCTION__);
	}
	public function do_third_loginqq()
	{
			$this->__mobile(__FUNCTION__);
	}
  public function do_myorder()
	{
		$this->__mobile(__FUNCTION__);
	}
	public function do_address()
	{
		$this->__mobile(__FUNCTION__);
	}
		public function do_member_pwd()
	{
		$this->__mobile(__FUNCTION__);
	}
		public function do_member()
	{
			$this->__mobile(__FUNCTION__);
	}
	 public function do_help()
	{
			$this->__mobile(__FUNCTION__);
	}
	 public function do_rechargegold()
	{	
		$this->__mobile(__FUNCTION__);
	}
	
	 public function do_pay()
	{
    	$this->__mobile(__FUNCTION__);
	}
  public function do_confirm()
	{	
			$this->__mobile(__FUNCTION__);
	}
		public function do_mycart()
	{
			$this->__mobile(__FUNCTION__);
	}
	public function do_detail()
	{
			$this->__mobile(__FUNCTION__);
	}
	public function do_listCategory()
	{
				$this->__mobile(__FUNCTION__);
	}
	public function do_goodlist()
	{
			$this->__mobile(__FUNCTION__);
	}

	public function do_shopindex()
	{
			global $_CMS;
			if(empty($_CMS['beid']))
			{
			
				header("Location:".create_url("mobile",array("name"=>"public","do"=>"index")));
				exit;
			}
			$this->__mobile(__FUNCTION__);
	}
	public function do_index()
	{
				return $this->do_shopindex();
	}
	public function do_regedit()
	{
	    global $_GP;
        //种cookie
        $openid = $_GP['invitationCode'];
        if (!empty($openid)) {
            setcookie('invitationCode',$openid,time()+365*24*60*60);
        }
	$this->__mobile(__FUNCTION__);
	}
	public function do_logout()
	{
			global $_CMS;
	
							member_logout();
		
	}
	public function do_login()
	{
	$this->__mobile(__FUNCTION__);
	}
	public function do_getorder()
	{
		
			$this->__mobile(__FUNCTION__);
		
	}
	public function do_fansindex()
	{
		$this->__mobile(__FUNCTION__);
	}

	 public function getCartTotal() {
	 			global $_CMS;
       	$member=get_member_account(false);
				$openid =$member['openid'] ;
        $cartotal = mysqld_selectcolumn("select sum(total) from " . table('shop_cart') . " where session_id='".$openid."' and beid=:beid",array(':beid'=>$_CMS['beid']));
        return empty($cartotal) ? 0 : $cartotal;
    }
   public function setOrderCredit($openid,$id , $minus = true,$remark='') {
   			global $_CMS;
  	 			$order = mysqld_select("SELECT * FROM " . table('shop_order') . " WHERE id='{$id}' and beid=:beid",array(':beid'=>$_CMS['beid']));
       		if(!empty($order['credit']))
       		{
            if ($minus) {
            	member_credit($openid,$order['credit'],'addcredit',$remark);
                
            } else {
               member_credit($openid,$order['credit'],'usecredit',$remark);
            }
          }
    }
	public function getPaytypebycode($code)
	{
				$paytype=2;
   			if($code=='delivery')
   			{
   					$paytype=3;
   			}
   				if($code=='gold')
   			{
   					$paytype=1;
   			}
   			return $paytype;
	}
	
	  //设置订单商品的库存 minus  true 减少  false 增加
    public function setOrderStock($id = '', $minus = true) {
    		updateOrderStock($id,$minus);
    }

		  public function time_tran($the_time) {

        $timediff = $the_time - time();
        $days = intval($timediff / 86400);
        if (strlen($days) <= 1) {
            $days = "0" . $days;
        }
        $remain = $timediff % 86400;
        $hours = intval($remain / 3600);
        ;
        if (strlen($hours) <= 1) {
            $hours = "0" . $hours;
        }
        $remain = $remain % 3600;
        $mins = intval($remain / 60);
        if (strlen($mins) <= 1) {
            $mins = "0" . $mins;
        }
        $secs = $remain % 60;
        if (strlen($secs) <= 1) {
            $secs = "0" . $secs;
        }
        $ret = "";
        if ($days > 0) {
            $ret.=$days . " 天 ";
        }
        if ($hours > 0) {
            $ret.=$hours . ":";
        }
        if ($mins > 0) {
            $ret.=$mins . ":";
        }

        $ret.=$secs;

        return array("倒计时 " . $ret, $timediff);
    }
    //用户中心推广码
    public function do_invitation()
    {
        global $_CMS;
        $member = get_member_account(true);
		//print_r($member);
		if(is_numeric($member["openid"])){
			$qrurl = $this->create_qrcode(WEBSITE_ROOT.mobile_url('regedit') . "&invitationCode={$member['openid']}",'invitation'.$member['openid']);
		}else{
			message('请先登录商城！', refresh(), 'error');
		}
        
        include themePage('invitation');
    }
	
	//用户中心关系树
    public function do_relationship()
    {		
		$member = get_member_account(false);
		//echo 'select * from ' . table('member') . 'where invitationCode="'.$member["openid"].'"';
		//一级用户
		$membersfirst = mysqld_selectall('select realname,mobile,openid,ffee as "money" from '.table('member').'where invitationCode=:invitationCode',array(':invitationCode'=>$member["openid"]));
		$memberSec = array();
		$memberThr = array();
		foreach($membersfirst as $v){
			//二级用户
			$sec = mysqld_selectall('select realname,mobile,openid,pfee as "money" from ' . table('member') . 'where invitationCode=:invitationCode',array(':invitationCode'=>$v["openid"]));
			$memberSec = array_merge($sec,$memberSec);
		}
		
		foreach($memberSec as $v){
			//二级用户
			$memberThr = array_merge(mysqld_selectall('select realname,mobile,openid,mfee as "money" from ' . table('member') . 'where invitationCode=:invitationCode',array(':invitationCode'=>$v["openid"])),$memberThr);
		}


		
		
        
		//print_r($membersfirst);
		//print_r($memberSec);
		//print_r($memberThr);
        include themePage('relationship');
    }
	
	//客服中心
    public function do_custom()
    {		
        include themePage('custom');
    }
	
	
	//公众号
    public function do_publicnumber()
    {		
        include themePage('publicnumber');
    }

    //公众号
    public function do_publicnumberser()
    {
        include themePage('publicnumberser');
    }

    //公众号
    public function do_market()
    {
        $openid = get_member_account(true,true);
        //print_r($openid);
        //if()
        global $_CMS,$_GP;
        if(!empty($_GP["wish"])){
            if(empty($_GP["wish"])){
                message("请填写愿望！");
            }

            if(empty($_GP["telphone"])){
                message("请填写手机号！");
            }

            $ret = mysqld_update("member",["mobile"=>$_GP['telphone'],"wish"=>$_GP["wish"]],['openid' => $openid["openid"]]);

            if($ret){
                message("成功许愿！","/");
            }else{
                message("失败！");
            }
        }
        include themePage('market');
    }
	
	

}


