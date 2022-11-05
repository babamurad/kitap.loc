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
                                                {{-- <div class="form-header blue accent-1 mt-3">
                                                    <h3><i class="fas fa-image"></i>Images:</h3>
                                                </div> --}}
                                                <input class="btn btn-light-blue btn-sm" type="file" name="images[]" multiple>
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

                                </div>

                                <div class="md-form">
                                    <i class="fas fa-solid fa-book-open prefix grey-text"></i>
                                    <textarea type="text" id="editor" name="content" class="summernote md-textarea form-control @error('content') is-invalid @enderror" rows="6"></textarea>
                                    
                                </div>

                                <script>
                                    $('#content').summernote({
                                      placeholder: 'Начни писать здесь, Батко!',
                                      tabsize: 2,
                                      height: 175
                                    });
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

@push('summernote')
    <!-- Summernote For Bootstrap 4 -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
@endpush