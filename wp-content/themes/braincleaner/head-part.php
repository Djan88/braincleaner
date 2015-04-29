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
              <input type="text" name="s" id="s" placeholder="Что искать?" class="search-input form-control" required="true"/>
              <span class="input-group-btn">
                <input id="btnSearch" type="submit" name="submit" value="<?php _e('Поиск'); ?>" class="search-button btn btn-default search"/>
              </span>
        </div><!-- /input-group -->
      </div>
    </div>
  </div>
</div>
