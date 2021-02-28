<div class="modal" tabindex="-1" role="dialog" id="modal_add_application">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Добавление заявки</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('application.store') }}" method="post" id="add_application" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Введите название</label>
                        <input type="text" name="name" id="name"
                               class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Введите описание</label>
                        <textarea name="description" id="description"
                            class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="category_id">Выберите категорию</label>
                        <select class="form-control" id="category_id" name="category_id" required>
                            @foreach($data as $el)
                                <option value={{ $el->id }}>{{ $el->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="path">Фото</label>
                        <input type="file" name="path" id="path" >
                    </div>
                    <input type="submit" value="Отправить" class="btn btn-danger">
                </form>
            </div>
        </div>
    </div>
</div>


