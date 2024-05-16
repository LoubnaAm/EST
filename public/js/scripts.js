//fonction pour tester l'ajoute avec l'Ajax
$(document).on('submit', '#formAjouterUtilisateur', function(event) {
    event.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
        type: "POST",
        url: "/register",
        data: formData,
        success: function(response) {
            console.log('insertion avec ajax fait ');
            fetchusers();
        },
        error: function(xhr, status, error) {
            console.error("Erreur AJAX:", xhr.responseText);
        },
        complete: function(xhr, status) {
            console.log("Statut de la requête:", status);
        }
    });
});
//fonction pour faire le dark-mode avec l'Ajax
function toggleTheme() {

    const body = document.body;
    const themeIcon = document.getElementById('themeIcon');

    body.classList.toggle('dark-theme');

    if (body.classList.contains('dark-theme')) {
        themeIcon.name = 'moon-outline';
    } else {
        themeIcon.name = 'sunny-outline';
    }
}
//la toggle de navigation
let list = document.querySelectorAll(".navi li");

list.forEach((item) => item.addEventListener("mouseover", activeLink));

function activeLink() {

    list.forEach((item) => {
        item.classList.remove("hovered");
    });
    this.classList.add("hovered");
}
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navi");
let main = document.querySelector(".main");
toggle.onclick = function () {
    navigation.classList.toggle("active");
    main.classList.toggle("active");
    toggle.classList.toggle("active");
};
//charger le DOM ici: pour empécher le chargement de le js avant le chargement de la page
document.addEventListener('DOMContentLoaded', function () {
   //1ére diagramme de dashboard
    const spinner = document.getElementById("spinner");
    spinner.style.display = "block";
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Users',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            responsive: false,
            maintainAspectRatio: false,
            width: 800,
            height: 150
        }
    });
     //2éme diagramme de dashboard(piechart)
    const pourcentageReponsesTrouvees = {
        trouvees: 70,
        nonTrouvees: 30
    };

    var ctxpie = document.getElementById('pieChart').getContext('2d');


    var pieChart = new Chart(ctxpie, {
        type: 'pie',
        data: {
            labels: ['Réponses Trouvées', 'Réponses Non Trouvées'],
            datasets: [{
                label: 'Pourcentage de Réponses Trouvées',
                data: [pourcentageReponsesTrouvees.trouvees, pourcentageReponsesTrouvees.nonTrouvees],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 99, 132, 0.5)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            title: {
                display: true,
                text: 'Pourcentage de Réponses Trouvées dans le Chat de Support'
            }
        }
    });

    // le hover de navigation
    let list = document.querySelectorAll(".navi li");

    function activeLink() {
        list.forEach((item) => {
            item.classList.remove("hovered");
        });
        this.classList.add("hovered");
    }


    list.forEach((item) => item.addEventListener("mouseover", activeLink));


    let toggle = document.querySelector(".toggle");
    let navigation = document.querySelector(".navi");
    let main = document.querySelector(".main");


    toggle.onclick = function () {
        navigation.classList.toggle("active");
        main.classList.toggle("active");
    };

});
window.addEventListener("load", function () {
    spinner.style.display = "none";
});

