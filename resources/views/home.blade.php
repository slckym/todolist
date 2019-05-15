@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <div class="text-left">
                                    Listelerim
                                </div>
                            </div>
                            <div class="col">
                                <button class="float-right btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#addList">Liste ekle</button>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if($lists->count())
                            <ul class="list-group">
                                @foreach($lists as $list)
                                    <li class="list-group-item">
                                        <a href="{{ route("list.show", $list) }}">
                                            {{ $list->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <div class="alert alert-primary" role="alert">
                                Listeniz bulunmuyor.
                                <a href="#" class="alert-link" data-toggle="modal" data-target="#addList">Buradan</a> ekleyebilirsin.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <div class="modal fade" id="addList" tabindex="-1" role="dialog" aria-labelledby="addListLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('list.store') }}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addListLabel">Liste Ekle</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">Liste Başlığı</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Liste başlığını girin." required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Vazgeç</button>
                        <button type="submit" class="btn btn-primary">Ekle</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
