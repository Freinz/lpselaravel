<li class="pc-item pc-caption">
    <label>Navigation</label>
</li>
<!-- 
<li class="pc-item">
    <a href="/widget/w_statistics" class="pc-link">
        <span class="pc-micon">
            <i class="ph-duotone ph-projector-screen-chart"></i>
        </span>
        <span class="pc-mtext">Statistics</span>
    </a>
</li> -->

<li class="pc-item pc-hasmenu">
    <a href="#!" class="pc-link"><span class="pc-micon">
            <i class="ph-duotone ph-database"></i></span><span class="pc-mtext">Management Data</span><span
            class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
    <ul class="pc-submenu">
        <li class="pc-item"><a class="pc-link" href="{{ url('show_data') }}">Tampilkan Data</a></li>
        <li class="pc-item"><a class="pc-link" href="{{ url('import_data') }}">Kirim Data</a></li>
        <li class="pc-item"><a class="pc-link" href="{{ url('revisi_data') }}">Revisi Data</a></li>

    </ul>
</li>
<li class="pc-item">
    <a class="pc-link" href="{{ url('lihat_profil') }}">
        <span class="pc-micon"><i class="ph-duotone ph-identification-card"></i></span>
        <span class="pc-mtext">Data User</span>
    </a>
</li>

