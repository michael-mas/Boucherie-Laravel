<base href="/public">
@extends('layouts.app_layout')
@section('title', "Post Recipe")

@section('content')
<div
style=
"position: relative;
text-align: center;
padding-top: 90px;
margin-bottom:30px;"
 class="container ">
    <div class="container">
        <h1 class="mb-3">Modifier Votre Recette</h1>
        <p>* indique que les champs sont obligatoire</p>
        <form action="{{ url('/recipe/' . $recipe->id) }}" method="POST" enctype='multipart/form-data'>
            @csrf
            @method('put')
            <div class="row form-section">
                <h2 class='h4'>Informations générales</h2>
                <div class="col-12 my-3">
                    <label for="title">
                        Titre de la recette*
                    </label>

                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" maxLength='30' value="{{ old('title') ?? $recipe->title }}" required autofocus>

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-12 my-3">
                    <label for="servings">
                        Parts
                    </label>

                    <select name="servings" id="servings" class='form-control form-select'>
                        <option></option>
                        <option @if (old('servings') ?? $recipe->servings == 1) selected @endif value=1>1 Part</option>
                        <option @if (old('servings') ?? $recipe->servings == 2) selected @endif value=2>2 Parts</option>
                        <option @if (old('servings') ?? $recipe->servings == 3) selected @endif value=3>3 Parts</option>
                        <option @if (old('servings') ?? $recipe->servings == 4) selected @endif value=4>4 Parts</option>
                        <option @if (old('servings') ?? $recipe->servings == 5) selected @endif value=5>5 Parts</option>
                        <option @if (old('servings') ?? $recipe->servings == 6) selected @endif value=6>6 Parts</option>
                        <option @if (old('servings') ?? $recipe->servings == 7) selected @endif value=7>7 Parts</option>
                        <option @if (old('servings') ?? $recipe->servings == 8) selected @endif value=8>8 Parts</option>
                        <option @if (old('servings') ?? $recipe->servings == 9) selected @endif value=9>9 Parts</option>
                        <option @if (old('servings') ?? $recipe->servings == 10) selected @endif value=10>10 Parts</option>
                        <option @if (old('servings') ?? $recipe->servings == 11) selected @endif value=11>11 Parts</option>
                        <option @if (old('servings') ?? $recipe->servings == 12) selected @endif value=12>12 Parts</option>
                        <option @if (old('servings') ?? $recipe->servings == 13) selected @endif value=13>13 Parts</option>
                        <option @if (old('servings') ?? $recipe->servings == 14) selected @endif value=14>14 Parts</option>
                        <option @if (old('servings') ?? $recipe->servings == 15) selected @endif value=15>15 Parts</option>
                        <option @if (old('servings') ?? $recipe->servings == 16) selected @endif value=16>16 Parts</option>
                    </select>

                    @error('servings')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-12 my-3">
                    <label for='description'>
                        Description
                    </label>

                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="3">{{ old('description') ?? $recipe->description }}</textarea>

                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="col-12 my-3">
                    <label for="image">
                        Image (optioniel)
                    </label>

                    <label for='image' id='imageFrame' @error('image') class='is-invalid' @enderror>
                        <img src='{{ url('/storage/recipes/' . $recipe->image) }}' id='imagePreview'>
                    </label>

                    <input type="file" accept="image/jpg, image/jpeg, image/png" class="d-none @error('image') is-invalid @enderror" value="{{ old('image') }}" name="image" id='image'>

                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-section">
                <h2 class='h5'>Ingredients</h2>
                <div class="row my-3">
                    <div class="col-8 col-md-10">
                        <label for="ingredientName">Ingredient*</label>

                        <input id='ingredientName' class="form-control ingredientInput" type="text">
                    </div>
                    <div class="col-4 col-md-2">
                        <input value='Add' id='addIngredient' class='btn btn-primary  text-dark form-control ingredientInput mt-4' type='button'>
                    </div>
                </div>
                <div class="col-12 mb-5 mt-2">
                    <input type='text' id='ingredients' name='ingredients' value="{{ old('ingredients') ?? $recipe->ingredients }}" readonly class='d-none'>

                    <ul id='ingredientsList' class='list-group my-2 fs-4'>
                    </ul>
                </div>
                @error('ingredients')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
            <div class="row form-section">
                <h2 class='h4'>Instructions</h2>
                <div class="col-12 my-3">
                    <label for="instructions">
                        Instructions
                    </label>

                    <textarea name="instructions" id="instructions" class="form-control @error('instructions') is-invalid @enderror" rows="10">{{ old('instructions') ?? $recipe->instructions }}</textarea>

                    @error('instructions')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-12 d-flex justify-content-end align-items-center mt-2">
                <button type='submit' class='btn btn-primary text-dark'>Mettre à jour la recette</button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
    <script src='/js/recipes/create.js'></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
@endsection
