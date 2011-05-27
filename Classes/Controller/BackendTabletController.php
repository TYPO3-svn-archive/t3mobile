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
 * Controller for the TabletContent object
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */

class Tx_T3mobile_Controller_BackendTabletController extends Tx_Extbase_MVC_Controller_ActionController {
	
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
		$this->tabletContentRepository = t3lib_div::makeInstance('Tx_T3mobile_Domain_Repository_TabletContentRepository');
	}
	
	/**
	 * Displays all TabletContents
	 * @return string The rendered list view
	 */
	public function adminAction() {
		// Hidden Elements (Column 0)
		$tabletContentsColumn0 = $this->tabletContentRepository->findAllRecordsMatchingByPidAndTabletColumnSortedByTabletSorting(t3lib_div::GPVar('id'),0);
		// Elements in Column 1
		$tabletContentsColumn1 = $this->tabletContentRepository->findAllRecordsMatchingByPidAndTabletColumnSortedByTabletSorting(t3lib_div::GPVar('id'),1);
		// Elements in Column 2
		$tabletContentsColumn2 = $this->tabletContentRepository->findAllRecordsMatchingByPidAndTabletColumnSortedByTabletSorting(t3lib_div::GPVar('id'),2);
		// Elements in Column 3
		$tabletContentsColumn3 = $this->tabletContentRepository->findAllRecordsMatchingByPidAndTabletColumnSortedByTabletSorting(t3lib_div::GPVar('id'),3);		
		
		if(count($tabletContentsColumn1) < 1 && count($tabletContentsColumn2) < 1 && count($tabletContentsColumn3) < 1){
			$this->flashMessageContainer->add("There's no content on this page");
		}else{
			//Check, if a tablet sorting exist
			foreach ($tabletContentsColumn1 as $tabletContent){
				$sorting = $tabletContent->getTabletSorting();
				if($sorting == 999999){
					$this->syncTabletSortingWithDefaultSortingAction('admin');
				}
			}
		}
		
		$this->view->assign('tabletContentsColumn0', $tabletContentsColumn0);
		$this->view->assign('tabletContentsColumn1', $tabletContentsColumn1);
		$this->view->assign('tabletContentsColumn2', $tabletContentsColumn2);
		$this->view->assign('tabletContentsColumn3', $tabletContentsColumn3);		
		$this->view->assign('device', 'Tablet');	
		$this->view->assign('pageUid', t3lib_div::GPVar('id'));
	}
	
	/**
	 * Change die content ordering for the tablet view
	 */
	public function changeTabletSortingAction(){
		$tabletContents = $this->tabletContentRepository->findAllRecordsInPidSortedByDefaultSorting(t3lib_div::GPVar('id'));		
		
		$tx_t3mobile_web_t3mobilemodule1 = t3lib_div::_GP('tx_t3mobile_web_t3mobilemodule1');
		$i = 0;
		foreach ($tabletContents as $tabletContent){
			$tabletContent->setTabletSorting($tx_t3mobile_web_t3mobilemodule1['sortingArray'][$i]);
			$i ++;
		}
		$this->redirect('admin');
	}
	
	/**
	 * Sync the tablet Sorting with the sorting of the default view
	 * @param string redirect redirect after sync
	 */
	public function syncTabletSortingWithDefaultSortingAction($redirectAction){
		$tabletContents = $this->tabletContentRepository->findAllRecordsInPidSortedByDefaultSorting(t3lib_div::GPVar('id'));		
		
		$tabletPosition = 0;
		foreach ($tabletContents as $tabletContent){
			$tabletContent->setTabletSorting($tabletPosition);
			$tabletPosition ++;
		}
		$this->flashMessageContainer->add('Sync is done');	
		$this->redirect($redirectAction);		
	}

}
?>