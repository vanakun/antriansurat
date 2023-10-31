@extends('../layout/main')

@section('head')
    @yield('subhead')
@endsection

@section('content')
    @include('../layout/components/mobile-menu')
    <div class="flex overflow-hidden">
        <!-- BEGIN: Content -->
        <div class="content">
            @include('../layout/components/top-bar-tenagaahli')
            @yield('subcontent')
            <div class="intro-y box mt-5">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">Ketua Penanggung Jawab</h2>
                    <h2 class="font-medium text-base ml-auto">{{ $step->user->name }}</h2>
                </div>
            </div>

            {{-- Media --}}
            <div class="intro-y box mt-2">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">Tahap: {{ $step->tahap }} {{ $step->nama }}</h2>
                    @if ($step->user_id == auth()->user()->id)
                        <button class="btn btn-primary shadow-md ml-auto"><a href="">Tambah Dokumen</a></button>
                    @endif
                </div>
                <div class="flex p-5">
                    @if($step->status == 1)
                        <div class="text-primary mr-2">
                            <i data-feather="check" class="w-5 h-5"></i>
                        </div>
                        <div class="font-medium whitespace-nowrap text-primary">Approved</div>
                    @elseif($step->status == 2)
                        <div class="text-yellow-500 mr-2">
                            <i data-loading-icon="tail-spin" class="w-5 h-5"></i>
                        </div>
                        <div class="font-medium whitespace-nowrap text-yellow-500">Waiting</div>
                    @elseif($step->status == 3)
                        <div class="text-red-500 mr-2">
                            <i data-feather="x" class="w-5 h-5"></i>
                        </div>
                        <div class="font-medium whitespace-nowrap text-red-500">Rejected</div>
                    @else
                        <div class="text-gray-500 mr-2">
                            <i data-feather="x" class="w-5 h-5"></i>
                        </div>
                        <div class="font-medium whitespace-nowrap text-gray-500">Unknown</div>
                    @endif
                </div>
                <div class="p-5">
                    <div>
                        Keterangan: {{ $step->keterangan }}
                    </div>
                </div>
                <div class="p-5">
                    <div>
                        Keterangan: {{ $step->keterangan }}
                    </div>
                </div>
            </div>

            {{-- Anggota --}}
            <div class="intro-y box mt-2">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">Anggota Terlibat</h2>
                    @if ($step->user_id == auth()->user()->id)
                        <button class="btn btn-primary shadow-md ml-auto"><a href="{{ route('AddToStep', $step->id) }}">Tambah Tenaga Ahli</a></button>
                    @endif
                </div>
                <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                    <table class="table table-report -mt-2">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap">No</th>
                                <th class="whitespace-nowrap">Nama</th>
                                <th class="whitespace-nowrap">Telefon</th>
                                <th class="whitespace-nowrap">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($experts as $index => $expert)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $expert->name }}</td>
                                <td>{{ $expert->phone !== null ? '0' . $expert->phone : '-' }}</td>
                                <td><a href="mailto:{{ $expert->email }}">{{ $expert->email }}</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END: Content -->
    </div>
@endsection

@section('script')
<script>
    const imageDrop = document.getElementById('image-drop');
    const imageContainer = document.getElementById('image-container');

    // Mendengarkan event "dragover" untuk mengizinkan drop
    imageDrop.addEventListener('dragover', (e) => {
        e.preventDefault();
        imageDrop.classList.add('bg-gray-200'); // Ganti latar belakang saat di atas area drop
    });

    // Mendengarkan event "dragleave" untuk mengembalikan tampilan semula saat keluar dari area drop
    imageDrop.addEventListener('dragleave', () => {
        imageDrop.classList.remove('bg-gray-200');
    });

    // Mendengarkan event "drop" untuk menangani gambar yang diunggah
    imageDrop.addEventListener('drop', (e) => {
        e.preventDefault();
        imageDrop.classList.remove('bg-gray-200');

        const files = e.dataTransfer.files;
        if (files.length > 0) {
            clearImageContainer(); // Hapus gambar yang ada

            for (const file of files) {
                if (file.type.startsWith('image/')) {
                    const imageDiv = createImageElement(file);
                    imageContainer.appendChild(imageDiv);
                }
            }
        }
    });

    // Mengaktifkan drop pada input file
    const fileInput = document.getElementById('fileInput');
    fileInput.addEventListener('change', (e) => {
        const files = e.target.files;
        clearImageContainer(); // Hapus gambar yang ada

        for (const file of files) {
            if (file.type.startsWith('image/')) {
                const imageDiv = createImageElement(file);
                imageContainer.appendChild(imageDiv);
            }
        }
    });

    // Menghapus gambar
    imageContainer.addEventListener('click', (e) => {
        if (e.target && e.target.classList.contains('remove-image')) {
            const imageDiv = e.target.parentElement;
            imageContainer.removeChild(imageDiv);
        }
    });

    // Fungsi untuk membuat elemen gambar baru
    function createImageElement(file) {
        const imageDiv = document.createElement('div');
        imageDiv.classList.add('w-48', 'h-24', 'relative', 'image-fit', 'mb-5', 'mr-5', 'cursor-pointer', 'zoom-in');

        const image = document.createElement('img');
        image.classList.add('rounded-md');
        image.alt = file.name;
        const imageUrl = URL.createObjectURL(file);
        image.src = imageUrl;

        imageDiv.appendChild(image);

        return imageDiv;
    }

    // Fungsi untuk menghapus semua gambar dalam container
    function clearImageContainer() {
        while (imageContainer.firstChild) {
            imageContainer.removeChild(imageContainer.firstChild);
        }
    }
</script>
@endsection
