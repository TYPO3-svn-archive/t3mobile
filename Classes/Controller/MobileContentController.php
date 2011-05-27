<?php

/***************************************************************
*  Copyright notice
*
*  (c) GreenBanana GmbH - www.greenbanana.ch 2011
*      Juerg Langhard <langhard@greenbanana.ch>
*      
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * Controller for the SmartphoneContent object
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */

class Tx_T3mobile_Controller_MobileContentController extends Tx_Extbase_MVC_Controller_ActionController {
	
	/**
	 * smartphoneContentRepository
	 * @var Tx_T3mobile_Domain_Repository_SmartphoneContentRepository
	 */
	protected $smartphoneContentRepository;
	
	/**
	 * tabletContentRepository
	 * @var Tx_T3mobile_Domain_Repository_TabletContentRepository
	 */
	protected $tabletContentRepository;	

	/**
	 * Initializes the current action
	 * @return void
	 */
	protected function initializeAction() {
		$this->smartphoneContentRepository 	= t3lib_div::makeInstance('Tx_T3mobile_Domain_Repository_SmartphoneContentRepository');
		$this->tabletContentRepository 		= t3lib_div::makeInstance('Tx_T3mobile_Domain_Repository_TabletContentRepository');
	}
	
	/**
	 * Get all contets for smartphone view
	 * @return string The rendered list view
	 */
	public function smartphoneAction() {
		$this->view->assign('mobileContentColumn1', $this->getRecordsByColumn('Smartphone', 1));
	}
	
	/**
	 * Get all contets for tablet view
	 * @return string The rendered list view
	 */
	public function tabletAction() {
		$this->view->assign('mobileContentColumn1', $this->getRecordsByColumn('Tablet', 1));
		$this->view->assign('mobileContentColumn2', $this->getRecordsByColumn('Tablet', 2));
		$this->view->assign('mobileContentColumn3', $this->getRecordsByColumn('Tablet', 3));
	}	
	
	/**
	 * Get content records by device and column
	 * @param string $device
	 * @param int $column
	 */
	private function getRecordsByColumn($device, $column){
		
		switch ($device) {
	    case 'Smartphone':
	        $mobileContentByColumn = $this->smartphoneContentRepository->findAllRecordsMatchingByPidAndSmartphoneColumnSortedBySmartphoneSorting($GLOBALS['TSFE']->id,$column);
	        break;
	    case 'Tablet':
	        $mobileContentByColumn = $this->tabletContentRepository->findAllRecordsMatchingByPidAndTabletColumnSortedByTabletSorting($GLOBALS['TSFE']->id,$column);
	        break;
		}
				
		$uidlist = '';		
		foreach ($mobileContentByColumn as $mobileContent){
			$uidlist .= $mobileContent->getUid().',';
		}
		$this->cObj = t3lib_div::makeInstance('tslib_cObj');
		$tt_content_conf = array(
			'tables' => 'tt_content',
			'source' => $uidlist,
			'dontCheckPid' => 1
		);
		$content = $this->cObj->RECORDS($tt_content_conf);	

		return $content;
	}

}
?>