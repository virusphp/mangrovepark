@extends('layouts.backend.main')

@section('title', 'MyBlog | Users')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blog
        <small>Display All Users</small>
      </h1>
      <ol class="breadcrumb">
        <li>
        	<a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
        </li>
        <li><a href="{{ route('backend.users.index') }}">Users</a></li>
        <li class="active">All Users</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
            	<div class="box-header clearfix">
            		<div class="pull-left">
            			<a href="{{ route('backend.users.create') }}" class="btn btn-success">Add New</a>
            		</div>
            		<div class="pull-right">
            			
            		</div>
            	</div>
              <!-- /.box-header -->
              <div class="box-body ">
              	@include('backend.partials.message')

	              @if(! $users->count())
	              	<div class="alert alert-danger">
	              		<strong>No Recort Found</strong>
	              	</div>
	              @else
						      @include('backend.users.table')
	              @endif
              </div>
              <!-- /.box-body -->
	          	<div class="box-footer clearfix">
	          		<div class="pull-left">
	          			<ul class="pagination no-margin">
	          				{{ $users->appends( Request::query() )->render() }}
	          			</ul>
	          		</div>
	          		<div class="pull-right">
	          			<small>{{ $usersCount }} {{ str_plural('item', $usersCount) }}</small>
	          		</div>
	          	</div>
            </div>
            <!-- /.box -->
          </div>
        </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
@endsection

@section('script')
	<script type="text/javascript">
		$('ul.pagination').addClass('no-margin pagination-sm');
	</script>
@endsection