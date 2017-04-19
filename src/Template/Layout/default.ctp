<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            <?= $this->fetch('title') ?>
        </title>
        <?= $this->Html->meta('icon') ?>

        <?= $this->Html->css('bootstrap.min.css') ?>
        <?= $this->Html->css('Navigation-Clean.css') ?>

        <?= $this->Html->css('bootstrap-select.min.css') ?>
        <?= $this->Html->script('bootstrap-select.min.js') ?>

        <?= $this->Html->css('font-awesome.min.css') ?>

        <?= $this->Html->css('custom-styles.css') ?>

        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>
    </head>
    <body>
        <div>
            <nav class="navbar navbar-default navigation-clean">
                <div class="container">
                    <div class="navbar-header">
                        <a href="/"><?= $this->Html->image('logo.png', ['height' => '50']) ?></a>
                    </div>
                    <div class="collapse navbar-collapse" id="navcol-1">
                        <ul class="nav navbar-nav navbar-right">
                            <?php if (!is_null($this->request->session()->read('Auth.User.username'))) { ?>
                            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fa fa-users" aria-hidden="true"></i> Aluno <span class="caret"></span></a>
                                <ul class="dropdown-menu dropdown-menu-left" role="menu">
                                    <li role="presentation"><a href="/students/add">Cadastro</a></li>
                                    <li role="presentation"><a href="/students">Consulta</a></li>
                                    <li role="presentation" class="divider"></li>
                                    <li role="presentation"><a href="#">Matrícula</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Professor <span class="caret"></span></a>
                                <ul class="dropdown-menu dropdown-menu-left" role="menu">
                                    <li role="presentation"><a href="/professors/add">Cadastro</a></li>
                                    <li role="presentation"><a href="/professors">Consulta</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fa fa-briefcase" aria-hidden="true"></i>
 Funcionário <span class="caret"></span></a>
                                <ul class="dropdown-menu dropdown-menu-left" role="menu">
                                    <li role="presentation"><a href="/employees/add">Cadastro</a></li>
                                    <li role="presentation"><a href="/employees">Consulta</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fa fa-book" aria-hidden="true"></i>
 Curso <span class="caret"></span></a>
                                <ul class="dropdown-menu dropdown-menu-left multi-level" role="menu" aria-labelledby="dropdownMenu">
                                    <li role="presentation"><a href="/courses/add">Cadastro</a></li>
                                    <li role="presentation"><a href="/courses">Consulta</a></li>
                                    <li role="presentation" class="divider"></li>
                                    <li class="dropdown-submenu" role="presentation"><a tabindex="-1" href="#">Modalidade</a>
                                        <ul class="dropdown-menu">
                                            <li role="presentation"><a tabindex="-1" href="/modalities/add">Cadastro</a></li>
                                            <li role="presentation"><a tabindex="-1" href="/modalities">Consulta</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu" role="presentation"><a tabindex="-1" href="#">Turma</a>
                                        <ul class="dropdown-menu">
                                            <li role="presentation"><a tabindex="-1" href="/classrooms/add">Cadastro</a></li>
                                            <li role="presentation"><a tabindex="-1" href="/classrooms">Consulta</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu" role="presentation"><a tabindex="-1" href="#">Disciplina</a>
                                        <ul class="dropdown-menu">
                                            <li role="presentation"><a tabindex="-1" href="/subjects/add">Cadastro</a></li>
                                            <li role="presentation"><a tabindex="-1" href="/subjects">Consulta</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu" role="presentation"><a tabindex="-1" href="#">Período</a>
                                        <ul class="dropdown-menu">
                                            <li role="presentation"><a tabindex="-1" href="#">Cadastro</a></li>
                                            <li role="presentation"><a tabindex="-1" href="#">Consulta</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fa fa-calendar" aria-hidden="true"></i>
 Calendário <span class="caret"></span></a>
                                <ul class="dropdown-menu dropdown-menu-left" role="menu">
                                    <li role="presentation"><a href="#">Cadastro</a></li>
                                    <li role="presentation"><a href="#">Consulta</a></li>
                                </ul>
                            </li>
                            <li role="presentation"><a href="/users/logout"><i class="fa fa-sign-out" aria-hidden="true"></i>
 Sair</a></li>
                            <?php } else { ?>
                            <li role="presentation"><a href="#">Contato</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <?= $this->Flash->render() ?>
        <div class="container">
            <?= $this->fetch('content') ?>
        </div>

        <footer>
            <p class="copyright">Scholar © 2017</p>
        </footer>

        <?= $this->Html->script('jquery.min.js'); ?>
        <?= $this->Html->script('bootstrap.min.js'); ?>
    </body>
</html>
