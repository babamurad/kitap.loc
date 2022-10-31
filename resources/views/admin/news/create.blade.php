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
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <!--Header -->
                            <div class="form-header blue accent-1">
                                <h3><i class="fa-solid fas fa-box"></i> Добавить новость:</h3>
                            </div>
                            <form role="form" method="post" action="{{ route('news.store') }}" enctype="multipart/form-data">
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
                                                    <input type="file" name="img" id="img" accept=".png, .jpg, .jpeg" onchange="readURL(this);">
                                                </div>
{{--                                                <div class="file-path-wrapper">--}}
{{--                                                    <input id="img" name="img" class="file-path validate" type="text"  placeholder="Загрузить изображение">--}}
{{--                                                </div>--}}
                                            </div>
                                            <img width="70%" id="blah" src="{{ asset('storage/images/no-image.jpg') }}" alt="your image" />
                                        </div>
                                    </div>

                                    <script type="text/javascript">
                                        function readURL(input) {
                                            if (input.files && input.files[0]) {
                                                var reader = new FileReader();

                                                reader.onload = function (e) {
                                                    $('#blah').attr('src', e.target.result);
                                                    $('#img').attr('value', e.target.result);
                                                }
                                                reader.readAsDataURL(input.files[0]);
                                            }
                                        }
                                    </script>

                                    <div class="col-sm-6">
                                        <div class="md-form">
                                            <i class="fas fa-pencil-alt prefix grey-text"></i>
                                            <input type="text" name="slug" id="slug" disabled
                                                   class="form-control @error('slug') is-invalid @enderror">
                                            <label for="slug">Slug</label>
                                        </div>
                                    </div>
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

