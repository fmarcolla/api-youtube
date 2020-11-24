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
        //SETAR A QUANTIDADE DE VÍDEOS AQUI
        $maxVideosList = 20;

        // $minutesPerDay = [250, 10, 140, 50, 50, 80, 90];
        // $keySearch = 'metallica';
        
        $minutesPerDay = (isset($_GET['days'])? $_GET['days'] : []);
        $keySearch = (isset($_GET['palavra_chave'])? $_GET['palavra_chave'] : '');
        
        $weekDaysFields = 7;

        $videosPerDay = []; 
        $mostFrequentWords = "";
        $totalDays = 0;
        
        if(count($minutesPerDay) > 0 && $keySearch != ""){
            $videosResponse = (new APIYoutube())->searchVideosByTherm($keySearch, $maxVideosList);

            $modelVideos = new VideosYoutube($videosResponse, $minutesPerDay);
            
            $modelVideos->init($videosResponse);
            $videosPerDay = $modelVideos->getListVideos();
            $mostFrequentWords = $modelVideos->getMostFrequentWords();
            $totalDays = $modelVideos->getTotaldays();
        }
        
        require APP . 'view/home/index.php';
    }
}
