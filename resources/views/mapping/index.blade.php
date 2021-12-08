@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-lg-12">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Group</th>
          <th>Date</th>
          <th>Time</th>
          <th>Key</th>
          <th>Tgl Input</th>
          <th>SDP L6</th>
          <th>LP L6</th>
          <th>SDP L7</th>
          <th>LP L7</th>
          <th>SDP L8</th>
          <th>LP L8</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($mappings as $mapping)
        <tr>
          <td>{{ $mapping->group }}</td>
          <td>{{ $mapping->date }}</td>
          <td>{{ $mapping->time }}</td>
          <td>{{ $mapping->key }}</td>
          <td>{{ $mapping->tgl_input }}</td>
          <td>{{ $mapping->sdp_l6 ?? '-' }}</td>
          <td>{{ $mapping->lp_l6 ?? '-' }}</td>
          <td>{{ $mapping->sdp_l7 ?? '-' }}</td>
          <td>{{ $mapping->lp_l7 ?? '-' }}</td>
          <td>{{ $mapping->sdp_l8 ?? '-' }}</td>
          <td>{{ $mapping->lp_l8 ?? '-' }}</td>
        </tr>
        @empty
        <tr>
          <td colspan="10">No data found</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
  <form action="{{ route('mapping.import') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <button type="submit" class="btn btn-primary">Import</button>
  </form>

  {{ $mappings->links() }}
</div>
@endsection