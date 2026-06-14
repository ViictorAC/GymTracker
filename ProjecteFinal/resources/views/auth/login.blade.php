<x-guest-layout>
    <div class="container min-vh-100 d-flex align-items-center justify-content-center">
        <div class="card shadow" style="width: 100%; max-width: 420px;">
            <div class="card-body p-4">

                <h4 class="card-title text-center mb-4 fw-bold">GymTracker</h4>

                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email') }}" required autofocus>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Contrasenya</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                               required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" name="remember" class="form-check-input" id="remember">
                        <label class="form-check-label" for="remember">Recorda'm</label>
                    </div>

                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </div>

                    <div class="text-center">
                        <a href="{{ route('register') }}" class="text-decoration-none">
                            No tens compte? Registra't
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-guest-layout>