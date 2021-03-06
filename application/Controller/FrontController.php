<?php

namespace Projeto\Controller;

use Projeto\Core\Controller;

class FrontController
{
    private $styles = [];
    private $script = [];

    public function __construct()
    {

        $this->addStyle(URL . "css/" . VERSAO . "/select2.min.css");
        $this->addStyle(URL . "css/" . VERSAO . "/bootstrap.min.css");
        $this->addStyle(URL . "css/" . VERSAO . "/font-awesome.min.css");
        $this->addStyle(URL . "css/" . VERSAO . "/AdminLTE.min.css");
        $this->addStyle(URL . "css/" . VERSAO . "/skin-blue.min.css");
        $this->addStyle(URL . "css/" . VERSAO . "/bootstrap-datepicker.min.css");
        $this->addStyle(URL . "css/" . VERSAO . "/style.css");
    }

    public function getStyles()
    {
        return $this->styles;
    }

    public function addStyle($stylePath)
    {
        if (!in_array($stylePath, $this->getStyles())) {
            $this->styles[] = $stylePath;
        }
    }

    public function removeStyle($stylePath)
    {
        if (in_array($stylePath, $this->getStyles())) {
            unset($this->styles[array_search($stylePath, $this->getStyles())]);
            $this->styles = array_values($this->getStyles());
        }
    }

    public function renderStyle()
    {
        $return = [];

        foreach ($this->getStyles() as $style) {
            array_push($return, "<link rel=\"stylesheet\" href=\"{$style}\">");
        }

        return implode("\n", $return);
    }

    public function getScripts()
    {
        return $this->script;
    }

    public function addScript($scriptPath)
    {
        if (!in_array($scriptPath, $this->getScripts())) {
            $this->script[] = $scriptPath;
        }
    }

    public function removeScript($scriptPath)
    {
        if (in_array($scriptPath, $this->getScripts())) {
            unset($this->script[array_search($scriptPath, $this->getScripts())]);
            $this->script = array_values($this->getScripts());
        }
    }

    public function renderScript()
    {
        $return = [];

        foreach ($this->getScripts() as $script) {
            array_push($return, "<script src=\"{$script}\"></script>");
        }

        return implode("\n", $return);
    }
}
