<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="AdminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p>Alexander Pierce</p>
            <!-- Status -->
        </div>
    </div>
    <!-- /.search form -->
    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="/"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
        <li class="treeview">
            <a href="processments/"><i class="fa fa-bars"></i> <span>Projetos</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="projects/"><i class="fa fa-bars"></i>Listar Projetos</a></li>
                <li><a href="projects/add/"><i class="fa fa-plus"></i>Adicionar Projeto</a></li>
                <li><a href="projects/processments/"><i class="fa fa-line-chart"></i>Processar Arquivo</a></li>
                <li><a href="projects/processments/configs/"><i class="fa fa-gears"></i>Configurações</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="processments/"><i class="fa fa-bar-chart"></i> <span>Relatórios</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="projects/processments/configs/"><i class="fa fa-pie-chart"></i>Relatório de Consumo</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="processments/"><i class="fa fa-users"></i> <span>Usuários</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="projects/"><i class="fa fa-bars"></i>Listar Usuários</a></li>
                <li><a href="projects/add/"><i class="fa fa-plus"></i>Adicionar Usuário</a></li>
                <li><a href="projects/processments/configs/"><i class="fa fa-gears"></i>Configurar Permissões</a></li>
            </ul>
        </li>
        <li><a href="/help/"><i class="fa fa-info-circle"></i>Ajuda</a></li>

    </ul>
    <!-- /.sidebar-menu -->
</section>
<!-- /.sidebar -->
