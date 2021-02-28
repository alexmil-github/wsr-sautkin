{{--Модальное окно добавления категории--}}
<div class="modal" tabindex="-1" role="dialog" id="modal_add_category">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Добавление категории</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('category.store') }}" method="post" id="add_category">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col col-form-label text-md-right">Наименование</label>
                        <div class="col-md">
                            <input type="text" name="name" id="name" class="form-control" autofocus required>
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
