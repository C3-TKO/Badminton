<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appTestUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appTestUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
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

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

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
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_crud_season__create;
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\SeasonController::createAction',  '_route' => 'crud_season__create',);
                }
                not_crud_season__create:

                // crud_season__edit
                if (preg_match('#^/crud/season/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'crud_season__edit')), array (  '_controller' => 'AppBundle\\Controller\\SeasonController::editAction',));
                }

                // crud_season__update
                if (preg_match('#^/crud/season/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_crud_season__update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'crud_season__update')), array (  '_controller' => 'AppBundle\\Controller\\SeasonController::updateAction',));
                }
                not_crud_season__update:

                // crud_season__delete
                if (preg_match('#^/crud/season/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_crud_season__delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'crud_season__delete')), array (  '_controller' => 'AppBundle\\Controller\\SeasonController::deleteAction',));
                }
                not_crud_season__delete:

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
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_crud_player__create;
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\PlayerController::createAction',  '_route' => 'crud_player__create',);
                }
                not_crud_player__create:

                // crud_player__edit
                if (preg_match('#^/crud/player/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'crud_player__edit')), array (  '_controller' => 'AppBundle\\Controller\\PlayerController::editAction',));
                }

                // crud_player__update
                if (preg_match('#^/crud/player/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_crud_player__update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'crud_player__update')), array (  '_controller' => 'AppBundle\\Controller\\PlayerController::updateAction',));
                }
                not_crud_player__update:

                // crud_player__delete
                if (preg_match('#^/crud/player/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_crud_player__delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'crud_player__delete')), array (  '_controller' => 'AppBundle\\Controller\\PlayerController::deleteAction',));
                }
                not_crud_player__delete:

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
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_crud_team__create;
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\TeamController::createAction',  '_route' => 'crud_team__create',);
                }
                not_crud_team__create:

                // crud_team__edit
                if (preg_match('#^/crud/team/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'crud_team__edit')), array (  '_controller' => 'AppBundle\\Controller\\TeamController::editAction',));
                }

                // crud_team__update
                if (preg_match('#^/crud/team/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_crud_team__update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'crud_team__update')), array (  '_controller' => 'AppBundle\\Controller\\TeamController::updateAction',));
                }
                not_crud_team__update:

                // crud_team__delete
                if (preg_match('#^/crud/team/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_crud_team__delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'crud_team__delete')), array (  '_controller' => 'AppBundle\\Controller\\TeamController::deleteAction',));
                }
                not_crud_team__delete:

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
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_crud_round__create;
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\RoundController::createAction',  '_route' => 'crud_round__create',);
                }
                not_crud_round__create:

                // crud_round__edit
                if (preg_match('#^/crud/round/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'crud_round__edit')), array (  '_controller' => 'AppBundle\\Controller\\RoundController::editAction',));
                }

                // crud_round__update
                if (preg_match('#^/crud/round/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_crud_round__update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'crud_round__update')), array (  '_controller' => 'AppBundle\\Controller\\RoundController::updateAction',));
                }
                not_crud_round__update:

                // crud_round__delete
                if (preg_match('#^/crud/round/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_crud_round__delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'crud_round__delete')), array (  '_controller' => 'AppBundle\\Controller\\RoundController::deleteAction',));
                }
                not_crud_round__delete:

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
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_crud_game__create;
                    }

                    return array (  '_controller' => 'AppBundle\\Controller\\GameController::createAction',  '_route' => 'crud_game__create',);
                }
                not_crud_game__create:

                // crud_game__edit
                if (preg_match('#^/crud/game/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'crud_game__edit')), array (  '_controller' => 'AppBundle\\Controller\\GameController::editAction',));
                }

                // crud_game__update
                if (preg_match('#^/crud/game/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_crud_game__update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'crud_game__update')), array (  '_controller' => 'AppBundle\\Controller\\GameController::updateAction',));
                }
                not_crud_game__update:

                // crud_game__delete
                if (preg_match('#^/crud/game/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_crud_game__delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'crud_game__delete')), array (  '_controller' => 'AppBundle\\Controller\\GameController::deleteAction',));
                }
                not_crud_game__delete:

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
