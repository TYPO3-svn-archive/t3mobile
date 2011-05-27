<?php
if (!defined ('TYPO3_MODE')){
	die ('Access denied.');
}

if (TYPO3_MODE === 'BE') {

	/**
	* Registers Smartphone-Manager Module
	*/
	Tx_Extbase_Utility_Extension::registerModule(
		$_EXTKEY,
		'web',	 		// Make module a submodule of 'web'
		'module1',		// Submodule key
		'',				// Position
		array(
			'BackendSmartphone' => 'admin,syncSmartphoneSortingWithDefaultSorting',
			'BackendAjax' 		=> 'contentSorting',
		),
		array(
			'access' => 'user,group',
			'icon'   => 'EXT:' . $_EXTKEY . '/ext_icon.gif',
			'labels' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_module1.xml',
		)
	);
	
	/**
	* Registers Tablet-Manager Module
	*/
	Tx_Extbase_Utility_Extension::registerModule(
		$_EXTKEY,
		'web',	 		// Make module a submodule of 'web'
		'module2',		// Submodule key
		'',				// Position
		array(
			'BackendTablet' 	=> 'admin,syncTabletSortingWithDefaultSorting',
			'BackendAjax' 		=> 'contentSorting',
		),
		array(
			'access' => 'user,group',
			'icon'   => 'EXT:' . $_EXTKEY . '/ext_icon.gif',
			'labels' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_module2.xml',
		)
	);

}

t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'TYPO3 Mobile');
?>