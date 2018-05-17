<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Agregar Usuario') ?></legend>
        <?php
            echo $this->Form->control('user');
            echo $this->Form->control('password');
            echo $this->Form->control('user_type', ['options' => ['admin' => 'Administrador', 'user_produc' => 'Usuario Produccion', 'user_puli' => 'Usuario Pulida']]);
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Crear Usuario')) ?>
    <?= $this->Form->end() ?>
</div>
