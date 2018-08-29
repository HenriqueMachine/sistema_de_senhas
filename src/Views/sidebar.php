<section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?=$dashboard?>">
          <a href="/adm">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview <?=$usuarios?>">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Usuarios</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=" <?=$usuarios_1?> " ><a href="/adm/usuarios/listar"><i class="fa fa-circle-o"></i> Listar</a></li>
            <li class=" <?=$usuarios_2?> " ><a href="/adm/usuarios/cadastrar"><i class="fa fa-circle-o"></i> Cadastrar</a></li>
          </ul>
        </li>
        <li class="treeview <?=$categorias?>">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Categorias</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?=$categorias_1?>" ><a href="#"><i class="fa fa-circle-o"></i> Listar</a></li>
            <li class="<?=$categorias_2?>" ><a href="#"><i class="fa fa-circle-o"></i> Cadastrar</a></li>
          </ul>
        </li>
        <li class="treeview <?=$atendentes?>">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Atendentes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?=$atendentes_1?>" ><a href="#"><i class="fa fa-circle-o"></i> Listar</a></li>
            <li class="<?=$atendentes_2?>" ><a href="#"><i class="fa fa-circle-o"></i> Cadastrar</a></li>
          </ul>
        </li>
      </ul>
    </section>