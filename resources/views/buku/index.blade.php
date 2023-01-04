@extends('layout.template')
@section('databuku')    



        
        <!-- START DATA -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
                <!-- FORM PENCARIAN -->
                <div class="pb-3">
                  <form class="d-flex" action="{{'buku'}}" method="get">
                      <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Search" aria-label="Search">
                      <button class="btn btn-secondary" type="submit">Search</button>
                  </form>
                </div>
                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3">
                  <a href='{{url('tampil')}}' class="btn btn-primary"> Tambah Data</a>
                  {{-- <a href='{{url('karya')}}' class="btn btn-danger">Hapus Karya</a>
                  <a href='{{url('categories')}}' class="btn btn-success">Tambah Category</a>
                  <a href='{{url('/halaman/create')}}' class="btn btn-success">Tambah Halaman</a> --}}
                </div>

                
          
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">Foto</th>
                            <th class="col-md-1">No</th>
                            <th class="col-md-1">Id</th>
                            <th class="col-md-3">Judul</th>
                            <th class="col-md-4">Penulis</th>
                            <th class="col-md-2">Isi</th>
                            <th class="col-md-2">Category</th>
                            <th class="col-md-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $data->firstItem()?>
                        @foreach ($data as $item)
                      
                        <tr>
                            <td>
                                @if ($item->foto)
                                <img style='max-height:50px;max-width:50px' src='{{ url('foto').'/'.$item->foto }}'/>
                                @endif
                            </td>
                            <td>{{$i}}</td>
                            <td>{{$item->id}}</td>
                            <td>{{$item->judul}}</td>
                            <td>{{$item->penulis}}</td>
                            <td>{{$item->isi}}</td>
                            <td>{{$item->category}}</td>
                            <td>
                                <a href= '{{url('buku/'.$item->id.'/edit')}}'  class="btn btn-warning btn-sm">Edit</a>
                                <form onsubmit="return confirm('Yakin mau menghapus data?')" class='d-inline' action="{{ url('buku/'.$item->id) }}" method="post">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                                </form>
                            </td>
                        </tr>
                              <?php $i++ ?>
                        @endforeach
                    </tbody>
                </table>
               {{$data->links()}}
          </div>
          @endsection