<?php defined('SYSTEM_IN') or exit('Access Denied');?><?php  include page('header');?>
<h3 class="header smaller lighter blue">会员管理</h3>
<link rel="stylesheet" href="http://static.runoob.com/assets/js/jquery-treeview/jquery.treeview.css" />
	<link rel="stylesheet" href="http://static.runoob.com/assets/js/jquery-treeview/screen.css" />

	<script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="http://static.runoob.com/assets/js/jquery-treeview/jquery.cookie.js"></script>
	<script src="http://static.runoob.com/assets/js/jquery-treeview/jquery.treeview.js" type="text/javascript"></script>
	
		<script type="text/javascript">
	$(document).ready(function(){
		$("#browser").treeview({
			toggle: function() {
				console.log("%s was toggled.", $(this).find(">span").text());
			}
		});

		$("#add").click(function() {
			var branches = $("<li><span class='folder'>New Sublist</span><ul>" +
				"<li><span class='file'>Item1</span></li>" +
				"<li><span class='file'>Item2</span></li></ul></li>").appendTo("#browser");
			$("#browser").treeview({
				add: branches
			});
		});
	});
	</script>
		<?php  echo $tree->get_treeview(0);echo $pager;?>
<?php  include page('footer');?>