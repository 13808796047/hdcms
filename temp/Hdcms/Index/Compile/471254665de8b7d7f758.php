<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>网站新闻 -  传媒设计广告公司网站 个人博客</title>
	<meta content="网站新闻, " name="keywords" />
	<meta content="传媒设计广告公司网站 个人博客的网站新闻列表信息。" name="description" />
	<link rel="stylesheet" type="text/css" href="http://127.0.0.1/hdcms/template/black/style/css/css.css" />
</head>
<body >
	<div id="doc">
		<div id="hd">
			<div class="clearfix pagetitle">
				<h1 class="sitename">
					<a href="/" title="传媒设计广告公司网站 个人博客">
						<img  class="ifixpng" src="http://demo.open.www313.com/documents/show/4807/logo.jpg"  alt="传媒设计广告公司网站 个人博客" />
					</a>
				</h1>
			</div>
			<div class="clearfix sitenav">
				<div class="clearfix menu-main">
					<ul id="menuSitenav" class="clearfix">
						<li class="first-item">
							<a href="http://127.0.0.1/hdcms" class="home">
								<span>首页</span>
							</a>
						</li>
						        <?php
        $where = '';$type=strtolower(trim('top'));$cid=str_replace(' ','','');
        if(empty($cid)){
            $cid=Q('cid',NULL,'intval');
        }
        $db = M("category");
        if ($type == 'top') {
            $where = ' pid=0 ';
        }else if($cid) {
            switch ($type) {
                case 'current':
                    $where = " cid in(".$cid.")";
                    break;
                case "son":
                    $where = " pid IN(".$cid.") ";
                    break;
                case "self":
                    $pid = $db->where(intval($cid))->getField('pid');
                    $where = ' pid='.$pid;
                    break;
            }
        }
        $result = $db->where($where)->where("cat_show=1")->order()->order("catorder ASC")->limit(10)->all();
        //无结果
        if($result){
            //当前栏目,用于改变样式
            $_self_cid = isset($_REQUEST['cid'])?$_REQUEST['cid']:0;
			$categoryCache =cache('category');
            foreach ($result as $field):
                //当前栏目样式
                $field['class']=$_self_cid==$field['cid']?"":"";
                $field['caturl'] = Url::getCategoryUrl($field);
				$field['childcategory']=Data::channelList($categoryCache,$field['cid']);
            ?>
							<li >
								<a href="<?php echo $field['caturl'];?>" target="_self">
									<span><?php echo $field['catname'];?></span>
								</a>
							</li>
						<?php endforeach;}?>
					</ul>
				</div>
			</div>
			<div id="sys-banner">
				<div id="banner-main" class="banner banner-main">
					<div class="banner-inner">
						<a href="/articles" target="_self">
							<img src="http://demo.open.www313.com/documents/show/4804" width="100%" alt="" />
						</a>
					</div>
				</div>
			</div>
		</div>
		<div id="bd">
			<div id="innerpg" class="bd-inner">
				<div class="clearfix layout-innerpg">
					<div class="col-main">
						<div class="main-wrap">
							<div id='articles-list' class="block first-block">
								<div class="block-head">
									<div class="head-inner">
										<h2 class="title">网站新闻</h2>
									</div>
								</div>
								<div class="block-content clearfix">
									<div class="list-table">
										<table class="data">
											<thead>
												<tr>
													<th class="title">分类/标题</th>
													<th class="time">发布</th>
												</tr>
											</thead>
											<tbody>
											        <?php
        $mid ='';$cid='';$flag = '';$sub_channel=1;$order = 'new';
        $mid = $mid?$mid:Q('mid',1,'intval');
        $cid = $cid?$cid:Q('cid',null,'intval');
        //导入模型类
        $db =ContentViewModel::getInstance($mid);
        //主表（有表前缀）
        $table=$db->tableFull;
        //---------------------------排序Order-------------------------------
            switch($order){
                case 'hot':
                    //查看次数最多
                    $order='click DESC';
                    break;
                case 'rand':
                    //随机排序
                    $order='rand()';
                    break;
                case 'new':
                default:
                    //最新排序
                    $order='aid DESC';
                    break;
            }
        //----------------------------条件Where-------------------------------------
        $where=array();
        //子栏目处理
        if($cid){
            //查询条件
            if($sub_channel){
                $category = getCategory($cid);
                $where[]=$table.".cid IN(".implode(',',$category).")";
            }else{
                $where[]=$table.".cid IN($cid)";
            }
        }
        //指定筛选属性flag='1,2,3'时,获取指定属性的文章
        if($flag){
            $flagCache =cache($mid,false,FLAG_CACHE_PATH);
            $flag = explode(',',$flag);
            foreach($flag as $f){
                $f=$flagCache[$f-1];
                $where[]="find_in_set('$f',flag)";
            }
        }
        $where= implode(' AND ',$where);
        //-------------------------获得数据-----------------------------
        //关联表
        $join = "content_flag,category,user";
        $count = $db->join($join)->order("arc_sort ASC")->where($where)->where($table.'.content_state=1')->count($db->tableFull.'.aid');
		$categoryCache=cache('category');
		if($cid){
			$category=$categoryCache[$cid];
			if($category['cat_url_type']==2){//动态
				if(C('PATHINFO_TYPE')){
					$Url = "list_{mid}_{cid}_{page}.html";
					$pageUrl=str_replace(array('{mid}','{cid}'),array($category['mid'],$category['cid']),$Url);
				}else{
					$Url = "a=Index&c=Index&m=category&mid={mid}&cid={cid}&page={page}";
  		 			$pageUrl=str_replace(array('{mid}','{cid}'),array($category['mid'],$category['cid']),$Url);
				}
				$ROOT_URL = C('URL_REWRITE')?'':WEB_URL.'?';
				Page::$staticUrl=$ROOT_URL.$pageUrl;
			}else{//静态
				$html_path = C("HTML_PATH") ? C("HTML_PATH") . '/' : '';
				Page::$staticUrl=ROOT_URL.'/'.$html_path.str_replace(array('{catdir}','{cid}'),array($category['catdir'],$category['cid']),$category['cat_html_url']);	
			}	
		}else{//首页
			Page::$staticUrl=U('Index/Index/index',array('page'=>'{page}'));
		}
        $page= new Page($count,10);
        $result= $db->join($join)->order("arc_sort ASC")->where($where)->where($table.'.content_state=1')->order($order)->limit($page->limit())->all();
        if($result):
            //有结果集时处理
            foreach($result as $field):
                    	$field['index']=$index+1;
                        $field['title']=mb_substr($field['title'],0,80,'utf8');
                        $field['title']=$field['color']?"<span style='color:".$field['color']."'>".$field['title']."</span>":$field['title'];
                        $field['description']=mb_substr($field['description'],0,500,'utf-8');
                        $field['time']=date("Y-m-d",$field['updatetime']);
						$field['icon']=empty($field['icon'])?"http://127.0.0.1/hdcms/data/image/user/150.png":'http://127.0.0.1/hdcms/'.$field['icon'];
                        $field['date_before']=date_before($field['addtime']);
                        $field['thumb']='http://127.0.0.1/hdcms'.'/'.$field['thumb'];
                        $field['caturl']=Url::getCategoryUrl($field);
                        $field['url']=Url::getContentUrl($field);
                        if($field['new_window'] || $field['redirecturl']){
                        	$field['link']='<a href="'.$field['url'].'" target="_blank">'.$field['title'].'</a>';
						}else{
							$field['link']='<a href="'.$field['url'].'">'.$field['title'].'</a>';	
						}
            ?>
												<tr>
													<td class="title">
														<span class="catalog">
															[
															<a href="<?php echo $field['caturl'];?>" title="<?php echo $field['catname'];?>"><?php echo $field['catname'];?></a>
															]
														</span>
														<a href="<?php echo $field['url'];?>" target="_blank" title="<?php echo $field['title'];?>">
															<span class="style1"><?php echo $field['title'];?></span>
														</a>
													</td>
													<td><?php echo date('Y-m-d H:i:s',$field['addtime']);?></td>
												</tr>
												<?php endforeach;endif?>
											</tbody>
										</table>
										        <?php if(is_object($page)){
            echo $page->show(2,6);
            }
        ?>
									</div>

								</div>
								<div class="block-foot">
									<div>
										<div>-</div>
									</div>
								</div>
							</div>

						</div>
					</div>
					<div class="col-sub">
						<div class="block first-block block-articles " id="block-articles-71352" rel="71352">
							<div class="block-head">
								<div class="head-inner">
									<h2 class="title">文章分类</h2>
									<div class="links">
										<a class="more" href="/articles">更多</a>
									</div>
								</div>
							</div>
							<div class="block-content clearfix">
								<div class="item-list">
									<ul class="clearfix">
									        <?php
        $where = '';$type=strtolower(trim('son'));$cid=str_replace(' ','','');
        if(empty($cid)){
            $cid=Q('cid',NULL,'intval');
        }
        $db = M("category");
        if ($type == 'top') {
            $where = ' pid=0 ';
        }else if($cid) {
            switch ($type) {
                case 'current':
                    $where = " cid in(".$cid.")";
                    break;
                case "son":
                    $where = " pid IN(".$cid.") ";
                    break;
                case "self":
                    $pid = $db->where(intval($cid))->getField('pid');
                    $where = ' pid='.$pid;
                    break;
            }
        }
        $result = $db->where($where)->where("cat_show=1")->order()->order("catorder ASC")->limit(10)->all();
        //无结果
        if($result){
            //当前栏目,用于改变样式
            $_self_cid = isset($_REQUEST['cid'])?$_REQUEST['cid']:0;
			$categoryCache =cache('category');
            foreach ($result as $field):
                //当前栏目样式
                $field['class']=$_self_cid==$field['cid']?"":"";
                $field['caturl'] = Url::getCategoryUrl($field);
				$field['childcategory']=Data::channelList($categoryCache,$field['cid']);
            ?>
										<li>
											<a title="<?php echo $field['catname'];?>" href="<?php echo $field['caturl'];?>"><?php echo $field['catname'];?></a>
										</li>
									<?php endforeach;}?>
									</ul>
								</div>
							</div>
							<div class="block-foot">
								<div>
									<div>-</div>
								</div>
							</div>
						</div>
						<div class="block last-block block-diy " id="block-diy-71360" rel="71360">
							<div class="block-head">
								<div class="head-inner">
									<h2 class="title">联系我们</h2>

								</div>
							</div>
							<div class="block-content clearfix">
								<div class="content-text">
									<p>
										地址：**********路123号
										<br />
										电话：86-0571-98888888
										<br />
										传真：86-0571-9888888&nbsp;
										<br />
										邮箱：contact@abcd.com
										<BR <a href="http://wpa.qq.com/msgrd?v=3&amp;uin=304784300&amp;site=qq&amp;menu=yes" target="_blank">
										<img title="点击这里给我发消息" border="0" alt="点击这里给我发消息" src="http://wpa.qq.com/pa?p=2:304784300:47" />
									</a>
									<a href="http://wpa.qq.com/msgrd?v=3&amp;uin=304784300&amp;site=qq&amp;menu=yes" target="_blank">
										<img title="点击这里给我发消息" border="0" alt="点击这里给我发消息" src="http://wpa.qq.com/pa?p=2:304784300:47" />
									</a>
								</p>
							</div>
						</div>
						<div class="block-foot">
							<div>
								<div></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="ft">
		<div class="ft-inner">
			<div class="ft-menu"  id="ft-menu">
				<a href="/page/lianxiwomen" target="_self">联系我们</a>
				|
				<a href="/page/gongsijieshao" target="_self">公司介绍</a>
				|
				<a href="/articles" target="_self">网站新闻</a>
				|
				<a href="/books" target="_self">留言系统</a>
				|
				<a href="/links" target="_self">友情链接</a>
			</div>

		</div>
	</div>
</div>