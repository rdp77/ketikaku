@extends('layouts_frontend._main_frontend')

@section('extra_style')
{{-- <link href="{{ asset('assets/css/profile.css') }}" rel="stylesheet"> --}}
{{-- <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"> --}}
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="{{ asset('assets/dist/starrr.css') }}">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">


<style type="text/css">
    .nav-tabs>li.active>a:hover{color:#555;cursor:default;background-color:red;border-bottom-color:transparent}
    .nav-tabs{
        border-bottom:none;
    }
    .nav-tabs>li.active>a{
        color: #555;
        cursor: default;
        background-color: transparent !important;
        border-bottom: 0px solid #ddd !important;
        border-bottom-color: transparent !important;
    }
    
    h3,h6{
        font-weight: 300;
    }
</style>
@endsection

@section('content')
<section class="single">
            <div class="container-fluid">
                    <div class="col-md-12">
                        <div class="bg">
                        </div>
                    </div>
                    
            </div>
            <div class="container">
                    <div class="line thin"></div>
                    <div class="col-md-1 sidebar" id="sidebar">
                        <aside>
                           
                        </aside>
                    </div>
                    <div class="col-md-10">
                        <article class="article main-article">
                            <header>
                                <p><strong>Terms of Service</strong></p>
                                <p>Selamat datang di ketikaku.com. Website ini dimiliki dan dioperasikan oleh Aksara Satmika. Dengan menggunakan dan atau mengunjungi website ketikaku.com dan interface lainnya yang berasosiasi, Anda menyetujui persyaratan pelayanan. Jika Anda tidak setuju terhadap persyaratan yang akan disebutkan di bawah ini, Anda dipersilahkan untuk tidak menggunakan layanan ini.</p>
                                <p><strong>Kebijakan Privasi</strong></p>
                                <p>Aksara Satmika (&ldquo;Kami&rdquo;) menghargai privasi dari para pengguna ketikaku.com. Ketika Anda mengakses layanan kami, Anda menyetujui kebijakan privasi ini.</p>
                                <p><strong>Pendaftaran</strong></p>
                                <p>Bagian-bagian tertentu dari situs ini dapat diakses tanpa mendaftar. Namun pendaftaran diperlukan bagi pengguna untuk mengunggah, membaca naskah tertentu, berlangganan<em>, </em>menilai, dan/atau mengomentari Naskah.</p>
                                <p>Jika Anda adalah pengguna yang mendaftar untuk mendapatkan layanan, Anda dapat membuat akun personal yang memiliki <em>username </em>unik serta <em>password </em>untuk mengakses layanan dan menerima pesan dari Kami dan atau pengguna lainnya. Anda harus berusia minimal 13 tahun dan membuat profil pengguna yang berisi tentang informasi Anda. Anda bertanggung jawab terhadap kerahasiaan password. Anda menyetujui untuk menginfokan segera kepada kami jika terjadi penggunaan ilegal pada akun Anda atau pelanggaran keamanan lainnya. Kami bertanggung jawab terhadap kerugian atau kerusakan yang diakibatkan penggunaan ilegal dari akun atau pun password Anda.</p>
                                <p><strong>Penggunaan</strong></p>
                                <p>Situs ini adalah milik dan dimiliki oleh Aksara Satmika atau pemberi lisensinya dan dilindungi oleh hak cipta, merek dagang, dan undang-undang lain dari Indonesia dan negara-negara lain. Untuk penggunaan pribadi dan nonkomersial, Anda dapat menampilkan, menyalin, mengunduh, dan mencetak versi salinan naskah yang ada pada situs ini tanpa mengubah, menghapus atau menghilangkan hak cipta, merek dagang, atau pemberitahuan kepemilikan lainnya pada naskah.</p>
                                <p><strong>Naskah</strong></p>
                                <p>Anda bertanggung jawab terhadap naskah yang Anda unggah, termasuk legalitas, orisinalitas, dan hak cipta naskah tersebut. JIka menurut kami naskah menimbulan suatu risiko hukum, kami berhak untuk menghapus naskah tersebut dari situs tanpa pemberitahuan sebelumnya kepada Anda.</p>
                                <p>Apabila ada pihak/penerbit lain yang berminat menerbitkan naskah pada situs ini, penulis/pemilik naskah wajib melakukan konfirmasi kepada Aksara Satmika terlebih dahulu.</p>
                                <p><strong>Batasan</strong></p>
                                <p>Anda menyetujui untuk tidak melakukan batasan-batasan di bawah ini dalam kondisi apa pun:</p>
                                <ul>
                                <li>Memberikan informasi yang bersifat kasar, mengancam, cabul, memfitnah, dan atau SARA;</li>
                                <li>Menggunakan layanan untuk tujuan ilegal atau mempromosikan kegiatan ilegal;</li>
                                <li>Berbuat kasar, menyakiti, atau melecehkan orang atau grup;</li>
                                <li>Menggunakan akun orang lain tanpa izin;</li>
                                <li>Meniru orang lain atau memalsukan identitas yang dapat mengarah ke menyesatkan, membingungkan, dan menipu orang lain;</li>
                                <li>Menggunakan situs ini untuk tujuan apa pun yang melanggar hukum;</li>
                                <li>Mengirimkan materi apa pun yang tidak Anda miliki hak hukumnya;</li>
                                <li>Mengiklankan atau terlibat dalam bentul pemasaran apa pun pada situs ini untuk pemasaran atau tujuan komersial lainnya tanpa seizin Aksara Satmika, atau menggunakan situs ini untuk mengirimkan atau menyebarkan <em>spam;</em></li>
                                <li>Mengirimkan link yang mengandung virus atau kode komputer berbahaya lainnya yang dapat merusak, mengjancurkan, atau mengganggu berfungsinya perangkat lunak, perangkat keras, atau sistem;</li>
                                <li>Melakukan tindakan apa pun yang dapat mengganggu kerja, merusak, mengganggu keamanan, dan atau mengganggu situs serta jaringan yang terhubung.</li>
                                </ul>
                                <p><strong>Pemantauan dan Pengakhiran</strong></p>
                                <p>Kami memantau seluruh kegiatan pada situs ini. Apabila ditemukan suatu kegiatan atau konten yang dikirim penguna melanggar kebijakan, kami akan mengambil tindakan apa pun yang dianggap pantas, termasuk menghapus narasi atau mengakhiri akses pengguna ke situs ini. Kami mempunyai hak untuk menghentikan akses pengguna ke situs ini jika pengguna tercatat melakukan pelanggaran berulang kali.</p>
                                <p><strong>Hak Kekayaan Intelektual Pihak Lain</strong></p>
                                <p>Kami menghormati hak-hak kekayaan intelektual pihak lain, dan kami meminta pengguna kami melakukan hal yang sama. Jika Anda berpikir karya Anda telah disalin dengan cara yang merupakan pelanggaran hak cipta, Anda dapat memberitahukan kepada kami melalui email di bawah ini:</p>
                                <p>admin@ketikaku.com</p>
                                <p>&nbsp;</p>
                                <p>Terima kasih sudah mengunjungi situs kami.</p>
                                <p>Aksara Satmika</p>
                            </header>
                        </article>
                    </div>
                    <div class="col-md-12">
                     
                        <div class="line thin"></div>
                      
                </div>
            </div>
            </div>

        </section>
@endsection

@section('extra_scripts')
<script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/dist/starrr.js') }}"></script>
<script type="text/javascript">

   

</script>
@endsection
