<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Klinik Rawat Jalan</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="auth-page">
        <div class="auth-shell">
            <p class="auth-brand">Klinik Rawat Jalan</p>

            <div class="auth-card">
                <p class="auth-eyebrow">Sistem Informasi Klinik</p>
                <h1>Login</h1>
                <p class="auth-description">Masuk dengan akun yang sudah terdaftar</p>

                @if (session('success'))
                    <div class="auth-message is-success">{{ session('success') }}</div>
                @endif

                @if ($errors->any() && !old('name'))
                    <div class="auth-message">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('login.process') }}" method="POST" class="auth-form">
                    @csrf

                    <div class="field">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('name') ? '' : old('email') }}" required>
                    </div>

                    <div class="field">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                    </div>

                    <button type="submit" class="primary auth-submit">Masuk</button>
                </form>

                <details class="register-details" {{ old('name') ? 'open' : '' }}>
                    <summary>Belum punya akun? Buat akun</summary>

                    <form action="{{ route('register.process') }}" method="POST" class="auth-form register-form">
                        @csrf

                        @if ($errors->any() && old('name'))
                            <div class="auth-message">
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            </div>
                        @endif

                        <div class="field">
                            <label for="reg-name">Nama Lengkap</label>
                            <input type="text" id="reg-name" name="name" value="{{ old('name') }}" required>
                        </div>

                        <div class="field">
                            <label for="reg-email">Email</label>
                            <input type="email" id="reg-email" name="email" value="{{ old('name') ? old('email') : '' }}" required>
                        </div>

                        <div class="field">
                            <label for="reg-role">Role</label>
                            <select id="reg-role" name="role" required>
                                <option value="admin" @selected(old('role') === 'admin')>Admin</option>
                                <option value="petugas" @selected(old('role') === 'petugas')>Petugas</option>
                                <option value="dokter" @selected(old('role') === 'dokter')>Dokter</option>
                            </select>
                        </div>

                        <div class="field">
                            <label for="reg-password">Password</label>
                            <input type="password" id="reg-password" name="password" required>
                        </div>

                        <div class="field">
                            <label for="reg-password-confirm">Konfirmasi password</label>
                            <input type="password" id="reg-password-confirm" name="password_confirmation" required>
                        </div>

                        <button type="submit" class="secondary auth-submit">Buat akun</button>
                    </form>
                </details>
            </div>

            <p class="auth-footer">Klinik Rawat Jalan</p>
        </div>
    </div>
</body>
</html>