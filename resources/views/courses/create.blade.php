<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kursus | KursusKu</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar">
    <div class="container nav-inner">
        <a href="{{ route('home') }}" class="brand">
            <span class="brand-mark">K</span>
            <span>Kursus<span class="brand-gold">Ku</span></span>
        </a>

        <a href="{{ route('courses.index') }}" class="nav-button">
            Kembali ke Daftar Kursus
        </a>
    </div>
</nav>

<section class="course-management">
    <div class="container">

        <div class="text-center mb-5">
            <span class="section-kicker">KURSUSKU MANAGEMENT</span>
            <h1 class="mt-3" style="font-family: Georgia, serif; color: #49382e;">
                Tambah Kursus
            </h1>
            <p style="color: #746357;">
                Lengkapi formulir berikut untuk menambahkan kursus baru.
            </p>
        </div>

        <form action="{{ route('courses.store') }}"
              method="POST"
              class="course-form">

            @csrf

            <div class="row g-4">

                <div class="col-md-6">
                    <label class="form-label">Kode Kursus</label>
                    <input type="text"
                           name="code"
                           class="form-control @error('code') is-invalid @enderror"
                           value="{{ old('code') }}"
                           placeholder="Contoh: WEB-101">

                    @error('code')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Nama Kursus</label>
                    <input type="text"
                           name="name"
                           class="form-control @error('name') is-invalid @enderror"
                           value="{{ old('name') }}"
                           placeholder="Masukkan nama kursus">

                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="description"
                              class="form-control @error('description') is-invalid @enderror"
                              rows="4"
                              placeholder="Tuliskan deskripsi kursus">{{ old('description') }}</textarea>

                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Biaya Kursus (Rp)</label>
                    <input type="number"
                           name="fee"
                           class="form-control @error('fee') is-invalid @enderror"
                           value="{{ old('fee') }}"
                           min="0"
                           placeholder="Contoh: 300000">

                    @error('fee')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Kuota Peserta</label>
                    <input type="number"
                           name="quota"
                           class="form-control @error('quota') is-invalid @enderror"
                           value="{{ old('quota', 20) }}"
                           min="1"
                           max="500"
                           placeholder="Contoh: 25">

                    @error('quota')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Tanggal Mulai</label>
                    <input type="date"
                           name="start_date"
                           class="form-control @error('start_date') is-invalid @enderror"
                           value="{{ old('start_date') }}">

                    @error('start_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Status Kursus</label>
                    <select name="status"
                            class="form-select @error('status') is-invalid @enderror">

                        <option value="">Pilih Status</option>
                        <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="open" {{ old('status') == 'open' ? 'selected' : '' }}>Open</option>
                        <option value="closed" {{ old('status') == 'closed' ? 'selected' : '' }}>Closed</option>
                    </select>

                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 d-flex flex-wrap gap-3 mt-4">
                    <button type="submit" class="course-button">
                        Simpan Kursus
                    </button>

                    <a href="{{ route('courses.index') }}"
                       class="btn btn-outline-secondary rounded-3 px-4 py-3">
                        Batal
                    </a>
                </div>

            </div>
        </form>

    </div>
</section>

<footer class="footer">
    <div class="container footer-inner">
        <strong>KursusKu</strong>
        <p>© {{ date('Y') }} KursusKu. All Rights Reserved.</p>
    </div>
</footer>

</body>
</html>
