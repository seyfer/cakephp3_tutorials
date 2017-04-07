<?php //$this->layout('default') ?>

<?= $this->Form->create(null) ?>
	<img src="/captcha/captcha" class="captcha">
<?= $this->Form->input('captcha'); ?>
<?= $this->Form->submit(); ?>
<?= $this->Form->end(); ?>