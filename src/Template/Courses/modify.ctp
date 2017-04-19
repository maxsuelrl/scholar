<div class="form-clean">
    <div class="title">
        <h3><?= $title ?></h3>
    </div>
    <?php
        echo $this->Form->create($course);
        echo $this->Form->control('name', ['label' => 'Nome', 'placeholder' => 'Nome do curso', 'class' => 'form-control']);
        echo $this->Form->control('modality_id', ['label' => 'Modalidade', 'class' => 'form-control', 'options' => $modalities]);
        echo $this->Form->control('course_hour_duration', ['label' => 'Duração do Curso', 'placeholder' => 'Duração do curso em horas', 'class' => 'form-control']);
        echo $this->Form->control('lesson_hour_duration', ['label' => 'Duração Hora/Aula', 'placeholder' => 'Tempo em minutos de uma aula', 'class' => 'form-control']);
        echo $this->Form->button(__('Salvar Curso'), ['class' => 'btn btn-primary']);
        echo $this->Form->button(__('Cancelar'), ['type' => 'button', 'class' => 'btn btn-danger', 'onclick' => 'location.href=\'/\'']);
        echo $this->Form->end();
    ?>
</div>
