<?php

 function tj2fa($tj_text){
     $fa_word = '';
     $fa_text = '';
     $words = splite_words($tj_text);
     foreach($words as $word){
         for($i = 0; $i<mb_strlen($word); $i++){
             
             if($i==0 || $i == mb_strlen($word)-1){
                 $first = true;
             }else{
                 $first = false;
             }
             if(is_samet(mb_substr($word,$i,1))){
                 $char = change_samet(mb_substr($word,$i,1),$first);
             }else{
                 $char = change_mosavvet(mb_substr($word,$i,1),$first);
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
     $array = ['Б','б','В','в','Г','г','Ғ','ғ','Д','д','Ж','ж','З','з','К','к','Қ','қ','Л','л','М','м','Н','н','П','п','Р','р','С','с','Т','т','Ф','ф','Х','х','Ҳ','ҳ','Ч','ч','Ҷ','ҷ','Ш','ш','Ъ','ъ','Ё','ё','О','о','Ӯ','ӯ','И','и'];
     if(in_array($character,$array)){
         return true;
     }else{
         return false;
     }
 }
 
 function change_samet($char,$first){
     $array = ['Б','б','В','в','Г','г','Ғ','ғ','Д','д','Ж','ж','З','з','К','к','Қ','қ','Л','л','М','м','Н','н','П','п','Р','р','С','с','Т','т','Ф','ф','Х','х','Ҳ','ҳ','Ч','ч','Ҷ','ҷ','Ш','ш','Ъ','ъ','Ё','ё','О','о','Ӯ','ӯ','И','и'];
     if($char==$array[0] || $char==$array[1]){
         return 'ب';
     }
     if($char==$array[2] || $char==$array[3]){
         return 'و';
     }
     if($char==$array[4] || $char==$array[5]){
         return 'گ';
     }
     if($char==$array[6] || $char==$array[7]){
         return 'غ';
     }
     if($char==$array[8] || $char==$array[9]){
         return 'د';
     }
     if($char==$array[10] || $char==$array[11]){
         return 'ژ';
     }
     if($char==$array[12] || $char==$array[13]){
         return 'ز';
     }
     if($char==$array[14] || $char==$array[15]){
         return 'ک';
     }
     if($char==$array[16] || $char==$array[17]){
         return 'ق';
     }
     if($char==$array[18] || $char==$array[19]){
         return 'ل';
     }
     if($char==$array[20] || $char==$array[21]){
         return 'م';
     }
     if($char==$array[22] || $char==$array[23]){
         return 'ن';
     }
     if($char==$array[24] || $char==$array[25]){
         return 'پ';
     }
     if($char==$array[26] || $char==$array[27]){
         return 'ر';
     }
     if($char==$array[28] || $char==$array[29]){
         return 'س';
     }
     if($char==$array[30] || $char==$array[31]){
         return 'ت';
     }
     if($char==$array[32] || $char==$array[33]){
         return 'ف';
     }
     if($char==$array[34] || $char==$array[35]){
         return 'خ';
     }
     if($char==$array[36] || $char==$array[37]){
         return 'ه';
     }
     if($char==$array[38] || $char==$array[39]){
         return 'چ';
     }
     if($char==$array[40] || $char==$array[41]){
         return 'ج';
     }
     if($char==$array[42] || $char==$array[43]){
         return 'ش';
     }
     if($char==$array[44] || $char==$array[45]){
         return 'ع';
     }
     if($char==$array[46] || $char==$array[47]){
         return 'یا';
     }
     if($first && ($char==$array[48] || $char==$array[49])){
         return 'آ';
     }
     if($char==$array[48] || $char==$array[49]){
         return 'ا';
     }
     if($char==$array[50] || $char==$array[51]){
         return 'و';
     }
     if($char==$array[52] || $char==$array[53]){
         return 'ی';
     }
}
 
 function change_mosavvet($char,$first){
     $array = ['А','а','Е','е','И','и','Ӣ','ӣ','Й','й','У','у','Ӯ','ӯ','Э','э','Ю','ю','Я','я'];
     if($first && ($char==$array[0] || $char==$array[1])){
         return 'ا';
     }
     if($char==$array[0] || $char==$array[1]){
         return 'َ';
     }
     if($first && ($char==$array[2] || $char==$array[3])){
         return 'ا';
     }
     if($char==$array[2] || $char==$array[3]){
         return 'ِ';
     }
     if($first && ($char==$array[4] || $char==$array[5])){
         return 'ی';
     }
     if($first && ($char==$array[6] || $char==$array[7])){
         return 'ی';
     }
     if($first && ($char==$array[8] || $char==$array[9])){
         return 'ا';
     }
     if($first && ($char==$array[10] || $char==$array[11])){
         return 'و';
     }
     if($first && ($char==$array[12] || $char==$array[13])){
         return 'او';
     }
     if($first && ($char==$array[14] || $char==$array[15])){
         return 'ا';
     }
     if($first && ($char==$array[16] || $char==$array[17])){
         return 'ا';
     }
     if($first && ($char==$array[18] || $char==$array[19])){
         return 'ا';
     }
     if($char==$array[10] || $char==$array[11]){
         return 'ُ';
     }
     return '';
 }
 
?>