<?php
echo "Postedv1";
error_reporting(E_ERROR | E_PARSE);
//$url = $argv[1];
//$ip = $argv[1];

function get ($ip){
        $ch = curl_init("https://ipinfo.io/ip");
        curl_setopt($ch, CURLOPT_INTERFACE, "$ip");
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.7; rv:7.0.1) Gecko/20100101 Firefox/7.0.1');
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,5);

        $output = curl_exec($ch);
        curl_close($ch);
      //  echo "Working ip ".$output."<br\>"."\n";
         $curldata = explode("\n",$output);
       if (preg_match('/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/', $curldata, $ip_match)) {
        $curlstuff = explode("\n",$ip_match[0]);
      foreach ($curlstuff as $key => $line){
      echo $line."\n";
      }
}

}
/*
if (isset($_POST["test"])){

var_dump($_POST["test"]);


}
*/
if (isset($_POST["test"])){
//get("$ip");
$getips = shell_exec("/sbin/ifconfig");
$arrayip = explode("\n",$getips);



//var_dump($arrayip);
foreach($arrayip as $key => $line){
if (strpos($line,"inet")){
  //echo $line."<br />"."\n";
if (preg_match('/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/', $line, $ip_match)) {
//   echo "Found ip ".$ip_match[0]."<br \>"."\n";
$allips = explode("\n",$ip_match[0]);
foreach ($allips as $key => $line){
get("$line");

}

}

}
}
}
if (isset($_POST["go"])){
$myip = $_POST["go"];
$keyword = $_POST["key"];
$workingkey =  str_replace(' ', '+', $keyword);
echo $workingkey."\n";
//echo $myip;
  $ch = curl_init("https://www.google.com/search?q=".$workingkey."&num=100");
  curl_setopt($ch, CURLOPT_INTERFACE, "$myip");
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.7; rv:7.0.1) Gecko/20100101 Firefox/7.0.1');
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,5);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);


  $output = curl_exec($ch);
  curl_close($ch);
  preg_match_all('/<a href="(.*?)"/s', $output, $matches);
  //print_r($matches);
  //echo $matches[1];
  //echo $shit;
  foreach ($matches[1] as $key => $line){
    echo $line."\n";
  }

}


 ?>

