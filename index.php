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
$linkvote='http://la2.mmotop.ru/vote/';  // ссылка голосования
$linkstat='http://la2.mmotop.ru/stats/пример.txt'; //ссылка статистики
   $link = @mysql_connect($L2JBS_config['mysql_host'].":".$L2JBS_config['mysql_port'], $L2JBS_config['mysql_login'], $L2JBS_config['mysql_password']) or die ('Impossible create connect with the base! Check given required for connect  with base MySQL!<br>Possible server on preventive maintenance presently, try to call at later.');
  mysql_set_charset('utf8',$link);
 @mysql_select_db($L2JBS_config['mysql_db'], $link) or die ('Нет соединения с базой!');
error_reporting(0);
echo '<pre>';
?>
<html>
<head>
<title>Голосование MMotop.ru с призами</title>
<style>
body, th, caption, td, input, textarea, select { color: black; font: 8pt verdana; font-weight: none; text-decoration: none }
BODY {background:url('img/bg-body.gif') #b9d5ff 0px 3px repeat-x;}

A:link{FONT-SIZE: 11px; COLOR:#000000; TEXT-DECORATION: none}
A:visited{FONT-SIZE: 11px; COLOR:#000000; TEXT-DECORATION: none}
A:hover{FONT-SIZE: 11px; COLOR:#000000; TEXT-DECORATION: underline}

.main {background-color:#fff;}
.main .tl {background:url('img/bg-cnt-cl.gif') left top no-repeat;}
.main .tr {background:url('img/bg-cnt-cr.gif') right top no-repeat;}
.main .bl {background:url('img/bg-cnt-cbl.gif') left bottom no-repeat;}
.main .br {background:url('img/bg-cnt-cbr.gif') right bottom no-repeat;padding-left:18px;padding-top:19px;padding-right:28px;padding-bottom:27px;}

.headbar {background-color:#cacaca;padding:1px;position:relative;}
.headbar .h {background:url('img/bg-headbar.gif') #f1f1f1 left top repeat-x;position:relative;}
.headbar .htl {background:url('img/bg-headbar-tl.gif') left top no-repeat;position:relative;top:-1px;left:-1px;}
.headbar .htr {background:url('img/bg-headbar-tr.gif') right top no-repeat;position:relative;right:-2px;}
.headbar .hbl {background:url('img/bg-headbar-bl.gif') left bottom no-repeat;position:relative;left:-2px;bottom:-2px;}
.headbar .hbr {background:url('img/bg-headbar-br.gif') right bottom no-repeat;position:relative;right:-2px;}
.headbar .def {padding-top:7px;overflow:hidden;position:relative;}
.headbar .def .bpad {height:8px;font-size:1px;position:relative;}

.hblock .hdr {background:url('img/bg-hpage-t.gif') repeat-x;height:16px;font-size:1px;}
.hblock .hdr .l {background:url('img/con-hpage-tl.gif') left no-repeat;height:16px;font-size:1px;}
.hblock .hdr .r {background:url('img/con-hpage-tr.gif') right no-repeat;height:16px;font-size:1px;}
.hblock .ftr {background:url('img/bg-hpage-b.gif') repeat-x;height:16px;font-size:1px;}
.hblock .ftr .l {background:url('img/con-hpage-bl.gif') left no-repeat;height:16px;font-size:1px;}
.hblock .ftr .r {background:url('img/con-hpage-br.gif') right no-repeat;height:16px;font-size:1px;}
.hblock .bdy {border-left:solid #a7dcf0 2px;border-right:solid #a7dcf0 2px;padding-left:3px;padding-right:3px;}
.hblock .bdy .mn {background:url('img/bg-hpage.gif') repeat-x;height:100%;}

.statusbar {background:url('img/bg-cnt-t.gif') repeat-x;height:38px;}
.statusbar .l {background:url('img/bg-cnt-tl.gif') left top no-repeat;height:38px;}
.statusbar .r {background:url('img/bg-cnt-tr.gif') right top no-repeat;height:38px;}

.header {height:70px;}
.header .search {float:right;padding-top:22px;padding-right:23px;}
.header .search .l {float:left;background:url('img/bg-search-l.gif') no-repeat;width:13px;height:24px;}
.header .search .c {float:left;background:url('img/bg-search.gif') repeat-x;padding-top:4px;padding-bottom:5px;}
.header .search .c input {color:#979797;font-size:12px;border:none;background:none;width:90px;}
.header .search .r {float:left;background:url('img/bg-search-r.gif') no-repeat;width:24px;height:24px;}
.header .search .r input {margin-top:4px;}

.myborder {border-style: dotted; border-color: #808080;}
.mytab    {border: none;}
</style>

</head>
<body>

<center><b> Выиграй приз ! </b></center>   <br /><br /><br /><br />

<table border=0>

<tr>
 <td>

        <div class="statusbar">
        <div class="l"><div class="r">
         <table border=0 width=100%><tr><td>&nbsp;</td></tr></table>
        </div></div>
    </div>

        <div class="main">

        <div class="tl"><div class="tr"><div class="bl"><div class="br">

                <table border=0 width=96%>
        <tr>
         <td valign=top>


            <form method=post>
            <table border=0 width=460>
            <tr>
			<td align="center"><a href="<?php echo $linkvote;?>" target="_blank"><IMG src="http://la2.mmotop.ru/images/anim_la2.gif" border="0" title="Рейтинг серверов Lineage 2" alt="Рейтинг серверов Lineage 2"></a></td></tr>
            </table>
            </form>







<table border=0 width=98%>
    <tr><td>
        <div class="headbar">

            <div class="h"><div class="htl"><div class="htr"><div class="hbl"><div class="hbr">
                <div class="def">
                    <br><b>Как получить приз?</b>
                    <br>
                    <br>1. Вам нужно иметь игрового чара на нашем серверe 
					<br>К голосованию допускаются только ники в английской раскладке) (Если у вас чар с рус ников или цифрами, не получите приз)
                    <br>2. Перейти по банеру (или этой <a href="<? echo $linkvote;?>" target="_blank"><u>ссылке</u></a>) и проголосовать за сервер.
                    <br>3. Каждые 60 минут происходит автоматическая выдача призов в игру в соотвествии c табличкой призов.
                    <br>4. Скрипт проходит пока тестирование, если кому то иногда что то не выдается пишем в баг-репорт о проблеме. 
                    <br>

                    <br>
                    <br><u>Внимание: По правилам MMoTop принимается 1 голос за 1 ip адрес, в течении 24 часов.</u>
                <div class="bpad"></div>
                </div>
            </div></div></div></div></div>
        </div>
    </td></tr>

    <tr><td><br /><br />
        <div class="headbar">
            <div class="h"><div class="htl"><div class="htr"><div class="hbl"><div class="hbr">
                <div class="def">
                    <br><b>Информация</b>
                    <br>
                    <br>Все призы выпадают случайным образом, список призов можно посмотреть на этой странице.
                    <br>В графе кол.\мес - показано сколько призов разыгрывается в месяц.
                    <br>Чар может получить всего 1 приз в течении 24 часов!
                 <div class="bpad"></div>

                </div>
            </div></div></div></div></div>
        </div>
    </td></tr>
    <tr><td><br /><br />
        <div class="headbar">
            <div class="h"><div class="htl"><div class="htr"><div class="hbl"><div class="hbr">
                <div class="def">
                    <br><b>20-ка самых активных голосовальщиков за текущий месяц</b>
					<table border=1 width=360 cellpadding="2" cellspacing="4" class="mytab">
<tr><th class='myborder'>#</th>
<th class='myborder'> Персонаж </th>
<th class='myborder'> Количество голосов </th></tr>
<?php
$table="mmotop_10_now_month";
$sql=mysql_query("SELECT * FROM $table ORDER BY `Counts` DESC LIMIT 0,20");
while ($res=mysql_fetch_array($sql,MYSQL_ASSOC))
{
$l++;
echo "<tr><td class='myborder'>$l</th><th class='myborder'> ".($res['Name'])." </td><td class='myborder'> ".($res['Counts'])." </td></tr>";
}
?>
 </table>
                 <div class="bpad"></div>
                </div>
            </div></div></div></div></div>
        </div>
    </td></tr>

</table>

</td><td valign=top>

<table border=0 style="width: 300px;">
    <tr><td>
    <div class="headbar">
        <div class="h"><div class="htl"><div class="htr"><div class="hbl"><div class="hbr">
            <div class="def">
    <table border=1 cellpadding="2" cellspacing="4" class="mytab" width=300>
     <caption> Призы за голосование</caption>

     <tr><th class='myborder'>Итемы</th><th class='myborder'>Количество</th><th class='myborder'>Кол.\мес</th><th class='myborder'>Роздано</th></tr>
<?php
$sql=mysql_query("SELECT `itemid` , `kolvo`, `kolvo-mes`, `rozdano` FROM mmotop_prizi ORDER BY `itemid`,`kolvo` DESC");
while ($res=mysql_fetch_array($sql,MYSQL_ASSOC))
{
$name=mysql_result(mysql_query("SELECT name FROM etcitem WHERE item_id='".($res['itemid'])."'"),0,0);
if (strlen($name)<1)
{
$name=mysql_result(mysql_query("SELECT name FROM weapon WHERE item_id='".($res['itemid'])."'"),0,0);
}
if (strlen($name)<1)
{
$name=mysql_result(mysql_query("SELECT name FROM armor WHERE item_id='".($res['itemid'])."'"),0,0);
}
echo "<tr><td class='myborder'><b><font color=darkred>Фестиваль Адена</font></b></td><td align=center class='myborder'>".($res['kolvo'])."</td><td align=center class='myborder'>".($res['kolvo-mes'])."</td><td align=center class='myborder'>".($res['rozdano'])."</td></tr>";
}
?>
    </table><br />
             <div class="bpad"></div>
            </div>

        </div></div></div></div></div>
    </div>
    </td></tr>
</table>

</td><td valign=top>


<table border=0 width=100%>
    <tr><td>
    <div class="hblock">
        <div class="hdr"><div class="l"><div class="r"></div></div></div>

        <div class="bdy">
            <div class="mn">
                    <table border=1 width=400 cellpadding="2" cellspacing="4" class="mytab">
                     <caption>Последние 50 победителей.</caption>
                     <tr><th class='myborder'>#</th><th class='myborder'>Дата победы</th><th class='myborder'> Чар победителя </th><th class='myborder'> Приз </th></tr>
<?php
$date=date("Y-m");
$sql=mysql_query("SELECT * FROM `mmotop_winners` WHERE `data` LIKE '%".$date."%' ORDER BY `data` DESC, `time` DESC LIMIT 0,50");
while ($res=mysql_fetch_array($sql,MYSQL_ASSOC))
{
$i++;
$priz=mysql_fetch_array(mysql_query("SELECT * FROM mmotop_prizi WHERE prizid='".($res['prizid'])."'"),MYSQL_ASSOC);
$name=mysql_result(mysql_query("SELECT name FROM etcitem WHERE item_id='".($priz['itemid'])."'"),0,0);
if (strlen($name)<1)
{
$name=mysql_result(mysql_query("SELECT name FROM weapon WHERE item_id='".($priz['itemid'])."'"),0,0);
}
if (strlen($name)<1)
{
$name=mysql_result(mysql_query("SELECT name FROM armor WHERE item_id='".($priz['itemid'])."'"),0,0);
}
echo "<tr><td class='myborder'>$i</td><td class='myborder'>".($res['data'])." ".($res['time'])."</td><td class='myborder'>".($res['name'])."</td><td class='myborder'>$name ".($priz['kolvo'])."</td></tr>";
}
?>
	</table>
            </div>
        </div>
        <div class="ftr"><div class="l"><div class="r"></div></div></div>
    </div>
    </td></tr>
</table>
        </td></tr>
    </table>

<?php
/*
<table border=0 width=98% align=center>
    <tr><td>
    <div class="headbar">
        <div class="h"><div class="htl"><div class="htr"><div class="hbl"><div class="hbr">
            <div class="def">
<table border=1 width=360 cellpadding="2" cellspacing="4" class="mytab">
<caption>10-ка самых активных "2009"</caption>
<tr><th class='myborder'>#</th>
<th class='myborder'> Персонаж </th>

<th class='myborder'> Количество голосов </th></tr>
<tr><td class='myborder'>1</td><td class='myborder'>xxzHEKPzxx</td><td class='myborder'>80</td></tr><tr><td class='myborder'>2</td><td class='myborder'>KOSTALOMKA      </td><td class='myborder'>76</td></tr><tr><td class='myborder'>3</td><td class='myborder'>C0ckall         </td><td class='myborder'>75</td></tr><tr><td class='myborder'>4</td><td class='myborder'>ZanuSSi         </td><td class='myborder'>73</td></tr><tr><td class='myborder'>5</td><td class='myborder'>ILKAR           </td><td class='myborder'>63</td></tr><tr><td class='myborder'>6</td><td class='myborder'>RusInFEAR       </td><td class='myborder'>62</td></tr><tr><td class='myborder'>7</td><td class='myborder'>CrazySniperOK   </td><td class='myborder'>61</td></tr><tr><td class='myborder'>8</td><td class='myborder'>Miyoko          </td><td class='myborder'>59</td></tr><tr><td class='myborder'>9</td><td class='myborder'>Svetlena        </td><td class='myborder'>59</td></tr><tr><td class='myborder'>10</td><td class='myborder'>lAnubisl        </td><td class='myborder'>58</td></tr></table><br>    </div></div></div>

	</td><td>
    <div class="headbar">
    <div class="h"><div class="htl"><div class="htr"><div class="hbl"><div class="hbr">
        <div class="def">
<table border=1 width=360 cellpadding="2" cellspacing="4" class="mytab">
<caption>10-ка самых активных "Июнь 2009"</caption>
<tr><th class='myborder'>#</th>
<th class='myborder'> Персонаж </th>
<th class='myborder'> Количество голосов </th></tr>

<tr><td class='myborder'>1</td><td class='myborder'>alcomaster      </td><td class='myborder'>30</td></tr><tr><td class='myborder'>2</td><td class='myborder'>lPEPCUl         </td><td class='myborder'>29</td></tr><tr><td class='myborder'>3</td><td class='myborder'>KPACAB4EK09     </td><td class='myborder'>28</td></tr><tr><td class='myborder'>4</td><td class='myborder'>llSkyl          </td><td class='myborder'>28</td></tr><tr><td class='myborder'>5</td><td class='myborder'>EpicOwner       </td><td class='myborder'>27</td></tr><tr><td class='myborder'>6</td><td class='myborder'>uMxoTen         </td><td class='myborder'>27</td></tr><tr><td class='myborder'>7</td><td class='myborder'>magistory       </td><td class='myborder'>26</td></tr><tr><td class='myborder'>8</td><td class='myborder'>zzBKzz          </td><td class='myborder'>26</td></tr><tr><td class='myborder'>9</td><td class='myborder'>ZanuSSi         </td><td class='myborder'>26</td></tr><tr><td class='myborder'>10</td><td class='myborder'>zzHUBLISzz      </td><td class='myborder'>25</td></tr></table><br>    </div></div></div>

	</td><td>
    <div class="headbar">
    <div class="h"><div class="htl"><div class="htr"><div class="hbl"><div class="hbr">
        <div class="def">

<table border=1 width=360 cellpadding="2" cellspacing="4" class="mytab">
<caption>10-ка самых активных "Июль 2009"</caption>
<tr><th class='myborder'>#</th>
<th class='myborder'> Персонаж </th>

<th class='myborder'> Количество голосов </th></tr>
<tr><td class='myborder'>1</td><td class='myborder'>ForestHunter    </td><td class='myborder'>22</td></tr><tr><td class='myborder'>2</td><td class='myborder'>vaah            </td><td class='myborder'>22</td></tr><tr><td class='myborder'>3</td><td class='myborder'>alcomaster      </td><td class='myborder'>21</td></tr><tr><td class='myborder'>4</td><td class='myborder'>BlackYama       </td><td class='myborder'>21</td></tr><tr><td class='myborder'>5</td><td class='myborder'>DiDiCyrax       </td><td class='myborder'>21</td></tr><tr><td class='myborder'>6</td><td class='myborder'>Doreen          </td><td class='myborder'>21</td></tr><tr><td class='myborder'>7</td><td class='myborder'>HeroDagger      </td><td class='myborder'>21</td></tr><tr><td class='myborder'>8</td><td class='myborder'>ILKAR           </td><td class='myborder'>21</td></tr><tr><td class='myborder'>9</td><td class='myborder'>3aXig           </td><td class='myborder'>20</td></tr><tr><td class='myborder'>10</td><td class='myborder'>C0ckall         </td><td class='myborder'>20</td></tr></table><br>    </div></div></div>

    </td></tr>
</table>
*/
#l2-scripts.ru studio script vote icq 9-013-612
?>

        </div></div></div></div>
    </div>

</td></tr>
</table>

<center> <a href="http://l2-scripts.ru"target= \"_blank\">Разработано l2-scripts.ru</a> </center>
<!--- Счетчики -->


</body>
</html>