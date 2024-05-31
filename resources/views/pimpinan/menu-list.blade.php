<li class="pc-item pc-caption">
    <label>Navigation</label>
</li>

<li class="pc-item">
    <a href="/widget/w_statistics" class="pc-link">
        <span class="pc-micon">
            <i class="ph-duotone ph-projector-screen-chart"></i>
        </span>
        <span class="pc-mtext">Statistics</span>
    </a>
</li>

<li class="pc-item pc-hasmenu">
    <a href="#!" class="pc-link"><span class="pc-micon">
            <i class="ph-duotone ph-database"></i></span><span class="pc-mtext">Management Data</span><span
            class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
    <ul class="pc-submenu">
        <li class="pc-item"><a class="pc-link" href="{{ url('show_data') }}">Show Data</a></li>
        <li class="pc-item"><a class="pc-link" href="{{ url('approver_data') }}">Approve Data</a></li>

    </ul>
</li>

<li class="pc-item">
    <a href="{{ url ('show_form') }}" class="pc-link">
        <span class="pc-micon">
            <i class="ph-duotone ph-projector-screen-chart"></i>
        </span>
        <span class="pc-mtext">Approve Form</span>
    </a>
</li>
