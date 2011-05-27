<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Smartphone',
	array(
		'MobileContent' => 'smartphone',
	),
	array(
	)
);

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Tablet',
	array(
		'MobileContent' => 'tablet',
	),
	array(
	)
);

// user-functions
include_once(t3lib_extMgm::extPath('t3mobile').'Classes/Service/user_t3mobile.php');
?>