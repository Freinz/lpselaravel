@extends('layouts.main')

@section('title', 'Hubungi Kami')
@section('breadcrumb-item', 'Ui kit')

@section('breadcrumb-item-active', 'Hubungi Kami')

@section('css')
<style>
    .contact-map {
        width: 100%;
        height: 450px;
        border: 0;
    }
    .contact-info {
        margin-top: 20px;
    }
</style>
@endsection

@section('content')
    <!-- [ Main Content ] start -->
    <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.884882852999!2d114.589889!3d-3.313500!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f2.1!3m3!1m2!1s0x0%3A0x0!2zM8KwMTgnNDguNiJTIDExNMKwMzUnMjMuNiJF!5e0!3m2!1sen!2sid!4v1689227733984!5m2!1sen!2sid"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                            class="contact-map">
                        </iframe>
                    </div>
                    <div class="contact-info">
                        <div class="row">
                            <div class="col-md-4">
                                <h5>Alamat</h5>
                                <p>
                                Jalan. Jend. S. Parman No 44, Kel. Antasan Besar, Kec. Banjarmasin Tengah, Kota Banjarmasin, Kalimantan Selatan 70114
                                </p>
                            </div>
                            <div class="col-md-4">
                                <h5>Nomor Telpon</h5>
                                <p>0816 213 413 (Fakhruddin) <br>
                                0878 4192 5000 (Dody) <br>
                                0831 4192 6692 (Maulida)</p>
                            </div>
                            <div class="col-md-4">
                                <h5>Email Helpdesk</h5>
                                <p>helpdesk@lpse.kalselprov.go.id</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <h5>Jam Kerja</h5>
                                <p>Senin-Jum'at: 08.00 WITA - 16.00 WITA</p>
                                <h5>Istirahat :</h5>
                                <p>Senin - Kamis : 12.00 WITA - 13.30 WITA</p>
                                <p>Jum'at : 11.30 WITA - 13.30 WITA</p>
                            </div>

                            <div class="col-md-4">
                                <h5>Follow Us</h5>
                                <p>
                                    <h6>Instagram : <a href="https://www.instagram.com/lpse.kalsel/">@lpse.kalsel</a></h6>
                                    <h6>Twitter/X  : <a href="https://x.com/LPSEKALSEL">@LPSEKALSEL</a></h6>
                                </p>
                            </div>
                            <div class="col-md-4">
                                <h5>Website : </h5>
                                <p><a href="https://lpse.kalselprov.go.id/eproc4/">LPSE KALSEL</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ sample-page ] end -->
    </div>
    <!-- [ Main Content ] end -->
@endsection
