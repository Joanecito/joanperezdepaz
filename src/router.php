<?php

/**
 * returns url route
 * 
 */
function getRoute(): string
{
    if (isset($_REQUEST['url'])) {
        $url = $_REQUEST['url'];
    } else {
        $url = 'home';
    }
    switch ($url) {

        //acceso a vista
        case 'login':
            return 'login';
        case 'register':
            return 'register';

        //acceso a proceso log in
        case 'registerAction';
            return 'registerAction';
        case 'loginAction':
            return 'loginAction';

        //acceso a dashboard
        case 'dashboard':
            return 'dashboard';

        //log out
        case 'logoutAction':
            return 'logoutAction';

        //actualitzar dades
        case 'updateAction':
            return 'updateAction';
        
        //accedir al perfil
        case 'perfil':
            return 'perfil';

        //reset dades
        case 'resetAction':
            return 'resetAction';

        default:
            return 'home';
    }
}
