<?php require_once('../Connections/LocalHost.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO kaizentest (name, email, message) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['name'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['message'], "text"));

  mysql_select_db($database_LocalHost, $LocalHost);
  $Result1 = mysql_query($insertSQL, $LocalHost) or die(mysql_error());

  $insertGoTo = "index.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<!doctype html>
<!--[if lt IE 7]> <html class="ie6 oldie"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Kaizen Web Design</title>
<link rel="stylesheet" type="text/css" href="../demo/style.css">
<link href="../../boilerplate.css" rel="stylesheet" type="text/css">
<link href="../kaizen.css" rel="stylesheet" type="text/css"><meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="../../style.css">
	<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
	<link href="../kaizen-bodystyle.css" rel="stylesheet" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script>
$(function() {
			var pull 		= $('#pull');
				menu 		= $('nav ul');
				menuHeight	= menu.height();

			$(pull).on('click', function(e) {
				e.preventDefault();
				menu.slideToggle();
			});

			$(window).resize(function(){
        		var w = $(window).width();
        		if(w > 320 && menu.is(':hidden')) {
        			menu.removeAttr('style');
        		}
    		});
		});
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
    } if (errors) alert('The following error(s) occurred:\n'+errors);
    document.MM_returnValue = (errors == '');
} }
    </script>
<!-- 
To learn more about the conditional comments around the html tags at the top of the file:
paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/

Do the following if you're using your customized build of modernizr (http://www.modernizr.com/):
* insert the link to your js here
* remove the link below to the html5shiv
* add the "no-js" class to the html tags at the top
* you can also remove the link to respond.min.js if you included the MQ Polyfill in your modernizr build 
-->
<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="respond.min.js"></script>

</head>
<body>
<div class="gridContainer clearfix">
  <div id="Logo"><a href="#"><img src="kaizen_logo.png" alt="Kaizen Design" width="399" height="243"></a></div>
  <div id="Slogan">
    <h1>A clever tagline goes here!</h1>
  </div>
  <div id="Navbar">	<nav class="clearfix">
		<ul class="clearfix">
			<li><a href="#">Home</a></li>
			<li><a href="#">Our Services</a></li>
			<li><a href="#">Testimonials</a></li>
			<li><a href="#">Projects</a></li>
			<li><a href="#">Contact</a></li>	
		</ul>
		<a href="#" id="pull">Menu</a>
	</nav></div>
<div id="imageslider"><img src="macbookimg.jpg" alt="Slider" width="1231" height="530"></div>
<div id="SecondDiv">
  <div id="box1"> 
    <h2 class="gridContainer clearfix underline">Who We Are</h2>
    <p>"Et nulla curabitur in consectetuer, donec at venenatis. Rutrum eget accumsan ultricies ut ipsum, pellentesque et, phasellus odio a eleifend pharetra, diam sagittis ante orci scelerisque eu nisl. Ultricies nec porta parturient volutpat dignissim eu, imperdiet ligula lacinia amet scelerisque, interdum suspendisse feugiat a, vitae justo pulvinar nullam tortor nostra wisi. Tincidunt nec quis ad ridiculus quis, taciti quis ante non mauris in, vestibulum ut orci eros risus quam, at suspendisse et senectus suscipit, et fringilla elementum nulla lorem eget. Urna recusandae lacinia nonummy, duis aenean vitae id nibh, quam quis duis pellentesque vitae sit donec, tortor habitasse pede libero amet ut wisi.</p>
  </div>
  <div id="box2">
    <h2 class="gridContainer clearfix underline">What We Do</h2>
    <p>Ut pellentesque praesent adipiscing pulvinar cursus. Ornare cras orci laoreet sem ut orci, nostra metus, libero vitae, dui sed massa commodo, cras quis massa dui vel nunc. Justo lacus maecenas. Pellentesque orci mattis, eros aliquam sit viverra. Tincidunt viverra aliquam. Arcu interdum montes, vivamus lacus adipiscing at eget, tincidunt purus suscipit consectetuer justo velit magna, in quam tempus at est nascetur dui, sit aliquet orci et quam. Sem luctus at ultricies amet velit, eget amet sit justo commodo, nullam ornare tellus non proin pulvinar nunc, a pellentesque.  Rutrum eget accumsan ultricies ut ipsum, pellentesque et.</p>
  </div>
  <div id="box3">
    <h2 class="gridContainer clearfix underline">Testimonials    </h2>
    <p>    Suscipit pharetra erat, metus ipsum in in sed vitae, nisl quam egestas, sed quis nulla. Potenti sapien turpis tempor, pretium varius cursus sit non feugiat. Quo ante vel felis, elementum vel lobortis, aliquet curabitur et id, nec orci integer donec mollis enim. Sem luctus at ultricies amet velit, eget amet sit justo commodo, nullam ornare tellus non proin pulvinar nunc, a pellentesque. Praesent in dictumst ut, elit pellentesque cubilia magna nisl, voluptatem eleifend amet, mi ac vivamus lectus officia, amet id pellentesque dignissim vero. Sit ornare sagittis sed sit malesuada neque, lectus curabitur pellentesque, mi eu ipsam, nisl tempor nec nunc libero diam elit, mattis enim vestibulum ligula sem sed vestibulum.</p>
  </div>
