@extends('layout.main')

@section('content')
    <div style="font-family: Arial, sans-serif; margin: 10px; padding: 10px;">
        <!-- BEGIN: Content -->
        <div class="content">
            @yield('subcontent')
            <div style="text-align: center; margin-bottom: 20px;">
                <h2 style="font-size: 24px; font-weight: bold;">Ketua Penanggung Jawab</h2>
                <h2 style="font-size: 18px;">{{ $step->user->name }}</h2>
            </div>

            {{-- Media --}}
            <div style="margin-bottom: 20px;">
                <div style="text-align: center;">
                    <h2 style="font-size: 18px; font-weight: bold; margin-bottom: 10px;">Tahap: {{ $step->tahap }} {{ $step->nama }}</h2>
                </div>
                <div style="font-size: 14px; margin-bottom: 10px; text-align: center;">
                    {{ $step->keterangan }}
                </div>
                <div>
                    <div style="text-align: center; font-size: 16px; font-weight: bold; padding: 5px 10px; border-radius: 5px;
                        @if($step->status == 1)
                            background-color: green; color: white;
                        @elseif($step->status == 2)
                            background-color: yellow; color: black;
                        @elseif($step->status == 3)
                            background-color: red; color: white;
                        @else
                            background-color: gray; color: white;
                        @endif">
                        @if($step->status == 1)
                            Approved
                        @elseif($step->status == 2)
                            Waiting
                        @elseif($step->status == 3)
                            Rejected
                        @else
                            Unknown
                        @endif
                    </div>
                </div>
            </div>

            {{-- Anggota --}}
            <div style="margin-bottom: 20px;">
                <div style="text-align: center;">
                    <h2 style="font-size: 18px; font-weight: bold;">Anggota</h2>
                </div>
                <div>
                    <table style="width: 100%; border-collapse: collapse;">
                        <thead>
                            <tr>
                                <th style="background-color: #f2f2f2; border: 1px solid #ddd; padding: 8px; text-align: left;">No</th>
                                <th style="background-color: #f2f2f2; border: 1px solid #ddd; padding: 8px; text-align: left;">Nama</th>
                                <th style="background-color: #f2f2f2; border: 1px solid #ddd; padding: 8px; text-align: left;">Telefon</th>
                                <th style="background-color: #f2f2f2; border: 1px solid #ddd; padding: 8px; text-align: left;">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($experts as $index => $expert)
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">{{ $index + 1 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $expert->name }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">{{ $expert->phone !== null ? '0' . $expert->phone : '-' }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $expert->email }}</a></td>
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
