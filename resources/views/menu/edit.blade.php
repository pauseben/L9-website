@extends('layouts.admin', ['title' => 'Menü szerkesztés'])
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ $menu->name }} menü szerkesztés</h2>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<div class="col-6 mb-4">
    <div class="card border-0 shadow">
        <div class="card-body">
            <form action="{{ route('menu.update',$menu->id) }}" method="POST">
                @csrf
                @method('PUT')
           
                 <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Név:</strong>
                            <input type="text" id="name" name="name" value="{{ $menu->name }}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group custom-dropdown mb-2">
                        <label for="status">Státusz:</label>
                        <select name="status" class="form-select">
                            <option value="1" {{ ($menu->status == 1)? 'selected': '' }}>Aktív</option>
                            <option value="0" {{ ($menu->status == 0)? 'selected': '' }}>Inaktív</option>
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                      <button type="submit" class="btn btn-primary  mt-2 animate-up-2">Mentés</button>
                      <a class="btn btn-secondary mt-2 animate-up-2" href="{{ route('menu.index') }}"> Vissza</a>
                      
                    </div>
                </div>
           
            </form>
        </div>
    </div>
</div>

<div class="col-8 mb-4">
    <div class="card border-0 shadow">
            <div class="card-header"><h4>Menühöz tartozó oldalak</h4></div>
            @if($pages->isEmpty())
               <div class="card-body"><h5>Üres</h5></div>
            @else
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                        <tr>
                            <th class="border-bottom" scope="col">Cím</th>
                            <th class="border-bottom" scope="col">Szerkesztés</th>
                        </tr>
                        </thead>
                        <tbody> 
                            @foreach ($pages as $page)
                            @if($page->parent_id == NULL)
                                    @if( getSubMenusByParentId($page->id)->isEmpty() )
                                        <tr>
                                            <td class="fw-bolder text-gray-500">
                                                {{ $page->title }}
                                            </td>
                                            <td class="fw-bolder text-gray-500">
                                                <a href="{{ route('pages.edit',$page->id) }}" class="btn btn-info">Szerkeszt</a>
                                            </td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td class="fw-bolder text-gray-500">
                                                {{ $page->title }}
                                            </td>
                                            <td class="fw-bolder text-gray-500">
                                                <a href="{{ route('pages.edit',$page->id) }}" class="btn btn-info">Szerkeszt</a>
                                            </td>
                                        </tr>
                                    @foreach (getSubMenusByParentId($page->id) as $submenu)
                                        <tr style="background:#f7f7f7">
                                            <td class="fw-bolder text-gray-500">
                                                   <span style="padding-left:15px"></span>{{ $submenu->title }}
                                            </td>
                                            <td class="fw-bolder text-gray-500">
                                                <a href="{{ route('pages.edit',$submenu->id) }}" class="btn btn-info">Szerkeszt</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @endif
                                @endif
                                
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif  
    </div>
</div>




@endsection