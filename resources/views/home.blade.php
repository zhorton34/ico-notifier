@extends('spark::layouts.app')

@section('content')
<home :user="user" inline-template>
    <div class="container">
        <!-- Application Dashboard -->
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card card-default">
                    <div class="card-header">{{__('Dashboard')}}</div>
                    <div class="card-body">
                        @include("dashboard.user.table")                   
                    </div>
                </div>
            </div>
        </div>
    </div>
</home>
@endsection
