@extends('layouts.navao')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Experts</h1>
        </div>
         <!-- Statistiques en temps réel -->
         <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Requêtes en attente</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">XX</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Ajoutez d'autres cartes pour afficher d'autres statistiques, comme le temps moyen de réponse, la satisfaction des utilisateurs, etc. -->
        </div>

        <!-- Tableau de bord des experts
        <div class="row">
            <div class="col-lg-12 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Tableau de bord des experts</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="expertsTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Avatar</th>
                                        <th>Nom de l'Expert</th>
                                        <th>Domaine d'Expertise</th>
                                        <th>Email</th>
                                        <th>Téléphone</th>
                                        <th>Disponibilité</th>
                                        <th>Statut</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="expertsBody">
                                    <tr>
                                        <td>
                                            <img src="chemin_vers_avatar.jpg" class="avatar" alt="Avatar de John Doe">
                                        </td>
                                        <td>John Doe</td>
                                        <td>JavaScript, HTML, CSS</td>
                                        <td>john.doe@example.com</td>
                                        <td>+1234567890</td>
                                        <td>Disponible</td>
                                        <td>
                                            <ion-icon name="ellipse" class="text-success"></ion-icon> En ligne
                                        </td>
                                        <td>
                                            <!-- Ajoutez ici des boutons pour les actions sur l'expert
                                        </td>
                                    </tr>
                                    <!-- Ajoutez d'autres lignes pour les autres experts
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>-->
        <div class="separator-breadcrumb border-top"></div>
        <div class="container py-5">
            <div class="row">
                <div class="col-md-12">
                    <div id="success_message" style="position:relative; top:-50px;"></div>
                    <div class="card" style="position:relative;top:-40px; height:550px;">
                        <div class="card-header">
                            <style>
                            .card-header:hover {
                                color:  #999;
                            }
                            .card-header{
                                width:820px;
                                position:relative;
                                left:10px;
                            }
                            </style>
                            <h5>Tableau de bord des experts
                                <a href="javascript:void(0);" onclick="loadModalContent()"
                                    class=" btn btn-primary float-end btn-sm">Experts</a>
                            </h5>
                        </div>
                        <div class="card-body" style=" ">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Avatar</th>
                                        <th>Nom de l'Expert</th>
                                        <th>Domaine d'Expertise</th>
                                        <th>Email</th>
                                        <th>Téléphone</th>
                                        <th>Disponibilité</th>
                                        <th>Statut</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <img src="{{ asset('images/Avatar.jpg') }}"  class="avatar" alt="Avatar de John Doe">
                                        </td>
                                        <td>John Doe</td>
                                        <td>JavaScript, HTML, CSS</td>
                                        <td>john.doe@example.com</td>
                                        <td>+1234567890</td>
                                        <td>Disponible</td>
                                        <td>
                                            <ion-icon name="ellipse" class="text-success"></ion-icon> En ligne
                                        </td>
                                        <td>
                                            <button class="action-button delete-button" onclick="deleteExpert()"><ion-icon name="person-remove-outline"></ion-icon></button>
                                            <button class="action-button edit-button" onclick="editExpert()"><ion-icon name="pencil-outline"></ion-icon></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="{{ asset('images/Avatar.jpg') }}"  class="avatar" alt="Avatar de John Doe">
                                        </td>
                                        <td>John Doe</td>
                                        <td>JavaScript, HTML, CSS</td>
                                        <td>john.doe@example.com</td>
                                        <td>+1234567890</td>
                                        <td>Disponible</td>
                                        <td>
                                            <ion-icon name="ellipse" class="text-success"></ion-icon> En ligne
                                        </td>
                                        <td>
                                            <button class="action-button delete-button" onclick="deleteExpert()"><ion-icon name="person-remove-outline"></ion-icon></button>
                                            <button class="action-button edit-button" onclick="editExpert()"><ion-icon name="pencil-outline"></ion-icon></button>
                                        </td>
                                    </tr>
                                      <tr>
                                        <td>
                                            <img src="{{ asset('images/Avatar.jpg') }}"  class="avatar" alt="Avatar de John Doe">
                                        </td>
                                        <td>John Doe</td>
                                        <td>JavaScript, HTML, CSS</td>
                                        <td>john.doe@example.com</td>
                                        <td>+1234567890</td>
                                        <td>Disponible</td>
                                        <td>
                                            <ion-icon name="ellipse" class="text-success"></ion-icon> En ligne
                                        </td>
                                        <td>
                                            <button class="action-button delete-button" onclick="deleteExpert()"><ion-icon name="person-remove-outline"></ion-icon></button>
                                            <button class="action-button edit-button" onclick="editExpert()"><ion-icon name="pencil-outline"></ion-icon></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id='calendar'></div>
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection
