<style>
  .main-sidebar {
    background: linear-gradient(45deg, #2c3e50, #3498db);
    transition: all 0.3s ease;
  }

  .nav-sidebar .nav-item {
    margin-bottom: 5px;
  }

  .nav-sidebar .nav-link {
    color: #ecf0f1;
    border-radius: 5px;
    transition: all 0.3s ease;
  }

  .nav-sidebar .nav-link:hover,
  .nav-sidebar .nav-link.active {
    background-color: rgba(255, 255, 255, 0.1);
    color: #ffffff;
    transform: translateX(5px);
  }

  .nav-sidebar .nav-link i {
    transition: all 0.3s ease;
  }

  .nav-sidebar .nav-link:hover i,
  .nav-sidebar .nav-link.active i {
    transform: scale(1.2);
  }

  .brand-link {
    border-bottom: 1px solid rgba(255, 255, 255, 0.1) !important;
  }

  .brand-text {
    color: #ffffff !important;
    font-weight: 600 !important;
  }

  .nav-header {
    color: #bdc3c7;
    text-transform: uppercase;
    font-weight: 600;
    font-size: 0.8rem;
    padding: 1rem 1rem 0.5rem;
  }

  .os-content {
    padding: 10px !important;
  }

  @keyframes pulse {
    0% {
      transform: scale(1);
    }
    50% {
      transform: scale(1.05);
    }
    100% {
      transform: scale(1);
    }
  }

  .nav-link.active {
    animation: pulse 2s infinite;
  }
</style>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 sidebar-no-expand">
  <!-- Brand Logo -->
  <a href="<?php echo base_url ?>admin" class="brand-link bg-transparent text-sm border-0 shadow-sm">
    <img src="<?php echo validate_image($_settings->info('logo'))?>" alt="Store Logo" class="brand-image img-circle elevation-3 bg-black" style="width: 1.8rem;height: 1.8rem;max-height: unset;object-fit:scale-down;object-position:center center">
    <span class="brand-text font-weight-light"><?php echo $_settings->info('short_name') ?></span>
  </a>
  
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-4">
      <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-compact nav-flat nav-child-indent nav-collapse-hide-child" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="./" class="nav-link nav-home">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Menu principal</p>
          </a>
        </li>
        
        <li class="nav-item">
          <a href="<?php echo base_url ?>?page=projects" class="nav-link nav-projects">
            <i class="nav-icon fas fa-tasks"></i>
            <p>Proyectos</p>
          </a>
        </li>
        
        <li class="nav-header">Reportes</li>
        <li class="nav-item">
          <a href="<?php echo base_url ?>?page=reports/by_employee" class="nav-link nav-reports_by_employee">
            <i class="nav-icon fas fa-user-clock"></i>
            <p>Resumen de Tiempo de Renderizado</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url ?>?page=reports/date_wise" class="nav-link nav-reports_date_wise">
            <i class="nav-icon fas fa-calendar-alt"></i>
            <p>Tiempo Asignado por Proyecto</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

<script>
  $(document).ready(function(){
    var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
    page = page.replace(/\//gi,'_');

    if($('.nav-link.nav-'+page).length > 0){
      $('.nav-link.nav-'+page).addClass('active')
      if($('.nav-link.nav-'+page).hasClass('tree-item') == true){
        $('.nav-link.nav-'+page).closest('.nav-treeview').siblings('a').addClass('active')
        $('.nav-link.nav-'+page).closest('.nav-treeview').parent().addClass('menu-open')
      }
      if($('.nav-link.nav-'+page).hasClass('nav-is-tree') == true){
        $('.nav-link.nav-'+page).parent().addClass('menu-open')
      }
    }

    $('.nav-link').hover(
      function() {
        $(this).find('i').addClass('fa-bounce');
      }, function() {
        $(this).find('i').removeClass('fa-bounce');
      }
    );
  });
</script>