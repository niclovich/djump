@extends('adminlte::page')
@section('title', 'Inicio')
@section('content_header')
    <h1>Listado Usuarios</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12 col-md-offset-1">
            </h2>
            <a href="{{ route('users.generate-pdf') }}" class="btn btn-sm btn-danger text-white text-uppercase me-1">
                Generar Pdf
            </a>
            <a href="{{ route('users.export') }}" class="btn btn-sm btn-warning text-white text-uppercase me-1">
                Generar Exel
            </a>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-md-offset-1">

            <table id="tabla" class="table   table-bordered">
                <thead class='bg-primary text-while'>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Fecha de Creación</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->rol }}</td>

                            <td>{{ $user->created_at }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('users.edit', $user) }}"
                                        class="btn btn-sm btn-warning text-white text-uppercase me-1">
                                        <i class='fa fa-edit'></i> Edit
                                    </a>
                                    <button type='button' class="btn btn-danger deleteCategoryBtn"
                                        value="{{ $user->id . '+' . $user->name }}">
                                        <i class='fa fa-trash'></i> Delete
                                    </button>


                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ url('panel/delete-users') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirmar Eliminacion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="user_delete_id" id="user_id">
                        <label id='lbnombre' for="lbnombre"></label>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">eliminar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@section('js')
    <script src="{{ asset('tabla.js') }}"></script>

    <script>
        var p = document.getElementById('lbnombre');
        $(document).ready(function() {

            $('.deleteCategoryBtn').click(function(e) {
                e.preventDefault();
                var user_id = $(this).val();
                var limite = "+"
                var lista = user_id.split(limite)
                $('#user_id').val(lista[0])
                //$('#lbnombre').val(lista[1])
                p.innerHTML = 'Estas seguro que quieres eliminar a ' + lista[1] + '?'
                $('#deleteModal').modal('show')
            });
        });
    </script>

@endsection

@endsection
