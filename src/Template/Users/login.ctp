<?php $this->append('css', $this->Html->css('Login-Form-Clean.css')); ?>
<div class="login-clean">
    <?= $this->Form->create() ?>
    <div class="illustration">
        <?= $this->Html->image('logo.png', ['height' => '80']) ?>
        <p style="font-size:25px;color:rgb(50,160,65);">Sistema Acadêmico</p>
    </div>
    <div class="form-group">
        <?= $this->Form->control('username', ['label' => false, 'class' => 'form-control', 'placeholder' => 'Usuário']) ?>
    </div>
    <div class="form-group">
        <?= $this->Form->control('password', ['label' => false, 'class' => 'form-control', 'placeholder' => 'Senha']) ?>
    </div>
    <div class="form-group">
        <?= $this->Form->button(__('Entrar'), ['class' => 'btn btn-primary btn-block']) ?>
    </div>
    <a href="#" class="forgot">Esqueci o usuário ou senha.</a>
    <?= $this->Form->end() ?>
</div>
