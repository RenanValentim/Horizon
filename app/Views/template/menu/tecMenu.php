<?php echo view('template/header')?>

<div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="py-4 px-3 mb-4 bg-light">
                    <div class="media d-flex align-items-center"><img src="https://res.cloudinary.com/mhmd/image/upload/v1556074849/avatar-1_tcnd60.png" alt="..." width="65" class="mr-3 rounded-circle img-thumbnail shadow-sm">
                        <div class="media-body">
                        <h4 class="m-0"><?php echo \Config\Services::session()->get('nome')?></h4>
                            <p class="font-weight-light text-muted mb-0"><?php echo \Config\Services::session()->get('cargo')?></p>
                        </div>
                    </div>
                </div>
                <div class="sidebar-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="home"></span>
                                Inicio
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/ticket">
                                <span data-feather="file"></span>
                                Abrir um chamado
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/myTickets">
                                <span data-feather="book"></span>
                                Meus chamados
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="archive"></span>
                                Chamados Equipe
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>