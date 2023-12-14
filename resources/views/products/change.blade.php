@extends('layouts\app')
@section('content')

    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css'>

    <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js'></script>


    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                {{-- <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Admin" class="rounded-circle p-1 bg-primary" width="110"> --}}
                                <!-- resources/views/upload.blade.php -->
                                <form method="POST" action="{{ route('upload.image', ['email' => $profile->email]) }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="image" accept="image/*">
                                    <button type="submit">Upload Image</button>
                                </form>
                                
                                
                                <div class="mt-3">
                                    <h4>{{ $profile->name }}</h4>
                                    <p class="text-secondary mb-1">Full Stack Developer</p>
                                    <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
                                    <button class="btn btn-primary">Follow</button>
                                    <button class="btn btn-outline-primary">Message</button>
                                </div>
                            </div>
                            
                            <hr class="my-4">
                            <form method="post" action="{{route('product.update',['profile' => $profile])}}">
                                @csrf 
                                @method('put')
                                <ul class="list-group list-group-flush">
                                    
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 >Website</h6>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="web" class="form-control" value="{{ $profile->web }}">
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6>Github</h6>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="git" class="form-control" value="{{ $profile->git }}">
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6>Facebook</h6>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="fab" class="form-control" value="{{ $profile->fab }}">
                                        </div>
                                    </li>
                                    
                                </ul>
                            </form>
                        
                        </div>
                    </div>
                </div>
            
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            
                            <form method="post" action="{{route('product.update',['profile' => $profile])}}">

                                @csrf
                                @method('put')
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="name" class="form-control" value="{{ $profile->name }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="email" name="email" class="form-control" value="{{ $profile->email }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="phone" class="form-control" value="{{ $profile->phone }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Mobile</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="mobile" class="form-control" value="{{ $profile->mobile }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="address" class="form-control" value="{{ $profile->address }}">
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="submit" class="btn btn-primary px-4" value="Save Changes">

                                </div>
                            
                            </div>
                            </form>
                        </div>
                    </div>
                    


                    <!-- resources/views/products/change.blade.php -->
                    <form method="POST" action="{{ route('profiles.updateSkills', ['profile' => $profile]) }}">
                        @csrf
                        @method('put')

                        <label for="skills">Skills (comma-separated):</label>
                        <input type="text" name="skills" value="{{ implode(', ', $profile->skills ?? []) }}">
                        
                        <button type="submit">Update Skills</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection