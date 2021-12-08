@extends('layouts.app')
@section('content')
<form action="{{ route('users.store') }}" method="POST">
  @csrf
  @include('users._form', ['isNewRecord' => true])
</form>
@endsection