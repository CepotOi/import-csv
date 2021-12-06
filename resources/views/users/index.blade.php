<!doctype html>
<html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>Hello, world!</title>
  </head>

  <body>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="flash-message">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))
            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
            @endif
            @endforeach
          </div>
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($users as $user)
              <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->password }}</td>
              </tr>
              @empty
              <tr>
                <td colspan="3">No users found</td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
        <form action="{{ route('user.import') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <button type="submit" class="btn btn-primary">Import</button>
        </form>

        {{ $users->links() }}
      </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="{{ asset('js/app.js') }}">
    </script>

  </body>

</html>