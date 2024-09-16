@extends('layouts.master')
@section('content')
    <!-- Page-content -->
    <div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
            <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                <div class="grow">
                    <h5 class="text-16">Kabupaten</h5>
                </div>
                <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
                    <li class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                        <a href="#!" class="text-slate-400 dark:text-zink-200">HR Management</a>
                    </li>
                    <li class="text-slate-700 dark:text-zink-100">
                        Employee List
                    </li>
                </ul>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="flex items-center">
                        <h6 class="text-15 grow">Employee List</h6>
                        <div class="shrink-0">
                            
                            <button data-modal-target="addEmployeeModal" type="button" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="plus" class="lucide lucide-plus inline-block size-4">
                                    <path d="M5 12h14"></path>
                                    <path d="M12 5v14"></path>
                                </svg> 
                                <span class="align-middle">Upload</span>
                            </button>
                            <button data-modal-target="addEmployeeModal" type="button" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="plus" class="lucide lucide-plus inline-block size-4">
                                    <path d="M5 12h14"></path>
                                    <path d="M12 5v14"></path>
                                </svg> 
                                <span class="align-middle">Tambah</span>
                            </button>
                        </div>
                    </div>
                    <br>
                    <table id="alternativePagination" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center align-middle">No</th>
                                <th class="text-center align-middle">ID Kabupaten</th>
                                <th class="text-center align-middle">Kabupaten</th>
                                <th class="text-center align-middle">Action</th>
                            </tr>
                        </thead>
                        <tbody id="data" class=" @error('new_kab') d-none @enderror">
                            @php $n = 0; @endphp
                            @if ($kab->count() > 0)
                              @foreach ($kab as $item)
                                @php $n = $n + 1; @endphp
                                <tr>
                                  <form action="/dashboard/dataSettings/kabupaten/update/{{$item->id}}" method="POST">
                                    @csrf
  
                                    <td class="text-center align-middle">{{$loop->iteration}}</td>
                                    
  
                                    <td class="text-center align-middle">
                                      <input type="text" class="form-control text-center" name="id_kab" placeholder="{{$item->id}}" disabled>
                                    </td>
  
                                    <td class="text-center align-middle">
                                     <p class="d-none">{{$item->kabupaten}}</p>
                                    </td>
                                    
                                    <td class="text-center align-middle">
                                      <button type="button" class="btn btn-primary" id="btn_edit_{{$loop->iteration}}"
                                        onclick="btn_edit_data({{$loop->iteration}})">
                                        Edit
                                      </button>
  
                                      <button type="button" class="btn btn-dark" id="btn_delete_{{$loop->iteration}}">
                                        <a href="/dashboard/dataSettings/kabupaten/delete/{{$item->id}}" class="text-white" onclick="return confirm('Delete kabupaten {{$item->kabupaten}}?')">Delete</a>
                                      </button>
                                      
                                      <button type="submit" class="btn btn-primary d-none" id="btn_save_{{$loop->iteration}}">
                                        Save
                                      </button>
  
                                      <button type="button" class="btn btn-dark d-none" id="btn_cancel_{{$loop->iteration}}"
                                        onclick="btn_cancel_edit({{$loop->iteration}})">
                                        Cancel
                                      </button>
  
                                    </td>
                                  </form>
                                </tr>
                              @endforeach
                            @endif
                            @error('new_name_kab')
                              <div class="alert alert-danger mt-0 mb-2" role="alert" id="error_add_kabupaten">
                                {{$message}}
                              </div>
                            @enderror
                          </tbody>
  
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page-content -->

    



@section('script')
@endsection

<script>
    var n_data = {{$kab->count()}};
    function btn_edit_data(id) {
      document.getElementById('new_name_kab_'+id).classList.remove('d-none');
      document.getElementById('name_kab_'+id).classList.add('d-none');
  
  
      document.getElementById('btn_edit_'+id).classList.add('d-none');
      document.getElementById('btn_delete_'+id).classList.add('d-none');
      document.getElementById('btn_save_'+id).classList.remove('d-none');
      document.getElementById('btn_cancel_'+id).classList.remove('d-none');
      for (let index = 0; index < n_data; index++) {
        if(index+1 != id){
          document.getElementById('btn_edit_'+(index+1)).disabled = true;
          document.getElementById('btn_delete_'+(index+1)).disabled = true;
        }
      }
    }
  
    function btn_cancel_edit(id) {
      document.getElementById('new_name_kab_'+id).classList.add('d-none');
      document.getElementById('name_kab_'+id).classList.remove('d-none');
  
  
      document.getElementById('btn_edit_'+id).classList.remove('d-none');
      document.getElementById('btn_delete_'+id).classList.remove('d-none');
      document.getElementById('btn_save_'+id).classList.add('d-none');
      document.getElementById('btn_cancel_'+id).classList.add('d-none');
  
      for (let index = 0; index < n_data; index++) {
        if(index+1 != id){
          document.getElementById('btn_edit_'+(index+1)).disabled = false;
          document.getElementById('btn_delete_'+(index+1)).disabled = false;
        }
      }
  
    }
  </script>
  

@endsection
