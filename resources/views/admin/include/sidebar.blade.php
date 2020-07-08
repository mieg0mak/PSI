      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{ URL::asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Administrator</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="@if(url('/') == request()->url()) active @else '' @endif treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i>
                <span>Home</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{{URL::to('/')}}}"><i class="fa fa-circle-o"></i> Home</a></li>
              </ul>
            </li>
            <!--<li class=" @if(url('/jurusan') == request()->url() or url('/prodi') == request()->url() ) active @else '' @endif  treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span> ---Program Studi</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{URL::to('jurusan')}}"><i class="fa fa-circle-o"></i> Jurusan </a></li>
                <li><a href="{{URL::to('prodi')}}"><i class="fa fa-circle-o"></i> Program Studi </a></li>
               
              </ul>
            </li>
            <li class="@if(url('/kurikulum') == request()->url() or url('/kurikulum/matakuliah') == request()->url() ) active @else '' @endif treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Kurikulum</span> <i class="fa fa-angle-left pull-right"></i>
               
              </a>
              <ul class="treeview-menu">
                <li><a href="{{URL::to('kurikulum')}}"><i class="fa fa-circle-o"></i> Data Kurikulum </a></li>
                <li><a href="{{URL::to('kurikulum/matakuliah')}}"><i class="fa fa-circle-o"></i> ----Matakuliah </a></li>
                <li><a href="{{URL::to('kurikulum/matapelajaran')}}"><i class="fa fa-circle-o"></i> Matapelajaran </a></li>
              </ul>
            </li>
            <li class="@if(url('/semester') == request()->url() or url('/semester/semesterprodi') == request()->url() ) active @else '' @endif treeview">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>Semester</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{{URL::to('semester')}}}"><i class="fa fa-circle-o"></i> Setting Semester</a></li>
                <li><a href="{{{URL::to('semester/semesterprodi')}}}"><i class="fa fa-circle-o"></i> Semester Prodi</a></li>
                <li><a href="{{{URL::to('semester/semesterpelajaran')}}}"><i class="fa fa-circle-o"></i> Semester Kelas</a></li>
              </ul>
            </li>-->
            
            <!-- Kepsek -->
            <li class="@if(url('/kepsek') == request()->url()) active @else '' @endif treeview">
              <a href="#">
                <i class="fa fa-user"></i>
                <span>Kepala Sekolah</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{{URL::to('kepsek')}}}"><i class="fa fa-circle-o"></i> Data Kepala Sekolah</a></li>
              </ul>
            </li>
            <!--
            <li class="@if(url('/dosen') == request()->url()) active @else '' @endif treeview">
              <a href="#">
                <i class="fa fa-user"></i>
                <span>Dosen</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{{URL::to('dosen')}}}"><i class="fa fa-circle-o"></i> Data Dosen</a></li>
                
                
              </ul>
            </li>-->

            <!-- Guru -->
            <li class="@if(url('/guru') == request()->url()) active @else '' @endif treeview">
              <a href="#">
                <i class="fa fa-user"></i>
                <span>Guru</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{{URL::to('guru')}}}"><i class="fa fa-circle-o"></i> Data Guru</a></li>
                
                
              </ul>
            </li>

            <!-- Siswa -->
            <li class="@if(url('/siswa') == request()->url()  ) active @else '' @endif treeview">
              <a href="#">
                <i class="fa fa-user"></i>
                <span>Siswa</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{{URL::to('siswa')}}}"><i class="fa fa-circle-o"></i> Data Siswa</a></li>  
              </ul>
            </li>

            <!-- Pustakawan -->
            <!-- <li class="@if(url('/pustakawan') == request()->url()  ) active @else '' @endif treeview">
              <a href="#">
                <i class="fa fa-user"></i>
                <span>Pustakawan</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{{URL::to('pustakawan')}}}"><i class="fa fa-circle-o"></i> Data Pustakawan</a></li>  
              </ul>
            </li> -->

            <!-- MataPelajaran -->
            <li class="@if(url('/mapel') == request()->url()) active @else '' @endif treeview">
              <a href="#">
                <i class="fa fa-book"></i>
                <span>Mata Pelajaran</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{{URL::to('mapel')}}}"><i class="fa fa-circle-o"></i> Data Mapel</a></li>
              </ul>
            </li>

            <!-- Kelas -->
            <li class="@if(url('/kelas') == request()->url()) active @else '' @endif treeview">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>Kelas</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{{URL::to('kelas')}}}"><i class="fa fa-circle-o"></i> Data Kelas</a></li>
              </ul>
            </li>

            <!-- Absensi -->
            <li class="@if(url('/absensi') == request()->url()) active @else '' @endif treeview">
              <a href="#">
                <i class="fa fa-pencil-square-o"></i>
                <span>Absensi</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{{URL::to('absensi')}}}"><i class="fa fa-circle-o"></i> Data Absensi</a></li>
              </ul>
            </li>

            <!-- Nilai -->
            <li class="@if(url('/nilai') == request()->url()) active @else '' @endif treeview">
              <a href="#">
                <i class="fa fa-graduation-cap"></i>
                <span>Nilai</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{{URL::to('nilai')}}}"><i class="fa fa-circle-o"></i> Data Nilai</a></li>
              </ul>
            </li>

            <li class="@if(url('/accountmahasiswa') == request()->url() or url('/accountdosen') == request()->url() or url('/accountkepsek') == request()->url() or url('/accountguru') == request()->url() or url('/accountpustakawan') == request()->url() or url('/accountmahasiswa') == request()->url()) active @else '' @endif treeview">
              <a href="#">
                <i class="fa fa-wrench"></i>
                <span>User Management</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{{URL::to('accountkepsek')}}}"><i class="fa fa-circle-o"></i> Akun Kepala Sekolah</a></li>
                <li><a href="{{{URL::to('accountguru')}}}"><i class="fa fa-circle-o"></i> Akun Guru</a></li>
                <!-- <li><a href="{{{URL::to('accountpustakawan')}}}"><i class="fa fa-circle-o"></i> Akun Pustakawan</a></li> -->
                <!--<li><a href="{{{URL::to('accountmahasiswa')}}}"><i class="fa fa-circle-o"></i> Akun Mahasiswa</a></li>-->
                <!--<li><a href="{{{URL::to('accountdosen')}}}"><i class="fa fa-circle-o"></i> Akun Dosen</a></li>-->
                <!--<li><a href="{{{URL::to('accountsiswa')}}}"><i class="fa fa-circle-o"></i> Akun Siswa</a></li>-->
              </ul>
            </li>
          </ul>
        </section>-->
        <!-- /.sidebar -->
      </aside>

      <!-- Modal -->
      <div class="modal fade" id="myModalq" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabelq">Modal title</h4>
            </div>
            <div class="modal-bodyq">
              ...
            </div>
            <div class="modal-footerq">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
      <!-- end of modal -->
