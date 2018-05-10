<!doctype html>
<html>
    <head>
    		<title>商品评论</title>
        <meta charset="utf-8">
            <link href="http://www.frtongfu.cn/themes/default/__RESOURCE__/plus/css/font-awesome.min.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
        <meta name="format-detection" content="telephone=no" />
			  <script type="text/javascript" src="http://www.frtongfu.cn/themes/default/__RESOURCE__/js/jquery-1.11.3.min.js"></script>
  			<script language="javascript" src="http://www.frtongfu.cn/themes/default/__RESOURCE__/plus/js/jquery.gcjs.js"></script>
        <link rel="stylesheet" type="text/css" href="http://www.frtongfu.cn/themes/default/__RESOURCE__/plus/css/style_normal.css"/>
                <link rel="stylesheet" type="text/css" href="http://www.frtongfu.cn/themes/default/__RESOURCE__/plus/css/bootstrap.min.css"/>
        <link href="http://www.frtongfu.cn/themes/default/__RESOURCE__/plus/js/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
<script src="http://www.frtongfu.cn/themes/default/__RESOURCE__/plus/js/star-rating.js" type="text/javascript"></script>

	<script src="http://www.frtongfu.cn/themes/default/__RESOURCE__/alert/jquery-confirm.min.js" type="text/javascript"></script>
	<link href="http://www.frtongfu.cn/themes/default/__RESOURCE__/alert/jquery-confirm.min.css" rel="stylesheet" type="text/css" />
    </head>
    <body><style type="text/css">
    body {margin:0px; background:#efefef; font-family:'微软雅黑'; -moz-appearance:none;width:100%;}
    a {text-decoration:none;}
 
    .comment_sub1 {height:44px; margin:14px 5px; background:#ff4f4f; border-radius:4px; text-align:center; font-size:16px; line-height:44px; color:#fff;}
    .comment_sub2 {height:44px; margin:14px 5px; background:#ddd; border-radius:4px; text-align:center; font-size:16px; line-height:44px; color:#666; border:1px solid #d4d4d4;}

    .comment_good {height:auto;padding:10px;background:#fff;  margin-top:16px; border-bottom:1px solid #eaeaea; border-top:1px solid #eaeaea;}
    .comment_good .good {height:65px;  padding:5px 0px; border-bottom:1px solid #eaeaea;}
    .comment_good .good  .img {height:50px; width:50px; float:left;}
    .comment_good .good .img img {height:100%; width:100%;}
    .comment_good .good  .info {width:100%;float:left; margin-left:-50px;margin-right:-60px;}
    .comment_good .good  .info .inner { margin-left:60px;margin-right:60px; }
    .comment_good .good .info .inner .name {height:32px; width:100%; float:left; font-size:12px; color:#555;overflow:hidden;}
    .comment_good .good  .info .inner .option {height:18px; width:100%; float:left; font-size:12px; color:#888;overflow:hidden;word-break: break-all}
    .comment_good .good  span { color:#666;}
    .comment_good .good  .price { float:right;width:60px;;height:54px;margin-left:-60px;;}
    .comment_good .good  .price .pnum { height:18px;width:100%;text-align:right;font-size:14px; }
    .comment_good .good  .price .num { height:18px;width:100%;text-align:right;}
    .comment_good .good  .price .pcomment { color:#ff6600;}

    .comment_good .text {height:34px; line-height:34px; text-align:right; font-size:16px; color:#999;}
    
    .comment_main {height:180px;padding:5px;   margin-top:14px; background:#fff; }
    .comment_main .line {height:44px; width:100%; border-bottom:1px solid #f0f0f0; line-height:44px;}
    .comment_main .line span {float:left;width:80px;}
    .comment_main .line input {float:left; height:44px; width:72%; padding:0px; margin:0px; border:0px; outline:none; font-size:16px; color:#666;padding-left:5px;}
    .comment_main .line select  {float:left; border:none;height:25px;width:72%;color:#666;font-size:16px;margin-top:10px;}
    .comment_main .line1 {width:100%; height:80px; color:#666; font-size:13px;}
    .rsreson {height:60px;line-height:22px; width:100%;padding:5px;font-size:13px; background:#fff; padding-left:2%; border:1px solid #e9e9e9; margin:14px 0px 0; -webkit-appearance: none;} 

    .comment_main .pic { border:1px solid #e9e9e9;width:100%;height:40px;border-radius:5px;color:#999;padding:3px;line-height:35px;font-size:13px;padding-left:10px;}
    .comment_main .pic span {float:left;width:150px;}
    .comment_main .pic .plus { float:right;width:30px;height:30px;border:1px solid #e9e9e9; color:#dedede;; font-size:18px;line-height:30px;text-align:center;}
    .comment_main .pic .plus i { left:7px;top:7px;}
    .comment_main .pic .images {float: right; width:auto;height:30px;}
    .comment_main .pic .images .img { float:left; position:relative;width:30px;height:30px;border:1px solid #e9e9e9;margin-right:5px;}
   .comment_main .pic .images .img img { position:absolute;top:0; width:100%;height:100%;}
    .comment_main .pic .images .img .minus { position:absolute;color:red;width:8px;height:12px;top:-15px;right:-1px;}

</style>
					
					 <div id='comment_div'>
     <div class="page_topbar" style="background: #008cd7;"  >
        <a href="javascript:;" class="back" onclick="history.back()" style="color: #fff;text-align:center;"><i class="fa fa-angle-left"></i></a>
        <div class="title" style="color: #fff;text-align:center;">商品评论</div>
    </div>


        <div class="comment_good">
            <div class="good">

                    <div class="img"  onclick="location.href='<?php  echo mobile_url('detail',array('id'=>$shop_order['goodsid']))?>'"><img src="<?php echo ATTACHMENT_WEBROOT;?><?php echo $shop_order['thumb'];?>"/></div>
                    <div class='info' onclick="location.href='<?php  echo mobile_url('detail',array('id'=>$shop_order['goodsid']))?>'">
                        <div class='inner'>
                               <div class="name"><?php echo $shop_order['title'];?></div>   
                                
                               <div class='option'><?php if(!empty($shop_order['optionname'])) {?>规格：<?php  echo $shop_order['optionname'];?><?php } ?> </div>
                        </div>
                    </div>
                    <div class="price">
                        <div class='pnum'><span class='marketprice'>￥<?php echo $shop_order['price'];?></span></div>
                        <div class='pnum'><span class='total'>×<?php echo $shop_order['total'];?></span></div>
                        <div class='pnum pcomment'>评价</div>
                    </div>
                </div>
           
           
        </div>
        <form action='' method="post" >
            <div class="comment_main" data-ogid='0'>
                <div class="line"> <input id="level"  value="0" name="rate" type="number" class="rating" min=0 max=5 step=1 data-size="xs" ></div>
                <div class="line1">
                	
                	<input  type="text" placeholder="说点什么吧~~" name="rsreson" class="rsreson"  /></div>
                </div>
    </div>
    <div class="comment_sub1" id='comment_submit' onclick="subform();">提交评论</div>
    <button type="submit" id='submit'  name="submit" value="yes" style="display:none" >x</button>
</div>
</form>
					<script>
						function subform()
						{
						
						  if($("#level").length>0 && $("#level").val()=='0'){
                   $.alert('请选择评分');
                    return;
                }
                $('#submit').click();
						}
						</script>
    
<?php include themePage('footer');?>
<?php include themePage('weixinshare');?>
<?php  include page('footer');?>	
