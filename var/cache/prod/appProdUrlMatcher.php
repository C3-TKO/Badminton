<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        // fos_js_routing_js
        if (0 === strpos($pathinfo, '/js/routing') && preg_match('#^/js/routing(?:\\.(?P<_format>js|json))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_js_routing_js')), array (  '_controller' => 'fos_js_routing.controller:indexAction',  '_format' => 'js',));
        }

        if (0 === strpos($pathinfo, '/crud')) {
            if (0 === strpos($pathinfo, '/crud/season')) {
                // crud_season_
                if (rtrim($pathinfo, '/') === '/crud/season') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'crud_season_');
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\SeasonController::indexAction',  '_route' => 'crud_season_',);
                }

                // crud_season__show
                if (preg_match('#^/crud/season/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'crud_season__show')), array (  '_controller' => 'AppBundle\\Controller\\SeasonController::showAction',));
                }

                // crud_season__new
                if ($pathinfo === '/crud/season/new') {
                    return array (  '_controller' => 'AppBundle\\Controller\\SeasonController::newAction',  '_route' => 'crud_season__new',);
                }

                // crud_season__create
                if ($pathinfo === '/crud/season/create') {
                    return array (  '_controller' => 'AppBundle\\Controller\\SeasonController::createAction',  '_route' => 'crud_season__create',);
                }

                // crud_season__edit
                if (preg_match('#^/crud/season/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'crud_season__edit')), array (  '_controller' => 'AppBundle\\Controller\\SeasonController::editAction',));
                }

                // crud_season__update
                if (preg_match('#^/crud/season/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'crud_season__update')), array (  '_controller' => 'AppBundle\\Controller\\SeasonController::updateAction',));
                }

                // crud_season__delete
                if (preg_match('#^/crud/season/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'crud_season__delete')), array (  '_controller' => 'AppBundle\\Controller\\SeasonController::deleteAction',));
                }

            }

            if (0 === strpos($pathinfo, '/crud/player')) {
                // crud_player_
                if (rtrim($pathinfo, '/') === '/crud/player') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'crud_player_');
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\PlayerController::indexAction',  '_route' => 'crud_player_',);
                }

                // crud_player__show
                if (preg_match('#^/crud/player/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'crud_player__show')), array (  '_controller' => 'AppBundle\\Controller\\PlayerController::showAction',));
                }

                // crud_player__new
                if ($pathinfo === '/crud/player/new') {
                    return array (  '_controller' => 'AppBundle\\Controller\\PlayerController::newAction',  '_route' => 'crud_player__new',);
                }

                // crud_player__create
                if ($pathinfo === '/crud/player/create') {
                    return array (  '_controller' => 'AppBundle\\Controller\\PlayerController::createAction',  '_route' => 'crud_player__create',);
                }

                // crud_player__edit
                if (preg_match('#^/crud/player/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'crud_player__edit')), array (  '_controller' => 'AppBundle\\Controller\\PlayerController::editAction',));
                }

                // crud_player__update
                if (preg_match('#^/crud/player/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'crud_player__update')), array (  '_controller' => 'AppBundle\\Controller\\PlayerController::updateAction',));
                }

                // crud_player__delete
                if (preg_match('#^/crud/player/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'crud_player__delete')), array (  '_controller' => 'AppBundle\\Controller\\PlayerController::deleteAction',));
                }

            }

            if (0 === strpos($pathinfo, '/crud/team')) {
                // crud_team_
                if (rtrim($pathinfo, '/') === '/crud/team') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'crud_team_');
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\TeamController::indexAction',  '_route' => 'crud_team_',);
                }

                // crud_team__show
                if (preg_match('#^/crud/team/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'crud_team__show')), array (  '_controller' => 'AppBundle\\Controller\\TeamController::showAction',));
                }

                // crud_team__new
                if ($pathinfo === '/crud/team/new') {
                    return array (  '_controller' => 'AppBundle\\Controller\\TeamController::newAction',  '_route' => 'crud_team__new',);
                }

                // crud_team__create
                if ($pathinfo === '/crud/team/create') {
                    return array (  '_controller' => 'AppBundle\\Controller\\TeamController::createAction',  '_route' => 'crud_team__create',);
                }

                // crud_team__edit
                if (preg_match('#^/crud/team/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'crud_team__edit')), array (  '_controller' => 'AppBundle\\Controller\\TeamController::editAction',));
                }

                // crud_team__update
                if (preg_match('#^/crud/team/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'crud_team__update')), array (  '_controller' => 'AppBundle\\Controller\\TeamController::updateAction',));
                }

                // crud_team__delete
                if (preg_match('#^/crud/team/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'crud_team__delete')), array (  '_controller' => 'AppBundle\\Controller\\TeamController::deleteAction',));
                }

            }

            if (0 === strpos($pathinfo, '/crud/round')) {
                // crud_round_
                if (rtrim($pathinfo, '/') === '/crud/round') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'crud_round_');
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\RoundController::indexAction',  '_route' => 'crud_round_',);
                }

                // crud_round__show
                if (preg_match('#^/crud/round/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'crud_round__show')), array (  '_controller' => 'AppBundle\\Controller\\RoundController::showAction',));
                }

                // crud_round__new
                if ($pathinfo === '/crud/round/new') {
                    return array (  '_controller' => 'AppBundle\\Controller\\RoundController::newAction',  '_route' => 'crud_round__new',);
                }

                // crud_round__create
                if ($pathinfo === '/crud/round/create') {
                    return array (  '_controller' => 'AppBundle\\Controller\\RoundController::createAction',  '_route' => 'crud_round__create',);
                }

                // crud_round__edit
                if (preg_match('#^/crud/round/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'crud_round__edit')), array (  '_controller' => 'AppBundle\\Controller\\RoundController::editAction',));
                }

                // crud_round__update
                if (preg_match('#^/crud/round/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'crud_round__update')), array (  '_controller' => 'AppBundle\\Controller\\RoundController::updateAction',));
                }

                // crud_round__delete
                if (preg_match('#^/crud/round/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'crud_round__delete')), array (  '_controller' => 'AppBundle\\Controller\\RoundController::deleteAction',));
                }

            }

            if (0 === strpos($pathinfo, '/crud/game')) {
                // crud_game_
                if (rtrim($pathinfo, '/') === '/crud/game') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'crud_game_');
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\GameController::indexAction',  '_route' => 'crud_game_',);
                }

                // crud_game__show
                if (preg_match('#^/crud/game/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'crud_game__show')), array (  '_controller' => 'AppBundle\\Controller\\GameController::showAction',));
                }

                // crud_game__new
                if ($pathinfo === '/crud/game/new') {
                    return array (  '_controller' => 'AppBundle\\Controller\\GameController::newAction',  '_route' => 'crud_game__new',);
                }

                // crud_game__create
                if ($pathinfo === '/crud/game/create') {
                    return array (  '_controller' => 'AppBundle\\Controller\\GameController::createAction',  '_route' => 'crud_game__create',);
                }

                // crud_game__edit
                if (preg_match('#^/crud/game/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'crud_game__edit')), array (  '_controller' => 'AppBundle\\Controller\\GameController::editAction',));
                }

                // crud_game__update
                if (preg_match('#^/crud/game/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'crud_game__update')), array (  '_controller' => 'AppBundle\\Controller\\GameController::updateAction',));
                }

                // crud_game__delete
                if (preg_match('#^/crud/game/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'crud_game__delete')), array (  '_controller' => 'AppBundle\\Controller\\GameController::deleteAction',));
                }

            }

        }

        // home
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'home');
            }

            return array (  '_controller' => 'AppBundle\\Controller\\DefaultController::indexAction',  '_route' => 'home',);
        }

        if (0 === strpos($pathinfo, '/r')) {
            // results
            if (0 === strpos($pathinfo, '/results') && preg_match('#^/results(?:/(?P<idRound>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'results')), array (  '_controller' => 'AppBundle\\Controller\\DefaultController::resultsAction',  'idRound' => NULL,));
            }

            // ranking
            if (0 === strpos($pathinfo, '/ranking') && preg_match('#^/ranking(?:/(?P<idRound>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ranking')), array (  '_controller' => 'AppBundle\\Controller\\DefaultController::rankingAction',  'idRound' => NULL,));
            }

        }

        if (0 === strpos($pathinfo, '/schedul')) {
            // scheduling
            if ($pathinfo === '/scheduling') {
                return array (  '_controller' => 'AppBundle\\Controller\\ScheduleController::schedulingAction',  '_route' => 'scheduling',);
            }

            if (0 === strpos($pathinfo, '/schedule')) {
                // schedule_flush
                if ($pathinfo === '/schedule/flush') {
                    return array (  '_controller' => 'AppBundle\\Controller\\ScheduleController::flushAction',  '_route' => 'schedule_flush',);
                }

                // schedule_load
                if ($pathinfo === '/schedule/load') {
                    return array (  '_controller' => 'AppBundle\\Controller\\ScheduleController::loadAction',  '_route' => 'schedule_load',);
                }

                // schedule_update
                if (0 === strpos($pathinfo, '/schedule/update') && preg_match('#^/schedule/update/(?P<index>[^/]++)/team_a_score/(?P<teamAScore>[^/]++)/team_b_score/(?P<teamBScore>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'schedule_update')), array (  '_controller' => 'AppBundle\\Controller\\ScheduleController::updateAction',));
                }

            }

        }

        // add_game
        if ($pathinfo === '/add_game') {
            return array (  '_controller' => 'AppBundle\\Controller\\DefaultController::addGameAction',  '_route' => 'add_game',);
        }

        if (0 === strpos($pathinfo, '/log')) {
            if (0 === strpos($pathinfo, '/login')) {
                // login
                if ($pathinfo === '/login') {
                    return array (  '_controller' => 'AppBundle\\Controller\\SecurityController::loginAction',  '_route' => 'login',);
                }

                // login_check
                if ($pathinfo === '/login_check') {
                    return array('_route' => 'login_check');
                }

            }

            // logout
            if ($pathinfo === '/logout') {
                return array('_route' => 'logout');
            }

        }

        // api_add_game
        if (0 === strpos($pathinfo, '/api/add_game') && preg_match('#^/api/add_game/(?P<teamA>[^/]++)/(?P<teamB>[^/]++)/(?P<teamAScore>[^/]++)/(?P<teamBScore>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'api_add_game')), array (  '_controller' => 'AppBundle\\Controller\\APIController::addGameAction',));
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
