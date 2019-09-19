<?php

 function tj2fa($tj_text,&$convertLatin2Cyr=false){
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
 
?>