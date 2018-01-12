<?php if(is_user_logged_in()){ ?>
    <?php
        if($_POST['mci_magic']){
            $sImage = uploadImageFile();
            echo '<img class="injected hidden" src="'.$sImage.'" />';
        }
    ?>
    <div class="screen screen-1">
        <div class="bbody">

            <!-- upload form -->

            <form id="upload_form" action="/novyj-protokol/" enctype="multipart/form-data" method="post"><!-- hidden crop params -->
            <input id="x1" name="mci_x1" type="hidden" />
            <input id="y1" name="mci_y1" type="hidden" />
            <input id="x2" name="mci_x2" type="hidden" />
            <input id="y2" name="mci_y2" type="hidden" />
            <!-- <h2>Выберите изображение</h2> -->
            <div><input id="image_file" name="mci_image_file" type="file" /></div>
            <div class="error"></div>
            <div class="step2">
            <h3>Выделите область для обрезки</h3>
            <img id="preview" alt="" />
            <!--<canvas id="preview-canvas" style="border: 3px red solid;/*position: absolute; visibility: hidden; /*left: -20000px*/"></canvas>-->
            <div class="info"><label>Размер файла</label> <input id="filesize" name="mci_filesize" type="text" />
            <label>Тип</label> <input id="filetype" name="mci_filetype" type="text" />
            <label>Разрешение изображения</label> <input id="filedim" name="mci_filedim" type="text" />
            <label>Ширина</label> <input id="w" name="mci_w" type="text" />
            <label>Высота</label> <input id="h" name="mci_h" type="text" /></div>
            <input type="submit" class="crop_photo" value="Редактировать фото" name="mci_magic" />
            </div>
            </form>
        
        </div>
    </div>
    <div class="screen screen-2 hidden">
        <div class="sex row">
            <h4>Клиент:</h4>
            <div class="sex_item sex_item-client col-md-3 col-md-offset-3" data-sex="male">Мужчина</div>
            <div class="sex_item sex_item-client col-md-3" data-sex="female">Женщина</div>
        </div>
        <div class="sex sex-recep hidden row">
            <h4>Относительно кого ведется проработка:</h4>
            <div class="sex_item sex_item-recep col-md-3 col-md-offset-3" data-usex="male">Мужчина</div>
            <div class="sex_item sex_item-recep col-md-3" data-usex="female">Женщина</div>
        </div>
    </div><div class="screen screen-3 hidden">
        <div class="faces">
            <ul class="formuls">
                <li id="draggable1" class="itemlist_item itemlist_item_dr item_list__mid draggable" style="left: 6px; top: 5px;">D2</li>
                <li id="draggable2" class="itemlist_item itemlist_item_dr item_list__mid draggable" style="left: 6px; top: 55px;">D3</li>
                <li id="draggable3" class="itemlist_item itemlist_item_dr item_list__mid draggable" style="left: 6px; top: 105px;">D4</li>
            </ul>
            <div class="ring box_rounded"><div class="ring-formula"></div></div>
            <div class="sq sq1"></div>
            <div class="sq sq2"></div>
            <div class="sq sq3"></div>
            <div class="sq sq4"></div>
            <button type="button" class="btn btn-primary prot-start mobile-start hidden">Старт</button>
        </div>
    </div>
<?php } else { ?>
    <div class="screen">Данный протокол доступен только зарегистрированным пользователям</div>
<?php } ?>

