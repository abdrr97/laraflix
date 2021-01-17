@inject('markdown', 'Parsedown')
@php($markdown->setSafeMode(true))

@if(isset($reply) && $reply === true)
<li id="comment-{{ $comment->getKey() }}" class="comments__item comments__item comments__item--answer">
    @else
<li id="comment-{{ $comment->getKey() }}" class="comments__item">
    @endif
    <div class="comments__autor">
        <img class="comments__avatar" width="75px" src="{{ $comment->commenter->profile_image == 'avatar.png' ? asset('storage/' . $comment->commenter->profile_image)
            : asset('storage/users/' . $comment->commenter->id . '/images/' . $comment->commenter->profile_image) }}"
            alt=" Avatar">
        <span class="comments__name">{{ $comment->commenter->username ?? $comment->guest_name }}
            <strong
                class="badge badge-xs badge-warning">{{ $comment->commenter->hasRole('premium_user')? 'premium':''  }}</strong></span>
        <span class="comments__time">{{ $comment->created_at->diffForHumans() }}</span>
    </div>

    <p class="comments__text">
        {{ $comment->comment }}
    </p>

    <div class="comments__actions">
        <div class="comments__rate">
            @can('edit-comment', $comment)
            <button data-toggle="modal" data-target="#comment-modal-{{ $comment->getKey() }}"
                class="btn btn-sm btn-link text-primary text-uppercase">
                Edit
            </button>
            @endcan

            @can('delete-comment', $comment)
            <a href="{{ route('comments.destroy', $comment->getKey()) }}"
                onclick="event.preventDefault();document.getElementById('comment-delete-form-{{ $comment->getKey() }}').submit();"
                class="btn btn-sm btn-link text-danger text-uppercase">
                Delete
            </a>
            <form id="comment-delete-form-{{ $comment->getKey() }}"
                action="{{ route('comments.destroy', $comment->getKey()) }}" method="POST" style="display: none;">
                @method('DELETE')
                @csrf
            </form>
            @endcan
            {{-- <button type="button"><i class="icon ion-md-thumbs-up"></i>12</button>

                <button type="button">7<i class="icon ion-md-thumbs-down"></i></button> --}}
        </div>

        @can('reply-to-comment', $comment)
        <button type="button" data-toggle="modal" data-target="#reply-modal-{{ $comment->getKey() }}"
            class="btn btn-sm btn-link text-uppercase">
            <i class="icon ion-ios-share-alt"></i>Reply
        </button>
        @endcan
    </div>

    <div class="media-body">
        @can('edit-comment', $comment)
        <div class="modal fade" id="comment-modal-{{ $comment->getKey() }}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="POST" action="{{ route('comments.update', $comment->getKey()) }}">
                        @method('PUT')
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Comment</h5>
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="message">Update your message here:</label>
                                <textarea required class="form-control" name="message"
                                    rows="3">{{ $comment->comment }}</textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-outline-secondary text-uppercase"
                                data-dismiss="modal">
                                Cancel
                            </button>
                            <button type="submit" class="btn btn-sm btn-outline-success text-uppercase">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endcan

        @can('reply-to-comment', $comment)
        <div class="modal fade" id="reply-modal-{{ $comment->getKey() }}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="POST" action="{{ route('comments.reply', $comment->getKey()) }}">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Reply to Comment</h5>
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="message">Enter your message here:</label>
                                <textarea required class="form-control" name="message" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-outline-secondary text-uppercase"
                                data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-sm btn-outline-success text-uppercase">Reply</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endcan

        {{-- Recursion for children --}}
        @if($grouped_comments->has($comment->getKey()))
        @foreach($grouped_comments[$comment->getKey()] as $child)
        @include('comments::_comment', [
        'comment' => $child,
        'reply' => true,
        'grouped_comments' => $grouped_comments
        ])
        @endforeach
        @endif

    </div>
    @if(isset($reply) && $reply === true)
</li>
@else
</li>
@endif
