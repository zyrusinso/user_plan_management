<div>
    @include('content-header', ['headerTitle' => "Dashboard"])

    <div class="row mt-2">
        <div class="col-md-3 col-sm-6 col-12 text-center">
            <div class="info-box bg-gradient-success">
                <div class="info-box-content">
                    <span class="info-box-text" style="font-size: 13px">New Users</span>
                    <span class="info-box-number" style="font-size: 25px; ">{{ count($this->newUsers()) }}</span>
                    <div class="progress">
                        <hr/>
                    </div>
                    <span class="progress-description">
                        <a href="{{ route('dashboard.user', ['ref' => 'new']) }}" class="small-box-footer text-white" style="text-decoration: none !important">
                        <i class="fas fa-users"></i> View List <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12 text-center">
            <div class="info-box bg-gradient-info">
                <div class="info-box-content">
                    <span class="info-box-text" style="font-size: 13px">Active Users</span>
                    <span class="info-box-number" style="font-size: 25px; ">{{ count($this->activeUsers()) }}</span>
                    <div class="progress">
                        <hr/>
                    </div>
                    <span class="progress-description">
                        <a href="{{ route('dashboard.user', ['ref' => 'active']) }}" class="small-box-footer text-white" style="text-decoration: none !important">
                        <i class="fas fa-users"></i> View List <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12 text-center">
            <div class="info-box bg-orange">
                <div class="info-box-content">
                    <span class="info-box-text text-white" style="font-size: 13px">Inactive Users</span>
                    <span class="info-box-number text-white" style="font-size: 25px; ">{{ count($this->inActiveUsers()) }}</span>
                    <div class="progress">
                        <hr/>
                    </div>
                    <span class="progress-description">
                        <a href="{{ route('dashboard.user', ['ref' => 'inactive']) }}" class="small-box-footer text-white" style="text-decoration: none !important">
                        <i class="fas fa-users"></i> View List <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Top Up</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects table-sm">
                    <thead>
                        <tr>
                            <th style="width: 1%">
                                #
                            </th>
                            <th style="">
                                Username
                            </th>
                            <th style="">
                                Description
                            </th>
                            <th>
                                Plan
                            </th>
                            <th style="" class="text-center">
                                Status
                            </th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    <a>
                                        {{ $this->userData($item->user_id)->username }}
                                    </a>
                                    <br />
                                    <small>
                                        {{ \Carbon\Carbon::parse($item->created_at)->format('F d Y') }}
                                    </small>
                                </td>
                                <td>
                                    {{ $this->planData($item->plan_id)->description }}
                                </td>
                                <td class="project_progress">
                                {{ $this->planData($item->plan_id)->name }}
                                </td>
                                <td class="project-state">
                                    <span class="badge {{ $this->statusBadge()[$item->status] }}">{{ $item->status }}</span>
                                </td>
                                <!-- <td class="project-actions text-right">
                                    <a class="btn btn-primary btn-sm" href="#">
                                        <i class="fas fa-folder">
                                        </i>
                                        View
                                    </a>
                                    <a class="btn btn-info btn-sm" href="#">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="#">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </a>
                                </td> -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
</div>
