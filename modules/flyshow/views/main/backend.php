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
    <div id="d-editshow">
			<input id='s1' type="checkbox" class="d-scbu d-scboxinput" />
      <div class="d-slidbar">
        <div>
					<label for="s1" class="d-scbox">
						<b class="d-scbu scsleft">▷</b>
						<b class="d-scbu scsdown">▽</b>
					</label>
				</div>
				<div><img src="/vstyle/img/homepage.jpg"/></div>
        <div>封面</div>
				  <div>封面2</div>
				<div class="d-sedit"><i>edit</i></div>
      </div>
			<div class="d-slidbox">
				<input id='s2' type="checkbox" class="d-scbu d-scboxinput" />
				<div class="d-slidbar">
					<div>
						<label for="s2" class="d-scbox">
							<b class="d-scbu scsleft">▷</b>
							<b class="d-scbu scsdown">▽</b>
						</label>
					</div>
					<div><img src="/vstyle/img/homepage.jpg"/></div>
	        <div>封面</div>
					<div class="d-sedit"><i>edit</i></div>
				</div>
				<div class="d-slidbox">

				</div>
				<!-- //scond -->
				<input id='s3' type="checkbox" class="d-scbu d-scboxinput" />
				<div class="d-slidbar">
					<div>
						<label for="s3" class="d-scbox">
							<b class="d-scbu scsleft">▷</b>
							<b class="d-scbu scsdown">▽</b>
						</label>
					</div>
					<div><img src="/vstyle/img/homepage.jpg"/></div>
	        <div>封面</div>
					<div class="d-sedit"><i>edit</i></div>
				</div>
				<div class="d-slidbox">
					<!-- lastd-slidbox -->
					<div class="d-lastslide">
						<div><img src="/vstyle/img/homepage.jpg"/></div>
						<div>封面封面1</div>
						<div>介绍封面介绍封面介绍封面介绍封面介绍封面介绍封面介绍封面介绍封面</div>
						<div class="d-sdrag"></div>
						<div class="d-strush"><i>delete</i></div>
						<div class="d-sedit"><i>edit</i></div>
					</div>
					<!-- lastd-slidboxend -->
					<!-- lastd-slidbox -->
					<div class="d-lastslide">
						<div><img src="/vstyle/img/homepage.jpg"/></div>
						<div>封面封面2</div>
						<div>介绍封面介绍封面介绍封面介绍封面介绍封面介绍封面介绍封面介绍封面</div>
						<div class="d-sdrag"></div>
						<div class="d-strush"><i>delete</i></div>
						<div class="d-sedit"><i>edit</i></div>
					</div>
					<!-- lastd-slidboxend -->
					<!-- lastd-slidbox -->
					<div class="d-lastslide">
						<div><img src="/vstyle/img/homepage.jpg"/></div>
						<div>封面封面3</div>
						<div>介绍封面介绍封面介绍封面介绍封面介绍封面介绍封面介绍封面介绍封面</div>
						<div class="d-sdrag"></div>
						<div class="d-strush"><i>delete</i></div>
						<div class="d-sedit"><i>edit</i></div>
					</div>
					<!-- lastd-slidboxend -->
					<div class="d-lastslide">
						<div><img src="/vstyle/img/homepage.jpg"/></div>
						<div>封面封面4</div>
						<div>介绍封面介绍封面介绍封面介绍封面介绍封面介绍封面介绍封面介绍封面</div>
						<div class="d-sdrag"></div>
						<div class="d-strush"><i>delete</i></div>
						<div class="d-sedit"><i>edit</i></div>
					</div>
					<!-- lastd-slidboxend -->
				</div>
			</div>
      <div></div>
    </div>
  </div>
<div class="remodal-bg">
	<div class="remodal" data-remodal-id="S1modal">
	  <button data-remodal-action="close" class="remodal-close"></button>
	  <h1>Edit First Page</h1>
	  <div class="editimg">
			<img src="/vstyle/img/homepage.jpg" />
			<span>×</span>
		</div>
	  <br>
		<div class="editconect">
			<dl>
				<dt>Name:</dt>
				<dd><input class="sname" type="text" placeholder="Name"></dd>
			</dl>
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
			<img src="/vstyle/img/homepage.jpg" />
			<span>×</span>
		</div>
	  <br>
		<div class="editconect">
			<dl>
				<dt>Name:</dt>
				<dd><input class="sname" type="text" placeholder="Name"></dd>
			</dl>
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
			<input type="file" />
		</div>
	  <br>
		<div class="editconect">
			<dl>
				<dt>Name:</dt>
				<dd><input class="sname" type="text" placeholder="Name"></dd>
			</dl>
		</div>
		<br>
		<button data-remodal-action="cancel" class="remodal-cancel">Cancel</button>
		<button id="S3modalsave" class="remodal-confirm">SAVE</button>
	</div>
</div>
<!-- warningpopup -->
<div id="warningpopup"></div>
<!-- warningpopup end -->
</body>
</html>
