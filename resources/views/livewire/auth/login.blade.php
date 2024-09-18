<div>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <h1 class="text-center text-primary m-0">Perumahan</h1>
                        <h2 class="text-center text-primary m-0">Indah</h2>
                    </div>
                    <h1 class="text-center">Login</h1>
                    <p class="mb-5 text-center">
                        Silahkan login untuk melanjutkan.
                    </p>
                    @if (session()->has('error'))
                        <div class="text-danger">{{ session('error') }}</div>
                    @endif
                    <form wire:submit.prevent="login">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" wire:model="email" id="email"
                                placeholder="Email" />
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('login')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" placeholder="Password"
                                wire:model="password" id="password" />
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            @error('password')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
                            Log in
                        </button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">
                            Belum punya Akun?
                            <a href="{{ route('register') }}" class="font-bold">Sign up</a>.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right"></div>
            </div>
        </div>
    </div>

</div>
