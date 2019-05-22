<!doctype html>
<html><head>
<meta charset="utf-8">
<script language="javascript" type="text/javascript" src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="fancybox/jquery.fancybox-1.3.4.js"></script>
<link rel="shortcut icon" href="ico.ico">
<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.0.css" media="screen" />
<script type="text/javascript" src="fancybox/jquery.mousewheel-3.0.2.pack.js"></script>
<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.0.pack.js"></script>
<script language="javascript" type="text/javascript" src="js/jquery.dataTables.js"></script>
<link href='css/style.css' type=text/css rel=stylesheet>
<title>Guia Telefónica | Municipalidad de La Florida</title>
<script>

$(document).ready(function() {
  $("a#single").fancybox({
				'opacity'		: true,
				'overlayShow'	: false,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'elastic'
				
	});
	$("a#single").fancybox({
	 helpers : {
        overlay : {
            css : {
                'background' : 'rgba(58, 42, 45, 0.3)'
            }
        }
    }
    });			
});

</script>
</head>

<body>
<!-- header --> 
<div class="header">
	<div class="logo">
		<img src="images/logo-lf.png" alt=""/>
    </div>
    <h1>GUIA TELEFONICA MUNICIPAL</h1>
</div>

<div class="site">
