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
 * MobileContent
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */

class Tx_T3mobile_Domain_Model_SmartphoneContent extends Tx_T3mobile_Domain_Model_Content {

	/**
	 * smartphoneSorting
	 *
	 * @var integer $smartphoneSorting
	 */
	protected $smartphoneSorting;
	
	/**
	 * smartphoneColumn
	 *
	 * @var integer $smartphoneColumn
	 */
	protected $smartphoneColumn;	
	
	/**
	 * smartphoneHide
	 *
	 * @var integer $smartphoneHide
	 */
	protected $smartphoneHide;		

	/**
	 * Setter for smartphoneSorting
	 *
	 * @param integer $smartphoneSorting smartphoneSorting
	 * @return void
	 */
	public function setSmartphoneSorting($smartphoneSorting) {
		$this->smartphoneSorting = $smartphoneSorting;
	}

	/**
	 * Getter for smartphoneSorting
	 *
	 * @return integer smartphoneSorting
	 */
	public function getSmartphoneSorting() {
		return $this->smartphoneSorting;
	}
	
	/**
	 * Setter for smartphoneColumn
	 *
	 * @param integer $smartphoneColumn smartphoneColumn
	 * @return void
	 */
	public function setSmartphoneColumn($smartphoneColumn) {
		$this->smartphoneColumn = $smartphoneColumn;
	}

	/**
	 * Getter for smartphoneColumn
	 *
	 * @return integer smartphoneColumn
	 */
	public function getSmartphoneColumn() {
		return $this->smartphoneColumn;
	}		

}
?>