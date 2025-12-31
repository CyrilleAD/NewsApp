@extends('back.app')

@section('title', 'Dashboard - Modification de categorie')

@section('dashboard-header')
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title mt-5">Modifier une categorie</h3>
        </div>
    </div>
@endsection

@section('dashboard-content')
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('category.update', $category) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row formtype">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Nom de la categorie</label>
                            <input class="form-control" type="text" name="name" value="{{ $category->name }}" />
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" rows="5" id="comment"
                                name="description">{{ $category->description }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Activation</label>
                            <select class="form-control" id="sel2" name="isactive">
                                <option @if(isset($category)) @selected($category->isactive == 1) value="1" @endif>Activer
                                </option>
                                <option @if(isset($category)) @selected($category->isactive == 0) value="0" @endif>Ne pas
                                    activer</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary buttonedit1">
                    Modifier
                </button>
            </form>
        </div>
    </div>

    <div id="delete_asset" class="modal fade delete-modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <img src="assets/img/sent.png" alt="" width="50" height="46" />
                    <h3 class="delete_class">
                        Are you sure want to delete this Asset?
                    </h3>
                    <div class="m-t-20">
                        <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection