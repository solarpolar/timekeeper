<?php namespace Timekeeper\Service\Form;

use Illuminate\Support\ServiceProvider;
use Timekeeper\Service\Form\Login\LoginForm;
use Timekeeper\Service\Form\Login\LoginFormLaravelValidator;
use Timekeeper\Service\Form\Register\RegisterForm;
use Timekeeper\Service\Form\Register\RegisterFormLaravelValidator;
use Timekeeper\Service\Form\Group\GroupForm;
use Timekeeper\Service\Form\Group\GroupFormLaravelValidator;
use Timekeeper\Service\Form\User\UserForm;
use Timekeeper\Service\Form\User\UserFormLaravelValidator;
use Timekeeper\Service\Form\ResendActivation\ResendActivationForm;
use Timekeeper\Service\Form\ResendActivation\ResendActivationFormLaravelValidator;
use Timekeeper\Service\Form\ForgotPassword\ForgotPasswordForm;
use Timekeeper\Service\Form\ForgotPassword\ForgotPasswordFormLaravelValidator;
use Timekeeper\Service\Form\ChangePassword\ChangePasswordForm;
use Timekeeper\Service\Form\ChangePassword\ChangePasswordFormLaravelValidator;
use Timekeeper\Service\Form\SuspendUser\SuspendUserForm;
use Timekeeper\Service\Form\SuspendUser\SuspendUserFormLaravelValidator;

class FormServiceProvider extends ServiceProvider {

    /**
     * Register the binding
     *
     * @return void
     */
    public function register()
    {
        $app = $this->app;

        // Bind the Login Form
        $app->bind('Timekeeper\Service\Form\Login\LoginForm', function($app)
        {
            return new LoginForm(
                new LoginFormLaravelValidator( $app['validator'] ),
                $app->make('Timekeeper\Repo\Session\SessionInterface')
            );
        });

        // Bind the Register Form
        $app->bind('Timekeeper\Service\Form\Register\RegisterForm', function($app)
        {
            return new RegisterForm(
                new RegisterFormLaravelValidator( $app['validator'] ),
                $app->make('Timekeeper\Repo\User\UserInterface')
            );
        });

        // Bind the Group Form
        $app->bind('Timekeeper\Service\Form\Group\GroupForm', function($app)
        {
            return new GroupForm(
                new GroupFormLaravelValidator( $app['validator'] ),
                $app->make('Timekeeper\Repo\Group\GroupInterface')
            );
        });

        // Bind the User Form
        $app->bind('Timekeeper\Service\Form\User\UserForm', function($app)
        {
            return new UserForm(
                new UserFormLaravelValidator( $app['validator'] ),
                $app->make('Timekeeper\Repo\User\UserInterface')
            );
        });

        // Bind the Resend Activation Form
        $app->bind('Timekeeper\Service\Form\ResendActivation\ResendActivationForm', function($app)
        {
            return new ResendActivationForm(
                new ResendActivationFormLaravelValidator( $app['validator'] ),
                $app->make('Timekeeper\Repo\User\UserInterface')
            );
        });

        // Bind the Forgot Password Form
        $app->bind('Timekeeper\Service\Form\ForgotPassword\ForgotPasswordForm', function($app)
        {
            return new ForgotPasswordForm(
                new ForgotPasswordFormLaravelValidator( $app['validator'] ),
                $app->make('Timekeeper\Repo\User\UserInterface')
            );
        });

        // Bind the Change Password Form
        $app->bind('Timekeeper\Service\Form\ChangePassword\ChangePasswordForm', function($app)
        {
            return new ChangePasswordForm(
                new ChangePasswordFormLaravelValidator( $app['validator'] ),
                $app->make('Timekeeper\Repo\User\UserInterface')
            );
        });

        // Bind the Suspend User Form
        $app->bind('Timekeeper\Service\Form\SuspendUser\SuspendUserForm', function($app)
        {
            return new SuspendUserForm(
                new SuspendUserFormLaravelValidator( $app['validator'] ),
                $app->make('Timekeeper\Repo\User\UserInterface')
            );
        });

    }

}