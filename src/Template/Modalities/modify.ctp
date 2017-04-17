<div class="form-clean">
    <div class="title">
        <h3><?= $title ?></h3>
    </div>
    <?php
        echo $this->Form->create($modality);
        echo $this->Form->control('name', ['label' => 'Nome', 'class' => 'form-control']);
        echo $this->Form->control('min_modality_hour', ['label' => 'Carga horária mínima', 'class' => 'form-control']);
        echo $this->Form->control('min_modality_days', ['label' => 'Mínimo de dias letivos', 'class' => 'form-control']);
        echo $this->Form->control('is_by_days', ['label' => 'Utilizar dias letivos']);
        echo $this->Form->button(__('Salvar Modalidade'), ['class' => 'btn btn-primary']);
        echo $this->Form->button(__('Cancelar'), ['type' => 'button', 'class' => 'btn btn-danger', 'onclick' => 'location.href=\'/\'']);
        echo $this->Form->end();
    ?>
</div>
