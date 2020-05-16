 <div id="sidebar-nav" class="sidebar">
      <div class="sidebar-scroll">
        <nav>
          <ul class="nav">
            <li><a href="/home"class="{{ Request::path() == 'home' ? 'active' : '' }}"><i class="lnr lnr-home"></i> <span>Home</span></a></li>
            
          
            

             @if (empty(auth()->user()->role))
             <li><a href="/rekap" class="{{ Request::path() == 'rekap' ? 'active' : '' }}"><i class="lnr lnr-paperclip"></i> <span>rekap</span></a></li>
             
             @elseif(auth()->user()->role == 'admin')
            <li>
              <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr lnr-user"></i> <span>Siswa</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
              <div id="subPages" class="collapse ">
                <ul class="nav">
                  <li><a href="/siswa" class="">Siswa</a></li>
                  <li><a href="/rombel" class="">Rombel</a></li>
                  <li><a href="/rayon" class="">Rayon</a></li>
                </ul>
              </div>
            </li>
            <li><a href="/wali" class="{{ Request::path() == 'wali' ? 'active' : '' }}"><i class="lnr lnr-user"></i> <span>Daftar Wali</span></a></li>


            @elseif (auth()->user()->role == 'siswa')
             <li><a href="/profile" class="{{ Request::path() == 'profile' ? 'active' : '' }}"><i class="lnr lnr-user"></i> <span>Profile</span></a></li>
              <li>
              <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr lnr-clock"></i> <span>Jadwal</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
              <div id="subPages" class="collapse ">
                <ul class="nav">
                  <li><a href="/set" class="">Set Jadwal</a></li>
                  <li><a href="/detail" class="">Kirim Bukti File</a></li>
                </ul>
              </div>
            </li>
            <li><a href="/kegiatan" class="{{ Request::path() == 'kegiatan' ? 'active' : '' }}"><i class="lnr lnr-paperclip"></i> <span>Daftar Kegiatan</span></a></li>
            

             @elseif (auth()->user()->role == 'wali')
             <li><a href="/wali/validasi" class="{{ Request::path() == 'wali/valisasi' ? 'active' : '' }}"><i class="lnr lnr-paperclip"></i> <span>Validasi Kegiatan</span></a></li>
             @endif

            
            
          </ul>
        </nav>
      </div>
    </div>