@extends('../layout/' . $layout)

@section('subhead')
    <title>Dashboard - Inkindo</title>
@endsection

@section('subcontent')
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Create Step for {{$project->nama}}</h2>
</div>
<form method="POST" action="{{ route('tahapCreate', $project->id) }}">
    @csrf
    <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">

        <div class="intro-y col-span-12 lg:col-span-12">
            <label for="tahap">Tahap</label>
            <input type="text" name="tahap" class="form-control" id="nama" required>
        </div>
        <div class="intro-y col-span-12 lg:col-span-12">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" id="nama" required>
        </div>
        <div class="intro-y col-span-12 lg:col-span-12">
            <label for="fotorapat">Deskripsi</label>
            <input type="text" name="fotorapat" class="form-control" id="fotorapat" required>
        </div>
        <!-- <div class="intro-y col-span-12 lg:col-span-12">
            <div class="post intro-y overflow-hidden box mt-5">
                <div class="post__content tab-content">
                    <div id="content" class="tab-pane p-5 active" role="tabpanel" aria-labelledby="content-tab">
                        <label class="form-label">Upload Foto Rapat</label>
                        <div id="image-drop" class="border-2 border-dashed dark:border-darkmode-400 rounded-md pt-4">
                            <div class="flex flex-wrap px-4" id="image-container">
                                
                            </div>
                            <div class="px-4 pb-4 flex items-center cursor-pointer relative">
                                <i data-feather="image" class="w-4 h-4 mr-2"></i> <span
                                    class="text-primary mr-1">Upload a images</span> or drag and drop
                                <input type="file" name="image" id="fileInput" class="w-full h-full top-0 left-0 absolute opacity-0" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- <div class="intro-y col-span-12 lg:col-span-12">
            <label for="berkaspdukung">Berkas Pendukung</label>
            <input type="file" name="berkaspdukung" class="form-control" id="berkaspdukung" required>
        </div> -->
        <div class="intro-y col-span-12 lg:col-span-12">
            <label class="form-label">Tenaga Ahli</label>
            <div class="dropdown">
                <select class="form-select" name="user_id" id="user_id" required>
                <option value="" required>Pilih Tenaga Ahli</option>
                    @foreach($tenagaahliUsers as $ahli)
                        <option value="{{ $ahli->id }}">{{ $ahli->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class="intro-y flex flex-col sm:flex-row items-center">
            <h2 class="text-lg font-medium mr-auto"></h2>
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <div>
                <button type="submit" class="dropdown-toggle btn btn-primary shadow-md flex items-center" aria-expanded="false"
                    data-tw-toggle="dropdown">
                    Tambah
                </button>
            </div>
            </div>
        </div>
    </div>
</form>
@endsection
