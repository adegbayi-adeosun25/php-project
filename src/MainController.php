<?php
namespace Itb;
use Twig\Environment;

class MainController
{
    private $twig;


    public function __construct(\Twig\Environment $twig)
    {
        $this->twig =$twig;
    }


    public function homeAction()
    {
        $template = 'home.html.twig';
        $argsArray = [
            'pageTitle' => 'home'
        ];
        $html = $this->twig->render($template,$argsArray);
        print $html;
    }

    public function aboutAction()
    {
        $template = 'about.html.twig';
        $argsArray = [
            'pageTitle' => 'about'
        ];
        $html = $this->twig->render($template, $argsArray);
        print $html;
    }

        public function infoAction()
    {
        $template = 'Info.html.twig';
        $argsArray = [
            'pageTitle' => 'info'
        ];
        $html = $this->twig->render($template, $argsArray);
        print $html;
    }

    public function summaryAction()
    {
        $template = 'summary.html.twig';
        $argsArray = [
            'pageTitle' => 'summary'
        ];
        $html = $this->twig->render($template, $argsArray);
        print $html;
    }
    public function peopleAction()
    {
        $template = 'people.html.twig';
        $argsArray = [
            'pageTitle' => 'people'
        ];
        $html = $this->twig->render($template, $argsArray);
        print $html;
    }

    public function contactAction()
    {
        $template = 'contact.html.twig';
        $argsArray = [
            'pageTitle' => 'contact'
        ];
        $html = $this->twig->render($template, $argsArray);
        print $html;
    }
    public function newsAction()
    {
        $template = 'news.html.twig';
        $argsArray = [
            'pageTitle' => 'news'
        ];
        $html = $this->twig->render($template, $argsArray);
        print $html;
    }

}
