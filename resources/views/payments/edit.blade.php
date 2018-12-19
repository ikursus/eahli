@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Payment') }}</div>

                <div class="card-body">
                  <form method="POST" action="/payments/{{ $payment->id }}">
                      @csrf
                      @method('PATCH')

                      <div class="form-group row">
                          <label for="user_id" class="col-md-4 col-form-label text-md-right">{{ __('User') }}</label>

                          <div class="col-md-6">
                              <select id="user_id" class="form-control{{ $errors->has('user_id') ? ' is-invalid' : '' }}" name="user_id" autofocus>
                                @foreach ($users as $item)
                                <option value="{{ $item->id }}"{{ $payment->user_id == $item->id ? 'selected=selected' : ''}}>{{ $item->name }}</option>
                                @endforeach
                              </select>

                              @if ($errors->has('user_id'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('user_id') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="amount" class="col-md-4 col-form-label text-md-right">{{ __('Amount') }}</label>

                          <div class="col-md-6">
                              <input id="amount" type="text" class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}" name="amount" value="{{ $payment->amount }}"  autofocus>

                              @if ($errors->has('name'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('amount') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="due_date" class="col-md-4 col-form-label text-md-right">{{ __('Due date') }}</label>

                          <div class="col-md-6">
                              <input id="due_date" type="date" class="form-control{{ $errors->has('due_date') ? ' is-invalid' : '' }}" name="due_date" value="{{ $payment->due_date }}"  autofocus>

                              @if ($errors->has('due_date'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('due_date') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

                          <div class="col-md-6">
                              <select id="status" class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" name="status" autofocus>
                                <option value="paid"{{ $payment->status == 'paid' ? 'selected=selected' : ''}}>Paid</option>
                                <option value="pending"{{ $payment->status == 'pending' ? 'selected=selected' : ''}}>Pending</option>
                              </select>

                              @if ($errors->has('status'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('status') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group row mb-0">
                          <div class="col-md-8 offset-md-4">
                              <a href="/payments" class="btn btn-secondary">
                                BACK
                              </a>
                              <button type="submit" class="btn btn-primary">
                                  {{ __('SAVE') }}
                              </button>
                          </div>
                      </div>

                  </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
