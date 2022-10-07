@foreach ($post as $p)
@if($p->status == 1)
@extends('layouts.default', ['title' => $p->title , 'post' => $post])
@section('content')
<div class="container my-5">
   <a href="{{ URL::previous() }}" class="text-primary">Vissza</a>
   <div style="max-width: 700px; top: -80px;" class="mx-auto text-secondary">
      <div>
         <small>
         <a href="/blog/category/{{ $p->category_id }}" class="text-primary">{{ getPostCategoryName($p->category_id) }}</a>
         </small>
      </div>
      <h1 class="font-weight-bold text-dark">{{ $p->title }}</h1>
      <p class="my-2" style="line-height: 2;">Short description this blog post.</p>
      <div class="my-3 d-flex align-items-center justify-content-between">
         <div class="d-flex align-items-center">
            <small class="ml-2">
            <span>{{ date('Y.m.d.',strtotime($p->created_at)) }}</span>
            </small>
         </div>
      </div>
   </div>
   <img class="w-100 my-3" src="{{ $p->image }}" />
   <div style="max-width: 700px; top: -80px;" class="mx-auto text-secondary">
      {!! $p->content !!}
   </div>
   @can('posts.edit')
   <div class="row">
      <a href="{{ route('posts.edit',$p->id) }}" >Szerkesztés</a>
   </div>
   @endcan
</div>
@endsection
@else
@section('content')
Nem elérhető tartalom!
@endsection
@endif
@endforeach