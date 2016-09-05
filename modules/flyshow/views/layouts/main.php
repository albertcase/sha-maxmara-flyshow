<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Max Mara群星璀璨</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="format-detection" content="telephone=no">
	<!--禁用手机号码链接(for iPhone)-->
	<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimum-scale=1.0,maximum-scale=1.0,minimal-ui" />
	<!--自适应设备宽度-->
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<!--控制全屏时顶部状态栏的外，默认白色-->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="Keywords" content="">
	<meta name="Description" content="...">

	<link rel="stylesheet" type="text/css" href="/vstyle/css/reset.css" />
	<link rel="stylesheet" type="text/css" href="/vstyle/css/swiper.min.css" />
	<link rel="stylesheet" type="text/css" href="/vstyle/css/style.css" />
</head>
<body>

<script src="https://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript" src="/vstyle/js/jquery.js"></script>
<script type="text/javascript" src="/vstyle/js/PxLoader.js"></script>
<script type="text/javascript" src="/vstyle/js/swiper.min.js"></script>
<script type="text/javascript" src="/vstyle/js/public.js"></script>

<!-- <div class="loading">
	<div class="cssload-loader">
		<div></div>
		<div></div>
		<div></div>
		<div></div>
		<div></div>
	</div>
</div> -->
<div class="loading">
	<div class="loadingCon">
		<img src="/vstyle/img/logo.png" width="100%" />
		<span>Loading...<em>0</em>%</span>
	</div>
	<!-- <div class="loader">
	    <div class="loader-inner"></div>
	    <div class="loader-inner"></div>
	    <div class="loader-inner"></div>
	    <div class="loader-inner"></div>
	    <div class="loader-inner"></div>
	</div> -->
</div>

<?= $content ?>

<!-- 横屏代码 -->
<div id="orientLayer" class="mod-orient-layer">
    <div class="mod-orient-layer__content">
        <i class="icon mod-orient-layer__icon-orient"></i>
        <div class="mod-orient-layer__desc">为了更好的体验，请使用竖屏浏览</div>
    </div>
</div>

</body>
</html>
