<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="page-header">
            <h2>Crear nuevo registro Mano de Obra</h2>
        </div>
        <?= $this->Form->create($controlManObra, ['novalidate']) ?>
        <fieldset>
            <?= $this->element('controlManObra/fields') ?>
        </fieldset>
        <?= $this->Form->button('Crear Registro') ?>
        <?= $this->Form->end() ?>
    </div>
</div>
