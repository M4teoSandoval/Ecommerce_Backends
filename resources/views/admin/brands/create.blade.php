@extends('admin.layouts.app')

@section('content')
    <h1>Add new brand</h1>

    <div class="card">
        <div class="card-body">
            <div class="p-4">
                <form action= "{{route('admin.brands.store')}}" method="post">
                    @csrf
                    <div class="input-group input-group-outline mb-4">
                        <label class="form-label" for="name">Name</label>
                        <input type="text" class="form-control" name="name">

                    </div>
                    <input type="submit" class="btn bg-gradient-success" name="Save">
                </form>
            </div>

        </div>
    
    </div>
@endsection
