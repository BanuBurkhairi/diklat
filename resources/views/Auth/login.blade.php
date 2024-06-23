<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Data Diklat BPS Kota Gunungsitoli</title>
    <link rel="icon" type="image/png" href="{{ asset('img/icon.png') }}">
    <link href="{{ asset('dist/css/tabler.min.css?1684106062') }}" rel="stylesheet" />
    <link href="{{ asset('dist/css/tabler-flags.min.css?1684106062') }}" rel="stylesheet" />
    <link href="{{ asset('dist/css/tabler-payments.min.css?1684106062') }}" rel="stylesheet" />
    <link href="{{ asset('dist/css/tabler-vendors.min.css?1684106062') }}" rel="stylesheet" />
    <link href="{{ asset('dist/css/demo.min.css?1684106062') }}" rel="stylesheet" />
    <style>
        @import url('https://rsms.me/inter/inter.css');
        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }
        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>
<body>
    <script src="{{ asset('dist/js/demo-theme.min.js?1684106062') }}"></script>

    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="text-center mb-4">
                <a href="." class="navbar-brand navbar-brand-autodark"><img src="{{ asset('img/brand.png') }}" height="72" alt=""></a>
            </div>
            <form class="card card-md" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="card-body p-4 text-center">
                    <div class="mb-3">
                        <select name="user_id" type="text" class="form-select" id="select-users" value="">
                            <option value="">--Pilih Pegawai--</option>
                            <option value="340017897">Muhammad Ervin Sugiar SST, M.Si.</option>
                            <option value="340057217">Syukur Rahmat Putra Selamat Zai, SST</option>
                            <option value="340014034">Totona Buulolo, S.E.</option>
                            <option value="340016376">Motani Zebua, S.E.</option>
                            <option value="340016375">Asran Lase, S.E.</option>
                            <option value="340054518">Herman Syukur Zebua, S.E.</option>
                            <option value="340054520">Idaman Jaya Zendrato, S.E.</option>
                            <option value="340057165">Nonifili Febrianty Harefa, SST, M.SM.</option>
                            <option value="340057445">Jurdkriswanti Lase, SST</option>
                            <option value="340057574">Rosmeyanna Daeli, SST</option>
                            <option value="340058186">Claudia Damaris Br Kaban, SST</option>
                            <option value="340059736">Rica Purnama Sari Saragi, S.Tr.Stat.</option>
                            <option value="340060555">Banu Burkhairi, S.Tr.Stat.</option>
                            <option value="340061087">Fitria Cahyaningtyas, A.Md.Kb.N</option>
                            <option value="340062043">Ruti Tryana Telaumbanua, S.Tr.Stat.</option>
                            <option value="340061798">Fitri Noor Hikmah, S.Tr.Stat.</option>
                            <option value="340062225">Rekha Novalina, A.Md.Stat.</option>
                            <option value="340062379">Bill Van Ricardo Zalukhu, S.Tr.Stat.</option>
                        </select>
                    </div>
                    <div class="input-group input-group-flat">
                        <input name="password" type="password" class="form-control"  placeholder="Masukkan NIP BPS (NIP Lama)"  autocomplete="off">
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-primary w-100">Masuk</button>
                </div>
                @if($errors->any())
                    <div class="alert alert-danger mt-3">
                        {{ $errors->first() }}
                    </div>                  
                @endif
            </form>
        </div>
    </div>

    <!-- Libs JS -->
    <script src="./dist/libs/nouislider/dist/nouislider.min.js?1684106062" defer></script>
    <script src="./dist/libs/litepicker/dist/litepicker.js?1684106062" defer></script>
    <script src="./dist/libs/tom-select/dist/js/tom-select.base.min.js?1684106062" defer></script>
    <!-- Tabler Core -->
    <script src="{{ asset('dist/js/tabler.min.js?1684106062') }}" defer></script>
    <script src="{{ asset('dist/js/demo.min.js?1684106062') }}" defer></script>
    <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function () {
            var el;
            window.TomSelect && (new TomSelect(el = document.getElementById('select-users'), {
                copyClassesToDropdown: false,
                dropdownParent: 'body',
                controlInput: '<input>',
                render:{
                    item: function(data,escape) {
                        if( data.customProperties ){
                            return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
                        }
                        return '<div>' + escape(data.text) + '</div>';
                    },
                    option: function(data,escape){
                        if( data.customProperties ){
                            return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
                        }
                        return '<div>' + escape(data.text) + '</div>';
                    },
                },
            }));
        });
        // @formatter:on
      </script>
</body>
</html>