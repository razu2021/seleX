@extends('layouts.adminmaster')
@section('admin_contents')
    <main>
        <div class="container">
            <div class="card mb-3">
                <div class="card-body">
                  <div class="row flex-between-center">
                    <div class="col-md">
                      <h5 class="mb-2 mb-md-0">Update a Sub Categorie</h5>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-link text-secondary p-0 me-3 fw-medium" role="button"><a href="{{route('childcategory.add')}}">Discard</a></button>
                        <button class="btn btn-primary" role="button"> <a class="text-white" href="{{route('childcategory.all')}}">All Items </a> </button>
                    </div>
                  </div>
                </div>
              </div>
          <form action="{{route('childcategory.update')}}" method="post" enctype="multipart/form-data">
          @csrf
            <div class="row">
                <div class="col-lg-8">
                    <div class="card mb-3">
                        <div class="card-header bg-body-tertiary">
                          <h6 class="mb-0">Update Categorie information</h6>
                        </div>
                        <div class="card-body">
                            <div class="row gx-2">
                                {{-- input hidden --}}
                                @foreach($data->metaData->images as $image)
                                    <input class="form-control" name="seo_ids[]" id="seo_id" type="hidden" value="{{$image->seo_id}}">
                                    <input class="form-control" name="table_ids[]" id="table_ids" type="hidden" value="{{$image->id}}">
                                @endforeach
                                <input class="form-control" name="id" id="id" type="hidden" value="{{$data->id}}">
                                <input class="form-control" name="slug" id="slug" type="hidden" value="{{$data->slug}}">
                                {{-- input hidden --}}
                                <div class="col-12 mb-1">
                                  <label for="category_id">Select Category</label>
                                   <select name="category_id" id="category_id" class="form-control">
                                      <option value="{{$data->Category->id}}">{{$data->Category->category_name}}</option>
                                      @foreach ($allcategory as $allcate)
                                        <option value="{{$allcate->id}}">{{$allcate->category_name}}</option>
                                      @endforeach
                                      

                                   </select>
                                    <label class="text-danger fw-medium">@error('child_category_name') {{$message}} @enderror</label>
                                </div>
                                <div class="col-12 mb-1">
                                    <label class="form-label" for="child_category_name">Sub Categorie Name:</label>
                                    <input class="form-control" name="child_category_name" id="child_category_name" type="text" value="{{$data->child_category_name}}">
                                    <label class="text-danger fw-medium">@error('child_category_name') {{$message}} @enderror</label>
                                </div>
                                <div class="col-12 mb-1">
                                    <label class="form-label" for="child_category_title">Sub Categorie Title:</label>
                                    <input class="form-control" name="child_category_title" id="child_category_title" type="text" value="{{$data->child_category_title}}">
                                    <label class="text-danger fw-medium">@error('category_title') {{$message}} @enderror</label>
                                </div>
                                <div class="col-12 mb-1">
                                    <label class="form-label" for="child_category_desc">Categorie Descriptions:</label>
                                    <input class="form-control" name="child_category_desc" id="child_category_desc" type="text" value="{{$data->child_category_des}}">
                                    <label class="text-danger fw-medium" >@error('child_category_desc') {{$message}} @enderror</label>
                                </div>
                            </div>
                        </div>
                      </div>
                </div>
                {{-- card end --}}
                <div class="col-lg-4 ">
                  <div class="sidebar_wrapper">
                    <div class="sidebar_card">
                        <div class="card mb-4">
                          <div class="sidebar_header bg-body-tertiary">
                            <h4 class="p-2"> Categorie's information</h4>
                        </div>
                        <div class="card-body">
                          <div class="row  justify-content-center g-0">                       
                            <div class="col-auto position-relative">
                              <div class="echart-product-share" _echarts_instance_="ec_1743616191403" style="user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); position: relative;"><div style="position: relative; width: 106px; height: 106px; padding: 0px; margin: 0px; border-width: 0px; cursor: pointer;"><canvas data-zr-dom-id="zr_0" width="106" height="106" style="position: absolute; left: 0px; top: 0px; width: 106px; height: 106px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div><div class="" style="position: absolute; display: block; border-style: solid; white-space: nowrap; z-index: 9999999; box-shadow: rgba(0, 0, 0, 0.2) 1px 2px 10px; background-color: rgb(249, 250, 253); border-width: 1px; border-radius: 4px; color: rgb(11, 23, 39); font: 14px / 21px &quot;Microsoft YaHei&quot;; padding: 7px 10px; top: 0px; left: 0px; transform: translate3d(-68px, 11px, 0px); border-color: rgb(216, 226, 239); pointer-events: none; visibility: hidden; opacity: 0;"><strong>Sparrow:</strong> 20.65%</div></div>
                              <div class="position-absolute top-50 start-50 translate-middle text-1100 fs-7">{{ $data->id}} </div> 
                            </div>
                          </div>
                        </div>
                        <div class=" bg-body-tertiary text-center">
                          @if(!empty($data->updated_at))
                            <h6 class="p-2">Last Updated At : {{ $data->updated_at->format('d M, Y - h:i A') }}</h6>
                          @else
                          <h6 class="p-2">Not Update Data !</h6>
                          @endif
                        </div>
                      </div>
                      <div class="card">
                          <div class="card-body">
                            <div class="col-12">
                              <label class="form-label" for="custom_url">Categorie Url:</label>
                              <input class="form-control" name="custom_url" id="custom_url" type="text" value="{{$data->child_category_url}}">
                              
                            </div>
                          </div>
                      </div>
                      {{-- card end --}}
                    </div>
                    {{-- card end  --}}
                  </div>
                </div>
            </div> 
            {{-- row end  --}}
            <div class="row mx-2">
              <div class="card mt-3 ">
                <div class="card-body mx-4">
                  <div class="row flex-between-center">
                    <div class="col-md">
                      <h5 class="mb-2 mb-md-0">Your're Almost Done</h5>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-primary " role="button"> Submit information </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
            {{-- form end --}}
        </div>
    </main>


    
    <div class="col-12">
      <label class="form-label" for="meta_keywords">Meta Keywords:</label>
      <input type="text" id="keyword-input" placeholder="Type and press space..." class="form-control">
  
      <div id="tag-container" style="margin-top: 10px;"></div>
  
      <!-- Hidden input to store updated keywords -->
      <input class="form-control" name="meta_keywords" id="meta_keywords" type="hidden" value="{{ old('meta_keywords', $data->metaData->meta_keywords) }}">
  </div>
  
  <div class="col-12">
    <label class="form-label" for="meta_keywords">Meta Keywords:</label>
    <input type="text" id="keyword-input" placeholder="Type and press space..." class="form-control">

    <div id="tag-container" style="margin-top: 10px;"></div>

    <!-- Hidden input to store updated keywords -->
    <input class="form-control" name="meta_keywords" id="meta_keywords" type="hidden" value="{{ old('meta_keywords', $data->metaData->meta_keywords) }}">
