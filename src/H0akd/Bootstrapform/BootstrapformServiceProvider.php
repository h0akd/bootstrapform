<?php

namespace H0akd\Bootstrapform;

use Illuminate\Support\ServiceProvider;
use H0akd\Bootstrapform\BootstrapForm;

class BootstrapformServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        $this->app['bootform'] = $this->app->share(function($app) {
            $form = new BootstrapForm($app['html'], $app['url'], $app['session.store']->getToken());
            return $form->setSessionStore($app['session.store']);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides() {
        return array();
    }

}
