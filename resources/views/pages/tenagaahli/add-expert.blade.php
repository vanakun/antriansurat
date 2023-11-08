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
            <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">Tambah Tenaga ahli yang terlibat </h2>
            </div>
            <form method="POST" action="{{ route('StoreExpert', $step->id) }}">
                @csrf
                <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
                    <!-- <div class="intro-y col-span-12 lg:col-span-12">
                        <label class="form-label">Tenaga Ahli</label>
                        <div class="dropdown">
                            <select class="form-select" name="expert_id" id="expert_id" >
                            <option value="" required>Pilih Tenaga Ahli</option>
                                @foreach($tenagaahliUsers as $ahli)
                                    <option value="{{ $ahli->id }}">{{ $ahli->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> -->


                    <div class="intro-y col-span-12 lg:col-span-12">
                        <label for="expert_id" class="form-label">Tenaga Ahli</label>
                        <select data-placeholder="Pilih Tenaga Ahli yang Terlibat" class="tom-select w-full" id="expert_id" name="expert_id[]" multiple required>
                            <!-- Nisor iki Tak tambah soal e lk gk ngunu pas reload awal" kyk ngedip foreach user -->
                            @foreach($tenagaahliUsers as $ahli)
                            @endforeach  
                            @foreach($tenagaahliUsers as $user)
                                @if(!$step->experts->contains($user->id))
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endif
                            @endforeach
                        </select>
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