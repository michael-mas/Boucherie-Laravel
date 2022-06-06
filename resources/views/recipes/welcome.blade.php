

<!DOCTYPE html>
<html lang="en">
<base href="/public">
      <head>

      @include('user.css')
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
         <h1 class="font-weight-bold mt-2" style="font-size:35px">Recettes</h1>
         <form class="mr-3" action='/search' method='GET'>
            <div class="d-flex flex-row justify-content-end">
                    <input style="height: 20%" id='q' type='text' name='q' placeholder='Rechercher' role='search' value='{{ $q ?? null }}'>
                    <button class="w-8" type='submit'>
                        <img class="ml-2" src='/images/iconSearch2.svg'>
                    </button>
                </div>
                </form>
    <section id='recipes'>
        <div class="container">
            <hr class="mt-3 mb-3">
            <h1 style="font-size: 20px">Les dernières recettes de nos clients</h1>

            <div class="row">
              @foreach ($recipes as $recipe)
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
              @endforeach
              {{ $recipes->links() }}
            </div>
          </div>
        </section>
        </div>





    @include('user.footer')


    @include('user.script')


  </body>

</html>


