@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="flash-message">
      @if(Session::has('sucess'))
      <p class="alert alert-success">{{ Session::get('sucess') }}</p>
      @endif
    </div>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Password</th>
          <th>Key</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($users as $user)
        <tr>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->password }}</td>
          <td>{{ $user->key }}</td>
          <td>
            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-success">Edit</a>
            <a href="{{ route('users.show', $user->id) }}" class="btn btn-info">Show</a>
            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
              @csrf
              {{ method_field('DELETE') }}
              <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
            </form>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="5">No users found</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
  <form action="{{ route('user.import') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <a href="{{ route('users.create') }}" class="btn btn-primary">Tambah</a>
    <button type="submit" class="btn btn-primary">Import</button>
  </form>

  {{ $users->links() }}
</div>
@endsection

@push('script')
@if (Session::has('success'))
<script>
  alert("{{ Session::get('success') }}");
</script>
@endif
@endpush