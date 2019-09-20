<?php
include_once 'SpellCorrector.php';

 function tj2fa($tj_text,&$convertLatin2Cyr=false,&$spellCorrect=false){
     $fa_word = '';
     $fa_text = '';
     $tj_text = mb_strtolower($tj_text);
     $tj_text = correct_especial_words($tj_text);
     if($convertLatin2Cyr){
        $tj_text = correct_latin_characters($tj_text);
     }
     $words = splite_words($tj_text);
     foreach($words as $word){
         for($i = 0; $i<mb_strlen($word); $i++){
             
             if($i==0){
                 $first = true;
             }else{
                 $first = false;
             }
             if($i == mb_strlen($word)-1){
                 $last = true;
             }else{
                 $last = false;
             }
             if(is_samet(mb_substr($word,$i,1))){
                 $char = change_samet(mb_substr($word,$i,1),$first,$last);
             }else if(is_mosavvet(mb_substr($word,$i,1))){
                 $char = change_mosavvet(mb_substr($word,$i,1),$first,$last);
             }else{
                 $char = mb_substr($word,$i,1);
             }
             $fa_word = $fa_word.''.$char;
         }
         $fa_word = correct_tashdid($fa_word);
         $fa_word = filter_common_words($fa_word);
         if($spellCorrect){
                 $fa_word = remove_erab($fa_word);
                 $fa_word = SpellCorrector::correct($fa_word);
             }
         $fa_text = $fa_text.' '.$fa_word;
         $fa_word = '';
     }
     return $fa_text;
 }
 
  function splite_words($text){
     $words = explode (" ", $text);  
     return $words; 
 }
 
  function is_samet($character){
     $array = ['б','в','г','ғ','д','ж','з','к','қ','л','м','н','п','р','с','т','ф','х','ҳ','ч','ҷ','ш','ъ','ё','о'];
     if(in_array($character,$array)){
         return true;
     }else{
         return false;
     }
 }
 
  function is_mosavvet($character){
     $array = ['а','е','и','ӣ','й','у','ӯ','э','ю','я'];
     if(in_array($character,$array)){
         return true;
     }else{
         return false;
     }
 }
 
  function change_samet($char,$first,$last){
     $array = ['б','в','г','ғ','д','ж','з','к','қ','л','м','н','п','р','с','т','ф','х','ҳ','ч','ҷ','ш','ъ','ё','о'];
     if($char==$array[0]){
         return 'ب';
     }
     if($char==$array[1]){
         return 'و';
     }
     if($char==$array[2]){
         return 'گ';
     }
     if($char==$array[3]){
         return 'غ';
     }
     if($char==$array[4]){
         return 'د';
     }
     if($char==$array[5]){
         return 'ژ';
     }
     if($char==$array[6]){
         return 'ز';
     }
     if($char==$array[7]){
         return 'ک';
     }
     if($char==$array[8]){
         return 'ق';
     }
     if($char==$array[9]){
         return 'ل';
     }
     if($char==$array[10]){
         return 'م';
     }
     if($char==$array[11]){
         return 'ن';
     }
     if($char==$array[12]){
         return 'پ';
     }
     if($char==$array[13]){
         return 'ر';
     }
     if($char==$array[14]){
         return 'س';
     }
     if($char==$array[15]){
         return 'ت';
     }
     if($char==$array[16]){
         return 'ف';
     }
     if($char==$array[17]){
         return 'خ';
     }
     if($char==$array[18]){
         return 'ه';
     }
     if($char==$array[19]){
         return 'چ';
     }
     if($char==$array[20]){
         return 'ج';
     }
     if($char==$array[21]){
         return 'ش';
     }
     if($char==$array[22]){
         return 'ع';
     }
     if($char==$array[23]){
         return 'یا';
     }
     if($first && $char==$array[24]){
         return 'آ';
     }
     if($char==$array[24]){
         return 'ا';
     }
}
 
  function change_mosavvet($char,$first,$last){
     $array = ['а','е','и','ӣ','й','у','ӯ','э','ю','я'];
     if($first && $char==$array[0]){
         return 'ا';
     }
     if($last && $char==$array[0] ){
         return 'ه';
     }
     if($char==$array[0] ){
         return  '';
     }
     if($first && $char==$array[1]){
         return 'ا';
     }
     if($char==$array[1]){
         return 'ِ';
     }
     if($first && $char==$array[2]){
         return 'ای';
     }
     if($char==$array[2]){
         return 'ی';
     }
     if($first && $char==$array[3]){
         return 'ی';
     }
     if($last && $char==$array[3]){
         return 'ی';
     }
     if($char==$array[3]){
         return 'ی';
     }
     if($first && $char==$array[4]){
         return 'ی';
     }
     if($last && $char==$array[4]){
         return 'ی';
     }
     if($char==$array[4]){
         return 'ی';
     }
     if($first && $char==$array[5]){
         return 'و';
     }
     if($last && $char==$array[5]){
         return 'و';
     }
     if($char==$array[5]){
         return 'ُ';
     }
     if($first && $char==$array[6]){
         return 'او';
     }
     if($last && $char==$array[6]){
         return 'و';
     }
     if($char==$array[6]){
         return 'و';
     }
     if($first && $char==$array[7]){
         return 'ای';
     }
      if($char==$array[7]){
         return 'ی';
     }
     if($first && $char==$array[8]){
         return 'ا';
     }
     if($char==$array[8]){
         return 'یو';
     }
     if($first && $char==$array[9]){
         return 'ی';
     }
     if($lsat && $char==$array[9]){
         return 'یه';
     }
     if($char==$array[9]){
         return 'ی';
     }
     
     return '';
 }
 
  function correct_especial_words($text){
     $text = str_replace(" ва "," в ",$text);
     
     //ei to e
     $text = str_replace("аи ","ҳ ӣ ",$text);
     $text = str_replace("еи ","и ӣ ",$text);
     $text = str_replace("би ","бе ",$text);
     $text = str_replace("ги ","ге ",$text);
     $text = str_replace("ғи ","ғе ",$text);
     $text = str_replace("ди ","де ",$text);
     $text = str_replace("жи ","же ",$text);
     $text = str_replace("зи ","зе ",$text);
     $text = str_replace("ки ","кҳ ",$text);
     $text = str_replace("қи ","қе ",$text);
     $text = str_replace("ли ","ле ",$text);
     $text = str_replace("ми ","ме ",$text);
     $text = str_replace("ни ","не ",$text);
     $text = str_replace("пи ","пе ",$text);
     $text = str_replace("ри ","ре ",$text);
     $text = str_replace("си ","се ",$text);
     $text = str_replace("ти ","те ",$text);
     $text = str_replace("фи ","фе ",$text);
     $text = str_replace("хи ","хе ",$text);
     $text = str_replace("ҳи ","ҳе ",$text);
     $text = str_replace("чи ","чҳ ",$text);
     $text = str_replace("ҷи ","ҷҳ ",$text);
     $text = str_replace("ши ","ше ",$text);
     $text = str_replace("ъи ","ъҳ ",$text);
     
     return $text;
 }
 
  function correct_latin_characters($text){
    $text = str_replace("y","у",$text);
    $text = str_replace("ў","ӯ",$text);
    $text = str_replace("й","й",$text);
    $text = str_replace("x","х",$text);
    $text = str_replace("p","р",$text);
    $text = str_replace("m","м",$text);
    $text = str_replace("t","т",$text);
    $text = str_replace("o","о",$text);
    $text = str_replace("k","к",$text);
    $text = str_replace("e","е",$text);
    $text = str_replace("b","в",$text);
    $text = str_replace("a","а",$text);
    $text = str_replace("f","ғ",$text);
    $text = str_replace("h","н",$text);
    $text = str_replace("c","с",$text);
    
     return $text; 
 }
 
  function remove_erab($text){
  $text = str_replace("ّ","",$text);
  $text = str_replace("ِ","",$text);
  $text = str_replace("ُ","",$text);
  $text = str_replace("َ","",$text);
  $text = str_replace("ٍ","",$text);
  $text = str_replace("ٌ","",$text);
  $text = str_replace("ً","",$text);
  
  return $text;
  }
 
  function correct_tashdid($text){
    $text = str_replace("آا","آ",$text);  
    $text = str_replace("آآ","آ",$text);
    $text = str_replace("اا","ا",$text);
    $text = str_replace("بب","ب",$text);
    $text = str_replace("پپ","پ",$text);
    $text = str_replace("تت","ت",$text);
    $text = str_replace("جج","ج",$text);
    $text = str_replace("چچ","چ",$text);
    $text = str_replace("هه","ه",$text);
    $text = str_replace("خخ","خ",$text);
    $text = str_replace("دد","د",$text);
    $text = str_replace("زز","ز",$text);
    $text = str_replace("رر","ر",$text);
    $text = str_replace("ژژ","ز",$text);
    $text = str_replace("سس","س",$text);
    $text = str_replace("شش","ش",$text);
    $text = str_replace("عع","ع",$text);
    $text = str_replace("غغ","غ",$text);
    $text = str_replace("فف","ف",$text);
    $text = str_replace("قق","ق",$text);
    $text = str_replace("کک","ک",$text);
    $text = str_replace("گگ","گ",$text);
    $text = str_replace("لل","ل",$text);
    $text = str_replace("مم","م",$text);
    $text = str_replace("وو","و",$text);
    $text = str_replace("یی","ی",$text);
    
    return $text; 
 }
 
  function filter_common_words($text){
    $text = str_replace("مسایل","مسائل",$text);
    $text = str_replace("داخیل","داخل",$text);
    $text = str_replace("تاجیکیستان","تاجیکستان",$text);
    $text = str_replace("بِشتر","بیشتر",$text);
    $text = str_replace("مُسلله","مسلح",$text);
    $text = str_replace("ایدامه","ادامه",$text);
    $text = str_replace("توانیست","توانست",$text);
    $text = str_replace("بیدیهد","بدهد",$text);
    $text = str_replace("دیهد","دهد",$text);
    $text = str_replace("ایرای","ارائه",$text);
    $text = str_replace("بلکی","بلکه",$text);
    $text = str_replace("تنووُع","تنوع",$text);
    $text = str_replace("فرهنگیی"," فرهنگی",$text);
    $text = str_replace("افزُد","افزود",$text);
    $text = str_replace("شُنوندگان","شنوندگان",$text);
    $text = str_replace(",","،",$text);
    $text = str_replace("بیده","بده",$text);
    $text = str_replace("رادییو","رادیو",$text);
    $text = str_replace("دُشنبِ","دوشنبه",$text);
    $text = str_replace("شیمال","شمال",$text);
    $text = str_replace("جینوب","جنوب",$text);
    $text = str_replace("امما","اما",$text);
    $text = str_replace("مهلل","محل",$text);
    $text = str_replace("زییاد","زیاد",$text);
    $text = str_replace("مِش","می ش",$text);
    $text = str_replace("بُد","بود",$text);
    $text = str_replace("هُرُف","حروف",$text);
    $text = str_replace("بعدن","بعدا",$text);
    $text = str_replace("اوول","اول",$text);
    $text = preg_replace('/^' . preg_quote('مِ', '/') . '/', 'می', $text);
    $text = preg_replace('/^' . preg_quote('نِ', '/') . '/', 'نی', $text);
    $text = str_replace("ختی","خط",$text);
    $text = str_replace("هُدُد","حدود",$text);
    $text = str_replace("خاه","خواه",$text);
    $text = str_replace("مربُت","مربوط",$text);
    $text = str_replace("کیشور","کشور",$text);
    $text = str_replace("دیه","ده",$text);
    
     return $text; 
  }
 
?>