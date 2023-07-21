<!-- Header-->
<header id="header" class="header">

    <div class="header-menu">

        <div class="col-sm-7">
            <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-bars"></i></a>
            <div class="header-left">
                <button class="search-trigger"><i class="fa fa-search"></i></button>
                <div class="form-inline">
                    <form class="search-form">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                        <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-sm-5">
            <div class="user-area dropdown float-right mt-2">
                <a href="#" class="dropdown-toggle fs" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="fa fa-user"></i>
                </a>
                <div class="user-menu dropdown-menu shadow p-3 mb-5 bg-body-tertiary rounded">
                    <a class="nav-link" href="#"><i class="fa fa-cog"></i> Settings</a>
                    <a class="nav-link" href="{{ route('sign-out') }}"><i class="fa fa-power-off"></i> Logout</a>
                </div>
            </div>


        </div>
    </div>

</header><!-- /header -->