<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Champion $champion
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $champion->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $champion->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Champions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="champions form content">
            <?= $this->Form->create($champion) ?>
            <fieldset>
                <legend><?= __('Edit Champion') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('image');
                    echo $this->Form->control('description');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
