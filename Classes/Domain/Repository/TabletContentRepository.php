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
 * Repository for Tx_T3mobile_Domain_Model_TabletContent
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
 
class Tx_T3mobile_Domain_Repository_TabletContentRepository extends Tx_T3mobile_Domain_Repository_ContentRepository {

      /**
       * Find all records in the current pid
       * @param $pid pid of current page
       */
      public function findAllRecordsInPidSortedByTabletSorting($pid) {
      	$query = $this->createQuery();
      	$query->getQuerySettings()->setRespectStoragePage(FALSE);
      	$query->matching(
      		$query->equals('pid', $pid)
      	);
      	$query->setOrderings(array('tabletSorting' => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING));
      	return $query->execute();
      }
      
      /**
       * Find all records in the current pid
       * @param $pid pid of current page
       */
      public function findAllRecordsInPidSortedByDefaultSorting($pid) {
      	$query = $this->createQuery();
      	$query->getQuerySettings()->setRespectStoragePage(FALSE);
      	$query->matching(
      		$query->equals('pid', $pid)
      	);
      	$query->setOrderings(array('sorting' => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING));
      	return $query->execute();
      }  
          
      /**
       * Find record by tabletSorting and pid
       * @param $pid pid of current page
       * @param $tabletSorting tablet sorting
       */
      public function findRecordByTabletSortingAndPid($tabletSorting, $pid){
      	$query = $this->createQuery();
      	$query->getQuerySettings()->setRespectStoragePage(FALSE);
		$query->matching(
			$query->logicalAnd(
				$query->logicalAnd(
					$query->equals('pid', $pid),
					$query->equals('tabletSorting', $tabletSorting)	
				)
			)			
		);
      	return $query->execute();
      }
      
      /**
       * 
       * Unused at the moment
       * 
       * @param $pid
       * @param $tabletColumn
       */
      public function findAllRecordsMatchingByPidAndTabletColumnSortedByTabletSorting($pid, $tabletColumn){
      	$query = $this->createQuery();
      	$query->getQuerySettings()->setRespectStoragePage(FALSE);
		$query->matching(
			$query->logicalAnd(
				$query->logicalAnd(
					$query->equals('pid', $pid),
					$query->equals('tabletColumn', $tabletColumn)	
				)
			)			
		);
      	$query->setOrderings(array('tabletSorting' => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING));
      	return $query->execute();      	
      }
}
?>