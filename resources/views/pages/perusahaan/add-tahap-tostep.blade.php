@extends('../layout/' . $layout)

@section('subhead')
    <title>Dashboard - Inkindo</title>
@endsection

@section('subcontent')
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Tambah Tenaga ahli yang terlibat </h2>
</div>
<form method="POST" action="{{ route('StoreExpertA', $step->id) }}">
    @csrf
    <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">


        <div class="intro-y col-span-12 lg:col-span-12">
            <label for="expert_id" class="form-label">Tenaga Ahli</label>
            <select data-placeholder="Pilih Tenaga Ahli yang Terlibatt" class="tom-select w-full" id="expert_id" name="expert_id[]" multiple required>
                <!-- Nisor iki Tak tambah soal e lk gk ngunu pas reload awal" kyk ngedip foreach user -->
                @if (auth()->user()->role === 'Admin')
                    @foreach($tenagaahliUsers as $ahli)
                    @endforeach  
                    @foreach($tenagaahliUsers as $user)
                        @if(!$step->experts->contains($user->id))
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endif
                    @endforeach
                @elseif (auth()->user()->role === 'Tenagaahli')
                    @foreach($tenagaahliUsers as $ahlii)
                    @endforeach  
                    @foreach($tenagaahliUsers as $user)
                        @if(!$step->experts->contains($user->id))
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endif
                    @endforeach
                @endif
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
