<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Catering App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="{{ asset('img/regisImg.jpg') }}" class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1 mt-5">
                    <form action="{{ route('register_proses') }}" method="POST">
                        @csrf
                        <h1>Register</h1>
                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="form3Example3">Nama Lengkap</label>
                            <input type="text"
                                class="form-control form-control-lg @error('name') is-invalid @enderror"
                                placeholder="Masukan nama lengkap" name="name" />
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="form3Example3">Email</label>
                            <input type="email"
                                class="form-control form-control-lg  @error('email') is-invalid @enderror"
                                placeholder="Masukan Email" name="email" />
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div data-mdb-input-init class="form-outline mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" id="form3Example4"
                                class="form-control form-control-lg  @error('password') is-invalid @enderror"
                                placeholder="Masukan password" name="password" />
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div data-mdb-input-init class="form-outline mb-3">
                            <label class="form-label">Role</label>
                            <select name="role" class="form-select form-select-lg mb-3" id="role" required>
                                <option value="admin">Admin</option>
                                <option value="seller">Seller</option>
                                <option value="customer">Customer</option>
                            </select>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                class="btn btn-success btn-lg"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">Register</button>
                            <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a
                                    href="{{ route('login') }}" class="link-danger">Login</a></p>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    @if ($message = Session::get('regis'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Register',
                text: '{{ $message }}',
            });
        </script>
    @endif
</body>

</html>
