<?php 
echo $this->Form->create($article);
echo $this->Form->control('user_id',['type'=>'hidden','value'=>1]);
echo $this->Form->control('title');
echo $this->Form->control('body',['row'=>3]);
echo $this->Form->button('Update Article');
echo $this->Form->end();
?>