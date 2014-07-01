<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>插件列表</title>
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
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li>
                <a class="action" href="<?php echo U('plugin_list');?>">插件列表</a>
            </li>
        </ul>
    </div>
    <table class="table2 hd-form">
        <thead>
        <tr>
            <td>插件名称</td>
            <td class="w150">版本号</td>
            <td class="w150">发布时间</td>
            <td class="w150">开发团队</td>
            <td class="w150">插件状态</td>
            <td class="w100">插件目录</td>
            <td class="w50">管理</td>
        </tr>
        </thead>
        <tbody>
        <?php $hd["list"]["p"]["total"]=0;if(isset($plugin) && !empty($plugin)):$_id_p=0;$_index_p=0;$lastp=min(1000,count($plugin));
$hd["list"]["p"]["first"]=true;
$hd["list"]["p"]["last"]=false;
$_total_p=ceil($lastp/1);$hd["list"]["p"]["total"]=$_total_p;
$_data_p = array_slice($plugin,0,$lastp);
if(count($_data_p)==0):echo "";
else:
foreach($_data_p as $key=>$p):
if(($_id_p)%1==0):$_id_p++;else:$_id_p++;continue;endif;
$hd["list"]["p"]["index"]=++$_index_p;
if($_index_p>=$_total_p):$hd["list"]["p"]["last"]=true;endif;?>

            <tr>
                <td><?php echo $p['name'];?></td>
                <td><?php echo $p['version'];?></td>
                <td><?php echo $p['pubdate'];?></td>
                <td><?php echo $p['team'];?></td>
                <td>
                	<?php if($p['installed'] == 1){?>
                		<font color='green'>已安装</font>
						<a href='http://127.0.0.1/hdcms/index.php?a=Admin&c=Plugin&m=uninstall&plugin=<?php echo $p['dirname'];?>' style='color:green'>
						<u>卸载</u>
						</a>
                		<?php  }else{ ?>
                		未安装
 					<a href='http://127.0.0.1/hdcms/index.php?a=Admin&c=Plugin&m=install&plugin=<?php echo $p['dirname'];?>'><u>安装</u></a>
                	<?php }?>
                </td>
                <td><?php echo $p['app'];?></td>
                <td>
                    <a href="<?php echo U('Plugin/help',array('plugin'=>$p['app']));?>">使用说明</a>
                </td>
            </tr>
        <?php $hd["list"]["p"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
        </tbody>
    </table>
</div>
</body>
</html>