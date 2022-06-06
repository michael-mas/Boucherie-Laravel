@extends('layouts.app_layout')
<base href="/public">
@section('title', 'Recipe')
@section('stylesheets')
@endsection
@section('description', $title . "HalalButcher")
@section('content')

<div
class="container mb-3"
style="
position: relative;
text-align: center;
padding-top: 90px;">
    <div id="recipe-container">
        <section id="general-information">
            <div id="info-container">
                <div id="recipe-details">
                    <h1 style="font-size: 40px">{{ $title }}</h1>
                    <hr>
                    @if (!empty($servings))
                        <span>{{ $servings }} parts</span>
                    @endif
                <p>Créer par: <a href='{{ url('/user/' . $name)}}'>{{ $name }}</a></p>
                @if ($user_id === Auth::id())
                <hr class="mb-3">
                    <a href='{{ url('/recipe/' . $id . "/edit") }}' class='btn btn-primary'>Modifier</a>
                    <a class="btn btn-danger " onclick="event.preventDefault(); document.getElementById('recipe-delete').submit();">
                        Supprimé
                    </a>
                    <form method="POST" action="{{route('recipe.destroy', $id) }}" class='d-none' id='recipe-delete'>
                        @method('DELETE')
                        @csrf
                    </form>
                @endif
                </div>
                <div
                style="display: block;
                margin: auto;
                width: 50%;"
                class="mb-3 mt-3"
                id="recipe-image">
                    @if ($image != "default.svg")
                        <img src='{{ url('/storage/recipes/' . $image) }}'>
                    @endif
                </div>
            </div>

        </section>
        <section id="description">
            <h2 class='h5'>Description</h2>
            <p>{{ $description }}</p>
        </section>
        <section id="ingredients">
            <hr>
            <h2 class='h5'>Ingredients</h2>
            <ul>
                @foreach ($ingredients as $ingredient)
                    <li>
                        {{ $ingredient }}
                    </li>
                @endforeach
            </ul>
        </section>
        <hr>
        <section id="instructions">
            <h2 class='h5'>Instructions</h2>
            <p>
                {{ $instructions }}
            </p>
        </section>
    </div>
</div>
@endsection
