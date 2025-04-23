@extends('layouts.adminmaster')
@section('admin_contents')
    <main>
        <div class="container">
            <div class="card mb-3">
                <div class="card-body">
                  <div class="row flex-between-center">
                    <div class="col-md">
                      <h5 class="mb-2 mb-md-0">Add a Categorie</h5>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-link text-secondary p-0 me-3 fw-medium" role="button"><a href="{{route('category.add')}}">Discard</a></button>
                        <button class="btn btn-primary" role="button"> <a class="text-white" href="{{route('category.all')}}">All Items </a> </button>
                    </div>
                  </div>
                </div>
              </div>
          <form action="{{route('category.submit')}}" method="post" enctype="multipart/form-data">
          @csrf
            <div class="row">
                <div class="col-lg-8">
                    <div class="card mb-3">
                        <div class="card-header bg-body-tertiary">
                          <h6 class="mb-0">Categorie information</h6>
                        </div>
                        <div class="card-body">
                            <div class="row gx-2">
                                <div class="col-12 mb-1">
                                    <label class="form-label" for="category_name">Categorie Name:</label>
                                    <input class="form-control" name="category_name" id="category_name" type="text" value="{{old('category_name')}}">
                                    <label class="text-danger fw-medium">@error('category_name') {{$message}} @enderror</label>
                                </div>
                                <div class="col-12 mb-1">
                                    <label class="form-label" for="category_title">Categorie Title:</label>
                                    <input class="form-control" name="category_title" id="category_title" type="text" value="{{old('category_title')}}">
                                    <label class="text-danger fw-medium">@error('category_title') {{$message}} @enderror</label>
                                </div>
                                <div class="col-12 mb-1">
                                    <label class="form-label" for="category_desc">Categorie Descriptions:</label>
                                    <input class="form-control" name="category_desc" id="category_desc" type="text" value="{{old('category_desc')}}">
                                    <label class="text-danger fw-medium" >@error('category_desc') {{$message}} @enderror</label>
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
                            <h4 class="p-2"> Total Categorie's</h4>
                        </div>
                        <div class="card-body">
                          <div class="row  justify-content-center g-0">                       
                            <div class="col-auto position-relative">
                              <div class="echart-product-share" _echarts_instance_="ec_1743616191403" style="user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); position: relative;"><div style="position: relative; width: 106px; height: 106px; padding: 0px; margin: 0px; border-width: 0px; cursor: pointer;"><canvas data-zr-dom-id="zr_0" width="106" height="106" style="position: absolute; left: 0px; top: 0px; width: 106px; height: 106px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div><div class="" style="position: absolute; display: block; border-style: solid; white-space: nowrap; z-index: 9999999; box-shadow: rgba(0, 0, 0, 0.2) 1px 2px 10px; background-color: rgb(249, 250, 253); border-width: 1px; border-radius: 4px; color: rgb(11, 23, 39); font: 14px / 21px &quot;Microsoft YaHei&quot;; padding: 7px 10px; top: 0px; left: 0px; transform: translate3d(-68px, 11px, 0px); border-color: rgb(216, 226, 239); pointer-events: none; visibility: hidden; opacity: 0;"><strong>Sparrow:</strong> 20.65%</div></div>
                              <div class="position-absolute top-50 start-50 translate-middle text-1100 fs-7">{{ $totalpost}} N</div> 
                            </div>
                          </div>
                        </div>
                        <div class=" bg-body-tertiary text-center">
                          @if(!empty($latestPost->created_at))
                            <h6 class="p-2">Last Created At : {{ $latestPost->created_at->format('d M, Y - h:i A') }}</h6>
                          @else
                          <h6 class="p-2">Post is not Available </h6>
                          @endif
                        </div>
                      </div>
                      <div class="card">
                          <div class="card-body">
                            <div class="col-12">
                              <label class="form-label" for="custom_url">Categorie Url:</label>
                              <input class="form-control" name="custom_url" id="custom_url" type="text" placeholder="optional !" value="{{old('custom_url')}}">
                              
                            </div>
                          </div>
                      </div>
                      {{-- card end --}}
                    <div class="card mt-4">
                        <div class="card-body">
                          <h5>SEO for Google </h5>
                          <div class="col-12">
                            <label class="form-label" for="meta_title">Meta Title:</label>
                            <input class="form-control" name="meta_title" id="meta_title" type="text" value="{{old('meta_title')}}">
                          </div>
                          {{-- end  --}}
                          <div class="col-12">
                            <label class="form-label" for="meta_description">Meta Descriptions:</label>
                            <input class="form-control" name="meta_description" id="meta_description" type="text" value="{{old('meta_description')}}">
                            
                          </div>
                          {{-- end  --}}
                          <div class="col-12">
                            <label class="form-label" for="meta_keywords">Meta Keywords:</label>
                            <input type="text" id="keyword-input" placeholder="Type and press space..." class="form-control">
                          
                            <div id="tag-container" style="margin-top: 10px;"></div>
                            <input class="form-control" name="meta_keywords" id="meta_keywords" type="hidden" value="{{old('meta_keywords')}}">

                          </div>
                          {{-- end  --}}
                          <div class="col-12">
                            <label class="form-label" for="meta_robots">Meta Robots:</label>
                            <input class="form-control" name="meta_robots" id="meta_robots" type="text" value="{{old('meta_robots')}}">
                           
                          </div>
                          {{-- end  --}}
                          <div class="col-12">
                            <label class="form-label" for="canonical_url">Canonical Url:</label>
                            <input class="form-control" name="canonical_url" id="canonical_url" type="text" value="{{old('canonical_url')}}">
                          </div>
                          {{-- end  --}}
                          <div class="col-12">
                            <label class="form-label" for="hreflang_tags"> Url for Language :</label>
                            <input class="form-control" name="hreflang_tags" id="hreflang_tags" type="text" value="{{old('hreflang_tags')}}">
                          </div>
                          {{-- end  --}}
                          <div class="col-12">
                            <label class="form-label" for="structured_data">structured Data / schema:</label>
                            <input class="form-control" name="structured_data" id="structured_data" type="text" value="{{old('structured_data')}}">
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
                            <input class="form-control" name="og_title" id="og_title" type="text" value="{{old('og_title')}}">
                           
                          </div>
                          {{-- end  --}}
                          <div class="col-12">
                            <label class="form-label" for="og_description-">Og Descriptions:</label>
                            <input class="form-control" name="og_description" id="og_description" type="text" value="{{old('og_description')}}">
                           
                          </div>
                          {{-- end  --}}
                          <div class="col-12">
                            <label class="form-label" for="og_url">Og Url:</label>
                            <input class="form-control" name="og_url" id="og_url" type="text" value="{{old('og_url')}}">
                            
                          </div>
                          {{-- end  --}}
                          <div class="col-12">
                            <label class="form-label" for="og_type">Og Type:</label>
                            <input class="form-control" name="og_type" id="og_type" type="text" value="{{old('og_type')}}">
                            
                          </div>
                          {{-- end  --}}
                          <div class="col-12">
                            <label class="form-label" for="og_locale">Og Local Language :</label>
                            <input class="form-control" name="og_locale" id="og_locale" type="text" value="{{old('og_locale')}}">
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
                            <input class="form-control" name="twitter_card" id="twitter_card" type="text" value="{{old('twitter_card')}}">
                          </div>
                          {{-- end  --}}
                          <div class="col-12">
                            <label class="form-label" for="twitter_title">Twitter Title:</label>
                            <input class="form-control" name="twitter_title" id="twitter_title" type="text" value="{{old('twitter_title')}}">
                          </div>
                          {{-- end  --}}
                          <div class="col-12">
                            <label class="form-label" for="twitter_description">twitter_description :</label>
                            <input class="form-control" name="twitter_description" id="twitter_description-" type="text" value="{{old('twitter_description')}}">
                          </div>
                          {{-- end  --}}
                          <div class="col-12">
                            <label class="form-label" for="manufacturar-name">twitter site:</label>
                            <input class="form-control" name="twitter_site" id="twitter_site" type="text" value="{{old('twitter_site')}}">
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
                            <input class="form-control" name="whatsapp_title" id="whatsapp_title" type="text" value="{{old('whatsapp_title')}}">
                          </div>
                          {{-- end  --}}
                          <div class="col-12">
                            <label class="form-label" for="whatsapp_description">WhatsApp Descriptions :</label>
                            <input class="form-control" name="whatsapp_description" id="whatsapp_description" type="text" value="{{old('whatsapp_description')}}"> 
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
                            <input class="form-control" name="pinterest_description" id="pinterest_description" type="text" value="{{old('pinterest_description')}}">
                          </div>
                          {{-- end  --}}
                          <div class="col-12">
                            <label class="form-label" for="pinterest_rich_pin">Pinterest Rich pin :</label>
                            <input class="form-control" name="pinterest_rich_pin" id="pinterest_rich_pin" type="text" value="{{old('pinterest_rich_pin')}}">
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
                          <div id="previewContainer" class="row mt-3 px-2"></div>
                        </div>
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


    <script>
      document.addEventListener('DOMContentLoaded', function () {
          let keywords = [];
  
          const input = document.getElementById('keyword-input');
          const container = document.getElementById('tag-container');
          const hiddenInput = document.getElementById('meta_keywords');
  
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
  
          function updateHiddenInput() {
              hiddenInput.value = keywords.join(',');
          }
      });
  </script>
  
  
@endsection