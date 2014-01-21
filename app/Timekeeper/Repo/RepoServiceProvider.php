<?php namespace Timekeeper\Repo;

use Client;     // Eloquent 'report'
use Illuminate\Support\ServiceProvider;
use Timekeeper\Repo\Session\SentrySession;
use Timekeeper\Repo\User\SentryUser;
use Timekeeper\Repo\Group\SentryGroup;
use Timekeeper\Repo\Client\EloquentClient;
//use Timekeeper\Service\Cache\LaravelCache;
use Cartalyst\Sentry\Sentry;

class RepoServiceProvider extends ServiceProvider {

	/**
	 * Register the binding
	 */
	public function register()
	{
		$app = $this->app;

		 // Bind the Session Repository
        $app->bind('Timekeeper\Repo\Session\SessionInterface', function($app)
        {
            return new SentrySession(
            	$app['sentry']
            );
        });

        // Bind the User Repository
        $app->bind('Timekeeper\Repo\User\UserInterface', function($app)
        {
            return new SentryUser(
            	$app['sentry']
            );
        });

        // Bind the Group Repository
        $app->bind('Timekeeper\Repo\Group\GroupInterface', function($app)
        {
            return new SentryGroup(
                $app['sentry']
            );
        });

        // Bind the Client Repository
        $app->bind('Timekeeper\Repo\Client\ClientInterface', function($app)
        {
            return new EloquentClient(
                new Client
            );
        });
	}

}