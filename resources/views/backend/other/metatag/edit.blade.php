@extends('layouts.adminmaster')
@section('admin_contents')
    <main>
        <div class="container">
            <div class="card mb-3">
                <div class="card-body">
                  <div class="row flex-between-center">
                    <div class="col-md">
                      <h5 class="mb-2 mb-md-0">Update a Categorie</h5>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-link text-secondary p-0 me-3 fw-medium" role="button"><a href="{{route('metatag.add')}}">Discard</a></button>
                        <button class="btn btn-primary" role="button"> <a class="text-white" href="{{route('metatag.all')}}">All Items </a> </button>
                    </div>
                  </div>
                </div>
              </div>
          <form action="{{route('metatag.update')}}" method="post" enctype="multipart/form-data">
          @csrf
            <div class="row">
                {{-- card end --}}
                <div class="col-lg-8 ">
                  <div class="sidebar_wrapper">
                    <div class="sidebar_card">
                      {{-- fatch data  --}}
                      @foreach($data->images as $image)
                          <input class="form-control" name="seo_ids[]" id="seo_id" type="text" value="{{$image->seo_id}}">
                          <input class="form-control" name="table_ids[]" id="table_ids" type="text" value="{{$image->id}}">
                      @endforeach
                      <input class="form-control" name="id" id="id" type="text" value="{{$data->unique_id}}">
                      <input class="form-control" name="slug" id="slug" type="text" value="{{$data->slug}}">
                      <input class="form-control" name="model_type" id="model_type" type="text" value="{{$data->model_type}}">
                      
                    <div class="card mt-4">
                        <div class="card-body">
                          <h5>SEO for Google </h5>
                          <div class="col-12">
                            <label class="form-label" for="meta_title">Meta Title:</label>
                            <input class="form-control" name="meta_title" id="meta_title" type="text" value="{{$data->meta_title}}">
                          </div>
                          {{-- end  --}}
                          <div class="col-12">
                            <label class="form-label" for="meta_description">Meta Descriptions:</label>
                            <input class="form-control" name="meta_description" id="meta_description" type="text" value="{{$data->meta_description}}">
                            
                          </div>
                          {{-- end  --}}
                          <div class="col-12">
                            <label class="form-label" for="meta_keywords">Meta Keywords:</label>
                            <input type="text" id="keyword-input" placeholder="Type and press space..." class="form-control">
                          
                            <div id="tag-container" style="margin-top: 10px;"></div>
                            <input class="form-control" name="meta_keywords" id="meta_keywords" type="hidden" value="{{$data->meta_keywords}}">
                            
                          </div>
                          {{-- end  --}}
                          <div class="col-12">
                            <label class="form-label" for="meta_robots">Meta Robots:</label>
                            <input class="form-control" name="meta_robots" id="meta_robots" type="text" value="{{$data->meta_robots}}">
                           
                          </div>
                          {{-- end  --}}
                          <div class="col-12">
                            <label class="form-label" for="canonical_url">Canonical Url:</label>
                            <input class="form-control" name="canonical_url" id="canonical_url" type="text" value="{{$data->canonical_url}}">
                          </div>
                          {{-- end  --}}
                          <div class="col-12">
                            <label class="form-label" for="hreflang_tags"> Url for Language :</label>
                            <input class="form-control" name="hreflang_tags" id="hreflang_tags" type="text" value="{{$data->hreflang_tags}}">
                          </div>
                          {{-- end  --}}
                          <div class="col-12">
                            <label class="form-label" for="structured_data">structured Data / schema:</label>
                            <input class="form-control" name="structured_data" id="structured_data" type="text" value="{{$data->structured_data}}">
                          </div>
                          {{-- end  --}}
                        </div>
                    </div>
                    {{-- card end  --}}
                    <div class="card mt-4">
                        <div class="card-body">
                          <h5>SEO for Facebook & Linkedin </h5>
                          <div class="col-12">
                            <label class="form-label" for="og_title">Og Title:</label>
                            <input class="form-control" name="og_title" id="og_title" type="text" value="{{$data->og_title}}">
                           
                          </div>
                          {{-- end  --}}
                          <div class="col-12">
                            <label class="form-label" for="og_description-">Og Descriptions:</label>
                            <input class="form-control" name="og_description" id="og_description" type="text" value="{{$data->og_description}}">
                           
                          </div>
                          {{-- end  --}}
                          <div class="col-12">
                            <label class="form-label" for="og_url">Og Url:</label>
                            <input class="form-control" name="og_url" id="og_url" type="text" value="{{$data->og_url}}">
                            
                          </div>
                          {{-- end  --}}
                          <div class="col-12">
                            <label class="form-label" for="og_type">Og Type:</label>
                            <input class="form-control" name="og_type" id="og_type" type="text" value="{{$data->og_type}}">
                            
                          </div>
                          {{-- end  --}}
                          <div class="col-12">
                            <label class="form-label" for="og_locale">Og Local Language :</label>
                            <input class="form-control" name="og_locale" id="og_locale" type="text" value="{{$data->og_locale}}">
                          </div>
                          {{-- end  --}}
                        </div>
                    </div>
                    {{-- card end  --}}
                      <div class="card mt-4">
                        <div class="card-body">
                          <h5>SEO for Twitter Meta Feilds </h5>
                          <div class="col-12">
                            <label class="form-label" for="twitter_card">Twitter Card:</label>
                            <input class="form-control" name="twitter_card" id="twitter_card" type="text" value="{{$data->twitter_card}}">
                          </div>
                          {{-- end  --}}
                          <div class="col-12">
                            <label class="form-label" for="twitter_title">Twitter Title:</label>
                            <input class="form-control" name="twitter_title" id="twitter_title" type="text" value="{{$data->twitter_title}}">
                          </div>
                          {{-- end  --}}
                          <div class="col-12">
                            <label class="form-label" for="twitter_description">twitter_description :</label>
                            <input class="form-control" name="twitter_description" id="twitter_description-" type="text" value="{{$data->twitter_description}}">
                          </div>
                          {{-- end  --}}
                          <div class="col-12">
                            <label class="form-label" for="manufacturar-name">twitter site:</label>
                            <input class="form-control" name="twitter_site" id="twitter_site" type="text" value="{{$data->twitter_site}}">
                          </div>
                          {{-- end  --}}
                        </div>
                    </div>
                    {{-- card end  --}}
                    <div class="card mt-4">
                        <div class="card-body">
                          <h5>SEO for WhatsApp & Messenger Meta Fields </h5>
                          <div class="col-12">
                            <label class="form-label" for="whatsapp_title">WhatsApp Title:</label>
                            <input class="form-control" name="whatsapp_title" id="whatsapp_title" type="text" value="{{$data->whatsapp_title}}">
                          </div>
                          {{-- end  --}}
                          <div class="col-12">
                            <label class="form-label" for="whatsapp_description">WhatsApp Descriptions :</label>
                            <input class="form-control" name="whatsapp_description" id="whatsapp_description" type="text" value="{{$data->whatsapp_description}}"> 
                          </div>
                          {{-- end  --}}
                        </div>
                    </div>
                    {{-- card end  --}}
                    <div class="card mt-4">
                        <div class="card-body">
                          <h5>SEO for Pinterest Meta Fields </h5>
                          <div class="col-12">
                            <label class="form-label" for="pinterest_description">pinterest description :</label>
                            <input class="form-control" name="pinterest_description" id="pinterest_description" type="text" value="{{$data->pinterest_description}}">
                          </div>
                          {{-- end  --}}
                          <div class="col-12">
                            <label class="form-label" for="pinterest_rich_pin">Pinterest Rich pin :</label>
                            <input class="form-control" name="pinterest_rich_pin" id="pinterest_rich_pin" type="text" value="{{$data->pinterest_rich_pin}}">
                          </div>
                          {{-- end --}}
                        </div>
                    </div>
                    {{-- card end  --}}

                    <div class="card mt-4">
                        <div class="card-header">
                          <h5 class="mb-0">Upload Photos</h5>
                        </div>
                          <div class="col-12 p-2">
                            <input class="form-control" name="images[]" id="imageInput" type="file" multiple>
                          </div>
                          <div class="col-12 mt-2 p-2">
                            @if(optional($data)->images && count($data->images) > 0)
                                @foreach($data->images as $image)
                                    <img src="{{ asset('storage/uploads/seo/' . $image->image_name) }}" alt="SEO Image" height="80px" width="auto">
                                @endforeach
                            @else
                                <img src="{{ asset('uploads/avater.jpg') }}" alt="SEO Image" height="80px" width="auto" style="border: 1px solid #000">
                            @endif
                        </div>
                        
                          <hr>
                          
                          <div id="previewContainer" class="row mt-3 px-2"></div>
                        </div>
                    </div>
                    {{-- card end  --}}
                  </div>
                </div>
                <div class="col-lg-4">
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


    
 



<script>
  document.addEventListener('DOMContentLoaded', function () {
      // Existing keywords from database (comma separated string)
      let keywords = "{{ old('meta_keywords', $data->meta_keywords) }}"
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