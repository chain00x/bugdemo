<?php
if ($_FILES["file"]["error"] > 0)
{
    echo "错误：" . $_FILES["file"]["error"] . "<br>";
}
else
{
    $zip_path="/usr/share/nginx/html/uploads/".md5($_FILES["file"]["name"].time());
    move_uploaded_file($_FILES["file"]["tmp_name"],$zip_path);
    echo "文件url：/uploads/".md5($_FILES["file"]["name"])."<br>";
    $zipf_path="uploads/".md5($_FILES["file"]["name"].time())."_1";
    echo $zipf_path."<br>";
    if (!file_exists($zipf_path)){
        mkdir($zipf_path);
    }
    $path="/usr/share/nginx/html/".$zipf_path;
    exec('unzip '.$zip_path. ' -d '.$path);
    passthru("cat $path/* 2>&1");
}
