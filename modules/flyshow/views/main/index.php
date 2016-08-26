
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
<script>
var pagecode = <?php print json_encode($data, JSON_UNESCAPED_UNICODE); ?>;
console.log(pagecode);
</script>
<!-- Swiper -->
<div class="swiper-container swiper-container-h">
    <div class="swiper-wrapper">
        <div class="swiper-slide">Horizontal Slide 1</div>
        <div class="swiper-slide">
            <div class="swiper-container swiper-container-v">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">Vertical Slide 1</div>
                    <div class="swiper-slide">Vertical Slide 2</div>
                    <div class="swiper-slide">Vertical Slide 3</div>
                    <div class="swiper-slide">Vertical Slide 4</div>
                    <div class="swiper-slide">Vertical Slide 5</div>
                </div>
                <div class="swiper-pagination swiper-pagination-v"></div>
            </div>
        </div>
        <div class="swiper-slide">Horizontal Slide 3</div>
        <div class="swiper-slide">Horizontal Slide 4</div>
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination swiper-pagination-h"></div>
</div>

<script src="https://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript" src="/vstyle/js/jquery.js"></script>
<script type="text/javascript" src="/vstyle/js/PxLoader.js"></script>
<script type="text/javascript" src="/vstyle/js/swiper.min.js"></script>

<!-- Initialize Swiper -->
<script>
var swiperH = new Swiper('.swiper-container-h', {
    pagination: '.swiper-pagination-h',
    paginationClickable: true,
    spaceBetween: 50
});
var swiperV = new Swiper('.swiper-container-v', {
    pagination: '.swiper-pagination-v',
    paginationClickable: true,
    direction: 'vertical',
    spaceBetween: 50
});
</script>

<!-- 横屏代码 -->
<div id="orientLayer" class="mod-orient-layer">
    <div class="mod-orient-layer__content">
        <i class="icon mod-orient-layer__icon-orient"></i>
        <div class="mod-orient-layer__desc">为了更好的体验，请使用竖屏浏览</div>
    </div>
</div>



</body>
</html>
