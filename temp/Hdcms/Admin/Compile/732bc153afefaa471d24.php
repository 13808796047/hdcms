<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
		<title>栏目列表</title>
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
		<style type="text/css">
			img.explodeCategory{
				cursor: pointer;
			}
		</style>
	</head>
	<body>
		<form action='<?php echo U('BulkEdit');?>' method="post">
			<div class="wrap">
				<div class="menu_list">
					<ul>
						<li>
							<a href="<?php echo U(index);?>" class="action">
								栏目列表
							</a>
						</li>
						<li>
							<a href="<?php echo U('add');?>">
								添加顶级栏目
							</a>
						</li>
						<li>
							<a href="javascript:hd_ajax('<?php echo U(updateCache);?>')">
								更新栏目缓存
							</a>
						</li>
					</ul>
				</div>
				<table class="table2 hd-form">
					<thead>
						<tr>
							<td class="w30">
							<input type="checkbox" class="select_all"/>
							</td>
							<td class="w30">CID</td>
							<td class="w50">排序</td>
							<td>栏目名称</td>
							<td class="w100">类型</td>
							<td class="w100">模型</td>
							<td class="w180">操作</td>
						</tr>
					</thead>
					<tbody>
						<?php $hd["list"]["c"]["total"]=0;if(isset($category) && !empty($category)):$_id_c=0;$_index_c=0;$lastc=min(1000,count($category));
$hd["list"]["c"]["first"]=true;
$hd["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$hd["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($category,0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$hd["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$hd["list"]["c"]["last"]=true;endif;?>

							<tr <?php if($c['pid'] == 0){?>class="top"<?php }?>>
								<td>
									<input type="checkbox" name="cid[]" value="<?php echo $c['cid'];?>"/>
								</td>
								<td><?php echo $c['cid'];?></td>
								<td>
									<input type="text" class="w30" value="<?php echo $c['catorder'];?>" name="list_order[<?php echo $c['cid'];?>]"/>
								</td>
								<td>
									<?php if($c['pid'] == 0){?>
										<img src="http://127.0.0.1/hdcms/hd/Hdcms/Admin/Tpl/Category/img/contract.gif" action="2" class="explodeCategory"/>
									<?php }?>
									<?php echo $c['_name'];?>
								</td>
								<td><?php echo $c['cat_type_name'];?></td>
								<td><?php echo $c['model_name'];?></td>
								<td>
								<a href="<?php echo Url::getCategoryUrl($c)?>" target="_blank">
									访问
								</a>
									<span class="line">|</span>
								<a href="<?php echo U('add',array('pid'=>$c['cid'],'mid'=>$c['mid']));?>">
									添加子栏目
								</a>
									<span class="line">|</span>
								<a href="<?php echo U('edit',array('cid'=>$c['cid']));?>">
									修改
								</a>
									<span class="line">|</span>
								<a href="javascript:hd_confirm('确证删除吗？',function(){hd_ajax(CONTROL + '&m=del', {cid: <?php echo $c['cid'];?>,mid: <?php echo $c['mid'];?>})})">
									删除
								</a></td>
							</tr>
						<?php $hd["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
					</tbody>
				</table>
				<div class="h60"></div>
			</div>
			<div class="position-bottom">
				<input type="button" class="hd-cancel" onclick="select_all(1)" value='全选'/>
				<input type="button" class="hd-cancel" onclick="select_all(0)" value='反选'/>
				<input type="button" class="hd-cancel" onclick="updateOrder()" value="更改排序"/>
				<input type="button" class="hd-cancel" onclick="BulkEdit()" value="批量编辑"/>				
			</div>
		</form>
		<script>
//展开栏目
$(".explodeCategory").click(function(){
	var action=parseInt($(this).attr("action"));
	var tr= $(this).parents('tr').eq(0);
	switch(action){
		case 1://展示
			$(tr).nextUntil('.top').show();
			$(this).attr('action',2);
			$(this).attr('src',"http://127.0.0.1/hdcms/hd/Hdcms/Admin/Tpl/Category/img/contract.gif");
			break;
		case 2://收缩
			$(tr).nextUntil('.top').hide();
			$(this).attr('action',1);
			$(this).attr('src',"http://127.0.0.1/hdcms/hd/Hdcms/Admin/Tpl/Category/img/explode.gif");
			break;
	}
})
//更新排序
function updateOrder() {
    //栏目检测
    if ($("input[type='text']").length == 0) {
        alert('没有栏目用于排序');
        return false;
    }
    var post = $("input[type='text']").serialize();
    hd_ajax(CONTROL + '&m=updateOrder', post);
}
//点击input表单实现 全选或反选
$(function () {
    //全选
    $("input.select_all").click(function () {
        $("[type='checkbox']").attr("checked",$(this).attr('checked')=='checked');
    })
})
//全选复选框
function select_all(state){
	if(state==1){
		$("[type='checkbox']").attr("checked",state);
	}else{
		$("[type='checkbox']").attr("checked",function(){return !$(this).attr('checked')});
	}
}
//指量编辑
function BulkEdit() {
    //栏目检测
    if ($("input[type='checkbox']:checked").length == 0) {
        alert('请选择栏目');
        return false;
    }
   	$("form").trigger('submit');
}
		</script>
	</body>
</html>