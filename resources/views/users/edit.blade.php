@extends('layouts.app')
@section('content')
<form action="{{ route('users.edit', $user) }}" method="POST">
  @csrf
  @include('users._form', ['isNewRecord' => false])
</form>
@endsection