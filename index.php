<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Project (JAM Studios)</title>
</head>
<body style="background-color:#afaeee;">


<?php /*
  $sql = " ";
  $number1 = 3;
  $number2 = 5;
  echo $number1 + $number2;
*/
?>

<?php
$page_content = file_get_contents("pages/content.php");
$page_content = str_replace("!!HEADER!!", file_get_contents("/atcs/raiderrater/header.php"),$page_content);
$page_content = str_replace("!!LEFT_COLUMN!!", file_get_contents("/atcs/raiderrater/leftColumn.php"),$page_content);
$page_content = str_replace("!!FOOTER!!", file_get_contents("/atcs/raiderrater/footer.php"),$page_content);

echo $page_content;
?>
