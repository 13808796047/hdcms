<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
		<title>生成首页</title>
		<script type='text/javascript' src='http://127.0.0.1/hdcms/hd/HDPHP/hdphp/Extend/Org/Jquery/jquery-1.8.2.min.js'></script>
<link href='http://127.0.0.1/hdcms/hd/HDPHP/hdphp/../hdjs/css/hdjs.css' rel='stylesheet' media='screen'>
<script src='http://127.0.0.1/hdcms/hd/HDPHP/hdphp/../hdjs/js/hdjs.js'></script>
<script src='http://127.0.0.1/hdcms/hd/HDPHP/hdphp/../hdjs/js/slide.js'></script>
<script src='http://127.0.0.1/hdcms/hd/HDPHP/hdphp/../hdjs/org/cal/lhgcalendar.min.js'></script>
<script type='text/javascript'>
HOST = '<?php echo $GLOBALS['user']['HOST'];?>';
ROOT = '<?php echo $GLOBALS['user']['ROOT'];?>';
WEB = '<?php echo $GLOBALS['user']['WEB'];?>';
URL = '<?php echo $GLOBALS['user']['URL'];?>';
HDPHP = '<?php echo $GLOBALS['user']['HDPHP'];?>';
HDPHPDATA = '<?php echo $GLOBALS['user']['HDPHPDATA'];?>';
HDPHPTPL = '<?php echo $GLOBALS['user']['HDPHPTPL'];?>';
HDPHPEXTEND = '<?php echo $GLOBALS['user']['HDPHPEXTEND'];?>';
APP = '<?php echo $GLOBALS['user']['APP'];?>';
CONTROL = '<?php echo $GLOBALS['user']['CONTROL'];?>';
METH = '<?php echo $GLOBALS['user']['METH'];?>';
GROUP = '<?php echo $GLOBALS['user']['GROUP'];?>';
TPL = '<?php echo $GLOBALS['user']['TPL'];?>';
CONTROLTPL = '<?php echo $GLOBALS['user']['CONTROLTPL'];?>';
STATIC = '<?php echo $GLOBALS['user']['STATIC'];?>';
PUBLIC = '<?php echo $GLOBALS['user']['PUBLIC'];?>';
HISTORY = '<?php echo $GLOBALS['user']['HISTORY'];?>';
HTTPREFERER = '<?php echo $GLOBALS['user']['HTTPREFERER'];?>';
TEMPLATE = '<?php echo $GLOBALS['user']['TEMPLATE'];?>';
ROOTURL = '<?php echo $GLOBALS['user']['ROOTURL'];?>';
WEBURL = '<?php echo $GLOBALS['user']['WEBURL'];?>';
CONTROLURL = '<?php echo $GLOBALS['user']['CONTROLURL'];?>';
</script>
	</head>
	<body>
		<form method="post" action="<?php echo U('index');?>" class="hd-form">
			<div class="wrap">
				<div class="title-header">
					温馨提示
				</div>
				<div class="help">
					首次安装必须更新全站缓存
				</div>
				<div class="title-header">
					更新缓存
				</div>
				<style type="text/css">
					table.table2 td{
						height:35px;
					}
				</style>
				<table class="table1">
					<tr>
						<th class="w100">选择更新</th>
						<td>
						<table class="table2">
							<tr>
								<td><label>
									<input type="checkbox" name="Action[]" value="Config" checked=''/>
									更新网站配置 </label></td>
							</tr>
							<tr>
								<td><label>
									<input type="checkbox" name="Action[]" value="Model" checked=''/>
									内容模型 </label></td>
							</tr>
							<tr>
								<td><label>
									<input type="checkbox" name="Action[]" value="Field" checked=''/>
									模型字段 </label></td>
							</tr>
							<tr>
								<td><label>
									<input type="checkbox" name="Action[]" value="Category" checked=''/>
									栏目缓存 </label></td>
							</tr>
							<tr>
								<td><label>
									<input type="checkbox" name="Action[]" value="Table" checked=''/>
									数据表缓存 </label></td>
							</tr>
							<tr>
								<td><label>
									<input type="checkbox" name="Action[]" value="Node" checked=''/>
									权限节点 </label></td>
							</tr>
							<tr>
								<td><label>
									<input type="checkbox" name="Action[]" value="Role" checked=''/>
									会员角色 </label></td>
							</tr>
							<tr>
								<td><label>
									<input type="checkbox" name="Action[]" value="Flag" checked=''/>
									内容FLAG </label></td>
							</tr>
						</table></td>
					</tr>
				</table>
				<div class="position-bottom">
					<input type="submit" value="开始更新" class="hd-success"/>
				</div>
			</div>
		</form>
	</body>
</html>