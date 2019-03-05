<div class="container list">
    <div class="row">
        <ul class="list-unstyled col-md-10 offset-md-1">
            @forelse($posts as $post)
            <li class="media">
                @if($post->page_image)
                <a class="media-left mr-3" href="{{ url($post->slug) }}">
                    <img alt="{{ $post->slug }}" src="{{ $post->page_image }}" data-holder-rendered="true">
                </a>
                @endif
                <div class="media-body">
                    <h6 class="media-heading">
                        <a href="{{ url($post->slug) }}">
                            {{ $post->title }}
                        </a>
                    </h6>
                    <div class="meta">
                        <span class="cinema">{{ $post->subtitle }}</span>
                    </div>
                    <div class="description">
                        {{ $post->meta_description }}
                    </div>
                    <div class="extra">
                        @foreach($post->tags as $tag)
                        <a href="{{ url('tag', ['tag' => $tag->tag]) }}">
                            <div class="label"><i class="fas fa-tag"></i>{{ $tag->tag }}</div>
                        </a>
                        @endforeach

                        <div class="info">
                            <i class="fa fa-user" aria-hidden="true"></i>{{ $post->user->name ?? 'null' }}&nbsp;,&nbsp;
                            <i class="fa fa-clock-o" aria-hidden="true"></i>{{ $post->published_at}}&nbsp;,&nbsp;
                            <i class="fa fa-eye" aria-hidden="true"></i>{{ $post->view_count }}
                            <a href="{{ url($post->slug) }}" class="float-right">
                                Read More <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </li>
            @empty
                <h3 class="text-center">{{ lang('Nothing') }}</h3>
            @endforelse
        </ul>
    </div>
</div>