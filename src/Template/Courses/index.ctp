<div class="form-clean">
    <div class="title">
        <h3>Cursos</h3>
    </div>

    <?= $this->Form->create() ?>
        <div class="row">
            <div class="col-md-6 col-md-offset-6">
                <div class="input-group">
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-default dropdown-toggle form-select" data-toggle="dropdown" aria-expanded="false"><div id="search_value" style="float:left;"><?= $search_field ?></div> <div style="float:right;"><span class="caret"></span></div></button>
                        <ul class="dropdown-menu dropdown-menu-left" style="margin-top:-28px;" role="menu">
                            <li><a href="#" onclick="$('#search_value').html('Nome');$('#hidden_field').val('Nome');">Nome</a></li>
                            <li><a href="#" onclick="$('#search_value').html('RG');$('#hidden_field').val('RG');">RG</a></li>
                            <li><a href="#" onclick="$('#search_value').html('CPF');$('#hidden_field').val('CPF');">CPF</a></li>
                        </ul>
                    </div>
                    <input type="hidden" name="search_field" value="<?= $search_field ?>" id="hidden_field">
                    <div class="form-group">
                        <label class="control-label" for="search-field">
                            <i class="glyphicon glyphicon-search"></i>
                        </label>
                        <input type="text" id="search-field" name="search_value" value="<?= $search_value ?>" class="form-control" style="text-indent: 15px">
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('name', ['label' => 'Nome']) ?></th>
                    <th><?= $this->Paginator->sort('modality_id', ['label' => 'Modalidade']) ?></th>
                    <th><?= $this->Paginator->sort('course_hour_duration', ['label' => 'Duração do Curso']) ?></th>
                    <th><?= $this->Paginator->sort('course_hour_duration', ['label' => 'Duração da Aula']) ?></th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($courses as $course): ?>
                <tr>
                    <td><?= $course->name ?></td>
                    <td><?= $course->modality->name ?></td>
                    <td><?= $course->course_hour_duration ?></td>
                    <td><?= $course->lesson_hour_duration ?></td>
                    <td>
                        <?= $this->Html->link(
                           '<i class="glyphicon glyphicon-edit"></i>',
                            [
                                'action' => 'edit',
                                $course->id
                            ],
                            [
                                'data-toggle'         => 'tooltip',
                                'title'               => 'Editar',
                                'style'               => 'margin-right: 5px;',
                                'escape'              => false
                            ]
                        ); ?>
                        <?= $this->Html->link(
                           '<i class="glyphicon glyphicon-remove"></i>',
                            [
                                'action' => 'delete',
                                $course->id
                            ],
                            [
                                'data-toggle'         => 'tooltip',
                                'title'               => 'Excluir',
                                'escape'              => false
                            ]
                        ); ?>
                    </td>
                </tr>
                <?php endforeach; ?>
                <!-- classes para contextualizar as linhas da tabela <tr>: success, danger, info, warning, active -->
            </tbody>
        </table>
    <?= $this->Form->end() ?>
</div>
