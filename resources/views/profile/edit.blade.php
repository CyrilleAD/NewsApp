@extends('back.app')

@section('title', 'Dashboard - Profile')

@section('dashboard-header')
    <div class="row">
        <div class="col">
            <h3 class="page-title">Profile</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Profile</li>
            </ul>
        </div>
    </div>
@endsection

@section('dashboard-content')
    <div class="row">
        <div class="col-md-12">
            <div class="profile-header">
                <div class="row align-items-center">
                    <div class="col-auto profile-image">
                        <a href="#"> <img class="rounded-circle" alt="User Image"
                                src="{{asset('back_auth/assets/profile/' . \Illuminate\Support\Facades\Auth::user()->image)}}">
                        </a>
                    </div>
                    <div class="col ml-md-n2 profile-user-info">
                        <h4 class="user-name mb-3">{{ \Illuminate\Support\Facades\Auth::user()->name }}</h4>
                        <h6 class="text-muted mt-1">Admin</h6>
                    </div>

                </div>
            </div>
            <div class="profile-menu">
                <ul class="nav nav-tabs nav-tabs-solid">
                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#per_details_tab">A propos</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#password_tab">Mot de passe</a> </li>
                </ul>
            </div>
            <div class="tab-content profile-tab-cont">
                <div class="tab-pane fade show active" id="per_details_tab">
                    @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title d-flex justify-content-between">
                                        <span>Informations Personelles</span>
                                        <a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i
                                                class="fa fa-edit mr-1"></i>Modifier
                                        </a>
                                    </h5>
                                    <div class="row">
                                        <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Nom</p>
                                        <p class="col-sm-9">{{ \Illuminate\Support\Facades\Auth::user()->name }}</p>
                                    </div>
                                    <div class="row">
                                        <p class="col-sm-3 text-sm-right mb-0 mb-sm-3">Email</p>
                                        <p class="col-sm-9">
                                            <a href="">{{ \Illuminate\Support\Facades\Auth::user()->email }}</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Personal Details</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span> </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('profile.update') }} " method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PATCH')
                                                <div class="row form-row">
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <label>Nom</label>
                                                            <input type="text"
                                                                class="form-control @error('name') is-invalid @enderror"
                                                                name="name"
                                                                value="{{ old('name', \Illuminate\Support\Facades\Auth::user()->name) }}">
                                                            @error('name')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <label>Adresse Email</label>
                                                            <input type="email"
                                                                class="form-control @error('email') is-invalid @enderror"
                                                                name="email"
                                                                value="{{ old('email', \Illuminate\Support\Facades\Auth::user()->email) }}">
                                                            @error('email')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <label>Photo de profile</label>
                                                            <input type="file"
                                                                class="form-control @error('image') is-invalid @enderror"
                                                                name="image">
                                                            @error('image')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                </div>
                                                <button type="submit" class="btn btn-primary btn-block">Enregistrer les
                                                    modifications</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div id="password_tab" class="tab-pane fade">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Modifier le mot de passe</h5>
                            <div class="row">
                                <div class="col-md-10 col-lg-6">
                                    @if (session('status') === 'password-updated')
                                        <div class="alert alert-success">
                                            Le mot de passe a été mis à jour avec succès.
                                        </div>
                                    @endif
                                    <form action="{{ route('password.update')}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>Ancien mot de passe</label>
                                            <input type="password" name="current_password" class="form-control">
                                            @error('current_password')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Nouveau mot de passe</label>
                                            <input type="password" name="password" class="form-control">
                                            @error('password')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Confirmer motde passe</label>
                                            <input type="password" name="password_confirmation" class="form-control">
                                            @error('password_confirmation')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <button class="btn btn-primary" type="submit">Enregistrer les modifications</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            console.log("Script profile chargé");

            @if ($errors->has('current_password') || $errors->has('password') || $errors->has('password_confirmation'))
                console.log("Erreurs de mot de passe détectées");
                $('.nav-tabs a[href="#password_tab"]').tab('show');
            @endif

            @if (session('status') === 'password-updated')
                console.log("Changement de mot de passe réussi");
                $('.nav-tabs a[href="#password_tab"]').tab('show');
            @endif
                    });
    </script>

@endsection