<div class="content">

    <?php

    echo $this->Form->create($form);
    echo $this->Form->input('name');
    echo $this->Form->input('email');
    echo $this->Form->button('Submit');
    echo $this->Form->end();
    ?>

</div>
