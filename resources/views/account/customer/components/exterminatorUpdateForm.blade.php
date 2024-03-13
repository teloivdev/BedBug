<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-8">
            <form action="{{ route('account.update') }}" method="post">
                @csrf
                <div class="card mt-5">
                    <div class="card-body">
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Step 2 of 2</div>                        </div>
                        </div>
                    <div class="card-body">
                        <h5 class="card-title">Finish Setting up</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <p class="lead mb-3">Licensed Exterminators</p>
                            <div class="col-12 col-md-12 col-lg-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control bg-white @error('Primary_Licensed_Exterminator__c') is-invalid @enderror {{ $policyHolder->Primary_Licensed_Exterminator__c == '' ? 'is-invalid' : '' }}" required id="floatingInput" name="Primary_Licensed_Exterminator__c" value="{{ $policyHolder->Primary_Licensed_Exterminator__c ?? '' }}" placeholder="John Doe">
                                    <label for="floatingInput">Primary Licensed Exterminator</label>
                                    @error('Primary_Licensed_Exterminator__c')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control bg-white @error('Secondary_Licensed_Exterminator__c') is-invalid @enderror {{ $policyHolder->Secondary_Licensed_Exterminator__c == '' ? 'is-invalid' : '' }}" required id="floatingInput" name="Secondary_Licensed_Exterminator__c" value="{{ $policyHolder->Secondary_Licensed_Exterminator__c ?? '' }}" placeholder="John Doe">
                                    <label for="floatingInput">Secondary Licensed Exterminator</label>
                                    @error('Secondary_Licensed_Exterminator__c')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control bg-white @error('Third_Exterminator__c') is-invalid @enderror" id="floatingInput" name="Third_Exterminator__c" value="{{ $policyHolder->Third_Exterminator__c ?? '' }}" placeholder="John Doe">
                                    <label for="floatingInput">Additional Licensed Exterminator</label>
                                    @error('Third_Exterminator__c')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control bg-white @error('Fourth_Exterminator__c') is-invalid @enderror" id="floatingInput" name="Fourth_Exterminator__c" value="{{ $policyHolder->Fourth_Exterminator__c ?? '' }}" placeholder="John Doe">
                                    <label for="floatingInput">Additional Licensed Exterminator</label>
                                    @error('Fourth_Exterminator__c')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-6">
                                <button type="submit" class="btn btn-primary btn-lg">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>