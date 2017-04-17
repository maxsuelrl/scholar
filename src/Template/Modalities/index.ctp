<div class="form-clean">
    <div class="title">
        <h3>Modalidades</h3>
    </div>

    <?= $this->Form->create() ?>
        <div class="row">
            <div class="col-md-6 col-md-offset-6">
                <div class="input-group">
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-default dropdown-toggle form-select" data-toggle="dropdown" aria-expanded="false"><div id="search_value" style="float:left;"><?= $search_field ?></div> <div style="float:right;"><span class="caret"></span></div></button>
                        <ul class="dropdown-menu dropdown-menu-left" style="margin-top:-28px;" role="menu">
                            <li><a href="#" onclick="$('#search_value').html('Nome');$('#hidden_field').val('Nome');">Nome</a></li>
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
                    <th>Modalidade</th>
                    <th>Carga Horária (Mínima)</th>
                    <th>Dias Letivos (Mínimo)</th>
                    <th>Utilizar Dias Letivos</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($modalities as $modality): ?>
                <tr>
                    <td><?= $modality->name ?></td>
                    <td><?= $modality->min_modality_hour ?></td>
                    <td><?= $modality->min_modality_days ?></td>
                    <?php if ($modality->is_by_days == 1) { ?>
                    <td>Sim</td>
                    <?php } else { ?>
                    <td>Não</td>
                    <?php } ?>
                    <td>
                        <?= $this->Html->link(
                           '<i class="glyphicon glyphicon-edit"></i>',
                            [
                                'action' => 'edit',
                                $modality->id
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
                                $modality->id
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

<?php
echo $this->Paginator->numbers(array(
    'before'            => '<div class=""><ul>',    //Content to be inserted before the numbers.
    'after'             => '</ul></div>',           //Content to be inserted after the numbers.
    'separator'         => '',                      //Separator content defaults to `` | ``
    'currentClass'      => 'current',               //The class name to use on the current/active link. Defaults to current.
    'tag'               => 'li',                    //The tag to wrap links in, defaults to ‘span’.
    'ellipsis'          => '...'                    //Ellipsis content, defaults to ‘...’
));
?>
