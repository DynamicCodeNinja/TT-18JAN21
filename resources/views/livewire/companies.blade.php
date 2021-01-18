<div>
    <ul>
    @foreach($companies as $company)
        <li>{{$company->name}} - <a href="{{route('company.posts', ['company' => $company->id])}}"><button>VIEW POSTS</button></a></li>
    @endforeach
    </ul>
</div>
