<!DOCTYPE HTML>
<html>
<head>
	<title>Max Mara Backend</title>
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
  <link rel="stylesheet" type="text/css" href="/source/css/pure-min.css" />
  <link rel="stylesheet" type="text/css" href="/source/css/main.css" />
	<link rel="stylesheet" href="/source/remodal/remodal.css">
	<link rel="stylesheet" href="/source/remodal/remodal-default-theme.css">
	<script>
		var pagecode = <?php print json_encode($data, JSON_UNESCAPED_UNICODE); ?>;
	</script>
  <script type="text/javascript" src="/vstyle/js/jquery.js"></script>
  <script type="text/javascript" src="/source/js/main.js"></script>
	<script src="/source/remodal/remodal.min.js"></script>
  <style>
  html, button, input, select, textarea, .pure-g [class *= "pure-u"] {
      /* 字体栈写在这: */
      font-family: Georgia, Times, "Times New Roman", serif;
  }
  </style>
</head>
<body>
  <div class="logimage">
    <img src="/source/img/maxmara.png"/>
  </div>
  <div class = "editslidshow">
    <div> Edit Slide Show</div>
		<div class="changeranking">
			<span>Do your want save the new ranking ?</span><button id="rangkingsave" class="remodal-confirm" style="float:right">SAVE</button>
		</div>
    <div id="d-editshow">

    </div>
  </div>
<div class="remodal-bg">
	<div class="remodal" data-remodal-id="S1modal">
	  <button data-remodal-action="close" class="remodal-close"></button>
	  <h1>Edit First Page</h1>
	  <div class="editimg">

		</div>
	  <br>
		<div class="editconect">

		</div>
		<br>
	  <button data-remodal-action="cancel" class="remodal-cancel">Cancel</button>
	  <button class="remodal-confirm" id="S1modalsave">SAVE</button>
	</div>
	<!-- //s1 -->
	<div class="remodal" data-remodal-id="S2modal">
		<button data-remodal-action="close" class="remodal-close"></button>
		<h1>Edit</h1>
		<div class="editimg">

		</div>
	  <br>
		<div class="editconect">

		</div>
		<br>
		<button data-remodal-action="cancel" class="remodal-cancel">Cancel</button>
		<button id="S2modalsave" class="remodal-confirm">SAVE</button>
	</div>
	<!-- S2 -->
	<div class="remodal" data-remodal-id="S3modal">
		<button data-remodal-action="close" class="remodal-close"></button>
		<h1>Edit</h1>
		<div class="editimg">

		</div>
	  <br>
		<div class="editconect">

		</div>
		<br>
		<button data-remodal-action="cancel" class="remodal-cancel">Cancel</button>
		<button id="S3modalsave" class="remodal-confirm">SAVE</button>
	</div>
	<!-- s3 -->
	<div class="remodal" data-remodal-id="S4modal">
		<button data-remodal-action="close" class="remodal-close"></button>
		<h1>Edit</h1>
		<div class="editimg">

		</div>
		<br>
		<div class="editconect">

		</div>
		<br>
		<button data-remodal-action="cancel" class="remodal-cancel">Cancel</button>
		<button id="S4modalsave" class="remodal-confirm">SAVE</button>
	</div>
	<!-- s4 -->
	<div class="remodal" data-remodal-id="S5modal">
		<button data-remodal-action="close" class="remodal-close"></button>
		<h1>COMFIRM DELETE</h1>
		<div class="editimg">
<!-- image -->
		</div>
		<br>
		<div class="editconect">
			<dl>
				<dt>Name:</dt>
				<dd class="ename"></dd>
			</dl>
			<dl>
				<dt>Comment:</dt>
				<dd  class="ecomment"></dd>
			</dl>
		</div>
		<br>
		<button data-remodal-action="cancel" class="remodal-cancel">Cancel</button>
		<button id="S5modalsave" class="remodal-confirm">DELETE</button>
	</div>
</div>
<!-- warningpopup -->
<div id="warningpopup"></div>
<!-- warningpopup end -->
<!-- warningpopup -->
<div id="loadingpopup" style="display:none">
	<div class="spinner"></div>
</div>
<!-- warningpopup end -->
</body>
</html>
