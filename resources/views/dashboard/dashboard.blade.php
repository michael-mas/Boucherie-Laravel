




<!DOCTYPE html>
<html lang="en">
  <head>
      @include('user.css')
      <link href="css/dashboard.css" rel="stylesheet">
      </head>

      <body>

@include('user.navbar')



<div
style=
"position: relative;
text-align: center;
padding-top: 90px;
margin-bottom:30px;"
 class="container ">
@if (session('status'))
        {{ session('status') }}
    @endif
    <section style="display:flex;flex-direction:column;" class="justify-content-center align-items-center" id="profile">
        <div id='profileHeading'>
            <div id='userAvatar'>
                <img src="{{ asset('/storage/avatars/' . $profile_photo_path) }}">
            </div>
            <div id='userDetails'>
                <h1>{{ $username }}</h1>

                <p>Membre depuis {{ $created_at }}</p>

            </div>
        </div>
        <hr style="width: 100%; height:100%">
        <div class="row justify-content-center align-items-center mt-3">
            <h1 class="font-weight-bold mb-4" style="font-size: 20px">Bio</h1>
            <p id='userSummary'>

                "{{ $bio }}"

            </div>

            <div class="row justify-content-center align-items-center mt-4">
            <button class='btn btn-primary' id='updateBtn'>Editer profil</button>
        </div>

    </section>
    <div id="editContainer">
        <form action="{{ url('/dashboardUser') }}" method="POST" class='row border border-secondary' id='updateForm' enctype= multipart/form-data>
            @csrf
            <div class="col-12" id="avatarContainer">
                <label for='avatar' id="avatarFrame">
                    <img id='editIcon' src='/images/iconEdit.svg'>
                    <img id='avatarPreview' src="{{ asset('/storage/avatars/' . $profile_photo_path) }}">


                </label>
                <input type="file" accept="image/jpg, image/jpeg, image/png" name="profile_photo_path" class='d-none' id="avatar">
            </div>
            <div class="col-12">
                <label for="name">
                   Nom
                </label>

                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $username }} "autocomplete="name">

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-12">
                <label for="bio">
                    Bio
                </label>

                <textarea name="bio" class="form-control @error('bio') is-invalid @enderror" id="bio" rows="3">{{ $bio }}</textarea>

                @error('bio')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-6 d-flex justify-content-start align-items-center">
                <button class='btn btn-secondary m-3' id='updateFormCancel'>Annuler</button>
            </div>
            <div class="col-6 d-flex justify-content-end align-items-center">
                <button class='btn btn-primary m-3'>Sauvegarder</button>
            </div>
        </form>
    </div>
    <section id='recipes'>
        <div class="container">
            <h2 class='h1'>Mes recettes</h2>
            <hr class="mb-4">
            <div class="row">
                @forelse ($recipes as $recipe)
                <div class="card-wrapper col-lg-4 col-md-6 col-xs-12">
                    <div class="card cardx">

                      <div class="card-img-wrapper">

                        <img class="card-img-top" src='{{ url('/storage/recipes/' . $recipe->image) }}'' alt="Card image cap">
                      </div>
                      <div class="card-body">
                        <h5 class="font-weight-bold card-title">{{ $recipe->title }}</h5>
                        <hr>
                        <div class="card-content">
                            <h4 style="font-size: 18px" class="mb-1 font-weight-bold">Description</h4>
                          <p class="card-text mb-1">{{ $recipe->description }}</p>
                          <a href="{{ url('/recipe/' . $recipe->id) }}" class="btn btn-dark">Voir la recette</a>
                        </div>
                      </div>
                    </div>
                  </div>
                @empty
                    <p id='no-results'>Vous n'avez pas de recettes</p>
                @endforelse
                </div>
            {{ $recipes->links() }}
        </div>
    </section>

</div>



@include('user.footer')


@include('user.script')
<script src="js/main.js"></script>
<script src="js/dashboard.js"></script>

</body>

</html>

