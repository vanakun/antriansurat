@extends('../layout/' . $layout)

@section('subhead')
    <title>CRUD Data List - Tinker - Tailwind HTML Admin Template</title>
@endsection

@section('subcontent') 
    <h2 class="intro-y text-lg font-medium mt-10">Buku Besar</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- BEGIN: Filter Form -->
        <form id="filterForm" action="{{ route('projectSearch') }}" method="GET" class="mb-4">
            <div class="flex flex-wrap items-end space-x-2">
                <div class="mb-2">
                    <select name="kode_app_id" id="kode_app_id" class="form-select">
                        <option value="" selected>Semua Kode Akun</option>
                        @foreach ($kodeAkunList as $kodeAkun)
                            <option value="{{ $kodeAkun->id }}">{{ $kodeAkun->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-2">
                    <select name="jurnal_id" id="jurnal_id" class="form-select">
                        <option value="" selected>Semua Jurnal ID</option>
                        @foreach ($jurnalList as $jurnal)
                            <option value="{{ $jurnal->id }}">{{ $jurnal->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-2">
                    <!-- Add hidden input fields to store the selected filter names -->
                    <input type="hidden" name="filter_name" id="filter_name" value="">
                </div>

                <div>
                    <!-- BEGIN: Filter Button -->
                    <button type="button" onclick="applyFilter()" class="btn btn-primary">Filter</button>
                    <!-- END: Filter Button -->
                </div>
                
            </div>
        </form>
        <!-- END: Filter Form -->

        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <!-- Display the selected filter names -->
            <div id="selectedFilter" class="text-lg font-medium mt-2"></div>

            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">No</th>
                        <th class="whitespace-nowrap">Tanggal</th>
                        <th class="whitespace-nowrap">Bukti Transaksi</th>
                        <th class="whitespace-nowrap">Keterangan</th>
                        <th class="whitespace-nowrap">Nama Akun</th>
                        <th class="whitespace-nowrap">Kode Akun</th>
                        <th class="text-center whitespace-nowrap">Debet</th>
                        <th class="text-center whitespace-nowrap">Kredit</th>
                        <th class="text-center whitespace-nowrap">Saldo</th>
                        <th class="text-center whitespace-nowrap">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $runningBalance = 0;
                    ?>
                    @foreach ($jurnalUmum as $index => $item)
                        <?php
                            $runningBalance += $item->debet - $item->kredit;
                        ?>
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td>{{ $item->bukti_transaksi }}</td>
                            <td>{{ $item->keterangan }}</td>
                            <td>{{ $item->kodeApp->nama }}</td>
                            <td>{{ $item->kodeApp->kode }}</td>
                            <td class="text-center">{{ number_format($item->debet, 0, ',', '.') }}</td>
                            <td class="text-center">{{ number_format($item->kredit, 0, ',', '.') }}</td>
                            <td class="text-center">{{ number_format($runningBalance, 0, ',', '.') }}</td>
                            <td class="text-center">
                                <button class="btn btn-success">Edit</button>
                                <button class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                    @endforeach

                    <!-- Display total ending balance row -->
                    <tr>
                        <td colspan="8" class="text-right font-bold">Total Ending Balance:</td>
                        <td class="text-center font-bold">{{ number_format($runningBalance, 0, ',', '.') }}</td>
                        <td></td> <!-- Empty cell for the "Action" column -->
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
    </div>

    <!-- Script to update title and selected filter names based on the selected filters -->
    <script>
        function applyFilter() {
            var kodeAkunSelect = document.getElementById('kode_app_id');
            var jurnalIdSelect = document.getElementById('jurnal_id');
            var selectedFilter = document.getElementById('selectedFilter');
            var kodeAkunName = kodeAkunSelect.options[kodeAkunSelect.selectedIndex].text;
            var jurnalIdName = jurnalIdSelect.options[jurnalIdSelect.selectedIndex].text;

            // Set the hidden input field values
            document.getElementById('filter_name').value = kodeAkunName + ' - ' + jurnalIdName;

            // Update the title and selected filter names
            document.title = 'CRUD Data List - ' + kodeAkunName + ' - ' + jurnalIdName;
            selectedFilter.innerText = 'Filter: ' + kodeAkunName + ' - ' + jurnalIdName;

            // Submit the form
            document.getElementById('filterForm').submit();

            
        }
    </script>
@endsection
