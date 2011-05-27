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

class Tx_T3mobile_Controller_BackendSmartphoneController extends Tx_Extbase_MVC_Controller_ActionController {
	
	/**
	 * smartphoneContentRepository
	 * @var Tx_T3mobile_Domain_Repository_SmartphoneContentRepository
	 */
	protected $smartphoneContentRepository;

	/**
	 * Initializes the current action
	 * @return void
	 */
	protected function initializeAction() {
		$this->smartphoneContentRepository = t3lib_div::makeInstance('Tx_T3mobile_Domain_Repository_SmartphoneContentRepository');
	}
	
	/**
	 * Displays all SmartphoneContents
	 * @return string The rendered list view
	 */
	public function adminAction() {
		// Hidden Elements (Column 0)
		$smartphoneContentsColumn0 = $this->smartphoneContentRepository->findAllRecordsMatchingByPidAndSmartphoneColumnSortedBySmartphoneSorting(t3lib_div::GPVar('id'),0);
		// Elements in Column 1
		$smartphoneContentsColumn1 = $this->smartphoneContentRepository->findAllRecordsMatchingByPidAndSmartphoneColumnSortedBySmartphoneSorting(t3lib_div::GPVar('id'),1);
		
		if(count($smartphoneContentsColumn1) < 1){
			$this->flashMessageContainer->add("There's no content on this page");
		}else{
			//Check, if a smartphone sorting exist
			foreach ($smartphoneContentsColumn1 as $smartphoneContent){
				$sorting = $smartphoneContent->getSmartphoneSorting();
				if($sorting == 999999){
					$this->syncSmartphoneSortingWithDefaultSortingAction('admin');
				}
			}
		}
		$this->view->assign('smartphoneContentsColumn1', $smartphoneContentsColumn1);
		$this->view->assign('smartphoneContentsColumn0', $smartphoneContentsColumn0);
		$this->view->assign('device', 'Smartphone');
		$this->view->assign('pageUid', t3lib_div::GPVar('id'));
	}

	/**
	 * Change die content ordering for the smartphone view
	 */
	public function changeSmartphoneSortingAction(){
		$smartphoneContents = $this->smartphoneContentRepository->findAllRecordsInPidSortedByDefaultSorting(t3lib_div::GPVar('id'));

		$tx_t3mobile_web_t3mobilemodule1 = t3lib_div::_GP('tx_t3mobile_web_t3mobilemodule1');
		$i = 0;
		foreach ($smartphoneContents as $smartphoneContent){
			$smartphoneContent->setSmartphoneSorting($tx_t3mobile_web_t3mobilemodule1['sortingArray'][$i]);
			$i ++;
		}
		$this->redirect('admin');
	}
	
	/**
	 * Sync the smartphone Sorting with the sorting of the default view
	 * @param string redirect redirect after sync
	 */
	public function syncSmartphoneSortingWithDefaultSortingAction($redirectAction){
		$smartphoneContents = $this->smartphoneContentRepository->findAllRecordsInPidSortedByDefaultSorting(t3lib_div::GPVar('id'));
		
		$smartphonePosition = 0;
		foreach ($smartphoneContents as $smartphoneContent){
			$smartphoneContent->setSmartphoneSorting($smartphonePosition);
			$smartphonePosition ++;
		}
		$this->flashMessageContainer->add('Sync is done');	
		$this->redirect($redirectAction);		
	}

}
?>