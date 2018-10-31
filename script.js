/* My Script */

$(document).ready(function() {

	$(".show-comment-form").click(function() {
		toggleCommentForm();
	});

	$(".comments-box").on('click', '.show-reply-form', function(e) {
		e.preventDefault();

		var commentId = $(this).data("comment_id");
		toggleReplyForm(commentId);

		return false;
	});

	$(".comment-form").submit(function(e) {
		e.preventDefault();

		var url = $(this).attr('action');
		var form = $(this);
		var formData = $(this).serialize();

		$.post(url, formData, function(data) {
			$(".comments-box").html(data);
		}).done(function() {
			form[0].reset();
			$(".add-comment").hide();
		});

		return false;
	});

	$(".comments-box").on('submit', '.reply-form', function(e) {
		e.preventDefault();

		var url = $(this).attr('action');
		var commentId = $(this).data("comment_id");
		var form = $(this);
		var formData = $(this).serialize();

		$.post(url, formData, function(data) {
			$(".comments-box").html(data);
		}).done(function() {
			form[0].reset();
			$(".reply-" + commentId).hide();
		});

		return false;
	});
	
});

function toggleCommentForm() {
	$(".add-comment").toggle();
}

function toggleReplyForm(commentId) {
	$(".reply-" + commentId).toggle();
}