@extends('layouts.adminmaster')
@section('admin_contents')
@if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success') }}',
        });
    </script>
@endif
<div class="card z-1 mb-3" id="recentPurchaseTable" data-list="{&quot;valueNames&quot;:[&quot;name&quot;,&quot;email&quot;,&quot;product&quot;,&quot;payment&quot;,&quot;amount&quot;],&quot;page&quot;:8,&quot;pagination&quot;:true}">
    <div class="card-header">
      <div class="row flex-between-center">
        <div class="col-6 col-sm-auto d-flex align-items-center pe-0">
          <h5 class="fs-9 mb-0 text-nowrap py-2 py-xl-0">All Categorie Infomations </h5>
        </div>
        <div class="col-6 col-sm-auto ms-auto text-end ps-0">
          <div class="d-none" id="table-purchases-actions">
            <div class="d-flex">
              <select class="form-select form-select-sm" id="bulk-action-select">
                <option selected disabled>Bulk actions</option>
                <option value="refund">Refund</option>
                <option value="delete">Delete</option>
                <option value="archive">Archive</option>
              </select>
              <button class="btn btn-falcon-default btn-sm ms-2" id="bulk-apply-btn" type="button">Apply</button>
            </div>
          </div>
          

          <div id="table-purchases-replace-element">
              <!-- New Button -->
            <a href="{{route('category.add')}}">
              <button class="btn btn-falcon-default btn-sm" type="button">
                <i class="fas fa-plus"></i>
                <span class="d-none d-sm-inline-block ms-1">New</span>
              </button>
            </a>

              <!-- Filter Button -->
            <a href="{{route('category.recycle')}}">
              <button class="btn btn-falcon-default btn-sm mx-2" type="button">
                <i class="fas fa-recycle"></i>
                <span class="d-none d-sm-inline-block ms-1">Recycle</span>
              </button>
            </a>

              <!-- Export Button -->
            <a href="{{route('category.add')}}">
              <button class="btn btn-falcon-default btn-sm" type="button">
                <i class="fas fa-external-link-alt"></i>
                <span class="d-none d-sm-inline-block ms-1">Export</span>
              </button>
            </a>
          </div>
        </div>
        {{-- search option  --}}
        <div class="searchess mt-4 ">
          <div class="row ">
            <div class="col-md-6">
                <form action="" method="get">
                  <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                    <button class="btn btn-outline-primary" type="submit">Reset</button>
                  </div>
                </form>
            </div>
            {{-- col end --}}
          </div>
          <!-- ক্যাটেগরি ডেটা টেবিল -->

        </div>
        {{-- search end  --}}
      </div>
    </div>

    <div class="card-body px-0 py-0">
      <div class="table-responsive scrollbar">

        <table class="table table-sm fs-10 mb-0 overflow-hidden">
          <thead class="bg-200">
            <tr class="">
              <th class="white-space-nowrap">
                <div class="form-check mb-0 d-flex align-items-center">
                  <input class="form-check-input" id="checkbox-bulk-purchases-select" type="checkbox" data-bulk-select="{&quot;body&quot;:&quot;table-purchase-body&quot;,&quot;actions&quot;:&quot;table-purchases-actions&quot;,&quot;replacedElement&quot;:&quot;table-purchases-replace-element&quot;}">
                </div>
              </th>
              <th class="text-900 sort pe-1 align-middle white-space-nowrap" data-sort="name">Name</th>
              <th class="text-900 sort pe-1 align-middle white-space-nowrap" data-sort="title">Title</th>
              <th class="text-900 sort pe-1 align-middle white-space-nowrap" data-sort="des">Description</th>
              <th class="text-900 sort pe-1 align-middle white-space-nowrap " data-sort="time">Created At </th>
              <th class="text-900 sort pe-1 align-middle white-space-nowrap " data-sort="name">Creator</th>
              <th class="text-900 sort pe-1 align-middle white-space-nowrap text-center" data-sort="status">Public Status</th>
              <th class="no-sort pe-1 align-middle data-table-row-action text-center">Manage</th>
            </tr>
          </thead>
          <tbody class="list" id="table-purchase-body">
            @foreach ($all as $data)
            <tr class="btn-reveal-trigger">
              <td class="align-middle" style="width: 28px;">
                <div class="form-check mb-0">
                  <input class="form-check-input" type="checkbox" data-bulk-select-row value="{{ $data->id }}">
                </div>
              </td>
              <td class="align-middle white-space-nowrap email">{{$data->category_name}}</td>
              <td class="align-middle white-space-nowrap product">{{$data->category_title}}</td>
              <td class="align-middle white-space-nowrap product">{{$data->category_des}}</td>
              <td class="align-middle white-space-nowrap product">{{ $data->created_at->format('d M, Y - h:i A') }}</td>
              <td class="align-middle white-space-nowrap product">razu</td>
              <td class="align-middle text-center fs-9 white-space-nowrap payment">
                @if ($data->public_status === 1)
                  <small class="badge rounded badge-subtle-success false">Public</small>
                @else
                  <small class="badge rounded badge-subtle-danger false">Private</small>
                @endif
               
              </td>
              <td class="align-middle white-space-nowrap text-end">
                <div class="dropstart font-sans-serif position-static d-inline-block">
                  <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal float-end"
                          type="button"
                          id="dropdown-recent-purchase-table-0"
                          data-bs-toggle="dropdown"
                          data-boundary="window"
                          aria-haspopup="true"
                          aria-expanded="false"
                          data-bs-reference="parent">
                    <i class="fas fa-ellipsis-h fs-10"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-recent-purchase-table-0">
                    <a class="dropdown-item" href="{{route('category.view',[$data->id, $data->slug])}}">View</a>
                    <a class="dropdown-item" href="{{route('category.edit',[$data->id, $data->slug])}}">Edit</a>
                    <!-- Hidden form to submit DELETE request -->
                    <form id="deleteForm{{ $data->id }}" action="{{ route('category.softdelete', $data->id) }}" method="POST" style="display: none;">
                      @csrf
                      @method('DELETE')
                    </form>
                    <!-- Link to trigger the delete action -->
                    <a href="javascript:void(0);" class="dropdown-item text-danger" id="deleteButton{{ $data->id }}" data-id="{{ $data->id }}">Delete</a>

                    <div class="dropdown-divider"></div>
                    @if($data->public_status === 0)
                      <a class="dropdown-item text-success" href="{{route('category.public',[$data->id, $data->slug])}}">Publish</a>
                    @else 
                     <a class="dropdown-item text-warning" href="{{route('category.private',[$data->id, $data->slug])}}">Private</a>
                    @endif 
                  </div>
                </div>
              </td>
            </tr>
            @endforeach

            {{-- tr end here  --}}

        </tbody>
        </table>

      </div>
    </div>
    <div class="card-footer">
      <div class="row align-items-center">
        <div class="pagination d-none"><li class="active"><button class="page" type="button" data-i="1" data-page="8">1</button></li><li><button class="page" type="button" data-i="2" data-page="8">2</button></li></div>
        <div class="col">
          <p class="mb-0 fs-10"><span class="d-none d-sm-inline-block me-2" data-list-info="data-list-info">1 to 8 of 14</span><span class="d-none d-sm-inline-block me-2">—</span><a class="fw-semi-bold" href="#!" data-list-view="*">View all<svg class="svg-inline--fa fa-angle-right fa-w-8 ms-1" data-fa-transform="down-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="" style="transform-origin: 0.25em 0.5625em;"><g transform="translate(128 256)"><g transform="translate(0, 32)  scale(1, 1)  rotate(0 0 0)"><path fill="currentColor" d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z" transform="translate(-128 -256)"></path></g></g></svg><!-- <span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span> Font Awesome fontawesome.com --></a><a class="fw-semi-bold d-none" href="#!" data-list-view="less">View less<svg class="svg-inline--fa fa-angle-right fa-w-8 ms-1" data-fa-transform="down-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="" style="transform-origin: 0.25em 0.5625em;"><g transform="translate(128 256)"><g transform="translate(0, 32)  scale(1, 1)  rotate(0 0 0)"><path fill="currentColor" d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z" transform="translate(-128 -256)"></path></g></g></svg><!-- <span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span> Font Awesome fontawesome.com --></a></p>
        </div>
        <div class="col-auto d-flex"><button class="btn btn-sm btn-primary disabled" type="button" data-list-pagination="prev" disabled=""><span>Previous</span></button><button class="btn btn-sm btn-primary px-4 ms-2" type="button" data-list-pagination="next"><span>Next</span></button></div>
      </div>

      <div class="card_footer mt-4 mb-1">
        <button class="btn btn-falcon-primary me-1 mb-1" type="button">Primary</button>
        <button class="btn btn-falcon-success me-1 mb-1" type="button">Success</button>
        <button class="btn btn-falcon-info me-1 mb-1" type="button">Info</button>
        <button class="btn btn-falcon-warning me-1 mb-1" type="button">Warning</button>
        <button class="btn btn-falcon-danger me-1 mb-1" type="button">Danger</button>
        <button class="btn btn-falcon-default me-1 mb-1" type="button">Default</button>
      </div>

    </div>
  </div>
@endsection


