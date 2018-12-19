
@extends('layouts/app')

@section('content')

<div class="container">

<div class="card">

  <div class="card-header">
    Senarai Users
  </div>

  <div class="card-body">

    <p>
      <a href="/senarai-users/add" class="btn btn-primary">
        Tambah User
      </a>
    </p>

    <table class="table table-bordered table-striped">
      <thead>
        <th>ID</th>
        <th>NAMA</th>
        <th>EMAIL</th>
        <th>TINDAKAN</th>
      </thead>

      <tbody>
        @foreach( $senarai_users as $user )
        <tr>
          <td>{{ $user->id }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>
            <a href="/senarai-users/{{ $user->id }}" class="btn btn-primary">EDIT</a>

            <form method="post" action="/senarai-users/{{ $user->id }}">
              @csrf
              @method('delete')

              <!-- Button trigger modal -->
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{ $user->id }}">
                DELETE
              </button>

              <!-- Modal -->
              <div class="modal fade" id="modal-delete-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Pengesahan Delete</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Adakah anda bersetuju untuk hapuskan rekod user ID {{ $user->id }}?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Sah!</button>
                    </div>
                  </div>
                </div>
              </div>

            </form>

          </td>
        </tr>
      @endforeach
      </tbody>
    </table>

    {{ $senarai_users->links() }}

  </div>
</div>

<h1></h1>

</div>
@endsection
