<?php if(is_user_logged_in()){ ?>
    <div class="row">
        <div class="col-xs-12 regress_wrap">
          <div class="reverce_graph">
            <div class="reverce_graph_handle"><i class="fa fa-arrows-alt-h"></i></div>
          </div>
          <div class="reverce_age">
            <table>
              <tr>
                <td>-</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>-</td>
              </tr>
            </table>
          </div>
          <div id="slider">
            <div id="custom-handle" class="ui-slider-handle"></div>
          </div>
          <div class="col-xs-12 reverse-footer">
              <div class="row">
                  <div class="pull-left">
                      <button class="btn btn-primary reverce_clean_graph pull-left" style="display: none;"><span class="glyphicon glyphicon-trash"></span></button>
                  </div>
                  <div class="pull-right">
                      <div class="regress-result">-</div>
                  </div>
              </div>
          </div>
        </div>
    </div>
<?php } else { ?>
    <div class="not_logged alert alert-danger">
      <b>Закрытый раздел!</b> Регрессивное центрирование доступно только пользователям прошедшим семинар "Терапевтическая дефрагментация актуальных и латентных психосоматических паттернов"
    </div>
<?php } ?>

