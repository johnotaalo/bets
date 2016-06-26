<?php

class AccountController extends ControllerBase
{

    public function indexAction()
    {
    	$this->view->transactions = "";

    	$this->addJavascipt('partials/account_js');
    }

}

