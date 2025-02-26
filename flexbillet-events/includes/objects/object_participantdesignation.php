<?
	/* ****************************************************
	   Class Participantdesignation
	   **************************************************** */
	   
	class Participantdesignation {
		private $m_designationName;
		private $m_designationDescription;
		private $m_designationMaxParticipantsTotal;
		private $m_designationMaxParticipantsPerCustomer;
		private $m_designationReservedTotal;
		
        public function __construct() {
			// Constructor
        }
		
		/***********************************
		Accessor Methods
		***********************************/
		
		public function setDesignations(	$a_designationName,
											$a_designationDescription,
											$a_designationMaxParticipantsTotal,
											$a_designationMaxParticipantsPerCustomer,
											$a_designationReservedTotal ) {
			$this->m_designationName = $a_designationName;
			$this->m_designationDescription  = $a_designationDescription;
			$this->m_designationMaxParticipantsTotal = $a_designationMaxParticipantsTotal;
			$this->m_designationMaxParticipantsPerCustomer = $a_designationMaxParticipantsPerCustomer;
			$this->m_designationReservedTotal = $a_designationReservedTotal;
		}
		
		public function getIsParticipantDesignation() {
			return true;
		}
		
		public function getDesignationName() {
			return $this->m_designationName;
		}
		
		public function getDesignationReservedTotal() {
			return $this->m_designationReservedTotal;
		}
		
		public function getMaxParticipants() {
			return $this->m_designationMaxParticipantsTotal;
		}
	}
?>