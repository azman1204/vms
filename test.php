<?php
$zip = new ZipArchive();
$res = $zip->open('file.zip');
if ($res === TRUE) {
  $zip->extractTo('c:/temp/file');
  $zip->close();
  echo 'woot!';
} else {
  echo 'doh!';
}