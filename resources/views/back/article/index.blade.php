@extends('back.app')

@section('title', 'Dashboard - Articles')

@section('dashboard-header')
    <div class="row align-items-center">
        <div class="col">
            <div class="mt-5">
                <h4 class="card-title float-left mt-2">Articles</h4>
                <a href="{{ route('article.create') }}" class="btn btn-primary float-right veiwbutton ">Ajouter un
                    article</a>
            </div>
        </div>
    </div>
@endsection

@section('dashboard-content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table">
                <div class="card-body booking_card">
                    <div class="table-responsive">
                        <table class="table table-stripped table table-hover table-center mb-0">
                            <thead>
                                <tr>
                                    <th>ID Article</th>
                                    <th>Image</th>
                                    <th>Titre</th>
                                    <th>Categorie</th>
                                    <th>Date</th>
                                    <th>Publication</th>
                                    <th>Partage</th>
                                    <th>Commentaires</th>
                                    <th>Auteur</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($articles as $article)
                                    <tr>
                                        <td>ART-{{ $article->id }}</td>
                                        <td><img src="{{ $article->imageurl() }}" alt=""
                                                style="width: 70px; height: 70px; object-fit: cover;"></td>
                                        <td>{{ $article->title }}</td>
                                        <td>{{ $article->category->name }}</td>
                                        <td>{{ $article->created_at->format('d-m-Y') }}</td>
                                        <td>
                                            <div class="actions"> <a href="#"
                                                    class="btn btn-sm bg-success-light mr-2">Publié</a> </div>
                                        </td>
                                        <td>
                                            <div class="actions"> <a href="#"
                                                    class="btn btn-sm bg-success-light mr-2">Active</a> </div>
                                        </td>
                                        <td>
                                            <div class="actions"> <a href="#"
                                                    class="btn btn-sm bg-success-light mr-2">Active</a> </div>
                                        </td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile.html" class="avatar avatar-sm mr-2"><img
                                                        class="avatar-img rounded-circle"
                                                        src="{{ asset('back_auth/assets/profile/' . $article->user->image) }}"
                                                        alt="User Image"></a>
                                                <a href="profile.html">{{ $article->user->name }}
                                                    <span>{{ $article->user->id }}</span></a>
                                            </h2>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                    aria-expanded="false"><i class="fas fa-ellipsis-v ellipse_color"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="{{ route('article.show', $article->slug) }}">
                                                        <i class="fas fa-pencil-alt m-r-5"></i> Voir
                                                    </a>
                                                    <a class="dropdown-item" href="{{ route('article.edit', $article->slug) }}">
                                                        <i class="fas fa-pencil-alt m-r-5"></i> Modifier
                                                    </a>
                                                    <a class="dropdown-item btn-delete" href="#" data-toggle="modal"
                                                        data-target="#delete_asset"
                                                        data-url="{{ route('article.destroy', $article->slug) }}">
                                                        <i class="fas fa-trash-alt m-r-5"></i> Supprimer
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- À mettre juste avant @endsection --}}
    <div id="delete_asset" class="modal fade delete-modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <img src="{{ asset('back_auth/assets/img/sent.png') }}" alt="" width="50" height="46">
                    <h3>Etes-vous sûr de vouloir supprimer cet article ?</h3>
                    <div class="m-t-20">
                        {{-- Le formulaire de suppression --}}
                        <form id="delete_form" action="" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="#" class="btn btn-white" data-dismiss="modal">Fermer</a>
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).on('click', '.btn-delete', function () {
            var url = $(this).data('url');
            $('#delete_form').attr('action', url);
        });
    </script>
@endsection