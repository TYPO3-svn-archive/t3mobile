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
require_once t3lib_extMgm::extPath('t3mobile').'Resources/Private/Frameworks/WURFL/wurfl-php-1.2.1/WURFL/Application.php';

function user_t3mobile($cmd) {

	// WURFL
	$wurflConfigFile 	= t3lib_extMgm::extPath('t3mobile').'Resources/Private/Frameworks/WURFL/wurfl-php-1.2.1/examples/resources/wurfl-config.xml';
	$wurflConfig 		= new WURFL_Configuration_XmlConfig($wurflConfigFile);
	$wurflManagerFactory= new WURFL_WURFLManagerFactory($wurflConfig);
	$wurflManager 		= $wurflManagerFactory->create(true);
	$wurflInfo 			= $wurflManager->getWURFLInfo();
	$device				= $wurflManager->getDeviceForHttpRequest($_SERVER);
	
	if($_GET['debug']==1){
		t3lib_div::debug($device->getAllCapabilities());
	}	
		
	switch ($cmd) {
	    case 'isSmartphoneDevice':
	    	// Check the device
	    	if( $device->getCapability('is_tablet') == 'false' &&
	    		$device->getCapability('mobile_browser') != '' &&
	    		$device->getCapability('ajax_support_javascript') == 'true'
	    	){
	        	return true;
	    	}else{
	    		return false;
	    	}
	    	
	    break;	        
	    case 'isTabletDevice':
	    	// Check the device
	    	if( $device->getCapability('is_tablet') == 'true' &&
	    		$device->getCapability('ajax_support_javascript') == 'true'
	    	){
	        	return true;
	    	}else{
	    		return false;
	    	}
	    	
	    break;	    
	}
}
?>