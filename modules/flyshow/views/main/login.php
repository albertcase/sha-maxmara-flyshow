<!DOCTYPE HTML>
<html>
<head>
	<title>Max Mara Login</title>
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
  <script type="text/javascript" src="/vstyle/js/jquery.js"></script>
  <script type="text/javascript" src="/source/js/main.js"></script>
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
  <div class="middendiv">
    <div class="logindiv">
      <div>Please Login</div>
      <div>
          <div class="form-group">
              <input id="name" type="text" placeholder="Username">
          </div>

          <div class="form-group">
              <input id="password" type="password" placeholder="Password">
          </div>

          <div class="form-group" style="text-align:center">
              <button type="submit" class="pure-button pure-button-primary" id="loginsubmit">Login</button>
          </div>
      </div>
      <div></div>
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
