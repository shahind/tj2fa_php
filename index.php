<?php
include_once 'tj2fa.php';
$text = $_POST['tj_text'];
$convertLatin2Cyr = false;
if(isset($_POST['convertLatin2Cyr'])){
    $convertLatin2Cyr = true;
}

$fa_text = tj2fa($text,$convertLatin2Cyr);
?>

<html>
    <body>
        <center>
        <form method="post">
            <label>матни тоҷики(متن تاجیک)</label>
            <br>
            <textarea id="tj_text" name="tj_text"><?=$text?></textarea>
            <br>
            <input type="checkbox" name="convertLatin2Cyr" value="true"> تبدیل کاراکترهای مشابه لاتین به سیرلیک
            <br>
            <input type="submit" value="تبدیل(табдил)"/>
            <br>
            <label>فارسی:</label>
            <br>
            <label><?=$fa_text?></label>
        </form>
        </center>
    </body>
</html>