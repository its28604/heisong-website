<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="refresh" content="5;url=<?php echo './'.pathinfo($_SERVER["HTTP_REFERER"])['filename'].'.html'; ?>"> 
<style type='text/css'>
  ul { list-style: none; }
  body {
  background: #ffcccc no-repeat center top;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  }
</style>
<script type="text/JavaScript" src="../lib/jquery-3.2.1.min.js"></script>
</head>
<body>
<?php
if($_FILES['inputFile']['error']>0){
  exit("檔案上傳失敗！");//如果出現錯誤則停止程式
}
$filename .= pathinfo($_SERVER["HTTP_REFERER"])['filename'];
$type .= substr(strrchr($_FILES['inputFile']['name'], "."), 1); // 去除掉'.'這個符號，所以從第一個字元開始擷取到最後(副檔名)
move_uploaded_file($_FILES['inputFile']['tmp_name'],'./video/'.$filename.".".$type);//複製檔案
touch("./video/".$filename.".tmp");
$tmpfile = fopen("./video/".$filename.".tmp", "w") or die("Unable to open file!");
fwrite($tmpfile, $type);
fclose($tmpfile);
?>
  <div align="center">
    <image style="margin:5%" src="./image/success_button.png"/>
  </div>
</body>
</html>