<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>工商部门清理广告牌 -  传媒设计广告公司网站 个人博客</title>
	<meta content=",网站新闻,网站新闻 " name="keywords" />
	<meta content="" name="description" />

	<link rel="stylesheet" type="text/css" href="http://6616.open.www313.com/themed/16615_20130718112437_publish/css/style.css?1351220518" />
	<script type="text/javascript" src="http://6616.open.www313.com/themed/common/js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="http://6616.open.www313.com/themed/common/js/lang-chi.min.js"></script>
	<script type="text/javascript" src="http://6616.open.www313.com/themed/common/js/common.min.js"></script>
	<script type="text/javascript" src="http://6616.open.www313.com/themed/common/js/overlay.min.js"></script>

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
						<a href="/articles/meitibaodao/60970.html" target="_self">
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

							<div id='article-view' class="block first-block block-article-view">
								<div class="block-head">
									<div class="head-inner">
										<h2 class="title">媒体报道</h2>
										<div class="links">
											<a href="/articles">返回列表</a>
										</div>
									</div>
								</div>
								<div class="block-content clearfix">
									<div class="article-head">
										<h1 class="title"><?php echo $hdcms['title'];?></h1>
										<div class="meta">
											<span class="item">分类：<?php echo $hdcms['catname'];?></span>
											<span class="item">
												作者：
												<span class="yellow"><?php echo $hdcms['username'];?></span>
											</span>
											<span class="item">来源：<?php echo $hdcms['source'];?></span>
											<span class="item">點擊數：
											<script type="text/javascript" src="http://127.0.0.1/hdcms/index.php?a=Index&c=Index&m=getClick&mid=<?php echo $hdcms['
											mid'];?>&cid=<?php echo $hdcms['cid'];?>&aid=<?php echo $hdcms['aid'];?>">
											</script>
											</span>
											<span class="item">
												发布：
												<span class="grey"><?php echo date('Y-m-d H:i:s',$hdcms['addtime']);?></span>
											</span>
										</div>
									</div>
									<div class="article-content clearfix" style="padding-top:20px;">
										记者&nbsp;方元&nbsp;见习记者&nbsp;王佳&nbsp;&nbsp;通讯员&nbsp;许欢&nbsp;报道：上周一至昨日，市工商局对城区擅自发布、胡乱张贴的违规户外广告进行了集中清理，5000余个户外广告被拆除或更换。&nbsp;&nbsp;
										<br />
										<br />
										<br />
										<br />
										&nbsp;&nbsp;&nbsp;&nbsp;执法人员检查发现，违规户外广告中，未经审批擅自发布的占大多数，&nbsp;执法人员勒令限期拆除。一些户外广告存在陈旧破损，如天津路沿线农家乐悬挂着“某酒”字样灯笼，很多已破败不堪，执法人员现场予以拆除。
									</div>
									<div class="pages2"></div>
								</div>
								<div class="block-foot">
									<div>
										<div>-</div>
									</div>
								</div>
							</div>
							<div id="block-comments" class="block block-comments" rel="articles">
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
										<li>
											<a title="国内新闻" href="/articles/guoneixinwen/index.html">国内新闻</a>
										</li>
										<li>
											<a title="国际新闻" href="/articles/guojixinwen/index.html">国际新闻</a>
										</li>
										<li>
											<a title="公司新闻" href="/articles/gongsixinwen/index.html">公司新闻</a>
										</li>
										<li>
											<a title="媒体报道" href="/articles/meitibaodao/index.html">媒体报道</a>
										</li>
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

</body>
</html>