@extends('layouts.backend.main')

@section('title', 'MyBlog | Delete Confirmation')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User
        <small>Delete Confirmation</small>
      </h1>
      <ol class="breadcrumb">
        <li>
        	<a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
        </li>
        <li><a href="{{ route('backend.users.index') }}">Users</a></li>
        <li class="active">Delete Confirmation</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          {!! Form::model($user, [
            'method' => 'DELETE', 
            'route'  => ['backend.users.destroy', $user->id],
          ]) !!}

        <div class="col-xs-9">
          <div class="box">
          <!-- /.box-header -->
            <div class="box-body ">
              <p>
                Kamu Memiliki spesifikasi user untuk di hapus :
              </p>
              <p>
                ID # {{ $user->id }} : {{ $user->name }}
              </p>
              <p>
                Apa kamu ingin menghapus user bersama konten nya?
              </p>
              <p>
                 <input type="radio" name="delete_option" value="delete" checked> Hapus semua Konten
              </p>
              <p>
                <input type="radio" name="delete_option" value="attribute"> Atribut konten ke:
                {!! Form::select('selected_user', $users, null) !!}
              </p>
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-danger">Confirm Delete</button>
              <a href="{{ route('backend.users.index') }}" class="btn btn-default">Batal</a>
            </div>
          </div>
        </div>

          {!! Form::close() !!}
        </div>

      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
@endsection
