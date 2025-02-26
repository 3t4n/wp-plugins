<?php
class SocialActionRequest
{
	
	const CREATED_30DAYS = '30';
	const CREATED_14DAYS = '14';
	const CREATED_7DAYS  = '7';
	const CREATED_20DAYS = '2';
	const CREATED_1DAY   = '1';
	const CREATED_ALL    = 'all';
	
	const MATCH_ANY = 'any';
	const MATCH_ALL = 'all';
	
	const ORDER_RELEVANCE  = 'relevance';
	const ORDER_CREATED_AT = 'created_at';

	const TYPE_ALL 				 = 0;
	const TYPE_GROUP_FUNDRAISER  = 1;
	const TYPE_CAMPAIGN 		 = 2;
	const TYPE_PLEDGED_ACTION 	 = 3;
	const TYPE_EVENT 			 = 4;
	const TYPE_AFFINITY_GROUP 	 = 5;
	const TYPE_VOLUNTEER 		 = 6;
	const TYPE_MICRO_CREDIT_LOAN = 7;
	const TYPE_PETITION 		 = 8;
	
	
	protected $strDefaultActionTypesArray = array( 1 => 'Group Fundraiser',
		    									   2 => 'Campaign',
		    									   3 => 'Pledged Action',
		    									   4 => 'Event',
		    									   5 => 'Affinity Group',
		    									   6 => 'Volunteer',
		    									   7 => 'Micro-credit Loan',
		    									   8 => 'Petition' );
		    									   
	protected $strActionTypesArray;
	
	protected $strOrderBy;
	
	protected $strMatch;
	
	protected $strCreated;
	
	protected $strWordsArray;
	
	protected $intLimit;
	
	public function __construct()
	{
		$this->strActionTypesArray = array();
		$this->strCreated = SocialActionRequest::CREATED_ALL;
		$this->strMatch = SocialActionRequest::MATCH_ANY;
		$this->strOrderBy = SocialActionRequest::ORDER_RELEVANCE;
		$this->strWordsArray = array();
		$this->intLimit = 10;
	}
	
	public function setOrderBy( $strOrderBy )
	{
		$this->strOrderBy = $strOrderBy;
		return $this;
	}
	
	public function setMatch( $strMatch )
	{
		$this->strMatch = $strMatch;
		return $this;
	}
	
	public function setCreated( $strCreated )
	{
		$this->strCreated = $strCreated;
		return $this;
	}
	
	public function addActionType( $strActionType )
	{
		$this->strActionTypesArray[] = $strActionType;
		return $this;
	}
	
	public function addWord( $strWord )
	{
		$this->strWordsArray[] = $strWord;
		return $this;
	}
	
	public function setLimit( $intLimit )
	{
		$this->intLimit = $intLimit;
		return $this;
	}
	
	public function getOrderBy()
	{
		return $this->strOrderBy;
	}
	
	public function getMatch()
	{
		return $this->strMatch;
	}
	
	public function getCreated()
	{
		return $this->strCreated;
	}
	
	public function getActionTypesArray()
	{
		return $this->strActionTypesArray;
	}
	
	public function getDefaultActionTypesArray()
	{
		return $this->strDefaultActionTypesArray;
	}
	
	public function getWordsArray()
	{
		return $this->strWordsArray;
	}
	
	public function getLimit()
	{
		return $this->intLimit;
	}
	
}