@extends('layouts.app_layout')
@section('title', 'Search Recipes')
@section('stylesheets')
    <style>
        .card-result{
            background-color: red;
        }
    </style>
    <link href="{{ asset('css/recipes/index.css') }}" rel="stylesheet">
@endsection
@section('description', "Search results for" . $q . "on Zesty")
@section('content')
<link href="{{ asset('css/main.css') }}" rel="stylesheet">


    <section id='recipes'>
        <div class="container">
            <h1 class='h1'>Resultat de la recherche pour '{{ $q }}'</h1>
                <div class="row">
                @forelse ($recipes as $recipe)

                <div class="card-wrapper col-lg-4 col-md-6 col-xs-12">
                    <div class="card cardx">

                      <div class="card-img-wrapper">

                        <img class="card-img-top" src='{{ url('/storage/recipes/' . $recipe->image) }}'' alt="Card image cap">
                      </div>
                      <div class="card-body">
                        <h5 class="card-title font-weight-bold">{{ $recipe->title }}</h5>
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
                    <p id='no-results'>Pas de résultat :(</p>
                @endforelse
            {{ $recipes->links() }}
        </div>
    </div>

    <style>


    </style>



    </section>
@endsection

