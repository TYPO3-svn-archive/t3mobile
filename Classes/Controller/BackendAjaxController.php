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
 * Controller for the backend ajax requests
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */

class Tx_T3mobile_Controller_BackendAjaxController extends Tx_Extbase_MVC_Controller_ActionController {
	
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
	 * Sort Content
	 * @return string The rendered list view
	 * @param string $device 
	 */
	public function contentSortingAction($device) {
		$TxT3mobileModule = t3lib_div::_GP('TxT3mobileModule');
		$position = 0;
			if($device=='Smartphone'){
			foreach ($TxT3mobileModule['content'] as $uid){
				$record = $this->smartphoneContentRepository->findByUid($uid);
				$record->setSmartphoneSorting($position);
				$record->setSmartphoneColumn($TxT3mobileModule['column']);
				$position++;
			}	
		}
		if($device=='Tablet'){
			foreach ($TxT3mobileModule['content'] as $uid){
				$record = $this->tabletContentRepository->findByUid($uid);
				$record->setTabletSorting($position);
				$record->setTabletColumn($TxT3mobileModule['column']);
				$position++;
			}	
		}
	}
}
?>