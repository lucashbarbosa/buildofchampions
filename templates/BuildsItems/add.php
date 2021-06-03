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
            <?= $this->Html->link(__('List Builds Items'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="buildsItems form content">
            <?= $this->Form->create($buildsItem) ?>
            <fieldset>
                <legend><?= __('Add Builds Item') ?></legend>
                <?php
                    echo $this->Form->control('build_id', ['options' => $builds, 'empty' => true]);
                    echo $this->Form->control('item_id', ['options' => $items, 'empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
