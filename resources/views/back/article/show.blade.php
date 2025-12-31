@extends('back.app')

@section('title', 'Détails de l\'article - ' . $article->title)

@section('dashboard-content')
    <div class="row">
        <div class="col-sm-12">
            <div class="mt-5">
                <h4 class="page-title float-left">Détails de l'article</h4>
                <a href="{{ route('article.index') }}" class="btn btn-primary float-right">Retour à la liste</a>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-8">
            <div class="blog-view">
                <article class="blog blog-single-post">
                    <h3 class="blog-title">{{ $article->title }}</h3>

                    <div class="blog-info clearfix mt-2">
                        <div class="post-left">
                            <ul>
                                <li>
                                    <div class="post-author-name">
                                        <i class="far fa-user"></i> Par <span>{{ $article->user->name }}</span>
                                    </div>
                                </li>
                                <li><i class="far fa-calendar"></i> {{ $article->created_at->format('d M Y') }}</li>
                                <li><i class="far fa-folder-open"></i> {{ $article->category->name }}</li>
                            </ul>
                        </div>
                    </div>

                    <div class="blog-image mt-3">
                        <img alt="{{ $article->title }}" src="{{ $article->imageurl() }}" class="img-fluid rounded"
                            style="width: 100%; max-height: 400px; object-fit: cover;">
                    </div>

                    <div class="blog-content mt-4">
                        <p style="white-space: pre-line;">{{ $article->description }}</p>
                    </div>

                    <div class="mt-4">
                        <h5>Options de l'article :</h5>
                        <span class="badge badge-{{ $article->isActive ? 'success' : 'danger' }} p-2">
                            {{ $article->isActive ? 'Publié' : 'Brouillon' }}
                        </span>
                        <span class="badge badge-{{ $article->isShareable ? 'info' : 'secondary' }} p-2">
                            {{ $article->isShareable ? 'Partageable' : 'Non partageable' }}
                        </span>
                        <span class="badge badge-{{ $article->isCommentable ? 'primary' : 'warning' }} p-2">
                            {{ $article->isCommentable ? 'Commentaires autorisés' : 'Commentaires désactivés' }}
                        </span>
                    </div>
                </article>

                <div class="widget author-widget clearfix mt-5">
                    <h3>À propos de l'auteur</h3>
                    <div class="about-author card p-3">
                        <div class="about-author-img d-flex align-items-center">
                            <div class="author-img-wrap mr-3">
                                <img class="img-fluid rounded-circle" style="width: 80px; height: 80px; object-fit: cover;"
                                    src="{{ asset('back_auth/assets/profile/' . $article->user->image) }}"
                                    alt="{{ $article->user->name }}">
                            </div>
                            <div class="author-details">
                                <span class="blog-author-name h5">{{ $article->user->name }}</span>
                                <p class="text-muted mb-0">Membre depuis le {{ $article->user->created_at->format('M Y') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Vous pouvez ajouter une barre latérale ici (articles récents, catégories, etc.) --}}
        <div class="col-md-4">
            <!-- Sidebar content if needed -->
        </div>
    </div>
@endsection