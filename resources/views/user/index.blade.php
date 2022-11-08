@extends('admin.layouts.layout', ['title' => 'Пользователи'])
@section('content')

    <!-- Heading & Date -->
    <section>


        <div class="card">
            <div class="card-body">
                @if ($users->count())
                    <!-- Table -->
                    <table class="table table-hover">

                        <!-- Table head -->
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Admin</th>
                                <th>AdCheck</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <!-- Table head -->

                        <!-- Table body -->
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <button id="send" class="btn btn-info btn-sm float-left check-admin" style="margin-top: 0.3rem;"
                                            data-toggle="modal" data-target="#admin{{ $loop->index }}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <input type="checkbox" class="custom-control-input" id="Check{{ $loop->index }}" name="is_admin"  data-id={{$user->is_admin}}
                                        @if ($user->is_admin) checked value="1" @else value="0" @endif>
                                        <label class="custom-control-label" for="Checked{{ $loop->index }}">Default checked | {{$user->is_admin}}</label>    
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Подтвердите удаление')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>

<script>
   $('"#send"').click(function(){
        var params = {
            text: $('#check2').val(),
        }
        $post("ajax.php", params, function(data){
            $()
        });
   }); 
</script>

                                <!-- Modal -->


        <div class="modal fade" id="admin{{ $loop->index }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form role="form" action="{{ route('get-admin', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Администратор</h5>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">                        
                                <!-- Default checked -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="defaultChecked2" name="is_admin"
                                    @if ($user->is_admin) checked="checked" @endif>
                                    <label class="custom-control-label" for="defaultChecked2">Default checked | {{$user->is_admin}}</label>
                                </div>
                                <fieldset class="form-check">
                                    <input class="form-check-input" type="checkbox" id="checkbox1" name="is_admin22" 
                                    @if ($user->is_admin) checked="checked" @endif>
                                    <label class="form-check-label" for="checkbox1">Classic checkbox</label>
                                </fieldset>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </div>
            </form>
            </div>

        </div>
                            @endforeach
                        </tbody>
                        <!-- Table body -->
                    </table>
                    <!-- Table -->
                    <div class="row">
                        <div class="col-sm-12">
                            {{ $users->links('pagination::bootstrap-4') }}
                        </div>

                    </div>
                @else
                    <p>Пользователей пока нет...</p>
                @endif
            </div>
        </div>

    </section>
@endsection
