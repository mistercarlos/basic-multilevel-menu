<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="{{asset('bootstrap-4.5.3/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('fa-5.15/css/all.css')}}">
	<link rel="stylesheet" href="{{asset('styles/animate.min.css')}}">
	<link rel="stylesheet" href="{{asset('styles/main.css')}}">
</head>

<body class="text-center">
	<div class="auth-content d-flex flex-column align-items-center justify-content-center" style="height: 100vh">

        <div style="width: 40%;" class="shadow-lg">
            <div class="col-lg-12 zoomin-anim bg-light rounded border-0 p-4">

                    @if ($errors->any())
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li><strong>{{ $error }}</strong></li>
                                @endforeach
                            </ul>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif


                    @if (session()->has('status'))
                        @if (session('status'))
                            <script>
                                var url = "{{ route('home') }}"
                                setTimeout(function(){ window.location = url; }, 3000);
                            </script>

                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{session('message')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @else
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{session('message')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                    @endif

                <form method="POST" action="{{ route('login') }}" >
                    @csrf
                    <div class="bg-darkblue rounded m-3">
                        <span class="navbar-brand font-pacifico text-white p-2">Test Login Interface</span>
                    </div>
                    <div class="form-group">
                        <label for="email" class="sr-only">Email</label>
                        <input type="email" id="email" name="email" class="form-control mb-2" placeholder="Enter your email" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="password" class="sr-only">Mot de passe</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
                    </div>
                    <button class="btn bg-lightblue border-0" type="submit" name="submit">Login</button>
                </form>
            </div>
        </div>

		<div class="row mt-3">
			<div class="col-12 text-black">
				<span class="font-pacifico">Test App</span> <span class="font-italic ml-2">Copyright 2021, All rights reserved</span>
			</div>
		</div>
	</div>

	<script src="{{asset('bootstrap-4.5.3/js/jquery-3.2.1.slim.min.js')}}"></script>
	<script src="{{asset('bootstrap-4.5.3/js/bootstrap.min.js')}}"></script>
</body>

</html>