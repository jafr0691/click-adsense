<?php
require_once './conection.php';
require_once './function.php';
$f  = date("m/d/Y");
$hora   = date("h:i:s A");
$click=0;
$url = $_POST['url'];
$tbagente = $dbh->prepare("SELECT click FROM clickadsenses WHERE ip=:ip and fecha=:f");
$tbagente->execute(array(':f'=>$f,':ip'=> code()["geoplugin_request"]));
$ida = $tbagente->fetch(PDO::FETCH_ASSOC);


if($ida['click']>0){
    $click = $ida['click']+1;
    $ediagent = $dbh->prepare("UPDATE clickadsenses SET click=:click where ip=:ip and fecha=:f");
    $ediagent->execute(array(':ip'=> code()["geoplugin_request"],':click'=>$click,':f'=>$f));
}else{
  $stmt = $dbh->prepare("INSERT INTO clickadsenses (id_cd,ip,pais,click,url,fecha,hora) VALUES (:id,:ip,:pais,:click,:url,:fecha,:hora)");
    $stmt->execute(array(':id' => null, ':ip' => code()["geoplugin_request"], ':pais' => code()["geoplugin_countryName"],':click'=>1,':url'=>$url,':fecha' => $f,':hora'=>$hora));
}
exit($ida['click']);
