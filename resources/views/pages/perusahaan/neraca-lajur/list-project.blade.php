@php
// Set the default value if not provided
$jurnalId = request('jurnal_id', 1);
@endphp

@extends('../layout/' . $layout)

@section('subhead')
    <title>CRUD Data List - Tinker - Tailwind HTML Admin Template</title>
@endsection

@section('subcontent')
    <h2 class="intro-y text-lg font-medium mt-10">Neraca Lajur</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- Add a form to submit the selected jurnal ID -->
        <form action="{{ route('indexNeracaLajur') }}" method="GET">
            @csrf
            <div class="mb-2">
                <select name="jurnal_id" id="jurnal_id" class="form-select" onchange="this.form.submit()">
                    <option value="" {{ $jurnalId == '' ? 'selected' : '' }}>Semua Jurnal ID</option>
                    @foreach ($jurnalList as $jurnal)
                        <option value="{{ $jurnal->id }}" {{ $jurnalId == $jurnal->id ? 'selected' : '' }}>
                            {{ $jurnal->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </form>

        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">KODE AKUN</th>
                        <th class="whitespace-nowrap">NAMA AKUN</th>
                        <th class="whitespace-nowrap">NERACA SALDO DEBET</th>
                        <th class="whitespace-nowrap">NERACA SALDO KREDIT</th>
                        <th class="whitespace-nowrap">LABA RUGI DEBET</th>
                        <th class="whitespace-nowrap">LABA RUGI KREDIT</th>
                        <th class="whitespace-nowrap">NERACA DEBET</th>
                        <th class="whitespace-nowrap">NERACA KREDIT</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kodeAkunList as $kodeAkun)
                        <tr>
                            <td>{{ $kodeAkun->kode }}</td>
                            <td>{{ $kodeAkun->nama }}</td>
                            <td>{{ formatAsRupiah(calculateNeracaSaldoDebet($kodeAkun->id, $jurnalId)) }}</td>
                            <td>{{ formatAsRupiah(calculateNeracaSaldoKredit($kodeAkun->id, $jurnalId)) }}</td>
                            <td>{{ formatAsRupiah(calculateLabaRugiDebet($kodeAkun->id, $jurnalId)) }}</td>
                            <td>{{ formatAsRupiah(calculateLabaRugiKredit($kodeAkun->id, $jurnalId)) }}</td>
                            <td>{{ formatAsRupiah(calculateNeracaSaldoDebet($kodeAkun->id, $jurnalId)) }}</td>
                            <td>{{ formatAsRupiah(calculateNeracaSaldoKredit($kodeAkun->id, $jurnalId)) }}</td>
                            
                            <td> <!-- Tambahkan nilai sesuai kebutuhan -->
                            </td>
                            <td> <!-- Tambahkan nilai sesuai kebutuhan -->
                            </td>
                            <td> <!-- Tambahkan nilai sesuai kebutuhan -->
                            </td>
                            <td> <!-- Tambahkan nilai sesuai kebutuhan -->
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td class="whitespace-nowrap"></td>
                        <td class="whitespace-nowrap">Jumlah</td>
                        <td>{{ formatAsRupiah(calculateTotalNeracaSaldoDebet($kodeAkunList, $jurnalId)) }}</td>
                        <td>{{ formatAsRupiah(calculateTotalNeracaSaldoKredit($kodeAkunList, $jurnalId)) }}</td>
                        <td>{{ formatAsRupiah(calculateTotalLabaRugiDebet($kodeAkunList, $jurnalId)) }}</td>
                        <td>{{ formatAsRupiah(calculateTotalLabaRugiKredit($kodeAkunList, $jurnalId)) }}</td>
                        <td> <!-- Tambahkan nilai sesuai kebutuhan -->
                        </td>
                        <td> <!-- Tambahkan nilai sesuai kebutuhan -->
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
    </div>
@endsection

@php
function calculateTotalNeracaSaldoKredit($kodeAkunList, $jurnalId) {
    $total = 0;
    foreach ($kodeAkunList as $kodeAkun) {
        $total += calculateNeracaSaldoKredit($kodeAkun->id, $jurnalId);
    }
    return $total;
}

function formatAsRupiah($number) {
    return 'Rp ' . number_format($number, 2, ',', '.');
}


function calculateNeracaSaldoDebet($kodeAkunId, $jurnalId) {
    $totalSaldoDebet = \App\Models\JurnalUmum::where('kode_app_id', $kodeAkunId)
        ->where('jurnal_id', $jurnalId)
        ->sum('debet');

    return $totalSaldoDebet;
}

function calculateNeracaSaldoKredit($kodeAkunId, $jurnalId) {
    $totalSaldoKredit = \App\Models\JurnalUmum::where('kode_app_id', $kodeAkunId)
        ->where('jurnal_id', $jurnalId)
        ->sum('kredit');

    return $totalSaldoKredit;
}

function calculateLabaRugiDebet($kodeAkunId, $jurnalId) {
    $kodeAkunList = ['37', '38', '39', '40', '41', '42', '43', '44', '45', '46', '47', '48', '49', '50', '51', '52', '53', '54', '55', '56', '57', '58', '59', '60', '61', '62', '63', '64', '65', '66', '67', '68', '69'];

    $totalLabaRugiDebet = 0;

    if (in_array($kodeAkunId, $kodeAkunList)) {
        $totalLabaRugiDebet = \App\Models\JurnalUmum::where('kode_app_id', $kodeAkunId)
            ->where('jurnal_id', $jurnalId)
            ->sum('debet');
    }

    return $totalLabaRugiDebet;
}

function calculateLabaRugiKredit($kodeAkunId, $jurnalId) {
    $kodeAkunList = ['37', '38', '39', '40', '41', '42', '43', '44', '45', '46', '47', '48', '49', '50', '51', '52', '53', '54', '55', '56', '57', '58', '59', '60', '61', '62', '63', '64', '65', '66', '67', '68', '69'];

    $totalLabaRugiKredit = 0;

    if (in_array($kodeAkunId, $kodeAkunList)) {
        $totalLabaRugiKredit = \App\Models\JurnalUmum::where('kode_app_id', $kodeAkunId)
            ->where('jurnal_id', $jurnalId)
            ->sum('kredit');
    }

    return $totalLabaRugiKredit;
}

function calculateTotalNeracaSaldoDebet($kodeAkunList, $jurnalId) {
    $total = 0;
    foreach ($kodeAkunList as $kodeAkun) {
        $total += calculateNeracaSaldoDebet($kodeAkun->id, $jurnalId);
    }
    return $total;
}

function calculateTotalLabaRugiDebet($kodeAkunList, $jurnalId) {
    $total = 0;
    foreach ($kodeAkunList as $kodeAkun) {
        $total += calculateLabaRugiDebet($kodeAkun->id, $jurnalId);
    }
    return $total;
}

function calculateTotalLabaRugiKredit($kodeAkunList, $jurnalId) {
    $total = 0;
    foreach ($kodeAkunList as $kodeAkun) {
        $total += calculateLabaRugiKredit($kodeAkun->id, $jurnalId);
    }
    return $total;
}
@endphp
