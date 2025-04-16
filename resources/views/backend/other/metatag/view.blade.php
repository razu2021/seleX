@extends('layouts.adminmaster')
@section('admin_contents')
@push('scripts')
<script>
  const bulkActionUrl = "{{ route('metatag.bulkAction') }}";
  const csrfToken = "{{ csrf_token() }}";
</script>
@endpush
    <main>
        <div class="container">
            <div class="card mb-3">
                <div class="card-body">
                  <div class="row flex-between-center">
                    <div class="col-md">
                      <h5 class="mb-2 mb-md-0">Categorie Detail's</h5>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-link text-secondary p-0 me-3 fw-medium" role="button"><a href="{{route('category.add')}}">Discard</a></button>
                        <button class="btn btn-primary" role="button"> <a class="text-white" href="{{route('category.all')}}">All Items </a> </button>
                    </div>
                  </div>
                </div>
              </div>
            <div class="row">
                <div class="col-lg-8">

                    <div class="card mb-3">
                        <div class="card-header bg-body-tertiary">
                          <h5 class="mb-0">Categorie information</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                
                                <tbody>
                                  <tr>
                                    <td>Model Type</td>
                                    <td><i class="bi bi-chevron-double-right"></i></td>
                                    <td>{{$data->model_type}}</td>
                                  </tr>
                                  <tr>
                                    <td>Model ID</td>
                                    <td><i class="bi bi-chevron-double-right"></i></td>
                                    <td>{{$data->unique_id}}</td>
                                  </tr>
                                 
                                </tbody>
                              </table>
                        </div>
                      </div>
                      {{-- card end  --}}
                    <div class="card mb-3">
                        <div class="card-header bg-body-tertiary d-flex justify-content-between">
                          <div>
                            <h5 class="mb-0">Meta information</h5>
                          </div>
                          <div>
                            <div class="dropdown font-sans-serif d-inline-block mb-2">
                              <button class="btn btn-falcon-success dropdown-toggle" id="dropdownMenuButton" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Manage</button>
                              <div class="dropdown-menu dropdown-menu-end py-0" aria-labelledby="dropdownMenuButton">
                               
                                <a class="dropdown-item" href="{{route('metatag.edit',[$data->id,$data->model_type, $data->slug])}}">Update Information</a>
                                <div class="dropdown-divider"></div>
                                @if ($data->public_status === 0)
                                <a class="dropdown-item" href="{{route('metatag.public',[$data->id, $data->slug])}}">Published</a>
                                @else
                                <a class="dropdown-item" href="{{route('metatag.private',[$data->id, $data->slug])}}">Unpublished</a>
                                @endif
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"> </a>
                              </div>
                            </div>

                          
                          </div>
                        </div>
                        <div class="card-header bg-body-tertiary">
                            <ul class="nav nav-pills" id="pill-myTab" role="tablist">
                                <li class="nav-item"><a class="nav-link active" id="pill-google-tab" data-bs-toggle="tab" href="#pill-tab-google" role="tab" aria-controls="pill-tab-google" aria-selected="true"><i class="bi bi-google"></i></a></li>
                                <li class="nav-item"><a class="nav-link" id="pill-facebook-tab" data-bs-toggle="tab" href="#pill-tab-facebook" role="tab" aria-controls="pill-tab-facebook" aria-selected="false"><i class="bi bi-facebook"></i></a></li>
                                <li class="nav-item"><a class="nav-link" id="pill-twitter-tab" data-bs-toggle="tab" href="#pill-tab-twitter" role="tab" aria-controls="pill-tab-twitter" aria-selected="false"><i class="bi bi-twitter"></i> </a></li>
                                <li class="nav-item"><a class="nav-link" id="pill-whatsapp-tab" data-bs-toggle="tab" href="#pill-tab-whatsapp" role="tab" aria-controls="pill-tab-whatsapp" aria-selected="false"><i class="bi bi-whatsapp"></i></a></li>
                                <li class="nav-item"><a class="nav-link" id="pill-pin-tab" data-bs-toggle="tab" href="#pill-tab-pin" role="tab" aria-controls="pill-tab-pin" aria-selected="false"><i class="bi bi-pinterest"></i> pin</a></li>
                                <li class="nav-item"><a class="nav-link" id="pill-seo_image-tab" data-bs-toggle="tab" href="#pill-tab-seo_image" role="tab" aria-controls="pill-tab-seo_image" aria-selected="false"><i class="bi bi-pinterest"></i> Images</a></li>
                              </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content border p-3 mt-3" id="pill-myTabContent">
                                <div class="tab-pane fade show active" id="pill-tab-google" role="tabpanel" aria-labelledby="google-tab">
                                    <table class="table table-bordered">
                                        <tbody>
                                          <tr>
                                            <td>Meta Title </td>
                                            <td><i class="bi bi-chevron-double-right"></i></td>
                                            <td>{{$data->meta_title ?? 'No Data Available !'}}</td>
                                          </tr>
                                          <tr>
                                            <td>Meta Description </td>
                                            <td><i class="bi bi-chevron-double-right"></i></td>
                                            <td>{{$data->meta_description ?? 'No Data Available !'}}</td>
                                          </tr>
                                          <tr>
                                            <td>Meta Keywords </td>
                                            <td><i class="bi bi-chevron-double-right"></i></td>
                                            <td>
                                              @php
                                                  $keywords = explode(',', $data->meta_keywords ?? '');
                                              @endphp
                                          
                                              @forelse($keywords as $keyword)
                                                  <span class="badge bg-primary me-1 mb-1">{{ $keyword }}</span>
                                              @empty
                                                  <span class="text-danger">No Data Available !</span>
                                              @endforelse
                                          </td>
                                          </tr>
                                          <tr>
                                            <td>Meta Robots </td>
                                            <td><i class="bi bi-chevron-double-right"></i></td>
                                            <td>{{$data->meta_robots ?? 'No Data Available !'}}</td>
                                          </tr>
                                          <tr>
                                            <td>Canonicale Url  </td>
                                            <td><i class="bi bi-chevron-double-right"></i></td>
                                            <td>{{$data->canonical_url ?? 'No Data Available !'}}</td>
                                          </tr>
                                          <tr>
                                            <td>hreflang tags  </td>
                                            <td><i class="bi bi-chevron-double-right"></i></td>
                                            <td>{{$data->hreflang_tags ?? 'No Data Available !'}}</td>
                                          </tr>
                                          <tr>
                                            <td>Structured Data  </td>
                                            <td><i class="bi bi-chevron-double-right"></i></td>
                                            <td>{{$data->structured_data ?? 'No Data Available !'}}</td>
                                          </tr>
                                        </tbody>
                                    </table>
                                </div>
                                {{-- tab end  --}}
                                <div class="tab-pane fade" id="pill-tab-facebook" role="tabpanel" aria-labelledby="facebook-tab">
                                    <table class="table table-bordered">
                                        <tbody>
                                          <tr>
                                            <td>Og Title</td>
                                            <td><i class="bi bi-chevron-double-right"></i></td>
                                            <td>{{$data->og_title ?? 'No Data Available'}}</td>
                                          </tr>
                                          <tr>
                                            <td>Og Description</td>
                                            <td><i class="bi bi-chevron-double-right"></i></td>
                                            <td>{{$data->og_description ?? 'No Data Available'}}</td>
                                          </tr>
                                          <tr>
                                            <td>Og url</td>
                                            <td><i class="bi bi-chevron-double-right"></i></td>
                                            <td>{{$data->og_url ?? 'No Data Available'}}</td>
                                          </tr>
                                          <tr>
                                            <td>Og Type</td>
                                            <td><i class="bi bi-chevron-double-right"></i></td>
                                            <td>{{$data->og_type ?? 'No Data Available'}}</td>
                                          </tr>
                                          <tr>
                                            <td>Og Locale</td>
                                            <td><i class="bi bi-chevron-double-right"></i></td>
                                            <td>{{$data->og_locale ?? 'No Data Available'}}</td>
                                          </tr>
                                        </tbody>
                                    </table>
                                </div>
                                {{-- tab end --}}
                                <div class="tab-pane fade" id="pill-tab-twitter" role="tabpanel" aria-labelledby="twitter-tab">
                                    <table class="table table-bordered">
                                        <tbody>
                                          <tr>
                                            <td>Twitter Card</td>
                                            <td><i class="bi bi-chevron-double-right"></i></td>
                                            <td>{{$data->twitter_card ?? 'No Data Available'}}</td>
                                          </tr>
                                          <tr>
                                            <td>Twitter Card</td>
                                            <td><i class="bi bi-chevron-double-right"></i></td>
                                            <td>{{$data->twitter_title ?? 'No Data Available'}}</td>
                                          </tr>
                                          <tr>
                                            <td>Twitter Description</td>
                                            <td><i class="bi bi-chevron-double-right"></i></td>
                                            <td>{{$data->twitter_description ?? 'No Data Available'}}</td>
                                          </tr>
                                          <tr>
                                            <td>Twitter Description</td>
                                            <td><i class="bi bi-chevron-double-right"></i></td>
                                            <td>{{$data->twitter_site ?? 'No Data Available'}}</td>
                                          </tr>
                                        </tbody>
                                    </table>
                                </div>
                                {{-- tab end --}}
                                <div class="tab-pane fade" id="pill-tab-whatsapp" role="tabpanel" aria-labelledby="whatsapp-tab">
                                    <table class="table table-bordered">
                                        <tbody>
                                          <tr>
                                            <td>Whatsapp Title</td>
                                            <td><i class="bi bi-chevron-double-right"></i></td>
                                            <td>{{$data->whatsapp_title ?? 'No Data Available'}}</td>
                                          </tr>
                                          <tr>
                                            <td>Whatsapp Description</td>
                                            <td><i class="bi bi-chevron-double-right"></i></td>
                                            <td>{{$data->whatsapp_description ?? 'No Data Available'}}</td>
                                          </tr>
                                        </tbody>
                                    </table>
                                </div>
                                {{-- tab end --}}
                                <div class="tab-pane fade" id="pill-tab-pin" role="tabpanel" aria-labelledby="pin-tab">
                                    <table class="table table-bordered">
                                        <tbody>
                                          <tr>
                                            <td>Pinterest Description</td>
                                            <td><i class="bi bi-chevron-double-right"></i></td>
                                            <td>{{$data->pinterest_description ?? 'No Data Available'}}</td>
                                          </tr>
                                          <tr>
                                            <td>Pinterest Description</td>
                                            <td><i class="bi bi-chevron-double-right"></i></td>
                                            <td>{{$data->pinterest_rich_pin ?? 'No Data Available'}}</td>
                                          </tr>
                                        </tbody>
                                    </table>
                                </div>
                                {{-- tab end --}}
                                <div class="tab-pane fade" id="pill-tab-seo_image" role="tabpanel" aria-labelledby="seo_image-tab">
                                  <div class="card z-1 mb-3" id="recentPurchaseTable" data-list="{&quot;valueNames&quot;:[&quot;name&quot;,&quot;email&quot;,&quot;product&quot;,&quot;payment&quot;,&quot;amount&quot;],&quot;page&quot;:8,&quot;pagination&quot;:true}">
                                    <div class="card-header">
                                      <div class="row flex-between-center">
                                        <div class="col-6 col-sm-auto ms-auto text-end ps-0">
                                          <div class="d-none" id="table-purchases-actions">
                                            <div class="d-flex">
                                              <select class="form-select form-select-sm" id="bulk-action-select">
                                                <option selected disabled>Bulk actions</option>
                                                <option value="delete_images">Delete</option>
                                                
                                              </select>
                                              <button class="btn btn-falcon-default btn-sm ms-2" id="bulk-apply-btn" type="button">Apply</button>
                                            </div>
                                          </div>
                                          
                                
                                          <div id="table-purchases-replace-element" class="d-flex align-items-center">
                                              <!-- New Button -->
                                            <a href="javascript::voied(0)" data-bs-toggle="modal" data-bs-target="#add_seo_image">
                                              <button class="btn btn-falcon-default btn-sm" type="button">
                                                <i class="fas fa-plus"></i>
                                                <span class="d-none d-sm-inline-block ms-1">New</span>
                                              </button>
                                            </a>
                                
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
                                                <div class="form-check mb-0 d-flex align-items-center">
                                                  <input class="form-check-input" id="checkbox-bulk-purchases-select" type="checkbox" data-bulk-select="{&quot;body&quot;:&quot;table-purchase-body&quot;,&quot;actions&quot;:&quot;table-purchases-actions&quot;,&quot;replacedElement&quot;:&quot;table-purchases-replace-element&quot;}">
                                                </div>
                                              </th>
                                              <th class="text-900 sort pe-1 align-middle white-space-nowrap" data-sort="name">Model Type</th>
                                              <th class="text-900 sort pe-1 align-middle white-space-nowrap" data-sort="title">image</th>
                                              <th class="no-sort pe-1 align-middle data-table-row-action text-center">Manage</th>
                                            </tr>
                                          </thead>
                                          <tbody class="list" id="table-purchase-body">
                                           @foreach ($data->images as $image )
                                            <tr class="btn-reveal-trigger">
                                              <td class="align-middle" style="width: 28px;">
                                                <div class="form-check mb-0">
                                                  <input class="form-check-input" type="checkbox" data-bulk-select-row value="{{ $image->id }}">
                                                </div>
                                              </td>
                                              <td class="align-middle white-space-nowrap email">{{$image->model_type}}</td>
                                              <td class="align-middle white-space-nowrap product">
                                                @if (!empty($image))
                                                <img src="{{asset('storage/uploads/seo/'.$image->image_name)}}" alt="image" height="80px">
                                                @else
                                                <img src="{{ asset('uploads/avater.jpg') }}" alt="SEO Image" height="80px" width="auto" style="border: 1px solid #000">
                                                @endif
                                              </td>
                                              
                                              <td class="align-middle white-space-nowrap text-end">
                                                <div class="dropstart font-sans-serif position-static d-inline-block">
                                                  <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal float-end"
                                                          type="button" id="dropdown-recent-purchase-table-0"data-bs-toggle="dropdown"data-boundary="window"aria-haspopup="true"aria-expanded="false"data-bs-reference="parent">
                                                    <i class="fas fa-ellipsis-h fs-10"></i>
                                                  </button>
                                                  <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-recent-purchase-table-0">
                                                    <a class="dropdown-item" href="javascript::voied(0)"  data-bs-toggle="modal" data-bs-target="#edit_seo_image{{$image->id}}">Edit</a>
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
                                   
                                  </div>
                                </div>
                                {{-- tab end --}}



                            </div>
                        </div>
                      </div>
                      {{-- card end  --}}






                </div>
                
                <div class="col-lg-4">
                      <div class="card">
                        <div class="card-header d-flex flex-between-center py-2 border-bottom bg-body-tertiary">
                          <h4 class="mb-0">Post information </h4>
                        </div>
                        <div class="card-body d-flex flex-column justify-content-between">
                          <div class="row align-items-center">
                            <div class="col-md-5 col-xxl-12 mb-xxl-1">
                                <div class="row text-center justify-content-center">                
                                    <div class="col-auto position-relative">
                                    <div class="echart-product-share" _echarts_instance_="ec_1743616191403" style="user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); position: relative;"><div style="position: relative; width: 106px; height: 106px; padding: 0px; margin: 0px; border-width: 0px; cursor: pointer;"><canvas data-zr-dom-id="zr_0" width="106" height="106" style="position: absolute; left: 0px; top: 0px; width: 106px; height: 106px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div><div class="" style="position: absolute; display: block; border-style: solid; white-space: nowrap; z-index: 9999999; box-shadow: rgba(0, 0, 0, 0.2) 1px 2px 10px; background-color: rgb(249, 250, 253); border-width: 1px; border-radius: 4px; color: rgb(11, 23, 39); font: 14px / 21px &quot;Microsoft YaHei&quot;; padding: 7px 10px; top: 0px; left: 0px; transform: translate3d(-68px, 11px, 0px); border-color: rgb(216, 226, 239); pointer-events: none; visibility: hidden; opacity: 0;"><strong>Sparrow:</strong> 20.65%</div></div>
                                    <div class="position-absolute top-50 start-50 translate-middle text-1100 fs-7">{{$data->id}}</div> 
                                    </div>
                                </div>
                                <div class="mt-4 ">
                                    @if ($data->public_status === 0 )
                                        <h6 class="bg-danger p-1 rounded-1 text-white"> <strong> Public Status : </strong> Private </h6>   
                                    @else
                                        <h6 class="bg-success p-1 rounded-1 text-white"><strong> Public Status : </strong>  Published </h6>
                                    @endif      
                                </div>   
                            </div>
                            <div class="col-xxl-12 col-md-7">
                              <hr class="mx-nx1 mb-0 d-md-none d-xxl-block">
                              <div class="">
                                <div class="d-flex border-bottom py-2">
                                    <h6><span class="text-success px-1"> <i class="bi bi-info-circle"></i> </span> <strong class="px-2"> Created at :  </strong> {{ $data->created_at->format('d M, Y - h:i A') }}  </h6>
                                </div>
                                <div class="d-flex border-bottom py-2 ">
                                    <h6><span class="text-success px-1"> <i class="bi bi-info-circle"></i> </span> <strong class="px-2"> Updated at : </strong> {{ $data->updated_at->format('d M, Y - h:i A') }}  </h6>
                                </div>
                                <div class="d-flex border-bottom py-2 ">
                                    <h6><span class="text-success px-1"> <i class="bi bi-info-circle"></i> </span> <strong class="px-2"> Created by :  </strong> {{ $data->creator->name }}  </h6>
                                </div>
                                <div class="d-flex border-bottom py-2 ">
                                    <h6><span class="text-success px-1"> <i class="bi bi-info-circle"></i> </span> <strong class="px-2"> Updated by :  </strong>
                                        @if (!empty($data->editor->name))
                                            <h6> {{$data->editor->name }}</h6>
                                        @else
                                            <h6> No Name Available </h6>
                                        @endif  
                                    </h6>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      {{-- card end --}}
                </div>
                 {{--  col end  --}}
            </div>
        </div>
    </main>

