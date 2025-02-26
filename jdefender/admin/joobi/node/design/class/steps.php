<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Design_Steps_class extends Library_Progress_class {
	var $useAjax = true;
	protected $_stepDuration = 1;
	protected $_maxIncrement = 100;
	protected $_showBar = true;
	protected $_showProgressStatus = true;
	protected $_showError = true;
	protected $_showTimeEstimate = true;
	protected $_showTimeCompletion = true;
	protected $_stepA = array(
	0 => 'initialize'
	,1 => 'processing'
	,2 => 'report'
	);
	protected $_stepRatioA = array(
	'initialize' => 1
	,'processing' => 98
	,'report' => 1
	);
	protected $_stepTotalIncrementA = array(
	'initialize' => 1
	,'processing' => 100
	,'report' => 1
	);
	private $_task = '';
	private $_eid = 0;
	private $_maxElementExport = 50;		
	public function init() {
		$this->_eid = WGlobals::get( 'sid' );
		if ( !empty($this->_eid) ) WGlobals::setSession( 'designExport', 'modelID', $this->_eid );
		$this->_task = WGlobals::get( 'task' );
		if ( in_array( $this->_task, array( 'export', 'doexport' ) ) ) {
			$this->_firstMessage = WText::t('1442242224NXUO');
		} else {
			$this->_firstMessage = WText::t('1445896217EVBG');
		}		
		return true;
	}
	public function runStep() {
		$this->setStep( 'inProgress' );
		$this->_task = WGlobals::get( 'task' );
				$this->_eid = WGlobals::getSession( 'designExport', 'modelID' );
		if ( empty($this->_eid) || ! in_array( $this->_task, array( 'export', 'import', 'doexport', 'doimport', 'importupload' ) ) ) {
			$this->setReturnedAction( 'WAjxRefresh', 'Information is missing!', 'html', 'failed' );
			$this->completeProcess();
			return true;	
		}
		if ( in_array( $this->_task, array( 'export', 'doexport' ) ) ) {
			$this->_exportSteps();
		} elseif ( in_array( $this->_task, array( 'import', 'doimport', 'importupload' ) ) ) {
			$this->_importSteps();
		}				
		return true;
	}
	private function _exportSteps() {
				$mess = '';
		$designExportC = WClass::get( 'design.export' );
		switch( $this->_progressO->currentStep ) {
			case 'initialize':
				$this->setReturnedAction( '', '', 'wait' );
								WGlobals::setSession( 'designExport', 'filename', '' );
				$status = $designExportC->countElements( $this->_eid );
				$this->_stepTotalIncrementA['processing'] = ceil( $status / $this->_maxElementExport );
								if ( ! $status ) {
					$this->setReturnedAction( 'WAjxRefresh', WText::t('1442242224NXUP') . $link, 'html', 'failed' );
					$this->completeProcess();
					break;
				}		
					$COUNT = $status;
					$model = WModel::get( $this->_eid, 'object' );
					$MODELNAME = $model->getTranslatedName();
					$this->setReturnedAction( 'WAjxRefresh', str_replace(array('$COUNT','$MODELNAME'), array($COUNT,$MODELNAME),WText::t('1442403381LUFC')), 'html' );
					$this->setReturnedAction( 'WAjxAppend', '<br>' . $this->_progressO->stepNb. '. ' . str_replace(array('$COUNT','$MODELNAME'), array($COUNT,$MODELNAME),WText::t('1442403381LUFC')), 'append' );
				$this->setStep( 'complete' );
				break;
			case 'processing':
				$model = WModel::get( $this->_eid, 'object' );
				if ( !empty($model) ) {
					$MODELNAME = $model->getTranslatedName();
				} else {
					$MODELNAME = '';
				}
				$START = $this->readParams( 'start', 0 );
				$END = $START + $this->_maxElementExport;
				$status = $designExportC->processExport( $this->_eid, $START, $this->_maxElementExport );
				$this->setReturnedAction( 'WAjxAppend', '<br>' . $this->_progressO->stepNb . '. ' . str_replace(array('$MODELNAME','$START','$END'), array($MODELNAME,$START,$END),WText::t('1442403381LUFD')), 'append' );
				$START += $this->_maxElementExport;
				$this->addParams( 'start', $START );
				if ( ! $status || $this->_progressO->increment == $this->_stepTotalIncrementA['processing'] ) {
					$this->setReturnedAction( 'WAjxRefresh', WText::t('1442324359ANVJ'), 'html' );
										$this->setStep( 'complete' );
				}		
				break;
			case 'report':
				$this->setReturnedAction( 'WAjxAppend', '<br>' . $this->_progressO->stepNb . '. ' . WText::t('1442242224NXUS'), 'append' );
					$this->setReturnedAction( 'WAjxRefresh', WText::t('1442242224NXUT'), 'html' );
					$objButtonO = WPage::newBluePrint( 'button' );
					$objButtonO->text = WText::t('1442403381LUFE');
					$objButtonO->target = 'blank';
					$objButtonO->type = 'infoLink';
					$objButtonO->link = $designExportC->getExportURL( $this->_eid );
					$objButtonO->color = 'success';
					$htmlLink = WPage::renderBluePrint( 'button', $objButtonO );
					$this->setReturnedAction( 'WAjxRefresh', '<br><br>' . $htmlLink, 'append' );
					$this->setReturnedAction( '', '', 'unwait' );
										$this->setStep( 'complete' );
				break;
			default:
				$this->setReturnedAction( 'WAjxRefresh', 'Step not defined!', 'html', 'failed' );
				$this->setStep( 'complete' );
				break;
		}		
	}	
	private function _importSteps() {
				$mess = '';
		$designImportC = WClass::get( 'design.import' );
		switch( $this->_progressO->currentStep ) {
			case 'initialize':
								$status = $designImportC->loadXMLFile();
				$this->setReturnedAction( '', '', 'wait' );
								if ( ! $status ) {
					$this->setReturnedAction( 'WAjxRefresh', $designImportC->XMLError(), 'html', 'failed' );
					$this->completeProcess();
					break;
				}	
				$this->addParams( 'fileLocation', $status );
				if ( $this->_progressO->increment == 1 ) $this->setReturnedAction( 'WAjxAppend', '<br>' . $this->_progressO->stepNb. '. ' . WText::t('1442892456LQGN'), 'append' );
				$this->setStep( 'complete' );
				break;
			case 'processing':
				$objInfoO = $this->readParams( 'fileLocation' );
				if ( !empty($objInfoO->model) ) {
					$model = WModel::get( $objInfoO->model, 'object' );
										if ( !empty($model) ) {
						$MODELNAME = $model->getTranslatedName();
					} else {
						$MODELNAME = '';
					}				} else {
					$MODELNAME = '';
				}				
				$NUMBER = $this->readParams( 'start', 0 );
				if ( empty( $NUMBER ) ) $NUMBER = $objInfoO->pointer;
				$error = false;
				$NUMBER = $designImportC->processImport( $objInfoO, $NUMBER );
				$endofFile = $designImportC->endOfFile();
				if ( ! $NUMBER && ! $endofFile ) {
										$this->setReturnedAction( 'WAjxAppend', '<br>' . $this->_progressO->stepNb . '. ' . WText::t('1442892456LQGO'), 'append' );
					$this->setStep( 'complete' );
					break;
				}
				if ( ! $endofFile ) $this->setReturnedAction( 'WAjxAppend', '<br>' . $this->_progressO->stepNb . '. ' . str_replace(array('$MODELNAME','$NUMBER'), array($MODELNAME,$NUMBER),WText::t('1442892456LQGP')), 'append' );
				$this->addParams( 'start', $NUMBER );
				if ( $endofFile || $this->_progressO->increment == $this->_stepTotalIncrementA['processing'] ) {
					$this->setReturnedAction( 'WAjxRefresh', WText::t('1442892456LQGQ'), 'html' );
										$this->setStep( 'complete' );
				}
				break;
			case 'report':
				if ( $this->_progressO->increment == 1 ) $this->setReturnedAction( 'WAjxAppend', '<br>' . $this->_progressO->stepNb. '. ' . WText::t('1442892456LQGR'), 'append' );
				if ( $this->_progressO->increment == $this->_stepTotalIncrementA['report'] ) {
					$this->setReturnedAction( 'WAjxRefresh', WText::t('1442892456LQGR'), 'html' );
										$this->setStep( 'complete' );
					$this->setReturnedAction( '', '', 'unwait' );
				}	
				break;
			default:
				$this->setReturnedAction( 'WAjxRefresh', 'Step not defined!', 'html', 'failed' );
				$this->setStep( 'complete' );
				break;
		}	
	}	
	private function _displayMessage($messageA=array()) {
		if ( empty($messageA) ) return false;
		$status = true;
		foreach( $messageA as $actionO ) {
			if ( $actionO->action == 'append' ) {
				$this->setReturnedAction( 'WAjxAppend', $actionO->message, 'append' );
			} else {
				$this->setReturnedAction( 'WAjxRefresh', $actionO->message, 'html' );
			}
			if ( !empty($actionO->status) ) {
				$this->setStep( $actionO->status );
				if ( 'failed' == $actionO->status ) $status = false;
			}
		}
		return $status;
	}
}