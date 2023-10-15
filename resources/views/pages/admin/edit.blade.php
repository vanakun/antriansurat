@extends('../layout/' . $layout)

@section('subhead')
    <title>Dashboard - Inkindo</title>
@endsection

@section('subcontent')
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Edit Project</h2>
    
</div>
<form method="POST" action="{{ route('projectUpdate', $project->id) }}" enctype="multipart/form-data">
  {{ method_field('PUT') }}
  {{ csrf_field() }}
  @csrf
  <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
    <div class="intro-y col-span-12 lg:col-span-12">
        <label for="" class="form-label">Nama Project</label>
        <input id="nama" type="text" name="nama" class="intro-y form-control py-3 px-4 box pr-10" placeholder="" value="{{ $project->nama }}" required>
    </div>
    <div class="intro-y col-span-12 lg:col-span-12">
        <label for="" class="form-label">Lokasi</label>
        <input id="lokasi" type="text" name="lokasi" class="intro-y form-control py-3 px-4 box pr-10" placeholder="" value="{{ $project->lokasi }}" required>
    </div>
    <div class="intro-y col-span-12 lg:col-span-12">
        <label class="form-label">Status</label>
        <div class="dropdown">
            <select class="form-select" name="status" id="statusSelect" value="{{ $project->status }}">
                <option value="active" {{ $project->status === 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $project->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
    </div>

    <div class="intro-y col-span-12 lg:col-span-12">
        <div class="post intro-y overflow-hidden box mt-5">
            <div class="post__content tab-content">
                <div id="content" class="tab-pane p-5 active" role="tabpanel" aria-labelledby="content-tab">
                    <label class="form-label">Upload Image</label>
                    <div id="image-drop" class="border-2 border-dashed dark:border-darkmode-400 rounded-md pt-4">
                        <div class="flex flex-wrap px-4" id="image-container">
                          <div class="w-48 h-24 image-fit zoom-in">
                              <img alt="{{ $project->nama }}" class="rounded-lg" src="{{asset('dist/poster_project/' . $project->image )}}">
                          </div>
                        </div>
                        <div class="px-4 pb-4 flex items-center cursor-pointer relative">
                            <i data-feather="image" class="w-4 h-4 mr-2"></i> <span
                                class="text-primary mr-1">Upload a images</span> or drag and drop
                            <input type="file" name="image" id="fileInput" value="{{asset('dist/poster_project/' . $project->image )}}" class="w-full h-full top-0 left-0 absolute opacity-0">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto"></h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
      <div>
          <button type="submit" class="dropdown-toggle btn btn-primary shadow-md flex items-center" aria-expanded="false"
              data-tw-toggle="dropdown">
              Save
          </button>
      </div>
    </div>
  </div>
</form>
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
