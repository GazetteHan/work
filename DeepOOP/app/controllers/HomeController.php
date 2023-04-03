<?php

namespace App\controllers;

use App\exeptions\NotEnoughMoneyException;
use App\QueryBuilder;
use Aura\SqlQuery\Exception;
use League\Plates\Engine;
use Tamtamchik\SimpleFlash\flash;

class HomeController
{
    private $templates;
    private $auth;
    private $userName;

    public function __construct() {
        $this->templates = new Engine('../app/views');
        $db = new QueryBuilder();
        $this->auth = new \Delight\Auth\Auth($db->pdo);

        $this->userName = "test5";
    }

    public function index($vars = null) {
        $db = new QueryBuilder();
        $posts = $db->getAll('posts');
        echo $this->templates->render('homepage', ['postInView' => $posts]);

        echo $this->auth->getUsername();
    }

    public function about($vars = null) {

        $db = new QueryBuilder();
        $userName = $this->userName;

        try {
            $userId = $this->auth->register($userName . '@mail.ru', $userName, $userName, function ($selector, $token) {
                echo 'Send ' . $selector . ' and ' . $token . ' to the user (e.g. via email)';
                echo '  For emails, consider using the mail(...) function, Symfony Mailer, Swiftmailer, PHPMailer, etc.';
                echo '  For SMS, consider using a third-party service and a compatible SDK';
            });

            echo 'We have signed up a new user with the ID ' . $userId;
        } catch (\Delight\Auth\InvalidEmailException $e) {
            die('Invalid email address');
        } catch (\Delight\Auth\InvalidPasswordException $e) {
            die('Invalid password');
        } catch (\Delight\Auth\UserAlreadyExistsException $e) {
            die('User already exists');
        } catch (\Delight\Auth\TooManyRequestsException $e) {
            die('Too many requests');
        }

        //		try {
        //			$this->auth->admin()->deleteUserByUsername('test');
        //		}
        //		catch (\Delight\Auth\UnknownUsernameException $e) {
        //			die('Unknown username');
        //		}
        //		catch (\Delight\Auth\AmbiguousUsernameException $e) {
        //			die('Ambiguous username');
        //		}


        //		try {
        //			$this->withdraw($vars['amount']);
        //		} catch (NotEnoughMoneyException $exception) {
        //			flash()->error($exception->getMessage());
        //		}
        echo $this->templates->render('about', ['name' => 'Marlin']);
    }

    public function email_verification() {

        $selector = "sck7IKTuUew0rhk0";
        $key = "OqcllCtMMBazxooK";
        try {
            $this->auth->confirmEmail($selector, $key);

            echo 'Email address has been verified';
        } catch (\Delight\Auth\InvalidSelectorTokenPairException $e) {
            die('Invalid token');
        } catch (\Delight\Auth\TokenExpiredException $e) {
            die('Token expired');
        } catch (\Delight\Auth\UserAlreadyExistsException $e) {
            die('Email address already exists');
        } catch (\Delight\Auth\TooManyRequestsException $e) {
            die('Too many requests');
        }
    }

    public function login() {
//		var_dump($this->userName);
        try {
            $this->auth->login($this->userName . '@mail.ru', $this->userName);

            echo 'User is logged in';
        } catch (\Delight\Auth\InvalidEmailException $e) {
            die('Wrong email address');
        } catch (\Delight\Auth\InvalidPasswordException $e) {
            die('Wrong password');
        } catch (\Delight\Auth\EmailNotVerifiedException $e) {
            die('Email not verified');
        } catch (\Delight\Auth\TooManyRequestsException $e) {
            die('Too many requests');
        }
    }

    //	public function withdraw($amount) {
    //		$total = 10;
    //		if ($amount > $total) {
    //			var_dump("Должна быть ошибка");
    //			var_dump($amount);
    //			throw new NotEnoughMoneyException("Недостаточно средств");
    //
    //		}
    //	}
}