<x-app-layout>
   <!--=============== FAVICON ===============-->
   <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
        <!--=============== REMIXICONS ===============-->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-YthU2b8acJYG9B7clBXtv7N9LUbOQi4ptkhmY5w+u2g7XHOjJS8T/78z30i+pFxtbcR56CmCMiO7chE+sTx8lg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">


        <title>Home</title>
    </head>
    <body>


        <!--==================== MAIN ====================-->
        <main class="main">
            <!--==================== HOME ====================-->
            <section class="homes">
                <div class="home__shape-smalll"></div>
                <div class="home__shape-bigg-1"></div>
                <div class="home__shape-bigg-2"></div>
              <div class="home__container container">
                <div class="home__info">
                    <h1 class="home__title">
                        <span>Welcome again</span><br>

                    </h1>

                </div>
                <div class="home__group">
                    <div class="home__images">
                        <div class="home__img-eths">
                            <img src="{{ asset('images/chat.png') }}" alt="home image" style="width: 500px; height: 450px;">

                        </div>
                        <div class="home__img-orbe">

                        </div>
                    </div>
                </div>


                <div>
<div class="rating-container">

<div class="wrapper">
        <h3>Your opinion interests us !</h3>
        <form action="{{ route('commentaire.store') }}" method="POST">
        @csrf <!-- Ajout du jeton CSRF pour la protection contre les attaques CSRF -->
        <div class="rating">
        <input type="radio" id="star5" name="rating" value="5">
        <label for="star5"> </label>
        <input type="radio" id="star4" name="rating" value="4">
        <label for="star4"> </label>
        <input type="radio" id="star3" name="rating" value="3">
        <label for="star3"> </label>
        <input type="radio" id="star2" name="rating" value="2">
        <label for="star2"> </label>
        <input type="radio" id="star1" name="rating" value="1">
        <label for="star1"> </label>


    </div>
            <textarea name="opinion" cols="30" rows="5" placeholder="Would you like to add a comment ..."></textarea>
            <div class="btn-group">
                            <button type="submit" class="home__button">Submit</button> <!-- Changement de type de bouton -->
                            <button type="button" class="btn cancel">Cancel</button> <!-- Changement de type de bouton -->
                        </div>
        </form>
    </div>
              </div>




        </main>







        <main class="mains">
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
            <h2 class="font-semibold text-xl text-black leading-tight all-comments">

    Users Comments
</h2><br><br>

                <div class="comments-container">


                @forelse($commentaires as $commentaire)
    <div class="comment-container">
        <p class="comment-header">{{ $commentaire->user->name }}</p>
        <div class="stars">
    @for($i = 1; $i <= 5; $i++)
        @if($i <= $commentaire->rating)
            <img src="{{ asset('images/str.png') }}" alt="Star" class="star-image">
        @else
            <img src="{{ asset('images/strr.png') }}" alt="Empty Star" class="star-image">
        @endif
    @endfor
</div>


        <p class="comment-content">{{ $commentaire->content }}</p>
        <p class="comment-date">Publié le: {{ $commentaire->published_at }}</p>

        <!-- Afficher les étoiles en fonction du rating -->





        <!-- Boutons de like et dislike -->
        <div style="display: inline-block;">
            <form action="{{ route('likeComment', ['id' => $commentaire->id]) }}" method="POST">
                @csrf
                <button type="submit" class="like-button">
                    <img src="{{ asset('images/like.png') }}" alt="Like" style="width: 20px; height: 20px;">
                </button>
            </form>
            <span class="like-count text-black">{{ $commentaire->likes }}</span>
        </div>

        <div style="display: inline-block; margin-left: 20px;">
            <form action="{{ route('dislikeComment', ['id' => $commentaire->id]) }}" method="POST">
                @csrf
                <button type="submit" class="dislike-button">
                    <img src="{{ asset('images/dislike.png') }}" alt="Dislike" style="width: 20px; height: 20px;">
                </button>
            </form>
            <span class="dislike-count text-black">{{ $commentaire->dislikes }}</span>
        </div>

    </div>
@empty
    <p class="text-gray-600 mt-4">No comments yet.</p>
@endforelse



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





</x-app-layout>
