<?php
#l2-scripts.ru studio script vote icq 9-013-612
$L2JBS_config["mysql_host"]="localhost";	
$L2JBS_config["mysql_port"]="3306";		
$L2JBS_config["mysql_db"]="l2s";		
$L2JBS_config["mysql_login"]="root";		
$L2JBS_config["mysql_password"]="root";	
$object_id="obj_Id";
$char_name="char_name";
$prefiks='';
$linkstat='http://la2.mmotop.ru/stats/пример.txt'; //ссылка статистики
   $link = @mysql_connect($L2JBS_config['mysql_host'].":".$L2JBS_config['mysql_port'], $L2JBS_config['mysql_login'], $L2JBS_config['mysql_password']) or die ('Impossible create connect with the base! Check given required for connect  with base MySQL!<br>Possible server on preventive maintenance presently, try to call at later.');
  mysql_set_charset('utf8',$link);
 @mysql_select_db($L2JBS_config['mysql_db'], $link) or die ('Нет соединения с базой!');
error_reporting(0);
date_default_timezone_set('Europe/Moscow');
echo '<pre>';
//Считываем список голосовавших
$content = @file_get_contents($linkstat);
$massive=explode("\n", $content);
for ($y=0;$y<count($massive);$y++)
{
$asd=explode("	",$massive[$y]);
$date=explode(" ",$asd[1]);
$massive2[$y]['name']=$asd[3];
$massive2[$y]['ip']=$asd[2];
$date123=explode(".",$date[0]);
$massive2[$y]['date']=implode("-",array($date123[2],$date123[1],$date123[0]));
$massive2[$y]['time']=$date[1];
}
#print_r($massive2);
$count=count($massive2)-1;
#echo $count.'<br>';
//Начинаем проверять и зачислять бонусы
for ($i=0;$i<$count;$i++)
#while (($massive2[$i][2])!='')
{
#echo $i;
$message='';
$char=$massive2[$i]['name'];
$ip=$massive2[$i]['ip'];
$date=$massive2[$i]['date'];
$time=$massive2[$i]['time'];
$query=mysql_result(mysql_query("SELECT `charid` FROM `mmotop_voted_ip` WHERE `charname` = '".($char)."' AND `date_vote` = '".($date)."' AND `time_vote` = '".($time)."'"),0,0);if (strlen($query)>1){$message='Персонажу ';$message.=$char;$message.=' бонус за ';$message.=$date;$message.=' уже был начислен';}
else
{
$charinfo1=mysql_fetch_array(mysql_query("SELECT * FROM characters WHERE $char_name='".($char)."'"),MYSQL_ASSOC);
if (strlen($charinfo1[$object_id])<1)
{$message='Персонажа с ником ';
$message.=$char;
$message.=' в игре не найдено!';}
else
{
//Добавление в таблицы всякой лабуды
$insid1 = mysql_result(mysql_query("SELECT MAX(`id`)+1 AS `id` FROM `mmotop_voted_ip`"),0,0);
$ipAddress = $ip;
$date_time[0]=$massive2[$i]['date'];
$date_time[1]=$massive2[$i]['time'];
$date_now[1]=date("Y-m-d");
$date_now[0]=date("H:i:s");
#$charinfo1=mysql_fetch_array(mysql_query("SELECT * FROM characters WHERE $char_name='".($char)."'"),MYSQL_ASSOC);
$charid=$charinfo1[$object_id];
$go1=mysql_query("INSERT INTO `mmotop_voted_ip` (`id`,`charid`,`charname`,`ip`,`date_vote`,`time_vote`,`date_deliver`,`time_deliver`) VALUES ('$insid1','".($charid)."','$char','$ipAddress','".($date_time[0])."','".($date_time[1])."','".($date_now[1])."','".($date_now[0])."')");
#echo ($date_time[0]);
#mysql_query("INSERT INTO `vote_vote_ip` (`id`,`charid`,`charname`,`ip`,`date_vote`,`time_vote`,`date_deliver`,`time_deliver`) VALUES ('$insid1','".($charid)."','$char','$ipAddress','".($date_time[0])."','".($date_time[1])."','".($date_now[1])."','".($date_now[0])."')") or die(mysql_error());

$date_now2=date("Y-m");
$date=explode("-",$date_time[0]);
$datesr=implode("-",array($date[0],$date[1]));
if ($datesr==$date_now2)
{
$table="mmotop_10_now_month";
$chevote=mysql_result(mysql_query("SELECT Counts FROM $table WHERE Name='$char'"),0,0);
if(empty($chevote)){mysql_query("INSERT INTO $table (`Name`,`Counts`) VALUES ('$char','1')");}
else{mysql_query("UPDATE $table SET `Counts`=`Counts`+1 WHERE Name='$char'");}
}

$prizid=getpriz();
$prizinfo=mysql_fetch_array(mysql_query("SELECT * FROM mmotop_prizi WHERE prizid='".$prizid."'"),MYSQL_ASSOC);


if ($go1)
{
$name=mysql_result(mysql_query("SELECT name FROM etcitem WHERE item_id='".($prizinfo['itemid'])."'"),0,0);
if (strlen($name)<1){$name=mysql_result(mysql_query("SELECT name FROM weapon WHERE item_id='".($prizinfo['itemid'])."'"),0,0);}
if (strlen($name)<1){$name=mysql_result(mysql_query("SELECT name FROM armor WHERE item_id='".($prizinfo['itemid'])."'"),0,0);}
$message=$char;
$message.='. Приз: ';
$message.=$name;
$message.=' ';
$message.=$prizinfo['kolvo'];
$insid2 = mysql_result(mysql_query("SELECT MAX(`id`)+1 AS `id` FROM `mmotop_winners`"),0,0);
mysql_query("INSERT INTO `mmotop_winners` (`id`,`name`,`prizid`,`data`,`time`) VALUES ('$insid2','$char','$prizid','$date_now[1]','$date_now[0]')");
mysql_query("UPDATE `mmotop_prizi` SET `rozdano`=`rozdano`+1 WHERE (`prizid`='$prizid')");
//Добавление в инвентарь.
//Проверка на наличие
$itemid=$prizinfo['itemid'];
$itemcount=$prizinfo['kolvo'];
mysql_query("INSERT INTO `items_delayed` (`owner_id`,`item_id`,`count`,`description`) VALUES ('$charid','$itemid','$itemcount','Приз за голосование')");
$message.=' получен.';
}
else
{
$message='Бонус персонажу ';$message.=$char;$message.=' не доставлен.';
$message='Бонус персонажу ';$message.=$char;$message.=' не доставлен.';$message.=mysql_error();
#echo mysql_error();
}
}
////////////////////////////////
}












echo $message.'<br>';
}


function getpriz()
{
$sql=mysql_query("SELECT * FROM mmotop_prizi");
while ($res=mysql_fetch_array($sql,MYSQL_ASSOC))
{
$chance=$res['chance'];
for($j=0;$j<$chance;$j++)
{
if (($res['rozdano'])<($res['kolvo-mes']) OR $res['kolvo-mes']=='unlimit')
{
$prizi[]=$res['prizid'];}
}
}
shuffle($prizi);
$randompriz=rand(0,count($prizi)-1);
$prizid=$prizi[$randompriz];
#echo '<pre>';
#print_r($prizi);
return $prizid;
}
?>
