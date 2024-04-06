@extends('layout/app')
@section('konten')
<div class="container">
    <h1 class="text-5xl text-[#174E71] m-5">Report</h1>

    <div class="flex items-center justify-center mb-24">
        <div class="card w-4/12 h-40 bg-[#174E71] shadow-xl text-white">
            <div class="card-body">
                <p class="text-center text-sm font-bold mb-2">Report</p>
                <p class="text-center text-4xl font-bold">{{$reportsCount}} <i class="bi bi-envelope-paper"></i></p>
            </div>
        </div>
    </div>
    
    @if (Auth::user()->level == 'admin')
        
    <form action="/report" method="GET" class="max-w-md mx-auto">
        <div class="flex  space-x-2 mb-3">
            <div class="w-1/4">
                <label for="tgl_pinjaman" class="block">Start Date</label>
                <input type="date" name="tgl_pinjaman" class="form-input rounded-sm w-full" placeholder="Start Date">
            </div>
            <div class="w-1/4">
                <label for="tgl_pengembalian" class="block">End Date</label>
                <input type="date" name="tgl_pengembalian" class="form-input rounded-sm w-full" placeholder="End Date">
            </div>
            <div class="w-1/4">
                <label for="status_peminjaman" class="block">Status</label>
                <select name="status_peminjaman" class="form-select rounded-sm w-full">
                    <option value="">Status</option>
                    <option value="borrowed">Borrowed</option>
                    <option value="returned">Returned</option>
                </select>
            </div>
            <div class="w-1/4">
                <button type="submit" class="btn btn-primary w-full">Search</button>
            </div>
        </div>
    </form>
    @else
    <form action="/officer/report" method="GET" class="max-w-md mx-auto">
        <div class="flex  space-x-2 mb-3">
            <div class="w-1/4">
                <label for="tgl_pinjaman" class="block">Start Date</label>
                <input type="date" name="tgl_pinjaman" class="form-input rounded-sm w-full" placeholder="Start Date">
            </div>
            <div class="w-1/4">
                <label for="tgl_pengembalian" class="block">End Date</label>
                <input type="date" name="tgl_pengembalian" class="form-input rounded-sm w-full" placeholder="End Date">
            </div>
            <div class="w-1/4">
                <label for="status_peminjaman" class="block">Status</label>
                <select name="status_peminjaman" class="form-select rounded-sm w-full">
                    <option value="">Status</option>
                    <option value="borrowed">Borrowed</option>
                    <option value="returned">Returned</option>
                </select>
            </div>
            <div class="w-1/4">
                <button type="submit" class="btn btn-primary w-full">Search</button>
            </div>
        </div>
    </form>
    @endif
    
    
    
    <div class="overflow-x-auto mb-2">
        <table class="table text-center">
            <thead>
                <tr>
                    <th class="px-4  py-2">No</th>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Book Name</th>
                    <th class="px-4 py-2">Loan Status</th>
                    <th class="px-4 py-2">Date Borrowed</th>
                    <th class="px-4 py-2">Return Date</th>
                    <th class="px-4 py-2">Date Returned</th>
                    <th class="px-4 py-2">Unit Book ID</th>
                </tr>
            </thead>
            <tbody>
                @if (count($reports))
                @php
                    $i = 1;
                @endphp
                @foreach ($reports as $report)
                    <tr>
                        <td class="border hover:bg-slate-400 hover:text-white px-4 py-2">{{ $i++ }}</td>
                        <td class="border hover:bg-slate-400 hover:text-white px-4 py-2">{{ $report->nama_lengkap }}</td>
                        <td class="border hover:bg-slate-400 hover:text-white px-4 py-2">{{ $report->nama_buku }}</td>
                        <td class="border hover:bg-slate-400 hover:text-white px-4 py-2">{{ ucFirst($report->status_peminjaman) }}</td>
                        <td class="border hover:bg-slate-400 hover:text-white px-4 py-2">{{ $report->tgl_peminjaman }}</td>
                        <td class="border hover:bg-slate-400 hover:text-white px-4 py-2">{{ $report->tgl_pengembalian }}</td>
                        <td class="border hover:bg-slate-400 hover:text-white px-4 py-2">
                            @if ($report->tgl_dikembalikan == '')
                                -
                            @endif
                            {{ $report->tgl_dikembalikan }}
                        </td>
                        <td class="border hover:bg-slate-400 hover:text-white px-4 py-2">{{ $report->id_buku_satuan }}</td>
                    </tr>
                @endforeach
                @else
                <tr class="text-center">
                    <td ></td>
                        <td ></td>
                        <td ></td>
                        <td ></td>
                        <td >--- No Data Yet ---</td>
                        <td ></td>
                        <td ></td>
                        <td ></td>
                </tr> 
                @endif
            </tbody>
        </table>
    </div>
    {{$reports->links()}} 
    
</div>
@endsection