<?php foreach ($debugLogs as $log) : ?>
	<div class="alert alert-warning" role="alert"><?= $log ?></div>
<?php endforeach; ?>

<?php foreach ($errorLogs as $log) : ?>
	<div class="alert alert-danger" role="alert"><?= $log ?></div>
<?php endforeach; ?>

<?= $this->Form->create(null, ['url' => '/logger/write']) ?>
<?= $this->Form->input('scope'); ?>
<?= $this->Form->input('message'); ?>
<?= $this->Form->submit(); ?>
<?= $this->Form->end(); ?>