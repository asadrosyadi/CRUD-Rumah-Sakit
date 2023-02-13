<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top no-margin">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Rumah Sakit
              </a>
              
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::guest())
                          <li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                  file <span class="caret"></span>
                              </a>

                              <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Register</a></li>
                              </ul>
                          </li>



                        @else
                            <li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    File <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <u>{{ Auth::user()->nm_petugas }}</u> Logout
                                        </a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>

                            <li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    master <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                  <li><a href="/petugas/">Data Petugas</a></li>
                                  <li><a href="/pasien/">Data Pasien</a></li>
                                  <li><a href="/dokter/">Data Dokter</a></li>
                                  <li><a href="/tindakan/">Data Tindakan</a></li>
                                  <li><a href="/obat/">Data Obat</a></li>
                                </ul>
                            </li>

                            <li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    transaksi <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                  <li><a href="/pendaftaran/">Pendaftaran</a></li>
                                  <li><a href="/rawatpasien/">Rawat Pasien</a></li>
                                  <li><a href="/rawattindakan/">Rawat Tindakan</a></li>
                                  <li><a href="/rawatobat/">Rawat Obat</a></li>
                                </ul>
                            </li>

                            <li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Laporan <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                  <li><a href="/laporantindakan/">Laporan Tindakan</a></li>
                                  <li><a href="/laporandokter/">Laporan Dokter</a></li>
                                  <li><a href="/laporanrawatobat/">Laporan Rawat Obat</a></li>
                                  <li><a href="/laporanpetugas/">Laporan Petugas</a></li>
                                  <li><a href="/laporanpasien/">Laporan Pasien</a></li>
<li><a href="/laporanrawattindakan/">Laporan Rawat Tindakan</a></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                                    Fungsi Backup <span class="caret"></span>
                                                                </a>
                                
                                                                <ul class="dropdown-menu" role="menu">
                                                                  <li><a href="/backups/">Backups dan Restore</a></li>
                                                                </ul>
                                                            </li>


                        @endif
                    </ul>

                </div>
            </div>
        </nav>

        @yield('content')
        <nav class="navbar navbar-default no-margin center">
            <h5>copyright &copy 2022 As'ad Rosyadi</h5>
     </nav>
    
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
