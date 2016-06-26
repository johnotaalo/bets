<?php

class UserBetsSlips extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $bet_id;

    /**
     *
     * @var double
     */
    protected $amount;

    /**
     *
     * @var string
     */
    protected $date_time_created;

    /**
     *
     * @var integer
     */
    protected $created_by;

    /**
     *
     * @var string
     */
    protected $status;

    /**
     * Method to set the value of field bet_id
     *
     * @param integer $bet_id
     * @return $this
     */
    public function setBetId($bet_id)
    {
        $this->bet_id = $bet_id;

        return $this;
    }

    /**
     * Method to set the value of field amount
     *
     * @param double $amount
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Method to set the value of field date_time_created
     *
     * @param string $date_time_created
     * @return $this
     */
    public function setDateTimeCreated($date_time_created)
    {
        $this->date_time_created = $date_time_created;

        return $this;
    }

    /**
     * Method to set the value of field created_by
     *
     * @param integer $created_by
     * @return $this
     */
    public function setCreatedBy($created_by)
    {
        $this->created_by = $created_by;

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
     * Returns the value of field bet_id
     *
     * @return integer
     */
    public function getBetId()
    {
        return $this->bet_id;
    }

    /**
     * Returns the value of field amount
     *
     * @return double
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Returns the value of field date_time_created
     *
     * @return string
     */
    public function getDateTimeCreated()
    {
        return $this->date_time_created;
    }

    /**
     * Returns the value of field created_by
     *
     * @return integer
     */
    public function getCreatedBy()
    {
        return $this->created_by;
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
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('bet_id', 'UserBetsSlipsDetails', 'user_bets_slip_id', array('alias' => 'UserBetsSlipsDetails'));
        $this->belongsTo('created_by', 'User', 'id', array('alias' => 'User'));
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return UserBetsSlips[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return UserBetsSlips
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
        return 'user_bets_slips';
    }

}
