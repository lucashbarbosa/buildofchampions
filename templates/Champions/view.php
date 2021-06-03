<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Champion $champion
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <?= $this->Html->link(__('List Champions'), ['action' => 'index'], ['class' => 'btn btn-primary']) ?>
            <?= $this->Html->link(__('New Champion'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="champions view content">
            <h3><?= h($champion->name) ?></h3>
            <table class = "table">
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($champion->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Image') ?></th>
                    <td><?= h($champion->image) ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($champion->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($champion->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div>
    <h3><?= $champion->name?>'s builds</h3>
    <ul>
        <?php foreach ($champion_builds as $cb){?>
            <li><p><?= $cb['name']?> <a style = "margin-right: 15px; color: #cc1f1a" href = "/champions/remove-build/<?= $cb['id']?>/<?= $champion["id"]?>">[Remove]</a></p></li>
        <?php } ?>
    </ul>


    <h3>Add Build to Champion - <?= $champion->name?> </h3>
    <form action = "/champions/add-build/<?= $champion->id?>" method = "post">
        <select name = "build">
            <?php foreach($builds->toList() as $build){ ?>
                <option value="<?= $build['id']?>"><?= $build['name']?></option>
            <?php } ?>
        </select>

        <input type = "submit" value = "Save">

    </form>

</div>
