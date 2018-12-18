
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
          <td>{{ $user['id'] }}</td>
          <td>{{ $user['nama'] }}</td>
          <td><?php echo $user['email']; ?></td>
          <td>
            <a href="/senarai-users/<?php echo $user['id']; ?>" class="btn btn-primary">EDIT</a>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>

  </div>
</div>

<h1></h1>

</div>
@endsection
