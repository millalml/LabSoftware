<?php
    echo $this->Form->input('user', ['label' => 'Usuario']);
    echo $this->Form->input('password', ['label' => 'Contraseña', 'value' => '']);
    echo $this->Form->input('user_type', ['options' => ['admin' => 'Administrador', 'user_produc' => 'Operario Producción', 'user_puli' => 'Operario Pulida'], 'label' => 'Tipo de Usuario']);
    echo $this->Form->input('active', ['label' => 'Activo']);
?>