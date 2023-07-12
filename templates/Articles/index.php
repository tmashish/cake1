<h1>Articles List </h1>
<?= $this->Html->link('Add new Article',['action'=>'add']); ?>
<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Craeted At</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($articles as $article){
            ?>
        <tr>
            <td><?=  $this->Html->link($article->title,['action'=>'view',$article->slug]) ?></td>
            <td><?= $article->created_id; ?></td>
            <td><?= $this->Html->link('Edit',['action'=>'edit',$article->slug]);?>|
                <?= 
                    $this->Form->postLink('Delete',['action'=>'delete',$article->slug],['confirm'=>'Are you sure!']);
                ?>
        </td>
        </tr>
        <?php } ?>
    </tbody>
</table>