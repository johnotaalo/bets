<?php

class AuthController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }

    public function signUpAction()
    {
    	if ($this->request->isPost()) {
    		if ($this->security->checkToken()) {
    			$user = User::findFirstByUsername($this->request->getPost('username'));

    			if(!$user){
    				$user = new User();
    				$user->username = $this->request->getPost('username');
	    			$user->password = $this->security->hash($this->request->getPost('password'));
	    			$user->type = "admin";

	    			$user->save();

	    			return $this->response->redirect('auth/signin');
    			}
    			else {
    				$this->view->setVar("error", "This user already exists");
    			}
    		}
    	}

    	$this->view->setVar("token", $this->security->getTokenKey());
    	$this->view->setVar("tokenVal", $this->security->getToken());
    }

    public function signInAction()
    {
    	if ($this->request->isPost()) {
    		if ($this->security->checkToken()) {
    			$username = $this->request->getPost('username');
    			$password = $this->request->getPost('password');

    			$user = User::findFirstByUsername($username);

    			if ($user) {
    				if ($this->security->checkHash($password, $user->password)) {

    					$this->session->set("logged_in", 1);
    					$this->session->set("username", $user->username);
    					$this->session->set("user_id", $user->id);

    					return $this->response->redirect('dashboard');
    				}
    				else
    				{
    					$this->view->setVar("error", "Authentication failed! Please try again");
    				}
    			}else
    			{
    				$this->security->hash(rand());
    				$this->view->setVar("error", "Authentication failed! Please try again");
    			}
    		}
    	}
    	$this->view->setVars([
    			"tokenKey" => $this->security->getTokenKey(),
    			"tokenVal" => $this->security->getToken()
    	]);
    }

    public function logoutAction()
    {
    	$this->session->destroy();

    	return $this->response->redirect('auth/signin');
    }

    public function signoutAction()
    {
    	$this->logoutAction();
    }

}

