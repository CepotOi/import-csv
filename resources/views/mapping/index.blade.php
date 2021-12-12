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
          <th>kwh1</th>
          <th>kwh2</th>
          <th>kwh3</th>
          <th>kwh4</th>
          <th>kwh5</th>
          <th>kwh6</th>
          <th>kwh7</th>
          <th>kwh8</th>
          <th>kwh9</th>
          <th>kwh10</th>
          <th>kwh11</th>
          <th>kwh12</th>
          <th>kwh13</th>
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
          <td>{{ $mapping->kwh1 ?? '-' }}</td>
          <td>{{ $mapping->kwh2 ?? '-' }}</td>
          <td>{{ $mapping->kwh3 ?? '-' }}</td>
          <td>{{ $mapping->kwh4 ?? '-' }}</td>
          <td>{{ $mapping->kwh5 ?? '-' }}</td>
          <td>{{ $mapping->kwh6 ?? '-' }}</td>
          <td>{{ $mapping->kwh7 ?? '-' }}</td>
          <td>{{ $mapping->kwh8 ?? '-' }}</td>
          <td>{{ $mapping->kwh9 ?? '-' }}</td>
          <td>{{ $mapping->kwh10 ?? '-' }}</td>
          <td>{{ $mapping->kwh11 ?? '-' }}</td>
          <td>{{ $mapping->kwh12 ?? '-' }}</td>
          <td>{{ $mapping->kwh13 ?? '-' }}</td>
        </tr>
        @empty
        <tr>
          <td colspan="18">No data found</td>
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