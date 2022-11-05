@extends('admin.layouts.layout', ['title' => 'Пользователи'])
@section('content')

    <!-- Heading & Date -->
    <section>


        <div class="card">
            <div class="card-body">
@if(($users->count()))
                <!-- Table -->
                <table class="table table-hover">

                    <!-- Table head -->
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Admin</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <!-- Table head -->

                    <!-- Table body -->
                    <tbody>
                    @foreach($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <button class="btn btn-info btn-sm float-left" style="margin-top: 0.3rem;" data-toggle="modal" data-target="#admin{{$loop->index}}">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                        </td>                        
                        <td>
                            {{-- <form action="#"
                                  method="post" class="float-left"> --}}
                                {{-- @csrf
                                @method('DELETE') --}}
                                <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Подтвердите удаление')">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            {{-- </form> --}}
                        </td>
                    </tr>

<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#admin{{$loop->index}}">
    Launch demo modal
</button> --}}
  
  <!-- Modal -->
  <form role="form" action="{{ route('get-admin', $user->id) }}" method="POST">
    @csrf
    @method('PUT')

  <div class="modal fade" id="admin{{$loop->index}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Администратор</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <fieldset class="form-check">
                <input class="form-check-input" type="checkbox" id="checkbox1" name="is_admin" 
                @if ($user->is_admin)
                checked="checked"   
                @endif>
                <label class="form-check-label" for="checkbox1">Classic checkbox</label>
              </fieldset>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
          <button type="submit" class="btn btn-primary">Сохранить</button>
        </div>
      </div>
    </div>
  </div>
</form>
                    @endforeach
                    </tbody>
                    <!-- Table body -->
                </table>
                <!-- Table -->
                    <div class="row">
                        <div class="col-sm-12">
                            {{ $users->links("pagination::bootstrap-4") }}
                        </div>

                    </div>
    @else
                <p>Пользователей пока нет...</p>
    @endif
            </div>
        </div>

    </section>
@endsection
