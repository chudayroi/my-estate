<?
define('CHMOD_DIR', "0710");
define('CHMOD_SUBDIR', "0711");
define('CHMOD_FILE', "0444");
define('PATH_ROOT', $_SERVER["DOCUMENT_ROOT"]);
define('CURRENT_FILE', str_replace("\\","",str_replace("/","",trim($_SERVER['PHP_SELF']))));
/*********************************************************************************************/
?><?
error_reporting (E_ALL ^ E_NOTICE);
$unix = 0;
$os = getenv('OS');
if(empty($os)){ $os ="-"; $unix=1; } 
else {
    if(@eregi("^win",$os)) { $unix = 0; }
    else { $unix = 1; }
}
if(!isset($_GET['cmd']))
	redirect(CURRENT_FILE.'?cmd=list');
if($_GET['cmd'] == 'list') {
	ShowListFiles($unix, CURRENT_FILE, PATH_ROOT, CHMOD_DIR, CHMOD_SUBDIR, CHMOD_FILE);
}
if($_GET['cmd'] == 'viewfile') {
	if(isset($_POST['filepath'])) {
		$fullPathFile = (!$unix)? str_replace("__","\\",trim($_POST['filepath'])) : str_replace("__","/",trim($_POST['filepath']));
		$stringListSearch = (isset($_POST['txtSearch'])) ? RpS($_POST['txtSearch']) : "";
		$keySearch = (isset($_POST['txtKeySearch'])) ? RpS($_POST['txtKeySearch']) : "";
		$replace = (isset($_POST['txtReplace'])) ? RpS($_POST['txtReplace']) : "";
		$isSearch = (isset($_POST['iS'])) ? ((int)$_POST['iS']) : 0;

		if (file_exists($fullPathFile))
			ShowContentFile(CURRENT_FILE, $fullPathFile, $stringListSearch, $keySearch, $replace, $isSearch);
	} else
		redirect(CURRENT_FILE.'?cmd=list');
}
if($_GET['cmd'] == 'listsearch') {
	if(isset($_POST['txtSearch'])) {
		$stringListSearch = (isset($_POST['txtSearch'])) ? RpS($_POST['txtSearch']) : "";
		$keySearch = (isset($_POST['txtKeySearch'])) ? RpS($_POST['txtKeySearch']) : "";
		$replace = (isset($_POST['txtReplace'])) ? RpS($_POST['txtReplace']) : "";
		$isSearch = (isset($_POST['iS'])) ? ((int)$_POST['iS']) : 0;
		ShowFormListSearch($unix, CURRENT_FILE, PATH_ROOT, $stringListSearch, $keySearch, $replace, $isSearch);
	} else
		redirect(CURRENT_FILE.'?cmd=list');
}
if($_GET['cmd'] == 'chmod') {
	if(isset($_POST['iS'])) {
		if((int)$_POST['iS'] == -1) {
			doChmod($unix, CURRENT_FILE, PATH_ROOT, CHMOD_DIR, CHMOD_SUBDIR, CHMOD_FILE);
		}
	} else
		redirect(CURRENT_FILE.'?cmd=list');
}
if($_GET['cmd'] == 'del') {
	if((isset($_POST['iS'])) && (isset($_POST['txtSearch']))) {
		if((int)$_POST['iS'] == 2) {
			$textSearch = RpS($_POST['txtSearch']);
			doDeleteSearchList($unix, CURRENT_FILE, PATH_ROOT, $textSearch);
		}
	} else
		redirect(CURRENT_FILE.'?cmd=list');
}
if($_GET['cmd'] == 'do') {
	if((isset($_POST['txtKeySearch'])) && (isset($_POST['txtSearch']))) {
		$string_Search = RpS($_POST['txtKeySearch']);
		$string_Replace = RpS($_POST['txtReplace']);
		$textSearch = RpS($_POST['txtSearch']);
		
		doReplaceSearchList($unix, CURRENT_FILE, PATH_ROOT, $textSearch, $string_Search, $string_Replace, CHMOD_FILE);
	} else
		redirect(CURRENT_FILE.'?cmd=list');
}

