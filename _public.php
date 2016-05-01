<?php

if ($core->blog->settings->plusone_active) {
	$core->addBehavior('publicHeadContent', array('publicPlusOneButton', 'header'));
	$core->addBehavior('publicEntryAfterContent', array('publicPlusOneButton', 'post'));
}

class publicPlusOneButton
{
	public static function header($core) {
		echo "\n<!-- Javascript for +1 button -->\n".
		"<script type=\"text/javascript\" src=\"https://apis.google.com/js/plusone.js\">{lang:\"fr\"}</script>\n\n";
	}

	public static function post($core, $_ctx) {
                echo "<g:plusone href=\"".$_ctx->posts->getURL()."\" size=\"small\"></g:plusone>";
	}
}
