<div class="row">
  <div class="col-lg-6">
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
        value="{{ $user->name ?? old('name') }}" placeholder="Enter name">
      @error('name')
      <span class="invalid-feedback">
        <strong>{{ $message  }}</strong>
      </span>
      @enderror
    </div>
    <div class="form-group mt-3">
      <label for="email">Email</label>
      <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
        value="{{ $user->email ?? old('email') }}" placeholder="Enter email">
      @error('email')
      <span class="invalid-feedback">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
    <div class="form-group mt-3">
      <label for="password">Password</label>
      <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"
        placeholder="Enter password">
      @error('password')
      <span class="invalid-feedback">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary mt-3">Submit</button>
  </div>
</div>