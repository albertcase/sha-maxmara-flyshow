<?php
require '../models/MyZebraImage.php';

// url = style=w_$width,h_$height&image=$path
$path = $_GET['image']?$_GET['image']:'';
$style = $_GET['style']?$_GET['style']:'';
$path = ltrim($path, '/');
if(strpos(realpath($path),dirname(__FILE__)) === false){//file not in the up folder
  Header ('Content-type:image/jpg');
  print file_get_contents("source/img/unknowimage.jpg");
  exit;
}

if(isset($_SERVER['HTTP_REFERER'])){// refuse cross-domain request
  preg_match_all("/^http[s]?:\/\/(.*)\/.*/", $_SERVER['HTTP_REFERER'], $host, PREG_SET_ORDER);
  if($host['0']['1'] != $_SERVER['HTTP_HOST']){
    Header ('Content-type:image/jpg');
    print file_get_contents("source/img/unknowimage.jpg");
    exit;
  }
}

if(!file_exists($path)){//not exist
  Header ('Content-type:image/jpg');
  print file_get_contents("source/img/unknowimage.jpg");
  exit;
}

$ar = explode(",", $style);
$out = array();
foreach($ar as $x){
  $x_do = explode("_", $x);
  if(count($x_do) == 2)
    $out[$x_do['0']] = $x_do['1'];
}

$outpath = dirname(realpath($path))."/";
$opath = $outpath;
if(isset($out['w']))
  $outpath = $outpath.'w'.$out['w'];
if(isset($out['h']))
  $outpath = $outpath.'h'.$out['h'];

$image = new MyZebraImage($path);
Header ('Content-type:'.$image->mimeType($image->checkImagetype()));
if($outpath == $opath || !file_exists($outpath)){
  print file_get_contents($path);
  exit;
}

$outpath = $outpath.'/'.$image->getImagename();
if(file_exists($outpath)){
  print file_get_contents($outpath);
  exit;
}

$image->resizeOnall($outpath, isset($out['w'])?$out['w']:0, isset($out['h'])?$out['h']:0);
print file_get_contents($outpath);
