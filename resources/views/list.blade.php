@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if($lists->count())
                <div class="col-md-3">
                    <ul class="list-group">
                        @foreach($lists->get() as $list)
                            <li class="list-group-item">
                                <a href="{{ route("list.show", $list) }}">
                                    {{ $list->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <div class="text-left">
                                    {{ $list->title }}
                                </div>
                            </div>
                            <div class="col">
                                <button class="float-right btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#addItem">Madde ekle</button>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if($list->items->count())
                            <ul class="list-group">
                                @foreach($lists->items as $item)
                                    <li class="list-group-item">
                                        <a href="{{ route("item.show", $item) }}">
                                            {{ $item->description }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <div class="alert alert-primary" role="alert">
                                Listenizde yapılacak madde bulunmuyor.
                                <a href="#" class="alert-link" data-toggle="modal" data-target="#addItem">Buradan</a> ekleyebilirsin.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <div class="modal fade" id="addItem" tabindex="-1" role="dialog" aria-labelledby="addItemLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('item.store') }}" method="post">
                @csrf
                <input type="hidden" name="list_id" value="{{ $list->id }}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addItemLabel">Madde Ekle</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="detail">Madde Başlığı</label>
                            <input type="text" class="form-control" name="detail" id="detail" placeholder="Madde başlığını girin." required>
                        </div>
                        <div class="form-group">
                            <label for="deadline">Bitiş Tarihi</label>
                            <input type="datetime-local" class="form-control" name="deadline" id="deadline" placeholder="Bitiş tarihini.">
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
