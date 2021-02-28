@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Заявки') }}</div>

                    <div class="card-body">

                        {{--Вывод результата валидации--}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                @if ($errors->has('email'))
                                @endif
                            </div>
                        @endif


                    @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <button type="button" class="btn btn-primary float-right mb-3" data-toggle="modal"
                                data-target="#modal_add_application">
                            Добавить
                        </button>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Наименование</th>
                                <th scope="col">Описание</th>
                                <th scope="col">Категория</th>
                                <th scope="col">Фото</th>
                                <th scope="col">Время добавления заявки</th>
                                <th scope="col">Статус</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($applications) > 0)
                                @foreach($applications as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ \App\Models\Category::find($item->category_id)-> name }}</td>
                                        <td>
                                            <a class="thumbnail" href="#" data-image-id="" data-toggle="modal"
                                               data-image="{{ $item->path }}" data-target="#image-gallery">
                                                <img class="img-thumbnail"
                                                     src="{{ $item->path }}"
                                                     alt="{{ $item->title }}">
                                            </a>
                                        </td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ \App\Models\Status::find($item->status_id)->name }}</td>

                                        <td>
                                            <form action="{{ route('application.delete', ['id'=>$item->id]) }}"
                                                  method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger">
                                                    Удалить
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @include('modal.add_application')



@endsection
