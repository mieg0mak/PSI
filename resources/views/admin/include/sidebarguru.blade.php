      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{ URL::asset('auth/images/teacher.png') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>{{ Auth::user()->name  }}</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION GURU</li>

            <!-- Siswa -->
            <li class="@if(url('/datasiswa') == request()->url()  ) active @else '' @endif treeview">
              <a href="#">
                <i class="fa fa-user"></i>
                <span>Siswa</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{{URL::to('datasiswa')}}}"><i class="fa fa-circle-o"></i> Data Siswa</a></li>  
              </ul>
              @if(Auth::user()->kelasKode==1)
                <ul class="treeview-menu">
                  <li><a href="{{{URL::to('anakwali/1')}}}"><i class="fa fa-circle-o"></i> Anak Wali</a></li>  
                </ul>
              @elseif(Auth::user()->kelasKode==2)
                <ul class="treeview-menu">
                  <li><a href="{{{URL::to('anakwali/2')}}}"><i class="fa fa-circle-o"></i> Anak Wali</a></li>  
                </ul>
              @elseif(Auth::user()->kelasKode==3)
                <ul class="treeview-menu">
                  <li><a href="{{{URL::to('anakwali/3')}}}"><i class="fa fa-circle-o"></i> Anak Wali</a></li>  
                </ul>
              @elseif(Auth::user()->kelasKode==4)
                <ul class="treeview-menu">
                  <li><a href="{{{URL::to('anakwali/4')}}}"><i class="fa fa-circle-o"></i> Anak Wali</a></li>  
                </ul>
              @elseif(Auth::user()->kelasKode==5)
                <ul class="treeview-menu">
                  <li><a href="{{{URL::to('anakwali/5')}}}"><i class="fa fa-circle-o"></i> Anak Wali</a></li>  
                </ul>
              @elseif(Auth::user()->kelasKode==6)
                <ul class="treeview-menu">
                  <li><a href="{{{URL::to('anakwali/6')}}}"><i class="fa fa-circle-o"></i> Anak Wali</a></li>  
                </ul>
              @endif
            </li>

            <!-- Nilai -->
            <li class="@if(url('/datanilai') == request()->url()) active @else '' @endif treeview">
              <a href="#">
                <i class="fa fa-graduation-cap"></i>
                <span>Nilai</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{{URL::to('datanilai/1')}}}"><i class="fa fa-circle-o"></i> Data Nilai</a></li>
              </ul>
            </li>

            <!-- Absensi -->
            <li class="@if(url('/dataabsensi') == request()->url()) active @else '' @endif treeview">
              <a href="#">
                <i class="fa fa-pencil-square-o"></i>
                <span>Absensi</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{{URL::to('dataabsensi')}}}"><i class="fa fa-circle-o"></i> Data Absensi</a></li>
              </ul>
            </li>

            <li class="active treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Guru</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{{route('reset.password.guru')}}}"><i class="fa fa-circle-o"></i> Reset Password </a></li>
               
              </ul>
            </li>
          
          </ul>
        </section>
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
