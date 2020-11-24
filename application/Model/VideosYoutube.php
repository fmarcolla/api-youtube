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
        $this->videosResponse = clone $videos;
        $this->minutesPerDay = $minutesPerDay;
    }

    public function init(){
        $this->removeLongestsVideos();
        $this->mountDayList();
    }

    private function removeLongestsVideos()
    {       
        $majorTimeDay = max($this->minutesPerDay);
        $listVideos = [];

        foreach($this->videosResponse['items'] as $key => $videoResult){
            $minutesVideo = (new Time())->ISO8601ToMinutes($videoResult['contentDetails']['duration']);
            
            if($majorTimeDay >= $minutesVideo){
                $listVideos[] = clone $videoResult;
            }
        }
        $this->videosResponse = [];
        $this->videosResponse = $listVideos;
    }

    private function mountDayList(){
        $descriptionStr = '';
        $listVideos = [];

        while(count($this->videosResponse) != count($listVideos)){
            foreach($this->minutesPerDay as $minutes){

                $accDay = 0;
                $this->dayCount++;

                $this->videosPerDay[$this->dayCount]["day"] = $this->dayCount;
                $this->videosPerDay[$this->dayCount]["minutesLimitDay"] = $minutes;
                $this->videosPerDay[$this->dayCount]["videos"] = [];
                $this->videosPerDay[$this->dayCount]["totalVideosMinutes"] = 0;

                foreach($this->videosResponse as $indexVideos => $videoResult){
                    $minutesVideo = (new Time())->ISO8601ToMinutes($videoResult['contentDetails']['duration']);

                    if(($accDay + $minutesVideo) <= $minutes){
                        $this->videosPerDay[$this->dayCount]["videos"][] = clone $videoResult;
                        $accDay += $minutesVideo;

                        $this->videosPerDay[$this->dayCount]["totalVideosMinutes"] = round($accDay, 2);

                        $descriptionStr .= strtolower($videoResult['snippet']['title']);
                        $descriptionStr .= " ";
                        $descriptionStr .= strtolower($videoResult['snippet']['description']);
                        $descriptionStr .= " ";

                        $listVideos[] = clone $videoResult;

                        if(count($this->videosResponse) == count($listVideos)){
                            break 2;
                        }

                        continue;
                    }

                    break;
                }
            }
        }
        // $this->videosResponse = $listVideos;
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