</div>


<script>
  document.addEventListener('DOMContentLoaded', function () {
      // Existing keywords from database (comma separated string)
      let keywords = "{{ old('meta_keywords', $data->metaData->meta_keywords) }}"
          .split(',')
          .map(k => k.trim())
          .filter(k => k !== "");

      const input = document.getElementById('keyword-input');
      const container = document.getElementById('tag-container');
      const hiddenInput = document.getElementById('meta_keywords');

      // Show existing tags on load
      keywords.forEach(keyword => addTag(keyword));

      // Space press to add new tag
      input.addEventListener('keyup', function (e) {
          if (e.key === ' ') {
              const value = input.value.trim();
              if (value && !keywords.includes(value)) {
                  keywords.push(value);
                  addTag(value);
                  updateHiddenInput();
              }
              input.value = '';
          }
      });

      // Function to show tag
      function addTag(text) {
          const tag = document.createElement('span');
          tag.className = 'badge bg-primary me-1 mb-1';
          tag.innerText = text;

          const removeBtn = document.createElement('span');
          removeBtn.innerHTML = '&times;';
          removeBtn.style.marginLeft = '8px';
          removeBtn.style.cursor = 'pointer';

          removeBtn.onclick = function () {
              container.removeChild(tag);
              keywords = keywords.filter(k => k !== text);
              updateHiddenInput();
          };

          tag.appendChild(removeBtn);
          container.appendChild(tag);
      }

      // Function to update hidden input
      function updateHiddenInput() {
          hiddenInput.value = keywords.join(',');
      }
  });
</script>

  
@endsection