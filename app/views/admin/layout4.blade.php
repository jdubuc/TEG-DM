<!DOCTYPE html>
<html>
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
    {{-- Bootstrap --}}
    {{ HTML::style('assets/css/bootstrap.min.css', array('media' => 'screen')) }}
   

    {{-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries --}}
    <!--[if lt IE 9]>
        {{ HTML::script('assets/js/html5shiv.js') }}
        {{ HTML::script('assets/js/respond.min.js') }}
    <![endif]-->
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
                {{-- Wrap all page content here --}}
  
      {{-- Begin page content --}}
        <!-- comandos de video autoplay loop -->
        
    
        @yield('content')
          </section>
          <section id="section-2">
                <div class="mediabox">
                  <img src="img/04.png" alt="img04" />
                  <h3>Asparagus Cucumber Cake</h3>
                  <p>Chickweed okra pea winter purslane coriander yarrow sweet pepper radish garlic brussels sprout groundnut summer purslane earthnut pea tomato spring onion azuki bean gourd. </p>
                </div>
                <div class="mediabox">
                  <img src="img/05.png" alt="img05" />
                  <h3>Magis Kohlrabi Gourd</h3>
                  <p>Salsify taro catsear garlic gram celery bitterleaf wattle seed collard greens nori. Grape wattle seed kombu beetroot horseradish carrot squash brussels sprout chard.</p>
                </div>
                <div class="mediabox">
                  <img src="img/06.png" alt="img06" />
                  <h3>Ricebean Rutabaga</h3>
                  <p>Celery quandong swiss chard chicory earthnut pea potato. Salsify taro catsear garlic gram celery bitterleaf wattle seed collard greens nori. </p>
                </div>
          </section>
          <section id="section-3">
                <div class="mediabox">
                  <img src="img/02.png" alt="img02" />
                  <h3>Noodle Curry</h3>
                  <p>Lotus root water spinach fennel kombu maize bamboo shoot green bean swiss chard seakale pumpkin onion chickpea gram corn pea.Sushi gumbo beet greens corn soko endive gumbo gourd.</p>
                </div>
                <div class="mediabox">
                  <img src="img/06.png" alt="img06" />
                  <h3>Leek Wasabi</h3>
                  <p>Sushi gumbo beet greens corn soko endive gumbo gourd. Parsley shallot courgette tatsoi pea sprouts fava bean collard greens dandelion okra wakame tomato.</p>
                </div>
                <div class="mediabox">
                  <img src="img/01.png" alt="img01" />
                  <h3>Green Tofu Wrap</h3>
                  <p>Pea horseradish azuki bean lettuce avocado asparagus okra. Kohlrabi radish okra azuki bean corn fava bean mustard tigernut wasabi tofu broccoli mixture soup.</p>
                </div>
          </section>
          <section id="section-4">
                <div class="mediabox">
                  <img src="img/03.png" alt="img03" />
                  <h3>Tomato Cucumber Curd</h3>
                  <p>Chickweed okra pea winter purslane coriander yarrow sweet pepper radish garlic brussels sprout groundnut summer purslane earthnut pea tomato spring onion azuki bean gourd. </p>
                </div>
                <div class="mediabox">
                  <img src="img/01.png" alt="img01" />
                  <h3>Mushroom Green</h3>
                  <p>Salsify taro catsear garlic gram celery bitterleaf wattle seed collard greens nori. Grape wattle seed kombu beetroot horseradish carrot squash brussels sprout chard.</p>
                </div>
                <div class="mediabox">
                  <img src="img/04.png" alt="img04" />
                  <h3>Swiss Celery Chard</h3>
                  <p>Celery quandong swiss chard chicory earthnut pea potato. Salsify taro catsear garlic gram celery bitterleaf wattle seed collard greens nori. </p>
                </div>
          </section>
          <section id="section-5">
                <div class="mediabox">
                  <img src="img/02.png" alt="img02" />
                  <h3>Radish Tomato</h3>
                  <p>Catsear cauliflower garbanzo yarrow salsify chicory garlic bell pepper napa cabbage lettuce tomato kale arugula melon sierra leone bologi rutabaga tigernut.</p>
                </div>
                <div class="mediabox">
                  <img src="img/06.png" alt="img06" />
                  <h3>Fennel Wasabi</h3>
                  <p>Sea lettuce gumbo grape kale kombu cauliflower salsify kohlrabi okra sea lettuce broccoli celery lotus root carrot winter purslane turnip greens garlic.</p>
                </div>
                <div class="mediabox">
                  <img src="img/01.png" alt="img01" />
                  <h3>Red Tofu Wrap</h3>
                  <p>Green horseradish azuki bean lettuce avocado asparagus okra. Kohlrabi radish okra azuki bean corn fava bean mustard tigernut wasabi tofu broccoli mixture soup.</p>
                </div>
          </section>
        </div><!-- /content -->
      </div><!-- /tabs -->
      
    </div>

    <ul id="cbp-tm-menu" class="cbp-tm-menu">
        <li>
          <a href="#">Home</a>
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
          <a href="#">Log Out</a>
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
    <script src="//code.jquery.com/jquery.js"></script>
    {{-- Include all compiled plugins (below), or include individual files as needed --}}
    {{ HTML::script('assets/js/jquery-1.9.1.min.js') }}
     {{ HTML::script('assets/js/c.js') }}
    {{ HTML::script('assets/js/bootstrap.min.js') }}
    {{ HTML::script('assets/js/admin.js') }}
  </body>
</html>