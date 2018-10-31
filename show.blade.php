<div class="comment comment-{{ $comment->id }} lv{{ $comment->getLevel() }}">
	<p><small>On <span class="comment-date">{{ $comment->post_date }}</span> at <span class="comment-time">{{ $comment->post_time }} (UTC)</span>, <span class="comment-author">{{ $comment->author }}</span> wrote</small></p>
	<p>{{ $comment->body }}</p>
	@if($comment->getLevel() != 3)
		<a href="#" class="show-reply-form" data-comment_id="{{ $comment->id }}">Reply</a>
		<div class="reply reply-{{ $comment->id }}">
			<form action="/comment/{{ $comment->id }}"  class="reply-form" data-comment_id="{{ $comment->id }}">
				{{ csrf_field() }}
				<div class="form-group">
					<input 
						type="text" 
						name="author" 
						class="form-control" 
						placeholder="Your Name" 
						required>
					<textarea 
						name="body" 
						cols="20" 
						rows="5" 
						class="form-control" 
						placeholder="Comment" 
						required></textarea>
					<input type="submit" class="form-control btn btn-sm">
				</div>
			</form>
		</div>
	@endif
</div>