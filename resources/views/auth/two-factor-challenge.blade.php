<x-layout title="Tantangan Autentikasi 2FA">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-sm">
                    <div class="card-body p-4 p-md-5">
                        <h1 class="fw-bold mb-4 text-center">Autentikasi 2FA</h1>

                        <p class="text-muted mb-4">
                            Silakan masukkan kode autentikator yang dihasilkan oleh aplikasi autentikator Anda atau kode pemulihan.
                        </p>

                        <form method="POST" action="{{ route('two-factor.login') }}">
                            @csrf

                            <div class="mb-3" id="code-group">
                                <label for="code" class="form-label">Kode Authenticator (6 Digit)</label>
                                <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" autofocus autocomplete="one-time-code">
                                @error('code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 d-none" id="recovery-group">
                                <label for="recovery_code" class="form-label">Kode Pemulihan (Recovery Code)</label>
                                <input id="recovery_code" type="text" class="form-control @error('recovery_code') is-invalid @enderror" name="recovery_code" autocomplete="one-time-code">
                                @error('recovery_code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 text-end">
                                <button type="button" class="btn btn-link p-0 text-decoration-none small" id="toggle-recovery" onclick="toggleRecovery()">
                                    Gunakan Kode Pemulihan
                                </button>
                            </div>

                            <button type="submit" class="btn w-100 py-2" style="background-color: var(--biru-utama); color: white;">
                                Masuk
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleRecovery() {
            const codeGroup = document.getElementById('code-group');
            const recoveryGroup = document.getElementById('recovery-group');
            const toggleBtn = document.getElementById('toggle-recovery');
            const codeInput = document.getElementById('code');
            const recoveryInput = document.getElementById('recovery_code');

            if (codeGroup.classList.contains('d-none')) {
                codeGroup.classList.remove('d-none');
                recoveryGroup.classList.add('d-none');
                toggleBtn.innerText = 'Gunakan Kode Pemulihan';
                recoveryInput.value = '';
                codeInput.focus();
            } else {
                codeGroup.classList.add('d-none');
                recoveryGroup.classList.remove('d-none');
                toggleBtn.innerText = 'Gunakan Kode Authenticator';
                codeInput.value = '';
                recoveryInput.focus();
            }
        }
    </script>
</x-layout>