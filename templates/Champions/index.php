<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Champion[]|\Cake\Collection\CollectionInterface $champions
 */
?>
<div class="champions index content">
    <?= $this->Html->link(__('New Champion'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
    <h3><?= __('Champions') ?></h3>
    <div class="table-responsive">
        <table class = "table">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('image') ?></th>
                    <th><?= $this->Paginator->sort('description') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($champions as $champion): ?>
                <tr>
                    <td><?= $this->Number->format($champion->id) ?></td>
                    <td><?= h($champion->name) ?></td>
                    <td><?= h($champion->image) ?></td>
                    <td><?= h($champion->description) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $champion->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $champion->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $champion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $champion->id)]) ?>
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
