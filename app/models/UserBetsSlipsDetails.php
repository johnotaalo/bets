<?php

class UserBetsSlipsDetails extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $details_id;

    /**
     *
     * @var integer
     */
    protected $user_bets_slip_id;

    /**
     *
     * @var string
     */
    protected $hometeam;

    /**
     *
     * @var string
     */
    protected $awayteam;

    /**
     *
     * @var string
     */
    protected $pick;

    /**
     *
     * @var double
     */
    protected $odds;

    /**
     *
     * @var string
     */
    protected $result;

    /**
     *
     * @var string
     */
    protected $status;

    /**
     *
     * @var string
     */
    protected $created_on;

    /**
     * Method to set the value of field details_id
     *
     * @param integer $details_id
     * @return $this
     */
    public function setDetailsId($details_id)
    {
        $this->details_id = $details_id;

        return $this;
    }

    /**
     * Method to set the value of field user_bets_slip_id
     *
     * @param integer $user_bets_slip_id
     * @return $this
     */
    public function setUserBetsSlipId($user_bets_slip_id)
    {
        $this->user_bets_slip_id = $user_bets_slip_id;

        return $this;
    }

    /**
     * Method to set the value of field hometeam
     *
     * @param string $hometeam
     * @return $this
     */
    public function setHometeam($hometeam)
    {
        $this->hometeam = $hometeam;

        return $this;
    }

    /**
     * Method to set the value of field awayteam
     *
     * @param string $awayteam
     * @return $this
     */
    public function setAwayteam($awayteam)
    {
        $this->awayteam = $awayteam;

        return $this;
    }

    /**
     * Method to set the value of field pick
     *
     * @param string $pick
     * @return $this
     */
    public function setPick($pick)
    {
        $this->pick = $pick;

        return $this;
    }

    /**
     * Method to set the value of field odds
     *
     * @param double $odds
     * @return $this
     */
    public function setOdds($odds)
    {
        $this->odds = $odds;

        return $this;
    }

    /**
     * Method to set the value of field result
     *
     * @param string $result
     * @return $this
     */
    public function setResult($result)
    {
        $this->result = $result;

        return $this;
    }

    /**
     * Method to set the value of field status
     *
     * @param string $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Method to set the value of field created_on
     *
     * @param string $created_on
     * @return $this
     */
    public function setCreatedOn($created_on)
    {
        $this->created_on = $created_on;

        return $this;
    }

    /**
     * Returns the value of field details_id
     *
     * @return integer
     */
    public function getDetailsId()
    {
        return $this->details_id;
    }

    /**
     * Returns the value of field user_bets_slip_id
     *
     * @return integer
     */
    public function getUserBetsSlipId()
    {
        return $this->user_bets_slip_id;
    }

    /**
     * Returns the value of field hometeam
     *
     * @return string
     */
    public function getHometeam()
    {
        return $this->hometeam;
    }

    /**
     * Returns the value of field awayteam
     *
     * @return string
     */
    public function getAwayteam()
    {
        return $this->awayteam;
    }

    /**
     * Returns the value of field pick
     *
     * @return string
     */
    public function getPick()
    {
        return $this->pick;
    }

    /**
     * Returns the value of field odds
     *
     * @return double
     */
    public function getOdds()
    {
        return $this->odds;
    }

    /**
     * Returns the value of field result
     *
     * @return string
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Returns the value of field status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Returns the value of field created_on
     *
     * @return string
     */
    public function getCreatedOn()
    {
        return $this->created_on;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('user_bets_slip_id', 'UserBetsSlips', 'bet_id', array('alias' => 'UserBetsSlips'));
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return UserBetsSlipsDetails[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return UserBetsSlipsDetails
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'user_bets_slips_details';
    }

}
