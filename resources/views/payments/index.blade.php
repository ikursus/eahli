@extends('layouts/app')

@section('content')

<div class="container">

<div class="card">

  <div class="card-header">
    Senarai Payments
  </div>

  <div class="card-body">

    <p>
      <a href="/payments/add" class="btn btn-primary">
        Tambah Payment
      </a>
    </p>

    <table class="table table-bordered table-striped">
      <thead>
        <th>ID</th>
        <th>NAMA</th>
        <th>AMOUNT</th>
        <th>DUE DATE</th>
        <th>STATUS</th>
        <th>TINDAKAN</th>
      </thead>

      <tbody>
        @foreach( $payments as $payment )
        <tr>
          <td>{{ $payment->id }}</td>
          <td>{{ $payment->user_id }}</td>
          <td>{{ $payment->amount }}</td>
          <td>{{ $payment->due_date }}</td>
          <td>{{ $payment->status }}</td>
          <td>
            <a href="/payments/{{ $payment->id }}" class="btn btn-primary">EDIT</a>

            <form method="post" action="/payments/{{ $payment->id }}">
              @csrf
              @method('delete')

              <!-- Button trigger modal -->
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{ $payment->id }}">
                DELETE
              </button>

              <!-- Modal -->
              <div class="modal fade" id="modal-delete-{{ $payment->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Pengesahan Delete</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Adakah anda bersetuju untuk hapuskan rekod ID {{ $payment->id }}?
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

    {{ $payments->links() }}

  </div>
</div>

<h1></h1>

</div>
@endsection
