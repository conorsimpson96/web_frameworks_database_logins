<?php

namespace Hdip\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use itb\User;

use Hdip\Model\DvdRepository;

/**
 * Class AdminController
 *
 * simple authentication using Silex session object
 * $app['session']->set('isAuthenticated', false);
 *
 * but the propert way to do it:
 * https://gist.github.com/brtriver/1740012
 *
 * @package Hdip\Controller
 */
class AdminController
{
    public function isAuthenticated()
    {

    }

    // action for route:    /admin
    // will we allow access to the Admin home?
    public function indexAction(Request $request, Application $app)
    {
        // test if 'username' stored in session ...
        $username = getAuthenticatedUserName($app);

        // check we are authenticated --------
        $isAuthenticated = (null != $username);
        if(!$isAuthenticated){
            // not authenticated, so redirect to LOGIN page
            return $app->redirect('/login');
        }


        if($isAuthenticated && $username == 'admin') {
            // store username into args array
            $argsArray = array(
                'username' => $username
            );

            // render (draw) template
            // ------------
            $templateName = 'admin/index';
            return $app['twig']->render($templateName . '.html.twig', $argsArray);
        }

        if($isAuthenticated && $username == 'matt') {
            // store username into args array
            $argsArray = array(
                'username' => $username
            );

            // render (draw) template
            // ------------
            $templateName = 'admin/indexMembers';
            return $app['twig']->render($templateName . '.html.twig', $argsArray);
        }


        if($isAuthenticated && $username == 'joe') {
            // store username into args array
            $argsArray = array(
                'username' => $username
            );

            // render (draw) template
            // ------------
            $templateName = 'admin/indexStudent';
            return $app['twig']->render($templateName . '.html.twig', $argsArray);
        }

        }

    // action for route:    /adminCodes
    // will we allow access to the Admin home?
    public function codesAction(Request $request, Application $app)
    {
        // test if 'username' stored in session ...
        $username = getAuthenticatedUserName($app);

        // check we are authenticated --------
        $isAuthenticated = (null != $username);
        if(!$isAuthenticated){
            // not authenticated, so redirect to LOGIN page
            return $app->redirect('/login');
        }

        if($isAuthenticated && $username == 'admin') {
            // store username into args array
            $argsArray = array(
                'username' => $username
            );

            // render (draw) template
            // ------------
            $templateName = 'admin/codes';
            return $app['twig']->render($templateName . '.html.twig', $argsArray);

        }


    }

    /**
     * @param Request $request
     * @param Application $app
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     *
     */
    public function studentPageAction(Request $request, Application $app)
    {
        // test if 'username' stored in session ...
        $username = getAuthenticatedUserName($app);

        // check we are authenticated --------
        $isAuthenticated = (null != $username);
        if(!$isAuthenticated){
            // not authenticated, so redirect to LOGIN page
            return $app->redirect('/login');
        }
        if($isAuthenticated && $username == 'joe') {
            // store username into args array
            $argsArray = array(
                'username' => $username
            );

            // render (draw) template
            // ------------
            $templateName = 'admin/studentPage';
            return $app['twig']->render($templateName . '.html.twig', $argsArray);
        }

    }

    /**
     * @param Request $request
     * @param Application $app
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function membersAction(Request $request, Application $app)
    {
        // test if 'username' stored in session ...
        $username = getAuthenticatedUserName($app);

        // check we are authenticated --------
        $isAuthenticated = (null != $username);
        if (!$isAuthenticated) {
            // not authenticated, so redirect to LOGIN page
            return $app->redirect('/login');
        }
        if ($isAuthenticated && $username == 'matt') {
            // store username into args array
            $argsArray = array(
                'username' => $username
            );

            // render (draw) template
            // ------------
            $templateName = 'admin/members';
            return $app['twig']->render($templateName . '.html.twig', $argsArray);
        }
    }

}