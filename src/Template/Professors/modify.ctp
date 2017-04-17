<div class="form-clean">
    <div class="title">
        <h3><?= $title ?></h3>
    </div>
    <?php
        echo $this->Form->create($professor);
        echo $this->Form->control('name', ['label' => 'Nome', 'placeholder' => 'Nome do professor', 'class' => 'form-control']);
        echo $this->Form->control('rg', ['label' => 'RG', 'placeholder' => 'RG do professor', 'class' => 'form-control']);
        echo $this->Form->control('cpf', ['label' => 'CPF', 'placeholder' => 'CPF do professor', 'class' => 'form-control']);
        echo $this->Form->control('telephone', ['label' => 'Telefone', 'placeholder' => 'Telefone do professor', 'class' => 'form-control']);
        echo $this->Form->control('address', ['label' => 'Endereço', 'placeholder' => 'Endereço do professor', 'class' => 'form-control']);
        echo $this->Form->control('address_number', ['label' => 'Número', 'placeholder' => 'Número da Casa ou Apartamento', 'class' => 'form-control']);
        echo $this->Form->control('address_complement', ['label' => 'Complemento', 'placeholder' => 'eg. Bloco, Apartamento', 'class' => 'form-control']);
        echo $this->Form->control('address_zip_code', ['label' => 'CEP', 'placeholder' => 'CEP', 'class' => 'form-control']);
        echo $this->Form->control('email', ['label' => 'Email', 'placeholder' => 'Email do professor', 'class' => 'form-control']);
        echo $this->Form->control('user.username', ['label' => 'Usuário', 'placeholder' => 'Usuário', 'class' => 'form-control']);
        echo $this->Form->control('user.password', ['label' => 'Senha', 'placeholder' => 'Senha', 'class' => 'form-control']);
        echo $this->Form->control('user.user_type', ['type' => 'hidden', 'value' => 'Funcionário', 'class' => 'form-control']);
        echo $this->Form->button(__('Salvar Funcionário'), ['class' => 'btn btn-primary']);
        echo $this->Form->button(__('Cancelar'), ['type' => 'button', 'class' => 'btn btn-danger', 'onclick' => 'location.href=\'/\'']);
        echo $this->Form->end();
    ?>
</div>
