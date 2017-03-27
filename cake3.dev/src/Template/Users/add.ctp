<?php

echo $this->Form->create($users);
echo $this->Form->label('username');
echo $this->Form->text('username');
echo $this->Form->label('password');
echo $this->Form->password('password');
echo $this->Form->button('Register', ['type' => 'submit']);
echo $this->Form->end(['data-type' => 'hidden']);