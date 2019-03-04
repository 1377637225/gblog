<div class="container">
    <div class="row">
        <ul class="list-unstyled col-md-10 offset-md-1">
            @forelse ($posts as $post)
                <li class="media">
                    @if ($article->page_image)
                        <a href="media-left mr-3" href="{{ url($post->slug) }}">
                            <img src="{{ $post->page_image }}" alt="{{ $post->slug }}">
                        </a>
                    @endif
                    <div class="media-body">
                        <h6 class="media-heading">
                            <a href="{{ url($post->slug) }}">
                                {{ $post->title }}
                            </a>
                        </h6>
                        <div class="meta">
                            <span class="cinema">
                                {{ $post->subtitle }}
                            </span>
                        </div>
                        <div class="description">
                            {{ $post->meta_description }}
                        </div>
                        <div class="extra">
                            @foreach ($post->tags as $tag)
                                <a href="{{ url('tag', ['tag' => $tag->tag]) }}">
                                    <div class="label"><i class="fa fa-tag" aria-hidden="true">{{ $tag->tag }}</i></div>
                                </a>
                            @endforeach
                            <div class="info">
                                <i class="fa fa-user"></i>{{ $post->user->name ?? 'null' }}
                                <i class="fa fa-clock"></i>{{ $post->published_at ?? }}
                                <i class="fa fa-eye"></i>{{ $post->view_count }}
                                <a href="{{ url($post->slug) }}" class="float-right">
                                    Read More  <i class="fa fa-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
            @empty
                <h3 class="text-center">whoops...Nothing here!</h3>
            @endforelse
        </ul>
    </div>
</div>