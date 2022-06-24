@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                </div>
                
            </div>
            
        </div>
        
    </div>
    @if(Auth()->user()->admin == 0)
    @include('listeE')
    @endif
       
    
    @if(Auth()->user()->admin)   
   
        @include('adminP')
    @endif
</div>
@endsection
