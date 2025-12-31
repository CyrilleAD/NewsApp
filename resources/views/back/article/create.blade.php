@extends('back.app')

@section('title', 'Dashboard - Ajouter un article')

@section('dashboard-header')
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title mt-5">Modifier un article</h3>
        </div>
    </div>
@endsection

@section('dashboard-content')
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row formtype">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Titre de l'article</label>
                            <input class="form-control" type="text" name="title" value="{{ old('title') }}" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Categorie</label>
                            <select class="form-control" id="sel1" name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Uploader une image</label>
                            <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" id="customFile" name="image" />
                                <label class="custom-file-label" for="customFile">Choisir une image</label>
                            </div>
                        </div>
                    </div>

                    <textarea class="form-control" rows="5" id="comment"
                        name="description">{{ old('description') }}</textarea>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Publication</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input  class="form-check-input" type="radio" id="article_active" name="isActive"
                                value="1" {{ old('isActive') == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="article_active">Publier</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input  class="form-check-input" type="radio" id="article_inactive"
                                name="isActive" value="0" {{ old('isActive') == 0 ? 'checked' : '' }}>
                            <label class="form-check-label" for="article_inactive">Ne pas publier</label>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Partages</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input  class="form-check-input" type="radio" id="article_share_active"
                                name="isShareable" value="1" {{ old('isShareable') == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="article_share_active">Partageable</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input  class="form-check-input" type="radio" id="article_share_inactive"
                                name="isShareable" value="0" {{ old('isShareable') == 0 ? 'checked' : '' }}>
                            <label class="form-check-label" for="article_share_inactive">Non Partageable</label>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Commentaires</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input  class="form-check-input" type="radio" id="article_comment_active"
                                name="isCommentable" value="1" {{ old('isCommentable') == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="article_comment_active">Autorise</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input  class="form-check-input" type="radio" id="article_comment_inactive"
                                name="isCommentable" value="0" {{ old('isCommentable') == 0 ? 'checked' : '' }}>
                            <label class="form-check-label" for="article_comment_inactive">Non autorise</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary buttonedit1">Enregistrer l'article</button>
                </div>

            </form>
        </div>
    </div>
@endsection