<?php get_header(); ?>
  <?php if(is_front_page()) { ?>
    <?php include(TEMPLATEPATH . '/home.php'); ?>
  <?php } else { ?>
    <div class="container-fluid inside animsition">
      <?php include(TEMPLATEPATH . '/head-part.php'); ?>
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
                <h4 class="panel-heading"><span class="glyphicon glyphicon-film"></span> <a href="/">Закрытыий доклад в клинике по материалам экспедиции в Центральную и Южную Америку</a> <span class="pull-right date-block">21.06.2014</span></h4>
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
          <?php include(TEMPLATEPATH . '/sidebar.php'); ?>
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
