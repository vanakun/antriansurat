@extends('../layout/' . $layout)

@section('subhead')
    <title>Dashboard - Inkindo</title>
@endsection

@section('subcontent')
    <div class="container">
        <div class="intro-y box mt-5">
            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                <h2 class="font-medium text-base mr-auto">Ketua Penanggung Jawab</h2>
                <h2 class="font-medium text-base ml-auto">{{ $step->user->name }}</h2>
            </div>
        </div>
        <div class="intro-y box mt-2">
            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                <h2 class="font-medium text-base mr-auto">Tahap: {{ $step->tahap }} {{ $step->nama }}</h2>
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
                <button class="btn btn-primary shadow-md ml-auto"><a href="{{ route('AddToStep', $step->id) }}">Tambah Tenaga ahli</a></button>
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

        {{-- Media --}}
            <div class="intro-y box mt-2">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                <h2 class="font-medium text-base mr-auto">Media</h2>
                </div>
                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12 lg:col-span-12 2xl:col-span-12">
                        <!-- BEGIN: Directory & Files -->
                        <div class="intro-y grid grid-cols-12 gap-3 sm:gap-6 p-5">
                        @foreach ($stepMedia as $media)
                            @if ($media->step_id == $step->id)
                                <div class="intro-y col-span-6 sm:col-span-4 md:col-span-3 2xl:col-span-2">
                                    <div class="file box rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in">
                                        @php
                                            $extension = pathinfo($media->file_path, PATHINFO_EXTENSION);
                                        @endphp
                                        @if (in_array($extension, ['jpeg', 'jpg', 'png', 'gif']))
                                            <a href="{{ asset($media->file_path) }}" class="w-3/5 file__icon file__icon--image mx-auto" target="_blank">
                                                <div class="file__icon--image__preview image-fit">
                                                    <img alt="Image Preview" src="{{ asset($media->file_path) }}">
                                                </div>
                                            </a>
                                            <div class="block font-medium mt-4 text-center truncate">
                                                {{ $media->name_media }}
                                            </div>
                                        @elseif (in_array($extension, ['pdf', 'docx', 'txt', 'html']))
                                            <a href="{{ asset($media->file_path) }}" class="w-3/5 file__icon file__icon--file mx-auto" target="_blank">
                                                <div class="file__icon__file-name">{{ $extension }}</div>
                                            </a>
                                            <div class="block font-medium mt-4 text-center truncate">
                                                {{ $media->name_media }}
                                            </div>
                                        @else
                                            <a href="{{ asset($media->file_path) }}" class="w-3/5 file__icon file__icon--image mx-auto" target="_blank">
                                                <div class="file__icon__file-name">{{ $extension }}</div>
                                                {{ $media->name_media }}
                                            </a>
                                            <div class="block font-medium mt-4 text-center truncate">
                                                {{ $media->name_media }}
                                            </div>
                                        @endif
                                        <div class="absolute top-0 right-0 mr-2 mt-3 dropdown ml-auto tooltip" title="More">
                                            <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown">
                                                <i data-feather="more-vertical" class="w-5 h-5 text-slate-500"></i>
                                            </a>
                                            <div class="dropdown-menu w-40">
                                                <ul class="dropdown-content">
                                                    <li>
                                                        <a href="" class="dropdown-item">
                                                            <i data-feather="users" class="w-4 h-4 mr-2"></i> Share File
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="" class="dropdown-item text-danger">
                                                            <i data-feather="trash" class="w-4 h-4 mr-2"></i> Delete
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
    
    
    
                        </div>
                        <!-- END: Directory & Files -->
                        <br>
                    </div>
                 </div>
                </div>
            </div>
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
