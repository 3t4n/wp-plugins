<?php
namespace DaReactions\Entities;
use DaReactions\Data;
use DateTime;
use Exception;
class Vote {
    private $ID;
    private $resource_id;
    private $resource_type;
    private $emotion_id;
    private $user_id;
    private $user_token;
    private $user_ip;
    private $created_at;
    /**
     * @param $name
     * @param $value
     *
     * @return void
     */
    public function changePropertyByName( $name, $value )
    {
        if ( property_exists( $this, $name ) ) {
            $methodName = "set" . str_replace( [ '.', '-', '_', ' ' ], '', ucwords( $name, '_-. ' ) );
            if ( method_exists( $this, $methodName ) ) {
                $this->$methodName( $value );
            }
        }
    }
    /**
     * @return mixed
     */
    public function getID()
    {
        return $this->ID;
    }
    /**
     * @param mixed $ID
     */
    public function setID( $ID )
    {
        $this->ID = $ID;
    }
    /**
     * @return mixed
     */
    public function getResourceId()
    {
        return $this->resource_id;
    }
    /**
     * @param mixed $resource_id
     */
    public function setResourceId( $resource_id )
    {
        $this->resource_id = $resource_id;
    }
    /**
     * @return mixed
     */
    public function getResourceType()
    {
        return $this->resource_type;
    }
    /**
     * @param mixed $resource_type
     */
    public function setResourceType( $resource_type )
    {
        $this->resource_type = $resource_type;
    }
    /**
     * @return mixed
     */
    public function getEmotionId()
    {
        return $this->emotion_id;
    }
    /**
     * @param mixed $emotion_id
     */
    public function setEmotionId( $emotion_id )
    {
        $this->emotion_id = $emotion_id;
    }
    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }
    /**
     * @param mixed $user_id
     */
    public function setUserId( $user_id )
    {
        $this->user_id = $user_id;
    }
    /**
     * @return mixed
     */
    public function getUserToken()
    {
        return $this->user_token;
    }
    /**
     * @param $vote
     *
     * @return void
     */
    public function load( $vote )
    {
        $vote_array = (array) $vote;
        foreach ( $vote_array as $key => $value ) {
            $this->changePropertyByName( $key, $value );
        }
    }
    /**
     * @param mixed $user_token
     */
    public function setUserToken( $user_token )
    {
        $this->user_token = $user_token;
    }
    /**
     * @return mixed
     */
    public function getUserIp()
    {
        return $this->user_ip;
    }
    /**
     * @param mixed $user_ip
     */
    public function setUserIp( $user_ip )
    {
        $this->user_ip = $user_ip;
    }
    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }
    /**
     * @param mixed $created_at
     *
     * @throws Exception
     */
    public function setCreatedAt( $created_at )
    {
        if ( is_int( $created_at ) ) {
            $this->created_at = new DateTime();
            $this->created_at->setTimestamp( $created_at );
        } else if ( is_string( $created_at ) ) {
            $this->created_at = new DateTime( $created_at );
        }
        return $this->created_at;
    }
    /**
     * @return Vote
     */
    public static function selectFirst()
    {
        global $wpdb;
        $table_name = Data::getVotesTable();
	    $result = $wpdb->get_row(
		    $wpdb->prepare(
			    'SELECT * FROM %i ORDER BY %s LIMIT %d',
			    $table_name,
			    'created_at',
			    1
		    )
	    );
        $vote = new self();
        $vote->load( $result );
        return $vote;
    }
}
