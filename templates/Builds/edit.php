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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $build->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $build->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Builds'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="builds form content">
            <?= $this->Form->create($build) ?>
            <fieldset>
                <legend><?= __('Edit Build') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('items._ids', ['options' => $items]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
