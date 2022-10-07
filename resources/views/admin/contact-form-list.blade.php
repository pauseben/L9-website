@extends('layouts.admin')
@section('content')
<div class="">
    <div class="">
        <div class="py-4">
            <div class="d-flex justify-content-between w-100 flex-wrap">
               <div class="mb-3 mb-lg-0">
                  <h1 class="h4">Kapcsolati űrlap kitöltések</h1>
               </div>
            </div>
         </div>
        <div class="card border-0 shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0 rounded">
                        <thead class="thead-light">
                            <tr>
                                <th class="border-0 rounded-start">#</th>
                                <th class="border-0">Név</th>
                                <th class="border-0">E-mail</th>
                                <th class="border-0">Telefon</th>
                                <th class="border-0">Cím</th>
                                <th class="border-0 rounded-end">Mikor?</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                            <!-- Item -->
                            <tr>
                                <td>{{ $contact->id }}</td>
                                <td>
                                    {{ $contact->name }}
                                </td>
                                <td>
                                   <u><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></u>
                                </td>
                                <td>
                                    {{ $contact->phone }}
                                </td>
                                <td>
                                  
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal-default{{ $contact->id }}">Megnyitás</button>
                                </td>
                                </td>
                                <td>
                                    {{ date('Y.m.d. H:i',strtotime($contact->created_at)) }}
                                </td>
                            </tr>
                            <div class="col-lg-4">
                                <!-- Button Modal -->
                                
                                <!-- Modal Content -->
                                <div class="modal fade" id="modal-default{{ $contact->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h2 class="h6 modal-title">  {{ $contact->subject }}</h2>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>{{ $contact->message }}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="mailto:{{ $contact->email }}" class="btn btn-secondary">Válasz</a>
                                                <button type="button" class="btn btn-link text-gray-600 ms-auto" data-bs-dismiss="modal">Bezár</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Modal Content -->
                            </div>
                            <!-- End of Item -->
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
   </div>
@stop