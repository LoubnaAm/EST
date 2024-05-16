<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--=============== FAVICON ===============-->
        <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
        <!--=============== REMIXICONS ===============-->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-YthU2b8acJYG9B7clBXtv7N9LUbOQi4ptkhmY5w+u2g7XHOjJS8T/78z30i+pFxtbcR56CmCMiO7chE+sTx8lg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">




        <title>Home</title>
    </head>
    <body>
        <!--==================== HEADER ====================-->
        <header class="header" id="header">
          <nav class="nav container">
            <a href="#" class="nav__logo">
                nft.io
            </a>
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="#" class="nav__link active-link">home</a>
                    </li>
                    <li class="nav__item">
                        <a href="#" class="nav__link">market</a>
                    </li>
                    <li class="nav__item">
                        <a href="#" class="nav__link">activity</a>
                    </li>
                    <li class="nav__item">
                        <a href="#" class="nav__link">community</a>
                    </li>
                </ul>
                <div class="nav__close" id="nav-close">
                    <i class="ri-close-line"></i>
                </div>
                <img src="{{ asset('images/ethereum-img.png') }}" alt="nav image" class="nav__img">
            </div>
            <div class="nav__toggle" id="nav-toggle">
                <i class="ri-menu-4-line"></i>
            </div>
          </nav>
        </header>

        <!--==================== MAIN ====================-->
        <main class="main">
            <!--==================== HOME ====================-->
            <section class="home">
                <div class="home__shape-small"></div>
                <div class="home__shape-big-1"></div>
                <div class="home__shape-big-2"></div>
                <img src="{{ asset('images/shape-bg.png') }}" alt="" class="home__shape-bg">
              <div class="home__container container">
                <div class="home__info">
                    <h1 class="home__title">
                        <span>ChatBot</span><br>
                        Votre allié<br>
                        intelligent.
                    </h1>
                    <p class="home__description">
                        Obtenez des réponses rapides, précises et adaptées à vos besoins!
                    </p>
                    <a href="{{ route('login') }}" class="home__button">Se connecter</a>
                </div>
                <div class="home__group">
                    <div class="home__images">
                        <div class="home__img-eth">
                            <img src="{{ asset('images/telephonne.png') }}" alt="home image" style="width: 500px; height: 450px;">

                        </div>
                        <div class="home__img-orbe">

                        </div>
                    </div>

                    <div class="home__data">
                        <div>
                            <h2 class="home__data-number"> <a href="https://www.facebook.com/" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" viewBox="0 0 24 24" style="fill:#FFFFFF;">
                                    <path d="M 12 2 C 6.4889971 2 2 6.4889971 2 12 C 2 17.511003 6.4889971 22 12 22 C 17.511003 22 22 17.511003 22 12 C 22 6.4889971 17.511003 2 12 2 z M 12 4 C 16.430123 4 20 7.5698774 20 12 C 20 16.014467 17.065322 19.313017 13.21875 19.898438 L 13.21875 14.384766 L 15.546875 14.384766 L 15.912109 12.019531 L 13.21875 12.019531 L 13.21875 10.726562 C 13.21875 9.7435625 13.538984 8.8710938 14.458984 8.8710938 L 15.935547 8.8710938 L 15.935547 6.8066406 C 15.675547 6.7716406 15.126844 6.6953125 14.089844 6.6953125 C 11.923844 6.6953125 10.654297 7.8393125 10.654297 10.445312 L 10.654297 12.019531 L 8.4277344 12.019531 L 8.4277344 14.384766 L 10.654297 14.384766 L 10.654297 19.878906 C 6.8702905 19.240845 4 15.970237 4 12 C 4 7.5698774 7.5698774 4 12 4 z"></path>
                                </svg>
                            </a></h2>
                                <span class="home__data-subtitle">Facebook</span>

                        </div>

                        <div>
                            <h2 class="home__data-number">
                                <a href="https://twitter.com/" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" viewBox="0,0,300,150" style="fill:#FFFFFF;">
                                        <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                            <g transform="scale(8,8)">
                                                <path d="M28,8.55859c-0.88281,0.39063 -1.83203,0.65625 -2.82812,0.77344c1.01563,-0.60937 1.79688,-1.57422 2.16406,-2.72266c-0.94922,0.5625 -2.00391,0.97266 -3.125,1.19531c-0.89844,-0.95703 -2.17969,-1.55859 -3.59375,-1.55859c-2.71875,0 -4.92578,2.20703 -4.92578,4.92578c0,0.38672 0.04297,0.76172 0.12891,1.12109c-4.09375,-0.20312 -7.72266,-2.16406 -10.14844,-5.14453c-0.42578,0.72656 -0.66797,1.57422 -0.66797,2.47656c0,1.70703 0.86719,3.21484 2.19141,4.09766c-0.80859,-0.02734 -1.56641,-0.24609 -2.23047,-0.61719c0,0.02344 0,0.04297 0,0.0625c0,2.38672 1.69531,4.37891 3.94922,4.82813c-0.41406,0.11328 -0.84766,0.17578 -1.29688,0.17578c-0.31641,0 -0.62891,-0.03125 -0.92578,-0.08984c0.625,1.95703 2.44531,3.37891 4.59766,3.42188c-1.68359,1.32031 -3.80859,2.10547 -6.11328,2.10547c-0.39844,0 -0.78906,-0.02344 -1.17578,-0.07031c2.17969,1.39844 4.76563,2.21484 7.54688,2.21484c9.05859,0 14.01172,-7.50391 14.01172,-14.01172c0,-0.21094 -0.00781,-0.42578 -0.01562,-0.63672c0.96094,-0.69531 1.79688,-1.5625 2.45703,-2.54687z"></path>
                                            </g>
                                        </g>
                                    </svg>
                                </a>
                            </h2>

                                <span class="home__data-subtitle">Twitter</span>

                        </div>

                        <div>
                            <h2 class="home__data-number">
                                <a href="https://www.linkedin.com/" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" viewBox="0,0,300,150" style="fill:#FFFFFF;">
                                        <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                            <g transform="scale(8,8)">
                                                <path d="M7.5,5c-1.36719,0 -2.5,1.13281 -2.5,2.5v17c0,1.36719 1.13281,2.5 2.5,2.5h17c1.36719,0 2.5,-1.13281 2.5,-2.5v-17c0,-1.36719 -1.13281,-2.5 -2.5,-2.5zM7.5,7h17c0.28516,0 0.5,0.21484 0.5,0.5v17c0,0.28516 -0.21484,0.5 -0.5,0.5h-17c-0.28516,0 -0.5,-0.21484 -0.5,-0.5v-17c0,-0.28516 0.21484,-0.5 0.5,-0.5zM10.4375,8.71875c-0.94922,0 -1.71875,0.76953 -1.71875,1.71875c0,0.94922 0.76953,1.71875 1.71875,1.71875c0.94922,0 1.71875,-0.76953 1.71875,-1.71875c0,-0.94922 -0.76953,-1.71875 -1.71875,-1.71875zM19.46875,13.28125c-1.43359,0 -2.38672,0.78516 -2.78125,1.53125h-0.0625v-1.3125h-2.8125v9.5h2.9375v-4.6875c0,-1.23828 0.24609,-2.4375 1.78125,-2.4375c1.51172,0 1.53125,1.39844 1.53125,2.5v4.625h2.9375v-5.21875c0,-2.55469 -0.54297,-4.5 -3.53125,-4.5zM9,13.5v9.5h2.96875v-9.5z"></path>
                                            </g>
                                        </g>
                                    </svg>
                                </a>
                            </h2>

                                <span class="home__data-subtitle">Linkedin</span>

                        </div>
                    </div>
                </div>


              </div>
            </section>
        </main>


       


        <script src="{{ asset('js/welcome.js') }}"></script>

       <script src="https://unpkg.com/scrollreveal"></script>


    </body>
</html>
