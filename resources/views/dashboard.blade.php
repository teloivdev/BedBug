<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-8">
            <form>
                <div class="card mt-5">
                    <div class="card-body">
                        <h5 class="card-title">Finish Setting up</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <p class="lead mb-3">Primary Contact Information</p>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control bg-white @error('First_Name__c') is-invalid @enderror" required id="floatingInput" name="First_Name__c" value="" placeholder="placeholder@realty.com">
                                    <label for="floatingInput">First Name</label>
                                    @error('First_Name__c')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control bg-white @error('Last_Name__c') is-invalid @enderror" required id="floatingInput" name="Last_Name__c" value="" placeholder="placeholder@realty.com">
                                    <label for="floatingInput">Last Name</label>
                                    @error('Last_Name__c')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <p class="lead">Contact Name</p>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control bg-white @error('Prop_Mgr_Phone__c') is-invalid @enderror" required id="floatingInput" name="Prop_Mgr_Phone__c" value="{{ $policyHolder->Prop_Mgr_Phone__c }}" placeholder="placeholder@realty.com">
                                    <label for="floatingInput">Property Manager Phone</label>
                                    @error('Prop_Mgr_Phone__c')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control bg-white @error('Prop_Mgr_Email__c') is-invalid @enderror" required id="floatingInput" name="Prop_Mgr_Email__c" value="{{ $policyHolder->Prop_Mgr_Email__c }}" placeholder="placeholder@realty.com">
                                    <label for="floatingInput">Property Manager Email</label>
                                    @error('Prop_Mgr_Email__c')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title">Finish Setting up</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <p class="lead mb-3">Additional Company Information</p>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control bg-white @error('Name') is-invalid @enderror" id="floatingInput" name="Name" value="{{ $policyHolder->Name }}" placeholder="placeholder@realty.com">
                                    <label for="floatingInput">Company's Legal Name</label>
                                    @error('Name')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control bg-white @error('Prop_Mgt_Co_dba') is-invalid @enderror" id="floatingInput" name="Prop_Mgt_Co_dba__c" value="{{ $policyHolder->Prop_Mgt_Co_dba__c }}" placeholder="placeholder@realty.com">
                                    <label for="floatingInput">Company DBA (if applicable)</label>
                                    @error('Prop_Mgt_Co_dba')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control bg-white @error('Prop_Mgt_Co_Email__c') is-invalid @enderror" required id="floatingInput" name="Prop_Mgt_Co_Email__c" value="{{ $policyHolder->Prop_Mgt_Co_Email__c }}" placeholder="placeholder@realty.com">
                                    <label for="floatingInput">Company Email</label>
                                    @error('Prop_Mgt_Co_Email__c')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="form-floating mb-3">
                                    <select class="form-control bg-white @error('Property_Management_Type__c') is-invalid @enderror" required name="Property_Management_Type__c">
                                        <option value="" disabled selected>Select An Option</option>
                                        <option value="Individual" {{ $policyHolder->Property_Management_Type__c == 'Individual' ? 'selected' : ''}}>Individual</option>
                                        <option value="Corporation" {{ $policyHolder->Property_Management_Type__c == 'Corporation' ? 'selected' : ''}}>Corporation</option>
                                        <option value="Partnership" {{ $policyHolder->Property_Management_Type__c == 'Partnership' ? 'selected' : ''}}>Partnership</option>
                                        <option value="Joint Venture" {{ $policyHolder->Property_Management_Type__c == 'Joint Venture' ? 'selected' : ''}}>Joint Venture</option>
                                        <option value="Trust" {{ $policyHolder->Property_Management_Type__c == 'Trust' ? 'selected' : ''}}>Trust</option>
                                        <option value="LLC" {{ $policyHolder->Property_Management_Type__c == 'LLC' ? 'selected' : ''}}>LLC</option>
                                        <option value="Organization (other)" {{ $policyHolder->Property_Management_Type__c == 'Organization (other)' ? 'selected' : ''}}>Organization (other)</option>
                                    </select>
                                    <label for="floatingInput">Property Manager Phone</label>
                                    @error('Property_Management_Type__c')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <p class="lead mb-3">Company Address</p>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control bg-white @error('Street__c') is-invalid @enderror" id="floatingInput" name="Street__c" value="{{ $policyHolder->Street__c }}" placeholder="placeholder@realty.com">
                                    <label for="floatingInput">Street</label>
                                    @error('Street__c')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control bg-white @error('City__c') is-invalid @enderror" id="floatingInput" name="City__c"  value="{{ $policyHolder->City__c }}" placeholder="placeholder@realty.com">
                                    <label for="floatingInput">City</label>
                                    @error('City__c')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="form-floating mb-3">
                                    <select class="form-control bg-white @error('State__c') is-invalid @enderror" required name="State__c">
                                        <option class="placeholder" value="" selected="" disabled="">— Select state —</option>
                                        <option value="AL" {{ $policyHolder->State__c == 'AL' ? 'selected' : ''}}>Alabama</option>
                                        <option value="AK" {{ $policyHolder->State__c == 'AK' ? 'selected' : ''}}>Alaska</option>
                                        <option value="AZ" {{ $policyHolder->State__c == 'AZ' ? 'selected' : ''}}>Arizona</option>
                                        <option value="AR" {{ $policyHolder->State__c == 'AR' ? 'selected' : ''}}>Arkansas</option>
                                        <option value="CA" {{ $policyHolder->State__c == 'CA' ? 'selected' : ''}}>California</option>
                                        <option value="CO" {{ $policyHolder->State__c == 'CO' ? 'selected' : ''}}>Colorado</option>
                                        <option value="CT" {{ $policyHolder->State__c == 'CT' ? 'selected' : ''}}>Connecticut</option>
                                        <option value="DE" {{ $policyHolder->State__c == 'DE' ? 'selected' : ''}}>Delaware</option>
                                        <option value="DC" {{ $policyHolder->State__c == 'DC' ? 'selected' : ''}}>District of Columbia</option>
                                        <option value="FL" {{ $policyHolder->State__c == 'FL' ? 'selected' : ''}}>Florida</option>
                                        <option value="GA" {{ $policyHolder->State__c == 'GA' ? 'selected' : ''}}>Georgia</option>
                                        <option value="HI" {{ $policyHolder->State__c == 'HI' ? 'selected' : ''}}>Hawaii</option>
                                        <option value="ID" {{ $policyHolder->State__c == 'ID' ? 'selected' : ''}}>Idaho</option>
                                        <option value="IL" {{ $policyHolder->State__c == 'IL' ? 'selected' : ''}}>Illinois</option>
                                        <option value="IN" {{ $policyHolder->State__c == 'IN' ? 'selected' : ''}}>Indiana</option>
                                        <option value="IA" {{ $policyHolder->State__c == 'IA' ? 'selected' : ''}}>Iowa</option>
                                        <option value="KS" {{ $policyHolder->State__c == 'KS' ? 'selected' : ''}}>Kansas</option>
                                        <option value="KY" {{ $policyHolder->State__c == 'KY' ? 'selected' : ''}}>Kentucky</option>
                                        <option value="LA" {{ $policyHolder->State__c == 'LA' ? 'selected' : ''}}>Louisiana</option>
                                        <option value="ME" {{ $policyHolder->State__c == 'ME' ? 'selected' : ''}}>Maine</option>
                                        <option value="MD" {{ $policyHolder->State__c == 'MD' ? 'selected' : ''}}>Maryland</option>
                                        <option value="MA" {{ $policyHolder->State__c == 'MA' ? 'selected' : ''}}>Massachusetts</option>
                                        <option value="MI" {{ $policyHolder->State__c == 'MI' ? 'selected' : ''}}>Michigan</option>
                                        <option value="MN" {{ $policyHolder->State__c == 'MN' ? 'selected' : ''}}>Minnesota</option>
                                        <option value="MS" {{ $policyHolder->State__c == 'MS' ? 'selected' : ''}}>Mississippi</option>
                                        <option value="MO" {{ $policyHolder->State__c == 'MO' ? 'selected' : ''}}>Missouri</option>
                                        <option value="MT" {{ $policyHolder->State__c == 'MT' ? 'selected' : ''}}>Montana</option>
                                        <option value="NE" {{ $policyHolder->State__c == 'NE' ? 'selected' : ''}}>Nebraska</option>
                                        <option value="NV" {{ $policyHolder->State__c == 'NV' ? 'selected' : ''}}>Nevada</option>
                                        <option value="NH" {{ $policyHolder->State__c == 'NH' ? 'selected' : ''}}>New Hampshire</option>
                                        <option value="NJ" {{ $policyHolder->State__c == 'NJ' ? 'selected' : ''}}>New Jersey</option>
                                        <option value="NM" {{ $policyHolder->State__c == 'NM' ? 'selected' : ''}}>New Mexico</option>
                                        <option value="NY" {{ $policyHolder->State__c == 'NY' ? 'selected' : ''}}>New York</option>
                                        <option value="NC" {{ $policyHolder->State__c == 'NC' ? 'selected' : ''}}>North Carolina</option>
                                        <option value="ND" {{ $policyHolder->State__c == 'ND' ? 'selected' : ''}}>North Dakota</option>
                                        <option value="OH" {{ $policyHolder->State__c == 'OH' ? 'selected' : ''}}>Ohio</option>
                                        <option value="OK" {{ $policyHolder->State__c == 'OK' ? 'selected' : ''}}>Oklahoma</option>
                                        <option value="OR" {{ $policyHolder->State__c == 'OR' ? 'selected' : ''}}>Oregon</option>
                                        <option value="PA" {{ $policyHolder->State__c == 'PA' ? 'selected' : ''}}>Pennsylvania</option>
                                        <option value="RI" {{ $policyHolder->State__c == 'RI' ? 'selected' : ''}}>Rhode Island</option>
                                        <option value="SC" {{ $policyHolder->State__c == 'SC' ? 'selected' : ''}}>South Carolina</option>
                                        <option value="SD" {{ $policyHolder->State__c == 'SD' ? 'selected' : ''}}>South Dakota</option>
                                        <option value="TN" {{ $policyHolder->State__c == 'TN' ? 'selected' : ''}}>Tennessee</option>
                                        <option value="TX" {{ $policyHolder->State__c == 'TX' ? 'selected' : ''}}>Texas</option>
                                        <option value="UT" {{ $policyHolder->State__c == 'UT' ? 'selected' : ''}}>Utah</option>
                                        <option value="VT" {{ $policyHolder->State__c == 'VT' ? 'selected' : ''}}>Vermont</option>
                                        <option value="VA" {{ $policyHolder->State__c == 'VA' ? 'selected' : ''}}>Virginia</option>
                                        <option value="WA" {{ $policyHolder->State__c == 'WA' ? 'selected' : ''}}>Washington</option>
                                        <option value="WV" {{ $policyHolder->State__c == 'WV' ? 'selected' : ''}}>West Virginia</option>
                                        <option value="WI" {{ $policyHolder->State__c == 'WI' ? 'selected' : ''}}>Wisconsin</option>
                                        <option value="WY" {{ $policyHolder->State__c == 'WY' ? 'selected' : ''}}>Wyoming</option>
                                    </select>                            
                                    <label for="floatingInput">State</label>
                                    @error('State__c')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control bg-white @error('Zip__c') is-invalid @enderror" id="floatingInput" name="Zip__c" value="{{ $policyHolder->Zip__c }}" placeholder="placeholder@realty.com">
                                    <label for="floatingInput">ZIP Code</label>
                                    @error('Zip__c')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ 'Hello ' . $policyHolder->Name }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
