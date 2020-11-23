<?php

namespace Projeto\Model;

class StringFunctions
{   
    public function countWordOccurence($string){
        // $words = array_count_values(str_word_count($string, 1));
        // var_dump($string);

        $temp = preg_replace( "/<br>|\n|\-/", "", $string );
        $temp = preg_replace('/[^A-Za-z0-9]/', ' ', $temp);

        // $temp = preg_replace( "/(|)|,/", "", $temp );

        $words2 = explode(" ", $temp);
        $result = array_combine($words2, array_fill(0, count($words2), 0));


        foreach($words2 as $word) {
            $result[$word]++;
        }

        arsort($result);

        return $result;
    }

    public function getWordsMostUsed($arrayStrings){

        $words = "";
        $total = 0;

        foreach($arrayStrings as $str => $qtd){

            if($total >= 5){
                break;
            }

            if(!empty($str) && strlen($str) > 1){
                $total++;

                $delimiter = ", ";

                if($total == 4){
                    $delimiter = " e ";
                }else if($total == 5){
                    $delimiter = ".";
                }

                $words .= $str . $delimiter;
            }
        }

        return $words;
    }

    public function showMostUsedWords($string){
        $arrayResult = $this->countWordOccurence($string);
        $string = $this->getWordsMostUsed($arrayResult);
        
        return $string;
    }
}