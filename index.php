<?php
include_once 'tj2fa.php';
$text = $_POST['tj_text'];
$convertLatin2Cyr = false;
if(isset($_POST['convertLatin2Cyr'])){
    $convertLatin2Cyr = true;
}
if(isset($_POST['spellCorrect'])){
    $spellCorrect = true;
}
$fa_text = tj2fa($text,$convertLatin2Cyr,$spellCorrect);
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
            <input type="checkbox" name="spellCorrect" value="true"> اصلاح لهجه(آزمایشی)
            <br>
            <input type="submit" value="تبدیل(табдил)"/>
            <br>
            <label>فارسی:</label>
            <br>
            <label style="background-color: Lavender;"><?=$fa_text?></label>
        </form>
        <br>
        <a href="https://github.com/shahind/tj2fa_php">PHP Source Code(Beta 1.0.3)
        <br>
        <img src="https://github.githubassets.com/images/modules/logos_page/GitHub-Mark.png" width="75"/>
        <img src="https://github.githubassets.com/images/modules/logos_page/GitHub-Logo.png" width="150"/></a>
        </center>
    </body>
</html>