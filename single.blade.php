@extends('layouts.master')

@section('content')
	@if($post)
		<h1><u>{{ $post->title }}</u></h1>
		<p>{!! $post->body !!}</p>
		<hr>
		<section class="comments">
			<h3>Comments</h3>
			<button class="show-comment-form btn btn-primary">Add a Comment</button>
			<div class="add-comment">
				<form action="/post/{{ $post->id }}/comments" class="comment-form">
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
			@if($comments->count() > 0)
				<div class="comments-box">
					@include('comments.index', ['comments' => $comments])
				</div>
			@else
				<p>No comments yet.</p>
			@endif
		</section>
	@else
		<h2>We're sorry!</h2>
		<p>There was an error loading that post.</p>
	@endif
@stop