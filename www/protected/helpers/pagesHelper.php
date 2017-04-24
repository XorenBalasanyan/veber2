<?php
class pagesHelper
{

    public static function translit($string){
        $converter = array(
            'а' => 'a',   'б' => 'b',   'в' => 'v',
            'г' => 'g',   'д' => 'd',   'е' => 'e',
            'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
            'и' => 'i',   'й' => 'y',   'к' => 'k',
            'л' => 'l',   'м' => 'm',   'н' => 'n',
            'о' => 'o',   'п' => 'p',   'р' => 'r',
            'с' => 's',   'т' => 't',   'у' => 'u',
            'ф' => 'f',   'х' => 'h',   'ц' => 'c',
            'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
            'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
            'э' => 'e',   'ю' => 'yu',  'я' => 'ya',

            'А' => 'A',   'Б' => 'B',   'В' => 'V',
            'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
            'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
            'И' => 'I',   'Й' => 'Y',   'К' => 'K',
            'Л' => 'L',   'М' => 'M',   'Н' => 'N',
            'О' => 'O',   'П' => 'P',   'Р' => 'R',
            'С' => 'S',   'Т' => 'T',   'У' => 'U',
            'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
            'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
            'Ь' => '\'',  'Ы' => 'Y',   'Ъ' => '\'',
            'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
        );
        return strtr($string, $converter);
    }

    public static function makeUrlCode($str){
        return trim(preg_replace('~[^-a-z0-9_]+~u', '-', strtolower(self::translit($str))), "-");
    }
    
    // аннотация
    public static function announcement($str) {
        $words = explode(' ', $str, (40 + 1));
        if (count($words) > 40)
        array_pop($words);
        $wordss = implode(' ', $words);
        $wordsss = strip_tags($wordss);
        return $wordsss;
    }
    
    // аннотация с лимитов слов
        public static function announcementLimit($str,$lim) {
        $words = explode(' ', $str, ($lim + 1));
        if (count($words) > $lim)
        array_pop($words);
        $wordss = implode(' ', $words);
        $wordsss = strip_tags($wordss);
        return $wordsss;
    }
  
     // аннотация новостей (для veber), первые 150 слов
     public static function announcementnews($str) {
        $words = explode(' ', $str, (150 + 1));
        if (count($words) > 150)
        array_pop($words);
        $wordss = implode(' ', $words);
        //$wordsss = strip_tags($wordss);
        return $wordss;
    }
    
    // контент БЕЗ анатации с учетом announcement($str)
    public static function announcementplus($str) {
        $words = explode(' ', $str, (150 + 1));
        if (count($words) > 150)
        array_pop($words);
        $wordss = implode(' ', $words);
        $wordsss = substr($str, strlen($wordss));
        //$wordssss = strip_tags($wordsss);
        return $wordsss;

    }
    
    // первый абзац контента $model->content
    public function firstParagraph($str) {        
        $strNew = strstr($str, '</p>', true); 
        return $strNew;    
    }
    
    // контент без первого абзаца (firstParagraph($str))
    public function withoutTheFirstParagraph($str) {
         $words = substr($str, strlen(self::firstParagraph($str)));
         return $words;
    }
    
    
}