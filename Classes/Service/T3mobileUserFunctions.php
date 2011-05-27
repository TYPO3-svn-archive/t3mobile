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


class tx_t3mobile {

 	var $cObj; // Reference to the calling object.

    function touchgallery($content,$conf) {
        return '<a href="'.	$content["url"].'"'.
        					$content["targetParams"].' '.
        					$content["aTagParams"].
        					' rel="external">'.
        					$linkImg;
    }
    
    /**
     * PID
     */
    function getsubNavPid($content,$conf){              
    	$pid = '';
        $res = $GLOBALS['TYPO3_DB']->exec_SELECTquery(  'pid',
                                                        'pages',
                                                        'uid='.$GLOBALS['TSFE']->id,
                                                        '',
                                                        '',
                                                        '');        

        while($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)){
            $pid 	= $row['pid']; 
        }
        return $pid;
    }    
        
    /**
     * Evaluate the ShortcutMode from the parrent Page
     */
    function hasPidShortcutModeSet($content,$conf){              
    	$pid = '';
    	// cur
        $res = $GLOBALS['TYPO3_DB']->exec_SELECTquery(  'pid',
                                                        'pages',
                                                        'uid='.$GLOBALS['TSFE']->id.' ',
                                                        '',
                                                        '',
                                                        '');        

        while($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)) {
            $pid 	= $row['pid']; 
        }
        // parrent
        $res2 = $GLOBALS['TYPO3_DB']->exec_SELECTquery( 'doktype',
                                                        'pages',
                                                        'uid='.$pid.' ',
                                                        '',
                                                        '',
                                                        '');        

        while($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res2)) {
            $doktype 	= $row['doktype']; 
        }
        if($doktype == 4){
        	return true;
        }else{
        	return false;
        }        
    }
	
}
?>