<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Build $build
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Build'), ['action' => 'edit', $build->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Build'), ['action' => 'delete', $build->id], ['confirm' => __('Are you sure you want to delete # {0}?', $build->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Builds'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Build'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="builds view content">
            <h3><?= h($build->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($build->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($build->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Items') ?></h4>
                <?php if (!empty($build->items)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Attributes') ?></th>
                            <th><?= __('Image') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($build->items as $items) : ?>
                        <tr>
                            <td><?= h($items->id) ?></td>
                            <td><?= h($items->name) ?></td>
                            <td><?= h($items->description) ?></td>
                            <td><?= h($items->attributes) ?></td>
                            <td><?= h($items->image) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Items', 'action' => 'view', $items->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Items', 'action' => 'edit', $items->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Items', 'action' => 'delete', $items->id], ['confirm' => __('Are you sure you want to delete # {0}?', $items->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Champion Builds') ?></h4>
                <?php if (!empty($build->champion_builds)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Champion Id') ?></th>
                            <th><?= __('Build Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($build->champion_builds as $championBuilds) : ?>
                        <tr>
                            <td><?= h($championBuilds->id) ?></td>
                            <td><?= h($championBuilds->champion_id) ?></td>
                            <td><?= h($championBuilds->build_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'ChampionBuilds', 'action' => 'view', $championBuilds->]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'ChampionBuilds', 'action' => 'edit', $championBuilds->]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ChampionBuilds', 'action' => 'delete', $championBuilds->], ['confirm' => __('Are you sure you want to delete # {0}?', $championBuilds->)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
