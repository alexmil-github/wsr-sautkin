@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-sm-center">
            <div class="col-md-6">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="col-md-12">
                            <form action="{{ route('category.store') }}" method="post" id="add_category">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col col-form-label text-md-right">Наименование</label>
                                    <div class="col-md">
                                        <input type="text" name="name" id="name" class="form-control" autofocus
                                               required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Сохранить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
