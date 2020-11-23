<?php

namespace Projeto\Model;

class Time{
    public function ISO8601ToMinutes($time){
        $interval = new \DateInterval($time);
    
        return ($interval->d * 24 * 60) +
            ($interval->h * 60) +
            ($interval->i) +
            ($interval->s / 60);
    }
}