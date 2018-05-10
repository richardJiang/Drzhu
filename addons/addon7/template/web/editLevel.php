<?php defined('SYSTEM_IN') or exit('Access Denied');?><?php  include page('header');?>

    <form action="" method="post" class="form-horizontal" enctype="multipart/form-data" >
        <h3 class="header smaller lighter blue">编辑分销等级佣金</h3>
        <div class="form-group">
            <label class="col-sm-2 control-label no-padding-left" > 一级</label>

            <div class="col-sm-9">
                <input type="text" name="first"  value="<?php  echo $arr['1'];?>" class="col-xs-10 col-sm-2" />元
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label no-padding-left" > 二级</label>

            <div class="col-sm-9">
                <input type="text" name="second"  value="<?php  echo $arr['2'];?>" class="col-xs-10 col-sm-2" />元
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label no-padding-left" > 三级</label>

            <div class="col-sm-9">
                <input type="text" name="third"  value="<?php  echo $arr['3'];?>" class="col-xs-10 col-sm-2" />元
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label no-padding-left" for="form-field-1"> </label>

            <div class="col-sm-9">
                <input name="submit" type="submit" value=" 提 交 " class="btn btn-info"/>

            </div>
        </div>

    </form>


<?php  include page('footer');?>