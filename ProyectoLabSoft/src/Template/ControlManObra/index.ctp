<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h2>
                CONTROL MANO DE OBRA
                <?= $this->Html->link('<span class="glyphicon glyphicon-plus"></spand> Nuevo', ['controller' => 'controlManObra', 'action' => 'add'], ['class' => 'btn btn-primary pull-right', 'escape' => false]); ?>
            </h2>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('fecha' , ['Fecha']) ?></th>
                <th><?= $this->Paginator->sort('producto' , ['Producto']) ?></th>
                <th><?= $this->Paginator->sort('color' , ['Color']) ?></th>
                <th><?= $this->Paginator->sort('material' , ['Material']) ?></th>
                <th><?= $this->Paginator->sort('talla' , ['Talla (s)']) ?></th>
                <th><?= $this->Paginator->sort('cantidad' , ['Cantidad']) ?></th>
                <th><?= $this->Paginator->sort('ref' , ['REF. / LOTE']) ?></th>
                <th><?= $this->Paginator->sort('cliente' , ['Cliente']) ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($controlManObra as $control_man_obra): ?>
            <tr>
                <td><?= $this->Number->format($control_man_obra->id) ?></td>
                <td><?= h($control_man_obra->fecha) ?></td>
                <td><?= h($control_man_obra->producto) ?></td>
                <td><?= h($control_man_obra->color) ?></td>
                <td><?= h($control_man_obra->material) ?></td>
                <td><?= h($control_man_obra->talla) ?></td>
                <td><?= h($control_man_obra->cantidad) ?></td>
                <td><?= h($control_man_obra->ref) ?></td>
                <td><?= h($control_man_obra->cliente) ?></td>
            </tr>
        <?php endforeach; ?>
            </tbody>
            </table>
        </div>
        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->prev('< Anterior') ?>
                <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
                <?= $this->Paginator->next('Siguiente >') ?>
            </ul>
            <p><?= $this->Paginator->counter() ?></p>
        </div>
    </div>
</div>
