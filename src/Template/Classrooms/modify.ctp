<div class="form-clean">
    <div class="title">
        <h3><?= $title ?></h3>
    </div>
    <?php
        echo $this->Form->create($classroom);
        echo $this->Form->control('course_id', ['label' => 'Curso', 'class' => 'form-control']);
        echo $this->Form->control('name', ['label' => 'Nome', 'placeholder' => 'Nome da turma', 'class' => 'form-control']);
        echo $this->Form->input('day_shifty', ['label' => 'Turno', 'type' => 'select', 'options' => ['Manhã', 'Tade', 'Noite'], 'class' => 'form-control']);
        echo $this->Form->button(__('Salvar Turma'), ['class' => 'btn btn-primary']);
        echo $this->Form->button(__('Cancelar'), ['type' => 'button', 'class' => 'btn btn-danger', 'onclick' => 'location.href=\'/\'']);
        echo $this->Form->end();
    ?>
</div>
