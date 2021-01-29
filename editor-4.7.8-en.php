<?php
/** Adminer Editor - Compact database editor
* @link https://www.adminer.org/
* @author Jakub Vrana, https://www.vrana.cz/
* @copyright 2009 Jakub Vrana
* @license https://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
* @license https://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2 (one or other)
* @version 4.7.8
*/error_reporting(6133);$pc=!preg_match('~^(unsafe_raw)?$~',ini_get("filter.default"));if($pc||ini_get("filter.default_flags")){foreach(array('_GET','_POST','_COOKIE','_SERVER')as$X){$Hg=filter_input_array(constant("INPUT$X"),FILTER_UNSAFE_RAW);if($Hg)$$X=$Hg;}}if(function_exists("mb_internal_encoding"))mb_internal_encoding("8bit");function
connection(){global$g;return$g;}function
adminer(){global$b;return$b;}function
version(){global$ca;return$ca;}function
idf_unescape($t){$_d=substr($t,-1);return
str_replace($_d.$_d,$_d,substr($t,1,-1));}function
escape_string($X){return
substr(q($X),1,-1);}function
number($X){return
preg_replace('~[^0-9]+~','',$X);}function
number_type(){return'((?<!o)int(?!er)|numeric|real|float|double|decimal|money)';}function
remove_slashes($Qe,$pc=false){if(function_exists("get_magic_quotes_gpc")&&get_magic_quotes_gpc()){while(list($x,$X)=each($Qe)){foreach($X
as$rd=>$W){unset($Qe[$x][$rd]);if(is_array($W)){$Qe[$x][stripslashes($rd)]=$W;$Qe[]=&$Qe[$x][stripslashes($rd)];}else$Qe[$x][stripslashes($rd)]=($pc?$W:stripslashes($W));}}}}function
bracket_escape($t,$Ha=false){static$tg=array(':'=>':1',']'=>':2','['=>':3','"'=>':4');return
strtr($t,($Ha?array_flip($tg):$tg));}function
min_version($Ug,$Ld="",$h=null){global$g;if(!$h)$h=$g;$_f=$h->server_info;if($Ld&&preg_match('~([\d.]+)-MariaDB~',$_f,$_)){$_f=$_[1];$Ug=$Ld;}return(version_compare($_f,$Ug)>=0);}function
charset($g){return(min_version("5.5.3",0,$g)?"utf8mb4":"utf8");}function
script($If,$sg="\n"){return"<script".nonce().">$If</script>$sg";}function
script_src($Mg){return"<script src='".h($Mg)."'".nonce()."></script>\n";}function
nonce(){return' nonce="'.get_nonce().'"';}function
target_blank(){return' target="_blank" rel="noreferrer noopener"';}function
h($Q){return
str_replace("\0","&#0;",htmlspecialchars($Q,ENT_QUOTES,'utf-8'));}function
nl_br($Q){return
str_replace("\n","<br>",$Q);}function
checkbox($A,$Y,$Wa,$xd="",$ne="",$ab="",$yd=""){$J="<input type='checkbox' name='$A' value='".h($Y)."'".($Wa?" checked":"").($yd?" aria-labelledby='$yd'":"").">".($ne?script("qsl('input').onclick = function () { $ne };",""):"");return($xd!=""||$ab?"<label".($ab?" class='$ab'":"").">$J".h($xd)."</label>":$J);}function
optionlist($B,$uf=null,$Qg=false){$J="";foreach($B
as$rd=>$W){$se=array($rd=>$W);if(is_array($W)){$J.='<optgroup label="'.h($rd).'">';$se=$W;}foreach($se
as$x=>$X)$J.='<option'.($Qg||is_string($x)?' value="'.h($x).'"':'').(($Qg||is_string($x)?(string)$x:$X)===$uf?' selected':'').'>'.h($X);if(is_array($W))$J.='</optgroup>';}return$J;}function
html_select($A,$B,$Y="",$me=true,$yd=""){if($me)return"<select name='".h($A)."'".($yd?" aria-labelledby='$yd'":"").">".optionlist($B,$Y)."</select>".(is_string($me)?script("qsl('select').onchange = function () { $me };",""):"");$J="";foreach($B
as$x=>$X)$J.="<label><input type='radio' name='".h($A)."' value='".h($x)."'".($x==$Y?" checked":"").">".h($X)."</label>";return$J;}function
select_input($Ca,$B,$Y="",$me="",$He=""){$bg=($B?"select":"input");return"<$bg$Ca".($B?"><option value=''>$He".optionlist($B,$Y,true)."</select>":" size='10' value='".h($Y)."' placeholder='$He'>").($me?script("qsl('$bg').onchange = $me;",""):"");}function
confirm($Td="",$vf="qsl('input')"){return
script("$vf.onclick = function () { return confirm('".($Td?js_escape($Td):'Are you sure?')."'); };","");}function
print_fieldset($s,$Bd,$Xg=false){echo"<fieldset><legend>","<a href='#fieldset-$s'>$Bd</a>",script("qsl('a').onclick = partial(toggle, 'fieldset-$s');",""),"</legend>","<div id='fieldset-$s'".($Xg?"":" class='hidden'").">\n";}function
bold($Pa,$ab=""){return($Pa?" class='active $ab'":($ab?" class='$ab'":""));}function
odd($J=' class="odd"'){static$r=0;if(!$J)$r=-1;return($r++%2?$J:'');}function
js_escape($Q){return
addcslashes($Q,"\r\n'\\/");}function
json_row($x,$X=null){static$qc=true;if($qc)echo"{";if($x!=""){echo($qc?"":",")."\n\t\"".addcslashes($x,"\r\n\t\"\\/").'": '.($X!==null?'"'.addcslashes($X,"\r\n\"\\/").'"':'null');$qc=false;}else{echo"\n}\n";$qc=true;}}function
ini_bool($hd){$X=ini_get($hd);return(preg_match('~^(on|true|yes)$~i',$X)||(int)$X);}function
sid(){static$J;if($J===null)$J=(SID&&!($_COOKIE&&ini_bool("session.use_cookies")));return$J;}function
set_password($Tg,$O,$V,$F){$_SESSION["pwds"][$Tg][$O][$V]=($_COOKIE["adminer_key"]&&is_string($F)?array(encrypt_string($F,$_COOKIE["adminer_key"])):$F);}function
get_password(){$J=get_session("pwds");if(is_array($J))$J=($_COOKIE["adminer_key"]?decrypt_string($J[0],$_COOKIE["adminer_key"]):false);return$J;}function
q($Q){global$g;return$g->quote($Q);}function
get_vals($G,$e=0){global$g;$J=array();$I=$g->query($G);if(is_object($I)){while($K=$I->fetch_row())$J[]=$K[$e];}return$J;}function
get_key_vals($G,$h=null,$Cf=true){global$g;if(!is_object($h))$h=$g;$J=array();$I=$h->query($G);if(is_object($I)){while($K=$I->fetch_row()){if($Cf)$J[$K[0]]=$K[1];else$J[]=$K[0];}}return$J;}function
get_rows($G,$h=null,$n="<p class='error'>"){global$g;$lb=(is_object($h)?$h:$g);$J=array();$I=$lb->query($G);if(is_object($I)){while($K=$I->fetch_assoc())$J[]=$K;}elseif(!$I&&!is_object($h)&&$n&&defined("PAGE_HEADER"))echo$n.error()."\n";return$J;}function
unique_array($K,$v){foreach($v
as$u){if(preg_match("~PRIMARY|UNIQUE~",$u["type"])){$J=array();foreach($u["columns"]as$x){if(!isset($K[$x]))continue
2;$J[$x]=$K[$x];}return$J;}}}function
escape_key($x){if(preg_match('(^([\w(]+)('.str_replace("_",".*",preg_quote(idf_escape("_"))).')([ \w)]+)$)',$x,$_))return$_[1].idf_escape(idf_unescape($_[2])).$_[3];return
idf_escape($x);}function
where($Z,$p=array()){global$g,$w;$J=array();foreach((array)$Z["where"]as$x=>$X){$x=bracket_escape($x,1);$e=escape_key($x);$J[]=$e.($w=="sql"&&is_numeric($X)&&preg_match('~\.~',$X)?" LIKE ".q($X):($w=="mssql"?" LIKE ".q(preg_replace('~[_%[]~','[\0]',$X)):" = ".unconvert_field($p[$x],q($X))));if($w=="sql"&&preg_match('~char|text~',$p[$x]["type"])&&preg_match("~[^ -@]~",$X))$J[]="$e = ".q($X)." COLLATE ".charset($g)."_bin";}foreach((array)$Z["null"]as$x)$J[]=escape_key($x)." IS NULL";return
implode(" AND ",$J);}function
where_check($X,$p=array()){parse_str($X,$Ua);remove_slashes(array(&$Ua));return
where($Ua,$p);}function
where_link($r,$e,$Y,$pe="="){return"&where%5B$r%5D%5Bcol%5D=".urlencode($e)."&where%5B$r%5D%5Bop%5D=".urlencode(($Y!==null?$pe:"IS NULL"))."&where%5B$r%5D%5Bval%5D=".urlencode($Y);}function
convert_fields($f,$p,$M=array()){$J="";foreach($f
as$x=>$X){if($M&&!in_array(idf_escape($x),$M))continue;$za=convert_field($p[$x]);if($za)$J.=", $za AS ".idf_escape($x);}return$J;}function
cookie($A,$Y,$Ed=2592000){global$aa;return
header("Set-Cookie: $A=".urlencode($Y).($Ed?"; expires=".gmdate("D, d M Y H:i:s",time()+$Ed)." GMT":"")."; path=".preg_replace('~\?.*~','',$_SERVER["REQUEST_URI"]).($aa?"; secure":"")."; HttpOnly; SameSite=lax",false);}function
restart_session(){if(!ini_bool("session.use_cookies"))session_start();}function
stop_session($vc=false){$Pg=ini_bool("session.use_cookies");if(!$Pg||$vc){session_write_close();if($Pg&&@ini_set("session.use_cookies",false)===false)session_start();}}function&get_session($x){return$_SESSION[$x][DRIVER][SERVER][$_GET["username"]];}function
set_session($x,$X){$_SESSION[$x][DRIVER][SERVER][$_GET["username"]]=$X;}function
auth_url($Tg,$O,$V,$l=null){global$Ib;preg_match('~([^?]*)\??(.*)~',remove_from_uri(implode("|",array_keys($Ib))."|username|".($l!==null?"db|":"").session_name()),$_);return"$_[1]?".(sid()?SID."&":"").($Tg!="server"||$O!=""?urlencode($Tg)."=".urlencode($O)."&":"")."username=".urlencode($V).($l!=""?"&db=".urlencode($l):"").($_[2]?"&$_[2]":"");}function
is_ajax(){return($_SERVER["HTTP_X_REQUESTED_WITH"]=="XMLHttpRequest");}function
redirect($Gd,$Td=null){if($Td!==null){restart_session();$_SESSION["messages"][preg_replace('~^[^?]*~','',($Gd!==null?$Gd:$_SERVER["REQUEST_URI"]))][]=$Td;}if($Gd!==null){if($Gd=="")$Gd=".";header("Location: $Gd");exit;}}function
query_redirect($G,$Gd,$Td,$af=true,$bc=true,$ic=false,$ig=""){global$g,$n,$b;if($bc){$Of=microtime(true);$ic=!$g->query($G);$ig=format_time($Of);}$Lf="";if($G)$Lf=$b->messageQuery($G,$ig,$ic);if($ic){$n=error().$Lf.script("messagesPrint();");return
false;}if($af)redirect($Gd,$Td.$Lf);return
true;}function
queries($G){global$g;static$Ue=array();static$Of;if(!$Of)$Of=microtime(true);if($G===null)return
array(implode("\n",$Ue),format_time($Of));$Ue[]=(preg_match('~;$~',$G)?"DELIMITER ;;\n$G;\nDELIMITER ":$G).";";return$g->query($G);}function
apply_queries($G,$T,$Yb='table'){foreach($T
as$R){if(!queries("$G ".$Yb($R)))return
false;}return
true;}function
queries_redirect($Gd,$Td,$af){list($Ue,$ig)=queries(null);return
query_redirect($Ue,$Gd,$Td,$af,false,!$af,$ig);}function
format_time($Of){return
sprintf('%.3f s',max(0,microtime(true)-$Of));}function
relative_uri(){return
str_replace(":","%3a",preg_replace('~^[^?]*/([^?]*)~','\1',$_SERVER["REQUEST_URI"]));}function
remove_from_uri($ze=""){return
substr(preg_replace("~(?<=[?&])($ze".(SID?"":"|".session_name()).")=[^&]*&~",'',relative_uri()."&"),0,-1);}function
pagination($D,$vb){return" ".($D==$vb?$D+1:'<a href="'.h(remove_from_uri("page").($D?"&page=$D".($_GET["next"]?"&next=".urlencode($_GET["next"]):""):"")).'">'.($D+1)."</a>");}function
get_file($x,$zb=false){$nc=$_FILES[$x];if(!$nc)return
null;foreach($nc
as$x=>$X)$nc[$x]=(array)$X;$J='';foreach($nc["error"]as$x=>$n){if($n)return$n;$A=$nc["name"][$x];$pg=$nc["tmp_name"][$x];$ob=file_get_contents($zb&&preg_match('~\.gz$~',$A)?"compress.zlib://$pg":$pg);if($zb){$Of=substr($ob,0,3);if(function_exists("iconv")&&preg_match("~^\xFE\xFF|^\xFF\xFE~",$Of,$bf))$ob=iconv("utf-16","utf-8",$ob);elseif($Of=="\xEF\xBB\xBF")$ob=substr($ob,3);$J.=$ob."\n\n";}else$J.=$ob;}return$J;}function
upload_error($n){$Qd=($n==UPLOAD_ERR_INI_SIZE?ini_get("upload_max_filesize"):0);return($n?'Unable to upload a file.'.($Qd?" ".sprintf('Maximum allowed file size is %sB.',$Qd):""):'File does not exist.');}function
repeat_pattern($Ee,$Cd){return
str_repeat("$Ee{0,65535}",$Cd/65535)."$Ee{0,".($Cd%65535)."}";}function
is_utf8($X){return(preg_match('~~u',$X)&&!preg_match('~[\0-\x8\xB\xC\xE-\x1F]~',$X));}function
shorten_utf8($Q,$Cd=80,$Vf=""){if(!preg_match("(^(".repeat_pattern("[\t\r\n -\x{10FFFF}]",$Cd).")($)?)u",$Q,$_))preg_match("(^(".repeat_pattern("[\t\r\n -~]",$Cd).")($)?)",$Q,$_);return
h($_[1]).$Vf.(isset($_[2])?"":"<i>‚Ä¶</i>");}function
format_number($X){return
strtr(number_format($X,0,".",','),preg_split('~~u','0123456789',-1,PREG_SPLIT_NO_EMPTY));}function
friendly_url($X){return
preg_replace('~[^a-z0-9_]~i','-',$X);}function
hidden_fields($Qe,$Yc=array(),$Le=''){$J=false;foreach($Qe
as$x=>$X){if(!in_array($x,$Yc)){if(is_array($X))hidden_fields($X,array(),$x);else{$J=true;echo'<input type="hidden" name="'.h($Le?$Le."[$x]":$x).'" value="'.h($X).'">';}}}return$J;}function
hidden_fields_get(){echo(sid()?'<input type="hidden" name="'.session_name().'" value="'.h(session_id()).'">':''),(SERVER!==null?'<input type="hidden" name="'.DRIVER.'" value="'.h(SERVER).'">':""),'<input type="hidden" name="username" value="'.h($_GET["username"]).'">';}function
table_status1($R,$jc=false){$J=table_status($R,$jc);return($J?$J:array("Name"=>$R));}function
column_foreign_keys($R){global$b;$J=array();foreach($b->foreignKeys($R)as$zc){foreach($zc["source"]as$X)$J[$X][]=$zc;}return$J;}function
enum_input($U,$Ca,$o,$Y,$Tb=null){global$b;preg_match_all("~'((?:[^']|'')*)'~",$o["length"],$Nd);$J=($Tb!==null?"<label><input type='$U'$Ca value='$Tb'".((is_array($Y)?in_array($Tb,$Y):$Y===0)?" checked":"")."><i>".'empty'."</i></label>":"");foreach($Nd[1]as$r=>$X){$X=stripcslashes(str_replace("''","'",$X));$Wa=(is_int($Y)?$Y==$r+1:(is_array($Y)?in_array($r+1,$Y):$Y===$X));$J.=" <label><input type='$U'$Ca value='".($r+1)."'".($Wa?' checked':'').'>'.h($b->editVal($X,$o)).'</label>';}return$J;}function
input($o,$Y,$Ec){global$Cg,$b,$w;$A=h(bracket_escape($o["field"]));echo"<td class='function'>";if(is_array($Y)&&!$Ec){$xa=array($Y);if(version_compare(PHP_VERSION,5.4)>=0)$xa[]=JSON_PRETTY_PRINT;$Y=call_user_func_array('json_encode',$xa);$Ec="json";}$gf=($w=="mssql"&&$o["auto_increment"]);if($gf&&!$_POST["save"])$Ec=null;$Fc=(isset($_GET["select"])||$gf?array("orig"=>'original'):array())+$b->editFunctions($o);$Ca=" name='fields[$A]'";if($o["type"]=="enum")echo
h($Fc[""])."<td>".$b->editInput($_GET["edit"],$o,$Ca,$Y);else{$Mc=(in_array($Ec,$Fc)||isset($Fc[$Ec]));echo(count($Fc)>1?"<select name='function[$A]'>".optionlist($Fc,$Ec===null||$Mc?$Ec:"")."</select>".on_help("getTarget(event).value.replace(/^SQL\$/, '')",1).script("qsl('select').onchange = functionChange;",""):h(reset($Fc))).'<td>';$jd=$b->editInput($_GET["edit"],$o,$Ca,$Y);if($jd!="")echo$jd;elseif(preg_match('~bool~',$o["type"]))echo"<input type='hidden'$Ca value='0'>"."<input type='checkbox'".(preg_match('~^(1|t|true|y|yes|on)$~i',$Y)?" checked='checked'":"")."$Ca value='1'>";elseif($o["type"]=="set"){preg_match_all("~'((?:[^']|'')*)'~",$o["length"],$Nd);foreach($Nd[1]as$r=>$X){$X=stripcslashes(str_replace("''","'",$X));$Wa=(is_int($Y)?($Y>>$r)&1:in_array($X,explode(",",$Y),true));echo" <label><input type='checkbox' name='fields[$A][$r]' value='".(1<<$r)."'".($Wa?' checked':'').">".h($b->editVal($X,$o)).'</label>';}}elseif(preg_match('~blob|bytea|raw|file~',$o["type"])&&ini_bool("file_uploads"))echo"<input type='file' name='fields-$A'>";elseif(($fg=preg_match('~text|lob|memo~i',$o["type"]))||preg_match("~\n~",$Y)){if($fg&&$w!="sqlite")$Ca.=" cols='50' rows='12'";else{$L=min(12,substr_count($Y,"\n")+1);$Ca.=" cols='30' rows='$L'".($L==1?" style='height: 1.2em;'":"");}echo"<textarea$Ca>".h($Y).'</textarea>';}elseif($Ec=="json"||preg_match('~^jsonb?$~',$o["type"]))echo"<textarea$Ca cols='50' rows='12' class='jush-js'>".h($Y).'</textarea>';else{$Sd=(!preg_match('~int~',$o["type"])&&preg_match('~^(\d+)(,(\d+))?$~',$o["length"],$_)?((preg_match("~binary~",$o["type"])?2:1)*$_[1]+($_[3]?1:0)+($_[2]&&!$o["unsigned"]?1:0)):($Cg[$o["type"]]?$Cg[$o["type"]]+($o["unsigned"]?0:1):0));if($w=='sql'&&min_version(5.6)&&preg_match('~time~',$o["type"]))$Sd+=7;echo"<input".((!$Mc||$Ec==="")&&preg_match('~(?<!o)int(?!er)~',$o["type"])&&!preg_match('~\[\]~',$o["full_type"])?" type='number'":"")." value='".h($Y)."'".($Sd?" data-maxlength='$Sd'":"").(preg_match('~char|binary~',$o["type"])&&$Sd>20?" size='40'":"")."$Ca>";}echo$b->editHint($_GET["edit"],$o,$Y);$qc=0;foreach($Fc
as$x=>$X){if($x===""||!$X)break;$qc++;}if($qc)echo
script("mixin(qsl('td'), {onchange: partial(skipOriginal, $qc), oninput: function () { this.onchange(); }});");}}function
process_input($o){global$b,$m;$t=bracket_escape($o["field"]);$Ec=$_POST["function"][$t];$Y=$_POST["fields"][$t];if($o["type"]=="enum"){if($Y==-1)return
false;if($Y=="")return"NULL";return+$Y;}if($o["auto_increment"]&&$Y=="")return
null;if($Ec=="orig")return(preg_match('~^CURRENT_TIMESTAMP~i',$o["on_update"])?idf_escape($o["field"]):false);if($Ec=="NULL")return"NULL";if($o["type"]=="set")return
array_sum((array)$Y);if($Ec=="json"){$Ec="";$Y=json_decode($Y,true);if(!is_array($Y))return
false;return$Y;}if(preg_match('~blob|bytea|raw|file~',$o["type"])&&ini_bool("file_uploads")){$nc=get_file("fields-$t");if(!is_string($nc))return
false;return$m->quoteBinary($nc);}return$b->processInput($o,$Y,$Ec);}function
fields_from_edit(){global$m;$J=array();foreach((array)$_POST["field_keys"]as$x=>$X){if($X!=""){$X=bracket_escape($X);$_POST["function"][$X]=$_POST["field_funs"][$x];$_POST["fields"][$X]=$_POST["field_vals"][$x];}}foreach((array)$_POST["fields"]as$x=>$X){$A=bracket_escape($x,1);$J[$A]=array("field"=>$A,"privileges"=>array("insert"=>1,"update"=>1),"null"=>1,"auto_increment"=>($x==$m->primary),);}return$J;}function
search_tables(){global$b,$g;$_GET["where"][0]["val"]=$_POST["query"];$xf="<ul>\n";foreach(table_status('',true)as$R=>$S){$A=$b->tableName($S);if(isset($S["Engine"])&&$A!=""&&(!$_POST["tables"]||in_array($R,$_POST["tables"]))){$I=$g->query("SELECT".limit("1 FROM ".table($R)," WHERE ".implode(" AND ",$b->selectSearchProcess(fields($R),array())),1));if(!$I||$I->fetch_row()){$Oe="<a href='".h(ME."select=".urlencode($R)."&where[0][op]=".urlencode($_GET["where"][0]["op"])."&where[0][val]=".urlencode($_GET["where"][0]["val"]))."'>$A</a>";echo"$xf<li>".($I?$Oe:"<p class='error'>$Oe: ".error())."\n";$xf="";}}}echo($xf?"<p class='message'>".'No tables.':"</ul>")."\n";}function
dump_headers($Vc,$Yd=false){global$b;$J=$b->dumpHeaders($Vc,$Yd);$we=$_POST["output"];if($we!="text")header("Content-Disposition: attachment; filename=".$b->dumpFilename($Vc).".$J".($we!="file"&&!preg_match('~[^0-9a-z]~',$we)?".$we":""));session_write_close();ob_flush();flush();return$J;}function
dump_csv($K){foreach($K
as$x=>$X){if(preg_match("~[\"\n,;\t]~",$X)||$X==="")$K[$x]='"'.str_replace('"','""',$X).'"';}echo
implode(($_POST["format"]=="csv"?",":($_POST["format"]=="tsv"?"\t":";")),$K)."\r\n";}function
apply_sql_function($Ec,$e){return($Ec?($Ec=="unixepoch"?"DATETIME($e, '$Ec')":($Ec=="count distinct"?"COUNT(DISTINCT ":strtoupper("$Ec("))."$e)"):$e);}function
get_temp_dir(){$J=ini_get("upload_tmp_dir");if(!$J){if(function_exists('sys_get_temp_dir'))$J=sys_get_temp_dir();else{$q=@tempnam("","");if(!$q)return
false;$J=dirname($q);unlink($q);}}return$J;}function
file_open_lock($q){$Cc=@fopen($q,"r+");if(!$Cc){$Cc=@fopen($q,"w");if(!$Cc)return;chmod($q,0660);}flock($Cc,LOCK_EX);return$Cc;}function
file_write_unlock($Cc,$wb){rewind($Cc);fwrite($Cc,$wb);ftruncate($Cc,strlen($wb));flock($Cc,LOCK_UN);fclose($Cc);}function
password_file($rb){$q=get_temp_dir()."/adminer.key";$J=@file_get_contents($q);if($J||!$rb)return$J;$Cc=@fopen($q,"w");if($Cc){chmod($q,0660);$J=rand_string();fwrite($Cc,$J);fclose($Cc);}return$J;}function
rand_string(){return
md5(uniqid(mt_rand(),true));}function
select_value($X,$z,$o,$gg){global$b;if(is_array($X)){$J="";foreach($X
as$rd=>$W)$J.="<tr>".($X!=array_values($X)?"<th>".h($rd):"")."<td>".select_value($W,$z,$o,$gg);return"<table cellspacing='0'>$J</table>";}if(!$z)$z=$b->selectLink($X,$o);if($z===null){if(is_mail($X))$z="mailto:$X";if(is_url($X))$z=$X;}$J=$b->editVal($X,$o);if($J!==null){if(!is_utf8($J))$J="\0";elseif($gg!=""&&is_shortable($o))$J=shorten_utf8($J,max(0,+$gg));else$J=h($J);}return$b->selectVal($J,$z,$o,$X);}function
is_mail($Qb){$_a='[-a-z0-9!#$%&\'*+/=?^_`{|}~]';$Hb='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';$Ee="$_a+(\\.$_a+)*@($Hb?\\.)+$Hb";return
is_string($Qb)&&preg_match("(^$Ee(,\\s*$Ee)*\$)i",$Qb);}function
is_url($Q){$Hb='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';return
preg_match("~^(https?)://($Hb?\\.)+$Hb(:\\d+)?(/.*)?(\\?.*)?(#.*)?\$~i",$Q);}function
is_shortable($o){return
preg_match('~char|text|json|lob|geometry|point|linestring|polygon|string|bytea~',$o["type"]);}function
count_rows($R,$Z,$od,$Gc){global$w;$G=" FROM ".table($R).($Z?" WHERE ".implode(" AND ",$Z):"");return($od&&($w=="sql"||count($Gc)==1)?"SELECT COUNT(DISTINCT ".implode(", ",$Gc).")$G":"SELECT COUNT(*)".($od?" FROM (SELECT 1$G GROUP BY ".implode(", ",$Gc).") x":$G));}function
slow_query($G){global$b,$rg,$m;$l=$b->database();$jg=$b->queryTimeout();$Ff=$m->slowQuery($G,$jg);if(!$Ff&&support("kill")&&is_object($h=connect())&&($l==""||$h->select_db($l))){$wd=$h->result(connection_id());echo'<script',nonce(),'>
var timeout = setTimeout(function () {
	ajax(\'',js_escape(ME),'script=kill\', function () {
	}, \'kill=',$wd,'&token=',$rg,'\');
}, ',1000*$jg,');
</script>
';}else$h=null;ob_flush();flush();$J=@get_key_vals(($Ff?$Ff:$G),$h,false);if($h){echo
script("clearTimeout(timeout);");ob_flush();flush();}return$J;}function
get_token(){$We=rand(1,1e6);return($We^$_SESSION["token"]).":$We";}function
verify_token(){list($rg,$We)=explode(":",$_POST["token"]);return($We^$_SESSION["token"])==$rg;}function
lzw_decompress($Ma){$Fb=256;$Na=8;$cb=array();$if=0;$jf=0;for($r=0;$r<strlen($Ma);$r++){$if=($if<<8)+ord($Ma[$r]);$jf+=8;if($jf>=$Na){$jf-=$Na;$cb[]=$if>>$jf;$if&=(1<<$jf)-1;$Fb++;if($Fb>>$Na)$Na++;}}$Eb=range("\0","\xFF");$J="";foreach($cb
as$r=>$bb){$Pb=$Eb[$bb];if(!isset($Pb))$Pb=$gh.$gh[0];$J.=$Pb;if($r)$Eb[]=$gh.$Pb[0];$gh=$Pb;}return$J;}function
on_help($hb,$Df=0){return
script("mixin(qsl('select, input'), {onmouseover: function (event) { helpMouseover.call(this, event, $hb, $Df) }, onmouseout: helpMouseout});","");}function
edit_form($a,$p,$K,$Kg){global$b,$w,$rg,$n;$Zf=$b->tableName(table_status1($a,true));page_header(($Kg?'Edit':'Insert'),$n,array("select"=>array($a,$Zf)),$Zf);if($K===false)echo"<p class='error'>".'No rows.'."\n";echo'<form action="" method="post" enctype="multipart/form-data" id="form">
';if(!$p)echo"<p class='error'>".'You have no privileges to update this table.'."\n";else{echo"<table cellspacing='0' class='layout'>".script("qsl('table').onkeydown = editingKeydown;");foreach($p
as$A=>$o){echo"<tr><th>".$b->fieldName($o);$_b=$_GET["set"][bracket_escape($A)];if($_b===null){$_b=$o["default"];if($o["type"]=="bit"&&preg_match("~^b'([01]*)'\$~",$_b,$bf))$_b=$bf[1];}$Y=($K!==null?($K[$A]!=""&&$w=="sql"&&preg_match("~enum|set~",$o["type"])?(is_array($K[$A])?array_sum($K[$A]):+$K[$A]):$K[$A]):(!$Kg&&$o["auto_increment"]?"":(isset($_GET["select"])?false:$_b)));if(!$_POST["save"]&&is_string($Y))$Y=$b->editVal($Y,$o);$Ec=($_POST["save"]?(string)$_POST["function"][$A]:($Kg&&preg_match('~^CURRENT_TIMESTAMP~i',$o["on_update"])?"now":($Y===false?null:($Y!==null?'':'NULL'))));if(preg_match("~time~",$o["type"])&&preg_match('~^CURRENT_TIMESTAMP~i',$Y)){$Y="";$Ec="now";}input($o,$Y,$Ec);echo"\n";}if(!support("table"))echo"<tr>"."<th><input name='field_keys[]'>".script("qsl('input').oninput = fieldChange;")."<td class='function'>".html_select("field_funs[]",$b->editFunctions(array("null"=>isset($_GET["select"]))))."<td><input name='field_vals[]'>"."\n";echo"</table>\n";}echo"<p>\n";if($p){echo"<input type='submit' value='".'Save'."'>\n";if(!isset($_GET["select"])){echo"<input type='submit' name='insert' value='".($Kg?'Save and continue edit':'Save and insert next')."' title='Ctrl+Shift+Enter'>\n",($Kg?script("qsl('input').onclick = function () { return !ajaxForm(this.form, '".'Saving'."‚Ä¶', this); };"):"");}}echo($Kg?"<input type='submit' name='delete' value='".'Delete'."'>".confirm()."\n":($_POST||!$p?"":script("focus(qsa('td', qs('#form'))[1].firstChild);")));if(isset($_GET["select"]))hidden_fields(array("check"=>(array)$_POST["check"],"clone"=>$_POST["clone"],"all"=>$_POST["all"]));echo'<input type="hidden" name="referer" value="',h(isset($_POST["referer"])?$_POST["referer"]:$_SERVER["HTTP_REFERER"]),'">
<input type="hidden" name="save" value="1">
<input type="hidden" name="token" value="',$rg,'">
</form>
';}if(isset($_GET["file"])){if($_SERVER["HTTP_IF_MODIFIED_SINCE"]){header("HTTP/1.1 304 Not Modified");exit;}header("Expires: ".gmdate("D, d M Y H:i:s",time()+365*24*60*60)." GMT");header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");header("Cache-Control: immutable");if($_GET["file"]=="favicon.ico"){header("Content-Type: image/x-icon");echo
lzw_decompress("\0\0\0` \0Ñ\0\n @\0¥CÑË\"\0`E„Q∏‡ˇá?¿tvM'îJd¡d\\åb0\0ƒ\"ô¿f”à§Ós5õœÁ—AùXPaJì0Ñ•ë8Ñ#RäT©ëz`à#.©«cÌX√˛»Ä?¿-\0°Im?†.´M∂Ä\0»Ø(Ãâ˝¿/(%å\0");}elseif($_GET["file"]=="default.css"){header("Content-Type: text/css; charset=utf-8");echo
lzw_decompress("\n1ÃáìŸåﬁl7úáB1Ñ4vb0òÕfsëºÍn2BÃ—±Ÿòﬁn:á#(ºb.\rDc)»»a7EÑë§¬l¶√±îËi1Ãésò¥Á-4ôáf”	»Œi7Ü≥π§»t4Ö¶”yËZf4ù∞iñAT´VVêÈf:œ¶,:1¶Q›ºÒb2`«#˛>:7GÔó1—ÿ“s∞ôLóXD*bv<‹å#£e@÷:4Áß!foê∑∆t:<•‹Âíæôo‚‹\ni√≈',Èªa_§:πiÔÖ¥¡Bv¯|N˚4.5NfÅi¢vp–h∏∞l®Í°÷ö‹O¶ÅâÓ= £OFQ–ƒk\$•”iıô¿¬d2T„°p‡ 6Ñã˛á°-ÿZÄéÉ†ﬁ6Ω£Äh:¨aÃ,é£ÎÓ2ç#8–ê±#íò6n‚ÓÜÒJà¢h´tÖå±ä‰4O42ÙΩokﬁæ*r†©Ä@p@Ü!ƒæœ√Ù˛?–6¿âr[çL¡ã:2Bàjß!HbÛ√P‰=!1Vâ\"à≤0Öø\nS∆∆œD7√ÏD⁄õ√C!Ü!õ‡¶G åß »+í=tCÊ©.C§¿:+» =™™∫≤°±Â%™cÌ1MR/îE»í4Ñ©†2∞‰±†„`¬8(·”π[W‰—=âySÅb∞=÷-‹πBS+…Ø»‹˝•¯@pL4Yd„Ñqä¯„¶Í¢6£3ƒ¨Ø∏Ac‹åËŒ®åkÇ[&>ˆï®Z¡pkm]óu-c:ÿ∏àNtÊŒ¥p“ùåä8Ë=ø#ò·[.‹ﬁØç~†çÅmÀyáPP·|I÷õ˘¿ÏQ™9v[ñQïÑ\nñŸrÙ'gá+ê·T—2Ö≠V¡ız‰4ç£8˜è(	æEy*#j¨2]≠ïR“¡ë•)É¿[N≠R\$ä<>:Û≠>\$;ñ>†Ã\rªÑŒHÕ√T»\nw°N Âwÿ£¶Ï<ÔÀGw‡ˆˆπ\\YÛ_†Rt^å>é\r}åŸS\rzÈ4=µ\nLî%J„ã\",Z†8∏ûôêi˜0u©?®˚—Ù°s3#®Ÿâ†:Û¶˚ç„Ωñ»ﬁE]x›“Ås^8é£K^…˜*0—ﬁwﬁ‡»ﬁ~è„ˆ:Ì—iÿ˛èv2wΩˇ±˚^7ê„Ú7£c›—u+U%é{P‹*4ÃºÈLX./!ºâ1C≈ﬂqx!Hπ„Fd˘≠L®§®ƒ†œ`6ÎË5ÆôfÄ∏ƒÜ®=H¯l åV1ìõ\0a2◊;Å‘6Ü‡ˆ˛_Ÿáƒ\0&ÙZ‹S†d)KE'íÄnµê[X©≥\0Z…ä‘F[Pëﬁò@‡ﬂ!âÒY¬,`…\"⁄∑Å¬0Ee9yF>À‘9b∫ñåÊF5:¸àî\0}ƒ¥äá(\$û”áÎÄ37Hˆ£Ë MæA∞≤6Rï˙{Mq›7G†⁄CôCÍm2¢(åCt>[Ï-t¿/&Cõ]ÍetGÙÃ¨4@r>«¬Â<öSqï/Â˙îQÎçhmçö¿–∆Ù„ÙùL¿‹#ËÙKÀ|ÆôÑ6fKP›\r%t‘”V=\"†SH\$ù} ∏Å)w°,W\0F≥™u@ÿb¶9Ç\rr∞2√#¨DåîXÉ≥⁄yOI˘>ªÖnÅÜ«¢%„˘ê'ã›_¡Ät\rœÑzƒ\\1òhlº]Q5Mp6kÜ–ƒqh√\$£H~Õ|“›!*4åÒÚ€`SÎ˝≤S tÌPP\\g±Ë7á\n-ä:Ë¢™p¥ïîàlãBû¶Óî7”®cÉ(wO0\\:ï–wî¡ùp4àìÚ{T⁄˙jO§6H√ä∂r’•êq\n¶…%%∂y']\$ÇîaëZ”.fc’q*-ÍFW∫˙kçÑzÉ∞µjëé∞lg·å:á\$\"ﬁNº\r#…d‚√Ç¬ˇ–sc·¨Ã†ÑÉ\"j™\r¿∂ñ¶à’íºPhã1/ÇúDA)†≤›[¿kn¡p76¡Y¥âR{·M§P˚∞Ú@\n-∏a∑6˛ﬂ[ªzJH,ñdl†B£hêo≥çÏÚ¨+á#Dr^µ^µŸeöºEΩΩñ ƒúaPâÙıJG£z‡ÒtÒ†2«XŸ¢¥¡øV∂◊ﬂ‡ﬁ»≥â—B_%K=E©∏bÂºæﬂ¬ßkU(.!‹Æ8∏ú¸…I.@éKÕxn˛¨¸:√PÛ32´îmÌH		C*Ï:v‚T≈\nRπÉïµã0u¬ÌÉÊÓ“ß]ŒØòäîP/µJQd•{Lñﬁ≥:Y¡è2bºúT Òù 3”4Üó‰cÍ•V=êøÜL4Œ–rƒ!ﬂBY≥6Õ≠MeLä™‹Áúˆ˘i¿o–9< Gî§∆ï–ôMhm^ØU€N¿å∑ÚTr5HiMî/¨nÉÌù≥T†ç[-<__Ó3/Xr(<áØäÜÆ…ÙìÃu“ñGNX20Â\r\$^áç:'9Ë∂OÖÌ;◊kèºÜµf†ñN'a∂î«≠b≈,ÀV§ÙÖ´1µÔHI!%6@˙œ\$“EG⁄ú¨1ù(mU™ÂÖr’ΩÔﬂÂ`°–iN+√úÒ)öú‰0lÿ“f0√Ω[U‚¯V Ë-:I^†ò\$ÿs´b\reáëug…h™~9€ﬂàùbòµÙ¬»f‰+0¨‘ hXr›¨©!\$óe,±w+Ñ˜åÎå3ÜÃ_‚AÖkö˘\nk√rı õcuWdYˇ\\◊={.Ûƒçòê¢gªâp8út\rRZøvçJ:≤>˛£Y|+≈@¿áÉ€Cêt\rÄÅjtÅΩ6≤%¬?‡Ù«éÒí>˘/•Õ«Œ9F`◊ï‰Úv~K§ê·ˆ—R–WãzëÍlm™wL«9Yï*q¨xƒzÒËSeÆ›õ≥Ë˜£~öD‡Õ·ñ˜ùxòæÎ…üi7ï2ƒ¯—O›ªí˚_{Ò˙53‚˙têòõ_üız‘3˘d)ãCØ¬\$?K”™PÅ%œœT&˛ò&\0P◊NAé^≠~¢É†p∆ ˆœúì‘ı\r\$ﬁÔ–÷Ïb*+D6Í∂¶œàﬁÌJ\$(»olﬁÕh&îÏKBS>∏ãˆ;z∂¶x≈oz>Ìú⁄oƒZ\n ã[œvıÇÀ»úµ∞2ıOxŸêV¯0f˚Ä˙Øﬁ2Bl…bk–6ZkµhXcdÍ0*¬KT‚ØH=≠ïœÄëp0älVÈıË‚\rºå•ném¶Ô)(è ˙");}elseif($_GET["file"]=="functions.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress("f:õågCIº‹\n8ú≈3)∞À7úÖÜ81– x:\nOg#)–Ír7\n\"ÜË¥`¯|2ÃgSiñH)N¶Së‰ß\ráù\"0πƒ@‰)ü`(\$s6O!”ËúV/=ùå' T4Ê=ÑòiSòç6IO†G#“X∑VCç∆s°†Z1.–hp8,≥[¶H‰µ~Czß…Â2πlæc3öÕÈs£ëŸIÜb‚4\nÈF8T‡ÜIò›©U*fzπ‰r0ûE∆Å¿ÿyé∏ÒféY.:ÊÉIå (ÿc∑·Œã!ç_lôÌ^∑^(∂öN{Sñì)rÀq¡YìñlŸ¶3ä3⁄\nò+G•”Íy∫ÌÜÀi∂¬ÓxV3w≥uh„^rÿ¿∫¥a€î˙πçcÿË\rì®Î(.¬à∫ÅCh“<\r)Ë—£°`Ê7£ÌÚ43'm5å£»\nÅP‹:2£Pª™éãq Úˇ≈Cì}ƒ´à˙ ¡Í38ãBÿ0éhRâ»r(ú0•°b\\0åHr44å¡Bç!°p«\$érZZÀ2‹â.…É(\\é5√|\nC(Œ\"èÄPÖ¯.ç–NÃRT Œì¿Ê>ÅHNÖÅ8HP·\\¨7Jp~Ñ‹˚2%°–OC®1„.ÉßC8ŒáH»Ú*àj∞Ö·˜S(π/°Ï¨6KUú á°<2âpOIÑÙ’`ç‘‰‚≥àdOÅH†ﬁ5ç-¸∆4å„pX25-“¢Ú€à∞z7£∏\"(∞P†\\32:]U⁄ËÌ‚ﬂÖ!]∏<∑A€€§í–ﬂi⁄∞ãl\r‘\0v≤Œ#J8´œwmûÌ…§®<ä…†Ê¸%m;p#„`XùDå¯˜iZç¯N0åêï»9¯®Âç†¡Ë`ÖéwJçDøæ2“9tå¢*¯ŒyÏÀNiIh\\9∆’Ë–:ÉÄÊ·xÔ≠µyl*ö»àŒÊY†‹á¯Í8íW≥‚?µéÅﬁõ3Ÿ !\"6Âõn[¨ \r≠*\$∂∆ßænzx∆9\rÏ|*3◊£pﬁÔª∂û:(p\\;‘Àmz¢¸ß9Û–—¬å¸8NÖ¡êj2çΩ´Œ\r…HÓH&å≤(√zÑ¡7i€k£ ãä§Çc§ãeÚû˝ßtúÃÃ2:SHÛ»†√/)ñxﬁ@ÈÂtâri9•ΩıÎú8œ¿ÀÔy“∑Ω∞éVƒ+^W⁄¶≠¨kZÊYól∑ £ÅÅå4÷»∆ã™∂¿¨Ç\\E»{Ó7\0πpÜÄïDÄÑiî-TÊ˛⁄˚0l∞%=¡†–ÀÉ9(Ñ5\n\nÄn,4á\0Ëa}‹É.∞ˆRsÔÇ™\02B\\€b1üS±\0003,‘XPHJspÂdìKÉ CA!∞2*Wü‘Ò⁄2\$‰+¬f^\nÑ1åÅ¥ÚzEÉ Iv§\\‰ú2…†.*A∞ôîE(d±·∞√bÍ¬‹Ñê∆9áÇ‚Ä¡Dhê&≠™?ƒH∞sèQò2íx~n√ÅJãT2˘&„‡eRúΩôG“QéêTwÍ›ëªıPà‚„\\†)6¶Ù‚ú¬Úsh\\3®\0R	¿'\r+*;RH‡.ì!—[Õ'~≠%t< Áp‹K#¬ëÊ!ÒlﬂÃLeå≥úŸ,ƒ¿Æ&·\$	¡Ω`îñCXöâ”Ü0÷≠Âº˚≥ƒ:MÈh	Á⁄úG‰—!&3†DÅ<!Ëê23Ñ√?h§J©e ⁄h·\r°mïòNi∏£¥éíÜ NÿHl7°ÆvÇÍWIÂ.¥¡-”5÷ßeyè\rEJ\ni*º\$@⁄RU0,\$UøEÜ¶‘‘¬™u)@(tŒSJk·p!Ä~≠Ç‡d`Ã>Øï\n√;#\rp9Üj…π‹]&Nc(rÄàïTQU™ΩS∑⁄\08n`´óyïb§≈ûL‹O5ÇÓ,§Úûë>éÇÜx‚‚±f‰¥í‚ÿê+Åñ\"—IÄ{kM»[\r%∆[	§eÙa‘1! ËˇÌ≥‘Æ©F@´b)Rü£72àÓ0°\nW®ô±L≤‹ú“Ætd’+ÅÌ‹0wgl¯0n@ÚÍ…¢’iÌM´É\nAßM5nÏ\$E≥◊±N€·l©›ü◊Ï%™1 A‹˚∫˙˜›kÒrÓiFB˜œ˘ol,muNx-Õ_†÷§C( ÅêfÈl\r1p[9x(i¥B“ñ≤€zQl¸∫8C‘	¥©XU Tb£›I›`ïp+V\0Óã—;ãCbŒ¿XÒ+œíçsÔ¸]H˜“[·kãx¨G*ÙÜè]∑awn˙!≈6ÇÚ‚€–mSÌæìIﬁÕKÀ~/ù”•7ﬁ˘eeN…Úç™S´/;dÂAÜ>}l~ûœÍ ®%^¥fÁÿ¢p⁄úDEÓ√a∑Çt\nx=√k–éÑ*d∫ÍTó∫¸˚j2ü…júù\në†… ,òe=ëÜM84Ù˚‘aïj@ÓT√sè‘‰nf©›\nÓ6™\rdúº0ﬁÌÙYä'%‘ìÌﬁ~	Å“®Ü<÷ÀñAÓãñHøGÇÅ8ÒøùŒÉ\$z´{∂ª≤u2*Ü‡añ¿>ª(wåK.bPÇ{ÖÉo˝î¬¥´zµ#Î2ˆ8=…8>™§≥A,∞e∞¿Ö+ÏCËßxı*√·“-b=máôü,ãaí√lzkùÅÔ\$Wı,êmèJiÊ ß·˜Å+ãË˝0∞[Øˇ.R sK˘«‰XÁ›ZLÀÁ2ê`Ã(ÔC‡vZ°‹›¿∂Ë\$Å◊π,ÂD?H±÷NxXÙÛ)íÓéM®â\$Û,çÕ*\n—£\$<qˇ≈üh!øπSì‚É¿üxsA!ò:¥K•¡}¡≤ì˘¨£úR˛öA2k∑Xép\n<˜˛¶˝ÎlÏßŸ3Ø¯¶»ïVV¨}£g&Y›ç!Ü+Û;<∏Y«ÛüYE3r≥ŸéÒõCÌo5¶≈˘¢’≥œkk˛Ö¯∞÷€£´œt˜íU¯Ö≠)˚[˝ﬂ¡Ó}Ôÿu¥´lÁ¢:Dü¯+œè _o„‰h140÷· 0¯Øb‰Kò„¨í†ˆ˛ÈªlG™Ñ#™ö©ÍéÜ¶©Ï|UdÊ∂IK´Í¬7‡^Ï‡∏@∫ÆO\0H≈Hiä6\rá€©‹\\cg\0ˆ„Î2éBƒ*e‡ê\nÄö	Özrê!ênWz&ê {Hñ'\$X †w@“8ÎDGr*Îƒ›HÂ'p#éƒÆÄ¶‘\nd¸Ä˜,Ù•ó,¸;g~Ø\0–#ÄÃé≤Eè¬\r÷I`úÓ'É%E“.†]` –õÖÓ%&–Óm∞˝\r‚ﬁ%4SÑv#\n†ûfH\$%Î-¬#≠∆—qB‚ÌÊ†¿¬Q-Ùc2äßÇ&¬¿Ã]‡ô Ëqh\rÒl]‡Æs†–—h‰7±n#±ÇÇ⁄-‡jEØFrÁ§l&d¿ÿŸÂzÏF6∏êà¡\"†ûì|øß¢s@ﬂ±ÆÂz)0rp⁄è\0ÇX\0§ŸË|DL<!∞ÙoÑ*áD∂{.B<E™ãã0nB(Ô é|\r\nÏ^©ç‡ç h≥!Ç÷Ír\$ßí(^™~èËﬁ¬/pèq≤ÃB®≈Oöà˙,\\µ®#RRŒè%Î‰Õd–Hjƒ`¬†ÙÆÃ≠ VÂ bSídßiéEÇ¯Ôoh¥r<i/k\$-ü\$oîº+∆≈ãŒ˙l“ﬁO≥&ev∆íºi“jMPA'u'éŒí( M(h/+´ÚWDæSo∑.n∑.n∏ÏÍ(ú(\"≠¿ßhˆ&pÜ®/À/1DÃäÁjÂ®∏EËﬁ&‚¶Äè,'l\$/.,ƒd®ÖÇWÄbbO3ÛB≥sH†:J`!ì.Ä™Çá¿˚•†è,F¿—7(á»‘ø≥˚1älÂs ÷“éë≤ó≈¢q¢X\r¿öÆÉ~RÈ∞±`Æ“ûÛÆY*‰:R®˘rJ¥∑%Lœ+n∏\"à¯\r¶ŒÕáH!qbæ2‚Li±%”ﬁŒ®Wj#9”‘ObE.I:Ö6¡7\0À6+§%∞.»Öﬁ≥a7E8VSÂ?(DG®”≥BÎ%;Ú¨˘‘/<í¥˙•¿\r Ï¥>˚M¿∞@∂æÄH†Ds–∞Z[tH£Enx(å©R†xÒè˚@Ø˛GkjWî>Ã¬⁄#T/8Æc8ÈQ0ÀË_‘IIGIIí!•äYEdÀE¥^ètdÈth¬`DV!CÊ8é•\r≠¥übì3©!3‚@Ÿ33N}‚ZBÛ3	œ3‰30⁄‹M(Í>Ç }‰\\—tÍÇf†fåÀ‚I\rÆÄÛ337 X‘\"tdŒ,\nbtNO`P‚;≠‹ï“≠¿‘Ø\$\nÇûﬂ‰Z—≠5U5WUµ^ho˝‡ÊtŸPM/5K4Ej≥KQ&53GXìXx)“<5DÖè\r˚VÙ\nﬂr¢5b‹Ä\\J\">ßË1S\r[-¶ Du¿\r“‚ß√)00ÛYı»À¢∑k{\nµƒ#µﬁ\r≥^∑ã|Ëu‹ªUÂ_nÔU4…Uä~Yt”\rIö√@‰è≥ôR Û3:“uePMSË0TµwWØX»ÚÚD®Ú§KOU‹‡ïá;Uı\n†OYçÈYÕQ,M[\0˜_™DöÕ»W†æJ*Ï\rg(]‡®\r\"ZCâ©6uÍè+µYÛàY6√¥ê0™qı(ŸÛ8}êÛ3AX3T†h9j∂j‡fıMtÂPJbqMP5>è»¯∂©Yák%&\\Ç1d¢ÿE4¿ µYnê Ì\$<•U]”â1âmb÷∂ê^“ıö†Í\"NVÈﬂp∂Îpı±eM⁄ﬁ◊WÈ‹¢Ó\\‰)\n À\nf7\n◊2¥ır8ãó=Ek7tVöáµû7P¶∂L…Ìa6ÚÚv@'Ç6i‡Ôj&>±‚;≠„`“ˇa	\0p⁄®(µJ—Î)´\\ø™n˚Úƒ¨m\0º®2ÄÙeqJˆ≠PçÙtåÎ±fj¸¬\"[\0®∑Ü¢X,<\\åÓ∂◊‚˜Ê∑+mdÜÂ~‚‡öÖ—s%o∞¥mn◊),◊ÑÊ‘á≤\r4∂¬8\r±Œ∏◊mEÇH]Ç¶ò¸÷HW≠M0DÔﬂÄóÂ~èÀÅòKòÓE}¯∏¥‡|fÿ^ì‹◊\r>‘-z]2sÇxDòd[sátéS¢∂\0Qf-K`≠¢Çt‡ÿÑwTØ9ÄÊZÄ‡	¯\nB£9 Nbñ„<⁄B˛I5o◊oJÒp¿œJNdÂÀ\rçhﬁç√ê2ê\"‡xÊHC‡›çñ:ç¯˝9Yn16∆Ùzr+z±˘˛\\í˜ïúÙm ﬁ±T ˆÚ†˜@Y2lQ<2O+•%ìÕ.”Éh˘0AﬁÒ∏ä√Zãè2R¶¿1£ä/ØhH\r®XÖ»aNB&ß ƒM@÷[xåá Æ•Íñ‚8&L⁄VÕúv‡±*öj§€öGHÂ»\\ŸÆ	ô≤∂&s€\0Qö†\\\"Ëb†∞	‡ƒ\rBsõ…wùÇ	ùŸ·ûBN`ö7ßCo(Ÿ√‡®\n√®ùì®1ö9Ã*Eò ÒSÖ”Uê0U∫ tö'|îmô∞ﬁ?h[¢\$.#…5	 Â	pÑ‡yB‡@RÙ]£ÖÍ@|Ñß{ô¿ P\0xÙ/¶ w¢%§EsBdøßöCUö~O◊∑‡P‡@X‚]‘Öç®Z3®•1¶•{©eLYâ°å⁄ê¢\\í(*R`†	‡¶\nÖä‡é∫ÃQCF»*éππê‡Èú¨⁄pÜX|`N®Çæ\$Ä[Üâí@ÕU¢‡¶∂‡Z•`Zd\"\\\"ÖÇ¢£)´áIà:ËtöÏoDÊ\0[≤®‡±Ç-©ì†gÌ≥âôÆ*`hu%£,Äî¨„Iµ7ƒ´≤HÛµm§6ﬁ}Æ∫N÷Õ≥\$ªMµUYf&1˘é¿õe]pz•ß⁄I§≈m∂G/£ ∫w ‹!ï\\#5•4I•dπE¬hqÄÂ¶˜—¨kÁx|⁄k•qDöbÖz?ß∫â>˙Éæ:Üì[ËL“∆¨Z∞XöÆ:ûπÑ∑⁄ç«jﬂw5	∂YÅæ0 ©¬ì≠Ø\$\0C¢ÜdSg∏ÎÇ†{ù@î\n`û	¿√¸C ¢∑ªM∫µ‚ª≤# t}xŒNÑ˜∫á{∫€∞)Í˚CÉ FKZﬁjô¬\0PFYîB‰pFkñõ0<⁄> D<JEôög\rı.ì2ñ¸8ÈU@*Œ5fk™ÃJDÏ»…4çïTDU76…/¥ËØ@∑ÇK+Ñ√ˆJÆ∫√¬Ì@”=å‹WIOD≥85MöçN∫\$RÙ\0¯5®\r‡˘_™úÏEúÒœI´œ≥NÁl£“Ây\\Ùëà«qUÄ–Q˚†™\n@í®Ä€∫√pö¨®P€±´7‘ΩN\r˝R{*çqm›\$\0Rî◊‘ìä≈Âq–√à+U@ﬁB§ÁOf*ÜCÀ¨∫MCé‰`_ Ë¸ÚΩÀµNÍÊT‚5Ÿ¶C◊ª© ∏‡\\W√e&_Xå_ÿçhÂó¬∆Bú3¿å€%‹FW£˚Å|ôGﬁõ'≈[Ø≈Ç¿∞Ÿ’V†–#^\rÁ¶GRÄæòÄP±›FgÅ¢˚ÓØ¿Yi ˚•«z\n‚®ﬁ+ﬂ^/ì®ÄÇº•Ω\\ï6Ëﬂbºdmh◊‚@qÌç’Ah÷),J≠◊Wñ«cm˜em]é”èeœkZb0ﬂÂ˛ûÅYÒ]ymäËáfÿeπB;π”ÍO…¿wüapDW˚å…‹”{õ\0ò¿-2/bN¨s÷ΩﬁæRaìœÆh&qt\n\"’iˆRm¸hzœe¯Ü‡‹FS7µ–PPÚ‰ñ§‚‹:Bßà‚’sm∂≠Y d¸ﬁÚ7}3?*Çt˙ÚÈœlT⁄}ò~ÄÑèÄ‰=cû˝¨÷ﬁ«	û⁄3Ö;T≤Lﬁ5*	Ò~#µAïæÉëséx-7˜éf5`ÿ#\"N”b˜ØGòüãı@‹e¸[Ô¯Å§ÃsëòÄ∏-ßòM6ß£qqö hÄe5Ö\0“¢¿±˙*‡b¯IS‹…‹FŒÆ9}˝p”-¯˝`{˝±…ñkPò0T<Ñ©Z9‰0<’ö\r≠Ä;!√àg∫\r\nK‘\nïá\0¡∞*Ω\nb7(¿_∏@,Óe2\r¿]ñKÖ+\0…ˇp C\\—¢,0¨^ÓM–ßö∫©ì@ä;X\rï?\$\rájí+ˆ/¥¨BˆÊP†Ωâ˘®J{\"aÕ6ò‰âúπ|Â£\n\0ª‡\\5ìÅ–	156ˇÜ .›[¬UÿØ\0dË≤8YÁ:!—≤ë=∫¿X.≤uC™äåˆ!S∫∏áoÖp”B›¸€7∏≠≈Ø°Rh≠\\hãE=˙y:< :u≥Û2µ80ìsi¶üTsB€@\$ ÕÈ@«u	»Q∫ê¶.ÙÇT0M\\/ÍÄd+∆É\në°=‘∞då≈ÎA¢∏¢)\r@@¬h3ÄñŸ8.eZa|.‚7ùYk–c¿òÒñ'D#á®YÚ@Xçqñ=M°Ô44öB AM§ØdU\"ãHw4Ó(>Ç¨8®≤√C∏?e_`–≈X:ƒA9√∏ôÅÙp´G–‰áGy6Ω√FìXrâ°l˜1°ΩÿªêB¢√Ö9Rz©ıhBÑ{çûÄô\0ÎÂ^Ç√-‚0©%Dú5F\"\"‡⁄‹ ¬ô˙iƒ`ÀŸnAf® \"tDZ\"_‡V\$ü™!/ÖDÄ·öÜøµã¥àŸ¶°ÃÄF,25…jõTÎ·óy\0ÖNºx\rÁYl¶è#ë∆Eq\nÕ»B2ú\nÏ‡6∑Öƒ4”◊î!/¬\nÛÉâQ∏Ω*Æ;)bR∏Z0\0ƒCDoåÀûé48¿ï¥µá–eë\n„¶S%\\˙PIkêá(0¡åu/ôãG≤∆πäåº\\À}†4FpëûG˚_˜G?)g»otÅ∫[vû÷\0∞∏?b¿;™À`(ï€å‡∂NS)\n„x=Ë–+@Í‹7Éèj˙0èó,1√Özôì≠ç>0àâGc„LÖVXÙÉ±€ %¿Ö¡ÑQ+¯éÈo∆Fı»È‹∂–>Q-„cë⁄«lâ°≥§w‡Ãz5GëÍÇ@(hëc”Hı«r?àöNb˛@…®ˆ«¯∞Ólx3ãU`Ñrw™©‘U√‘Ùtÿ8‘=¿l#Úıèlˇ‰®â8•E\"åÉòôO6\nò¬1e£`\\hKfóV/–∑PaYKÁOÃ˝ Èè‡xë	âOjÑÛèr7•F;¥ÍÅBªëÍ£ÌÃíáº>Ê–¶≤V\rƒñƒ|©'Jµz´ºöî#íPB‰íY5\0NC§^\n~LrRí‘[ÃüR√¨Òg¿eZ\0xõ^ªi<Q„/)”%@ êíôfB≤Hf {%P‡\"\"Ωç¯@™˛ç)ÚíëìDE(iM2ÇSí*ÉyÚS¡\"‚Ò eÃí1å´◊ò\n4` ©>¶èQ*¶‹y∞nîíû•T‰u‘ù‚‰î—~%Å+WÅ≤XKãå£Q°[ îû‡lêPYy#DŸ¨D<´FL˙≥’@¡6']∆ãá˚\rFƒ`±!ï%\nè0êc–Ù¿À©%c8WrpGÉ.TúDoæUL2ÿ*È|\$¨:ËúròΩ@ÊÒË&“4ÅãHä> ë†ç%0*åZc(@‹]ÛÃQ:*¨ì‚(&\"xç'JO≥1π∫`>7	#Ÿ\"O4PX¸±î|B4ªÈâ[ òÈŸò\$nÔà1`ÙÍGSAı÷ÀAHª†\"Ü)‡©„S®˚fî…¶¡∫-\"ÀW˙+…ñ∫\0s-[îfoŸßÕD´êxÛÊ∏ıæ=Cö.ıì9≥≠ŒfÔ¿c¡\0¬ã7°?√ì95¥÷¶Z«0≠ÓfÏ≠®‡¯ÎH?R'q>o⁄ @aDüç˘G[;G¥DπBBdƒ°óq†ñ•2§|1πÏqô≤‰¿ŒÂ≤w<‹#™ßEYΩ^öß†≠Q\\Î[XÒÂË≈>?vÔû[ áÊäI…Õ— ÑôúÃg\0«)¥ÖÆgÖuå–g42j√∫'ÛéT‰êÑãÕvy,uí€DÜ=péH\\Éî^b‰ÏqÿÑƒit√≈XÖ¿£FP…@P˙•Täæi2#∞gÄóD·ÆôÒ%9ô@Ç");}elseif($_GET["file"]=="jush.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress('');}else{header("Content-Type: image/gif");switch($_GET["file"]){case"plus.gif":echo'';break;case"cross.gif":echo'';break;case"up.gif":echo'';break;case"down.gif":echo'';break;case"arrow.gif":echo'';break;}}exit;}if($_GET["script"]=="version"){$Cc=file_open_lock(get_temp_dir()."/adminer.version");if($Cc)file_write_unlock($Cc,serialize(array("signature"=>$_POST["signature"],"version"=>$_POST["version"])));exit;}global$b,$g,$m,$Ib,$Nb,$Vb,$n,$Fc,$Jc,$aa,$id,$w,$ba,$zd,$le,$Ge,$Sf,$Nc,$rg,$vg,$Cg,$Jg,$ca;if(!$_SERVER["REQUEST_URI"])$_SERVER["REQUEST_URI"]=$_SERVER["ORIG_PATH_INFO"];if(!strpos($_SERVER["REQUEST_URI"],'?')&&$_SERVER["QUERY_STRING"]!="")$_SERVER["REQUEST_URI"].="?$_SERVER[QUERY_STRING]";if($_SERVER["HTTP_X_FORWARDED_PREFIX"])$_SERVER["REQUEST_URI"]=$_SERVER["HTTP_X_FORWARDED_PREFIX"].$_SERVER["REQUEST_URI"];$aa=($_SERVER["HTTPS"]&&strcasecmp($_SERVER["HTTPS"],"off"))||ini_bool("session.cookie_secure");@ini_set("session.use_trans_sid",false);if(!defined("SID")){session_cache_limiter("");session_name("adminer_sid");$E=array(0,preg_replace('~\?.*~','',$_SERVER["REQUEST_URI"]),"",$aa);if(version_compare(PHP_VERSION,'5.2.0')>=0)$E[]=true;call_user_func_array('session_set_cookie_params',$E);session_start();}remove_slashes(array(&$_GET,&$_POST,&$_COOKIE),$pc);if(function_exists("get_magic_quotes_runtime")&&get_magic_quotes_runtime())set_magic_quotes_runtime(false);@set_time_limit(0);@ini_set("zend.ze1_compatibility_mode",false);@ini_set("precision",15);function
get_lang(){return'en';}function
lang($ug,$he=null){if(is_array($ug)){$Je=($he==1?0:1);$ug=$ug[$Je];}$ug=str_replace("%d","%s",$ug);$he=format_number($he);return
sprintf($ug,$he);}if(extension_loaded('pdo')){class
Min_PDO{var$_result,$server_info,$affected_rows,$errno,$error,$pdo;function
__construct(){global$b;$Je=array_search("SQL",$b->operators);if($Je!==false)unset($b->operators[$Je]);}function
dsn($Lb,$V,$F,$B=array()){try{$this->pdo=new
PDO($Lb,$V,$F,$B);}catch(Exception$Zb){auth_error(h($Zb->getMessage()));}$this->pdo->setAttribute(3,1);$this->pdo->setAttribute(13,array('Min_PDOStatement'));$this->server_info=@$this->pdo->getAttribute(4);}function
quote($Q){return$this->pdo->quote($Q);}function
query($G,$Dg=false){$I=$this->pdo->query($G);$this->error="";if(!$I){list(,$this->errno,$this->error)=$this->pdo->errorInfo();if(!$this->error)$this->error='Unknown error.';return
false;}$this->store_result($I);return$I;}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result($I=null){if(!$I){$I=$this->_result;if(!$I)return
false;}if($I->columnCount()){$I->num_rows=$I->rowCount();return$I;}$this->affected_rows=$I->rowCount();return
true;}function
next_result(){if(!$this->_result)return
false;$this->_result->_offset=0;return@$this->_result->nextRowset();}function
result($G,$o=0){$I=$this->query($G);if(!$I)return
false;$K=$I->fetch();return$K[$o];}}class
Min_PDOStatement
extends
PDOStatement{var$_offset=0,$num_rows;function
fetch_assoc(){return$this->fetch(2);}function
fetch_row(){return$this->fetch(3);}function
fetch_field(){$K=(object)$this->getColumnMeta($this->_offset++);$K->orgtable=$K->table;$K->orgname=$K->name;$K->charsetnr=(in_array("blob",(array)$K->flags)?63:0);return$K;}}}$Ib=array();class
Min_SQL{var$_conn;function
__construct($g){$this->_conn=$g;}function
select($R,$M,$Z,$Gc,$C=array(),$y=1,$D=0,$Oe=false){global$b,$w;$od=(count($Gc)<count($M));$G=$b->selectQueryBuild($M,$Z,$Gc,$C,$y,$D);if(!$G)$G="SELECT".limit(($_GET["page"]!="last"&&$y!=""&&$Gc&&$od&&$w=="sql"?"SQL_CALC_FOUND_ROWS ":"").implode(", ",$M)."\nFROM ".table($R),($Z?"\nWHERE ".implode(" AND ",$Z):"").($Gc&&$od?"\nGROUP BY ".implode(", ",$Gc):"").($C?"\nORDER BY ".implode(", ",$C):""),($y!=""?+$y:null),($D?$y*$D:0),"\n");$Of=microtime(true);$J=$this->_conn->query($G);if($Oe)echo$b->selectQuery($G,$Of,!$J);return$J;}function
delete($R,$H,$y=0){$G="FROM ".table($R);return
queries("DELETE".($y?limit1($R,$G,$H):" $G$H"));}function
update($R,$P,$H,$y=0,$N="\n"){$Sg=array();foreach($P
as$x=>$X)$Sg[]="$x = $X";$G=table($R)." SET$N".implode(",$N",$Sg);return
queries("UPDATE".($y?limit1($R,$G,$H,$N):" $G$H"));}function
insert($R,$P){return
queries("INSERT INTO ".table($R).($P?" (".implode(", ",array_keys($P)).")\nVALUES (".implode(", ",$P).")":" DEFAULT VALUES"));}function
insertUpdate($R,$L,$Me){return
false;}function
begin(){return
queries("BEGIN");}function
commit(){return
queries("COMMIT");}function
rollback(){return
queries("ROLLBACK");}function
slowQuery($G,$jg){}function
convertSearch($t,$X,$o){return$t;}function
value($X,$o){return(method_exists($this->_conn,'value')?$this->_conn->value($X,$o):(is_resource($X)?stream_get_contents($X):$X));}function
quoteBinary($of){return
q($of);}function
warnings(){return'';}function
tableHelp($A){}}$Ib["sqlite"]="SQLite 3";$Ib["sqlite2"]="SQLite 2";if(isset($_GET["sqlite"])||isset($_GET["sqlite2"])){$Ke=array((isset($_GET["sqlite"])?"SQLite3":"SQLite"),"PDO_SQLite");define("DRIVER",(isset($_GET["sqlite"])?"sqlite":"sqlite2"));if(class_exists(isset($_GET["sqlite"])?"SQLite3":"SQLiteDatabase")){if(isset($_GET["sqlite"])){class
Min_SQLite{var$extension="SQLite3",$server_info,$affected_rows,$errno,$error,$_link;function
__construct($q){$this->_link=new
SQLite3($q);$Ug=$this->_link->version();$this->server_info=$Ug["versionString"];}function
query($G){$I=@$this->_link->query($G);$this->error="";if(!$I){$this->errno=$this->_link->lastErrorCode();$this->error=$this->_link->lastErrorMsg();return
false;}elseif($I->numColumns())return
new
Min_Result($I);$this->affected_rows=$this->_link->changes();return
true;}function
quote($Q){return(is_utf8($Q)?"'".$this->_link->escapeString($Q)."'":"x'".reset(unpack('H*',$Q))."'");}function
store_result(){return$this->_result;}function
result($G,$o=0){$I=$this->query($G);if(!is_object($I))return
false;$K=$I->_result->fetchArray();return$K[$o];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($I){$this->_result=$I;}function
fetch_assoc(){return$this->_result->fetchArray(SQLITE3_ASSOC);}function
fetch_row(){return$this->_result->fetchArray(SQLITE3_NUM);}function
fetch_field(){$e=$this->_offset++;$U=$this->_result->columnType($e);return(object)array("name"=>$this->_result->columnName($e),"type"=>$U,"charsetnr"=>($U==SQLITE3_BLOB?63:0),);}function
__desctruct(){return$this->_result->finalize();}}}else{class
Min_SQLite{var$extension="SQLite",$server_info,$affected_rows,$error,$_link;function
__construct($q){$this->server_info=sqlite_libversion();$this->_link=new
SQLiteDatabase($q);}function
query($G,$Dg=false){$Wd=($Dg?"unbufferedQuery":"query");$I=@$this->_link->$Wd($G,SQLITE_BOTH,$n);$this->error="";if(!$I){$this->error=$n;return
false;}elseif($I===true){$this->affected_rows=$this->changes();return
true;}return
new
Min_Result($I);}function
quote($Q){return"'".sqlite_escape_string($Q)."'";}function
store_result(){return$this->_result;}function
result($G,$o=0){$I=$this->query($G);if(!is_object($I))return
false;$K=$I->_result->fetch();return$K[$o];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($I){$this->_result=$I;if(method_exists($I,'numRows'))$this->num_rows=$I->numRows();}function
fetch_assoc(){$K=$this->_result->fetch(SQLITE_ASSOC);if(!$K)return
false;$J=array();foreach($K
as$x=>$X)$J[($x[0]=='"'?idf_unescape($x):$x)]=$X;return$J;}function
fetch_row(){return$this->_result->fetch(SQLITE_NUM);}function
fetch_field(){$A=$this->_result->fieldName($this->_offset++);$Ee='(\[.*]|"(?:[^"]|"")*"|(.+))';if(preg_match("~^($Ee\\.)?$Ee\$~",$A,$_)){$R=($_[3]!=""?$_[3]:idf_unescape($_[2]));$A=($_[5]!=""?$_[5]:idf_unescape($_[4]));}return(object)array("name"=>$A,"orgname"=>$A,"orgtable"=>$R,);}}}}elseif(extension_loaded("pdo_sqlite")){class
Min_SQLite
extends
Min_PDO{var$extension="PDO_SQLite";function
__construct($q){$this->dsn(DRIVER.":$q","","");}}}if(class_exists("Min_SQLite")){class
Min_DB
extends
Min_SQLite{function
__construct(){parent::__construct(":memory:");$this->query("PRAGMA foreign_keys = 1");}function
select_db($q){if(is_readable($q)&&$this->query("ATTACH ".$this->quote(preg_match("~(^[/\\\\]|:)~",$q)?$q:dirname($_SERVER["SCRIPT_FILENAME"])."/$q")." AS a")){parent::__construct($q);$this->query("PRAGMA foreign_keys = 1");return
true;}return
false;}function
multi_query($G){return$this->_result=$this->query($G);}function
next_result(){return
false;}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($R,$L,$Me){$Sg=array();foreach($L
as$P)$Sg[]="(".implode(", ",$P).")";return
queries("REPLACE INTO ".table($R)." (".implode(", ",array_keys(reset($L))).") VALUES\n".implode(",\n",$Sg));}function
tableHelp($A){if($A=="sqlite_sequence")return"fileformat2.html#seqtab";if($A=="sqlite_master")return"fileformat2.html#$A";}}function
idf_escape($t){return'"'.str_replace('"','""',$t).'"';}function
table($t){return
idf_escape($t);}function
connect(){global$b;list(,,$F)=$b->credentials();if($F!="")return'Database does not support password.';return
new
Min_DB;}function
get_databases(){return
array();}function
limit($G,$Z,$y,$je=0,$N=" "){return" $G$Z".($y!==null?$N."LIMIT $y".($je?" OFFSET $je":""):"");}function
limit1($R,$G,$Z,$N="\n"){global$g;return(preg_match('~^INTO~',$G)||$g->result("SELECT sqlite_compileoption_used('ENABLE_UPDATE_DELETE_LIMIT')")?limit($G,$Z,1,0,$N):" $G WHERE rowid = (SELECT rowid FROM ".table($R).$Z.$N."LIMIT 1)");}function
db_collation($l,$eb){global$g;return$g->result("PRAGMA encoding");}function
engines(){return
array();}function
logged_user(){return
get_current_user();}function
tables_list(){return
get_key_vals("SELECT name, type FROM sqlite_master WHERE type IN ('table', 'view') ORDER BY (name = 'sqlite_sequence'), name");}function
count_tables($k){return
array();}function
table_status($A=""){global$g;$J=array();foreach(get_rows("SELECT name AS Name, type AS Engine, 'rowid' AS Oid, '' AS Auto_increment FROM sqlite_master WHERE type IN ('table', 'view') ".($A!=""?"AND name = ".q($A):"ORDER BY name"))as$K){$K["Rows"]=$g->result("SELECT COUNT(*) FROM ".idf_escape($K["Name"]));$J[$K["Name"]]=$K;}foreach(get_rows("SELECT * FROM sqlite_sequence",null,"")as$K)$J[$K["name"]]["Auto_increment"]=$K["seq"];return($A!=""?$J[$A]:$J);}function
is_view($S){return$S["Engine"]=="view";}function
fk_support($S){global$g;return!$g->result("SELECT sqlite_compileoption_used('OMIT_FOREIGN_KEY')");}function
fields($R){global$g;$J=array();$Me="";foreach(get_rows("PRAGMA table_info(".table($R).")")as$K){$A=$K["name"];$U=strtolower($K["type"]);$_b=$K["dflt_value"];$J[$A]=array("field"=>$A,"type"=>(preg_match('~int~i',$U)?"integer":(preg_match('~char|clob|text~i',$U)?"text":(preg_match('~blob~i',$U)?"blob":(preg_match('~real|floa|doub~i',$U)?"real":"numeric")))),"full_type"=>$U,"default"=>(preg_match("~'(.*)'~",$_b,$_)?str_replace("''","'",$_[1]):($_b=="NULL"?null:$_b)),"null"=>!$K["notnull"],"privileges"=>array("select"=>1,"insert"=>1,"update"=>1),"primary"=>$K["pk"],);if($K["pk"]){if($Me!="")$J[$Me]["auto_increment"]=false;elseif(preg_match('~^integer$~i',$U))$J[$A]["auto_increment"]=true;$Me=$A;}}$Lf=$g->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($R));preg_match_all('~(("[^"]*+")+|[a-z0-9_]+)\s+text\s+COLLATE\s+(\'[^\']+\'|\S+)~i',$Lf,$Nd,PREG_SET_ORDER);foreach($Nd
as$_){$A=str_replace('""','"',preg_replace('~^"|"$~','',$_[1]));if($J[$A])$J[$A]["collation"]=trim($_[3],"'");}return$J;}function
indexes($R,$h=null){global$g;if(!is_object($h))$h=$g;$J=array();$Lf=$h->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($R));if(preg_match('~\bPRIMARY\s+KEY\s*\((([^)"]+|"[^"]*"|`[^`]*`)++)~i',$Lf,$_)){$J[""]=array("type"=>"PRIMARY","columns"=>array(),"lengths"=>array(),"descs"=>array());preg_match_all('~((("[^"]*+")+|(?:`[^`]*+`)+)|(\S+))(\s+(ASC|DESC))?(,\s*|$)~i',$_[1],$Nd,PREG_SET_ORDER);foreach($Nd
as$_){$J[""]["columns"][]=idf_unescape($_[2]).$_[4];$J[""]["descs"][]=(preg_match('~DESC~i',$_[5])?'1':null);}}if(!$J){foreach(fields($R)as$A=>$o){if($o["primary"])$J[""]=array("type"=>"PRIMARY","columns"=>array($A),"lengths"=>array(),"descs"=>array(null));}}$Mf=get_key_vals("SELECT name, sql FROM sqlite_master WHERE type = 'index' AND tbl_name = ".q($R),$h);foreach(get_rows("PRAGMA index_list(".table($R).")",$h)as$K){$A=$K["name"];$u=array("type"=>($K["unique"]?"UNIQUE":"INDEX"));$u["lengths"]=array();$u["descs"]=array();foreach(get_rows("PRAGMA index_info(".idf_escape($A).")",$h)as$nf){$u["columns"][]=$nf["name"];$u["descs"][]=null;}if(preg_match('~^CREATE( UNIQUE)? INDEX '.preg_quote(idf_escape($A).' ON '.idf_escape($R),'~').' \((.*)\)$~i',$Mf[$A],$bf)){preg_match_all('/("[^"]*+")+( DESC)?/',$bf[2],$Nd);foreach($Nd[2]as$x=>$X){if($X)$u["descs"][$x]='1';}}if(!$J[""]||$u["type"]!="UNIQUE"||$u["columns"]!=$J[""]["columns"]||$u["descs"]!=$J[""]["descs"]||!preg_match("~^sqlite_~",$A))$J[$A]=$u;}return$J;}function
foreign_keys($R){$J=array();foreach(get_rows("PRAGMA foreign_key_list(".table($R).")")as$K){$zc=&$J[$K["id"]];if(!$zc)$zc=$K;$zc["source"][]=$K["from"];$zc["target"][]=$K["to"];}return$J;}function
view($A){global$g;return
array("select"=>preg_replace('~^(?:[^`"[]+|`[^`]*`|"[^"]*")* AS\s+~iU','',$g->result("SELECT sql FROM sqlite_master WHERE name = ".q($A))));}function
collations(){return(isset($_GET["create"])?get_vals("PRAGMA collation_list",1):array());}function
information_schema($l){return
false;}function
error(){global$g;return
h($g->error);}function
check_sqlite_name($A){global$g;$gc="db|sdb|sqlite";if(!preg_match("~^[^\\0]*\\.($gc)\$~",$A)){$g->error=sprintf('Please use one of the extensions %s.',str_replace("|",", ",$gc));return
false;}return
true;}function
create_database($l,$d){global$g;if(file_exists($l)){$g->error='File exists.';return
false;}if(!check_sqlite_name($l))return
false;try{$z=new
Min_SQLite($l);}catch(Exception$Zb){$g->error=$Zb->getMessage();return
false;}$z->query('PRAGMA encoding = "UTF-8"');$z->query('CREATE TABLE adminer (i)');$z->query('DROP TABLE adminer');return
true;}function
drop_databases($k){global$g;$g->__construct(":memory:");foreach($k
as$l){if(!@unlink($l)){$g->error='File exists.';return
false;}}return
true;}function
rename_database($A,$d){global$g;if(!check_sqlite_name($A))return
false;$g->__construct(":memory:");$g->error='File exists.';return@rename(DB,$A);}function
auto_increment(){return" PRIMARY KEY".(DRIVER=="sqlite"?" AUTOINCREMENT":"");}function
alter_table($R,$A,$p,$wc,$ib,$Ub,$d,$Fa,$Be){global$g;$Og=($R==""||$wc);foreach($p
as$o){if($o[0]!=""||!$o[1]||$o[2]){$Og=true;break;}}$c=array();$ve=array();foreach($p
as$o){if($o[1]){$c[]=($Og?$o[1]:"ADD ".implode($o[1]));if($o[0]!="")$ve[$o[0]]=$o[1][0];}}if(!$Og){foreach($c
as$X){if(!queries("ALTER TABLE ".table($R)." $X"))return
false;}if($R!=$A&&!queries("ALTER TABLE ".table($R)." RENAME TO ".table($A)))return
false;}elseif(!recreate_table($R,$A,$c,$ve,$wc,$Fa))return
false;if($Fa){queries("BEGIN");queries("UPDATE sqlite_sequence SET seq = $Fa WHERE name = ".q($A));if(!$g->affected_rows)queries("INSERT INTO sqlite_sequence (name, seq) VALUES (".q($A).", $Fa)");queries("COMMIT");}return
true;}function
recreate_table($R,$A,$p,$ve,$wc,$Fa,$v=array()){global$g;if($R!=""){if(!$p){foreach(fields($R)as$x=>$o){if($v)$o["auto_increment"]=0;$p[]=process_field($o,$o);$ve[$x]=idf_escape($x);}}$Ne=false;foreach($p
as$o){if($o[6])$Ne=true;}$Kb=array();foreach($v
as$x=>$X){if($X[2]=="DROP"){$Kb[$X[1]]=true;unset($v[$x]);}}foreach(indexes($R)as$ud=>$u){$f=array();foreach($u["columns"]as$x=>$e){if(!$ve[$e])continue
2;$f[]=$ve[$e].($u["descs"][$x]?" DESC":"");}if(!$Kb[$ud]){if($u["type"]!="PRIMARY"||!$Ne)$v[]=array($u["type"],$ud,$f);}}foreach($v
as$x=>$X){if($X[0]=="PRIMARY"){unset($v[$x]);$wc[]="  PRIMARY KEY (".implode(", ",$X[2]).")";}}foreach(foreign_keys($R)as$ud=>$zc){foreach($zc["source"]as$x=>$e){if(!$ve[$e])continue
2;$zc["source"][$x]=idf_unescape($ve[$e]);}if(!isset($wc[" $ud"]))$wc[]=" ".format_foreign_key($zc);}queries("BEGIN");}foreach($p
as$x=>$o)$p[$x]="  ".implode($o);$p=array_merge($p,array_filter($wc));$dg=($R==$A?"adminer_$A":$A);if(!queries("CREATE TABLE ".table($dg)." (\n".implode(",\n",$p)."\n)"))return
false;if($R!=""){if($ve&&!queries("INSERT INTO ".table($dg)." (".implode(", ",$ve).") SELECT ".implode(", ",array_map('idf_escape',array_keys($ve)))." FROM ".table($R)))return
false;$Ag=array();foreach(triggers($R)as$zg=>$kg){$yg=trigger($zg);$Ag[]="CREATE TRIGGER ".idf_escape($zg)." ".implode(" ",$kg)." ON ".table($A)."\n$yg[Statement]";}$Fa=$Fa?0:$g->result("SELECT seq FROM sqlite_sequence WHERE name = ".q($R));if(!queries("DROP TABLE ".table($R))||($R==$A&&!queries("ALTER TABLE ".table($dg)." RENAME TO ".table($A)))||!alter_indexes($A,$v))return
false;if($Fa)queries("UPDATE sqlite_sequence SET seq = $Fa WHERE name = ".q($A));foreach($Ag
as$yg){if(!queries($yg))return
false;}queries("COMMIT");}return
true;}function
index_sql($R,$U,$A,$f){return"CREATE $U ".($U!="INDEX"?"INDEX ":"").idf_escape($A!=""?$A:uniqid($R."_"))." ON ".table($R)." $f";}function
alter_indexes($R,$c){foreach($c
as$Me){if($Me[0]=="PRIMARY")return
recreate_table($R,$R,array(),array(),array(),0,$c);}foreach(array_reverse($c)as$X){if(!queries($X[2]=="DROP"?"DROP INDEX ".idf_escape($X[1]):index_sql($R,$X[0],$X[1],"(".implode(", ",$X[2]).")")))return
false;}return
true;}function
truncate_tables($T){return
apply_queries("DELETE FROM",$T);}function
drop_views($Wg){return
apply_queries("DROP VIEW",$Wg);}function
drop_tables($T){return
apply_queries("DROP TABLE",$T);}function
move_tables($T,$Wg,$cg){return
false;}function
trigger($A){global$g;if($A=="")return
array("Statement"=>"BEGIN\n\t;\nEND");$t='(?:[^`"\s]+|`[^`]*`|"[^"]*")+';$_g=trigger_options();preg_match("~^CREATE\\s+TRIGGER\\s*$t\\s*(".implode("|",$_g["Timing"]).")\\s+([a-z]+)(?:\\s+OF\\s+($t))?\\s+ON\\s*$t\\s*(?:FOR\\s+EACH\\s+ROW\\s)?(.*)~is",$g->result("SELECT sql FROM sqlite_master WHERE type = 'trigger' AND name = ".q($A)),$_);$ie=$_[3];return
array("Timing"=>strtoupper($_[1]),"Event"=>strtoupper($_[2]).($ie?" OF":""),"Of"=>($ie[0]=='`'||$ie[0]=='"'?idf_unescape($ie):$ie),"Trigger"=>$A,"Statement"=>$_[4],);}function
triggers($R){$J=array();$_g=trigger_options();foreach(get_rows("SELECT * FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($R))as$K){preg_match('~^CREATE\s+TRIGGER\s*(?:[^`"\s]+|`[^`]*`|"[^"]*")+\s*('.implode("|",$_g["Timing"]).')\s*(.*?)\s+ON\b~i',$K["sql"],$_);$J[$K["name"]]=array($_[1],$_[2]);}return$J;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER","INSTEAD OF"),"Event"=>array("INSERT","UPDATE","UPDATE OF","DELETE"),"Type"=>array("FOR EACH ROW"),);}function
begin(){return
queries("BEGIN");}function
last_id(){global$g;return$g->result("SELECT LAST_INSERT_ROWID()");}function
explain($g,$G){return$g->query("EXPLAIN QUERY PLAN $G");}function
found_rows($S,$Z){}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($qf){return
true;}function
create_sql($R,$Fa,$Tf){global$g;$J=$g->result("SELECT sql FROM sqlite_master WHERE type IN ('table', 'view') AND name = ".q($R));foreach(indexes($R)as$A=>$u){if($A=='')continue;$J.=";\n\n".index_sql($R,$u['type'],$A,"(".implode(", ",array_map('idf_escape',$u['columns'])).")");}return$J;}function
truncate_sql($R){return"DELETE FROM ".table($R);}function
use_sql($j){}function
trigger_sql($R){return
implode(get_vals("SELECT sql || ';;\n' FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($R)));}function
show_variables(){global$g;$J=array();foreach(array("auto_vacuum","cache_size","count_changes","default_cache_size","empty_result_callbacks","encoding","foreign_keys","full_column_names","fullfsync","journal_mode","journal_size_limit","legacy_file_format","locking_mode","page_size","max_page_count","read_uncommitted","recursive_triggers","reverse_unordered_selects","secure_delete","short_column_names","synchronous","temp_store","temp_store_directory","schema_version","integrity_check","quick_check")as$x)$J[$x]=$g->result("PRAGMA $x");return$J;}function
show_status(){$J=array();foreach(get_vals("PRAGMA compile_options")as$re){list($x,$X)=explode("=",$re,2);$J[$x]=$X;}return$J;}function
convert_field($o){}function
unconvert_field($o,$J){return$J;}function
support($kc){return
preg_match('~^(columns|database|drop_col|dump|indexes|descidx|move_col|sql|status|table|trigger|variables|view|view_trigger)$~',$kc);}$w="sqlite";$Cg=array("integer"=>0,"real"=>0,"numeric"=>0,"text"=>0,"blob"=>0);$Sf=array_keys($Cg);$Jg=array();$qe=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL","SQL");$Fc=array("hex","length","lower","round","unixepoch","upper");$Jc=array("avg","count","count distinct","group_concat","max","min","sum");$Nb=array(array(),array("integer|real|numeric"=>"+/-","text"=>"||",));}$Ib["pgsql"]="PostgreSQL";if(isset($_GET["pgsql"])){$Ke=array("PgSQL","PDO_PgSQL");define("DRIVER","pgsql");if(extension_loaded("pgsql")){class
Min_DB{var$extension="PgSQL",$_link,$_result,$_string,$_database=true,$server_info,$affected_rows,$error,$timeout;function
_error($Xb,$n){if(ini_bool("html_errors"))$n=html_entity_decode(strip_tags($n));$n=preg_replace('~^[^:]*: ~','',$n);$this->error=$n;}function
connect($O,$V,$F){global$b;$l=$b->database();set_error_handler(array($this,'_error'));$this->_string="host='".str_replace(":","' port='",addcslashes($O,"'\\"))."' user='".addcslashes($V,"'\\")."' password='".addcslashes($F,"'\\")."'";$this->_link=@pg_connect("$this->_string dbname='".($l!=""?addcslashes($l,"'\\"):"postgres")."'",PGSQL_CONNECT_FORCE_NEW);if(!$this->_link&&$l!=""){$this->_database=false;$this->_link=@pg_connect("$this->_string dbname='postgres'",PGSQL_CONNECT_FORCE_NEW);}restore_error_handler();if($this->_link){$Ug=pg_version($this->_link);$this->server_info=$Ug["server"];pg_set_client_encoding($this->_link,"UTF8");}return(bool)$this->_link;}function
quote($Q){return"'".pg_escape_string($this->_link,$Q)."'";}function
value($X,$o){return($o["type"]=="bytea"?pg_unescape_bytea($X):$X);}function
quoteBinary($Q){return"'".pg_escape_bytea($this->_link,$Q)."'";}function
select_db($j){global$b;if($j==$b->database())return$this->_database;$J=@pg_connect("$this->_string dbname='".addcslashes($j,"'\\")."'",PGSQL_CONNECT_FORCE_NEW);if($J)$this->_link=$J;return$J;}function
close(){$this->_link=@pg_connect("$this->_string dbname='postgres'");}function
query($G,$Dg=false){$I=@pg_query($this->_link,$G);$this->error="";if(!$I){$this->error=pg_last_error($this->_link);$J=false;}elseif(!pg_num_fields($I)){$this->affected_rows=pg_affected_rows($I);$J=true;}else$J=new
Min_Result($I);if($this->timeout){$this->timeout=0;$this->query("RESET statement_timeout");}return$J;}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($G,$o=0){$I=$this->query($G);if(!$I||!$I->num_rows)return
false;return
pg_fetch_result($I->_result,0,$o);}function
warnings(){return
h(pg_last_notice($this->_link));}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($I){$this->_result=$I;$this->num_rows=pg_num_rows($I);}function
fetch_assoc(){return
pg_fetch_assoc($this->_result);}function
fetch_row(){return
pg_fetch_row($this->_result);}function
fetch_field(){$e=$this->_offset++;$J=new
stdClass;if(function_exists('pg_field_table'))$J->orgtable=pg_field_table($this->_result,$e);$J->name=pg_field_name($this->_result,$e);$J->orgname=$J->name;$J->type=pg_field_type($this->_result,$e);$J->charsetnr=($J->type=="bytea"?63:0);return$J;}function
__destruct(){pg_free_result($this->_result);}}}elseif(extension_loaded("pdo_pgsql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_PgSQL",$timeout;function
connect($O,$V,$F){global$b;$l=$b->database();$Q="pgsql:host='".str_replace(":","' port='",addcslashes($O,"'\\"))."' options='-c client_encoding=utf8'";$this->dsn("$Q dbname='".($l!=""?addcslashes($l,"'\\"):"postgres")."'",$V,$F);return
true;}function
select_db($j){global$b;return($b->database()==$j);}function
quoteBinary($of){return
q($of);}function
query($G,$Dg=false){$J=parent::query($G,$Dg);if($this->timeout){$this->timeout=0;parent::query("RESET statement_timeout");}return$J;}function
warnings(){return'';}function
close(){}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($R,$L,$Me){global$g;foreach($L
as$P){$Kg=array();$Z=array();foreach($P
as$x=>$X){$Kg[]="$x = $X";if(isset($Me[idf_unescape($x)]))$Z[]="$x = $X";}if(!(($Z&&queries("UPDATE ".table($R)." SET ".implode(", ",$Kg)." WHERE ".implode(" AND ",$Z))&&$g->affected_rows)||queries("INSERT INTO ".table($R)." (".implode(", ",array_keys($P)).") VALUES (".implode(", ",$P).")")))return
false;}return
true;}function
slowQuery($G,$jg){$this->_conn->query("SET statement_timeout = ".(1000*$jg));$this->_conn->timeout=1000*$jg;return$G;}function
convertSearch($t,$X,$o){return(preg_match('~char|text'.(!preg_match('~LIKE~',$X["op"])?'|date|time(stamp)?|boolean|uuid|'.number_type():'').'~',$o["type"])?$t:"CAST($t AS text)");}function
quoteBinary($of){return$this->_conn->quoteBinary($of);}function
warnings(){return$this->_conn->warnings();}function
tableHelp($A){$Fd=array("information_schema"=>"infoschema","pg_catalog"=>"catalog",);$z=$Fd[$_GET["ns"]];if($z)return"$z-".str_replace("_","-",$A).".html";}}function
idf_escape($t){return'"'.str_replace('"','""',$t).'"';}function
table($t){return
idf_escape($t);}function
connect(){global$b,$Cg,$Sf;$g=new
Min_DB;$i=$b->credentials();if($g->connect($i[0],$i[1],$i[2])){if(min_version(9,0,$g)){$g->query("SET application_name = 'Adminer'");if(min_version(9.2,0,$g)){$Sf['Strings'][]="json";$Cg["json"]=4294967295;if(min_version(9.4,0,$g)){$Sf['Strings'][]="jsonb";$Cg["jsonb"]=4294967295;}}}return$g;}return$g->error;}function
get_databases(){return
get_vals("SELECT datname FROM pg_database WHERE has_database_privilege(datname, 'CONNECT') ORDER BY datname");}function
limit($G,$Z,$y,$je=0,$N=" "){return" $G$Z".($y!==null?$N."LIMIT $y".($je?" OFFSET $je":""):"");}function
limit1($R,$G,$Z,$N="\n"){return(preg_match('~^INTO~',$G)?limit($G,$Z,1,0,$N):" $G".(is_view(table_status1($R))?$Z:" WHERE ctid = (SELECT ctid FROM ".table($R).$Z.$N."LIMIT 1)"));}function
db_collation($l,$eb){global$g;return$g->result("SHOW LC_COLLATE");}function
engines(){return
array();}function
logged_user(){global$g;return$g->result("SELECT user");}function
tables_list(){$G="SELECT table_name, table_type FROM information_schema.tables WHERE table_schema = current_schema()";if(support('materializedview'))$G.="
UNION ALL
SELECT matviewname, 'MATERIALIZED VIEW'
FROM pg_matviews
WHERE schemaname = current_schema()";$G.="
ORDER BY 1";return
get_key_vals($G);}function
count_tables($k){return
array();}function
table_status($A=""){$J=array();foreach(get_rows("SELECT c.relname AS \"Name\", CASE c.relkind WHEN 'r' THEN 'table' WHEN 'm' THEN 'materialized view' ELSE 'view' END AS \"Engine\", pg_relation_size(c.oid) AS \"Data_length\", pg_total_relation_size(c.oid) - pg_relation_size(c.oid) AS \"Index_length\", obj_description(c.oid, 'pg_class') AS \"Comment\", ".(min_version(12)?"''":"CASE WHEN c.relhasoids THEN 'oid' ELSE '' END")." AS \"Oid\", c.reltuples as \"Rows\", n.nspname
FROM pg_class c
JOIN pg_namespace n ON(n.nspname = current_schema() AND n.oid = c.relnamespace)
WHERE relkind IN ('r', 'm', 'v', 'f')
".($A!=""?"AND relname = ".q($A):"ORDER BY relname"))as$K)$J[$K["Name"]]=$K;return($A!=""?$J[$A]:$J);}function
is_view($S){return
in_array($S["Engine"],array("view","materialized view"));}function
fk_support($S){return
true;}function
fields($R){$J=array();$wa=array('timestamp without time zone'=>'timestamp','timestamp with time zone'=>'timestamptz',);$Wc=min_version(10)?"(a.attidentity = 'd')::int":'0';foreach(get_rows("SELECT a.attname AS field, format_type(a.atttypid, a.atttypmod) AS full_type, pg_get_expr(d.adbin, d.adrelid) AS default, a.attnotnull::int, col_description(c.oid, a.attnum) AS comment, $Wc AS identity
FROM pg_class c
JOIN pg_namespace n ON c.relnamespace = n.oid
JOIN pg_attribute a ON c.oid = a.attrelid
LEFT JOIN pg_attrdef d ON c.oid = d.adrelid AND a.attnum = d.adnum
WHERE c.relname = ".q($R)."
AND n.nspname = current_schema()
AND NOT a.attisdropped
AND a.attnum > 0
ORDER BY a.attnum")as$K){preg_match('~([^([]+)(\((.*)\))?([a-z ]+)?((\[[0-9]*])*)$~',$K["full_type"],$_);list(,$U,$Cd,$K["length"],$ra,$ya)=$_;$K["length"].=$ya;$Va=$U.$ra;if(isset($wa[$Va])){$K["type"]=$wa[$Va];$K["full_type"]=$K["type"].$Cd.$ya;}else{$K["type"]=$U;$K["full_type"]=$K["type"].$Cd.$ra.$ya;}if($K['identity'])$K['default']='GENERATED BY DEFAULT AS IDENTITY';$K["null"]=!$K["attnotnull"];$K["auto_increment"]=$K['identity']||preg_match('~^nextval\(~i',$K["default"]);$K["privileges"]=array("insert"=>1,"select"=>1,"update"=>1);if(preg_match('~(.+)::[^)]+(.*)~',$K["default"],$_))$K["default"]=($_[1]=="NULL"?null:(($_[1][0]=="'"?idf_unescape($_[1]):$_[1]).$_[2]));$J[$K["field"]]=$K;}return$J;}function
indexes($R,$h=null){global$g;if(!is_object($h))$h=$g;$J=array();$ag=$h->result("SELECT oid FROM pg_class WHERE relnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema()) AND relname = ".q($R));$f=get_key_vals("SELECT attnum, attname FROM pg_attribute WHERE attrelid = $ag AND attnum > 0",$h);foreach(get_rows("SELECT relname, indisunique::int, indisprimary::int, indkey, indoption , (indpred IS NOT NULL)::int as indispartial FROM pg_index i, pg_class ci WHERE i.indrelid = $ag AND ci.oid = i.indexrelid",$h)as$K){$cf=$K["relname"];$J[$cf]["type"]=($K["indispartial"]?"INDEX":($K["indisprimary"]?"PRIMARY":($K["indisunique"]?"UNIQUE":"INDEX")));$J[$cf]["columns"]=array();foreach(explode(" ",$K["indkey"])as$ed)$J[$cf]["columns"][]=$f[$ed];$J[$cf]["descs"]=array();foreach(explode(" ",$K["indoption"])as$fd)$J[$cf]["descs"][]=($fd&1?'1':null);$J[$cf]["lengths"]=array();}return$J;}function
foreign_keys($R){global$le;$J=array();foreach(get_rows("SELECT conname, condeferrable::int AS deferrable, pg_get_constraintdef(oid) AS definition
FROM pg_constraint
WHERE conrelid = (SELECT pc.oid FROM pg_class AS pc INNER JOIN pg_namespace AS pn ON (pn.oid = pc.relnamespace) WHERE pc.relname = ".q($R)." AND pn.nspname = current_schema())
AND contype = 'f'::char
ORDER BY conkey, conname")as$K){if(preg_match('~FOREIGN KEY\s*\((.+)\)\s*REFERENCES (.+)\((.+)\)(.*)$~iA',$K['definition'],$_)){$K['source']=array_map('trim',explode(',',$_[1]));if(preg_match('~^(("([^"]|"")+"|[^"]+)\.)?"?("([^"]|"")+"|[^"]+)$~',$_[2],$Md)){$K['ns']=str_replace('""','"',preg_replace('~^"(.+)"$~','\1',$Md[2]));$K['table']=str_replace('""','"',preg_replace('~^"(.+)"$~','\1',$Md[4]));}$K['target']=array_map('trim',explode(',',$_[3]));$K['on_delete']=(preg_match("~ON DELETE ($le)~",$_[4],$Md)?$Md[1]:'NO ACTION');$K['on_update']=(preg_match("~ON UPDATE ($le)~",$_[4],$Md)?$Md[1]:'NO ACTION');$J[$K['conname']]=$K;}}return$J;}function
view($A){global$g;return
array("select"=>trim($g->result("SELECT pg_get_viewdef(".$g->result("SELECT oid FROM pg_class WHERE relname = ".q($A)).")")));}function
collations(){return
array();}function
information_schema($l){return($l=="information_schema");}function
error(){global$g;$J=h($g->error);if(preg_match('~^(.*\n)?([^\n]*)\n( *)\^(\n.*)?$~s',$J,$_))$J=$_[1].preg_replace('~((?:[^&]|&[^;]*;){'.strlen($_[3]).'})(.*)~','\1<b>\2</b>',$_[2]).$_[4];return
nl_br($J);}function
create_database($l,$d){return
queries("CREATE DATABASE ".idf_escape($l).($d?" ENCODING ".idf_escape($d):""));}function
drop_databases($k){global$g;$g->close();return
apply_queries("DROP DATABASE",$k,'idf_escape');}function
rename_database($A,$d){return
queries("ALTER DATABASE ".idf_escape(DB)." RENAME TO ".idf_escape($A));}function
auto_increment(){return"";}function
alter_table($R,$A,$p,$wc,$ib,$Ub,$d,$Fa,$Be){$c=array();$Ue=array();if($R!=""&&$R!=$A)$Ue[]="ALTER TABLE ".table($R)." RENAME TO ".table($A);foreach($p
as$o){$e=idf_escape($o[0]);$X=$o[1];if(!$X)$c[]="DROP $e";else{$Rg=$X[5];unset($X[5]);if(isset($X[6])&&$o[0]=="")$X[1]=($X[1]=="bigint"?" big":" ")."serial";if($o[0]=="")$c[]=($R!=""?"ADD ":"  ").implode($X);else{if($e!=$X[0])$Ue[]="ALTER TABLE ".table($A)." RENAME $e TO $X[0]";$c[]="ALTER $e TYPE$X[1]";if(!$X[6]){$c[]="ALTER $e ".($X[3]?"SET$X[3]":"DROP DEFAULT");$c[]="ALTER $e ".($X[2]==" NULL"?"DROP NOT":"SET").$X[2];}}if($o[0]!=""||$Rg!="")$Ue[]="COMMENT ON COLUMN ".table($A).".$X[0] IS ".($Rg!=""?substr($Rg,9):"''");}}$c=array_merge($c,$wc);if($R=="")array_unshift($Ue,"CREATE TABLE ".table($A)." (\n".implode(",\n",$c)."\n)");elseif($c)array_unshift($Ue,"ALTER TABLE ".table($R)."\n".implode(",\n",$c));if($R!=""||$ib!="")$Ue[]="COMMENT ON TABLE ".table($A)." IS ".q($ib);if($Fa!=""){}foreach($Ue
as$G){if(!queries($G))return
false;}return
true;}function
alter_indexes($R,$c){$rb=array();$Jb=array();$Ue=array();foreach($c
as$X){if($X[0]!="INDEX")$rb[]=($X[2]=="DROP"?"\nDROP CONSTRAINT ".idf_escape($X[1]):"\nADD".($X[1]!=""?" CONSTRAINT ".idf_escape($X[1]):"")." $X[0] ".($X[0]=="PRIMARY"?"KEY ":"")."(".implode(", ",$X[2]).")");elseif($X[2]=="DROP")$Jb[]=idf_escape($X[1]);else$Ue[]="CREATE INDEX ".idf_escape($X[1]!=""?$X[1]:uniqid($R."_"))." ON ".table($R)." (".implode(", ",$X[2]).")";}if($rb)array_unshift($Ue,"ALTER TABLE ".table($R).implode(",",$rb));if($Jb)array_unshift($Ue,"DROP INDEX ".implode(", ",$Jb));foreach($Ue
as$G){if(!queries($G))return
false;}return
true;}function
truncate_tables($T){return
queries("TRUNCATE ".implode(", ",array_map('table',$T)));return
true;}function
drop_views($Wg){return
drop_tables($Wg);}function
drop_tables($T){foreach($T
as$R){$Qf=table_status($R);if(!queries("DROP ".strtoupper($Qf["Engine"])." ".table($R)))return
false;}return
true;}function
move_tables($T,$Wg,$cg){foreach(array_merge($T,$Wg)as$R){$Qf=table_status($R);if(!queries("ALTER ".strtoupper($Qf["Engine"])." ".table($R)." SET SCHEMA ".idf_escape($cg)))return
false;}return
true;}function
trigger($A,$R=null){if($A=="")return
array("Statement"=>"EXECUTE PROCEDURE ()");if($R===null)$R=$_GET['trigger'];$L=get_rows('SELECT t.trigger_name AS "Trigger", t.action_timing AS "Timing", (SELECT STRING_AGG(event_manipulation, \' OR \') FROM information_schema.triggers WHERE event_object_table = t.event_object_table AND trigger_name = t.trigger_name ) AS "Events", t.event_manipulation AS "Event", \'FOR EACH \' || t.action_orientation AS "Type", t.action_statement AS "Statement" FROM information_schema.triggers t WHERE t.event_object_table = '.q($R).' AND t.trigger_name = '.q($A));return
reset($L);}function
triggers($R){$J=array();foreach(get_rows("SELECT * FROM information_schema.triggers WHERE event_object_table = ".q($R))as$K)$J[$K["trigger_name"]]=array($K["action_timing"],$K["event_manipulation"]);return$J;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("FOR EACH ROW","FOR EACH STATEMENT"),);}function
routine($A,$U){$L=get_rows('SELECT routine_definition AS definition, LOWER(external_language) AS language, *
FROM information_schema.routines
WHERE routine_schema = current_schema() AND specific_name = '.q($A));$J=$L[0];$J["returns"]=array("type"=>$J["type_udt_name"]);$J["fields"]=get_rows('SELECT parameter_name AS field, data_type AS type, character_maximum_length AS length, parameter_mode AS inout
FROM information_schema.parameters
WHERE specific_schema = current_schema() AND specific_name = '.q($A).'
ORDER BY ordinal_position');return$J;}function
routines(){return
get_rows('SELECT specific_name AS "SPECIFIC_NAME", routine_type AS "ROUTINE_TYPE", routine_name AS "ROUTINE_NAME", type_udt_name AS "DTD_IDENTIFIER"
FROM information_schema.routines
WHERE routine_schema = current_schema()
ORDER BY SPECIFIC_NAME');}function
routine_languages(){return
get_vals("SELECT LOWER(lanname) FROM pg_catalog.pg_language");}function
routine_id($A,$K){$J=array();foreach($K["fields"]as$o)$J[]=$o["type"];return
idf_escape($A)."(".implode(", ",$J).")";}function
last_id(){return
0;}function
explain($g,$G){return$g->query("EXPLAIN $G");}function
found_rows($S,$Z){global$g;if(preg_match("~ rows=([0-9]+)~",$g->result("EXPLAIN SELECT * FROM ".idf_escape($S["Name"]).($Z?" WHERE ".implode(" AND ",$Z):"")),$bf))return$bf[1];return
false;}function
types(){return
get_vals("SELECT typname
FROM pg_type
WHERE typnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema())
AND typtype IN ('b','d','e')
AND typelem = 0");}function
schemas(){return
get_vals("SELECT nspname FROM pg_namespace ORDER BY nspname");}function
get_schema(){global$g;return$g->result("SELECT current_schema()");}function
set_schema($pf,$h=null){global$g,$Cg,$Sf;if(!$h)$h=$g;$J=$h->query("SET search_path TO ".idf_escape($pf));foreach(types()as$U){if(!isset($Cg[$U])){$Cg[$U]=0;$Sf['User types'][]=$U;}}return$J;}function
create_sql($R,$Fa,$Tf){global$g;$J='';$lf=array();$zf=array();$Qf=table_status($R);if(is_view($Qf)){$Vg=view($R);return
rtrim("CREATE VIEW ".idf_escape($R)." AS $Vg[select]",";");}$p=fields($R);$v=indexes($R);ksort($v);$tc=foreign_keys($R);ksort($tc);if(!$Qf||empty($p))return
false;$J="CREATE TABLE ".idf_escape($Qf['nspname']).".".idf_escape($Qf['Name'])." (\n    ";foreach($p
as$lc=>$o){$Ae=idf_escape($o['field']).' '.$o['full_type'].default_value($o).($o['attnotnull']?" NOT NULL":"");$lf[]=$Ae;if(preg_match('~nextval\(\'([^\']+)\'\)~',$o['default'],$Nd)){$yf=$Nd[1];$Kf=reset(get_rows(min_version(10)?"SELECT *, cache_size AS cache_value FROM pg_sequences WHERE schemaname = current_schema() AND sequencename = ".q($yf):"SELECT * FROM $yf"));$zf[]=($Tf=="DROP+CREATE"?"DROP SEQUENCE IF EXISTS $yf;\n":"")."CREATE SEQUENCE $yf INCREMENT $Kf[increment_by] MINVALUE $Kf[min_value] MAXVALUE $Kf[max_value] START ".($Fa?$Kf['last_value']:1)." CACHE $Kf[cache_value];";}}if(!empty($zf))$J=implode("\n\n",$zf)."\n\n$J";foreach($v
as$Zc=>$u){switch($u['type']){case'UNIQUE':$lf[]="CONSTRAINT ".idf_escape($Zc)." UNIQUE (".implode(', ',array_map('idf_escape',$u['columns'])).")";break;case'PRIMARY':$lf[]="CONSTRAINT ".idf_escape($Zc)." PRIMARY KEY (".implode(', ',array_map('idf_escape',$u['columns'])).")";break;}}foreach($tc
as$sc=>$rc)$lf[]="CONSTRAINT ".idf_escape($sc)." $rc[definition] ".($rc['deferrable']?'DEFERRABLE':'NOT DEFERRABLE');$J.=implode(",\n    ",$lf)."\n) WITH (oids = ".($Qf['Oid']?'true':'false').");";foreach($v
as$Zc=>$u){if($u['type']=='INDEX'){$f=array();foreach($u['columns']as$x=>$X)$f[]=idf_escape($X).($u['descs'][$x]?" DESC":"");$J.="\n\nCREATE INDEX ".idf_escape($Zc)." ON ".idf_escape($Qf['nspname']).".".idf_escape($Qf['Name'])." USING btree (".implode(', ',$f).");";}}if($Qf['Comment'])$J.="\n\nCOMMENT ON TABLE ".idf_escape($Qf['nspname']).".".idf_escape($Qf['Name'])." IS ".q($Qf['Comment']).";";foreach($p
as$lc=>$o){if($o['comment'])$J.="\n\nCOMMENT ON COLUMN ".idf_escape($Qf['nspname']).".".idf_escape($Qf['Name']).".".idf_escape($lc)." IS ".q($o['comment']).";";}return
rtrim($J,';');}function
truncate_sql($R){return"TRUNCATE ".table($R);}function
trigger_sql($R){$Qf=table_status($R);$J="";foreach(triggers($R)as$xg=>$wg){$yg=trigger($xg,$Qf['Name']);$J.="\nCREATE TRIGGER ".idf_escape($yg['Trigger'])." $yg[Timing] $yg[Events] ON ".idf_escape($Qf["nspname"]).".".idf_escape($Qf['Name'])." $yg[Type] $yg[Statement];;\n";}return$J;}function
use_sql($j){return"\connect ".idf_escape($j);}function
show_variables(){return
get_key_vals("SHOW ALL");}function
process_list(){return
get_rows("SELECT * FROM pg_stat_activity ORDER BY ".(min_version(9.2)?"pid":"procpid"));}function
show_status(){}function
convert_field($o){}function
unconvert_field($o,$J){return$J;}function
support($kc){return
preg_match('~^(database|table|columns|sql|indexes|descidx|comment|view|'.(min_version(9.3)?'materializedview|':'').'scheme|routine|processlist|sequence|trigger|type|variables|drop_col|kill|dump)$~',$kc);}function
kill_process($X){return
queries("SELECT pg_terminate_backend(".number($X).")");}function
connection_id(){return"SELECT pg_backend_pid()";}function
max_connections(){global$g;return$g->result("SHOW max_connections");}$w="pgsql";$Cg=array();$Sf=array();foreach(array('Numbers'=>array("smallint"=>5,"integer"=>10,"bigint"=>19,"boolean"=>1,"numeric"=>0,"real"=>7,"double precision"=>16,"money"=>20),'Date and time'=>array("date"=>13,"time"=>17,"timestamp"=>20,"timestamptz"=>21,"interval"=>0),'Strings'=>array("character"=>0,"character varying"=>0,"text"=>0,"tsquery"=>0,"tsvector"=>0,"uuid"=>0,"xml"=>0),'Binary'=>array("bit"=>0,"bit varying"=>0,"bytea"=>0),'Network'=>array("cidr"=>43,"inet"=>43,"macaddr"=>17,"txid_snapshot"=>0),'Geometry'=>array("box"=>0,"circle"=>0,"line"=>0,"lseg"=>0,"path"=>0,"point"=>0,"polygon"=>0),)as$x=>$X){$Cg+=$X;$Sf[$x]=array_keys($X);}$Jg=array();$qe=array("=","<",">","<=",">=","!=","~","!~","LIKE","LIKE %%","ILIKE","ILIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL");$Fc=array("char_length","lower","round","to_hex","to_timestamp","upper");$Jc=array("avg","count","count distinct","max","min","sum");$Nb=array(array("char"=>"md5","date|time"=>"now",),array(number_type()=>"+/-","date|time"=>"+ interval/- interval","char|text"=>"||",));}$Ib["oracle"]="Oracle (beta)";if(isset($_GET["oracle"])){$Ke=array("OCI8","PDO_OCI");define("DRIVER","oracle");if(extension_loaded("oci8")){class
Min_DB{var$extension="oci8",$_link,$_result,$server_info,$affected_rows,$errno,$error;function
_error($Xb,$n){if(ini_bool("html_errors"))$n=html_entity_decode(strip_tags($n));$n=preg_replace('~^[^:]*: ~','',$n);$this->error=$n;}function
connect($O,$V,$F){$this->_link=@oci_new_connect($V,$F,$O,"AL32UTF8");if($this->_link){$this->server_info=oci_server_version($this->_link);return
true;}$n=oci_error();$this->error=$n["message"];return
false;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($j){return
true;}function
query($G,$Dg=false){$I=oci_parse($this->_link,$G);$this->error="";if(!$I){$n=oci_error($this->_link);$this->errno=$n["code"];$this->error=$n["message"];return
false;}set_error_handler(array($this,'_error'));$J=@oci_execute($I);restore_error_handler();if($J){if(oci_num_fields($I))return
new
Min_Result($I);$this->affected_rows=oci_num_rows($I);}return$J;}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($G,$o=1){$I=$this->query($G);if(!is_object($I)||!oci_fetch($I->_result))return
false;return
oci_result($I->_result,$o);}}class
Min_Result{var$_result,$_offset=1,$num_rows;function
__construct($I){$this->_result=$I;}function
_convert($K){foreach((array)$K
as$x=>$X){if(is_a($X,'OCI-Lob'))$K[$x]=$X->load();}return$K;}function
fetch_assoc(){return$this->_convert(oci_fetch_assoc($this->_result));}function
fetch_row(){return$this->_convert(oci_fetch_row($this->_result));}function
fetch_field(){$e=$this->_offset++;$J=new
stdClass;$J->name=oci_field_name($this->_result,$e);$J->orgname=$J->name;$J->type=oci_field_type($this->_result,$e);$J->charsetnr=(preg_match("~raw|blob|bfile~",$J->type)?63:0);return$J;}function
__destruct(){oci_free_statement($this->_result);}}}elseif(extension_loaded("pdo_oci")){class
Min_DB
extends
Min_PDO{var$extension="PDO_OCI";function
connect($O,$V,$F){$this->dsn("oci:dbname=//$O;charset=AL32UTF8",$V,$F);return
true;}function
select_db($j){return
true;}}}class
Min_Driver
extends
Min_SQL{function
begin(){return
true;}}function
idf_escape($t){return'"'.str_replace('"','""',$t).'"';}function
table($t){return
idf_escape($t);}function
connect(){global$b;$g=new
Min_DB;$i=$b->credentials();if($g->connect($i[0],$i[1],$i[2]))return$g;return$g->error;}function
get_databases(){return
get_vals("SELECT tablespace_name FROM user_tablespaces");}function
limit($G,$Z,$y,$je=0,$N=" "){return($je?" * FROM (SELECT t.*, rownum AS rnum FROM (SELECT $G$Z) t WHERE rownum <= ".($y+$je).") WHERE rnum > $je":($y!==null?" * FROM (SELECT $G$Z) WHERE rownum <= ".($y+$je):" $G$Z"));}function
limit1($R,$G,$Z,$N="\n"){return" $G$Z";}function
db_collation($l,$eb){global$g;return$g->result("SELECT value FROM nls_database_parameters WHERE parameter = 'NLS_CHARACTERSET'");}function
engines(){return
array();}function
logged_user(){global$g;return$g->result("SELECT USER FROM DUAL");}function
tables_list(){return
get_key_vals("SELECT table_name, 'table' FROM all_tables WHERE tablespace_name = ".q(DB)."
UNION SELECT view_name, 'view' FROM user_views
ORDER BY 1");}function
count_tables($k){return
array();}function
table_status($A=""){$J=array();$rf=q($A);foreach(get_rows('SELECT table_name "Name", \'table\' "Engine", avg_row_len * num_rows "Data_length", num_rows "Rows" FROM all_tables WHERE tablespace_name = '.q(DB).($A!=""?" AND table_name = $rf":"")."
UNION SELECT view_name, 'view', 0, 0 FROM user_views".($A!=""?" WHERE view_name = $rf":"")."
ORDER BY 1")as$K){if($A!="")return$K;$J[$K["Name"]]=$K;}return$J;}function
is_view($S){return$S["Engine"]=="view";}function
fk_support($S){return
true;}function
fields($R){$J=array();foreach(get_rows("SELECT * FROM all_tab_columns WHERE table_name = ".q($R)." ORDER BY column_id")as$K){$U=$K["DATA_TYPE"];$Cd="$K[DATA_PRECISION],$K[DATA_SCALE]";if($Cd==",")$Cd=$K["DATA_LENGTH"];$J[$K["COLUMN_NAME"]]=array("field"=>$K["COLUMN_NAME"],"full_type"=>$U.($Cd?"($Cd)":""),"type"=>strtolower($U),"length"=>$Cd,"default"=>$K["DATA_DEFAULT"],"null"=>($K["NULLABLE"]=="Y"),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);}return$J;}function
indexes($R,$h=null){$J=array();foreach(get_rows("SELECT uic.*, uc.constraint_type
FROM user_ind_columns uic
LEFT JOIN user_constraints uc ON uic.index_name = uc.constraint_name AND uic.table_name = uc.table_name
WHERE uic.table_name = ".q($R)."
ORDER BY uc.constraint_type, uic.column_position",$h)as$K){$Zc=$K["INDEX_NAME"];$J[$Zc]["type"]=($K["CONSTRAINT_TYPE"]=="P"?"PRIMARY":($K["CONSTRAINT_TYPE"]=="U"?"UNIQUE":"INDEX"));$J[$Zc]["columns"][]=$K["COLUMN_NAME"];$J[$Zc]["lengths"][]=($K["CHAR_LENGTH"]&&$K["CHAR_LENGTH"]!=$K["COLUMN_LENGTH"]?$K["CHAR_LENGTH"]:null);$J[$Zc]["descs"][]=($K["DESCEND"]?'1':null);}return$J;}function
view($A){$L=get_rows('SELECT text "select" FROM user_views WHERE view_name = '.q($A));return
reset($L);}function
collations(){return
array();}function
information_schema($l){return
false;}function
error(){global$g;return
h($g->error);}function
explain($g,$G){$g->query("EXPLAIN PLAN FOR $G");return$g->query("SELECT * FROM plan_table");}function
found_rows($S,$Z){}function
alter_table($R,$A,$p,$wc,$ib,$Ub,$d,$Fa,$Be){$c=$Jb=array();foreach($p
as$o){$X=$o[1];if($X&&$o[0]!=""&&idf_escape($o[0])!=$X[0])queries("ALTER TABLE ".table($R)." RENAME COLUMN ".idf_escape($o[0])." TO $X[0]");if($X)$c[]=($R!=""?($o[0]!=""?"MODIFY (":"ADD ("):"  ").implode($X).($R!=""?")":"");else$Jb[]=idf_escape($o[0]);}if($R=="")return
queries("CREATE TABLE ".table($A)." (\n".implode(",\n",$c)."\n)");return(!$c||queries("ALTER TABLE ".table($R)."\n".implode("\n",$c)))&&(!$Jb||queries("ALTER TABLE ".table($R)." DROP (".implode(", ",$Jb).")"))&&($R==$A||queries("ALTER TABLE ".table($R)." RENAME TO ".table($A)));}function
foreign_keys($R){$J=array();$G="SELECT c_list.CONSTRAINT_NAME as NAME,
c_src.COLUMN_NAME as SRC_COLUMN,
c_dest.OWNER as DEST_DB,
c_dest.TABLE_NAME as DEST_TABLE,
c_dest.COLUMN_NAME as DEST_COLUMN,
c_list.DELETE_RULE as ON_DELETE
FROM ALL_CONSTRAINTS c_list, ALL_CONS_COLUMNS c_src, ALL_CONS_COLUMNS c_dest
WHERE c_list.CONSTRAINT_NAME = c_src.CONSTRAINT_NAME
AND c_list.R_CONSTRAINT_NAME = c_dest.CONSTRAINT_NAME
AND c_list.CONSTRAINT_TYPE = 'R'
AND c_src.TABLE_NAME = ".q($R);foreach(get_rows($G)as$K)$J[$K['NAME']]=array("db"=>$K['DEST_DB'],"table"=>$K['DEST_TABLE'],"source"=>array($K['SRC_COLUMN']),"target"=>array($K['DEST_COLUMN']),"on_delete"=>$K['ON_DELETE'],"on_update"=>null,);return$J;}function
truncate_tables($T){return
apply_queries("TRUNCATE TABLE",$T);}function
drop_views($Wg){return
apply_queries("DROP VIEW",$Wg);}function
drop_tables($T){return
apply_queries("DROP TABLE",$T);}function
last_id(){return
0;}function
schemas(){return
get_vals("SELECT DISTINCT owner FROM dba_segments WHERE owner IN (SELECT username FROM dba_users WHERE default_tablespace NOT IN ('SYSTEM','SYSAUX'))");}function
get_schema(){global$g;return$g->result("SELECT sys_context('USERENV', 'SESSION_USER') FROM dual");}function
set_schema($qf,$h=null){global$g;if(!$h)$h=$g;return$h->query("ALTER SESSION SET CURRENT_SCHEMA = ".idf_escape($qf));}function
show_variables(){return
get_key_vals('SELECT name, display_value FROM v$parameter');}function
process_list(){return
get_rows('SELECT sess.process AS "process", sess.username AS "user", sess.schemaname AS "schema", sess.status AS "status", sess.wait_class AS "wait_class", sess.seconds_in_wait AS "seconds_in_wait", sql.sql_text AS "sql_text", sess.machine AS "machine", sess.port AS "port"
FROM v$session sess LEFT OUTER JOIN v$sql sql
ON sql.sql_id = sess.sql_id
WHERE sess.type = \'USER\'
ORDER BY PROCESS
');}function
show_status(){$L=get_rows('SELECT * FROM v$instance');return
reset($L);}function
convert_field($o){}function
unconvert_field($o,$J){return$J;}function
support($kc){return
preg_match('~^(columns|database|drop_col|indexes|descidx|processlist|scheme|sql|status|table|variables|view|view_trigger)$~',$kc);}$w="oracle";$Cg=array();$Sf=array();foreach(array('Numbers'=>array("number"=>38,"binary_float"=>12,"binary_double"=>21),'Date and time'=>array("date"=>10,"timestamp"=>29,"interval year"=>12,"interval day"=>28),'Strings'=>array("char"=>2000,"varchar2"=>4000,"nchar"=>2000,"nvarchar2"=>4000,"clob"=>4294967295,"nclob"=>4294967295),'Binary'=>array("raw"=>2000,"long raw"=>2147483648,"blob"=>4294967295,"bfile"=>4294967296),)as$x=>$X){$Cg+=$X;$Sf[$x]=array_keys($X);}$Jg=array();$qe=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL");$Fc=array("length","lower","round","upper");$Jc=array("avg","count","count distinct","max","min","sum");$Nb=array(array("date"=>"current_date","timestamp"=>"current_timestamp",),array("number|float|double"=>"+/-","date|timestamp"=>"+ interval/- interval","char|clob"=>"||",));}$Ib["mssql"]="MS SQL (beta)";if(isset($_GET["mssql"])){$Ke=array("SQLSRV","MSSQL","PDO_DBLIB");define("DRIVER","mssql");if(extension_loaded("sqlsrv")){class
Min_DB{var$extension="sqlsrv",$_link,$_result,$server_info,$affected_rows,$errno,$error;function
_get_error(){$this->error="";foreach(sqlsrv_errors()as$n){$this->errno=$n["code"];$this->error.="$n[message]\n";}$this->error=rtrim($this->error);}function
connect($O,$V,$F){global$b;$l=$b->database();$mb=array("UID"=>$V,"PWD"=>$F,"CharacterSet"=>"UTF-8");if($l!="")$mb["Database"]=$l;$this->_link=@sqlsrv_connect(preg_replace('~:~',',',$O),$mb);if($this->_link){$gd=sqlsrv_server_info($this->_link);$this->server_info=$gd['SQLServerVersion'];}else$this->_get_error();return(bool)$this->_link;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($j){return$this->query("USE ".idf_escape($j));}function
query($G,$Dg=false){$I=sqlsrv_query($this->_link,$G);$this->error="";if(!$I){$this->_get_error();return
false;}return$this->store_result($I);}function
multi_query($G){$this->_result=sqlsrv_query($this->_link,$G);$this->error="";if(!$this->_result){$this->_get_error();return
false;}return
true;}function
store_result($I=null){if(!$I)$I=$this->_result;if(!$I)return
false;if(sqlsrv_field_metadata($I))return
new
Min_Result($I);$this->affected_rows=sqlsrv_rows_affected($I);return
true;}function
next_result(){return$this->_result?sqlsrv_next_result($this->_result):null;}function
result($G,$o=0){$I=$this->query($G);if(!is_object($I))return
false;$K=$I->fetch_row();return$K[$o];}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
__construct($I){$this->_result=$I;}function
_convert($K){foreach((array)$K
as$x=>$X){if(is_a($X,'DateTime'))$K[$x]=$X->format("Y-m-d H:i:s");}return$K;}function
fetch_assoc(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_ASSOC));}function
fetch_row(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_NUMERIC));}function
fetch_field(){if(!$this->_fields)$this->_fields=sqlsrv_field_metadata($this->_result);$o=$this->_fields[$this->_offset++];$J=new
stdClass;$J->name=$o["Name"];$J->orgname=$o["Name"];$J->type=($o["Type"]==1?254:0);return$J;}function
seek($je){for($r=0;$r<$je;$r++)sqlsrv_fetch($this->_result);}function
__destruct(){sqlsrv_free_stmt($this->_result);}}}elseif(extension_loaded("mssql")){class
Min_DB{var$extension="MSSQL",$_link,$_result,$server_info,$affected_rows,$error;function
connect($O,$V,$F){$this->_link=@mssql_connect($O,$V,$F);if($this->_link){$I=$this->query("SELECT SERVERPROPERTY('ProductLevel'), SERVERPROPERTY('Edition')");if($I){$K=$I->fetch_row();$this->server_info=$this->result("sp_server_info 2",2)." [$K[0]] $K[1]";}}else$this->error=mssql_get_last_message();return(bool)$this->_link;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($j){return
mssql_select_db($j);}function
query($G,$Dg=false){$I=@mssql_query($G,$this->_link);$this->error="";if(!$I){$this->error=mssql_get_last_message();return
false;}if($I===true){$this->affected_rows=mssql_rows_affected($this->_link);return
true;}return
new
Min_Result($I);}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
mssql_next_result($this->_result->_result);}function
result($G,$o=0){$I=$this->query($G);if(!is_object($I))return
false;return
mssql_result($I->_result,0,$o);}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
__construct($I){$this->_result=$I;$this->num_rows=mssql_num_rows($I);}function
fetch_assoc(){return
mssql_fetch_assoc($this->_result);}function
fetch_row(){return
mssql_fetch_row($this->_result);}function
num_rows(){return
mssql_num_rows($this->_result);}function
fetch_field(){$J=mssql_fetch_field($this->_result);$J->orgtable=$J->table;$J->orgname=$J->name;return$J;}function
seek($je){mssql_data_seek($this->_result,$je);}function
__destruct(){mssql_free_result($this->_result);}}}elseif(extension_loaded("pdo_dblib")){class
Min_DB
extends
Min_PDO{var$extension="PDO_DBLIB";function
connect($O,$V,$F){$this->dsn("dblib:charset=utf8;host=".str_replace(":",";unix_socket=",preg_replace('~:(\d)~',';port=\1',$O)),$V,$F);return
true;}function
select_db($j){return$this->query("USE ".idf_escape($j));}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($R,$L,$Me){foreach($L
as$P){$Kg=array();$Z=array();foreach($P
as$x=>$X){$Kg[]="$x = $X";if(isset($Me[idf_unescape($x)]))$Z[]="$x = $X";}if(!queries("MERGE ".table($R)." USING (VALUES(".implode(", ",$P).")) AS source (c".implode(", c",range(1,count($P))).") ON ".implode(" AND ",$Z)." WHEN MATCHED THEN UPDATE SET ".implode(", ",$Kg)." WHEN NOT MATCHED THEN INSERT (".implode(", ",array_keys($P)).") VALUES (".implode(", ",$P).");"))return
false;}return
true;}function
begin(){return
queries("BEGIN TRANSACTION");}}function
idf_escape($t){return"[".str_replace("]","]]",$t)."]";}function
table($t){return($_GET["ns"]!=""?idf_escape($_GET["ns"]).".":"").idf_escape($t);}function
connect(){global$b;$g=new
Min_DB;$i=$b->credentials();if($g->connect($i[0],$i[1],$i[2]))return$g;return$g->error;}function
get_databases(){return
get_vals("SELECT name FROM sys.databases WHERE name NOT IN ('master', 'tempdb', 'model', 'msdb')");}function
limit($G,$Z,$y,$je=0,$N=" "){return($y!==null?" TOP (".($y+$je).")":"")." $G$Z";}function
limit1($R,$G,$Z,$N="\n"){return
limit($G,$Z,1,0,$N);}function
db_collation($l,$eb){global$g;return$g->result("SELECT collation_name FROM sys.databases WHERE name = ".q($l));}function
engines(){return
array();}function
logged_user(){global$g;return$g->result("SELECT SUSER_NAME()");}function
tables_list(){return
get_key_vals("SELECT name, type_desc FROM sys.all_objects WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V') ORDER BY name");}function
count_tables($k){global$g;$J=array();foreach($k
as$l){$g->select_db($l);$J[$l]=$g->result("SELECT COUNT(*) FROM INFORMATION_SCHEMA.TABLES");}return$J;}function
table_status($A=""){$J=array();foreach(get_rows("SELECT ao.name AS Name, ao.type_desc AS Engine, (SELECT value FROM fn_listextendedproperty(default, 'SCHEMA', schema_name(schema_id), 'TABLE', ao.name, null, null)) AS Comment FROM sys.all_objects AS ao WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V') ".($A!=""?"AND name = ".q($A):"ORDER BY name"))as$K){if($A!="")return$K;$J[$K["Name"]]=$K;}return$J;}function
is_view($S){return$S["Engine"]=="VIEW";}function
fk_support($S){return
true;}function
fields($R){$jb=get_key_vals("SELECT objname, cast(value as varchar) FROM fn_listextendedproperty('MS_DESCRIPTION', 'schema', ".q(get_schema()).", 'table', ".q($R).", 'column', NULL)");$J=array();foreach(get_rows("SELECT c.max_length, c.precision, c.scale, c.name, c.is_nullable, c.is_identity, c.collation_name, t.name type, CAST(d.definition as text) [default]
FROM sys.all_columns c
JOIN sys.all_objects o ON c.object_id = o.object_id
JOIN sys.types t ON c.user_type_id = t.user_type_id
LEFT JOIN sys.default_constraints d ON c.default_object_id = d.parent_column_id
WHERE o.schema_id = SCHEMA_ID(".q(get_schema()).") AND o.type IN ('S', 'U', 'V') AND o.name = ".q($R))as$K){$U=$K["type"];$Cd=(preg_match("~char|binary~",$U)?$K["max_length"]:($U=="decimal"?"$K[precision],$K[scale]":""));$J[$K["name"]]=array("field"=>$K["name"],"full_type"=>$U.($Cd?"($Cd)":""),"type"=>$U,"length"=>$Cd,"default"=>$K["default"],"null"=>$K["is_nullable"],"auto_increment"=>$K["is_identity"],"collation"=>$K["collation_name"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),"primary"=>$K["is_identity"],"comment"=>$jb[$K["name"]],);}return$J;}function
indexes($R,$h=null){$J=array();foreach(get_rows("SELECT i.name, key_ordinal, is_unique, is_primary_key, c.name AS column_name, is_descending_key
FROM sys.indexes i
INNER JOIN sys.index_columns ic ON i.object_id = ic.object_id AND i.index_id = ic.index_id
INNER JOIN sys.columns c ON ic.object_id = c.object_id AND ic.column_id = c.column_id
WHERE OBJECT_NAME(i.object_id) = ".q($R),$h)as$K){$A=$K["name"];$J[$A]["type"]=($K["is_primary_key"]?"PRIMARY":($K["is_unique"]?"UNIQUE":"INDEX"));$J[$A]["lengths"]=array();$J[$A]["columns"][$K["key_ordinal"]]=$K["column_name"];$J[$A]["descs"][$K["key_ordinal"]]=($K["is_descending_key"]?'1':null);}return$J;}function
view($A){global$g;return
array("select"=>preg_replace('~^(?:[^[]|\[[^]]*])*\s+AS\s+~isU','',$g->result("SELECT VIEW_DEFINITION FROM INFORMATION_SCHEMA.VIEWS WHERE TABLE_SCHEMA = SCHEMA_NAME() AND TABLE_NAME = ".q($A))));}function
collations(){$J=array();foreach(get_vals("SELECT name FROM fn_helpcollations()")as$d)$J[preg_replace('~_.*~','',$d)][]=$d;return$J;}function
information_schema($l){return
false;}function
error(){global$g;return
nl_br(h(preg_replace('~^(\[[^]]*])+~m','',$g->error)));}function
create_database($l,$d){return
queries("CREATE DATABASE ".idf_escape($l).(preg_match('~^[a-z0-9_]+$~i',$d)?" COLLATE $d":""));}function
drop_databases($k){return
queries("DROP DATABASE ".implode(", ",array_map('idf_escape',$k)));}function
rename_database($A,$d){if(preg_match('~^[a-z0-9_]+$~i',$d))queries("ALTER DATABASE ".idf_escape(DB)." COLLATE $d");queries("ALTER DATABASE ".idf_escape(DB)." MODIFY NAME = ".idf_escape($A));return
true;}function
auto_increment(){return" IDENTITY".($_POST["Auto_increment"]!=""?"(".number($_POST["Auto_increment"]).",1)":"")." PRIMARY KEY";}function
alter_table($R,$A,$p,$wc,$ib,$Ub,$d,$Fa,$Be){$c=array();$jb=array();foreach($p
as$o){$e=idf_escape($o[0]);$X=$o[1];if(!$X)$c["DROP"][]=" COLUMN $e";else{$X[1]=preg_replace("~( COLLATE )'(\\w+)'~",'\1\2',$X[1]);$jb[$o[0]]=$X[5];unset($X[5]);if($o[0]=="")$c["ADD"][]="\n  ".implode("",$X).($R==""?substr($wc[$X[0]],16+strlen($X[0])):"");else{unset($X[6]);if($e!=$X[0])queries("EXEC sp_rename ".q(table($R).".$e").", ".q(idf_unescape($X[0])).", 'COLUMN'");$c["ALTER COLUMN ".implode("",$X)][]="";}}}if($R=="")return
queries("CREATE TABLE ".table($A)." (".implode(",",(array)$c["ADD"])."\n)");if($R!=$A)queries("EXEC sp_rename ".q(table($R)).", ".q($A));if($wc)$c[""]=$wc;foreach($c
as$x=>$X){if(!queries("ALTER TABLE ".idf_escape($A)." $x".implode(",",$X)))return
false;}foreach($jb
as$x=>$X){$ib=substr($X,9);queries("EXEC sp_dropextendedproperty @name = N'MS_Description', @level0type = N'Schema', @level0name = ".q(get_schema()).", @level1type = N'Table',  @level1name = ".q($A).", @level2type = N'Column', @level2name = ".q($x));queries("EXEC sp_addextendedproperty @name = N'MS_Description', @value = ".$ib.", @level0type = N'Schema', @level0name = ".q(get_schema()).", @level1type = N'Table',  @level1name = ".q($A).", @level2type = N'Column', @level2name = ".q($x));}return
true;}function
alter_indexes($R,$c){$u=array();$Jb=array();foreach($c
as$X){if($X[2]=="DROP"){if($X[0]=="PRIMARY")$Jb[]=idf_escape($X[1]);else$u[]=idf_escape($X[1])." ON ".table($R);}elseif(!queries(($X[0]!="PRIMARY"?"CREATE $X[0] ".($X[0]!="INDEX"?"INDEX ":"").idf_escape($X[1]!=""?$X[1]:uniqid($R."_"))." ON ".table($R):"ALTER TABLE ".table($R)." ADD PRIMARY KEY")." (".implode(", ",$X[2]).")"))return
false;}return(!$u||queries("DROP INDEX ".implode(", ",$u)))&&(!$Jb||queries("ALTER TABLE ".table($R)." DROP ".implode(", ",$Jb)));}function
last_id(){global$g;return$g->result("SELECT SCOPE_IDENTITY()");}function
explain($g,$G){$g->query("SET SHOWPLAN_ALL ON");$J=$g->query($G);$g->query("SET SHOWPLAN_ALL OFF");return$J;}function
found_rows($S,$Z){}function
foreign_keys($R){$J=array();foreach(get_rows("EXEC sp_fkeys @fktable_name = ".q($R))as$K){$zc=&$J[$K["FK_NAME"]];$zc["db"]=$K["PKTABLE_QUALIFIER"];$zc["table"]=$K["PKTABLE_NAME"];$zc["source"][]=$K["FKCOLUMN_NAME"];$zc["target"][]=$K["PKCOLUMN_NAME"];}return$J;}function
truncate_tables($T){return
apply_queries("TRUNCATE TABLE",$T);}function
drop_views($Wg){return
queries("DROP VIEW ".implode(", ",array_map('table',$Wg)));}function
drop_tables($T){return
queries("DROP TABLE ".implode(", ",array_map('table',$T)));}function
move_tables($T,$Wg,$cg){return
apply_queries("ALTER SCHEMA ".idf_escape($cg)." TRANSFER",array_merge($T,$Wg));}function
trigger($A){if($A=="")return
array();$L=get_rows("SELECT s.name [Trigger],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(s.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(s.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing],
c.text
FROM sysobjects s
JOIN syscomments c ON s.id = c.id
WHERE s.xtype = 'TR' AND s.name = ".q($A));$J=reset($L);if($J)$J["Statement"]=preg_replace('~^.+\s+AS\s+~isU','',$J["text"]);return$J;}function
triggers($R){$J=array();foreach(get_rows("SELECT sys1.name,
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing]
FROM sysobjects sys1
JOIN sysobjects sys2 ON sys1.parent_obj = sys2.id
WHERE sys1.xtype = 'TR' AND sys2.name = ".q($R))as$K)$J[$K["name"]]=array($K["Timing"],$K["Event"]);return$J;}function
trigger_options(){return
array("Timing"=>array("AFTER","INSTEAD OF"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("AS"),);}function
schemas(){return
get_vals("SELECT name FROM sys.schemas");}function
get_schema(){global$g;if($_GET["ns"]!="")return$_GET["ns"];return$g->result("SELECT SCHEMA_NAME()");}function
set_schema($pf){return
true;}function
use_sql($j){return"USE ".idf_escape($j);}function
show_variables(){return
array();}function
show_status(){return
array();}function
convert_field($o){}function
unconvert_field($o,$J){return$J;}function
support($kc){return
preg_match('~^(comment|columns|database|drop_col|indexes|descidx|scheme|sql|table|trigger|view|view_trigger)$~',$kc);}$w="mssql";$Cg=array();$Sf=array();foreach(array('Numbers'=>array("tinyint"=>3,"smallint"=>5,"int"=>10,"bigint"=>20,"bit"=>1,"decimal"=>0,"real"=>12,"float"=>53,"smallmoney"=>10,"money"=>20),'Date and time'=>array("date"=>10,"smalldatetime"=>19,"datetime"=>19,"datetime2"=>19,"time"=>8,"datetimeoffset"=>10),'Strings'=>array("char"=>8000,"varchar"=>8000,"text"=>2147483647,"nchar"=>4000,"nvarchar"=>4000,"ntext"=>1073741823),'Binary'=>array("binary"=>8000,"varbinary"=>8000,"image"=>2147483647),)as$x=>$X){$Cg+=$X;$Sf[$x]=array_keys($X);}$Jg=array();$qe=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL");$Fc=array("len","lower","round","upper");$Jc=array("avg","count","count distinct","max","min","sum");$Nb=array(array("date|time"=>"getdate",),array("int|decimal|real|float|money|datetime"=>"+/-","char|text"=>"+",));}$Ib['firebird']='Firebird (alpha)';if(isset($_GET["firebird"])){$Ke=array("interbase");define("DRIVER","firebird");if(extension_loaded("interbase")){class
Min_DB{var$extension="Firebird",$server_info,$affected_rows,$errno,$error,$_link,$_result;function
connect($O,$V,$F){$this->_link=ibase_connect($O,$V,$F);if($this->_link){$Ng=explode(':',$O);$this->service_link=ibase_service_attach($Ng[0],$V,$F);$this->server_info=ibase_server_info($this->service_link,IBASE_SVC_SERVER_VERSION);}else{$this->errno=ibase_errcode();$this->error=ibase_errmsg();}return(bool)$this->_link;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($j){return($j=="domain");}function
query($G,$Dg=false){$I=ibase_query($G,$this->_link);if(!$I){$this->errno=ibase_errcode();$this->error=ibase_errmsg();return
false;}$this->error="";if($I===true){$this->affected_rows=ibase_affected_rows($this->_link);return
true;}return
new
Min_Result($I);}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($G,$o=0){$I=$this->query($G);if(!$I||!$I->num_rows)return
false;$K=$I->fetch_row();return$K[$o];}}class
Min_Result{var$num_rows,$_result,$_offset=0;function
__construct($I){$this->_result=$I;}function
fetch_assoc(){return
ibase_fetch_assoc($this->_result);}function
fetch_row(){return
ibase_fetch_row($this->_result);}function
fetch_field(){$o=ibase_field_info($this->_result,$this->_offset++);return(object)array('name'=>$o['name'],'orgname'=>$o['name'],'type'=>$o['type'],'charsetnr'=>$o['length'],);}function
__destruct(){ibase_free_result($this->_result);}}}class
Min_Driver
extends
Min_SQL{}function
idf_escape($t){return'"'.str_replace('"','""',$t).'"';}function
table($t){return
idf_escape($t);}function
connect(){global$b;$g=new
Min_DB;$i=$b->credentials();if($g->connect($i[0],$i[1],$i[2]))return$g;return$g->error;}function
get_databases($uc){return
array("domain");}function
limit($G,$Z,$y,$je=0,$N=" "){$J='';$J.=($y!==null?$N."FIRST $y".($je?" SKIP $je":""):"");$J.=" $G$Z";return$J;}function
limit1($R,$G,$Z,$N="\n"){return
limit($G,$Z,1,0,$N);}function
db_collation($l,$eb){}function
engines(){return
array();}function
logged_user(){global$b;$i=$b->credentials();return$i[1];}function
tables_list(){global$g;$G='SELECT RDB$RELATION_NAME FROM rdb$relations WHERE rdb$system_flag = 0';$I=ibase_query($g->_link,$G);$J=array();while($K=ibase_fetch_assoc($I))$J[$K['RDB$RELATION_NAME']]='table';ksort($J);return$J;}function
count_tables($k){return
array();}function
table_status($A="",$jc=false){global$g;$J=array();$wb=tables_list();foreach($wb
as$u=>$X){$u=trim($u);$J[$u]=array('Name'=>$u,'Engine'=>'standard',);if($A==$u)return$J[$u];}return$J;}function
is_view($S){return
false;}function
fk_support($S){return
preg_match('~InnoDB|IBMDB2I~i',$S["Engine"]);}function
fields($R){global$g;$J=array();$G='SELECT r.RDB$FIELD_NAME AS field_name,
r.RDB$DESCRIPTION AS field_description,
r.RDB$DEFAULT_VALUE AS field_default_value,
r.RDB$NULL_FLAG AS field_not_null_constraint,
f.RDB$FIELD_LENGTH AS field_length,
f.RDB$FIELD_PRECISION AS field_precision,
f.RDB$FIELD_SCALE AS field_scale,
CASE f.RDB$FIELD_TYPE
WHEN 261 THEN \'BLOB\'
WHEN 14 THEN \'CHAR\'
WHEN 40 THEN \'CSTRING\'
WHEN 11 THEN \'D_FLOAT\'
WHEN 27 THEN \'DOUBLE\'
WHEN 10 THEN \'FLOAT\'
WHEN 16 THEN \'INT64\'
WHEN 8 THEN \'INTEGER\'
WHEN 9 THEN \'QUAD\'
WHEN 7 THEN \'SMALLINT\'
WHEN 12 THEN \'DATE\'
WHEN 13 THEN \'TIME\'
WHEN 35 THEN \'TIMESTAMP\'
WHEN 37 THEN \'VARCHAR\'
ELSE \'UNKNOWN\'
END AS field_type,
f.RDB$FIELD_SUB_TYPE AS field_subtype,
coll.RDB$COLLATION_NAME AS field_collation,
cset.RDB$CHARACTER_SET_NAME AS field_charset
FROM RDB$RELATION_FIELDS r
LEFT JOIN RDB$FIELDS f ON r.RDB$FIELD_SOURCE = f.RDB$FIELD_NAME
LEFT JOIN RDB$COLLATIONS coll ON f.RDB$COLLATION_ID = coll.RDB$COLLATION_ID
LEFT JOIN RDB$CHARACTER_SETS cset ON f.RDB$CHARACTER_SET_ID = cset.RDB$CHARACTER_SET_ID
WHERE r.RDB$RELATION_NAME = '.q($R).'
ORDER BY r.RDB$FIELD_POSITION';$I=ibase_query($g->_link,$G);while($K=ibase_fetch_assoc($I))$J[trim($K['FIELD_NAME'])]=array("field"=>trim($K["FIELD_NAME"]),"full_type"=>trim($K["FIELD_TYPE"]),"type"=>trim($K["FIELD_SUB_TYPE"]),"default"=>trim($K['FIELD_DEFAULT_VALUE']),"null"=>(trim($K["FIELD_NOT_NULL_CONSTRAINT"])=="YES"),"auto_increment"=>'0',"collation"=>trim($K["FIELD_COLLATION"]),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),"comment"=>trim($K["FIELD_DESCRIPTION"]),);return$J;}function
indexes($R,$h=null){$J=array();return$J;}function
foreign_keys($R){return
array();}function
collations(){return
array();}function
information_schema($l){return
false;}function
error(){global$g;return
h($g->error);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($pf){return
true;}function
support($kc){return
preg_match("~^(columns|sql|status|table)$~",$kc);}$w="firebird";$qe=array("=");$Fc=array();$Jc=array();$Nb=array();}$Ib["simpledb"]="SimpleDB";if(isset($_GET["simpledb"])){$Ke=array("SimpleXML + allow_url_fopen");define("DRIVER","simpledb");if(class_exists('SimpleXMLElement')&&ini_bool('allow_url_fopen')){class
Min_DB{var$extension="SimpleXML",$server_info='2009-04-15',$error,$timeout,$next,$affected_rows,$_result;function
select_db($j){return($j=="domain");}function
query($G,$Dg=false){$E=array('SelectExpression'=>$G,'ConsistentRead'=>'true');if($this->next)$E['NextToken']=$this->next;$I=sdb_request_all('Select','Item',$E,$this->timeout);$this->timeout=0;if($I===false)return$I;if(preg_match('~^\s*SELECT\s+COUNT\(~i',$G)){$Wf=0;foreach($I
as$qd)$Wf+=$qd->Attribute->Value;$I=array((object)array('Attribute'=>array((object)array('Name'=>'Count','Value'=>$Wf,))));}return
new
Min_Result($I);}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0;function
__construct($I){foreach($I
as$qd){$K=array();if($qd->Name!='')$K['itemName()']=(string)$qd->Name;foreach($qd->Attribute
as$Ba){$A=$this->_processValue($Ba->Name);$Y=$this->_processValue($Ba->Value);if(isset($K[$A])){$K[$A]=(array)$K[$A];$K[$A][]=$Y;}else$K[$A]=$Y;}$this->_rows[]=$K;foreach($K
as$x=>$X){if(!isset($this->_rows[0][$x]))$this->_rows[0][$x]=null;}}$this->num_rows=count($this->_rows);}function
_processValue($Pb){return(is_object($Pb)&&$Pb['encoding']=='base64'?base64_decode($Pb):(string)$Pb);}function
fetch_assoc(){$K=current($this->_rows);if(!$K)return$K;$J=array();foreach($this->_rows[0]as$x=>$X)$J[$x]=$K[$x];next($this->_rows);return$J;}function
fetch_row(){$J=$this->fetch_assoc();if(!$J)return$J;return
array_values($J);}function
fetch_field(){$vd=array_keys($this->_rows[0]);return(object)array('name'=>$vd[$this->_offset++]);}}}class
Min_Driver
extends
Min_SQL{public$Me="itemName()";function
_chunkRequest($Xc,$qa,$E,$cc=array()){global$g;foreach(array_chunk($Xc,25)as$Ya){$_e=$E;foreach($Ya
as$r=>$s){$_e["Item.$r.ItemName"]=$s;foreach($cc
as$x=>$X)$_e["Item.$r.$x"]=$X;}if(!sdb_request($qa,$_e))return
false;}$g->affected_rows=count($Xc);return
true;}function
_extractIds($R,$H,$y){$J=array();if(preg_match_all("~itemName\(\) = (('[^']*+')+)~",$H,$Nd))$J=array_map('idf_unescape',$Nd[1]);else{foreach(sdb_request_all('Select','Item',array('SelectExpression'=>'SELECT itemName() FROM '.table($R).$H.($y?" LIMIT 1":"")))as$qd)$J[]=$qd->Name;}return$J;}function
select($R,$M,$Z,$Gc,$C=array(),$y=1,$D=0,$Oe=false){global$g;$g->next=$_GET["next"];$J=parent::select($R,$M,$Z,$Gc,$C,$y,$D,$Oe);$g->next=0;return$J;}function
delete($R,$H,$y=0){return$this->_chunkRequest($this->_extractIds($R,$H,$y),'BatchDeleteAttributes',array('DomainName'=>$R));}function
update($R,$P,$H,$y=0,$N="\n"){$Ab=array();$kd=array();$r=0;$Xc=$this->_extractIds($R,$H,$y);$s=idf_unescape($P["`itemName()`"]);unset($P["`itemName()`"]);foreach($P
as$x=>$X){$x=idf_unescape($x);if($X=="NULL"||($s!=""&&array($s)!=$Xc))$Ab["Attribute.".count($Ab).".Name"]=$x;if($X!="NULL"){foreach((array)$X
as$rd=>$W){$kd["Attribute.$r.Name"]=$x;$kd["Attribute.$r.Value"]=(is_array($X)?$W:idf_unescape($W));if(!$rd)$kd["Attribute.$r.Replace"]="true";$r++;}}}$E=array('DomainName'=>$R);return(!$kd||$this->_chunkRequest(($s!=""?array($s):$Xc),'BatchPutAttributes',$E,$kd))&&(!$Ab||$this->_chunkRequest($Xc,'BatchDeleteAttributes',$E,$Ab));}function
insert($R,$P){$E=array("DomainName"=>$R);$r=0;foreach($P
as$A=>$Y){if($Y!="NULL"){$A=idf_unescape($A);if($A=="itemName()")$E["ItemName"]=idf_unescape($Y);else{foreach((array)$Y
as$X){$E["Attribute.$r.Name"]=$A;$E["Attribute.$r.Value"]=(is_array($Y)?$X:idf_unescape($Y));$r++;}}}}return
sdb_request('PutAttributes',$E);}function
insertUpdate($R,$L,$Me){foreach($L
as$P){if(!$this->update($R,$P,"WHERE `itemName()` = ".q($P["`itemName()`"])))return
false;}return
true;}function
begin(){return
false;}function
commit(){return
false;}function
rollback(){return
false;}function
slowQuery($G,$jg){$this->_conn->timeout=$jg;return$G;}}function
connect(){global$b;list(,,$F)=$b->credentials();if($F!="")return'Database does not support password.';return
new
Min_DB;}function
support($kc){return
preg_match('~sql~',$kc);}function
logged_user(){global$b;$i=$b->credentials();return$i[1];}function
get_databases(){return
array("domain");}function
collations(){return
array();}function
db_collation($l,$eb){}function
tables_list(){global$g;$J=array();foreach(sdb_request_all('ListDomains','DomainName')as$R)$J[(string)$R]='table';if($g->error&&defined("PAGE_HEADER"))echo"<p class='error'>".error()."\n";return$J;}function
table_status($A="",$jc=false){$J=array();foreach(($A!=""?array($A=>true):tables_list())as$R=>$U){$K=array("Name"=>$R,"Auto_increment"=>"");if(!$jc){$Vd=sdb_request('DomainMetadata',array('DomainName'=>$R));if($Vd){foreach(array("Rows"=>"ItemCount","Data_length"=>"ItemNamesSizeBytes","Index_length"=>"AttributeValuesSizeBytes","Data_free"=>"AttributeNamesSizeBytes",)as$x=>$X)$K[$x]=(string)$Vd->$X;}}if($A!="")return$K;$J[$R]=$K;}return$J;}function
explain($g,$G){}function
error(){global$g;return
h($g->error);}function
information_schema(){}function
is_view($S){}function
indexes($R,$h=null){return
array(array("type"=>"PRIMARY","columns"=>array("itemName()")),);}function
fields($R){return
fields_from_edit();}function
foreign_keys($R){return
array();}function
table($t){return
idf_escape($t);}function
idf_escape($t){return"`".str_replace("`","``",$t)."`";}function
limit($G,$Z,$y,$je=0,$N=" "){return" $G$Z".($y!==null?$N."LIMIT $y":"");}function
unconvert_field($o,$J){return$J;}function
fk_support($S){}function
engines(){return
array();}function
alter_table($R,$A,$p,$wc,$ib,$Ub,$d,$Fa,$Be){return($R==""&&sdb_request('CreateDomain',array('DomainName'=>$A)));}function
drop_tables($T){foreach($T
as$R){if(!sdb_request('DeleteDomain',array('DomainName'=>$R)))return
false;}return
true;}function
count_tables($k){foreach($k
as$l)return
array($l=>count(tables_list()));}function
found_rows($S,$Z){return($Z?null:$S["Rows"]);}function
last_id(){}function
hmac($va,$wb,$x,$Ye=false){$Oa=64;if(strlen($x)>$Oa)$x=pack("H*",$va($x));$x=str_pad($x,$Oa,"\0");$sd=$x^str_repeat("\x36",$Oa);$td=$x^str_repeat("\x5C",$Oa);$J=$va($td.pack("H*",$va($sd.$wb)));if($Ye)$J=pack("H*",$J);return$J;}function
sdb_request($qa,$E=array()){global$b,$g;list($Tc,$E['AWSAccessKeyId'],$sf)=$b->credentials();$E['Action']=$qa;$E['Timestamp']=gmdate('Y-m-d\TH:i:s+00:00');$E['Version']='2009-04-15';$E['SignatureVersion']=2;$E['SignatureMethod']='HmacSHA1';ksort($E);$G='';foreach($E
as$x=>$X)$G.='&'.rawurlencode($x).'='.rawurlencode($X);$G=str_replace('%7E','~',substr($G,1));$G.="&Signature=".urlencode(base64_encode(hmac('sha1',"POST\n".preg_replace('~^https?://~','',$Tc)."\n/\n$G",$sf,true)));@ini_set('track_errors',1);$nc=@file_get_contents((preg_match('~^https?://~',$Tc)?$Tc:"http://$Tc"),false,stream_context_create(array('http'=>array('method'=>'POST','content'=>$G,'ignore_errors'=>1,))));if(!$nc){$g->error=$php_errormsg;return
false;}libxml_use_internal_errors(true);$hh=simplexml_load_string($nc);if(!$hh){$n=libxml_get_last_error();$g->error=$n->message;return
false;}if($hh->Errors){$n=$hh->Errors->Error;$g->error="$n->Message ($n->Code)";return
false;}$g->error='';$bg=$qa."Result";return($hh->$bg?$hh->$bg:true);}function
sdb_request_all($qa,$bg,$E=array(),$jg=0){$J=array();$Of=($jg?microtime(true):0);$y=(preg_match('~LIMIT\s+(\d+)\s*$~i',$E['SelectExpression'],$_)?$_[1]:0);do{$hh=sdb_request($qa,$E);if(!$hh)break;foreach($hh->$bg
as$Pb)$J[]=$Pb;if($y&&count($J)>=$y){$_GET["next"]=$hh->NextToken;break;}if($jg&&microtime(true)-$Of>$jg)return
false;$E['NextToken']=$hh->NextToken;if($y)$E['SelectExpression']=preg_replace('~\d+\s*$~',$y-count($J),$E['SelectExpression']);}while($hh->NextToken);return$J;}$w="simpledb";$qe=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","IS NOT NULL");$Fc=array();$Jc=array("count");$Nb=array(array("json"));}$Ib["mongo"]="MongoDB";if(isset($_GET["mongo"])){$Ke=array("mongo","mongodb");define("DRIVER","mongo");if(class_exists('MongoDB')){class
Min_DB{var$extension="Mongo",$server_info=MongoClient::VERSION,$error,$last_id,$_link,$_db;function
connect($Lg,$B){return@new
MongoClient($Lg,$B);}function
query($G){return
false;}function
select_db($j){try{$this->_db=$this->_link->selectDB($j);return
true;}catch(Exception$Zb){$this->error=$Zb->getMessage();return
false;}}function
quote($Q){return$Q;}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0,$_charset=array();function
__construct($I){foreach($I
as$qd){$K=array();foreach($qd
as$x=>$X){if(is_a($X,'MongoBinData'))$this->_charset[$x]=63;$K[$x]=(is_a($X,'MongoId')?'ObjectId("'.strval($X).'")':(is_a($X,'MongoDate')?gmdate("Y-m-d H:i:s",$X->sec)." GMT":(is_a($X,'MongoBinData')?$X->bin:(is_a($X,'MongoRegex')?strval($X):(is_object($X)?get_class($X):$X)))));}$this->_rows[]=$K;foreach($K
as$x=>$X){if(!isset($this->_rows[0][$x]))$this->_rows[0][$x]=null;}}$this->num_rows=count($this->_rows);}function
fetch_assoc(){$K=current($this->_rows);if(!$K)return$K;$J=array();foreach($this->_rows[0]as$x=>$X)$J[$x]=$K[$x];next($this->_rows);return$J;}function
fetch_row(){$J=$this->fetch_assoc();if(!$J)return$J;return
array_values($J);}function
fetch_field(){$vd=array_keys($this->_rows[0]);$A=$vd[$this->_offset++];return(object)array('name'=>$A,'charsetnr'=>$this->_charset[$A],);}}class
Min_Driver
extends
Min_SQL{public$Me="_id";function
select($R,$M,$Z,$Gc,$C=array(),$y=1,$D=0,$Oe=false){$M=($M==array("*")?array():array_fill_keys($M,true));$Hf=array();foreach($C
as$X){$X=preg_replace('~ DESC$~','',$X,1,$qb);$Hf[$X]=($qb?-1:1);}return
new
Min_Result($this->_conn->_db->selectCollection($R)->find(array(),$M)->sort($Hf)->limit($y!=""?+$y:0)->skip($D*$y));}function
insert($R,$P){try{$J=$this->_conn->_db->selectCollection($R)->insert($P);$this->_conn->errno=$J['code'];$this->_conn->error=$J['err'];$this->_conn->last_id=$P['_id'];return!$J['err'];}catch(Exception$Zb){$this->_conn->error=$Zb->getMessage();return
false;}}}function
get_databases($uc){global$g;$J=array();$yb=$g->_link->listDBs();foreach($yb['databases']as$l)$J[]=$l['name'];return$J;}function
count_tables($k){global$g;$J=array();foreach($k
as$l)$J[$l]=count($g->_link->selectDB($l)->getCollectionNames(true));return$J;}function
tables_list(){global$g;return
array_fill_keys($g->_db->getCollectionNames(true),'table');}function
drop_databases($k){global$g;foreach($k
as$l){$hf=$g->_link->selectDB($l)->drop();if(!$hf['ok'])return
false;}return
true;}function
indexes($R,$h=null){global$g;$J=array();foreach($g->_db->selectCollection($R)->getIndexInfo()as$u){$Db=array();foreach($u["key"]as$e=>$U)$Db[]=($U==-1?'1':null);$J[$u["name"]]=array("type"=>($u["name"]=="_id_"?"PRIMARY":($u["unique"]?"UNIQUE":"INDEX")),"columns"=>array_keys($u["key"]),"lengths"=>array(),"descs"=>$Db,);}return$J;}function
fields($R){return
fields_from_edit();}function
found_rows($S,$Z){global$g;return$g->_db->selectCollection($_GET["select"])->count($Z);}$qe=array("=");}elseif(class_exists('MongoDB\Driver\Manager')){class
Min_DB{var$extension="MongoDB",$server_info=MONGODB_VERSION,$error,$last_id;var$_link;var$_db,$_db_name;function
connect($Lg,$B){$ab='MongoDB\Driver\Manager';return
new$ab($Lg,$B);}function
query($G){return
false;}function
select_db($j){$this->_db_name=$j;return
true;}function
quote($Q){return$Q;}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0,$_charset=array();function
__construct($I){foreach($I
as$qd){$K=array();foreach($qd
as$x=>$X){if(is_a($X,'MongoDB\BSON\Binary'))$this->_charset[$x]=63;$K[$x]=(is_a($X,'MongoDB\BSON\ObjectID')?'MongoDB\BSON\ObjectID("'.strval($X).'")':(is_a($X,'MongoDB\BSON\UTCDatetime')?$X->toDateTime()->format('Y-m-d H:i:s'):(is_a($X,'MongoDB\BSON\Binary')?$X->bin:(is_a($X,'MongoDB\BSON\Regex')?strval($X):(is_object($X)?json_encode($X,256):$X)))));}$this->_rows[]=$K;foreach($K
as$x=>$X){if(!isset($this->_rows[0][$x]))$this->_rows[0][$x]=null;}}$this->num_rows=$I->count;}function
fetch_assoc(){$K=current($this->_rows);if(!$K)return$K;$J=array();foreach($this->_rows[0]as$x=>$X)$J[$x]=$K[$x];next($this->_rows);return$J;}function
fetch_row(){$J=$this->fetch_assoc();if(!$J)return$J;return
array_values($J);}function
fetch_field(){$vd=array_keys($this->_rows[0]);$A=$vd[$this->_offset++];return(object)array('name'=>$A,'charsetnr'=>$this->_charset[$A],);}}class
Min_Driver
extends
Min_SQL{public$Me="_id";function
select($R,$M,$Z,$Gc,$C=array(),$y=1,$D=0,$Oe=false){global$g;$M=($M==array("*")?array():array_fill_keys($M,1));if(count($M)&&!isset($M['_id']))$M['_id']=0;$Z=where_to_query($Z);$Hf=array();foreach($C
as$X){$X=preg_replace('~ DESC$~','',$X,1,$qb);$Hf[$X]=($qb?-1:1);}if(isset($_GET['limit'])&&is_numeric($_GET['limit'])&&$_GET['limit']>0)$y=$_GET['limit'];$y=min(200,max(1,(int)$y));$Ef=$D*$y;$ab='MongoDB\Driver\Query';$G=new$ab($Z,array('projection'=>$M,'limit'=>$y,'skip'=>$Ef,'sort'=>$Hf));$kf=$g->_link->executeQuery("$g->_db_name.$R",$G);return
new
Min_Result($kf);}function
update($R,$P,$H,$y=0,$N="\n"){global$g;$l=$g->_db_name;$Z=sql_query_where_parser($H);$ab='MongoDB\Driver\BulkWrite';$Sa=new$ab(array());if(isset($P['_id']))unset($P['_id']);$df=array();foreach($P
as$x=>$Y){if($Y=='NULL'){$df[$x]=1;unset($P[$x]);}}$Kg=array('$set'=>$P);if(count($df))$Kg['$unset']=$df;$Sa->update($Z,$Kg,array('upsert'=>false));$kf=$g->_link->executeBulkWrite("$l.$R",$Sa);$g->affected_rows=$kf->getModifiedCount();return
true;}function
delete($R,$H,$y=0){global$g;$l=$g->_db_name;$Z=sql_query_where_parser($H);$ab='MongoDB\Driver\BulkWrite';$Sa=new$ab(array());$Sa->delete($Z,array('limit'=>$y));$kf=$g->_link->executeBulkWrite("$l.$R",$Sa);$g->affected_rows=$kf->getDeletedCount();return
true;}function
insert($R,$P){global$g;$l=$g->_db_name;$ab='MongoDB\Driver\BulkWrite';$Sa=new$ab(array());if(isset($P['_id'])&&empty($P['_id']))unset($P['_id']);$Sa->insert($P);$kf=$g->_link->executeBulkWrite("$l.$R",$Sa);$g->affected_rows=$kf->getInsertedCount();return
true;}}function
get_databases($uc){global$g;$J=array();$ab='MongoDB\Driver\Command';$hb=new$ab(array('listDatabases'=>1));$kf=$g->_link->executeCommand('admin',$hb);foreach($kf
as$yb){foreach($yb->databases
as$l)$J[]=$l->name;}return$J;}function
count_tables($k){$J=array();return$J;}function
tables_list(){global$g;$ab='MongoDB\Driver\Command';$hb=new$ab(array('listCollections'=>1));$kf=$g->_link->executeCommand($g->_db_name,$hb);$fb=array();foreach($kf
as$I)$fb[$I->name]='table';return$fb;}function
drop_databases($k){return
false;}function
indexes($R,$h=null){global$g;$J=array();$ab='MongoDB\Driver\Command';$hb=new$ab(array('listIndexes'=>$R));$kf=$g->_link->executeCommand($g->_db_name,$hb);foreach($kf
as$u){$Db=array();$f=array();foreach(get_object_vars($u->key)as$e=>$U){$Db[]=($U==-1?'1':null);$f[]=$e;}$J[$u->name]=array("type"=>($u->name=="_id_"?"PRIMARY":(isset($u->unique)?"UNIQUE":"INDEX")),"columns"=>$f,"lengths"=>array(),"descs"=>$Db,);}return$J;}function
fields($R){$p=fields_from_edit();if(!count($p)){global$m;$I=$m->select($R,array("*"),null,null,array(),10);while($K=$I->fetch_assoc()){foreach($K
as$x=>$X){$K[$x]=null;$p[$x]=array("field"=>$x,"type"=>"string","null"=>($x!=$m->primary),"auto_increment"=>($x==$m->primary),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1,),);}}}return$p;}function
found_rows($S,$Z){global$g;$Z=where_to_query($Z);$ab='MongoDB\Driver\Command';$hb=new$ab(array('count'=>$S['Name'],'query'=>$Z));$kf=$g->_link->executeCommand($g->_db_name,$hb);$qg=$kf->toArray();return$qg[0]->n;}function
sql_query_where_parser($H){$H=trim(preg_replace('/WHERE[\s]?[(]?\(?/','',$H));$H=preg_replace('/\)\)\)$/',')',$H);$eh=explode(' AND ',$H);$fh=explode(') OR (',$H);$Z=array();foreach($eh
as$ch)$Z[]=trim($ch);if(count($fh)==1)$fh=array();elseif(count($fh)>1)$Z=array();return
where_to_query($Z,$fh);}function
where_to_query($ah=array(),$bh=array()){global$b;$wb=array();foreach(array('and'=>$ah,'or'=>$bh)as$U=>$Z){if(is_array($Z)){foreach($Z
as$dc){list($db,$oe,$X)=explode(" ",$dc,3);if($db=="_id"){$X=str_replace('MongoDB\BSON\ObjectID("',"",$X);$X=str_replace('")',"",$X);$ab='MongoDB\BSON\ObjectID';$X=new$ab($X);}if(!in_array($oe,$b->operators))continue;if(preg_match('~^\(f\)(.+)~',$oe,$_)){$X=(float)$X;$oe=$_[1];}elseif(preg_match('~^\(date\)(.+)~',$oe,$_)){$xb=new
DateTime($X);$ab='MongoDB\BSON\UTCDatetime';$X=new$ab($xb->getTimestamp()*1000);$oe=$_[1];}switch($oe){case'=':$oe='$eq';break;case'!=':$oe='$ne';break;case'>':$oe='$gt';break;case'<':$oe='$lt';break;case'>=':$oe='$gte';break;case'<=':$oe='$lte';break;case'regex':$oe='$regex';break;default:continue
2;}if($U=='and')$wb['$and'][]=array($db=>array($oe=>$X));elseif($U=='or')$wb['$or'][]=array($db=>array($oe=>$X));}}}return$wb;}$qe=array("=","!=",">","<",">=","<=","regex","(f)=","(f)!=","(f)>","(f)<","(f)>=","(f)<=","(date)=","(date)!=","(date)>","(date)<","(date)>=","(date)<=",);}function
table($t){return$t;}function
idf_escape($t){return$t;}function
table_status($A="",$jc=false){$J=array();foreach(tables_list()as$R=>$U){$J[$R]=array("Name"=>$R);if($A==$R)return$J[$R];}return$J;}function
create_database($l,$d){return
true;}function
last_id(){global$g;return$g->last_id;}function
error(){global$g;return
h($g->error);}function
collations(){return
array();}function
logged_user(){global$b;$i=$b->credentials();return$i[1];}function
connect(){global$b;$g=new
Min_DB;list($O,$V,$F)=$b->credentials();$B=array();if($V.$F!=""){$B["username"]=$V;$B["password"]=$F;}$l=$b->database();if($l!="")$B["db"]=$l;if(($Ea=getenv("MONGO_AUTH_SOURCE")))$B["authSource"]=$Ea;try{$g->_link=$g->connect("mongodb://$O",$B);if($F!=""){$B["password"]="";try{$g->connect("mongodb://$O",$B);return'Database does not support password.';}catch(Exception$Zb){}}return$g;}catch(Exception$Zb){return$Zb->getMessage();}}function
alter_indexes($R,$c){global$g;foreach($c
as$X){list($U,$A,$P)=$X;if($P=="DROP")$J=$g->_db->command(array("deleteIndexes"=>$R,"index"=>$A));else{$f=array();foreach($P
as$e){$e=preg_replace('~ DESC$~','',$e,1,$qb);$f[$e]=($qb?-1:1);}$J=$g->_db->selectCollection($R)->ensureIndex($f,array("unique"=>($U=="UNIQUE"),"name"=>$A,));}if($J['errmsg']){$g->error=$J['errmsg'];return
false;}}return
true;}function
support($kc){return
preg_match("~database|indexes|descidx~",$kc);}function
db_collation($l,$eb){}function
information_schema(){}function
is_view($S){}function
convert_field($o){}function
unconvert_field($o,$J){return$J;}function
foreign_keys($R){return
array();}function
fk_support($S){}function
engines(){return
array();}function
alter_table($R,$A,$p,$wc,$ib,$Ub,$d,$Fa,$Be){global$g;if($R==""){$g->_db->createCollection($A);return
true;}}function
drop_tables($T){global$g;foreach($T
as$R){$hf=$g->_db->selectCollection($R)->drop();if(!$hf['ok'])return
false;}return
true;}function
truncate_tables($T){global$g;foreach($T
as$R){$hf=$g->_db->selectCollection($R)->remove();if(!$hf['ok'])return
false;}return
true;}$w="mongo";$Fc=array();$Jc=array();$Nb=array(array("json"));}$Ib["elastic"]="Elasticsearch (beta)";if(isset($_GET["elastic"])){$Ke=array("json + allow_url_fopen");define("DRIVER","elastic");if(function_exists('json_decode')&&ini_bool('allow_url_fopen')){class
Min_DB{var$extension="JSON",$server_info,$errno,$error,$_url;function
rootQuery($De,$ob=array(),$Wd='GET'){@ini_set('track_errors',1);$nc=@file_get_contents("$this->_url/".ltrim($De,'/'),false,stream_context_create(array('http'=>array('method'=>$Wd,'content'=>$ob===null?$ob:json_encode($ob),'header'=>'Content-Type: application/json','ignore_errors'=>1,))));if(!$nc){$this->error=$php_errormsg;return$nc;}if(!preg_match('~^HTTP/[0-9.]+ 2~i',$http_response_header[0])){$this->error=$nc;return
false;}$J=json_decode($nc,true);if($J===null){$this->errno=json_last_error();if(function_exists('json_last_error_msg'))$this->error=json_last_error_msg();else{$nb=get_defined_constants(true);foreach($nb['json']as$A=>$Y){if($Y==$this->errno&&preg_match('~^JSON_ERROR_~',$A)){$this->error=$A;break;}}}}return$J;}function
query($De,$ob=array(),$Wd='GET'){return$this->rootQuery(($this->_db!=""?"$this->_db/":"/").ltrim($De,'/'),$ob,$Wd);}function
connect($O,$V,$F){preg_match('~^(https?://)?(.*)~',$O,$_);$this->_url=($_[1]?$_[1]:"http://")."$V:$F@$_[2]";$J=$this->query('');if($J)$this->server_info=$J['version']['number'];return(bool)$J;}function
select_db($j){$this->_db=$j;return
true;}function
quote($Q){return$Q;}}class
Min_Result{var$num_rows,$_rows;function
__construct($L){$this->num_rows=count($L);$this->_rows=$L;reset($this->_rows);}function
fetch_assoc(){$J=current($this->_rows);next($this->_rows);return$J;}function
fetch_row(){return
array_values($this->fetch_assoc());}}}class
Min_Driver
extends
Min_SQL{function
select($R,$M,$Z,$Gc,$C=array(),$y=1,$D=0,$Oe=false){global$b;$wb=array();$G="$R/_search";if($M!=array("*"))$wb["fields"]=$M;if($C){$Hf=array();foreach($C
as$db){$db=preg_replace('~ DESC$~','',$db,1,$qb);$Hf[]=($qb?array($db=>"desc"):$db);}$wb["sort"]=$Hf;}if($y){$wb["size"]=+$y;if($D)$wb["from"]=($D*$y);}foreach($Z
as$X){list($db,$oe,$X)=explode(" ",$X,3);if($db=="_id")$wb["query"]["ids"]["values"][]=$X;elseif($db.$X!=""){$eg=array("term"=>array(($db!=""?$db:"_all")=>$X));if($oe=="=")$wb["query"]["filtered"]["filter"]["and"][]=$eg;else$wb["query"]["filtered"]["query"]["bool"]["must"][]=$eg;}}if($wb["query"]&&!$wb["query"]["filtered"]["query"]&&!$wb["query"]["ids"])$wb["query"]["filtered"]["query"]=array("match_all"=>array());$Of=microtime(true);$rf=$this->_conn->query($G,$wb);if($Oe)echo$b->selectQuery("$G: ".json_encode($wb),$Of,!$rf);if(!$rf)return
false;$J=array();foreach($rf['hits']['hits']as$Sc){$K=array();if($M==array("*"))$K["_id"]=$Sc["_id"];$p=$Sc['_source'];if($M!=array("*")){$p=array();foreach($M
as$x)$p[$x]=$Sc['fields'][$x];}foreach($p
as$x=>$X){if($wb["fields"])$X=$X[0];$K[$x]=(is_array($X)?json_encode($X):$X);}$J[]=$K;}return
new
Min_Result($J);}function
update($U,$Ze,$H,$y=0,$N="\n"){$Ce=preg_split('~ *= *~',$H);if(count($Ce)==2){$s=trim($Ce[1]);$G="$U/$s";return$this->_conn->query($G,$Ze,'POST');}return
false;}function
insert($U,$Ze){$s="";$G="$U/$s";$hf=$this->_conn->query($G,$Ze,'POST');$this->_conn->last_id=$hf['_id'];return$hf['created'];}function
delete($U,$H,$y=0){$Xc=array();if(is_array($_GET["where"])&&$_GET["where"]["_id"])$Xc[]=$_GET["where"]["_id"];if(is_array($_POST['check'])){foreach($_POST['check']as$Ua){$Ce=preg_split('~ *= *~',$Ua);if(count($Ce)==2)$Xc[]=trim($Ce[1]);}}$this->_conn->affected_rows=0;foreach($Xc
as$s){$G="{$U}/{$s}";$hf=$this->_conn->query($G,'{}','DELETE');if(is_array($hf)&&$hf['found']==true)$this->_conn->affected_rows++;}return$this->_conn->affected_rows;}}function
connect(){global$b;$g=new
Min_DB;list($O,$V,$F)=$b->credentials();if($F!=""&&$g->connect($O,$V,""))return'Database does not support password.';if($g->connect($O,$V,$F))return$g;return$g->error;}function
support($kc){return
preg_match("~database|table|columns~",$kc);}function
logged_user(){global$b;$i=$b->credentials();return$i[1];}function
get_databases(){global$g;$J=$g->rootQuery('_aliases');if($J){$J=array_keys($J);sort($J,SORT_STRING);}return$J;}function
collations(){return
array();}function
db_collation($l,$eb){}function
engines(){return
array();}function
count_tables($k){global$g;$J=array();$I=$g->query('_stats');if($I&&$I['indices']){$dd=$I['indices'];foreach($dd
as$cd=>$Pf){$bd=$Pf['total']['indexing'];$J[$cd]=$bd['index_total'];}}return$J;}function
tables_list(){global$g;$J=$g->query('_mapping');if($J)$J=array_fill_keys(array_keys($J[$g->_db]["mappings"]),'table');return$J;}function
table_status($A="",$jc=false){global$g;$rf=$g->query("_search",array("size"=>0,"aggregations"=>array("count_by_type"=>array("terms"=>array("field"=>"_type")))),"POST");$J=array();if($rf){$T=$rf["aggregations"]["count_by_type"]["buckets"];foreach($T
as$R){$J[$R["key"]]=array("Name"=>$R["key"],"Engine"=>"table","Rows"=>$R["doc_count"],);if($A!=""&&$A==$R["key"])return$J[$A];}}return$J;}function
error(){global$g;return
h($g->error);}function
information_schema(){}function
is_view($S){}function
indexes($R,$h=null){return
array(array("type"=>"PRIMARY","columns"=>array("_id")),);}function
fields($R){global$g;$I=$g->query("$R/_mapping");$J=array();if($I){$Jd=$I[$R]['properties'];if(!$Jd)$Jd=$I[$g->_db]['mappings'][$R]['properties'];if($Jd){foreach($Jd
as$A=>$o){$J[$A]=array("field"=>$A,"full_type"=>$o["type"],"type"=>$o["type"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);if($o["properties"]){unset($J[$A]["privileges"]["insert"]);unset($J[$A]["privileges"]["update"]);}}}}return$J;}function
foreign_keys($R){return
array();}function
table($t){return$t;}function
idf_escape($t){return$t;}function
convert_field($o){}function
unconvert_field($o,$J){return$J;}function
fk_support($S){}function
found_rows($S,$Z){return
null;}function
create_database($l){global$g;return$g->rootQuery(urlencode($l),null,'PUT');}function
drop_databases($k){global$g;return$g->rootQuery(urlencode(implode(',',$k)),array(),'DELETE');}function
alter_table($R,$A,$p,$wc,$ib,$Ub,$d,$Fa,$Be){global$g;$Re=array();foreach($p
as$hc){$lc=trim($hc[1][0]);$mc=trim($hc[1][1]?$hc[1][1]:"text");$Re[$lc]=array('type'=>$mc);}if(!empty($Re))$Re=array('properties'=>$Re);return$g->query("_mapping/{$A}",$Re,'PUT');}function
drop_tables($T){global$g;$J=true;foreach($T
as$R)$J=$J&&$g->query(urlencode($R),array(),'DELETE');return$J;}function
last_id(){global$g;return$g->last_id;}$w="elastic";$qe=array("=","query");$Fc=array();$Jc=array();$Nb=array(array("json"));$Cg=array();$Sf=array();foreach(array('Numbers'=>array("long"=>3,"integer"=>5,"short"=>8,"byte"=>10,"double"=>20,"float"=>66,"half_float"=>12,"scaled_float"=>21),'Date and time'=>array("date"=>10),'Strings'=>array("string"=>65535,"text"=>65535),'Binary'=>array("binary"=>255),)as$x=>$X){$Cg+=$X;$Sf[$x]=array_keys($X);}}$Ib["clickhouse"]="ClickHouse (alpha)";if(isset($_GET["clickhouse"])){define("DRIVER","clickhouse");class
Min_DB{var$extension="JSON",$server_info,$errno,$_result,$error,$_url;var$_db='default';function
rootQuery($l,$G){@ini_set('track_errors',1);$nc=@file_get_contents("$this->_url/?database=$l",false,stream_context_create(array('http'=>array('method'=>'POST','content'=>$this->isQuerySelectLike($G)?"$G FORMAT JSONCompact":$G,'header'=>'Content-type: application/x-www-form-urlencoded','ignore_errors'=>1,))));if($nc===false){$this->error=$php_errormsg;return$nc;}if(!preg_match('~^HTTP/[0-9.]+ 2~i',$http_response_header[0])){$this->error=$nc;return
false;}$J=json_decode($nc,true);if($J===null){if(!$this->isQuerySelectLike($G)&&$nc==='')return
true;$this->errno=json_last_error();if(function_exists('json_last_error_msg'))$this->error=json_last_error_msg();else{$nb=get_defined_constants(true);foreach($nb['json']as$A=>$Y){if($Y==$this->errno&&preg_match('~^JSON_ERROR_~',$A)){$this->error=$A;break;}}}}return
new
Min_Result($J);}function
isQuerySelectLike($G){return(bool)preg_match('~^(select|show)~i',$G);}function
query($G){return$this->rootQuery($this->_db,$G);}function
connect($O,$V,$F){preg_match('~^(https?://)?(.*)~',$O,$_);$this->_url=($_[1]?$_[1]:"http://")."$V:$F@$_[2]";$J=$this->query('SELECT 1');return(bool)$J;}function
select_db($j){$this->_db=$j;return
true;}function
quote($Q){return"'".addcslashes($Q,"\\'")."'";}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($G,$o=0){$I=$this->query($G);return$I['data'];}}class
Min_Result{var$num_rows,$_rows,$columns,$meta,$_offset=0;function
__construct($I){$this->num_rows=$I['rows'];$this->_rows=$I['data'];$this->meta=$I['meta'];$this->columns=array_column($this->meta,'name');reset($this->_rows);}function
fetch_assoc(){$K=current($this->_rows);next($this->_rows);return$K===false?false:array_combine($this->columns,$K);}function
fetch_row(){$K=current($this->_rows);next($this->_rows);return$K;}function
fetch_field(){$e=$this->_offset++;$J=new
stdClass;if($e<count($this->columns)){$J->name=$this->meta[$e]['name'];$J->orgname=$J->name;$J->type=$this->meta[$e]['type'];}return$J;}}class
Min_Driver
extends
Min_SQL{function
delete($R,$H,$y=0){if($H==='')$H='WHERE 1=1';return
queries("ALTER TABLE ".table($R)." DELETE $H");}function
update($R,$P,$H,$y=0,$N="\n"){$Sg=array();foreach($P
as$x=>$X)$Sg[]="$x = $X";$G=$N.implode(",$N",$Sg);return
queries("ALTER TABLE ".table($R)." UPDATE $G$H");}}function
idf_escape($t){return"`".str_replace("`","``",$t)."`";}function
table($t){return
idf_escape($t);}function
explain($g,$G){return'';}function
found_rows($S,$Z){$L=get_vals("SELECT COUNT(*) FROM ".idf_escape($S["Name"]).($Z?" WHERE ".implode(" AND ",$Z):""));return
empty($L)?false:$L[0];}function
alter_table($R,$A,$p,$wc,$ib,$Ub,$d,$Fa,$Be){$c=$C=array();foreach($p
as$o){if($o[1][2]===" NULL")$o[1][1]=" Nullable({$o[1][1]})";elseif($o[1][2]===' NOT NULL')$o[1][2]='';if($o[1][3])$o[1][3]='';$c[]=($o[1]?($R!=""?($o[0]!=""?"MODIFY COLUMN ":"ADD COLUMN "):" ").implode($o[1]):"DROP COLUMN ".idf_escape($o[0]));$C[]=$o[1][0];}$c=array_merge($c,$wc);$Qf=($Ub?" ENGINE ".$Ub:"");if($R=="")return
queries("CREATE TABLE ".table($A)." (\n".implode(",\n",$c)."\n)$Qf$Be".' ORDER BY ('.implode(',',$C).')');if($R!=$A){$I=queries("RENAME TABLE ".table($R)." TO ".table($A));if($c)$R=$A;else
return$I;}if($Qf)$c[]=ltrim($Qf);return($c||$Be?queries("ALTER TABLE ".table($R)."\n".implode(",\n",$c).$Be):true);}function
truncate_tables($T){return
apply_queries("TRUNCATE TABLE",$T);}function
drop_views($Wg){return
drop_tables($Wg);}function
drop_tables($T){return
apply_queries("DROP TABLE",$T);}function
connect(){global$b;$g=new
Min_DB;$i=$b->credentials();if($g->connect($i[0],$i[1],$i[2]))return$g;return$g->error;}function
get_databases($uc){global$g;$I=get_rows('SHOW DATABASES');$J=array();foreach($I
as$K)$J[]=$K['name'];sort($J);return$J;}function
limit($G,$Z,$y,$je=0,$N=" "){return" $G$Z".($y!==null?$N."LIMIT $y".($je?", $je":""):"");}function
limit1($R,$G,$Z,$N="\n"){return
limit($G,$Z,1,0,$N);}function
db_collation($l,$eb){}function
engines(){return
array('MergeTree');}function
logged_user(){global$b;$i=$b->credentials();return$i[1];}function
tables_list(){$I=get_rows('SHOW TABLES');$J=array();foreach($I
as$K)$J[$K['name']]='table';ksort($J);return$J;}function
count_tables($k){return
array();}function
table_status($A="",$jc=false){global$g;$J=array();$T=get_rows("SELECT name, engine FROM system.tables WHERE database = ".q($g->_db));foreach($T
as$R){$J[$R['name']]=array('Name'=>$R['name'],'Engine'=>$R['engine'],);if($A===$R['name'])return$J[$R['name']];}return$J;}function
is_view($S){return
false;}function
fk_support($S){return
false;}function
convert_field($o){}function
unconvert_field($o,$J){if(in_array($o['type'],array("Int8","Int16","Int32","Int64","UInt8","UInt16","UInt32","UInt64","Float32","Float64")))return"to$o[type]($J)";return$J;}function
fields($R){$J=array();$I=get_rows("SELECT name, type, default_expression FROM system.columns WHERE ".idf_escape('table')." = ".q($R));foreach($I
as$K){$U=trim($K['type']);$fe=strpos($U,'Nullable(')===0;$J[trim($K['name'])]=array("field"=>trim($K['name']),"full_type"=>$U,"type"=>$U,"default"=>trim($K['default_expression']),"null"=>$fe,"auto_increment"=>'0',"privileges"=>array("insert"=>1,"select"=>1,"update"=>0),);}return$J;}function
indexes($R,$h=null){return
array();}function
foreign_keys($R){return
array();}function
collations(){return
array();}function
information_schema($l){return
false;}function
error(){global$g;return
h($g->error);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($pf){return
true;}function
auto_increment(){return'';}function
last_id(){return
0;}function
support($kc){return
preg_match("~^(columns|sql|status|table|drop_col)$~",$kc);}$w="clickhouse";$Cg=array();$Sf=array();foreach(array('Numbers'=>array("Int8"=>3,"Int16"=>5,"Int32"=>10,"Int64"=>19,"UInt8"=>3,"UInt16"=>5,"UInt32"=>10,"UInt64"=>20,"Float32"=>7,"Float64"=>16,'Decimal'=>38,'Decimal32'=>9,'Decimal64'=>18,'Decimal128'=>38),'Date and time'=>array("Date"=>13,"DateTime"=>20),'Strings'=>array("String"=>0),'Binary'=>array("FixedString"=>0),)as$x=>$X){$Cg+=$X;$Sf[$x]=array_keys($X);}$Jg=array();$qe=array("=","<",">","<=",">=","!=","~","!~","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL","SQL");$Fc=array();$Jc=array("avg","count","count distinct","max","min","sum");$Nb=array();}$Ib=array("server"=>"MySQL")+$Ib;if(!defined("DRIVER")){$Ke=array("MySQLi","MySQL","PDO_MySQL");define("DRIVER","server");if(extension_loaded("mysqli")){class
Min_DB
extends
MySQLi{var$extension="MySQLi";function
__construct(){parent::init();}function
connect($O="",$V="",$F="",$j=null,$Ie=null,$Gf=null){global$b;mysqli_report(MYSQLI_REPORT_OFF);list($Tc,$Ie)=explode(":",$O,2);$Nf=$b->connectSsl();if($Nf)$this->ssl_set($Nf['key'],$Nf['cert'],$Nf['ca'],'','');$J=@$this->real_connect(($O!=""?$Tc:ini_get("mysqli.default_host")),($O.$V!=""?$V:ini_get("mysqli.default_user")),($O.$V.$F!=""?$F:ini_get("mysqli.default_pw")),$j,(is_numeric($Ie)?$Ie:ini_get("mysqli.default_port")),(!is_numeric($Ie)?$Ie:$Gf),($Nf?64:0));$this->options(MYSQLI_OPT_LOCAL_INFILE,false);return$J;}function
set_charset($Ta){if(parent::set_charset($Ta))return
true;parent::set_charset('utf8');return$this->query("SET NAMES $Ta");}function
result($G,$o=0){$I=$this->query($G);if(!$I)return
false;$K=$I->fetch_array();return$K[$o];}function
quote($Q){return"'".$this->escape_string($Q)."'";}}}elseif(extension_loaded("mysql")&&!((ini_bool("sql.safe_mode")||ini_bool("mysql.allow_local_infile"))&&extension_loaded("pdo_mysql"))){class
Min_DB{var$extension="MySQL",$server_info,$affected_rows,$errno,$error,$_link,$_result;function
connect($O,$V,$F){if(ini_bool("mysql.allow_local_infile")){$this->error=sprintf('Disable %s or enable %s or %s extensions.',"'mysql.allow_local_infile'","MySQLi","PDO_MySQL");return
false;}$this->_link=@mysql_connect(($O!=""?$O:ini_get("mysql.default_host")),("$O$V"!=""?$V:ini_get("mysql.default_user")),("$O$V$F"!=""?$F:ini_get("mysql.default_password")),true,131072);if($this->_link)$this->server_info=mysql_get_server_info($this->_link);else$this->error=mysql_error();return(bool)$this->_link;}function
set_charset($Ta){if(function_exists('mysql_set_charset')){if(mysql_set_charset($Ta,$this->_link))return
true;mysql_set_charset('utf8',$this->_link);}return$this->query("SET NAMES $Ta");}function
quote($Q){return"'".mysql_real_escape_string($Q,$this->_link)."'";}function
select_db($j){return
mysql_select_db($j,$this->_link);}function
query($G,$Dg=false){$I=@($Dg?mysql_unbuffered_query($G,$this->_link):mysql_query($G,$this->_link));$this->error="";if(!$I){$this->errno=mysql_errno($this->_link);$this->error=mysql_error($this->_link);return
false;}if($I===true){$this->affected_rows=mysql_affected_rows($this->_link);$this->info=mysql_info($this->_link);return
true;}return
new
Min_Result($I);}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($G,$o=0){$I=$this->query($G);if(!$I||!$I->num_rows)return
false;return
mysql_result($I->_result,0,$o);}}class
Min_Result{var$num_rows,$_result,$_offset=0;function
__construct($I){$this->_result=$I;$this->num_rows=mysql_num_rows($I);}function
fetch_assoc(){return
mysql_fetch_assoc($this->_result);}function
fetch_row(){return
mysql_fetch_row($this->_result);}function
fetch_field(){$J=mysql_fetch_field($this->_result,$this->_offset++);$J->orgtable=$J->table;$J->orgname=$J->name;$J->charsetnr=($J->blob?63:0);return$J;}function
__destruct(){mysql_free_result($this->_result);}}}elseif(extension_loaded("pdo_mysql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_MySQL";function
connect($O,$V,$F){global$b;$B=array(PDO::MYSQL_ATTR_LOCAL_INFILE=>false);$Nf=$b->connectSsl();if($Nf){if(!empty($Nf['key']))$B[PDO::MYSQL_ATTR_SSL_KEY]=$Nf['key'];if(!empty($Nf['cert']))$B[PDO::MYSQL_ATTR_SSL_CERT]=$Nf['cert'];if(!empty($Nf['ca']))$B[PDO::MYSQL_ATTR_SSL_CA]=$Nf['ca'];}$this->dsn("mysql:charset=utf8;host=".str_replace(":",";unix_socket=",preg_replace('~:(\d)~',';port=\1',$O)),$V,$F,$B);return
true;}function
set_charset($Ta){$this->query("SET NAMES $Ta");}function
select_db($j){return$this->query("USE ".idf_escape($j));}function
query($G,$Dg=false){$this->pdo->setAttribute(1000,!$Dg);return
parent::query($G,$Dg);}}}class
Min_Driver
extends
Min_SQL{function
insert($R,$P){return($P?parent::insert($R,$P):queries("INSERT INTO ".table($R)." ()\nVALUES ()"));}function
insertUpdate($R,$L,$Me){$f=array_keys(reset($L));$Le="INSERT INTO ".table($R)." (".implode(", ",$f).") VALUES\n";$Sg=array();foreach($f
as$x)$Sg[$x]="$x = VALUES($x)";$Vf="\nON DUPLICATE KEY UPDATE ".implode(", ",$Sg);$Sg=array();$Cd=0;foreach($L
as$P){$Y="(".implode(", ",$P).")";if($Sg&&(strlen($Le)+$Cd+strlen($Y)+strlen($Vf)>1e6)){if(!queries($Le.implode(",\n",$Sg).$Vf))return
false;$Sg=array();$Cd=0;}$Sg[]=$Y;$Cd+=strlen($Y)+2;}return
queries($Le.implode(",\n",$Sg).$Vf);}function
slowQuery($G,$jg){if(min_version('5.7.8','10.1.2')){if(preg_match('~MariaDB~',$this->_conn->server_info))return"SET STATEMENT max_statement_time=$jg FOR $G";elseif(preg_match('~^(SELECT\b)(.+)~is',$G,$_))return"$_[1] /*+ MAX_EXECUTION_TIME(".($jg*1000).") */ $_[2]";}}function
convertSearch($t,$X,$o){return(preg_match('~char|text|enum|set~',$o["type"])&&!preg_match("~^utf8~",$o["collation"])&&preg_match('~[\x80-\xFF]~',$X['val'])?"CONVERT($t USING ".charset($this->_conn).")":$t);}function
warnings(){$I=$this->_conn->query("SHOW WARNINGS");if($I&&$I->num_rows){ob_start();select($I);return
ob_get_clean();}}function
tableHelp($A){$Kd=preg_match('~MariaDB~',$this->_conn->server_info);if(information_schema(DB))return
strtolower(($Kd?"information-schema-$A-table/":str_replace("_","-",$A)."-table.html"));if(DB=="mysql")return($Kd?"mysql$A-table/":"system-database.html");}}function
idf_escape($t){return"`".str_replace("`","``",$t)."`";}function
table($t){return
idf_escape($t);}function
connect(){global$b,$Cg,$Sf;$g=new
Min_DB;$i=$b->credentials();if($g->connect($i[0],$i[1],$i[2])){$g->set_charset(charset($g));$g->query("SET sql_quote_show_create = 1, autocommit = 1");if(min_version('5.7.8',10.2,$g)){$Sf['Strings'][]="json";$Cg["json"]=4294967295;}return$g;}$J=$g->error;if(function_exists('iconv')&&!is_utf8($J)&&strlen($of=iconv("windows-1250","utf-8",$J))>strlen($J))$J=$of;return$J;}function
get_databases($uc){$J=get_session("dbs");if($J===null){$G=(min_version(5)?"SELECT SCHEMA_NAME FROM information_schema.SCHEMATA ORDER BY SCHEMA_NAME":"SHOW DATABASES");$J=($uc?slow_query($G):get_vals($G));restart_session();set_session("dbs",$J);stop_session();}return$J;}function
limit($G,$Z,$y,$je=0,$N=" "){return" $G$Z".($y!==null?$N."LIMIT $y".($je?" OFFSET $je":""):"");}function
limit1($R,$G,$Z,$N="\n"){return
limit($G,$Z,1,0,$N);}function
db_collation($l,$eb){global$g;$J=null;$rb=$g->result("SHOW CREATE DATABASE ".idf_escape($l),1);if(preg_match('~ COLLATE ([^ ]+)~',$rb,$_))$J=$_[1];elseif(preg_match('~ CHARACTER SET ([^ ]+)~',$rb,$_))$J=$eb[$_[1]][-1];return$J;}function
engines(){$J=array();foreach(get_rows("SHOW ENGINES")as$K){if(preg_match("~YES|DEFAULT~",$K["Support"]))$J[]=$K["Engine"];}return$J;}function
logged_user(){global$g;return$g->result("SELECT USER()");}function
tables_list(){return
get_key_vals(min_version(5)?"SELECT TABLE_NAME, TABLE_TYPE FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ORDER BY TABLE_NAME":"SHOW TABLES");}function
count_tables($k){$J=array();foreach($k
as$l)$J[$l]=count(get_vals("SHOW TABLES IN ".idf_escape($l)));return$J;}function
table_status($A="",$jc=false){$J=array();foreach(get_rows($jc&&min_version(5)?"SELECT TABLE_NAME AS Name, ENGINE AS Engine, TABLE_COMMENT AS Comment FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ".($A!=""?"AND TABLE_NAME = ".q($A):"ORDER BY Name"):"SHOW TABLE STATUS".($A!=""?" LIKE ".q(addcslashes($A,"%_\\")):""))as$K){if($K["Engine"]=="InnoDB")$K["Comment"]=preg_replace('~(?:(.+); )?InnoDB free: .*~','\1',$K["Comment"]);if(!isset($K["Engine"]))$K["Comment"]="";if($A!="")return$K;$J[$K["Name"]]=$K;}return$J;}function
is_view($S){return$S["Engine"]===null;}function
fk_support($S){return
preg_match('~InnoDB|IBMDB2I~i',$S["Engine"])||(preg_match('~NDB~i',$S["Engine"])&&min_version(5.6));}function
fields($R){$J=array();foreach(get_rows("SHOW FULL COLUMNS FROM ".table($R))as$K){preg_match('~^([^( ]+)(?:\((.+)\))?( unsigned)?( zerofill)?$~',$K["Type"],$_);$J[$K["Field"]]=array("field"=>$K["Field"],"full_type"=>$K["Type"],"type"=>$_[1],"length"=>$_[2],"unsigned"=>ltrim($_[3].$_[4]),"default"=>($K["Default"]!=""||preg_match("~char|set~",$_[1])?$K["Default"]:null),"null"=>($K["Null"]=="YES"),"auto_increment"=>($K["Extra"]=="auto_increment"),"on_update"=>(preg_match('~^on update (.+)~i',$K["Extra"],$_)?$_[1]:""),"collation"=>$K["Collation"],"privileges"=>array_flip(preg_split('~, *~',$K["Privileges"])),"comment"=>$K["Comment"],"primary"=>($K["Key"]=="PRI"),"generated"=>preg_match('~^(VIRTUAL|PERSISTENT|STORED)~',$K["Extra"]),);}return$J;}function
indexes($R,$h=null){$J=array();foreach(get_rows("SHOW INDEX FROM ".table($R),$h)as$K){$A=$K["Key_name"];$J[$A]["type"]=($A=="PRIMARY"?"PRIMARY":($K["Index_type"]=="FULLTEXT"?"FULLTEXT":($K["Non_unique"]?($K["Index_type"]=="SPATIAL"?"SPATIAL":"INDEX"):"UNIQUE")));$J[$A]["columns"][]=$K["Column_name"];$J[$A]["lengths"][]=($K["Index_type"]=="SPATIAL"?null:$K["Sub_part"]);$J[$A]["descs"][]=null;}return$J;}function
foreign_keys($R){global$g,$le;static$Ee='(?:`(?:[^`]|``)+`|"(?:[^"]|"")+")';$J=array();$sb=$g->result("SHOW CREATE TABLE ".table($R),1);if($sb){preg_match_all("~CONSTRAINT ($Ee) FOREIGN KEY ?\\(((?:$Ee,? ?)+)\\) REFERENCES ($Ee)(?:\\.($Ee))? \\(((?:$Ee,? ?)+)\\)(?: ON DELETE ($le))?(?: ON UPDATE ($le))?~",$sb,$Nd,PREG_SET_ORDER);foreach($Nd
as$_){preg_match_all("~$Ee~",$_[2],$If);preg_match_all("~$Ee~",$_[5],$cg);$J[idf_unescape($_[1])]=array("db"=>idf_unescape($_[4]!=""?$_[3]:$_[4]),"table"=>idf_unescape($_[4]!=""?$_[4]:$_[3]),"source"=>array_map('idf_unescape',$If[0]),"target"=>array_map('idf_unescape',$cg[0]),"on_delete"=>($_[6]?$_[6]:"RESTRICT"),"on_update"=>($_[7]?$_[7]:"RESTRICT"),);}}return$J;}function
view($A){global$g;return
array("select"=>preg_replace('~^(?:[^`]|`[^`]*`)*\s+AS\s+~isU','',$g->result("SHOW CREATE VIEW ".table($A),1)));}function
collations(){$J=array();foreach(get_rows("SHOW COLLATION")as$K){if($K["Default"])$J[$K["Charset"]][-1]=$K["Collation"];else$J[$K["Charset"]][]=$K["Collation"];}ksort($J);foreach($J
as$x=>$X)asort($J[$x]);return$J;}function
information_schema($l){return(min_version(5)&&$l=="information_schema")||(min_version(5.5)&&$l=="performance_schema");}function
error(){global$g;return
h(preg_replace('~^You have an error.*syntax to use~U',"Syntax error",$g->error));}function
create_database($l,$d){return
queries("CREATE DATABASE ".idf_escape($l).($d?" COLLATE ".q($d):""));}function
drop_databases($k){$J=apply_queries("DROP DATABASE",$k,'idf_escape');restart_session();set_session("dbs",null);return$J;}function
rename_database($A,$d){$J=false;if(create_database($A,$d)){$ef=array();foreach(tables_list()as$R=>$U)$ef[]=table($R)." TO ".idf_escape($A).".".table($R);$J=(!$ef||queries("RENAME TABLE ".implode(", ",$ef)));if($J)queries("DROP DATABASE ".idf_escape(DB));restart_session();set_session("dbs",null);}return$J;}function
auto_increment(){$Ga=" PRIMARY KEY";if($_GET["create"]!=""&&$_POST["auto_increment_col"]){foreach(indexes($_GET["create"])as$u){if(in_array($_POST["fields"][$_POST["auto_increment_col"]]["orig"],$u["columns"],true)){$Ga="";break;}if($u["type"]=="PRIMARY")$Ga=" UNIQUE";}}return" AUTO_INCREMENT$Ga";}function
alter_table($R,$A,$p,$wc,$ib,$Ub,$d,$Fa,$Be){$c=array();foreach($p
as$o)$c[]=($o[1]?($R!=""?($o[0]!=""?"CHANGE ".idf_escape($o[0]):"ADD"):" ")." ".implode($o[1]).($R!=""?$o[2]:""):"DROP ".idf_escape($o[0]));$c=array_merge($c,$wc);$Qf=($ib!==null?" COMMENT=".q($ib):"").($Ub?" ENGINE=".q($Ub):"").($d?" COLLATE ".q($d):"").($Fa!=""?" AUTO_INCREMENT=$Fa":"");if($R=="")return
queries("CREATE TABLE ".table($A)." (\n".implode(",\n",$c)."\n)$Qf$Be");if($R!=$A)$c[]="RENAME TO ".table($A);if($Qf)$c[]=ltrim($Qf);return($c||$Be?queries("ALTER TABLE ".table($R)."\n".implode(",\n",$c).$Be):true);}function
alter_indexes($R,$c){foreach($c
as$x=>$X)$c[$x]=($X[2]=="DROP"?"\nDROP INDEX ".idf_escape($X[1]):"\nADD $X[0] ".($X[0]=="PRIMARY"?"KEY ":"").($X[1]!=""?idf_escape($X[1])." ":"")."(".implode(", ",$X[2]).")");return
queries("ALTER TABLE ".table($R).implode(",",$c));}function
truncate_tables($T){return
apply_queries("TRUNCATE TABLE",$T);}function
drop_views($Wg){return
queries("DROP VIEW ".implode(", ",array_map('table',$Wg)));}function
drop_tables($T){return
queries("DROP TABLE ".implode(", ",array_map('table',$T)));}function
move_tables($T,$Wg,$cg){$ef=array();foreach(array_merge($T,$Wg)as$R)$ef[]=table($R)." TO ".idf_escape($cg).".".table($R);return
queries("RENAME TABLE ".implode(", ",$ef));}function
copy_tables($T,$Wg,$cg){queries("SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO'");foreach($T
as$R){$A=($cg==DB?table("copy_$R"):idf_escape($cg).".".table($R));if(($_POST["overwrite"]&&!queries("\nDROP TABLE IF EXISTS $A"))||!queries("CREATE TABLE $A LIKE ".table($R))||!queries("INSERT INTO $A SELECT * FROM ".table($R)))return
false;foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($R,"%_\\")))as$K){$yg=$K["Trigger"];if(!queries("CREATE TRIGGER ".($cg==DB?idf_escape("copy_$yg"):idf_escape($cg).".".idf_escape($yg))." $K[Timing] $K[Event] ON $A FOR EACH ROW\n$K[Statement];"))return
false;}}foreach($Wg
as$R){$A=($cg==DB?table("copy_$R"):idf_escape($cg).".".table($R));$Vg=view($R);if(($_POST["overwrite"]&&!queries("DROP VIEW IF EXISTS $A"))||!queries("CREATE VIEW $A AS $Vg[select]"))return
false;}return
true;}function
trigger($A){if($A=="")return
array();$L=get_rows("SHOW TRIGGERS WHERE `Trigger` = ".q($A));return
reset($L);}function
triggers($R){$J=array();foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($R,"%_\\")))as$K)$J[$K["Trigger"]]=array($K["Timing"],$K["Event"]);return$J;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("FOR EACH ROW"),);}function
routine($A,$U){global$g,$Vb,$id,$Cg;$wa=array("bool","boolean","integer","double precision","real","dec","numeric","fixed","national char","national varchar");$Jf="(?:\\s|/\\*[\s\S]*?\\*/|(?:#|-- )[^\n]*\n?|--\r?\n)";$Bg="((".implode("|",array_merge(array_keys($Cg),$wa)).")\\b(?:\\s*\\(((?:[^'\")]|$Vb)++)\\))?\\s*(zerofill\\s*)?(unsigned(?:\\s+zerofill)?)?)(?:\\s*(?:CHARSET|CHARACTER\\s+SET)\\s*['\"]?([^'\"\\s,]+)['\"]?)?";$Ee="$Jf*(".($U=="FUNCTION"?"":$id).")?\\s*(?:`((?:[^`]|``)*)`\\s*|\\b(\\S+)\\s+)$Bg";$rb=$g->result("SHOW CREATE $U ".idf_escape($A),2);preg_match("~\\(((?:$Ee\\s*,?)*)\\)\\s*".($U=="FUNCTION"?"RETURNS\\s+$Bg\\s+":"")."(.*)~is",$rb,$_);$p=array();preg_match_all("~$Ee\\s*,?~is",$_[1],$Nd,PREG_SET_ORDER);foreach($Nd
as$ze)$p[]=array("field"=>str_replace("``","`",$ze[2]).$ze[3],"type"=>strtolower($ze[5]),"length"=>preg_replace_callback("~$Vb~s",'normalize_enum',$ze[6]),"unsigned"=>strtolower(preg_replace('~\s+~',' ',trim("$ze[8] $ze[7]"))),"null"=>1,"full_type"=>$ze[4],"inout"=>strtoupper($ze[1]),"collation"=>strtolower($ze[9]),);if($U!="FUNCTION")return
array("fields"=>$p,"definition"=>$_[11]);return
array("fields"=>$p,"returns"=>array("type"=>$_[12],"length"=>$_[13],"unsigned"=>$_[15],"collation"=>$_[16]),"definition"=>$_[17],"language"=>"SQL",);}function
routines(){return
get_rows("SELECT ROUTINE_NAME AS SPECIFIC_NAME, ROUTINE_NAME, ROUTINE_TYPE, DTD_IDENTIFIER FROM information_schema.ROUTINES WHERE ROUTINE_SCHEMA = ".q(DB));}function
routine_languages(){return
array();}function
routine_id($A,$K){return
idf_escape($A);}function
last_id(){global$g;return$g->result("SELECT LAST_INSERT_ID()");}function
explain($g,$G){return$g->query("EXPLAIN ".(min_version(5.1)?"PARTITIONS ":"").$G);}function
found_rows($S,$Z){return($Z||$S["Engine"]!="InnoDB"?null:$S["Rows"]);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($pf,$h=null){return
true;}function
create_sql($R,$Fa,$Tf){global$g;$J=$g->result("SHOW CREATE TABLE ".table($R),1);if(!$Fa)$J=preg_replace('~ AUTO_INCREMENT=\d+~','',$J);return$J;}function
truncate_sql($R){return"TRUNCATE ".table($R);}function
use_sql($j){return"USE ".idf_escape($j);}function
trigger_sql($R){$J="";foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($R,"%_\\")),null,"-- ")as$K)$J.="\nCREATE TRIGGER ".idf_escape($K["Trigger"])." $K[Timing] $K[Event] ON ".table($K["Table"])." FOR EACH ROW\n$K[Statement];;\n";return$J;}function
show_variables(){return
get_key_vals("SHOW VARIABLES");}function
process_list(){return
get_rows("SHOW FULL PROCESSLIST");}function
show_status(){return
get_key_vals("SHOW STATUS");}function
convert_field($o){if(preg_match("~binary~",$o["type"]))return"HEX(".idf_escape($o["field"]).")";if($o["type"]=="bit")return"BIN(".idf_escape($o["field"])." + 0)";if(preg_match("~geometry|point|linestring|polygon~",$o["type"]))return(min_version(8)?"ST_":"")."AsWKT(".idf_escape($o["field"]).")";}function
unconvert_field($o,$J){if(preg_match("~binary~",$o["type"]))$J="UNHEX($J)";if($o["type"]=="bit")$J="CONV($J, 2, 10) + 0";if(preg_match("~geometry|point|linestring|polygon~",$o["type"]))$J=(min_version(8)?"ST_":"")."GeomFromText($J, SRID($o[field]))";return$J;}function
support($kc){return!preg_match("~scheme|sequence|type|view_trigger|materializedview".(min_version(8)?"":"|descidx".(min_version(5.1)?"":"|event|partitioning".(min_version(5)?"":"|routine|trigger|view")))."~",$kc);}function
kill_process($X){return
queries("KILL ".number($X));}function
connection_id(){return"SELECT CONNECTION_ID()";}function
max_connections(){global$g;return$g->result("SELECT @@max_connections");}$w="sql";$Cg=array();$Sf=array();foreach(array('Numbers'=>array("tinyint"=>3,"smallint"=>5,"mediumint"=>8,"int"=>10,"bigint"=>20,"decimal"=>66,"float"=>12,"double"=>21),'Date and time'=>array("date"=>10,"datetime"=>19,"timestamp"=>19,"time"=>10,"year"=>4),'Strings'=>array("char"=>255,"varchar"=>65535,"tinytext"=>255,"text"=>65535,"mediumtext"=>16777215,"longtext"=>4294967295),'Lists'=>array("enum"=>65535,"set"=>64),'Binary'=>array("bit"=>20,"binary"=>255,"varbinary"=>65535,"tinyblob"=>255,"blob"=>65535,"mediumblob"=>16777215,"longblob"=>4294967295),'Geometry'=>array("geometry"=>0,"point"=>0,"linestring"=>0,"polygon"=>0,"multipoint"=>0,"multilinestring"=>0,"multipolygon"=>0,"geometrycollection"=>0),)as$x=>$X){$Cg+=$X;$Sf[$x]=array_keys($X);}$Jg=array("unsigned","zerofill","unsigned zerofill");$qe=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","REGEXP","IN","FIND_IN_SET","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL");$Fc=array("char_length","date","from_unixtime","lower","round","floor","ceil","sec_to_time","time_to_sec","upper");$Jc=array("avg","count","count distinct","group_concat","max","min","sum");$Nb=array(array("char"=>"md5/sha1/password/encrypt/uuid","binary"=>"md5/sha1","date|time"=>"now",),array(number_type()=>"+/-","date"=>"+ interval/- interval","time"=>"addtime/subtime","char|text"=>"concat",));}define("SERVER",$_GET[DRIVER]);define("DB",$_GET["db"]);define("ME",preg_replace('~\?.*~','',relative_uri()).'?'.(sid()?SID.'&':'').(SERVER!==null?DRIVER."=".urlencode(SERVER).'&':'').(isset($_GET["username"])?"username=".urlencode($_GET["username"]).'&':'').(DB!=""?'db='.urlencode(DB).'&'.(isset($_GET["ns"])?"ns=".urlencode($_GET["ns"])."&":""):''));$ca="4.7.8";class
Adminer{var$operators=array("<=",">=");var$_values=array();function
name(){return"<a href='https://www.adminer.org/editor/'".target_blank()." id='h1'>".'Editor'."</a>";}function
credentials(){return
array(SERVER,$_GET["username"],get_password());}function
connectSsl(){}function
permanentLogin($rb=false){return
password_file($rb);}function
bruteForceKey(){return$_SERVER["REMOTE_ADDR"];}function
serverName($O){}function
database(){global$g;if($g){$k=$this->databases(false);return(!$k?$g->result("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', 1)"):$k[(information_schema($k[0])?1:0)]);}}function
schemas(){return
schemas();}function
databases($uc=true){return
get_databases($uc);}function
queryTimeout(){return
5;}function
headers(){}function
csp(){return
csp();}function
head(){return
true;}function
css(){$J=array();$q="adminer.css";if(file_exists($q))$J[]=$q;return$J;}function
loginForm(){echo"<table cellspacing='0' class='layout'>\n",$this->loginFormField('username','<tr><th>'.'Username'.'<td>','<input type="hidden" name="auth[driver]" value="server"><input name="auth[username]" id="username" value="'.h($_GET["username"]).'" autocomplete="username" autocapitalize="off">'.script("focus(qs('#username'));")),$this->loginFormField('password','<tr><th>'.'Password'.'<td>','<input type="password" name="auth[password]" autocomplete="current-password">'."\n"),"</table>\n","<p><input type='submit' value='".'Login'."'>\n",checkbox("auth[permanent]",1,$_COOKIE["adminer_permanent"],'Permanent login')."\n";}function
loginFormField($A,$Qc,$Y){return$Qc.$Y;}function
login($Hd,$F){return
true;}function
tableName($Yf){return
h($Yf["Comment"]!=""?$Yf["Comment"]:$Yf["Name"]);}function
fieldName($o,$C=0){return
h(preg_replace('~\s+\[.*\]$~','',($o["comment"]!=""?$o["comment"]:$o["field"])));}function
selectLinks($Yf,$P=""){$a=$Yf["Name"];if($P!==null)echo'<p class="tabs"><a href="'.h(ME.'edit='.urlencode($a).$P).'">'.'New item'."</a>\n";}function
foreignKeys($R){return
foreign_keys($R);}function
backwardKeys($R,$Xf){$J=array();foreach(get_rows("SELECT TABLE_NAME, CONSTRAINT_NAME, COLUMN_NAME, REFERENCED_COLUMN_NAME
FROM information_schema.KEY_COLUMN_USAGE
WHERE TABLE_SCHEMA = ".q($this->database())."
AND REFERENCED_TABLE_SCHEMA = ".q($this->database())."
AND REFERENCED_TABLE_NAME = ".q($R)."
ORDER BY ORDINAL_POSITION",null,"")as$K)$J[$K["TABLE_NAME"]]["keys"][$K["CONSTRAINT_NAME"]][$K["COLUMN_NAME"]]=$K["REFERENCED_COLUMN_NAME"];foreach($J
as$x=>$X){$A=$this->tableName(table_status($x,true));if($A!=""){$rf=preg_quote($Xf);$N="(:|\\s*-)?\\s+";$J[$x]["name"]=(preg_match("(^$rf$N(.+)|^(.+?)$N$rf\$)iu",$A,$_)?$_[2].$_[3]:$A);}else
unset($J[$x]);}return$J;}function
backwardKeysPrint($Ja,$K){foreach($Ja
as$R=>$Ia){foreach($Ia["keys"]as$gb){$z=ME.'select='.urlencode($R);$r=0;foreach($gb
as$e=>$X)$z.=where_link($r++,$e,$K[$X]);echo"<a href='".h($z)."'>".h($Ia["name"])."</a>";$z=ME.'edit='.urlencode($R);foreach($gb
as$e=>$X)$z.="&set".urlencode("[".bracket_escape($e)."]")."=".urlencode($K[$X]);echo"<a href='".h($z)."' title='".'New item'."'>+</a> ";}}}function
selectQuery($G,$Of,$ic=false){return"<!--\n".str_replace("--","--><!-- ",$G)."\n(".format_time($Of).")\n-->\n";}function
rowDescription($R){foreach(fields($R)as$o){if(preg_match("~varchar|character varying~",$o["type"]))return
idf_escape($o["field"]);}return"";}function
rowDescriptions($L,$yc){$J=$L;foreach($L[0]as$x=>$X){if(list($R,$s,$A)=$this->_foreignColumn($yc,$x)){$Xc=array();foreach($L
as$K)$Xc[$K[$x]]=q($K[$x]);$Cb=$this->_values[$R];if(!$Cb)$Cb=get_key_vals("SELECT $s, $A FROM ".table($R)." WHERE $s IN (".implode(", ",$Xc).")");foreach($L
as$ae=>$K){if(isset($K[$x]))$J[$ae][$x]=(string)$Cb[$K[$x]];}}}return$J;}function
selectLink($X,$o){}function
selectVal($X,$z,$o,$ue){$J=$X;$z=h($z);if(preg_match('~blob|bytea~',$o["type"])&&!is_utf8($X)){$J=lang(array('%d byte','%d bytes'),strlen($ue));if(preg_match("~^(GIF|\xFF\xD8\xFF|\x89PNG\x0D\x0A\x1A\x0A)~",$ue))$J="<img src='$z' alt='$J'>";}if(like_bool($o)&&$J!="")$J=(preg_match('~^(1|t|true|y|yes|on)$~i',$X)?'yes':'no');if($z)$J="<a href='$z'".(is_url($z)?target_blank():"").">$J</a>";if(!$z&&!like_bool($o)&&preg_match(number_type(),$o["type"]))$J="<div class='number'>$J</div>";elseif(preg_match('~date~',$o["type"]))$J="<div class='datetime'>$J</div>";return$J;}function
editVal($X,$o){if(preg_match('~date|timestamp~',$o["type"])&&$X!==null)return
preg_replace('~^(\d{2}(\d+))-(0?(\d+))-(0?(\d+))~','$1-$3-$5',$X);return$X;}function
selectColumnsPrint($M,$f){}function
selectSearchPrint($Z,$f,$v){$Z=(array)$_GET["where"];echo'<fieldset id="fieldset-search"><legend>'.'Search'."</legend><div>\n";$vd=array();foreach($Z
as$x=>$X)$vd[$X["col"]]=$x;$r=0;$p=fields($_GET["select"]);foreach($f
as$A=>$Bb){$o=$p[$A];if(preg_match("~enum~",$o["type"])||like_bool($o)){$x=$vd[$A];$r--;echo"<div>".h($Bb)."<input type='hidden' name='where[$r][col]' value='".h($A)."'>:",(like_bool($o)?" <select name='where[$r][val]'>".optionlist(array(""=>"",'no','yes'),$Z[$x]["val"],true)."</select>":enum_input("checkbox"," name='where[$r][val][]'",$o,(array)$Z[$x]["val"],($o["null"]?0:null))),"</div>\n";unset($f[$A]);}elseif(is_array($B=$this->_foreignKeyOptions($_GET["select"],$A))){if($p[$A]["null"])$B[0]='('.'empty'.')';$x=$vd[$A];$r--;echo"<div>".h($Bb)."<input type='hidden' name='where[$r][col]' value='".h($A)."'><input type='hidden' name='where[$r][op]' value='='>: <select name='where[$r][val]'>".optionlist($B,$Z[$x]["val"],true)."</select></div>\n";unset($f[$A]);}}$r=0;foreach($Z
as$X){if(($X["col"]==""||$f[$X["col"]])&&"$X[col]$X[val]"!=""){echo"<div><select name='where[$r][col]'><option value=''>(".'anywhere'.")".optionlist($f,$X["col"],true)."</select>",html_select("where[$r][op]",array(-1=>"")+$this->operators,$X["op"]),"<input type='search' name='where[$r][val]' value='".h($X["val"])."'>".script("mixin(qsl('input'), {onkeydown: selectSearchKeydown, onsearch: selectSearchSearch});","")."</div>\n";$r++;}}echo"<div><select name='where[$r][col]'><option value=''>(".'anywhere'.")".optionlist($f,null,true)."</select>",script("qsl('select').onchange = selectAddRow;",""),html_select("where[$r][op]",array(-1=>"")+$this->operators),"<input type='search' name='where[$r][val]'></div>",script("mixin(qsl('input'), {onchange: function () { this.parentNode.firstChild.onchange(); }, onsearch: selectSearchSearch});"),"</div></fieldset>\n";}function
selectOrderPrint($C,$f,$v){$te=array();foreach($v
as$x=>$u){$C=array();foreach($u["columns"]as$X)$C[]=$f[$X];if(count(array_filter($C,'strlen'))>1&&$x!="PRIMARY")$te[$x]=implode(", ",$C);}if($te){echo'<fieldset><legend>'.'Sort'."</legend><div>","<select name='index_order'>".optionlist(array(""=>"")+$te,($_GET["order"][0]!=""?"":$_GET["index_order"]),true)."</select>","</div></fieldset>\n";}if($_GET["order"])echo"<div style='display: none;'>".hidden_fields(array("order"=>array(1=>reset($_GET["order"])),"desc"=>($_GET["desc"]?array(1=>1):array()),))."</div>\n";}function
selectLimitPrint($y){echo"<fieldset><legend>".'Limit'."</legend><div>";echo
html_select("limit",array("","50","100"),$y),"</div></fieldset>\n";}function
selectLengthPrint($gg){}function
selectActionPrint($v){echo"<fieldset><legend>".'Action'."</legend><div>","<input type='submit' value='".'Select'."'>","</div></fieldset>\n";}function
selectCommandPrint(){return
true;}function
selectImportPrint(){return
true;}function
selectEmailPrint($Rb,$f){if($Rb){print_fieldset("email",'E-mail',$_POST["email_append"]);echo"<div>",script("qsl('div').onkeydown = partialArg(bodyKeydown, 'email');"),"<p>".'From'.": <input name='email_from' value='".h($_POST?$_POST["email_from"]:$_COOKIE["adminer_email"])."'>\n",'Subject'.": <input name='email_subject' value='".h($_POST["email_subject"])."'>\n","<p><textarea name='email_message' rows='15' cols='75'>".h($_POST["email_message"].($_POST["email_append"]?'{$'."$_POST[email_addition]}":""))."</textarea>\n","<p>".script("qsl('p').onkeydown = partialArg(bodyKeydown, 'email_append');","").html_select("email_addition",$f,$_POST["email_addition"])."<input type='submit' name='email_append' value='".'Insert'."'>\n";echo"<p>".'Attachments'.": <input type='file' name='email_files[]'>".script("qsl('input').onchange = emailFileChange;"),"<p>".(count($Rb)==1?'<input type="hidden" name="email_field" value="'.h(key($Rb)).'">':html_select("email_field",$Rb)),"<input type='submit' name='email' value='".'Send'."'>".confirm(),"</div>\n","</div></fieldset>\n";}}function
selectColumnsProcess($f,$v){return
array(array(),array());}function
selectSearchProcess($p,$v){$J=array();foreach((array)$_GET["where"]as$x=>$Z){$db=$Z["col"];$oe=$Z["op"];$X=$Z["val"];if(($x<0?"":$db).$X!=""){$kb=array();foreach(($db!=""?array($db=>$p[$db]):$p)as$A=>$o){if($db!=""||is_numeric($X)||!preg_match(number_type(),$o["type"])){$A=idf_escape($A);if($db!=""&&$o["type"]=="enum")$kb[]=(in_array(0,$X)?"$A IS NULL OR ":"")."$A IN (".implode(", ",array_map('intval',$X)).")";else{$hg=preg_match('~char|text|enum|set~',$o["type"]);$Y=$this->processInput($o,(!$oe&&$hg&&preg_match('~^[^%]+$~',$X)?"%$X%":$X));$kb[]=$A.($Y=="NULL"?" IS".($oe==">="?" NOT":"")." $Y":(in_array($oe,$this->operators)||$oe=="="?" $oe $Y":($hg?" LIKE $Y":" IN (".str_replace(",","', '",$Y).")")));if($x<0&&$X=="0")$kb[]="$A IS NULL";}}}$J[]=($kb?"(".implode(" OR ",$kb).")":"1 = 0");}}return$J;}function
selectOrderProcess($p,$v){$ad=$_GET["index_order"];if($ad!="")unset($_GET["order"][1]);if($_GET["order"])return
array(idf_escape(reset($_GET["order"])).($_GET["desc"]?" DESC":""));foreach(($ad!=""?array($v[$ad]):$v)as$u){if($ad!=""||$u["type"]=="INDEX"){$Lc=array_filter($u["descs"]);$Bb=false;foreach($u["columns"]as$X){if(preg_match('~date|timestamp~',$p[$X]["type"])){$Bb=true;break;}}$J=array();foreach($u["columns"]as$x=>$X)$J[]=idf_escape($X).(($Lc?$u["descs"][$x]:$Bb)?" DESC":"");return$J;}}return
array();}function
selectLimitProcess(){return(isset($_GET["limit"])?$_GET["limit"]:"50");}function
selectLengthProcess(){return"100";}function
selectEmailProcess($Z,$yc){if($_POST["email_append"])return
true;if($_POST["email"]){$wf=0;if($_POST["all"]||$_POST["check"]){$o=idf_escape($_POST["email_field"]);$Uf=$_POST["email_subject"];$Td=$_POST["email_message"];preg_match_all('~\{\$([a-z0-9_]+)\}~i',"$Uf.$Td",$Nd);$L=get_rows("SELECT DISTINCT $o".($Nd[1]?", ".implode(", ",array_map('idf_escape',array_unique($Nd[1]))):"")." FROM ".table($_GET["select"])." WHERE $o IS NOT NULL AND $o != ''".($Z?" AND ".implode(" AND ",$Z):"").($_POST["all"]?"":" AND ((".implode(") OR (",array_map('where_check',(array)$_POST["check"]))."))"));$p=fields($_GET["select"]);foreach($this->rowDescriptions($L,$yc)as$K){$ff=array('{\\'=>'{');foreach($Nd[1]as$X)$ff['{$'."$X}"]=$this->editVal($K[$X],$p[$X]);$Qb=$K[$_POST["email_field"]];if(is_mail($Qb)&&send_mail($Qb,strtr($Uf,$ff),strtr($Td,$ff),$_POST["email_from"],$_FILES["email_files"]))$wf++;}}cookie("adminer_email",$_POST["email_from"]);redirect(remove_from_uri(),lang(array('%d e-mail has been sent.','%d e-mails have been sent.'),$wf));}return
false;}function
selectQueryBuild($M,$Z,$Gc,$C,$y,$D){return"";}function
messageQuery($G,$ig,$ic=false){return" <span class='time'>".@date("H:i:s")."</span><!--\n".str_replace("--","--><!-- ",$G)."\n".($ig?"($ig)\n":"")."-->";}function
editFunctions($o){$J=array();if($o["null"]&&preg_match('~blob~',$o["type"]))$J["NULL"]='empty';$J[""]=($o["null"]||$o["auto_increment"]||like_bool($o)?"":"*");if(preg_match('~date|time~',$o["type"]))$J["now"]='now';if(preg_match('~_(md5|sha1)$~i',$o["field"],$_))$J[]=strtolower($_[1]);return$J;}function
editInput($R,$o,$Ca,$Y){if($o["type"]=="enum")return(isset($_GET["select"])?"<label><input type='radio'$Ca value='-1' checked><i>".'original'."</i></label> ":"").enum_input("radio",$Ca,$o,($Y||isset($_GET["select"])?$Y:0),($o["null"]?"":null));$B=$this->_foreignKeyOptions($R,$o["field"],$Y);if($B!==null)return(is_array($B)?"<select$Ca>".optionlist($B,$Y,true)."</select>":"<input value='".h($Y)."'$Ca class='hidden'>"."<input value='".h($B)."' class='jsonly'>"."<div></div>".script("qsl('input').oninput = partial(whisper, '".ME."script=complete&source=".urlencode($R)."&field=".urlencode($o["field"])."&value=');
qsl('div').onclick = whisperClick;",""));if(like_bool($o))return'<input type="checkbox" value="1"'.(preg_match('~^(1|t|true|y|yes|on)$~i',$Y)?' checked':'')."$Ca>";$Rc="";if(preg_match('~time~',$o["type"]))$Rc='HH:MM:SS';if(preg_match('~date|timestamp~',$o["type"]))$Rc='[yyyy]-mm-dd'.($Rc?" [$Rc]":"");if($Rc)return"<input value='".h($Y)."'$Ca> ($Rc)";if(preg_match('~_(md5|sha1)$~i',$o["field"]))return"<input type='password' value='".h($Y)."'$Ca>";return'';}function
editHint($R,$o,$Y){return(preg_match('~\s+(\[.*\])$~',($o["comment"]!=""?$o["comment"]:$o["field"]),$_)?h(" $_[1]"):'');}function
processInput($o,$Y,$Ec=""){if($Ec=="now")return"$Ec()";$J=$Y;if(preg_match('~date|timestamp~',$o["type"])&&preg_match('(^'.str_replace('\$1','(?P<p1>\d*)',preg_replace('~(\\\\\\$([2-6]))~','(?P<p\2>\d{1,2})',preg_quote('$1-$3-$5'))).'(.*))',$Y,$_))$J=($_["p1"]!=""?$_["p1"]:($_["p2"]!=""?($_["p2"]<70?20:19).$_["p2"]:gmdate("Y")))."-$_[p3]$_[p4]-$_[p5]$_[p6]".end($_);$J=($o["type"]=="bit"&&preg_match('~^[0-9]+$~',$Y)?$J:q($J));if($Y==""&&like_bool($o))$J="'0'";elseif($Y==""&&($o["null"]||!preg_match('~char|text~',$o["type"])))$J="NULL";elseif(preg_match('~^(md5|sha1)$~',$Ec))$J="$Ec($J)";return
unconvert_field($o,$J);}function
dumpOutput(){return
array();}function
dumpFormat(){return
array('csv'=>'CSV,','csv;'=>'CSV;','tsv'=>'TSV');}function
dumpDatabase($l){}function
dumpTable($R,$Tf,$pd=0){echo"\xef\xbb\xbf";}function
dumpData($R,$Tf,$G){global$g;$I=$g->query($G,1);if($I){while($K=$I->fetch_assoc()){if($Tf=="table"){dump_csv(array_keys($K));$Tf="INSERT";}dump_csv($K);}}}function
dumpFilename($Vc){return
friendly_url($Vc);}function
dumpHeaders($Vc,$Yd=false){$ec="csv";header("Content-Type: text/csv; charset=utf-8");return$ec;}function
importServerPath(){}function
homepage(){return
true;}function
navigation($Xd){global$ca;echo'<h1>
',$this->name(),' <span class="version">',$ca,'</span>
<a href="https://www.adminer.org/editor/#download"',target_blank(),' id="version">',(version_compare($ca,$_COOKIE["adminer_version"])<0?h($_COOKIE["adminer_version"]):""),'</a>
</h1>
';if($Xd=="auth"){$qc=true;foreach((array)$_SESSION["pwds"]as$Tg=>$Af){foreach($Af[""]as$V=>$F){if($F!==null){if($qc){echo"<ul id='logins'>",script("mixin(qs('#logins'), {onmouseover: menuOver, onmouseout: menuOut});");$qc=false;}echo"<li><a href='".h(auth_url($Tg,"",$V))."'>".($V!=""?h($V):"<i>".'empty'."</i>")."</a>\n";}}}}else{$this->databasesPrint($Xd);if($Xd!="db"&&$Xd!="ns"){$S=table_status('',true);if(!$S)echo"<p class='message'>".'No tables.'."\n";else$this->tablesPrint($S);}}}function
databasesPrint($Xd){}function
tablesPrint($T){echo"<ul id='tables'>",script("mixin(qs('#tables'), {onmouseover: menuOver, onmouseout: menuOut});");foreach($T
as$K){echo'<li>';$A=$this->tableName($K);if(isset($K["Engine"])&&$A!="")echo"<a href='".h(ME).'select='.urlencode($K["Name"])."'".bold($_GET["select"]==$K["Name"]||$_GET["edit"]==$K["Name"],"select")." title='".'Select data'."'>$A</a>\n";}echo"</ul>\n";}function
_foreignColumn($yc,$e){foreach((array)$yc[$e]as$xc){if(count($xc["source"])==1){$A=$this->rowDescription($xc["table"]);if($A!=""){$s=idf_escape($xc["target"][0]);return
array($xc["table"],$s,$A);}}}}function
_foreignKeyOptions($R,$e,$Y=null){global$g;if(list($cg,$s,$A)=$this->_foreignColumn(column_foreign_keys($R),$e)){$J=&$this->_values[$cg];if($J===null){$S=table_status($cg);$J=($S["Rows"]>1000?"":array(""=>"")+get_key_vals("SELECT $s, $A FROM ".table($cg)." ORDER BY 2"));}if(!$J&&$Y!==null)return$g->result("SELECT $A FROM ".table($cg)." WHERE $s = ".q($Y));return$J;}}}$b=(function_exists('adminer_object')?adminer_object():new
Adminer);function
page_header($lg,$n="",$Ra=array(),$mg=""){global$ba,$ca,$b,$Ib,$w;page_headers();if(is_ajax()&&$n){page_messages($n);exit;}$ng=$lg.($mg!=""?": $mg":"");$og=strip_tags($ng.(SERVER!=""&&SERVER!="localhost"?h(" - ".SERVER):"")." - ".$b->name());echo'<!DOCTYPE html>
<html lang="en" dir="ltr">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex">
<title>',$og,'</title>
<link rel="stylesheet" type="text/css" href="',h(preg_replace("~\\?.*~","",ME)."?file=default.css&version=4.7.8"),'">
',script_src(preg_replace("~\\?.*~","",ME)."?file=functions.js&version=4.7.8");if($b->head()){echo'<link rel="shortcut icon" type="image/x-icon" href="',h(preg_replace("~\\?.*~","",ME)."?file=favicon.ico&version=4.7.8"),'">
<link rel="apple-touch-icon" href="',h(preg_replace("~\\?.*~","",ME)."?file=favicon.ico&version=4.7.8"),'">
';foreach($b->css()as$ub){echo'<link rel="stylesheet" type="text/css" href="',h($ub),'">
';}}echo'
<body class="ltr nojs">
';$q=get_temp_dir()."/adminer.version";if(!$_COOKIE["adminer_version"]&&function_exists('openssl_verify')&&file_exists($q)&&filemtime($q)+86400>time()){$Ug=unserialize(file_get_contents($q));$Se="-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAwqWOVuF5uw7/+Z70djoK
RlHIZFZPO0uYRezq90+7Amk+FDNd7KkL5eDve+vHRJBLAszF/7XKXe11xwliIsFs
DFWQlsABVZB3oisKCBEuI71J4kPH8dKGEWR9jDHFw3cWmoH3PmqImX6FISWbG3B8
h7FIx3jEaw5ckVPVTeo5JRm/1DZzJxjyDenXvBQ/6o9DgZKeNDgxwKzH+sw9/YCO
jHnq1cFpOIISzARlrHMa/43YfeNRAm/tsBXjSxembBPo7aQZLAWHmaj5+K19H10B
nCpz9Y++cipkVEiKRGih4ZEvjoFysEOdRLj6WiD/uUNky4xGeA6LaJqh5XpkFkcQ
fQIDAQAB
-----END PUBLIC KEY-----
";if(openssl_verify($Ug["version"],base64_decode($Ug["signature"]),$Se)==1)$_COOKIE["adminer_version"]=$Ug["version"];}echo'<script',nonce(),'>
mixin(document.body, {onkeydown: bodyKeydown, onclick: bodyClick',(isset($_COOKIE["adminer_version"])?"":", onload: partial(verifyVersion, '$ca', '".js_escape(ME)."', '".get_token()."')");?>});
document.body.className = document.body.className.replace(/ nojs/, ' js');
var offlineMessage = '<?php echo
js_escape('You are offline.'),'\';
var thousandsSeparator = \'',js_escape(','),'\';
</script>

<div id="help" class="jush-',$w,' jsonly hidden"></div>
',script("mixin(qs('#help'), {onmouseover: function () { helpOpen = 1; }, onmouseout: helpMouseout});"),'
<div id="content">
';if($Ra!==null){$z=substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1);echo'<p id="breadcrumb"><a href="'.h($z?$z:".").'">'.$Ib[DRIVER].'</a> &raquo; ';$z=substr(preg_replace('~\b(db|ns)=[^&]*&~','',ME),0,-1);$O=$b->serverName(SERVER);$O=($O!=""?$O:'Server');if($Ra===false)echo"$O\n";else{echo"<a href='".($z?h($z):".")."' accesskey='1' title='Alt+Shift+1'>$O</a> &raquo; ";if($_GET["ns"]!=""||(DB!=""&&is_array($Ra)))echo'<a href="'.h($z."&db=".urlencode(DB).(support("scheme")?"&ns=":"")).'">'.h(DB).'</a> &raquo; ';if(is_array($Ra)){if($_GET["ns"]!="")echo'<a href="'.h(substr(ME,0,-1)).'">'.h($_GET["ns"]).'</a> &raquo; ';foreach($Ra
as$x=>$X){$Bb=(is_array($X)?$X[1]:h($X));if($Bb!="")echo"<a href='".h(ME."$x=").urlencode(is_array($X)?$X[0]:$X)."'>$Bb</a> &raquo; ";}}echo"$lg\n";}}echo"<h2>$ng</h2>\n","<div id='ajaxstatus' class='jsonly hidden'></div>\n";restart_session();page_messages($n);$k=&get_session("dbs");if(DB!=""&&$k&&!in_array(DB,$k,true))$k=null;stop_session();define("PAGE_HEADER",1);}function
page_headers(){global$b;header("Content-Type: text/html; charset=utf-8");header("Cache-Control: no-cache");header("X-Frame-Options: deny");header("X-XSS-Protection: 0");header("X-Content-Type-Options: nosniff");header("Referrer-Policy: origin-when-cross-origin");foreach($b->csp()as$tb){$Oc=array();foreach($tb
as$x=>$X)$Oc[]="$x $X";header("Content-Security-Policy: ".implode("; ",$Oc));}$b->headers();}function
csp(){return
array(array("script-src"=>"'self' 'unsafe-inline' 'nonce-".get_nonce()."' 'strict-dynamic'","connect-src"=>"'self'","frame-src"=>"https://www.adminer.org","object-src"=>"'none'","base-uri"=>"'none'","form-action"=>"'self'",),);}function
get_nonce(){static$ee;if(!$ee)$ee=base64_encode(rand_string());return$ee;}function
page_messages($n){$Lg=preg_replace('~^[^?]*~','',$_SERVER["REQUEST_URI"]);$Ud=$_SESSION["messages"][$Lg];if($Ud){echo"<div class='message'>".implode("</div>\n<div class='message'>",$Ud)."</div>".script("messagesPrint();");unset($_SESSION["messages"][$Lg]);}if($n)echo"<div class='error'>$n</div>\n";}function
page_footer($Xd=""){global$b,$rg;echo'</div>

';if($Xd!="auth"){echo'<form action="" method="post">
<p class="logout">
<input type="submit" name="logout" value="Logout" id="logout">
<input type="hidden" name="token" value="',$rg,'">
</p>
</form>
';}echo'<div id="menu">
';$b->navigation($Xd);echo'</div>
',script("setupSubmitHighlight(document);");}function
int32($ae){while($ae>=2147483648)$ae-=4294967296;while($ae<=-2147483649)$ae+=4294967296;return(int)$ae;}function
long2str($W,$Yg){$of='';foreach($W
as$X)$of.=pack('V',$X);if($Yg)return
substr($of,0,end($W));return$of;}function
str2long($of,$Yg){$W=array_values(unpack('V*',str_pad($of,4*ceil(strlen($of)/4),"\0")));if($Yg)$W[]=strlen($of);return$W;}function
xxtea_mx($jh,$ih,$Wf,$rd){return
int32((($jh>>5&0x7FFFFFF)^$ih<<2)+(($ih>>3&0x1FFFFFFF)^$jh<<4))^int32(($Wf^$ih)+($rd^$jh));}function
encrypt_string($Rf,$x){if($Rf=="")return"";$x=array_values(unpack("V*",pack("H*",md5($x))));$W=str2long($Rf,true);$ae=count($W)-1;$jh=$W[$ae];$ih=$W[0];$Te=floor(6+52/($ae+1));$Wf=0;while($Te-->0){$Wf=int32($Wf+0x9E3779B9);$Mb=$Wf>>2&3;for($xe=0;$xe<$ae;$xe++){$ih=$W[$xe+1];$Zd=xxtea_mx($jh,$ih,$Wf,$x[$xe&3^$Mb]);$jh=int32($W[$xe]+$Zd);$W[$xe]=$jh;}$ih=$W[0];$Zd=xxtea_mx($jh,$ih,$Wf,$x[$xe&3^$Mb]);$jh=int32($W[$ae]+$Zd);$W[$ae]=$jh;}return
long2str($W,false);}function
decrypt_string($Rf,$x){if($Rf=="")return"";if(!$x)return
false;$x=array_values(unpack("V*",pack("H*",md5($x))));$W=str2long($Rf,false);$ae=count($W)-1;$jh=$W[$ae];$ih=$W[0];$Te=floor(6+52/($ae+1));$Wf=int32($Te*0x9E3779B9);while($Wf){$Mb=$Wf>>2&3;for($xe=$ae;$xe>0;$xe--){$jh=$W[$xe-1];$Zd=xxtea_mx($jh,$ih,$Wf,$x[$xe&3^$Mb]);$ih=int32($W[$xe]-$Zd);$W[$xe]=$ih;}$jh=$W[$ae];$Zd=xxtea_mx($jh,$ih,$Wf,$x[$xe&3^$Mb]);$ih=int32($W[0]-$Zd);$W[0]=$ih;$Wf=int32($Wf-0x9E3779B9);}return
long2str($W,true);}$g='';$Nc=$_SESSION["token"];if(!$Nc)$_SESSION["token"]=rand(1,1e6);$rg=get_token();$Ge=array();if($_COOKIE["adminer_permanent"]){foreach(explode(" ",$_COOKIE["adminer_permanent"])as$X){list($x)=explode(":",$X);$Ge[$x]=$X;}}function
add_invalid_login(){global$b;$Cc=file_open_lock(get_temp_dir()."/adminer.invalid");if(!$Cc)return;$md=unserialize(stream_get_contents($Cc));$ig=time();if($md){foreach($md
as$nd=>$X){if($X[0]<$ig)unset($md[$nd]);}}$ld=&$md[$b->bruteForceKey()];if(!$ld)$ld=array($ig+30*60,0);$ld[1]++;file_write_unlock($Cc,serialize($md));}function
check_invalid_login(){global$b;$md=unserialize(@file_get_contents(get_temp_dir()."/adminer.invalid"));$ld=$md[$b->bruteForceKey()];$de=($ld[1]>29?$ld[0]-time():0);if($de>0)auth_error(lang(array('Too many unsuccessful logins, try again in %d minute.','Too many unsuccessful logins, try again in %d minutes.'),ceil($de/60)));}$Da=$_POST["auth"];if($Da){session_regenerate_id();$Tg=$Da["driver"];$O=$Da["server"];$V=$Da["username"];$F=(string)$Da["password"];$l=$Da["db"];set_password($Tg,$O,$V,$F);$_SESSION["db"][$Tg][$O][$V][$l]=true;if($Da["permanent"]){$x=base64_encode($Tg)."-".base64_encode($O)."-".base64_encode($V)."-".base64_encode($l);$Pe=$b->permanentLogin(true);$Ge[$x]="$x:".base64_encode($Pe?encrypt_string($F,$Pe):"");cookie("adminer_permanent",implode(" ",$Ge));}if(count($_POST)==1||DRIVER!=$Tg||SERVER!=$O||$_GET["username"]!==$V||DB!=$l)redirect(auth_url($Tg,$O,$V,$l));}elseif($_POST["logout"]){if($Nc&&!verify_token()){page_header('Logout','Invalid CSRF token. Send the form again.');page_footer("db");exit;}else{foreach(array("pwds","db","dbs","queries")as$x)set_session($x,null);unset_permanent();redirect(substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1),'Logout successful.'.' '.'Thanks for using Adminer, consider <a href="https://www.adminer.org/en/donation/">donating</a>.');}}elseif($Ge&&!$_SESSION["pwds"]){session_regenerate_id();$Pe=$b->permanentLogin();foreach($Ge
as$x=>$X){list(,$Za)=explode(":",$X);list($Tg,$O,$V,$l)=array_map('base64_decode',explode("-",$x));set_password($Tg,$O,$V,decrypt_string(base64_decode($Za),$Pe));$_SESSION["db"][$Tg][$O][$V][$l]=true;}}function
unset_permanent(){global$Ge;foreach($Ge
as$x=>$X){list($Tg,$O,$V,$l)=array_map('base64_decode',explode("-",$x));if($Tg==DRIVER&&$O==SERVER&&$V==$_GET["username"]&&$l==DB)unset($Ge[$x]);}cookie("adminer_permanent",implode(" ",$Ge));}function
auth_error($n){global$b,$Nc;$Bf=session_name();if(isset($_GET["username"])){header("HTTP/1.1 403 Forbidden");if(($_COOKIE[$Bf]||$_GET[$Bf])&&!$Nc)$n='Session expired, please login again.';else{restart_session();add_invalid_login();$F=get_password();if($F!==null){if($F===false)$n.='<br>'.sprintf('Master password expired. <a href="https://www.adminer.org/en/extension/"%s>Implement</a> %s method to make it permanent.',target_blank(),'<code>permanentLogin()</code>');set_password(DRIVER,SERVER,$_GET["username"],null);}unset_permanent();}}if(!$_COOKIE[$Bf]&&$_GET[$Bf]&&ini_bool("session.use_only_cookies"))$n='Session support must be enabled.';$E=session_get_cookie_params();cookie("adminer_key",($_COOKIE["adminer_key"]?$_COOKIE["adminer_key"]:rand_string()),$E["lifetime"]);page_header('Login',$n,null);echo"<form action='' method='post'>\n","<div>";if(hidden_fields($_POST,array("auth")))echo"<p class='message'>".'The action will be performed after successful login with the same credentials.'."\n";echo"</div>\n";$b->loginForm();echo"</form>\n";page_footer("auth");exit;}if(isset($_GET["username"])&&!class_exists("Min_DB")){unset($_SESSION["pwds"][DRIVER]);unset_permanent();page_header('No extension',sprintf('None of the supported PHP extensions (%s) are available.',implode(", ",$Ke)),false);page_footer("auth");exit;}stop_session(true);if(isset($_GET["username"])&&is_string(get_password())){list($Tc,$Ie)=explode(":",SERVER,2);if(+$Ie&&($Ie<1024||$Ie>65535))auth_error('Connecting to privileged ports is not allowed.');check_invalid_login();$g=connect();$m=new
Min_Driver($g);}$Hd=null;if(!is_object($g)||($Hd=$b->login($_GET["username"],get_password()))!==true){$n=(is_string($g)?h($g):(is_string($Hd)?$Hd:'Invalid credentials.'));auth_error($n.(preg_match('~^ | $~',get_password())?'<br>'.'There is a space in the input password which might be the cause.':''));}if($Da&&$_POST["token"])$_POST["token"]=$rg;$n='';if($_POST){if(!verify_token()){$hd="max_input_vars";$Rd=ini_get($hd);if(extension_loaded("suhosin")){foreach(array("suhosin.request.max_vars","suhosin.post.max_vars")as$x){$X=ini_get($x);if($X&&(!$Rd||$X<$Rd)){$hd=$x;$Rd=$X;}}}$n=(!$_POST["token"]&&$Rd?sprintf('Maximum number of allowed fields exceeded. Please increase %s.',"'$hd'"):'Invalid CSRF token. Send the form again.'.' '.'If you did not send this request from Adminer then close this page.');}}elseif($_SERVER["REQUEST_METHOD"]=="POST"){$n=sprintf('Too big POST data. Reduce the data or increase the %s configuration directive.',"'post_max_size'");if(isset($_GET["sql"]))$n.=' '.'You can upload a big SQL file via FTP and import it from server.';}function
email_header($Oc){return"=?UTF-8?B?".base64_encode($Oc)."?=";}function
send_mail($Qb,$Uf,$Td,$Dc="",$oc=array()){$Wb=(DIRECTORY_SEPARATOR=="/"?"\n":"\r\n");$Td=str_replace("\n",$Wb,wordwrap(str_replace("\r","","$Td\n")));$Qa=uniqid("boundary");$Aa="";foreach((array)$oc["error"]as$x=>$X){if(!$X)$Aa.="--$Qa$Wb"."Content-Type: ".str_replace("\n","",$oc["type"][$x]).$Wb."Content-Disposition: attachment; filename=\"".preg_replace('~["\n]~','',$oc["name"][$x])."\"$Wb"."Content-Transfer-Encoding: base64$Wb$Wb".chunk_split(base64_encode(file_get_contents($oc["tmp_name"][$x])),76,$Wb).$Wb;}$La="";$Pc="Content-Type: text/plain; charset=utf-8$Wb"."Content-Transfer-Encoding: 8bit";if($Aa){$Aa.="--$Qa--$Wb";$La="--$Qa$Wb$Pc$Wb$Wb";$Pc="Content-Type: multipart/mixed; boundary=\"$Qa\"";}$Pc.=$Wb."MIME-Version: 1.0$Wb"."X-Mailer: Adminer Editor".($Dc?$Wb."From: ".str_replace("\n","",$Dc):"");return
mail($Qb,email_header($Uf),$La.$Td.$Aa,$Pc);}function
like_bool($o){return
preg_match("~bool|(tinyint|bit)\\(1\\)~",$o["full_type"]);}$g->select_db($b->database());$le="RESTRICT|NO ACTION|CASCADE|SET NULL|SET DEFAULT";$Ib[DRIVER]='Login';if(isset($_GET["select"])&&($_POST["edit"]||$_POST["clone"])&&!$_POST["save"])$_GET["edit"]=$_GET["select"];if(isset($_GET["download"])){$a=$_GET["download"];$p=fields($a);header("Content-Type: application/octet-stream");header("Content-Disposition: attachment; filename=".friendly_url("$a-".implode("_",$_GET["where"])).".".friendly_url($_GET["field"]));$M=array(idf_escape($_GET["field"]));$I=$m->select($a,$M,array(where($_GET,$p)),$M);$K=($I?$I->fetch_row():array());echo$m->value($K[0],$p[$_GET["field"]]);exit;}elseif(isset($_GET["edit"])){$a=$_GET["edit"];$p=fields($a);$Z=(isset($_GET["select"])?($_POST["check"]&&count($_POST["check"])==1?where_check($_POST["check"][0],$p):""):where($_GET,$p));$Kg=(isset($_GET["select"])?$_POST["edit"]:$Z);foreach($p
as$A=>$o){if(!isset($o["privileges"][$Kg?"update":"insert"])||$b->fieldName($o)==""||$o["generated"])unset($p[$A]);}if($_POST&&!$n&&!isset($_GET["select"])){$Gd=$_POST["referer"];if($_POST["insert"])$Gd=($Kg?null:$_SERVER["REQUEST_URI"]);elseif(!preg_match('~^.+&select=.+$~',$Gd))$Gd=ME."select=".urlencode($a);$v=indexes($a);$Fg=unique_array($_GET["where"],$v);$Ve="\nWHERE $Z";if(isset($_POST["delete"]))queries_redirect($Gd,'Item has been deleted.',$m->delete($a,$Ve,!$Fg));else{$P=array();foreach($p
as$A=>$o){$X=process_input($o);if($X!==false&&$X!==null)$P[idf_escape($A)]=$X;}if($Kg){if(!$P)redirect($Gd);queries_redirect($Gd,'Item has been updated.',$m->update($a,$P,$Ve,!$Fg));if(is_ajax()){page_headers();page_messages($n);exit;}}else{$I=$m->insert($a,$P);$Ad=($I?last_id():0);queries_redirect($Gd,sprintf('Item%s has been inserted.',($Ad?" $Ad":"")),$I);}}}$K=null;if($_POST["save"])$K=(array)$_POST["fields"];elseif($Z){$M=array();foreach($p
as$A=>$o){if(isset($o["privileges"]["select"])){$za=convert_field($o);if($_POST["clone"]&&$o["auto_increment"])$za="''";if($w=="sql"&&preg_match("~enum|set~",$o["type"]))$za="1*".idf_escape($A);$M[]=($za?"$za AS ":"").idf_escape($A);}}$K=array();if(!support("table"))$M=array("*");if($M){$I=$m->select($a,$M,array($Z),$M,array(),(isset($_GET["select"])?2:1));if(!$I)$n=error();else{$K=$I->fetch_assoc();if(!$K)$K=false;}if(isset($_GET["select"])&&(!$K||$I->fetch_assoc()))$K=null;}}if(!support("table")&&!$p){if(!$Z){$I=$m->select($a,array("*"),$Z,array("*"));$K=($I?$I->fetch_assoc():false);if(!$K)$K=array($m->primary=>"");}if($K){foreach($K
as$x=>$X){if(!$Z)$K[$x]=null;$p[$x]=array("field"=>$x,"null"=>($x!=$m->primary),"auto_increment"=>($x==$m->primary));}}}edit_form($a,$p,$K,$Kg);}elseif(isset($_GET["select"])){$a=$_GET["select"];$S=table_status1($a);$v=indexes($a);$p=fields($a);$_c=column_foreign_keys($a);$ke=$S["Oid"];parse_str($_COOKIE["adminer_import"],$sa);$mf=array();$f=array();$gg=null;foreach($p
as$x=>$o){$A=$b->fieldName($o);if(isset($o["privileges"]["select"])&&$A!=""){$f[$x]=html_entity_decode(strip_tags($A),ENT_QUOTES);if(is_shortable($o))$gg=$b->selectLengthProcess();}$mf+=$o["privileges"];}list($M,$Gc)=$b->selectColumnsProcess($f,$v);$od=count($Gc)<count($M);$Z=$b->selectSearchProcess($p,$v);$C=$b->selectOrderProcess($p,$v);$y=$b->selectLimitProcess();if($_GET["val"]&&is_ajax()){header("Content-Type: text/plain; charset=utf-8");foreach($_GET["val"]as$Gg=>$K){$za=convert_field($p[key($K)]);$M=array($za?$za:idf_escape(key($K)));$Z[]=where_check($Gg,$p);$J=$m->select($a,$M,$Z,$M);if($J)echo
reset($J->fetch_row());}exit;}$Me=$Ig=null;foreach($v
as$u){if($u["type"]=="PRIMARY"){$Me=array_flip($u["columns"]);$Ig=($M?$Me:array());foreach($Ig
as$x=>$X){if(in_array(idf_escape($x),$M))unset($Ig[$x]);}break;}}if($ke&&!$Me){$Me=$Ig=array($ke=>0);$v[]=array("type"=>"PRIMARY","columns"=>array($ke));}if($_POST&&!$n){$dh=$Z;if(!$_POST["all"]&&is_array($_POST["check"])){$Xa=array();foreach($_POST["check"]as$Ua)$Xa[]=where_check($Ua,$p);$dh[]="((".implode(") OR (",$Xa)."))";}$dh=($dh?"\nWHERE ".implode(" AND ",$dh):"");if($_POST["export"]){cookie("adminer_import","output=".urlencode($_POST["output"])."&format=".urlencode($_POST["format"]));dump_headers($a);$b->dumpTable($a,"");$Dc=($M?implode(", ",$M):"*").convert_fields($f,$p,$M)."\nFROM ".table($a);$Ic=($Gc&&$od?"\nGROUP BY ".implode(", ",$Gc):"").($C?"\nORDER BY ".implode(", ",$C):"");if(!is_array($_POST["check"])||$Me)$G="SELECT $Dc$dh$Ic";else{$Eg=array();foreach($_POST["check"]as$X)$Eg[]="(SELECT".limit($Dc,"\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$p).$Ic,1).")";$G=implode(" UNION ALL ",$Eg);}$b->dumpData($a,"table",$G);exit;}if(!$b->selectEmailProcess($Z,$_c)){if($_POST["save"]||$_POST["delete"]){$I=true;$ta=0;$P=array();if(!$_POST["delete"]){foreach($f
as$A=>$X){$X=process_input($p[$A]);if($X!==null&&($_POST["clone"]||$X!==false))$P[idf_escape($A)]=($X!==false?$X:idf_escape($A));}}if($_POST["delete"]||$P){if($_POST["clone"])$G="INTO ".table($a)." (".implode(", ",array_keys($P)).")\nSELECT ".implode(", ",$P)."\nFROM ".table($a);if($_POST["all"]||($Me&&is_array($_POST["check"]))||$od){$I=($_POST["delete"]?$m->delete($a,$dh):($_POST["clone"]?queries("INSERT $G$dh"):$m->update($a,$P,$dh)));$ta=$g->affected_rows;}else{foreach((array)$_POST["check"]as$X){$Zg="\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$p);$I=($_POST["delete"]?$m->delete($a,$Zg,1):($_POST["clone"]?queries("INSERT".limit1($a,$G,$Zg)):$m->update($a,$P,$Zg,1)));if(!$I)break;$ta+=$g->affected_rows;}}}$Td=lang(array('%d item has been affected.','%d items have been affected.'),$ta);if($_POST["clone"]&&$I&&$ta==1){$Ad=last_id();if($Ad)$Td=sprintf('Item%s has been inserted.'," $Ad");}queries_redirect(remove_from_uri($_POST["all"]&&$_POST["delete"]?"page":""),$Td,$I);if(!$_POST["delete"]){edit_form($a,$p,(array)$_POST["fields"],!$_POST["clone"]);page_footer();exit;}}elseif(!$_POST["import"]){if(!$_POST["val"])$n='Ctrl+click on a value to modify it.';else{$I=true;$ta=0;foreach($_POST["val"]as$Gg=>$K){$P=array();foreach($K
as$x=>$X){$x=bracket_escape($x,1);$P[idf_escape($x)]=(preg_match('~char|text~',$p[$x]["type"])||$X!=""?$b->processInput($p[$x],$X):"NULL");}$I=$m->update($a,$P," WHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($Gg,$p),!$od&&!$Me," ");if(!$I)break;$ta+=$g->affected_rows;}queries_redirect(remove_from_uri(),lang(array('%d item has been affected.','%d items have been affected.'),$ta),$I);}}elseif(!is_string($nc=get_file("csv_file",true)))$n=upload_error($nc);elseif(!preg_match('~~u',$nc))$n='File must be in UTF-8 encoding.';else{cookie("adminer_import","output=".urlencode($sa["output"])."&format=".urlencode($_POST["separator"]));$I=true;$gb=array_keys($p);preg_match_all('~(?>"[^"]*"|[^"\r\n]+)+~',$nc,$Nd);$ta=count($Nd[0]);$m->begin();$N=($_POST["separator"]=="csv"?",":($_POST["separator"]=="tsv"?"\t":";"));$L=array();foreach($Nd[0]as$x=>$X){preg_match_all("~((?>\"[^\"]*\")+|[^$N]*)$N~",$X.$N,$Od);if(!$x&&!array_diff($Od[1],$gb)){$gb=$Od[1];$ta--;}else{$P=array();foreach($Od[1]as$r=>$db)$P[idf_escape($gb[$r])]=($db==""&&$p[$gb[$r]]["null"]?"NULL":q(str_replace('""','"',preg_replace('~^"|"$~','',$db))));$L[]=$P;}}$I=(!$L||$m->insertUpdate($a,$L,$Me));if($I)$I=$m->commit();queries_redirect(remove_from_uri("page"),lang(array('%d row has been imported.','%d rows have been imported.'),$ta),$I);$m->rollback();}}}$Zf=$b->tableName($S);if(is_ajax()){page_headers();ob_start();}else
page_header('Select'.": $Zf",$n);$P=null;if(isset($mf["insert"])||!support("table")){$P="";foreach((array)$_GET["where"]as$X){if($_c[$X["col"]]&&count($_c[$X["col"]])==1&&($X["op"]=="="||(!$X["op"]&&!preg_match('~[_%]~',$X["val"]))))$P.="&set".urlencode("[".bracket_escape($X["col"])."]")."=".urlencode($X["val"]);}}$b->selectLinks($S,$P);if(!$f&&support("table"))echo"<p class='error'>".'Unable to select the table'.($p?".":": ".error())."\n";else{echo"<form action='' id='form'>\n","<div style='display: none;'>";hidden_fields_get();echo(DB!=""?'<input type="hidden" name="db" value="'.h(DB).'">'.(isset($_GET["ns"])?'<input type="hidden" name="ns" value="'.h($_GET["ns"]).'">':""):"");echo'<input type="hidden" name="select" value="'.h($a).'">',"</div>\n";$b->selectColumnsPrint($M,$f);$b->selectSearchPrint($Z,$f,$v);$b->selectOrderPrint($C,$f,$v);$b->selectLimitPrint($y);$b->selectLengthPrint($gg);$b->selectActionPrint($v);echo"</form>\n";$D=$_GET["page"];if($D=="last"){$Bc=$g->result(count_rows($a,$Z,$od,$Gc));$D=floor(max(0,$Bc-1)/$y);}$tf=$M;$Hc=$Gc;if(!$tf){$tf[]="*";$pb=convert_fields($f,$p,$M);if($pb)$tf[]=substr($pb,2);}foreach($M
as$x=>$X){$o=$p[idf_unescape($X)];if($o&&($za=convert_field($o)))$tf[$x]="$za AS $X";}if(!$od&&$Ig){foreach($Ig
as$x=>$X){$tf[]=idf_escape($x);if($Hc)$Hc[]=idf_escape($x);}}$I=$m->select($a,$tf,$Z,$Hc,$C,$y,$D,true);if(!$I)echo"<p class='error'>".error()."\n";else{if($w=="mssql"&&$D)$I->seek($y*$D);$Sb=array();echo"<form action='' method='post' enctype='multipart/form-data'>\n";$L=array();while($K=$I->fetch_assoc()){if($D&&$w=="oracle")unset($K["RNUM"]);$L[]=$K;}if($_GET["page"]!="last"&&$y!=""&&$Gc&&$od&&$w=="sql")$Bc=$g->result(" SELECT FOUND_ROWS()");if(!$L)echo"<p class='message'>".'No rows.'."\n";else{$Ka=$b->backwardKeys($a,$Zf);echo"<div class='scrollable'>","<table id='table' cellspacing='0' class='nowrap checkable'>",script("mixin(qs('#table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true), onkeydown: editingKeydown});"),"<thead><tr>".(!$Gc&&$M?"":"<td><input type='checkbox' id='all-page' class='jsonly'>".script("qs('#all-page').onclick = partial(formCheck, /check/);","")." <a href='".h($_GET["modify"]?remove_from_uri("modify"):$_SERVER["REQUEST_URI"]."&modify=1")."'>".'Modify'."</a>");$be=array();$Fc=array();reset($M);$Xe=1;foreach($L[0]as$x=>$X){if(!isset($Ig[$x])){$X=$_GET["columns"][key($M)];$o=$p[$M?($X?$X["col"]:current($M)):$x];$A=($o?$b->fieldName($o,$Xe):($X["fun"]?"*":$x));if($A!=""){$Xe++;$be[$x]=$A;$e=idf_escape($x);$Uc=remove_from_uri('(order|desc)[^=]*|page').'&order%5B0%5D='.urlencode($x);$Bb="&desc%5B0%5D=1";echo"<th>".script("mixin(qsl('th'), {onmouseover: partial(columnMouse), onmouseout: partial(columnMouse, ' hidden')});",""),'<a href="'.h($Uc.($C[0]==$e||$C[0]==$x||(!$C&&$od&&$Gc[0]==$e)?$Bb:'')).'">';echo
apply_sql_function($X["fun"],$A)."</a>";echo"<span class='column hidden'>","<a href='".h($Uc.$Bb)."' title='".'descending'."' class='text'> ‚Üì</a>";if(!$X["fun"]){echo'<a href="#fieldset-search" title="'.'Search'.'" class="text jsonly"> =</a>',script("qsl('a').onclick = partial(selectSearch, '".js_escape($x)."');");}echo"</span>";}$Fc[$x]=$X["fun"];next($M);}}$Dd=array();if($_GET["modify"]){foreach($L
as$K){foreach($K
as$x=>$X)$Dd[$x]=max($Dd[$x],min(40,strlen(utf8_decode($X))));}}echo($Ka?"<th>".'Relations':"")."</thead>\n";if(is_ajax()){if($y%2==1&&$D%2==1)odd();ob_end_clean();}foreach($b->rowDescriptions($L,$_c)as$ae=>$K){$Fg=unique_array($L[$ae],$v);if(!$Fg){$Fg=array();foreach($L[$ae]as$x=>$X){if(!preg_match('~^(COUNT\((\*|(DISTINCT )?`(?:[^`]|``)+`)\)|(AVG|GROUP_CONCAT|MAX|MIN|SUM)\(`(?:[^`]|``)+`\))$~',$x))$Fg[$x]=$X;}}$Gg="";foreach($Fg
as$x=>$X){if(($w=="sql"||$w=="pgsql")&&preg_match('~char|text|enum|set~',$p[$x]["type"])&&strlen($X)>64){$x=(strpos($x,'(')?$x:idf_escape($x));$x="MD5(".($w!='sql'||preg_match("~^utf8~",$p[$x]["collation"])?$x:"CONVERT($x USING ".charset($g).")").")";$X=md5($X);}$Gg.="&".($X!==null?urlencode("where[".bracket_escape($x)."]")."=".urlencode($X):"null%5B%5D=".urlencode($x));}echo"<tr".odd().">".(!$Gc&&$M?"":"<td>".checkbox("check[]",substr($Gg,1),in_array(substr($Gg,1),(array)$_POST["check"])).($od||information_schema(DB)?"":" <a href='".h(ME."edit=".urlencode($a).$Gg)."' class='edit'>".'edit'."</a>"));foreach($K
as$x=>$X){if(isset($be[$x])){$o=$p[$x];$X=$m->value($X,$o);if($X!=""&&(!isset($Sb[$x])||$Sb[$x]!=""))$Sb[$x]=(is_mail($X)?$be[$x]:"");$z="";if(preg_match('~blob|bytea|raw|file~',$o["type"])&&$X!="")$z=ME.'download='.urlencode($a).'&field='.urlencode($x).$Gg;if(!$z&&$X!==null){foreach((array)$_c[$x]as$zc){if(count($_c[$x])==1||end($zc["source"])==$x){$z="";foreach($zc["source"]as$r=>$If)$z.=where_link($r,$zc["target"][$r],$L[$ae][$If]);$z=($zc["db"]!=""?preg_replace('~([?&]db=)[^&]+~','\1'.urlencode($zc["db"]),ME):ME).'select='.urlencode($zc["table"]).$z;if($zc["ns"])$z=preg_replace('~([?&]ns=)[^&]+~','\1'.urlencode($zc["ns"]),$z);if(count($zc["source"])==1)break;}}}if($x=="COUNT(*)"){$z=ME."select=".urlencode($a);$r=0;foreach((array)$_GET["where"]as$W){if(!array_key_exists($W["col"],$Fg))$z.=where_link($r++,$W["col"],$W["val"],$W["op"]);}foreach($Fg
as$rd=>$W)$z.=where_link($r++,$rd,$W);}$X=select_value($X,$z,$o,$gg);$s=h("val[$Gg][".bracket_escape($x)."]");$Y=$_POST["val"][$Gg][bracket_escape($x)];$Ob=!is_array($K[$x])&&is_utf8($X)&&$L[$ae][$x]==$K[$x]&&!$Fc[$x];$fg=preg_match('~text|lob~',$o["type"]);echo"<td id='$s'";if(($_GET["modify"]&&$Ob)||$Y!==null){$Kc=h($Y!==null?$Y:$K[$x]);echo">".($fg?"<textarea name='$s' cols='30' rows='".(substr_count($K[$x],"\n")+1)."'>$Kc</textarea>":"<input name='$s' value='$Kc' size='$Dd[$x]'>");}else{$Id=strpos($X,"<i>‚Ä¶</i>");echo" data-text='".($Id?2:($fg?1:0))."'".($Ob?"":" data-warning='".h('Use edit link to modify this value.')."'").">$X</td>";}}}if($Ka)echo"<td>";$b->backwardKeysPrint($Ka,$L[$ae]);echo"</tr>\n";}if(is_ajax())exit;echo"</table>\n","</div>\n";}if(!is_ajax()){if($L||$D){$ac=true;if($_GET["page"]!="last"){if($y==""||(count($L)<$y&&($L||!$D)))$Bc=($D?$D*$y:0)+count($L);elseif($w!="sql"||!$od){$Bc=($od?false:found_rows($S,$Z));if($Bc<max(1e4,2*($D+1)*$y))$Bc=reset(slow_query(count_rows($a,$Z,$od,$Gc)));else$ac=false;}}$ye=($y!=""&&($Bc===false||$Bc>$y||$D));if($ye){echo(($Bc===false?count($L)+1:$Bc-$D*$y)>$y?'<p><a href="'.h(remove_from_uri("page")."&page=".($D+1)).'" class="loadmore">'.'Load more data'.'</a>'.script("qsl('a').onclick = partial(selectLoadMore, ".(+$y).", '".'Loading'."‚Ä¶');",""):''),"\n";}}echo"<div class='footer'><div>\n";if($L||$D){if($ye){$Pd=($Bc===false?$D+(count($L)>=$y?2:1):floor(($Bc-1)/$y));echo"<fieldset>";if($w!="simpledb"){echo"<legend><a href='".h(remove_from_uri("page"))."'>".'Page'."</a></legend>",script("qsl('a').onclick = function () { pageClick(this.href, +prompt('".'Page'."', '".($D+1)."')); return false; };"),pagination(0,$D).($D>5?" ‚Ä¶":"");for($r=max(1,$D-4);$r<min($Pd,$D+5);$r++)echo
pagination($r,$D);if($Pd>0){echo($D+5<$Pd?" ‚Ä¶":""),($ac&&$Bc!==false?pagination($Pd,$D):" <a href='".h(remove_from_uri("page")."&page=last")."' title='~$Pd'>".'last'."</a>");}}else{echo"<legend>".'Page'."</legend>",pagination(0,$D).($D>1?" ‚Ä¶":""),($D?pagination($D,$D):""),($Pd>$D?pagination($D+1,$D).($Pd>$D+1?" ‚Ä¶":""):"");}echo"</fieldset>\n";}echo"<fieldset>","<legend>".'Whole result'."</legend>";$Gb=($ac?"":"~ ").$Bc;echo
checkbox("all",1,0,($Bc!==false?($ac?"":"~ ").lang(array('%d row','%d rows'),$Bc):""),"var checked = formChecked(this, /check/); selectCount('selected', this.checked ? '$Gb' : checked); selectCount('selected2', this.checked || !checked ? '$Gb' : checked);")."\n","</fieldset>\n";if($b->selectCommandPrint()){echo'<fieldset',($_GET["modify"]?'':' class="jsonly"'),'><legend>Modify</legend><div>
<input type="submit" value="Save"',($_GET["modify"]?'':' title="'.'Ctrl+click on a value to modify it.'.'"'),'>
</div></fieldset>
<fieldset><legend>Selected <span id="selected"></span></legend><div>
<input type="submit" name="edit" value="Edit">
<input type="submit" name="clone" value="Clone">
<input type="submit" name="delete" value="Delete">',confirm(),'</div></fieldset>
';}$Ac=$b->dumpFormat();foreach((array)$_GET["columns"]as$e){if($e["fun"]){unset($Ac['sql']);break;}}if($Ac){print_fieldset("export",'Export'." <span id='selected2'></span>");$we=$b->dumpOutput();echo($we?html_select("output",$we,$sa["output"])." ":""),html_select("format",$Ac,$sa["format"])," <input type='submit' name='export' value='".'Export'."'>\n","</div></fieldset>\n";}$b->selectEmailPrint(array_filter($Sb,'strlen'),$f);}echo"</div></div>\n";if($b->selectImportPrint()){echo"<div>","<a href='#import'>".'Import'."</a>",script("qsl('a').onclick = partial(toggle, 'import');",""),"<span id='import' class='hidden'>: ","<input type='file' name='csv_file'> ",html_select("separator",array("csv"=>"CSV,","csv;"=>"CSV;","tsv"=>"TSV"),$sa["format"],1);echo" <input type='submit' name='import' value='".'Import'."'>","</span>","</div>";}echo"<input type='hidden' name='token' value='$rg'>\n","</form>\n",(!$Gc&&$M?"":script("tableCheck();"));}}}if(is_ajax()){ob_end_clean();exit;}}elseif(isset($_GET["script"])){if($_GET["script"]=="kill")$g->query("KILL ".number($_POST["kill"]));elseif(list($R,$s,$A)=$b->_foreignColumn(column_foreign_keys($_GET["source"]),$_GET["field"])){$y=11;$I=$g->query("SELECT $s, $A FROM ".table($R)." WHERE ".(preg_match('~^[0-9]+$~',$_GET["value"])?"$s = $_GET[value] OR ":"")."$A LIKE ".q("$_GET[value]%")." ORDER BY 2 LIMIT $y");for($r=1;($K=$I->fetch_row())&&$r<$y;$r++)echo"<a href='".h(ME."edit=".urlencode($R)."&where".urlencode("[".bracket_escape(idf_unescape($s))."]")."=".urlencode($K[0]))."'>".h($K[1])."</a><br>\n";if($K)echo"...\n";}exit;}else{page_header('Server',"",false);if($b->homepage()){echo"<form action='' method='post'>\n","<p>".'Search data in tables'.": <input type='search' name='query' value='".h($_POST["query"])."'> <input type='submit' value='".'Search'."'>\n";if($_POST["query"]!="")search_tables();echo"<div class='scrollable'>\n","<table cellspacing='0' class='nowrap checkable'>\n",script("mixin(qsl('table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true)});"),'<thead><tr class="wrap">','<td><input id="check-all" type="checkbox" class="jsonly">'.script("qs('#check-all').onclick = partial(formCheck, /^tables\[/);",""),'<th>'.'Table','<td>'.'Rows',"</thead>\n";foreach(table_status()as$R=>$K){$A=$b->tableName($K);if(isset($K["Engine"])&&$A!=""){echo'<tr'.odd().'><td>'.checkbox("tables[]",$R,in_array($R,(array)$_POST["tables"],true)),"<th><a href='".h(ME).'select='.urlencode($R)."'>$A</a>";$X=format_number($K["Rows"]);echo"<td align='right'><a href='".h(ME."edit=").urlencode($R)."'>".($K["Engine"]=="InnoDB"&&$X?"~ $X":$X)."</a>";}}echo"</table>\n","</div>\n","</form>\n",script("tableCheck();");}}page_footer();