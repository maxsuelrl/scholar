<div class="form-clean">
    <div class="title">
        <h3><?= $title ?></h3>
    </div>
    <?php
        echo $this->Form->create($subject);
        echo $this->Form->control('name', ['label' => 'Nome', 'class' => 'form-control']);
        echo $this->Form->control('subject_hour_duration', ['label' => 'Carga horária', 'class' => 'form-control']);
        echo $this->Form->button(__('Salvar Disciplina'), ['class' => 'btn btn-primary']);
        echo $this->Form->button(__('Cancelar'), ['type' => 'button', 'class' => 'btn btn-danger', 'onclick' => 'location.href=\'/\'']);
        echo $this->Form->end();
    ?>
</div>
