@extends('layouts.master')
@section('page_title', 'VPCCECM Dashboard')
@section('content')

    {{-- Institutional Welcome Banner --}}
    <div class="card bg-slate-800 text-white border-0 shadow-sm mb-4">
        <div class="card-body p-4">
            <div class="d-md-flex align-items-center justify-content-between">
                <div>
                    <div class="text-uppercase font-size-xs font-weight-bold text-warning letter-spacing-1 mb-1">
                        Prabodhan Education Society's
                    </div>
                    <h3 class="font-weight-bold mb-1">Vidya Prabodhini College of Commerce, Education, Computer and Management</h3>
                    <p class="mb-0 text-white-50">
                        <span class="mr-3"><i class="icon-quotes-left text-warning mr-1"></i> विद्या विनयेन शोभते (Knowledge shines with humility)</span>
                        <span><i class="icon-location4 mr-1"></i> Vidya Nagar, Alto, Parvari - Goa</span>
                    </p>
                </div>
                <div class="mt-3 mt-md-0 text-md-right">
                    <span class="badge badge-warning font-size-base font-weight-bold px-3 py-2 mr-1">NAAC Grade 'A+' (3.42 CGPA)</span>
                    <span class="badge badge-info font-size-base font-weight-bold px-3 py-2">NIRF Rank Band: 201–300</span>
                </div>
            </div>
        </div>
    </div>

    @if(Qs::userIsTeamSA())
       <div class="row">
           <div class="col-sm-6 col-xl-3">
               <div class="card card-body bg-blue-400 has-bg-image text-white">
                   <div class="media">
                       <div class="media-body">
                           <h3 class="mb-0 font-weight-bold">{{ $users->where('user_type', 'student')->count() }}</h3>
                           <span class="text-uppercase font-size-xs font-weight-semibold">Enrolled Students</span>
                           <div class="font-size-xs opacity-75 mt-1">681 UG + 300 IGNOU PG</div>
                       </div>

                       <div class="ml-3 align-self-center">
                           <i class="icon-users4 icon-3x opacity-75"></i>
                       </div>
                   </div>
               </div>
           </div>

           <div class="col-sm-6 col-xl-3">
               <div class="card card-body bg-danger-400 has-bg-image text-white">
                   <div class="media">
                       <div class="media-body">
                           <h3 class="mb-0 font-weight-bold">{{ $users->where('user_type', 'teacher')->count() }}</h3>
                           <span class="text-uppercase font-size-xs font-weight-semibold">Faculty Members</span>
                           <div class="font-size-xs opacity-75 mt-1">B.Com. & B.A.B.Ed. Faculty</div>
                       </div>

                       <div class="ml-3 align-self-center">
                           <i class="icon-user-tie icon-3x opacity-75"></i>
                       </div>
                   </div>
               </div>
           </div>

           <div class="col-sm-6 col-xl-3">
               <div class="card card-body bg-success-400 has-bg-image text-white">
                   <div class="media">
                       <div class="media-body">
                           <h3 class="mb-0 font-weight-bold">{{ $users->where('user_type', 'admin')->count() }}</h3>
                           <span class="text-uppercase font-size-xs font-weight-semibold">Leadership & Admins</span>
                           <div class="font-size-xs opacity-75 mt-1">Principal, VP, HoDs, Clerks</div>
                       </div>

                       <div class="ml-3 align-self-center">
                           <i class="icon-office icon-3x opacity-75"></i>
                       </div>
                   </div>
               </div>
           </div>

           <div class="col-sm-6 col-xl-3">
               <div class="card card-body bg-indigo-400 has-bg-image text-white">
                   <div class="media">
                       <div class="media-body">
                           <h3 class="mb-0 font-weight-bold">9,862</h3>
                           <span class="text-uppercase font-size-xs font-weight-semibold">KOHA Library Volumes</span>
                           <div class="font-size-xs opacity-75 mt-1">23 Journals | 17 Dailies</div>
                       </div>

                       <div class="ml-3 align-self-center">
                           <i class="icon-books icon-3x opacity-75"></i>
                       </div>
                   </div>
               </div>
           </div>
       </div>
    @endif

    {{-- Institutional Overview Quick Cards --}}
    <div class="row">
        <div class="col-md-3">
            <div class="card border-left-3 border-left-primary shadow-sm">
                <div class="card-body py-3">
                    <div class="d-flex align-items-center">
                        <i class="icon-tree6 icon-2x text-primary mr-3"></i>
                        <div>
                            <div class="font-weight-semibold">Prabodhan Trust</div>
                            <a href="{{ route('institutional.governance') }}" class="font-size-xs text-primary font-weight-bold">11 Sister Institutions &rarr;</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-left-3 border-left-warning shadow-sm">
                <div class="card-body py-3">
                    <div class="d-flex align-items-center">
                        <i class="icon-medal-star icon-2x text-warning mr-3"></i>
                        <div>
                            <div class="font-weight-semibold">University Rankers</div>
                            <a href="{{ route('institutional.achievements') }}" class="font-size-xs text-warning font-weight-bold">10 Goa Univ 1st Ranks &rarr;</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-left-3 border-left-success shadow-sm">
                <div class="card-body py-3">
                    <div class="d-flex align-items-center">
                        <i class="icon-link icon-2x text-success mr-3"></i>
                        <div>
                            <div class="font-weight-semibold">Strategic MoUs</div>
                            <a href="{{ route('institutional.mous') }}" class="font-size-xs text-success font-weight-bold">{{ $mous_count ?? 14 }} Active Partnerships &rarr;</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-left-3 border-left-info shadow-sm">
                <div class="card-body py-3">
                    <div class="d-flex align-items-center">
                        <i class="icon-lifebuoy icon-2x text-info mr-3"></i>
                        <div>
                            <div class="font-weight-semibold">NSS & Outreach</div>
                            <a href="{{ route('institutional.extension') }}" class="font-size-xs text-info font-weight-bold">{{ $activities_count ?? 24 }} Documented Events &rarr;</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Academic Rankers Highlights --}}
    @if(isset($rankers) && $rankers->count() > 0)
    <div class="card">
        <div class="card-header header-elements-inline bg-light">
            <h6 class="card-title font-weight-bold text-slate-800"><i class="icon-trophy3 text-warning mr-2"></i> Distinguished University First Rankers (VPCCECM Alumni)</h6>
            <a href="{{ route('institutional.achievements') }}" class="btn btn-outline-primary btn-sm">View All Achievements</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover mb-0">
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Programme / Stream</th>
                        <th>Graduation Session</th>
                        <th>University Performance</th>
                        <th>Conferring University</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rankers as $rk)
                    <tr>
                        <td class="font-weight-semibold text-primary">{{ $rk->name }}</td>
                        <td><span class="badge badge-light-primary text-primary">{{ $rk->programme }}</span></td>
                        <td>{{ $rk->year_cohort }}</td>
                        <td><span class="badge badge-success">{{ $rk->achievement }}</span></td>
                        <td>{{ $rk->organization }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif

    {{--Events Calendar Begins--}}
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title font-weight-bold"><i class="icon-calendar3 mr-2"></i> Academic & Event Calendar (Session 2026–2027)</h5>
         {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <div class="fullcalendar-basic"></div>
        </div>
    </div>
    {{--Events Calendar Ends--}}

@endsection
