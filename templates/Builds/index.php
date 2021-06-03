<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Build[]|\Cake\Collection\CollectionInterface $builds
 */
?>
<div class="builds index content">
    <?= $this->Html->link(__('New Build'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Builds') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($builds as $build): ?>
                <tr>
                    <td><?= $this->Number->format($build->id) ?></td>
                    <td><?= h($build->name) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $build->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $build->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $build->id], ['confirm' => __('Are you sure you want to delete # {0}?', $build->id)]) ?>
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
