@extends('layouts.adminmaster')
@section('admin_contents')
<div class="card z-1 mb-3" id="recentPurchaseTable" data-list="{&quot;valueNames&quot;:[&quot;name&quot;,&quot;email&quot;,&quot;product&quot;,&quot;payment&quot;,&quot;amount&quot;],&quot;page&quot;:8,&quot;pagination&quot;:true}">
    <div class="card-header">
      <div class="row flex-between-center">
        <div class="col-6 col-sm-auto d-flex align-items-center pe-0">
          <h5 class="fs-9 mb-0 text-nowrap py-2 py-xl-0">All Categorie Infomations </h5>
        </div>
        <div class="col-6 col-sm-auto ms-auto text-end ps-0">
          <div class="d-none" id="table-purchases-actions">
            <div class="d-flex"><select class="form-select form-select-sm" aria-label="Bulk actions">
                <option selected="">Bulk actions</option>
                <option value="Refund">Refund</option>
                <option value="Delete">Delete</option>
                <option value="Archive">Archive</option>
              </select><button class="btn btn-falcon-default btn-sm ms-2" type="button">Apply</button></div>
          </div>
          <div id="table-purchases-replace-element">
            <button class="btn btn-falcon-default btn-sm" type="button">
                <span class="d-none d-sm-inline-block ms-1">Recycle</span>
             </button>
            <button class="btn btn-falcon-default btn-sm" type="button">
                <span class="d-none d-sm-inline-block ms-1"><a href="{{route('category.add')}}">Add New Item</a> </span>
             </button>
            <button class="btn btn-falcon-default btn-sm mx-2" type="button">
                <svg class="svg-inline--fa fa-filter fa-w-16" data-fa-transform="shrink-3 down-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="filter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.625em;"><g transform="translate(256 256)"><g transform="translate(0, 64)  scale(0.8125, 0.8125)  rotate(0 0 0)"><path fill="currentColor" d="M487.976 0H24.028C2.71 0-8.047 25.866 7.058 40.971L192 225.941V432c0 7.831 3.821 15.17 10.237 19.662l80 55.98C298.02 518.69 320 507.493 320 487.98V225.941l184.947-184.97C520.021 25.896 509.338 0 487.976 0z" transform="translate(-256 -256)"></path></g></g></svg><!-- <span class="fas fa-filter" data-fa-transform="shrink-3 down-2"></span> Font Awesome fontawesome.com -->
                <span class="d-none d-sm-inline-block ms-1">Filter</span>
            </button>
            <button class="btn btn-falcon-default btn-sm" type="button"><svg class="svg-inline--fa fa-external-link-alt fa-w-16" data-fa-transform="shrink-3 down-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="external-link-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.625em;"><g transform="translate(256 256)"><g transform="translate(0, 64)  scale(0.8125, 0.8125)  rotate(0 0 0)"><path fill="currentColor" d="M432,320H400a16,16,0,0,0-16,16V448H64V128H208a16,16,0,0,0,16-16V80a16,16,0,0,0-16-16H48A48,48,0,0,0,0,112V464a48,48,0,0,0,48,48H400a48,48,0,0,0,48-48V336A16,16,0,0,0,432,320ZM488,0h-128c-21.37,0-32.05,25.91-17,41l35.73,35.73L135,320.37a24,24,0,0,0,0,34L157.67,377a24,24,0,0,0,34,0L435.28,133.32,471,169c15,15,41,4.5,41-17V24A24,24,0,0,0,488,0Z" transform="translate(-256 -256)"></path></g></g></svg><!-- <span class="fas fa-external-link-alt" data-fa-transform="shrink-3 down-2"></span> Font Awesome fontawesome.com -->
                <span class="d-none d-sm-inline-block ms-1">Export</span>
            </button>
            </div>
        </div>
      </div>
    </div>
    <div class="card-body px-0 py-0">
      <div class="table-responsive scrollbar">
        <table class="table table-sm fs-10 mb-0 overflow-hidden">
          <thead class="bg-200">
            <tr class="">
              <th class="white-space-nowrap">
                <div class="form-check mb-0 d-flex align-items-center"><input class="form-check-input" id="checkbox-bulk-purchases-select" type="checkbox" data-bulk-select="{&quot;body&quot;:&quot;table-purchase-body&quot;,&quot;actions&quot;:&quot;table-purchases-actions&quot;,&quot;replacedElement&quot;:&quot;table-purchases-replace-element&quot;}"></div>
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
                <div class="form-check mb-0"><input class="form-check-input" type="checkbox" id="recent-purchase-0" data-bulk-select-row="data-bulk-select-row"></div>
              </td>
              <td class="align-middle white-space-nowrap email">{{$data->çategory_name}}</td>
              <td class="align-middle white-space-nowrap product">{{$data->çategory_title}}</td>
              <td class="align-middle white-space-nowrap product">{{$data->çategory_des}}</td>
              <td class="align-middle white-space-nowrap product">{{ $data->created_at->format('d M, Y - h:i A') }}</td>
              <td class="align-middle white-space-nowrap product">razu</td>
              <td class="align-middle text-center fs-9 white-space-nowrap payment"><small class="badge rounded badge-subtle-success false">Success</small></td>
              <td class="align-middle white-space-nowrap text-end">
                <div class="dropstart font-sans-serif position-static d-inline-block"><button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal float-end" type="button" id="dropdown-recent-purchase-table-0" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><svg class="svg-inline--fa fa-ellipsis-h fa-w-16 fs-10" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ellipsis-h" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M328 256c0 39.8-32.2 72-72 72s-72-32.2-72-72 32.2-72 72-72 72 32.2 72 72zm104-72c-39.8 0-72 32.2-72 72s32.2 72 72 72 72-32.2 72-72-32.2-72-72-72zm-352 0c-39.8 0-72 32.2-72 72s32.2 72 72 72 72-32.2 72-72-32.2-72-72-72z"></path></svg><!-- <span class="fas fa-ellipsis-h fs-10"></span> Font Awesome fontawesome.com --></button>
                  <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-recent-purchase-table-0">
                    <a class="dropdown-item" href="{{route('category.view',[$data->id, $data->slug])}}">View</a>
                    <a class="dropdown-item" href="#!">Edit</a>
                    <a class="dropdown-item" href="#!">Refund</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-warning" href="#!">Archive</a>
                    <a class="dropdown-item text-danger" href="#!">Delete</a>
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
    </div>
  </div>
@endsection