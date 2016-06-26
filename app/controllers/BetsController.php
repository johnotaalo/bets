<?php

class BetsController extends ControllerBase
{

    public function indexAction()
    {
    	$this->view->bettable = $this->createBetsTable();

    	$this->addJavascipt('partials/bets_js');

    	$this->assets->collection('css')
    							->addCss('https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css');

    	$this->assets->collection('js')
    							->addJs('https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js', TRUE)
    							->addJs('https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js', TRUE);
    }

    public function addbetAction()
    {
    	if ($this->request->isPost()) {
    		if ($this->security->checkToken()) {
    			$userbetslips = new UserBetsSlips();

    			$userbetslips->created_by = $this->session->get('user_id');
    			$userbetslips->amount = $this->request->getPost('amount');
    			$userbetslips->status = "Running";

    			if(!$userbetslips->save())
    			{
    				foreach ($userbetslips->getMessages() as $message) {
    					echo $message . "<br/>";
    				}die;
    			}
    			else
    			{
    				$bet_id = $userbetslips->bet_id;

    				$count = count($this->request->getPost('home_team'));

    				for ($i=0; $i < $count ; $i++) {
    					$detail = new UserBetsSlipsDetails();

    					$detail->user_bets_slip_id = $bet_id;
    					$detail->hometeam = $this->request->getPost('home_team')[$i];
    					$detail->awayteam = $this->request->getPost('away_team')[$i];
    					$detail->pick = $this->request->getPost('pick')[$i];
    					$detail->odds = $this->request->getPost('odds')[$i];
    					$detail->status = "running";

    					if(!$detail->save())
    					{
    						echo "Details <br/>";
    						foreach ($detail->getMessages() as $message) {
    							echo "{$message} <br/>";
    						}die;
    					}
    				}
    			}

    			return $this->response->redirect('bets');
    		}
    	}
    	$this->addJavascipt('partials/bets_js');
    }

    function viewbetAction($bet_id)
    {
    	$bets = UserBetsSlipsDetails::findByUserBetsSlipId($bet_id);
    	$bet_table = "";
    	if (count($bets)) {
    		$status = array('running', 'lost', 'won');
    		$counter = 1;
    		foreach ($bets as $bet) {
    			$bet_table .= '<tr>';
    			$bet_table .= "<td>{$counter}</td>";
    			$bet_table .= "<td>{$bet->hometeam}</td>";
    			$bet_table .= "<td>{$bet->awayteam}</td>";
    			$bet_table .= "<td>{$bet->pick}</td>";
    			$bet_table .= "<td>{$bet->odds}</td>";
    			$bet_table .= "<td><input type = 'text' value = '{$bet->result}' class = 'form-control' name = 'results[]'/></td>";
    			$bet_table .= "<td><select name = 'status[]' class = 'form-control'>";
    			foreach ($status as $stat) {
    				$selected = "";
    				if ($stat == $bet->status) {
    					$selected = "selected";
    				}
    				$bet_table .= "<option value = '{$stat}' {$selected}>{$stat}</option>";
    			}
    			$bet_table .= "</select></td>";
    			$bet_table .= "<input type = 'hidden' value = '{$bet->details_id}' name = 'detail_id[]'/></tr>";
    			$counter++;
    		}
    	}

    	$bet_slip_details = UserBetsSlips::findFirst($bet_id);

    	$this->view->bettable = $bet_table;
    	$this->view->betid = $bet_id;
    	$this->view->status = $bet_slip_details->status;
    }

    function editBetAction($bet_id)
    {
    	if ($this->request->isPost()) {
    		$count = count($this->request->getPost('detail_id'));

    		$lost = $won = 0;

    		for ($i=0; $i < $count ; $i++) { 
    			$detail = UserBetsSlipsDetails::findFirstByDetailsId($this->request->getPost('detail_id')[$i]);
    			$detail->result = $this->request->getPost('results')[$i];
    			$detail->status = $this->request->getPost('status')[$i];

    			if ($detail->status == "lost") {
    				$lost++;
    			}
    			else if($detail->status == "won")
    			{
    				$won++;
    			}

    			$detail->update();
    		}

    		$betslip = UserBetsSlips::findFirstByBetId($bet_id);

    		if ($lost > 0) {
    			$betslip->status = "Lost";
    		}
    		else if($won == $count)
    		{
    			$betslip->status = "Won";
    		}
    		else
    		{
    			$betslip->status = "Running";
    		}

    		$betslip->update();


    		return $this->response->redirect('bets/viewbet/' . $bet_id);
    	}
    }


    function createBetsTable()
    {
    	$bets = UserBetsSlips::find(array("order" => "bet_id DESC"));

    	$bet_table = "";

    	if (count($bets)) {
    		$counter = 1;
    		foreach ($bets as $bet) {
    			$bet_odds = UserBetsSlipsDetails::findByUserBetsSlipId($bet->bet_id);

    			$multiple_of_bet = 1;

    			foreach ($bet_odds as $odd) {
    				$multiple_of_bet = $multiple_of_bet * $odd->odds;
    			}

    			$expected_amount = $bet->amount * $multiple_of_bet;

                $bet_status = "";

                if ($bet->status == "Running") {
                   $bet_status = "<a class = 'label label-warning'>Running</a>";
                }
                else if ($bet->status == "Won")
                {
                    $bet_status = "<a class = 'label label-success'>Won</a>";
                }
                else
                {
                    $bet_status = "<a class = 'label label-danger'>Lost</a>";
                }
    			$bet_table .= "<tr>";
    			$bet_table .= "<td>{$counter}</td>";
    			$bet_table .= "<td>".date('d-m-Y', strtotime($bet->date_time_created))."</td>";
    			$bet_table .= "<td>Ksh. {$bet->amount}</td>";
    			$bet_table .= "<td>Ksh. {$expected_amount}</td>";
    			$bet_table .= "<td style = 'text-align: center;'>{$bet_status}</td>";
    			$bet_table .= "<td style = 'text-align: center;'><a class = 'label label-warning' href = '".$this->url->get('bets/viewbet/' . $bet->bet_id)."'>View Bet</a></td>";
    			$bet_table .= "</tr>";
    			$counter++;
    		}
    	}

    	return $bet_table;
    }
    

}

