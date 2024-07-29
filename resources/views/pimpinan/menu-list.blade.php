<li class="pc-item pc-caption">
    <label>Navigation</label>
</li>



<li class="pc-item pc-hasmenu">
    <a href="#!" class="pc-link"><span class="pc-micon">
            <i class="ph-duotone ph-database"></i></span><span class="pc-mtext">Management Data</span><span
            class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
    <ul class="pc-submenu">
        <li class="pc-item"><a class="pc-link" href="{{ url('show_data') }}">Tampilkan Data</a></li>
        <li class="pc-item"><a class="pc-link" href="{{ url('approver_data') }}">Setujui Data</a></li>

    </ul>
</li>

<li class="pc-item pc-hasmenu">
    <a href="#!" class="pc-link"><span class="pc-micon">
            <i class="ph-duotone ph-gear"></i></span><span class="pc-mtext">Input Data</span><span
            class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
    <ul class="pc-submenu">
        <li class="pc-item"><a class="pc-link" href="{{ url('input_kategori') }}">Input Kategori</a></li>
        <li class="pc-item"><a class="pc-link" href="{{ url('input_subkategori') }}">Input Sub Kategori</a></li>
        <li class="pc-item"><a class="pc-link" href="{{ url('input_namakota') }}">Input Nama Kota</a></li>
    </ul>
</li>

<li class="pc-item">
    <a class="pc-link" href="{{ url('lihat_profil_pimpinan') }}">
        <span class="pc-micon"><i class="ph-duotone ph-identification-card"></i></span>
        <span class="pc-mtext">Data User</span>
    </a>
</li>


<li class="pc-item">
    <a href="{{ url('input_user_operator') }}" class="pc-link">
        <span class="pc-micon">
            <i class="ph-duotone ph-user-plus"></i> 
            <!-- photspor icon -->
        </span>
        <span class="pc-mtext">Pembuatan Akun Operator</span>
    </a>
</li>

