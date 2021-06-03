<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BuildsItem[]|\Cake\Collection\CollectionInterface $buildsItems
 */
?>
<div class="buildsItems index content">
    <?= $this->Html->link(__('New Builds Item'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Builds Items') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('build_id') ?></th>
                    <th><?= $this->Paginator->sort('item_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($buildsItems as $buildsItem): ?>
                <tr>
                    <td><?= $this->Number->format($buildsItem->id) ?></td>
                    <td><?= $buildsItem->has('build') ? $this->Html->link($buildsItem->build->name, ['controller' => 'Builds', 'action' => 'view', $buildsItem->build->id]) : '' ?></td>
                    <td><?= $buildsItem->has('item') ? $this->Html->link($buildsItem->item->name, ['controller' => 'Items', 'action' => 'view', $buildsItem->item->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $buildsItem->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $buildsItem->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $buildsItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $buildsItem->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
