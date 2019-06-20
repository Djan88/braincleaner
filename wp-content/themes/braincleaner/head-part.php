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
      <div class="row">
        <div class="col-sm-12">
          <?php wp_nav_menu(array('menu' => 'Меню в шапке', 'container' => false, menu_class => 'nav navbar-nav' )); ?>
        </div>
      </div>
    </div>
  </div>
</div>