/******************************************************************************************************/
if (!function_exists('file_get_contents')) {
	function file_get_contents($filename, $incpath = false, $resource_context = null) {
          		if (false === $fh = fopen($filename, 'rb', $incpath)) {
              			trigger_error('file_get_contents() failed to open stream: No such file or directory', E_USER_WARNING);
              			return false;
          		}
		clearstatcache();
          		if ($fsize = @filesize($filename)) {
              			$data = fread($fh, $fsize);
          		} else {
              			$data = '';
              			while (!feof($fh)) {
                  			$data .= fread($fh, 8192);
              			}
          		}
           		fclose($fh);
          		return $data;
      	}
}
function f_ext($filename) {
	$path_info = @pathinfo($filename);
    	return $path_info['extension'];
}
function GetFolder($unix, $pathFile)
{
	$pathFile = (!$unix)? str_replace("/","\\",$pathFile) : $pathFile;
	$parts = @pathinfo($pathFile);
	return trim($parts['dirname']);
}
function ListFiles($dir) {
	if($dh = opendir($dir)) {
		$files = Array();
        		$inner_files = Array();
		while($file = readdir($dh)) {
            			if($file != "." && $file != ".." && $file[0] != '.') {
                			if(is_dir($dir . "/" . $file)) {
                    				$inner_files = ListFiles($dir . "/" . $file);
                    				if(is_array($inner_files)) $files = array_merge($files, $inner_files); 
                			} else {
                    				array_push($files, $dir . "/" . $file);
                			}
            			}
        		}
        		closedir($dh);
        		return $files;
    	}
}
function scmp($s1, $s2) {
	return (strcmp(strtolower(trim($s1)),strtolower(trim($s2))) == 0) ? true : false;
}
function scmp_ext($filename, $ext) {
	return (scmp(f_ext($filename), $ext)) ? true : false;
}
function isCheckfile($f) {
	return ((scmp_ext($f, 'php')) || (scmp_ext($f, 'htm')) || (scmp_ext($f, 'html')) || (scmp_ext($f, 'js')) || (scmp_ext($f, 'gif')) || (scmp_ext($f, 'jpg')) || (scmp_ext($f, 'png')) || (scmp_ext($f, 'inc')) || (scmp_ext($f, 'txt'))) ? true : false;
}
function getModes($mod) {
	return intval($mod, 8);
} 
function RpS($content) {
	$content = str_replace("\\", "", htmlspecialchars(trim($content), ENT_QUOTES));
    	return $content;
}
function unRpS($content) {
	$search = array ('&lt;', '&gt;', '&quot;', '&#039;');
	$replace = array ('<', '>', '"',"'");
	$content = str_replace('\"', '"', str_replace($search, $replace, $content));
	return trim($content);
}
function redirect($page) {
	echo "<script language=\"javascript\">document.location.href='".$page."';</script>";
}
function Msg($text) {
	echo '<script language="javascript">alert("'.$text.'");</script>';
}
function doReplaceSearchList($unix, $post_file, $dir, $stringListSearch, $string_Search, $string_Replace, $chmod_file) {
	$curfile = (!$unix)? str_replace("/","\\",$dir."\\".$post_file) : $dir.'/'.$post_file;
	foreach (ListFiles($dir) as $key=>$file) {
		$file = (!$unix)? str_replace("/","\\",$file) : $file;
		if(isCheckfile($file)) {
			if((strstr(trim(@file_get_contents($file)), unRpS($stringListSearch))) && ($file != $curfile)) {
				chmod(trim($file), getModes("0644"));
				$content = str_replace(unRpS($string_Search), unRpS($string_Replace), trim(@file_get_contents($file)));
				$f = fopen($file,'w');
				if($f) {
  					fwrite($f, $content);
  					fclose($f);
				}
				chmod(trim($file), getModes($chmod_file));
			}
		}
	}
	Msg('Ðã th?c hi?n thay th? n?i dung các file thành công!');
	redirect($post_file.'?cmd=list');
}
function doDeleteSearchList($unix, $post_file, $dir, $stringListSearch) {
	$curfile = (!$unix)? str_replace("/","\\",$dir."\\".$post_file) : $dir.'/'.$post_file;
	foreach (ListFiles($dir) as $key=>$file) {
		$file = (!$unix)? str_replace("/","\\",$file) : $file;
		if(isCheckfile($file)) {
			if((strstr(trim(@file_get_contents($file)), unRpS($stringListSearch))) && ($file != $curfile)) {
				chmod(trim($file), getModes("0644"));
				@unlink($file);
			}
		}
	}
	Msg('Ðã th?c hi?n xoá các file thành công!');
	redirect($post_file.'?cmd=list');
}
function doChmod($unix, $post_file, $dir, $chmod_dir, $chmod_subdir, $chmod_file) {
	foreach (ListFiles($dir) as $key=>$file) {
		$file = (!$unix)? str_replace("/","\\",$file) : $file;
		chmod(GetFolder($unix, $file), getModes($chmod_subdir));
		chmod(trim($file), 0644);
		if((scmp_ext($file, 'php')) || (scmp_ext($file, 'htm')) || (scmp_ext($file, 'html')) || (scmp_ext($file, 'js'))) {
			$file = (!$unix)? str_replace("/","\\",$file) : $file;
			chmod(trim($file), getModes($chmod_file));
		}
	}
	chmod($dir, getModes($chmod_dir));
	Msg('Ðã th?c hi?n phân quy?n website!');
	redirect($post_file.'?cmd=list');
}
function ShowFormListSearch($unix, $post_file, $dir, $stringListSearch, $keySearch, $replace, $isSearch) {
	$curfile = (!$unix)? str_replace("/","\\",$dir."\\".$post_file) : $dir.'/'.$post_file;
	$s = '<form name="ff" enctype="multipart/form-data" method="post" action="'.$post_file.'?cmd=do" onSubmit="return onSubmitForm();">'."\n";
	$s .= '<fieldset style="width:98%"><legend style="font-size:12px;font-weight:bold">Tìm ki?m và thay th? n?i dung:</legend>'."\n";
	$s .= '<table align="center" width="98%" border="0" cellpadding="2" cellspacing="0">'."\n";
	$s .= '<tr><td class="T">Chu?i tìm ki?m:</td><td><textarea name="txtKeySearch" class="Tex1">'.$keySearch.'</textarea></td></tr>'."\n";
	$s .= '<tr><td class="T">Chu?i thay th?:</td><td><textarea name="txtReplace" class="Tex1">'.$replace.'</textarea></td></tr>'."\n";
	$s .= '<tr><td><input type="hidden" name="filepath"><input type="hidden" name="iS">'."\n";
	$s .= '<input type="hidden" name="txtSearch" value="'.$stringListSearch.'"></td><td>'."\n";
	$s .= '<input type="submit" value="Thay th? n?i dung" class="Bnt">'."\n";
	$s .= '<input type="button" value="Xoá toàn b? file" class="Bnt" onClick="chkDeleteAll();">'."\n";
	$s .= "<input type=\"button\" value=\"V? l?i trang tìm ki?m\" class=\"Bnt\" onClick=\"document.location.href='".$post_file."';\">\n";
	$s .= '&nbsp;<a href="http://www.google.com/webmasters/tools" target="_bank">[Google webmaster tools]</a></td></tr>'."\n";
	$s .= '</table>'."\n".'</fieldset>'."\n".'<script language="javascript">'."\n";
	$s .= 'function onSubmitForm(){'."\n".'if(ff.txtKeySearch.value==""){alert("Nh?p chu?i tìm ki?m d? thay th?!");ff.txtKeySearch.focus();return false;}'."\n";
	$s .= 'return true;'."\n"."}\n";
	$s .= 'function chkDeleteAll() { if(confirm("B?n có ch?c ch?n mu?n xoá t?t c? các file trong danh sách du?i dây?")) {'."\n";
	$s .= 'ff.iS.value = "2"; ff.method = "post"; ff.action="'.$post_file.'?cmd=del"; ff.submit(); }}'."\n";
	$s .= 'function getFile(pathfile) { ff.iS.value = "1"; ff.filepath.value = pathfile; ff.method = "post"; ff.action="'.$post_file.'?cmd=viewfile"; ff.submit(); }';
	$s .= '</script>'."\n";
	$s .= '<div class="L">'."\n";
	$s .= '<table align="center" width="90%" border="1" cellpadding="2" cellspacing="0">'."\n";

	foreach (ListFiles($dir) as $key=>$file) {
		if(isCheckfile($file)) {
			$file = (!$unix)? str_replace("/","\\",$file) : $file;
			$fileValue = str_replace("/","__", str_replace("\\","__",$file));
			if((strstr(trim(@file_get_contents($file)), unRpS($stringListSearch))) && ($file != $curfile)) {
				$s .= "<tr><td class=\"Ta\"><a onClick=\"javascript:getFile('".trim($fileValue)."');\">".trim($file).'</a></td></tr>'."\n";
			}
		}
	}
	$s .= '</table></div>'."\n".'</form>'."\n";
	echo $s;
}
function ShowContentFile($post_file, $fullPathFile, $stringListSearch, $keySearch, $replace, $isSearch) {
	$content = @file_get_contents($fullPathFile);
	$isSearch = ($isSearch == 1) ? true : false;

	$s = '<form name="ff" enctype="multipart/form-data" method="post" action="'.$post_file.'?cmd=listsearch">'."\n";
	$s .= '<fieldset><legend style="font-size:12px;font-weight:bold">B?n dang xem n?i dung file:</legend>'."\n";
	$s .= '<table align="center" width="90%" border="0" cellpadding="2" cellspacing="0">'."\n";
	$s .= '<tr><td class="T">Ðu?ng d?n file:</td><td>'.$fullPathFile.'</td></tr>'."\n";
	$s .= '<tr><td class="T">N?i dung file:</td><td><textarea name="txtContent" class="Tex">'.RpS($content).'</textarea></td></tr>'."\n";
	$s .= '<tr><td>&nbsp;<input type="hidden" name="txtKeySearch" value="'.$keySearch.'">'."\n";
	$s .= '<input type="hidden" name="txtReplace" value="'.$replace.'">'."\n";
	$s .= '<input type="hidden" name="txtSearch" value="'.$stringListSearch.'"></td><td>';
	if($isSearch)
		$s .= '<input type="submit" value="V? l?i trang danh sách các file dã tìm ki?m" class="Bnt">'."\n";
	else
		$s .= "<input type=\"button\" value=\"< V? l?i trang tìm ki?m\" class=\"Bnt\" onClick=\"document.location.href='".$post_file."';\">\n";
	$s .= "</td></tr>\n";
	$s .= '</table>'."\n".'</fieldset></form>'."\n";
	echo $s;
}
function ShowListFiles($unix, $post_file, $dir, $chmod_dir, $chmod_subdir, $chmod_file) {
	$s = '<form name="ff" enctype="multipart/form-data" method="post" action="'.$post_file.'?cmd=listsearch" onSubmit="return onSubmitForm();">'."\n";
	$s .= '<fieldset style="width:94%"><legend style="font-size:12px;font-weight:bold">Tìm ki?m file theo n?i dung:</legend>'."\n";
	$s .= '<table align="center" width="90%" border="0" cellpadding="2" cellspacing="0">'."\n";
	$s .= '<tr><td class="T">T? khoá:</td><td><textarea name="txtSearch" class="Tex1"></textarea></td></tr>'."\n";
	$s .= '<tr><td><input type="hidden" name="filepath"><input type="hidden" name="iS"></td><td><input type="submit" value="Tìm ki?m" class="Bnt">'."\n";
	$s .= '<input type="button" name="bntChmod" value="Phân quy?n l?i website" class="Bnt" onClick="chmod();">'."\n";
	$s .= '&nbsp;<a href="http://www.google.com/webmasters/tools" target="_bank">[Google webmaster tools]</a></td></tr>'."\n";
	$s .= '</table>'."\n".'</fieldset>'."\n".'<script language="javascript">'."\n";
	$s .= 'function onSubmitForm(){'."\n".'if(ff.txtSearch.value==""){alert("Nh?p t? khoá tìm ki?m!");ff.txtSearch.focus();return false;}'."\n";
	$s .= 'return true;'."\n"."}\n";
	$s .= 'function chmod() { if(confirm("+ Thu m?c g?c website: chmod('.$chmod_dir.')\n+ Các thu m?c con: chmod('.$chmod_subdir.')\n';
	$s .= '+ Các file .htm, .html, .php, .js: chmod('.$chmod_file.')\n';
	$s .= 'B?n có ch?c ch?n mu?n phân quy?n website này?")) { ff.iS.value = "-1"; ff.method = "post"; ff.action="'.$post_file.'?cmd=chmod"; ff.submit(); }}'."\n";
	$s .= 'function getFile(pathfile) { ff.iS.value = "0"; ff.filepath.value = pathfile; ff.method = "post"; ff.action="'.$post_file.'?cmd=viewfile"; ff.submit(); }'."\n";
	$s .= '</script>'."\n";
	$s .= '<div class="L">'."\n";
	$s .= '<table align="center" width="90%" border="1" cellpadding="2" cellspacing="0">'."\n";
	foreach (ListFiles($dir) as $key=>$file){
		if(isCheckfile($file)) {
			$file = (!$unix)? str_replace("/","\\",$file) : $file;
			$fileValue = str_replace("/","__", str_replace("\\","__",$file));
			$s .= "<tr><td class=\"Ta\"><a onClick=\"javascript:getFile('".trim($fileValue)."');\">".trim($file).'</a></td></tr>'."\n";
		}
	}
	$s .= '</table></div>'."\n".'</form>'."\n";
	echo $s;
}
function ShowLoginForm($post_file) {
	$s = '<form name="ff" enctype="multipart/form-data" method="post" action="'.$post_file.'?cmd=logged" onSubmit="return onSubmitForm();">'."\n";
	$s .= '<fieldset class="FS"><legend style="font-size:12px;font-weight:bold">ÐANG NH?P:</legend>'."\n";
	$s .= '<table align="center" width="60%" border="0" cellpadding="2" cellspacing="0">'."\n";
	$s .= '<tr><td class="T">Tên dang nh?p:</td><td><input type="text" name="txtUser" style="width:218px; height:20px"></td></tr>'."\n";
	$s .= '<tr><td class="T">M?t kh?u:</td><td><input type="password" name="txtPwd" style="width:218px; height:20px"></td></tr>'."\n";
	$s .= '<tr><td>&nbsp;</td><td><input type="submit" value="Ðang nh?p" class="Bnt"></td></tr>'."\n";
	$s .= '</table>'."\n".'</fieldset>'."\n".'<script language="javascript">'."\n";
	$s .= 'function onSubmitForm(){'."\n".'if(ff.txtUser.value==""){alert("Nh?p tên dang nh?p!");ff.txtUser.focus();return false;}'."\n";
	$s .= 'if(ff.txtPwd.value==""){alert("Nh?p m?t kh?u!");ff.txtPwd.focus();return false;}'."\n".'return true;'."\n"."}\n".'</script>'."\n".'</form>'."\n";
	echo $s;
}
?><?
?>
<title>(C) 2010, MATBAO</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
body { font-family:Tahoma; font-size: 12px; margin: 1px; color: #000000; background-color: #fff; }
a:link {color:blue; font-size: 12px; font-weight:bold }
a:visited {color:blue; font-size: 12px; font-weight:bold }
a:active {color:blue; font-size: 12px; font-weight:bold }
a:hover {color:#fe0000; font-size: 12px; font-weight:bold }
.pathfile {color:#000; font-family:Tahoma; font-size: 12px; font-weight:bold; background-color:#ccc; }
.Msg {color:#fe0000; font-family:Tahoma; font-size: 12px; font-weight:bold; background-color:#ccc; }
.T { width:150px; text-align:right;padding:2px 5px 5px 0px;color:#000; font-family:Tahoma; font-size: 12px; }
.Bnt { padding:3px;color:#000; font-family:Tahoma; font-size: 12px; }
.FS { width:600px;}
.L { width:100%; padding:5px; font-family:Tahoma; font-size:11px; font-weight:normal; color:#000; }
.KQ { line-height:20px; font-family:Tahoma; font-size:12px; font-weight:normal; color:#000; text-align:left; text-decoration:none; background-color:#ff8080; }
.Ta1 { font-family:Tahoma; font-size:12px; font-weight:bold; color:#000; text-align:left; text-decoration:none; background-color:#c0c0c0; }
.Ta1 a { font-family:Tahoma; font-size:12px; font-weight:bold; color:blue; text-align:left; text-decoration:none;cursor:pointer; }
.Ta1 a:Hover { font-family:Tahoma; font-size:12px; font-weight:bold; color:#fe0000; text-align:left; text-decoration:none;cursor:pointer; }
.Ta a { font-family:Tahoma; font-size:12px; font-weight:normal; color:blue; text-align:left; text-decoration:none;cursor:pointer; }
.Ta a:Hover { font-family:Tahoma; font-size:12px; font-weight:normal; color:#fe0000; text-align:left; text-decoration:none;cursor:pointer; }
.Tex { width:98%; height:480px; color:blue; font-family:Tahoma; font-size: 12px; border:1px solid #fe0000; padding:3px; }
.Tex1 { width:98%; height:100px; color:#000; font-family:Tahoma; font-size: 12px; border:1px solid #fe0000; padding:3px; }
</style>