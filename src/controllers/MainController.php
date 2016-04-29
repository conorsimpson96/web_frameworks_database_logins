<?php

namespace Hdip\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use itb\User;

use Hdip\Model\DvdRepository;

class MainController
{
    // action for route:    /
    public function indexAction(Request $request, Application $app)
    {
        // test if 'username' stored in session ...
        $username = getAuthenticatedUserName($app);
        $argsArray = array(
            'username' => $username
        );

        // get reference to our repository
        $dvdRepository = new DvdRepository();

        // add to args array
        // ------------
        $argsArray['dvds'] = $dvdRepository->getAllDvds();

        // render (draw) template
        // ------------
        $templateName = 'index';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    public function membersAction(Request $request, Application $app)
    {

        // test if 'username' stored in session ...
        $username = getAuthenticatedUserName($app);
        $argsArray = array(
            'username' => $username
        );

        // render (draw) template
        // ------------
        $templateName = 'members';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    public function projectsAction(Request $request, Application $app)
    {
        // test if 'username' stored in session ...
        $username = getAuthenticatedUserName($app);
        $argsArray = array(
            'username' => $username
        );

        // render (draw) template
        // ------------
        $templateName = 'projects';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }
    /**
     * renders the publications page
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function publicationsAction(Request $request, Application $app)
    {

        // test if 'username' stored in session ...
        $username = getAuthenticatedUserName($app);
        $argsArray = array(
            'username' => $username
        );

        // render (draw) template
        // ------------
        $templateName = 'publications';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

}