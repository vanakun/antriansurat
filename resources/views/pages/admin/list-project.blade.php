@extends('../layout/' . $layout)

@section('subhead')
    <title>CRUD Data List - Tinker - Tailwind HTML Admin Template</title>
@endsection

@section('subcontent')
    <h2 class="intro-y text-lg font-medium mt-10">Data List Project</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <button class="btn btn-primary shadow-md mr-2"><a href="{{ route('projectCreate') }}">Add New Project</a></button>
            <!-- <div id="real-time-clock" class="intro-y hidden md:block mx-auto text-slate-500"></div> -->
            <div class="intro-y mx-auto md:block mt-4">
                <p>Showing {{ $post->firstItem() }} to {{ $post->lastItem() }} of {{ $post->total() }} results</p>
            </div>
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
                        <th class="whitespace-nowrap">Image</th>
                        <th class="whitespace-nowrap">Project</th>
                        <th class="text-center whitespace-nowrap">Lokasi</th>
                        <th class="text-center whitespace-nowrap">Tahap</th>
                        <th class="text-center whitespace-nowrap">Status</th>
                        <th class="text-center whitespace-nowrap">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = ($post->currentPage() - 1) * $post->perPage() + 1;
                    @endphp
                    @foreach ( $post as $index => $pos)
                    <tr class="intro-x image-fit zoom-in">
                        <td>{{ $no++ }}</td>
                        <td>
                            <a href="{{ route('projectShow', $pos->id) }}">
                                <div class="flex">
                                    <div class="w-20 h-10 image-fit zoom-in">
                                        <img alt="{{ $pos->nama }}" class="tooltip rounded-lg" src="{{ asset( 'dist/poster_project/' . $pos->image ) }}" title="Created at {{ $pos->created_at }}">
                                    </div>
                                </div>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('projectShow', $pos->id) }}">
                                <div class="font-medium whitespace-nowrap">{{ $pos->nama }}</div>
                                <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">{{ $pos->lokasi }}</div>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('projectShow', $pos->id) }}">
                                <div class="flex items-center justify-center">
                                    <div class="font-medium whitespace-nowrap">{{ $pos->lokasi }}</div>
                                </div>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('projectShow', $pos->id) }}">
                                <div class="flex items-center justify-center">
                                    <div class="font-medium whitespace-nowrap">1</div>
                                </div>
                            </a>
                        </td>
                        <td class="w-40">
                            <a href="{{ route('projectShow', $pos->id) }}">
                                <div class="flex items-center justify-center {{ $pos->status === 'active' ? 'text-success' : 'text-danger' }}">
                                    <i data-feather="{{ $pos->status === 'active' ? 'check-square' : 'x-square' }}" class="w-4 h-4 mr-2"></i> {{ ucfirst($pos->status) }}
                                </div>
                            </a>
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3" href="{{ route('projectEdit', ['id' => $pos->id, 'currentPage' => $post->currentPage()]) }}">
                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit
                                </a>
                                <a class="flex items-center text-danger" href="{{ route('projectDelete', ['id' => $pos->id]) }}" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal">
                                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    <!-- @foreach (array_slice($fakers, 0, 9) as $faker)
                        <tr class="intro-x">
                            <td class="w-40">
                                <div class="flex">
                                    <div class="w-20 h-10 image-fit zoom-in">
                                        <img alt="Tinker Tailwind HTML Admin Template" class="tooltip rounded-lg" src="{{ asset('dist/images/' . $faker['images'][0]) }}" title="Uploaded at {{ $faker['dates'][0] }}">
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="" class="font-medium whitespace-nowrap">{{ $faker['products'][0]['name'] }}</a>
                                <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">{{ $faker['products'][0]['category'] }}</div>
                            </td>
                            <td>
                            <div class="flex items-center justify-center
                                <a href="" class="font-medium whitespace-nowrap">{{ $faker['products'][0]['name'] }}</a>
                                </div>
                            </td>
                            <td class="text-center">{{ $faker['stocks'][0] }}</td>
                            
                            <td class="w-40">
                                <div class="flex items-center justify-center {{ $faker['true_false'][0] ? 'text-success' : 'text-danger' }}">
                                    <i data-feather="check-square" class="w-4 h-4 mr-2"></i> {{ $faker['true_false'][0] ? 'Active' : 'Inactive' }}
                                </div>
                            </td>
                            
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center mr-3" href="javascript:;">
                                        <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Show
                                    </a>
                                    <a class="flex items-center mr-3" href="javascript:;">
                                        <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit
                                    </a>
                                    <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal">
                                        <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach -->
                </tbody>
            </table>
            <div class="intro-y flex flex-col mt-4">
                {!! $post->links() !!}
            </div>
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        <!-- <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            <nav class="w-full sm:w-auto sm:mr-auto">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <i class="w-4 h-4" data-feather="chevrons-left"></i>
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <i class="w-4 h-4" data-feather="chevron-left"></i>
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">...</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">...</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <i class="w-4 h-4" data-feather="chevron-right"></i>
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <i class="w-4 h-4" data-feather="chevrons-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            <select class="w-20 form-select box mt-3 sm:mt-0">
                <option>10</option>
                <option>25</option>
                <option>35</option>
                <option>50</option>
            </select>
        </div> -->
        <!-- END: Pagination -->
    </div>
    <!-- BEGIN: Delete Confirmation Modal -->
    <div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <i data-feather="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Are you sure?</div>
                        <div class="text-slate-500 mt-2">Do you really want to delete these records? <br>This process cannot be undone.</div>
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                        <button type="button" class="btn btn-danger w-24">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Delete Confirmation Modal -->
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function updateRealTimeClock() {
        $.ajax({
            url: "{{ route('getCurrentTime') }}",
            method: 'GET',
            success: function (data) {
                $('#real-time-clock').text(data);
            }
        });
    }

    // Update waktu setiap 1 detik
    setInterval(updateRealTimeClock, 1000);
</script>
@endsection