<div class="form-clean">
    <div class="title">
        <h3><?= $title ?></h3>
    </div>

    <?php
        echo $this->Form->create($student);
        echo $this->Form->control('name', ['label' => 'Nome', 'placeholder' => 'Nome do aluno', 'class' => 'form-control']);
        echo $this->Form->control('rg', ['label' => 'RG', 'placeholder' => 'RG do aluno', 'class' => 'form-control']);
        echo $this->Form->control('cpf', ['label' => 'CPF', 'placeholder' => 'CPF do aluno', 'class' => 'form-control']);
        echo $this->Form->control('telephone', ['label' => 'Telefone', 'placeholder' => 'Telefone do aluno', 'class' => 'form-control']);
        echo $this->Form->control('responsible_name', ['label' => 'Nome do Responsável', 'placeholder' => 'Nome do Responsável', 'class' => 'form-control']);
        echo $this->Form->control('responsible_telephone', ['label' => 'Telefone do Responsável', 'placeholder' => 'Telefone do Responsável', 'class' => 'form-control']);
        echo $this->Form->control('father_name', ['label' => 'Nome do Pai', 'placeholder' => 'Nome do Pai', 'class' => 'form-control']);
        echo $this->Form->control('father_telephone', ['label' => 'Telefone do Pai', 'placeholder' => 'Telefone do Pai', 'class' => 'form-control']);
        echo $this->Form->control('mother_name', ['label' => 'Nome da Mãe', 'placeholder' => 'Nome da Mãe', 'class' => 'form-control']);
        echo $this->Form->control('mother_telephone', ['label' => 'Telefone da Mãe', 'placeholder' => 'Telefone da Mãe', 'class' => 'form-control']);
        echo $this->Form->control('address', ['label' => 'Endereço', 'placeholder' => 'Endereço do Aluno', 'class' => 'form-control']);
        echo $this->Form->control('address_number', ['label' => 'Número', 'placeholder' => 'Número da Casa ou Apartamento', 'class' => 'form-control']);
        echo $this->Form->control('address_complement', ['label' => 'Complemento', 'placeholder' => 'eg. Bloco, Apartamento', 'class' => 'form-control']);
        echo $this->Form->control('address_zip_code', ['label' => 'CEP', 'placeholder' => 'CEP', 'class' => 'form-control']);
        echo $this->Form->control('email', ['label' => 'Email', 'placeholder' => 'Email do Aluno', 'class' => 'form-control']);
        echo $this->Form->control('user.username', ['label' => 'Usuário', 'placeholder' => 'Usuário', 'class' => 'form-control']);
        echo $this->Form->control('user.password', ['label' => 'Senha', 'placeholder' => 'Senha', 'class' => 'form-control']);
        echo $this->Form->control('user.user_type', ['type' => 'hidden', 'value' => 'Aluno', 'class' => 'form-control']);
        echo $this->Form->button(__('Salvar Aluno'), ['class' => 'btn btn-primary']);
        echo $this->Form->button(__('Cancelar'), ['type' => 'button', 'class' => 'btn btn-danger', 'onclick' => 'location.href=\'/\'']);
        echo $this->Form->end();
    ?>
</div>
