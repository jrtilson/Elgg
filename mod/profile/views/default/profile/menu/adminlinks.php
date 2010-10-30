<?php
/**
 * Profile admin context links
 * 
 * @package ElggProfile
 * 
 * @uses $vars['entity'] The user entity
 */

if (isadminloggedin()){
	if (get_loggedin_userid()!=$vars['entity']->guid){
?>
		<a href="<?php echo $vars['url']; ?>pg/settings/user/<?php echo $vars['entity']->username; ?>/"><?php echo elgg_echo('profile:editdetails'); ?></a>
<?php 
			if (!$vars['entity']->isBanned()) {
				echo elgg_view('output/confirmlink', array('text' => elgg_echo("ban"), 'href' => "{$vars['url']}action/admin/user/ban?guid={$vars['entity']->guid}"));
			} else {
				echo elgg_view('output/confirmlink', array('text' => elgg_echo("unban"), 'href' => "{$vars['url']}action/admin/user/unban?guid={$vars['entity']->guid}")); 
			}
			echo elgg_view('output/confirmlink', array('text' => elgg_echo("delete"), 'href' => "{$vars['url']}action/admin/user/delete?guid={$vars['entity']->guid}"));
			echo elgg_view('output/confirmlink', array('text' => elgg_echo("resetpassword"), 'href' => "{$vars['url']}action/admin/user/resetpassword?guid={$vars['entity']->guid}"));
			if (!$vars['entity']->isAdmin()) { 
				echo elgg_view('output/confirmlink', array('text' => elgg_echo("makeadmin"), 'href' => "{$vars['url']}action/admin/user/makeadmin?guid={$vars['entity']->guid}"));
			} else {
				echo elgg_view('output/confirmlink', array('text' => elgg_echo("removeadmin"), 'href' => "{$vars['url']}action/admin/user/removeadmin?guid={$vars['entity']->guid}"));
			}
		}
	}
