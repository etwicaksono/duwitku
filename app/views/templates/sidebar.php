  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= BASEURL; ?>">
          <div class="sidebar-brand-icon rotate-n-15">
              <i class="fas fa-fw fa-dollar-sign"></i>
          </div>
          <div class="sidebar-brand-text mx-3">DUWITKU</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <?php
        if ($data['judul'] == 'Dashboard') {
            echo '<li class="nav-item active">';
        } else {
            echo '<li class="nav-item">';
        }


        ?>

      <a class="nav-link" href="<?= BASEURL; ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>


      <!-- Nav Item - Pages Collapse Menu -->
      <?php
        $menu = $this->model('M_app')->getMenu();
        foreach ($menu as $m) :
            if ($data['header'] == $m['menu']) {
                echo '<li class="nav-item active">';
            } else {
                echo '<li class="nav-item">';
            }
            ?>
      <!-- Divider -->
      <hr class="sidebar-divider mb-0">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo<?= $m['id'] ?>"
          aria-expanded="true" aria-controls="collapseTwo">
          <i class="<?= $m['icon']; ?>"></i>
          <span><?= $m['menu']; ?></span>
      </a>
      <div id="collapseTwo<?= $m['id'] ?>" class="collapse <?php
                                                                if ($data['header'] == $m['menu']) {
                                                                    echo 'show';
                                                                } ?>" aria-labelledby="headingTwo"
          data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <?php
                    $subMenu = $this->model('M_app')->getSubMenu($m['id']);
                    foreach ($subMenu  as $sm) :
                        ?>
              <a class="collapse-item <?php if ($sm['sub_menu'] == $data['judul']) {
                                                    echo 'active';
                                                } ?>" href="<?= BASEURL . $sm['link']; ?>"><?= $sm['sub_menu']; ?></a>
              <?php endforeach; ?>

          </div>
      </div>
      </li>
      <?php endforeach; ?>


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

  </ul>
  <!-- End of Sidebar -->

  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">