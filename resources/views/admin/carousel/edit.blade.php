@extends('admin.layouts.layout', ['title' => 'Редактирование элемента карусели'])

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-4 pb-4">
                <div class="col-sm-12">
                    <h1>Редактирование карусели</h1>
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
                                <h3><i class="fa-solid fas fa-box"></i> Редактировать элемент карусели:</h3>
                            </div>
                            <form role="form" method="post" action="{{ route('carousel.update', $carousel->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <!--Body -->
                                <div class="md-form">
                                    <i class="fas fa-pencil-alt prefix grey-text"></i>
                                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ $carousel->title }}">
                                    <label for="title">Заголовок карусели</label>
                                </div>

                                    <div class="md-form">
                                        <i class="fas fa-solid fa-book-open prefix grey-text"></i>
                                        <input type="text" name="subtitle" id="subtitle" class="form-control @error('subtitle') is-invalid @enderror" value="{{ $carousel->subtitle }}">
                                        <label for="subtitle">Подзаголовок карусели</label>
                                    </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="md-form">
                                            <div class="file-field">
                                                <div class="btn btn-light-blue btn-sm float-left waves-effect waves-light @error('img') is-invalid @enderror">
                                                    <span>Выбрать изображение</span>
                                                    <input type="file" name="img" id="img" accept=".png, .jpg, .jpeg" onchange="readURL(this);">
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <input id="img-put" class="file-path validate @error('img') is-invalid @enderror" type="text"  placeholder="Загрузить изображение">
                                                </div>
                                            </div>
                                            @if(isset($carousel->img))
                                                <img class="img-fluid" width="70%" id="blah" src="{{ asset('storage/' .$carousel->img) }}" alt="your image" />
                                            @else
                                                <img class="img-fluid" width="70%" id="blah" src="{{ asset('storage/images/no-image.jpg') }}" alt="your image" />
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <script type="text/javascript">
                                    function readURL(input) {
                                        if (input.files && input.files[0]) {
                                            var reader = new FileReader();

                                            reader.onload = function (e) {
                                                $('#blah').attr('src', e.target.result);
                                                $('#img-put').attr('value', e.target.result);
                                            }
                                            reader.readAsDataURL(input.files[0]);
                                        }
                                    }
                                </script>

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

