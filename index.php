<?php
include_once 'tj2fa.php';
$text = $_POST['tj_text'];
$fa_text = tj2fa($text);
?>

<html>
    <body>
        <center>
        <form method="post">
            <label>матни тоҷики(متن تاجیک)</label>
            <br>
            <textarea id="tj_text" name="tj_text"><?=$text?></textarea>
            <br>
            <input type="submit" value="ثبت"/>
            <br>
            <label>فارسی:</label>
            <br>
            <label><?=$fa_text?></label>
        </form>
        </center>
    </body>
</html>