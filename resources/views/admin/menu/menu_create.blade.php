<div class="modal fade" id="modalCreateMenu{{ $data['id'] ?? '' }}">
    <div class="modal-dialog" style="max-width: 670px">
      <div class="modal-content">
        
        <div class="modal-header">
          <h5 class="modal-title"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
  
        <div class="modal-body">
          <form action="{{ route('admin.menu.store') }}" method="POST">
            @csrf
              <input type="hidden" name="id" value="{{ $data['id'] ?? '' }}">
              <div class="form-group">
                  <div class="row">
                      <div class="col-2 text-right">
                          <label for="">Tiêu đề:</label>	
                      </div>
                      <div class="col-10">
                          <input type="text" required title="Tiêu đề không được bỏ trống !" value="{{ $data['name'] ?? '' }}" name="name" class="form-control">	
                      </div>
                  </div>
              </div>
              
              <div class="form-group">
                  <div class="row">
                      <div class="col-2 text-right">
                          <label for="">Đường dẫn:</label>	
                      </div>
                      <div class="col-10">
                          <input type="text" required value="{{ $data['link'] ?? '' }}" name="link" class="form-control">	
                      </div>
                  </div>
              </div>
              
              @if (isset($data['parent_id']) && $data['parent_id'] == 0 )
              @else
              <div class="form-group">
                <div class="row">
                    <div class="col-2 text-right">
                        <label for="">Menu cha:</label>	
                    </div>
                    <div class="col-10">
                        <select name="parent_id" 
                                data-content="menuParent" 
                                data-wrap="#modalCreateMenu{{ $data['id'] ?? '' }}" 
                                data-trigger="[data-conttent=menuType]" 
                                class="form-control">
                            <option value="0">Menu cha</option>
                            @foreach($parentMenu as $menu)
                            <option value="{{ $menu['id'] }}"
                                    data-type="{{ $menu['position'] }}" 
                                    {{ ( isset($data['parent_id']) && $data['parent_id'] == $menu['id']) ? 'selected' : '' }} >
                                {{ $menu['name'] }} - {{ $menu['position'] == 1 ? "Menu trên" : "Menu dưới" }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
              @endif
  
              <div class="form-group">
                  <div class="row">
                      <div class="col-2 text-right">
                          <label for="">Hiển thị:</label>	
                      </div>
                      <div class="col-10">
                        @if(isset($data['status']) && $data['status'] == 0)
                        <label class="avswitch avswitch-md">
                            <input type="checkbox" name="status" value="1">
                            <span class="slider round"></span>
                        </label>
                        @else
                        <label class="avswitch avswitch-md">
                            <input type="checkbox" checked name="status" value="1">
                            <span class="slider round"></span>
                        </label>
                        @endif
                      </div>
                  </div>
              </div>
  
              <div class="form-group">
                  <div class="row">
                      <div class="col-2 text-right">
                          <label for="">Chọn vị trí</label>
                      </div>
                      <div class="col-5">
                          <select name="position" data-conttent="menuType" class="form-control {{ isset($data['parent_id']) && $data['parent_id'] != 0 ? 'disable' : "" }}">
                              <option value="1" {{ isset($data['position']) && $data['position'] == 1 ? "selected" : "" }} >Trên</option>
                              <option value="0" {{ isset($data['position']) && $data['position'] == 0 ? "selected" : "" }} >Dưới</option>
                          </select>
                      </div>
                      <div class="col-5">
                          <input type="number" value="{{ $data['sort'] ?? '' }}" name="sort" class="form-control" placeholder="Sắp xếp">
                      </div>
                  </div>
              </div>
              
              <div class="form-group">
                  <div class="row">
                      <div class="col-2 text-right"></div>
                      <div class="col-10">
                          <button type="submit" class="avbtn__submit avbtn__submit--save">Lưu</button>
                          <button class="avbtn__submit avbtn__submit--cancel"  data-dismiss="modal">Hủy</button>
                      </div>
                  </div>
              </div>		
          </form>
        </div>
  
      </div>
    </div>
  </div>