<?php
//session_start();
?>

<html lang="en">
    <head>
        <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
                <meta name="description" content="">
                    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
                        <meta name="generator" content="Hugo 0.98.0">
                            
                          
                                <link href="styles/bootstrap.min.css" rel="stylesheet">

                                    <style>
                                        .bd-placeholder-img {
                                            font-size: 1.125rem;
                                            text-anchor: middle;
                                            -webkit-user-select: none;
                                            -moz-user-select: none;
                                            user-select: none;
                                        }

                                        @media (min-width: 768px) {
                                            .bd-placeholder-img-lg {
                                                font-size: 3.5rem;
                                            }
                                        }

                                        .b-example-divider {
                                            height: 3rem;
                                            background-color: rgba(0, 0, 0, .1);
                                            border: solid rgba(0, 0, 0, .15);
                                            border-width: 1px 0;
                                            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
                                        }

                                        .b-example-vr {
                                            flex-shrink: 0;
                                            width: 1.5rem;
                                            height: 100vh;
                                        }

                                        .nav-item{
                                            fill:rgba(0, 0, 30, .1);
                                        }

                                        .bi {
                                            vertical-align: -.125em;
                                            fill: currentColor;
                                        }

                                        .nav-scroller {
                                            position: relative;
                                            z-index: 2;
                                            height: 2.75rem;
                                            overflow-y: hidden;
                                        }

                                        .nav-scroller .nav {
                                            display: flex;
                                            flex-wrap: nowrap;
                                            padding-bottom: 1rem;
                                            margin-top: -1px;
                                            overflow-x: auto;
                                            text-align: center;
                                            white-space: nowrap;
                                            -webkit-overflow-scrolling: touch;
                                        }
                                    </style>

                                      </head>
                                        <body>
                                            <main>
                                                <h1 class="visually-hidden">Headers examples</h1>

                                                <header class="p-3 bg-warning text-white">
                                                    <div class="container">
                                                        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                                                            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                                                                <span class="fs-4"><img src="../images/logoMoj.png" >
                                                                </span></a>

                                                            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                                                                <li><a href="#" class="nav-link px-2 text-white">Saisir dossier de préinscription</a></li>
                                                                <li><a href="#" class="nav-link px-2 text-white">Voir statut de la préinscription</a></li>
                                                                <li><a href="#" class="nav-link px-2 text-white">Paiement</a></li>
                                                                <li><a href="#" class="nav-link px-2 text-white">Voir statut de demande de réduction tariafaire</a></li>
                                                                <li><a href="#" class="nav-link px-2 text-white">Annuler préinscription</a></li>
                                                               <li 
                            <?php if ($uc == 'deconnexion') { ?>class="active"<?php } ?>>
                                <a href="index.php?uc=deconnexion&action=demandeDeconnexion">
                                    <span class="glyphicon glyphicon-log-out"></span>
                                    Déconnexion
                                </a>
                                                               </li></ul>
                                                            
                                                            
                                    <span class="glyphicon glyphicon-log-out"></span>
                                    Déconnexion
                                                           
                                                        </div>
                                                </header>
                                            </main>

                                        </body>
                                        </html>