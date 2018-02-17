<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Zitat Bienvenido</title>
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="author" content="" />
		<link rel="shortcut icon" href="../favicon.ico">
		
		{{ HTML::style('assets/css/demou.css', array('media' => 'screen')) }}
		{{ HTML::style('assets/css/componentu.css', array('media' => 'screen')) }}
		{{ HTML::style('assets/css/defaultmu.css', array('media' => 'screen')) }}
		{{ HTML::style('assets/css/componentmu.css', array('media' => 'screen')) }}
		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		{{ HTML::script('assets/js/modernizr.custom.js') }}
		
	</head>
	<body>
		<div class="container">
			<header class="clearfix">
				<span>Propocket <span class="bp-icon bp-icon-about" data-content="Bienvenido."></span></span>
				<h1>ZITAT</h1>
				<!--<nav>
					<a href="http://tympanus.net/Blueprints/SplitLayout/" class="bp-icon bp-icon-prev" data-info="previous Blueprint"><span>Previous Blueprint</span></a>
					<a href="http://tympanus.net/Blueprints/GridGallery/" class="bp-icon bp-icon-next" data-info="next Blueprint"><span>Next Blueprint</span></a>
					<a href="http://tympanus.net/codrops/?p=18521" class="bp-icon bp-icon-drop" data-info="back to the Codrops article"><span>back to the Codrops article</span></a>
					<a href="http://tympanus.net/codrops/category/blueprints/" class="bp-icon bp-icon-archive" data-info="Blueprints archive"><span>Go to the archive</span></a>
				</nav>-->
			</header>	
			<div id="tabs" class="tabs">
				<nav>
					<ul>
						<li><a href="#section-1" class="icon-shop"><span>Pre-Citas</span></a></li>
						<li><a href="#section-2" class="icon-cup "><span>Citas</span></a></li>
						<li><a href="#section-3" class="icon-food"><span>Datos De Medico</span></a></li>
						<li><a href="#section-4" class="icon-lab"><span>Especialidades</span></a></li>
						<li><a href="#section-5" class="icon-truck"><span>About</span></a></li>
					</ul>
				</nav>
				<div class="content">
					<section id="section-1">
								
					</section>
					<section id="section-2">
								<iframe src="http://localhost/dm/public/admin/citas" style="width: 90%; height: 400px;"></iframe>
					</section>
					<section id="section-3">
								<iframe src="http://localhost/dm/public/admin/especialidades" style="width: 90%; height: 400px;"></iframe>
					</section>
					<section id="section-4">
								<iframe src="http://localhost/dm/public/admin/userespecialidads/create" style="width: 90%; height: 400px;"></iframe>
					</section>
					<section id="section-5">
								
					</section>
				</div><!-- /content -->
			</div><!-- /tabs -->
			
		</div>

		<ul id="cbp-tm-menu" class="cbp-tm-menu">
				<li>
					<a href="{{ url('/') }}">Home</a>
				</li>
				<!--<li>
					<a href="#">Informacion</a>
					<ul class="cbp-tm-submenu">
						<li><a href="#" class="cbp-tm-icon-archive">Sorrel desert</a></li>
						<li><a href="#" class="cbp-tm-icon-cog">Raisin kakadu</a></li>
						<li><a href="#" class="cbp-tm-icon-location">Plum salsify</a></li>
						<li><a href="#" class="cbp-tm-icon-users">Bok choy celtuce</a></li>
						<li><a href="#" class="cbp-tm-icon-earth">Onion endive</a></li>
						<li><a href="#" class="cbp-tm-icon-location">Bitterleaf</a></li>
						<li><a href="#" class="cbp-tm-icon-mobile">Sea lettuce</a></li>
					</ul>
				</li>
				<li>
					<a href="#">Contacto</a>
					<ul class="cbp-tm-submenu">
						<li><a href="#" class="cbp-tm-icon-archive">Brussels sprout</a></li>
					</ul>
				</li>-->
				<li>
					<a href="{{ url('/logout') }}">Log Out</a>
				</li>
			</ul>

		
		{{ HTML::script('assets/js/cbpTooltipMenu.min.js') }}
		<script>
			var menu = new cbpTooltipMenu( document.getElementById( 'cbp-tm-menu' ) );
		</script>

	
		{{ HTML::script('assets/js/cbpFWTabs.js') }}
		<script>
			new CBPFWTabs( document.getElementById( 'tabs' ) );
		</script>
	</body>
</html>
