<?php
namespace Itb;
use Twig\Environment;

class MainController
{
    private $twig;


    public function __construct(\Twig\Environment $twig)
    {
        $this->twig = $twig;
    }

    public function indexAction()
    {
        $isLoggedIn = $this->isLoggedInFromSession();
        $username = $this->usernameFromSession();

        require_once __DIR__ . '/../web/index.php';

        $backgroundColor = $this->getBackgroundColor();
        require_once __DIR__ . '/../templates/index.php';
    }


    public function homeAction()
    {
        $template = 'home.html.twig';
        $argsArray = [
            'pageTitle' => 'home'
        ];
        $html = $this->twig->render($template, $argsArray);
        print $html;
    }

    public function aboutAction()
    {

        $isLoggedIn = $this->isLoggedInFromSession();
        $username = $this->usernameFromSession();


        $template = 'about.html.twig';
        $argsArray = [
            'pageTitle' => 'about'
        ];
        $html = $this->twig->render($template, $argsArray);
        print $html;

        $backgroundColor = $this->getBackgroundColor();
        require_once __DIR__ . '/../views/about.html.twig';
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


    public function loginAction()
    {
        $isLoggedIn = $this->isLoggedInFromSession();
        $username = $this->usernameFromSession();

        require_once __DIR__ . '/../views/login.php';
    }

    public function logoutAction()
    {
        // remove 'user' element from SESSION array
        unset($_SESSION['user']);

        // redirect to index action
        $this->indexAction();
    }

    public function processLoginAction()
    {
        // default is bad login
        $isLoggedIn = false;

        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        // search for user with username in repository
        $isLoggedIn = User::canFindMatchingUsernameAndPassword($username, $password);

        // action depending on login success
        if ($isLoggedIn) {
            // STORE login status SESSION
            $_SESSION['user'] = $username;

            require_once __DIR__ . '/../views/loginSuccessful.php';
        } else {
            $message = 'bad username or password, please try again';
            require_once __DIR__ . '/../views/answer.php';
        }
    }

    //--------- helper functions -------


    public function isLoggedInFromSession()
    {
        $isLoggedIn = false;

        // user is logged in if there is a 'user' entry in the SESSION superglobal
        if (isset($_SESSION['user'])) {
            $isLoggedIn = true;
        }

        return $isLoggedIn;
    }

    public function usernameFromSession()
    {
        $username = '';

        // extract username from SESSION superglobal
        if (isset($_SESSION['user'])) {
            $username = $_SESSION['user'];
        }

        return $username;
    }


    public function newHit()
    {
        // (1) set counter to default value of 0
        $pageHits = 0;

        // (2) if a variable "counter" is found inside $_SESSION then set it to this value
        if (isset($_SESSION['counter'])) {
            $pageHits = $_SESSION['counter'];
        }

        // (3) increment number of hits (since we are visiting this page again)
        $pageHits++;

        // (4) store new data in counter
        $_SESSION['counter'] = $pageHits;

        // (5) display message to user about current value
        print "<p>Counter (number of page hits): $pageHits</p>";

        print '<p>session = ' . session_id();
        print '<hr><a href="/">revisit this home page again</a>';
        print '<hr><a href="/?action=restartSession">restart session</a>';
    }

    public function forgetSession()
    {
        $this->killSession();

        print 'SESSION has been destroyed - all session data deleted';
        print '<p><a href="/">back to home page</a>';
    }

    /**
     * advice on how to kill session from PHP.net
     * URL: http://php.net/manual/en/function.session-destroy.php
     */
    public function killSession()
    {


        $this->killSession();

        print 'SESSION has been destroyed - all session data deleted';
        print '<p><a href="/">back to home page</a>';

        // (1) Unset all of the session variables.
        $_SESSION = [];

        // (2) If it is desired to kill the session, also delete the session cookie.
        // Note: This will destroy the session, and not just the session data!
        if (ini_get('session.use_cookies')) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params['path'],
                $params['domain'],
                $params['secure'],
                $params['httponly']
            );
        }
        session_destroy();
    }

    public function getBackgroundColor()
    {
        // default to WHITE if not found in $_SESSION
        if (isset($_SESSION['backgroundColor'])) {
            return $_SESSION['backgroundColor'];
        } else {
            return 'white';
        }
    }



    public function changeBackgroundColor($color)
    {
        $_SESSION['backgroundColor'] = $color;
        $this->indexAction();
    }
}


