<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BuildsItem $buildsItem
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Builds Item'), ['action' => 'edit', $buildsItem->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Builds Item'), ['action' => 'delete', $buildsItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $buildsItem->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Builds Items'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Builds Item'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="buildsItems view content">
            <h3><?= h($buildsItem->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Build') ?></th>
                    <td><?= $buildsItem->has('build') ? $this->Html->link($buildsItem->build->name, ['controller' => 'Builds', 'action' => 'view', $buildsItem->build->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Item') ?></th>
                    <td><?= $buildsItem->has('item') ? $this->Html->link($buildsItem->item->name, ['controller' => 'Items', 'action' => 'view', $buildsItem->item->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($buildsItem->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
