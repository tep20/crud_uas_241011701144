@extends('layouts.app')
@section('title', 'Dashboard Admin')

@section('content')
<div class="container py-5">
    
    <div class="row align-items-center mb-4">
        <div class="col-md-6">
            <h2 class="fw-bold text-dark mb-1">
                <i class="bi bi-grid-fill text-warning"></i> Dashboard Produk
            </h2>
            <p class="text-muted mb-0">Kelola katalog produk TS Luxury dengan mudah.</p>
        </div>
        <div class="col-md-6 text-md-end mt-3 mt-md-0">
            <button class="btn btn-dark shadow-sm px-4" id="btnAdd">
                <i class="bi bi-plus-lg me-1"></i> Tambah Produk
            </button>
            <a href="{{ route('katalog.all.pdf') }}" class="btn btn-outline-danger shadow-sm px-4 ms-2">
                <i class="bi bi-file-pdf me-1"></i> Report PDF
            </a>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-body p-0">
            <div class="table-responsive p-4">
                <table class="table table-hover align-middle w-100" id="katalogTable">
                    <thead class="bg-light text-secondary">
                        <tr style="border-bottom: 2px solid #eee;">
                            <th class="py-3 ps-3">Kode</th>
                            <th class="py-3">Info Produk</th>
                            <th class="py-3">Kategori</th>
                            <th class="py-3">Harga & Stok</th>
                            <th class="py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="katalogModal" tabindex="-1" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-header bg-dark text-white pe-4 ps-4 py-3">
                <h5 class="modal-title fw-bold" id="modalTitle">
                    <i class="bi bi-box-seam me-2"></i> Form Produk
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            
            <form id="katalogForm" enctype="multipart/form-data">
                <div class="modal-body p-4">
                    <input type="hidden" id="id" name="id">

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="id_produk" name="id_produk" placeholder="Kode" required>
                                <label for="id_produk">Kode Produk (ID)</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select class="form-select" id="kategori_produk" name="kategori_produk" required>
                                    <option value="" disabled selected>Pilih...</option>
                                    <option value="Tas">Tas</option>
                                    <option value="Sepatu">Sepatu</option>
                                    <option value="Aksesoris">Aksesoris</option>
                                    <option value="Elektronik">Elektronik</option>
                                </select>
                                <label for="kategori_produk">Kategori</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Nama" required>
                        <label for="nama_produk">Nama Produk</label>
                    </div>

                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="deskripsi_produk" name="deskripsi_produk" style="height: 100px" placeholder="Deskripsi" required></textarea>
                        <label for="deskripsi_produk">Deskripsi Produk</label>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-text bg-light fw-bold">Rp</span>
                                <div class="form-floating flex-grow-1">
                                    <input type="number" class="form-control" id="harga_produk" name="harga_produk" placeholder="0" required>
                                    <label for="harga_produk">Harga</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="stok_produk" name="stok_produk" placeholder="0" required>
                                <label for="stok_produk">Stok</label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-2">
                        <label for="gambar_produk" class="form-label text-muted small fw-bold">GAMBAR PRODUK</label>
                        <input type="file" class="form-control" id="gambar_produk" name="gambar_produk" accept="image/*">
                        <small class="text-muted d-block mt-1 fst-italic">*Kosongkan jika tidak ingin mengubah gambar.</small>
                    </div>
                </div>

                <div class="modal-footer bg-light px-4 py-3">
                    <button type="button" class="btn btn-outline-secondary rounded-pill px-4" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-dark rounded-pill px-4" id="saveBtn">
                        <i class="bi bi-save me-1"></i> Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    
    // 1. Inisialisasi DataTable dengan Styling Bootstrap 5
    var table = $('#katalogTable').DataTable({
        ajax: "{{ route('admin.katalog.data') }}",
        processing: true,
        serverSide: false,
        language: {
            url: "//cdn.datatables.net/plug-ins/1.13.4/i18n/id.json" // Bahasa Indonesia
        },
        columns: [
            { 
                data: 'id_produk',
                className: 'fw-bold text-secondary ps-3'
            },
            { 
                // Kolom Gabungan Gambar + Nama agar lebih cantik
                data: null,
                render: function(data, type, row) {
                    var imgUrl = row.gambar_produk 
                        ? "{{ asset('assets/images') }}/" + row.gambar_produk 
                        : "https://via.placeholder.com/60?text=No+Img";
                    
                    return `
                        <div class="d-flex align-items-center">
                            <img src="${imgUrl}" class="rounded-3 shadow-sm border" width="60" height="60" style="object-fit:cover;">
                            <div class="ms-3">
                                <div class="fw-bold text-dark">${row.nama_produk}</div>
                                <div class="small text-muted text-truncate" style="max-width: 200px;">${row.deskripsi_produk}</div>
                            </div>
                        </div>
                    `;
                }
            },
            { 
                data: 'kategori_produk',
                render: function(data) {
                    return `<span class="badge bg-light text-dark border px-3 py-2 rounded-pill">${data}</span>`;
                }
            },
            { 
                data: null,
                render: function(data, type, row) {
                    return `
                        <div class="fw-bold">Rp ${parseInt(row.harga_produk).toLocaleString('id-ID')}</div>
                        <div class="small text-muted">Stok: ${row.stok_produk} unit</div>
                    `;
                }
            },
            { 
                data: 'id',
                orderable: false,
                className: 'text-center',
                render: function(data, type, row) {
                    return `
                        <div class="btn-group shadow-sm" role="group">
                            <button class="btn btn-sm btn-white border text-warning btnEdit" data-id="${row.id}" title="Edit">
                                <i class="bi bi-pencil-fill"></i>
                            </button>
                            <button class="btn btn-sm btn-white border text-danger btnDelete" data-id="${row.id}" title="Hapus">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </div>
                    `;
                }
            }
        ]
    });

    // 2. Tombol Tambah
    $('#btnAdd').click(function(){
        $('#katalogForm')[0].reset();
        $('#id').val('');
        $('#modalTitle').html('<i class="bi bi-plus-circle me-2"></i> Tambah Produk Baru');
        $('#katalogModal').modal('show');
    });

    // 3. Submit Form (Store/Update)
    $('#katalogForm').submit(function(e){
        e.preventDefault();
        
        var formData = new FormData(this);
        var id = $('#id').val();
        var url = id ? "{{ url('/admin/katalog/update') }}/" + id : "{{ route('admin.katalog.store') }}";
        
        // Efek Loading Tombol
        var btn = $('#saveBtn');
        var originalText = btn.html();
        btn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-2"></span> Menyimpan...');

        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response){
                $('#katalogModal').modal('hide');
                table.ajax.reload();
                toastr.success(response.message || 'Data berhasil disimpan!');
            },
            error: function(xhr){
                var errors = xhr.responseJSON ? xhr.responseJSON.errors : null;
                var msg = 'Terjadi kesalahan.';
                if(errors) msg = Object.values(errors)[0][0];
                toastr.error(msg);
            },
            complete: function() {
                btn.prop('disabled', false).html(originalText);
            }
        });
    });

    // 4. Tombol Edit
    $(document).on('click', '.btnEdit', function() {
        var id = $(this).data('id');
        $.get("{{ url('/admin/katalog/edit') }}/" + id, function(data){
            $('#id').val(data.id);
            $('#id_produk').val(data.id_produk);
            $('#nama_produk').val(data.nama_produk);
            $('#kategori_produk').val(data.kategori_produk);
            $('#deskripsi_produk').val(data.deskripsi_produk);
            $('#harga_produk').val(data.harga_produk);
            $('#stok_produk').val(data.stok_produk);
            $('#gambar_produk').val(''); 

            $('#modalTitle').html('<i class="bi bi-pencil-square me-2"></i> Edit Produk');
            $('#katalogModal').modal('show');
        }).fail(function(){
            toastr.error('Gagal mengambil data.');
        });
    });

    // 5. Tombol Hapus
    $(document).on('click', '.btnDelete', function() {
        var id = $(this).data('id');
        // Custom Confirm menggunakan Toastr/Native
        if(confirm('Apakah Anda yakin ingin menghapus produk ini?')) {
            $.ajax({
                url: "{{ url('/admin/katalog/delete') }}/" + id,
                type: 'DELETE', // Pastikan Route DELETE aktif
                data: { _token: "{{ csrf_token() }}" },
                success: function(response){
                    table.ajax.reload();
                    toastr.success('Produk berhasil dihapus.');
                },
                error: function(){
                    toastr.error('Gagal menghapus data.');
                }
            });
        }
    });

});
</script>
@endsection