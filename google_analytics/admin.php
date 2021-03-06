<?php

$webid = Params::getParam('webid');
$option = Params::getParam('option');

if( $option == 'stepone' )
{
	$preferenceModel = ClassLoader::getInstance()->getClassInstance( 'Model_Preference' );
	$preferenceModel->insertOrUpdate( 'google_analytics_id', $webid, 'plugin-google_analytics', 'STRING' );
	echo '<div style="text-align:center; font-size:22px; background-color:#00bb00;"><p>' . __('Congratulations. The plugin is now configured','google_analytics') . '.</p></div>' ;
}
else
{
	$webid = osc_google_analytics_id() ;
}

?>

<form action="<?php osc_admin_base_url(true); ?>" method="get">
	<input type="hidden" name="page" value="plugin" />
	<input type="hidden" name="action" value="renderplugin" />
	<input type="hidden" name="file" value="google_analytics/admin.php" />
	<input type="hidden" name="option" value="stepone" />
    
	<div>
	<?php _e('Please enter your Google Analytics', 'google_analytics'); ?> <label for="id" style="font-weight: bold;"><?php _e('Web property ID', 'google_analytics'); ?></label>: <input type="text" name="webid" id="webid" value="<?php echo $webid; ?>" /> <input type="submit" value="<?php _e('Save', 'google_analytics'); ?>" />
	</div>
</form>

