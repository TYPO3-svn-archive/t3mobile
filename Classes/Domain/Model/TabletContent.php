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

class Tx_T3mobile_Domain_Model_TabletContent extends Tx_T3mobile_Domain_Model_Content {

	/**
	 * tabletSorting
	 *
	 * @var integer $tabletSorting
	 */
	protected $tabletSorting;
	
	/**
	 * tabletColumn
	 *
	 * @var integer $tabletColumn
	 */
	protected $tabletColumn;	
	
	/**
	 * tabletHide
	 *
	 * @var integer $tabletHide
	 */
	protected $tabletHide;		

	/**
	 * Setter for tabletSorting
	 *
	 * @param integer $tabletSorting tabletSorting
	 * @return void
	 */
	public function setTabletSorting($tabletSorting) {
		$this->tabletSorting = $tabletSorting;
	}

	/**
	 * Getter for tabletSorting
	 *
	 * @return integer tabletSorting
	 */
	public function getTabletSorting() {
		return $this->tabletSorting;
	}
	
	/**
	 * Setter for tabletColumn
	 *
	 * @param integer $tabletColumn tabletColumn
	 * @return void
	 */
	public function setTabletColumn($tabletColumn) {
		$this->tabletColumn = $tabletColumn;
	}

	/**
	 * Getter for tabletColumn
	 *
	 * @return integer tabletColumn
	 */
	public function getTabletColumn() {
		return $this->tabletColumn;
	}		

}
?>