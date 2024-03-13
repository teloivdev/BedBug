<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Property Management Company</th>
                        <th scope="col">Commision Amount</th>
                        <th scope="col">Number Of Certificates</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($policies as $p)
                        <tr>
                            <th scope="row">{{ $loop->index + 1}}</th>
                            <td>{{ $p->Name }}</td>
                            <td>${{ number_format($p->Commission_Amount__c) }}</td>
                            <td>{{ count($p->certificates) }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $policies->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
