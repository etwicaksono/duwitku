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
        $menu = $this->model('M_app')->getMenuByRoleId($_SESSION['user']['role_id']);
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

              <?php
                        echo '<a class="collapse-item ';

                        if ($sm['sub_menu'] == $data['judul']) {
                            echo 'active ';
                        }
                        echo '"href="' . BASEURL . $sm["link"] . '"';

                        if ($sm['sub_menu'] == 'PENGALIHAN ASET') {
                            echo ' data-toggle="modal" data-target="#pengalihanAsetModal"';
                        }

                        if ($sm['sub_menu'] == 'SET SALDO AWAL') {
                            echo ' data-toggle="modal" data-target="#setSaldoAwalModal"';
                        }

                        if ($sm['sub_menu'] == 'RESET DATA') {
                            echo ' data-toggle="modal" data-target="#resetDataModal"';
                        }

                        echo '>' . $sm["sub_menu"] . '</a>';
                        ?>
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




          <!-- modal pengalihan aset -->
          <div class="modal fade" id="pengalihanAsetModal" tabindex="-1" role="dialog"
              aria-labelledby="pengalihanAsetModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="pengalihanAsetModalLabel">Pengalihan Aset</h5>

                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <form action="<?= BASEURL; ?>/transaksi/pengalihanAset" method="post">
                          <div class="modal-body">
                              <div class="form-group row">
                                  <label for="tanggal_pa" class="col-3 col-form-label">Tanggal</label>
                                  <div class="row col-9">
                                      <input type="hidden" name="id" id="id">
                                      <input type="text" class="form-control col-3 ml-3" id="tanggal_pa"
                                          name="tanggal_pa" value="<?= date('d'); ?>" placeholder="Tanggal">
                                      <select type="text" class="form-control col-4 ml-2" id="bulan_pa" name="bulan_pa">
                                          <option value="<?= date('m'); ?>" class="text-primary font-weight-bold"
                                              id="bulan_pa_text">
                                              <?= date('F'); ?>
                                          </option>
                                          <option value="1">Januari</option>
                                          <option value="2">Februari</option>
                                          <option value="3">Maret</option>
                                          <option value="4">April</option>
                                          <option value="5">Mei</option>
                                          <option value="6">Juni</option>
                                          <option value="7">Juli</option>
                                          <option value="8">Agustus</option>
                                          <option value="9">September</option>
                                          <option value="10">Oktober</option>
                                          <option value="11">November</option>
                                          <option value="12">Desember</option>
                                      </select>
                                      <input type="text" class="form-control col-3 ml-2" id="tahun_pa" name="tahun_pa"
                                          value="<?= date('Y'); ?>">
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="asetAsal" class="col-3 col-form-label">Dari</label>
                                  <div class="col-9">
                                      <?php
                                        $akun = $this->model('M_transaksi')->getAssetAccount($_SESSION['user']['id']);

                                        ?>
                                      <select type="text" class="form-control" id="asetAsal" name="asetAsal">
                                          <?php foreach ($akun as $a) : ?>
                                          <option value="<?= $a['id']; ?>">
                                              <?= $a['kode_asset'] . " - " . $a['nama_aset']; ?>
                                          </option>
                                          <?php endforeach; ?>
                                      </select>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="asetTujuan" class="col-3 col-form-label">Ke</label>
                                  <div class="col-9">

                                      <select type="text" class="form-control" id="asetTujuan" name="asetTujuan">
                                          <?php foreach ($akun as $a) : ?>
                                          <option value="<?= $a['id']; ?>">
                                              <?= $a['kode_asset'] . " - " . $a['nama_aset']; ?>
                                          </option>
                                          <?php endforeach; ?>
                                      </select>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="jumlah_pa" class="col-3 col-form-label">Jumlah</label>
                                  <div class="col-9">
                                      <input type="text" class="form-control" id="jumlah_pa" name="jumlah_pa"
                                          autocomplete="off">
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="keterangan_pa" class="col-3 col-form-label">Keterangan</label>
                                  <div class="col-9">
                                      <input type="text" class="form-control" id="keterangan_pa" name="keterangan_pa"
                                          autocomplete="off">
                                  </div>
                              </div>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                              <button type="submit" class="btn btn-primary">Simpan</button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>

          <!-- set saldo awal warning modal-->
          <div class="modal fade" id="setSaldoAwalModal" tabindex="-1" role="dialog"
              aria-labelledby="setSaldoAwalModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="setSaldoAwalModalLabel">Set saldo awal?</h5>
                          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                          </button>
                      </div>
                      <div class="modal-body">SET SALDO AWAL hanya digunakan pada saat awal pembukuan dan pastikan
                          kondisi neraca seimbang setelah mengisi semua saldo awal.</div>
                      <div class="modal-footer">
                          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                          <a class="btn btn-primary" id="saldoAwal" href="#" data-toggle="modal"
                              data-target="#modalSetSaldoAwal">Ya</a>
                      </div>
                  </div>
              </div>
          </div>


          <!-- set saldo awal modal-->
          <div class="modal fade" id="modalSetSaldoAwal" tabindex="-1" role="dialog"
              aria-labelledby="modalSetSaldoAwalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <form class="modal-content" action="<?= BASEURL . 'transaksi/setSaldoAwal'; ?>" method="post">
                      <div class="modal-header">
                          <h5 class="modal-title" id="modalSetSaldoAwalLabel">SET SALDO
                              AWAL</h5>
                          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <?php $akun = $this->model('M_transaksi')->getAssetAccount($_SESSION['user']['id']);
                            foreach ($akun as $a) : ?>
                          <div class="form-group row">
                              <label for="<?= 'aset' . $a['id']; ?>"
                                  class="col-5 col-form-label"><?= $a['kode_asset'] . ' - ' . $a['nama_aset']; ?></label>
                              <div class="col-7">
                                  <input type="number" class="form-control" id="<?= 'aset' . $a['id']; ?>"
                                      name="<?= 'aset' . $a['id']; ?>" autocomplete="off">
                              </div>
                          </div>
                          <?php endforeach; ?>
                      </div>
                      <div class="modal-footer">
                          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                          <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>
                  </form>
              </div>
          </div>

          <!-- reset data warning modal-->
          <div class="modal fade" id="resetDataModal" tabindex="-1" role="dialog" aria-labelledby="resetDataModalLabel"
              aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="resetDataModalLabel">Apakah anda yakin untuk melakukan reset data?
                          </h5>
                          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                          </button>
                      </div>
                      <div class="modal-body">Tindakan ini akan menghapus semua pembukuan anda dan mengembalikan
                          pengaturan pembukuan secara default.</div>
                      <div class="modal-footer">
                          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                          <a class="btn btn-danger" id="saldoAwal"
                              href="<?= BASEURL . 'pengaturan/reset_data'; ?>">Yakin</a>
                      </div>
                  </div>
              </div>
          </div>