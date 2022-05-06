@if ($data->count() > 0)
<div class="blog">
    <h3>Blog</h3>
    <div class="panel-body">
        <ul class="blog">
            @foreach ($data as $news)
            <li>
                <a href="{{ $news->link }}" title="{{ $news->title }}">{{ $news->title }}</a>
            </li>
            @endforeach
        </ul>
    </div>
</div>    
@endif