function fetchusers(name = null, email = null) {
    if (window.location.pathname.includes('users')) {
    var url = "/filter-users";
    if (name || email) {
        url += "?name=" + name + "&email=" + email;
    }

    $.ajax({
        type: "GET",
        url: url,
        dataType: "json",
        success: function(response) {
            $('tbody').empty();
            $.each(response.users, function(key, item) {
                console.log("Date d'inscription de l'utilisateur " + item.name + " : " + item.created_at);
                let statusButton;
                const today = new Date();
                const signUpDate = new Date(item.created_at);
                const differenceInDays = Math.floor((today - signUpDate) / (1000 * 60 * 60 * 24));

                if (differenceInDays <= 7) {
                    statusButton = '<button type="button" class="btn btn-success btn-rounded m-1">Nouveau</button>';
                } else if (differenceInDays <= 14) {
                    statusButton = '<button type="button" class="btn btn-primary btn-rounded m-1">Récent</button>';
                } else {
                    statusButton = '<button type="button" class="btn btn-primary btn-rounded m-1">Ancien</button>';
                }
                $('tbody').append(
                    '<tr class="loubna">\
                        <td>' + item.id + '</td>\
                        <td>' + item.name + '</td>\
                        <td>' + item.email + '</td>\
                        <td>' + item.created_at + '</td>\
                        <td>' + statusButton + '</td>\
                        <td> <div class="delete-icon" data-id="' + item.id + '" data-source="button"><ion-icon name="close-circle-outline"></ion-icon></div></td>\
                    </tr>'
                );
            });
        }
    });
}
}
$(document).ready(function() {
    fetchusers();
});
$(document).on('click', '.delete-icon', function(event) {
    event.stopPropagation();// cela permet de  stoper la propagation de l'évenment a les autres lignes
   // console.log("Clic sur l'icône de suppression");
var users_id = $(this).data('id');

Swal.fire({
    title: 'Êtes-vous sûr?',
    text: "Vous ne pourrez pas revenir en arrière après cela !",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Oui, supprimer!'
}).then((result) => {
    if (result.isConfirmed) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "DELETE",
            url: "/delete-user/" + users_id,
            success: function(response) {
                Swal.fire(
                    'Supprimé!',
                    'L\'utilisateur a été supprimé avec succès.',
                    'success'
                );
                fetchusers();
                console.log("Fetching users...");
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);

                Swal.fire(
                    'Erreur!',
                    'Une erreur s\'est produite lors de la suppression de l\'utilisateur.',
                    'error'
                );
            }
        });
    }
});
});
$(document).on('click', '.loubna', function(event) {

    if ($(event.target).hasClass('delete-icon')) {
        console.log("l'autre est cliquer");
   return;
    }
        var userId = $(this).find('td:eq(0)').text();
        var userName = $(this).find('td:eq(1)').text();
        var userEmail = $(this).find('td:eq(2)').text();
        var userCreatedAt = $(this).find('td:eq(3)').text();
        var userStatus = $(this).find('td:eq(4)').text();
        var statusButton = $(this).find('td:eq(4)').find('button').text();

        function loadModalContent() {
            $.ajax({
                url: "/infos/user/modal/" + userId,
                method: 'GET',
                data: {
                    userStatus: statusButton
                },
                success: function(response) {
                    $('#userInfoModal .modal-body').html(response.modalContent);
                    $('#userInfoModal').modal('show');
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
        loadModalContent();
});

$(document).ready(function() {
$('#filterName, #filterEmail').on('input', function() {
var name = $('#filterName').val();
var email = $('#filterEmail').val();
console.log('Name:',name);
console.log('Email:',email);

$.ajax({
    type: 'GET',
    url: '/filter-users',
    data: {
        name: name,
        email: email
    },
    success: function(response) {
        console.log(response);
        fetchusers(name,email);
        console.log(response);
    },
    error: function(xhr, status, error) {
        console.error(error);
    }
});
});
});
document.addEventListener('DOMContentLoaded', function() {
    const statusData = {
        labels: ['Nouveau', 'Récent', 'Ancien'],
        datasets: [{
            label: 'Nombre d\'utilisateurs',
            data: [20, 30, 10],
            backgroundColor: ['rgba(54, 162, 235, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(255, 206, 86, 0.2)'],
            borderColor: ['rgba(54, 162, 235, 1)', 'rgba(255, 99, 132, 1)', 'rgba(255, 206, 86, 1)'],
            borderWidth: 1
        }]
    };

    const statusChartConfig = {
        type: 'bar',
        data: statusData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    stacked: true, //emplille les bar  horizontalement (x) et verticalement (y)
                },
                y: {
                    stacked: true,
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Nombre d\'utilisateurs par statut'
                }
            }
        }
    };

    //const statusChartCanvas = document.getElementById('statusChart').getContext('2d');
    //statusChart = new Chart(statusChartCanvas, statusChartConfig);

    console.log("Début de l'initialisation du calendrier...");
    var calendarEl = document.getElementById('calendar');
    console.log("Elément du calendrier récupéré :", calendarEl);
    var calendar = new Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: [
            {
                title: 'Disponible',
                start: '2024-05-01T10:00:00',
                end: '2024-05-01T12:00:00'
            }
        ]
    });

    console.log("Calendrier initialisé :", calendar);

    calendar.render(); // Rendre le calendrier

    console.log("Fin de l'initialisation du calendrier.");
});
