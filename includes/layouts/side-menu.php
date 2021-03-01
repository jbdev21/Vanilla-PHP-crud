<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="/material">
                                <div class="sb-nav-link-icon"><i class="fas fa-folder"></i></div>
                                Material
                            </a>
                            <a class="nav-link" href="/category">
                                <div class="sb-nav-link-icon"><i class="fas fa-folder"></i></div>
                                Category
                            </a>

                            <a class="nav-link" href="/location">
                                <div class="sb-nav-link-icon"><i class="fas fa-folder"></i></div>
                                Location
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?= loggedUser()['name']?> @ <?= loggedUser()['email']?>
                    </div>
                </nav>
            </div>
             <div id="layoutSidenav_content">