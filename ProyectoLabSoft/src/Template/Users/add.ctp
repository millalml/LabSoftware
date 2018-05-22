<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="page-header">
            <h2>Crear usuario</h2>
        </div>
        <?= $this->Form->create($user) ?>
        <fieldset>
            <?php
                echo $this->Form->input('user', ['label' => 'Usuario']);
                echo $this->Form->input('password', ['label' => 'Contraseña']);
                echo $this->Form->input('user_type', ['options' => ['admin' => 'Administrador', 'user_produc' => 'Operario Producción', 'user_puli' => 'Operario Pulida'], 'label' => 'Tipo de Usuario']);
                echo $this->Form->input('active', ['label' => 'Activo']);
            ?>
        </fieldset>
        <?= $this->Form->button('Crear Usuario') ?>
        <?= $this->Form->end() ?>
    </div>
</div>
