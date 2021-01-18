<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <select wire:change="$emit('companyChanged', $event.target.value)">
        @foreach($companies as $company)
        <option value="{{$company->id}}">{{$company->name}}</option>
        @endforeach
    </select>

    @if (count($posts) > 0)
        Posts for Tenant: {{Tenancy::getTenant()->id}} {{Tenancy::getTenant()->name}}
        <ul>
        @foreach($posts as $post)
            <li>{{$post->title}}</li>
        @endforeach
        </ul>
    @else
        <h1>No Posts!</h1>
    @endif
</div>
