<?php if(is_user_logged_in()){ ?>
    <div class="row master_cards_wrapper shadow">
        <div class="col-md-2 col-xs-2 marakata_sim-wrap">
            <div class="marakata_sim-inner">
                <div class="marakata_sim marakata_sim_prot marakata_sim_from marakata_sim-1"></div>
            </div>
        </div>
        <div class="col-md-2 col-xs-2 marakata_sim-wrap">
            <div class="marakata_sim-inner">
                <div class="marakata_sim marakata_sim_prot marakata_sim_from marakata_sim-2"></div>
            </div>
        </div>
        <div class="col-md-2 col-xs-2 marakata_sim-wrap">
            <div class="marakata_sim-inner">
                <div class="marakata_sim marakata_sim_prot marakata_sim_from marakata_sim-3"></div>
            </div>
        </div>
        <div class="col-md-2 col-xs-2 marakata_sim-wrap">
            <div class="marakata_sim-inner">
                <div class="marakata_sim marakata_sim_prot marakata_sim_from marakata_sim-4"></div>
            </div>
        </div>
        <div class="col-md-2 col-xs-2 marakata_sim-wrap">
            <div class="marakata_sim-inner">
                <div class="marakata_dot"></div>
            </div>
        </div>
        <div class="col-md-2 col-xs-2 marakata_sim-wrap">
            <div class="marakata_sim-inner">
                <div class="marakata_sim marakata_sim_prot marakata_sim_from  marakata_sim-5"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col"></div>
        <div class="col-8 after_btns">
            <button type="button" class="btn btn-success btn-lg btn_reset btn_reset_prot hidden">Начать с начала</button>
            <button type="button" class="btn btn-warning btn-lg save_history hidden">Сохранить рецепт</button>
        </div>
        <div class="col"></div>
    </div>
    <div class="row">
        <div class="history col-md-8 col-md-offset-2 col-xs-12">
          <!-- <button type="button" class="close history_close">
            <span aria-hidden="true">&times;</span>
          </button> -->
          <div class="col history-title">История рецептов</div>
          <div class="history_inner">
              <div class="history_wrapper"></div>
          </div>
        </div>
    </div>
<?php } else { ?>
    <div class="screen">Оцифратор доступен только зарегистрированным пользователям</div>
<?php } ?>

