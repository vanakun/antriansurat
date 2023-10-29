@extends('../layout/' . $layout)

@section('subhead')
    <title>Dashboard - Inkindo</title>
@endsection

@section('subcontent')
<div class="flex overflow-hidden">
    <!-- BEGIN: Content -->
    <div class="content">
        <div class="intro-y text-center mt-5">
        <div class="intro-y box mt-5">
            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                <h2 class="text-lg font-medium ">{{$project->nama}}</h2>
            </div>
            
            <img alt="proyek_img" class="rounded-md mx-auto zoom-in" src="{{ asset('dist/poster_project/' . $project->image) }}" style="max-width: 700px; height: auto;">
            <div class="intro-y box mt-5">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">Detail</h2>
                </div>
                <div id="" class="p-5">
                    <div class="preview">
                        <div class="form-inline">
                            <label for="" class="form-label sm:w-20">Nama</label>
                            <input id="" type="text" class="form-control" value="{{ $project->nama }}" readonly>
                        </div>
                        <div class="form-inline mt-5">
                            <label for="" class="form-label sm:w-20">Lokasi</label>
                            <input id="" type="text" class="form-control" value="{{ $project->lokasi }}" readonly>
                        </div>
                        <div class="form-inline mt-5">
                            <label for="" class="form-label sm:w-20">Dibuat</label>
                            <input id="" type="text" class="form-control" value="{{ $project->created_at->format('d F Y') }}" readonly>
                        </div>
                        <div class="form-inline mt-5">
                            <label for="" class="form-label sm:w-20">Status</label>
                            <input id="" type="text" class="form-control {{ $project->status === 'active' ? 'text-success' : 'text-danger' }}" value="{{ ucfirst($project->status) }}" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="intro-y box mt-5">
            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                <h2 class="font-medium text-base mr-auto">Tahap</h2>
            </div>
            <div id="" class="p-5 flex flex-col items-center">
                <div class="preview">
                <div class="p-5">
                @if (!empty($steps))
                    @foreach ($steps as $step)
                        <div class="intro-y box mt-5" style="width: 120%;">
                            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                            <h2 class="font-medium text-base mr-auto">Tahap {{ $step->tahap }} - {{ $step->nama }}</h2>
                         </div>
                        <div id="" class="p-5 flex flex-col items-center">
                    <div class="preview">
                        <p>Keterangan: {{ $step->keterangan }}</p>
                        <p>Ketua: {{ $step->user->name }}</p>
                    </div>
                </div>
            </div>
                     @endforeach
                @else
                    <p>Tidak ada langkah-langkah tersedia.</p>
            @endif
                </div>
                    <button class="btn btn-primary shadow-md mr-2"><a href="{{ route('tahapCreate', $project->id) }}">Tambah Tahap</a></button>
                </div>
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