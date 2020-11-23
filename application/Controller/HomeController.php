<?php

namespace Projeto\Controller;

use Projeto\Model\StringFunctions;
use Projeto\Model\APIYoutube;
use Projeto\Model\VideosYoutube;
use Projeto\Model\Time;

class HomeController extends FrontController
{
    public function index()
    {       
        // $keySearch = 'metallica';
        // $minutesPerDay = [250, 10, 140, 50, 50, 80, 90];
        
        $minutesPerDay = (isset($_GET['days'])? $_GET['days'] : []);
        $keySearch = (isset($_GET['palavra_chave'])? $_GET['palavra_chave'] : '');
        
        $maxVideosList = 10;
        $weekDaysFields = 7;

        $videosPerDay = []; 
        $mostFrequentWords = "";
        $totalDays = 0;
        
        if(count($minutesPerDay) > 0 && $keySearch != ""){
            $videosResponse = (new APIYoutube())->simulaResponse();
            // $videosResponse = (new APIYoutube())->searchVideosByTherm($keySearch, $maxVideosList);

            $modelVideos = new VideosYoutube($videosResponse, $minutesPerDay);
            $modelVideos->init();
            $videosPerDay = $modelVideos->getListVideos();
            $mostFrequentWords = $modelVideos->getMostFrequentWords();
            $totalDays = $modelVideos->getTotaldays();
        }
        
        require APP . 'view/home/index.php';
    }

    public function depura($array){
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }
}
