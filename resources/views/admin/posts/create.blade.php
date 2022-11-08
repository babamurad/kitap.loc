@extends('admin.layouts.layout', ['title' => 'Создать новость'])

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-4 pb-4">
                <div class="col-sm-12">
                    <h1>Создание новости</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <!--Header -->
                            <div class="form-header blue accent-1">
                                <h3><i class="fa-solid fas fa-box"></i> Добавить новость:</h3>
                            </div>
                            <form role="form" method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                            @csrf

                            <!--Body -->
                                <div class="md-form">
                                    <i class="fas fa-pencil-alt prefix grey-text"></i>
                                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror">
                                    <label for="title">Наименование новости</label>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="md-form">
                                            <div class="file-field">
                                                <div class="btn btn-light-blue btn-sm float-left waves-effect waves-light">
                                                    <span>Выбрать изображение</span>
                                                    <input type="file" name="cover" id="cover" accept=".png, .jpg, .jpeg" onchange="readURL(this);">
                                                </div>
                                            </div>
                                            <img width="70%" id="blah" src="{{ asset('storage/images/no-image.jpg') }}" alt="your image" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                                <div class="form-header blue accent-1 mt-3">
                                                    <h3><i class="fas fa-image"></i>Images:</h3>
                                                </div>
                                                <input class="btn btn-light-blue btn-sm" type="file" name="images[]" multiple>
                                    </div>
                                    <script type="text/javascript">
                                        function readURL(input) {
                                            if (input.files && input.files[0]) {
                                                var reader = new FileReader();

                                                reader.onload = function (e) {
                                                    $('.images').attr('src', e.target.result);
                                                    $('#img').attr('value', e.target.result);
                                                }
                                                reader.readAsDataURL(input.files[0]);
                                            }
                                        }
                                    </script>

                                </div>

                                <div class="md-form">
                                    <i class="fas fa-solid fa-book-open prefix grey-text"></i>
                                    <textarea type="text" id="content" name="content" class="md-textarea form-control @error('content') is-invalid @enderror" rows="6"></textarea>
                                    <label for="content" class="">Содержание новости</label>
                                </div>

                                <div class="text-center mt-4">
                                    <button class="btn btn-light-blue waves-effect waves-light">Сохранить</button>
                                </div>
                            </form>
                        </div>

                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

