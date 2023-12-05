@extends('../layout/' . $layout)

@section('subhead')
    <title>CRUD Data List - Tinker - Tailwind HTML Admin Template</title>
@endsection

@section('subcontent')
    <h2 class="intro-y text-lg font-medium mt-10">Jurnal</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <button class="btn btn-primary shadow-md mr-2"><a href="{{ route('createjurnal') }}">Tambah Jurnal</a></button>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <form action="{{ route('projectSearch') }}" method="GET">
                    <div class="w-56 relative text-slate-500">
                        <input type="text" name="search" class="form-control w-56 box pr-10" placeholder="Search...">
                        <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>
                    </div>
                </form>
            </div>
        </div>

        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">No</th>
                        <th class="whitespace-nowrap">Nama Jurnal</th>
                        <th class="text-center whitespace-nowrap">Action</th>
                    </tr>
                    
                </thead>
                <tbody>
                @foreach ($jurnal as $index => $jurnal )
                        <tr>
                        <td>{{ $index + 1 }}</td>
                            <td>{{ $jurnal ->name }}</td>
                            <td>
                                <button class="btn btn-success">Detail</button>
                                <button class="btn btn-success">Edit</button>
                                <button class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
    </div>
@endsection
