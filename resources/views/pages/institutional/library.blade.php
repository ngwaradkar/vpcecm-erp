@extends('layouts.master')
@section('page_title', 'College Library & Digital E-Resources')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-primary text-white header-elements-inline">
                <h5 class="card-title"><i class="icon-books mr-2"></i> KOHA Integrated Library Management System (ILMS)</h5>
                {!! Qs::getPanelOptions() !!}
            </div>
            <div class="card-body">
                <p>
                    VPCCECM Library provides automated borrowing services via KOHA with complete barcode tracking, OPAC search, and Digital Tap-In biometric attendance. Subscribes to <strong>INFLIBNET N-LIST</strong>, <strong>DELNET</strong>, and <strong>Kopykitab.com</strong>.
                </p>
                <div class="row text-center">
                    <div class="col-3 border-right">
                        <h4 class="font-weight-bold text-primary mb-0">9,862</h4>
                        <span class="text-muted font-size-xs text-uppercase">Volumes</span>
                    </div>
                    <div class="col-3 border-right">
                        <h4 class="font-weight-bold text-success mb-0">23</h4>
                        <span class="text-muted font-size-xs text-uppercase">Journals</span>
                    </div>
                    <div class="col-3 border-right">
                        <h4 class="font-weight-bold text-warning mb-0">12</h4>
                        <span class="text-muted font-size-xs text-uppercase">Magazines</span>
                    </div>
                    <div class="col-3">
                        <h4 class="font-weight-bold text-danger mb-0">17</h4>
                        <span class="text-muted font-size-xs text-uppercase">Newspapers</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-top-warning">
            <div class="card-header header-elements-inline">
                <h6 class="card-title font-weight-bold text-warning-800"><i class="icon-info22 mr-2"></i> Operating Rules & Fines</h6>
            </div>
            <div class="card-body py-2">
                <ul class="list-unstyled mb-0 font-size-sm">
                    <li><i class="icon-alarm mr-2 text-warning"></i> <strong>Hours:</strong> 8:30 AM – 5:30 PM (Mon–Sat)</li>
                    <li><i class="icon-user-check mr-2 text-warning"></i> <strong>Borrowing:</strong> 2 to 3 books for 1 week</li>
                    <li class="mt-2"><i class="icon-coin-dollar mr-2 text-warning"></i> <strong>Overdue Fines:</strong>
                        <ul class="pl-3 mt-1">
                            <li>Week 1: ₹1.00 / day</li>
                            <li>Week 2+: ₹2.00 / day</li>
                            <li>After 1 Month: ₹5.00 / day</li>
                        </ul>
                    </li>
                    <li class="mt-2 text-muted font-italic"><i class="icon-alert mr-1"></i> "A book misplaced is a book lost."</li>
                </ul>
            </div>
        </div>
    </div>
</div>

{{-- Discipline E-Resources --}}
<div class="card">
    <div class="card-header header-elements-inline bg-light">
        <h6 class="card-title font-weight-bold text-slate-800"><i class="icon-earth mr-2"></i> Curated Discipline-Specific Digital E-Resource Repositories</h6>
        {!! Qs::getPanelOptions() !!}
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-3 mb-2">
                <div class="p-2 border rounded bg-white">
                    <span class="font-weight-bold text-primary">Commerce & Taxes:</span>
                    <div class="font-size-xs text-muted">ICAEW, IASB, All Indian Taxes, ICAI Digital Library</div>
                </div>
            </div>
            <div class="col-md-3 mb-2">
                <div class="p-2 border rounded bg-white">
                    <span class="font-weight-bold text-success">Economics:</span>
                    <div class="font-size-xs text-muted">World Bank, WTO, RBI Database, IMF, ADB, CMIE Centre</div>
                </div>
            </div>
            <div class="col-md-3 mb-2">
                <div class="p-2 border rounded bg-white">
                    <span class="font-weight-bold text-info">Geography & Earth:</span>
                    <div class="font-size-xs text-muted">Human Geography Portal, Bhuvan ISRO, Remote Sensing Data</div>
                </div>
            </div>
            <div class="col-md-3 mb-2">
                <div class="p-2 border rounded bg-white">
                    <span class="font-weight-bold text-purple">Languages & Literature:</span>
                    <div class="font-size-xs text-muted">Marathi Poetry, Hindi Samay, Konkani Resources Dictionary</div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Books Inventory Table --}}
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title font-weight-bold"><i class="icon-bookmark mr-2"></i> Selected Academic Catalog & Reference Textbooks</h5>
        {!! Qs::getPanelOptions() !!}
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="bg-light">
                <tr>
                    <th>#</th>
                    <th>Book Title</th>
                    <th>Author(s)</th>
                    <th>Classification / Type</th>
                    <th>Shelf / Location</th>
                    <th>Copies Available</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $idx => $b)
                <tr>
                    <td>{{ $idx + 1 }}</td>
                    <td class="font-weight-semibold text-primary">{{ $b->name }}</td>
                    <td>{{ $b->author ?: 'Institutional' }}</td>
                    <td><span class="badge badge-light-secondary">{{ $b->book_type }}</span></td>
                    <td><code>{{ $b->location }}</code></td>
                    <td><span class="badge badge-success">{{ ($b->total_copies - $b->issued_copies) }} / {{ $b->total_copies }}</span></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
