$(document).ready(function() {
    timestamp = 0;
    updateMsg();
    hideLoading();
    $("form#shoutbox").submit(function() {
	showLoading();
	$.post("/shoutbox2/backend", {
	    message : $("#content").val(),
	    name : $("#name").val(),
	    action : "postmsg",
	    time : timestamp
	}, function(xml) {
	    addMessages(xml);
	    $("#content").val("");
	    hideLoading();
	    $("#content").focus();
	});
	return false;
    });

    $("#content").focus(function() {
	// edit as you choose
	    $(this).text('');
	});
    $("#name").focus(function() {
	if ($(this).val() == 'Name') {
	    // edit as you choose
	    $(this).val('');
	}
    });

});

function rmContent() {

}

function showLoading() {
    $("#contentLoading").show();
    $("#txt").hide();
    $("#author").hide();
}

function hideLoading() {
    $("#contentLoading").hide();
    $("#txt").show();
    $("#author").show();
}

function addMessages(xml) {
    if ($("status", xml).text() == "2")
	return;
    timestamp = $("time", xml).text();
    $("message", xml).each(
	    function(id) {
		message = $("message", xml).get(id);
		$("#messages").prepend(
			"<dt>" + $("author", message).text() + " <span id=\"timestamp\"> : </span>" + $("timestamp", message).text() + "</strong></dt>" + "<dd>"
				+ $("text", message).text() + "</dd>");
	    });

}

function updateMsg() {
    $.post("/shoutbox2/backend", {
	time : timestamp
    }, function(xml) {
	$("#loading").remove();
	addMessages(xml);
    });
    setTimeout('updateMsg()', 10000);
}
