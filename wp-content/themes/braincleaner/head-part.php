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
        <div class="col-md-9 col-sm-12">
          <?php wp_nav_menu(array('menu' => 'Меню в шапке', 'container' => false, menu_class => 'nav navbar-nav' )); ?>
          <?php if(is_user_logged_in()){ ?>
            <?php if(current_user_can('administrator')) { ?>
              <button type="button" class="btn btn-lg btn-link btn_history justify-content-end">
                H
              </button>
            <?php } ?>
          <?php } ?>
        </div>
        <div class="col-md-3 col-sm-12" style="margin-top: 7px;margin-bottom: 7px;">
            <form method="get" name="searchform" id="searchform" action="<?php bloginfo('siteurl')?>">
              <div class="input-group">
                <input type="text" name="s" id="s" placeholder="Что искать?" class="search-input form-control" required="true"/>
                <span class="input-group-btn">
                  <input id="btnSearch" type="submit" name="submit" value="<?php _e('Поиск'); ?>" class="search-button btn btn-default search"/>
                </span>
              </div><!-- /input-group -->
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
