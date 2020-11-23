<?php

namespace Projeto\Model;

use Projeto\Model\StringFunctions;
use Projeto\Model\Time;

class VideosYoutube {

    private $videosResponse = [];
    private $videosPerDay = [];
    private $minutesPerDay = [];
    private $mostFrequentWords = '';
    private $dayCount = 0;

    public function __construct($videos, $minutesPerDay)
    {
        $this->videosResponse = $videos;
        $this->minutesPerDay = $minutesPerDay;
    }

    public function init(){
        $this->removeLongestsVideos();
        $this->mountDayList();
    }

    private function removeLongestsVideos()
    {       
        $majorTimeDay = max($this->minutesPerDay);
        
        foreach($this->videosResponse['items'] as $key => $videoResult){
            $minutesVideo = (new Time())->ISO8601ToMinutes($videoResult['contentDetails']['duration']);
         
            if($majorTimeDay < $minutesVideo){
                unset($this->videosResponse['items'][$key]);
            }
        }
    }

    private function mountDayList(){
        $descriptionStr = '';
        
        while(count($this->videosResponse['items']) > 0){
            foreach($this->minutesPerDay as $minutes){

                $this->dayCount++;

                $this->videosPerDay[$this->dayCount]["day"] = $this->dayCount;
                $this->videosPerDay[$this->dayCount]["minutesLimitDay"] = $minutes;
                $accDay = 0;
                $this->videosPerDay[$this->dayCount]["videos"] = [];
                $this->videosPerDay[$this->dayCount]["totalVideosMinutes"] = 0;

                foreach($this->videosResponse['items'] as $indexVideos => $videoResult){
                    $minutesVideo = (new Time())->ISO8601ToMinutes($videoResult['contentDetails']['duration']);

                    if(($accDay + $minutesVideo) <= $minutes){
                        $this->videosPerDay[$this->dayCount]["videos"][] = $videoResult;
                        $accDay += $minutesVideo;

                        $this->videosPerDay[$this->dayCount]["totalVideosMinutes"] = round($accDay, 2);

                        $descriptionStr .= strtolower($videoResult['snippet']['title']);
                        $descriptionStr .= " ";
                        $descriptionStr .= strtolower($videoResult['snippet']['description']);
                        $descriptionStr .= " ";

                        unset($this->videosResponse['items'][$indexVideos]);

                        if(count($this->videosResponse['items']) == 0){
                            break 2;
                        }

                        continue;
                    }

                    break;
                }
            }
        }
        $this->mostFrequentWords = (new StringFunctions())->showMostUsedWords($descriptionStr);
    }

    public function getListVideos(){
        return $this->videosPerDay;
    }

    public function getMostFrequentWords(){
        return $this->mostFrequentWords;
    }

    public function getTotaldays(){
        return $this->dayCount;
    }
}