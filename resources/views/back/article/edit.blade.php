@extends('back.app')

@section('title', 'Dashboard - Articles Edit')

@section('dashboard-header')
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title mt-5">Modifier un article</h3>
            </div>
        </div>
    </div>
@endsection

@section('dashboard-content')
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('article.update', $article) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row formtype">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Titre de l'article</label>
                            <input class="form-control" type="text" name="title"
                                value="{{ old('title', $article->title) }}" />
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Categorie</label>
                            <select class="form-control" id="sel1" name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @selected(old('category_id', $article->category_id) == $category->id)>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Uploader une image</label>
                            <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" id="customFile" name="image" />
                                <label class="custom-file-label" for="customFile">Choisir une image</label>
                            </div>
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <img src="{{ $article->imageurl() }}" alt="Current Image" style="width: 1000px;"
                                class="img-thumbnail">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" rows="5" id="comment" name="description">{{ old('description', $article->description) }}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Publication</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="article_active" name="isActive"
                                value="1" {{ old('isActive', $article->isActive) == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="article_active">Publier</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="article_inactive" name="isActive"
                                value="0" {{ old('isActive', $article->isActive) == 0 ? 'checked' : '' }}>
                            <label class="form-check-label" for="article_inactive">Ne pas publier</label>
                        </div>
                        @error('isActive')
                            <div><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Partages</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="article_share_active" name="isShareable"
                                value="1" {{ old('isShareable', $article->isShareable) == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="article_share_active">Partageable</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="article_share_inactive"
                                name="isShareable" value="0"
                                {{ old('isShareable', $article->isShareable) == 0 ? 'checked' : '' }}>
                            <label class="form-check-label" for="article_share_inactive">Non Partageable</label>
                        </div>
                        @error('isShareable')
                            <div><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Commentaires</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="article_comment_active"
                                name="isCommentable" value="1"
                                {{ old('isCommentable', $article->isCommentable) == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="article_comment_active">Autorise</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="article_comment_inactive"
                                name="isCommentable" value="0"
                                {{ old('isCommentable', $article->isCommentable) == 0 ? 'checked' : '' }}>
                            <label class="form-check-label" for="article_comment_inactive">Non autorise</label>
                        </div>
                        @error('isCommentable')
                            <div><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary buttonedit1 mt-4">Enregistrer les modifications</button>
            </form>
        </div>
    </div>
@endsection