{{--   modal for add another seo image  --}}
<form action="{{route('metatag.add_seo_image')}}" method="post" enctype="multipart/form-data">
  @csrf
<div class="modal fade" id="add_seo_image" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px">
    <div class="modal-content position-relative">
      <div class="position-absolute top-0 end-0 mt-2 me-2 z-1">
        <button type="button" class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-0">
        <div class="rounded-top-3 py-3 ps-4 pe-6 bg-body-tertiary">
          <h4 class="mb-1" id="modalExampleDemoLabel">Add a new Image </h4>
        </div>
        <div class="p-4 pb-0">
            <input type="text" name="seo_id" value="{{$data->id}}">
            <input type="text" name="model_type" value="{{$data->model_type}}">
            <div class="mb-3">
              <label class="col-form-label" for="message-text">Upload image:</label>
              <input class="form-control" name="images[]" id="imageInput" type="file" multiple>
            </div>
            
         
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="submit">Upload </button>
      </div>
    </div>
  </div>
</div>
</form>

{{--   modal for add another seo image  --}}
@foreach ( $data->images as $image)
<form action="{{route('metatag.update_seo_image')}}" method="post" enctype="multipart/form-data">
  @csrf
<div class="modal fade" id="edit_seo_image{{$image->id}}" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px">
    <div class="modal-content position-relative">
      <div class="position-absolute top-0 end-0 mt-2 me-2 z-1">
        <button type="button" class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-0">
        <div class="rounded-top-3 py-3 ps-4 pe-6 bg-body-tertiary">
          <h4 class="mb-1" id="modalExampleDemoLabel">Update a new Image </h4>
        </div>
        <div class="p-4 pb-0">
         
            <div class="p-4 pb-0">
              <input type="text" name="id" value="{{$image->id}}">
              <input type="text" name="seo_id" value="{{$data->id}}">
              <input type="text" name="model_type" value="{{$data->model_type}}">
              <div class="mb-3">
                <label class="col-form-label" for="message-text">Upload image:</label>
                <input class="form-control" name="images" type="file">
              </div>

              <div class="pt-4 pb-4">
                @if (!empty($image))
                  <img src="{{asset('storage/uploads/seo/'.$image->image_name)}}" alt="image" height="80px">
                @else
                  <img src="{{ asset('uploads/avater.jpg') }}" alt="SEO Image" height="80px" width="auto" style="border: 1px solid #000">
                @endif
              </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        
        <button class="btn btn-primary" type="submit">Update </button>
      </div>
    </div>
  </div>
</div>
</form>
@endforeach


@endsection