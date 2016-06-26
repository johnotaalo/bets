<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
	public function initialize()
	{
		if ($this->session->get('logged_in') != 1) {
			return $this->response->redirect('auth/signin');
		}
	}

	public function addJavascipt($javascript)
	{
		$this->view->javascript = $this->view->getPartial($javascript);
	}
}
