<h1><?php echo $this->Html->link('Articles',['action'=>'index']) ?></h1>

<h4><?= $article->title.' Created_at->'.$article->created_id; ?></h4>

<h5><?= $this->Html->link('Edit',['action'=>'edit',$article->slug]); ?></h5>