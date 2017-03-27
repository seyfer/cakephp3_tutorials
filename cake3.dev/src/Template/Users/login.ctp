<?php

echo $this->Form->create();
echo $this->Form->label('username');
echo $this->Form->text('username');
echo $this->Form->label('password');
echo $this->Form->password('password');
echo $this->Form->button('Login', ['type' => 'submit']);
echo $this->Form->end(['data-type' => 'hidden']);