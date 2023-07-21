<!-- Left Panel -->

<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <h5 class="navbar-brand">PT. Baroqah tbk.</h5>
            <h5 class="navbar-brand hidden">B</h5>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{ route('dashboard') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>
                <li class="active">
                    <a href="{{ route('karyawan.index') }}"> <i class="menu-icon fa fa-users"></i>Karyawan </a>
                </li>
                <li class="active">
                    <a href="{{ route('jabatan.index') }}"> <i class="menu-icon fa fa-suitcase"></i>Jabatan </a>
                </li>
                <li class="active">
                    <a href="{{ route('list.gaji-karyawan') }}"> <i class="menu-icon fa fa-book"></i>Gaji karyawan </a>
                </li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->