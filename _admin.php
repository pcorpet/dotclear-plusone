<?php
if (!defined('DC_CONTEXT_ADMIN')) {return;}

$_menu['Plugins']->addItem(__('+1'),'plugin.php?p=plusone',
	'index.php?pf=plusone/icon.png',preg_match('/plugin.php\?p=plusone(&.*)?$/',
		$_SERVER['REQUEST_URI']),$core->auth->check('admin',$core->blog->id));	
