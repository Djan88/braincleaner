<?php get_header(); ?>
  <?php if(is_front_page()) { ?>
    <?php include(TEMPLATEPATH . '/home.php'); ?>
  <?php } else { ?>
    <div class="container-fluid inside animsition">
      <div class="row menu-wrap">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
            <a class="navbar-brand" href="#">Меню</a>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <?php wp_nav_menu(array('menu' => 'Меню в шапке', 'container' => false, menu_class => 'nav navbar-nav' )); ?>
            <div class="pull-right" style="width: 31.5%;margin-top: 7px;">
              <div class="input-group">
                <input type="text" class="form-control">
                <span class="input-group-btn">
                  <button class="btn btn-default search" type="button">Поиск</button>
                </span>
              </div><!-- /input-group -->
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="container main-zone">
          <div class="col-md-8">
            <h3>Видео материалы</h3>
            <div class="content-wrap">
              <div class="panel panel-default main_heading">
                <h4 class="panel-heading"><span class="glyphicon glyphicon-film"></span> <a href="/">Биологическое центрирование, базовые уровни в клинике Чикурова</a> <span class="pull-right date-block">01.04.2015</span></h4>
                <div class="panel-body">
                  <p>Небольшой блок для описания видео записи. Можно не заполнять</p>
                  <iframe width="560" height="315" src="https://www.youtube.com/embed/aKs8opb3U1A" frameborder="0" allowfullscreen></iframe>
                  <a href="/" class="button"></a>
                </div>
              </div>
              <div class="panel panel-default main_heading">
                <h4 class="panel-heading"><span class="glyphicon glyphicon-film"></span> <a href="/">Закрытый доклад в клинике по материалам экспедиции в Центральную и Южную Америку</a> <span class="pull-right date-block">21.06.2014</span></h4>
                <div class="panel-body">
                  <p>Небольшой блок для описания видео записи. Можно не заполнять</p>
                  <iframe width="560" height="315" src="https://www.youtube.com/embed/09sxmilzzBc" frameborder="0" allowfullscreen></iframe>
                  <a href="/" class="button"></a>
                </div>
              </div>
              <div class="panel panel-default main_heading">
                <h4 class="panel-heading"><span class="glyphicon glyphicon-film"></span> <a href="/">Откуда берутся мысли и для чего нужны эмоции</a> <span class="pull-right date-block">02.05.2014</span></h4>
                <div class="panel-body">
                  <p>Небольшой блок для описания видео записи. Можно не заполнять</p>
                  <iframe width="560" height="315" src="https://www.youtube.com/embed/LGO_CSrSuNg" frameborder="0" allowfullscreen></iframe>
                  <a href="/" class="button"></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 sidebar-zone">
            <div class="list-group">
              <div class="list-group-item active">
                <h4 class="list-group-item-heading">Важная информация</h4>
              </div>
              <?php if (!dynamic_sidebar("arhive-widget-area") ) : ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="row footer-wrap">
        <div class="container">
          <div class="pull-left">
            <a href="/">Braincleaner</a> 2015
          </div>
          <div class="pull-right">
            <a href="mailto:info@defra.ru">info@braincleaner.ru</a>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
<?php get_footer(); ?>
