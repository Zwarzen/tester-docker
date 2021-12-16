<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{asset('template')}}/assets/img/sidebar-4.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo"><a href="" class="simple-text logo-normal">
        PENCATATAN PENDUDUK
      </a></div>
    <div class="sidebar-wrapper">
      <ul class="nav">
        <li class="{{request()->is('/')?'active': ''}}">
          <a class="nav-link" href="/">
            <i class="material-icons">dashboard</i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="{{request()->is('penduduk')?'active': ''}}">
          <a class="nav-link" href="/penduduk">
            <i class="material-icons">person</i>
            <p>Penduduk</p>
          </a>
        </li>
        <li class="{{request()->is('wilayah')?'active': ''}}">
            <a class="nav-link" href="/wilayah">
              <i class="material-icons">map</i>
              <p>Wilayah</p>
            </a>
        </li>
        <li class="{{request()->is('surat')?'active': ''}}">
            <a class="nav-link" href="/surat">
              <i class="material-icons">assignment</i>
              <p>Cetak Surat</p>
            </a>
          </li>
        {{-- <li class="{{request()->is('table')?'active': ''}}">
          <a class="nav-link" href="/table">
            <i class="material-icons">view_list</i>
            <p>Table List</p>
          </a>
        </li> --}}
      </ul>
    </div>
  </div>