</div>
<div id="bottomDiv">
  <div id="bottomleft">
    <h3>From The Blog</h3>
    <p>Sit magna rutrum volutpat lacinia nisl morbi. Vulputate diam suspendisse ligula vitae ipsum interdum, id in duis vehicula, sit tempus non cum, pellentesque donec penatibus. Quis tristique odio, cras laboris ac amet mi lectus volutpat, neque massa massa. Facilisis ligula vitae condimentum habitasse sodales, odio erat lacus pellentesque, lorem id eros mauris.<br>
  </p>
  </div>
  <div id="bottomRight">
    <h3>Featured Services</h3>
    <p>Nunc morbi nullam, tristique eu. Quam sodales, donec id, justo ornare. Orci lacus. Mattis aenean. Ut parturient, porttitor aliquet</p>
    <ul>
      <li>Volutpat</li>
      <li>Varius</li>
      <li>Eget</li>
      <li>Nam</li>
      <li>Et</li>
      <li>Metus</li></ul>
  </div>
</div>
<div id="footer1">
  <h4>Our Company</h4>
  <ul>
    <li>gravida</li>
    <li> augue </li>
    <li>ligula quis</li>
  </ul>
</div>
<div id="footer2">
  <h4>Our Services</h4>
  <ul>
    <li>gravida </li>
    <li>augue </li>
    <li>ligula </li>
    <li>quis</li>
  </ul>
</div>
<div id="footer3">
  <h4>Contact Us</h4>
  <table width="100%" border="0">
    <tr>
      <td><form action="<?php echo $editFormAction; ?>" method="POST" name="form1" onSubmit="MM_validateForm('email','','RisEmail','message','','R');return document.MM_returnValue">
        <table width="100%" border="0">
          <tr>
            <td>Name</td>
            <td><label for="name"></label>
              <input type="text" name="name" id="name"></td>
          </tr>
          <tr>
            <td>Email</td>
            <td><label for="email"></label>
              <input type="text" name="email" id="email"></td>
          </tr>
          <tr>
            <td>Message</td>
            <td><label for="message"></label>
              <textarea name="message" rows="4" id="message"></textarea></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><input type="submit" name="button" id="button" value="Submit"></td>
          </tr>
        </table>
        <input type="hidden" name="MM_insert" value="form1">
      </form></td>
    </tr>
  </table>
  <h4><br>
  </h4>
</div>
<div id="legal">
  <p>Copyright Kaizen Web Design | <a href="#">Privacy Policy</a> | All rights reserved</p>
</div>
</div>
</body>
</html>
