<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Hello!
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="display-6">Active Certificates</h5>
                        <h1 class="display-5">{{ $activeCertificates }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 col-lg-4">
                <div class="card text-white bg-info mb-3">
                    <div class="card-body">
                        <h5 class="display-6">Upcoming Renewals</h5>
                        <h1 class="display-5">{{ $upcomingRenewals }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
