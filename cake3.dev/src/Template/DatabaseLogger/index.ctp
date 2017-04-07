<?= $this->Form->create(null, ['url' => 'databaseLogger/write']) ?>
<?= $this->Form->input('scope'); ?>
<?= $this->Form->input('message'); ?>
<?= $this->Form->submit(); ?>
<?= $this->Form->end(); ?>