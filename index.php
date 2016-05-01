<?php
if (!defined('DC_CONTEXT_ADMIN')) {return;}

$settings =& $core->blog->settings;

try {
if (!empty($_POST['saveconfig'])) {
	$active = $settings->plusone_active;

	$settings->setNameSpace('plusone');
	$settings->put('plusone_active', !empty($_POST['plusone_active']),
			'boolean', 'Display a +1 button for each post');
	$settings->setNameSpace('system');
	
	if ($active == empty($_POST['plusone_active'])) {
		$core->blog->triggerBlog();
		http::redirect($p_url.'&saveconfig=1');
	}
}
} catch (Exception $e) {
	$core->error->add($e->getMessage());
}

if (isset($_GET['saveconfig'])) {
	$msg = __('Configuration successuflly updated.');
} ?>
<html>
<head>
  <title><?php echo (__('+1')); ?></title>
</head>
<body>
  <h2><?php echo html::escapeHTML($core->blog->name).' &rsaquo; '.__('+1'); ?></h2>
  <?php if (!empty($msg)) echo '<p class="message">'.$msg.'</p>'; ?>
  <form method="post" action="<?php echo $p_url ?>">
    <fieldset>
      <legend><?php echo(__('+1')); ?></legend>
      <p><label class="classic">
        <?php echo form::checkbox('plusone_active', 1, $settings->plusone_active); ?>
        <?php echo(__('Display a +1 button for each post')); ?>
      </label></p>
    </fieldset>
    <p><?php echo $core->formNonce(); ?>
      <input type="submit" name="saveconfig" value="<?php echo __('Save configuration') ?>" />
    </p>
  </form>
</body>
</html>
