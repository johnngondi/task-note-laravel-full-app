
$(document).ready(function () {
	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	});

	$('#sign-up-form').submit(function () {
		let nameEl = $('#name');
		let emailEl = $('#email');
		let passwordEl = $('#password');
		let confirmEl = $('#confirm');

		if (
			!checkEl(nameEl) ||
			!checkEl(emailEl) ||
			!checkEl(passwordEl) ||
			!checkEl(confirmEl)
		){
			return false;
		}

		if (!isEmail(emailEl.val())){
			emailEl.addClass('is-invalid')

			return false;
		} else {
			emailEl.removeClass('is-invalid');
		}

		if (passwordEl.val() !== confirmEl.val()){
			confirmEl.addClass('is-invalid');

			return false;
		} else {
			confirmEl.removeClass('is-invalid');
		}

		let btnSave = $('#btn-save');
		btnSave.addClass('lose-focus');
		btnSave.html("<i class='fa fa-spinner circular'></i> Registering...");

		return true;
	});


	$('#sign-in-form').submit(function () {
		let emailEl = $('#email');
		let passwordEl = $('#password');

		if (
			!checkEl(emailEl) ||
			!checkEl(passwordEl)
		){
			return false;
		}

		let btnSave = $('#btn-save');
		btnSave.addClass('lose-focus');
		btnSave.html("<i class='fa fa-spinner circular'></i> Signing in...");

		return true;
	});

	$('#add-form').submit(function () {
		let titleEl = $('#title');

		if (!checkEl(titleEl)){
			return false;
		}

		let btnSave = $('#btn-save');
		btnSave.addClass('lose-focus');
		btnSave.html("<i class='fa fa-spinner circular'></i> Saving...");

		return true;

	});

	$('#add-note-form').submit(function () {
		const titleEl = $('#title');
		const bodyEl = $('#body');

		if (!checkEl(titleEl) || !checkEl(bodyEl)){
			return false;
		}

		let btnSave = $('#btn-save');
		btnSave.addClass('lose-focus');
		btnSave.html("<i class='fa fa-spinner circular'></i> Saving...");

		return true;
	});
});

let activeTimer = null;

function checkEl(el) {
	let val = el.val();
	if (val === '') {
		el.addClass('is-invalid');
		return false;
	} else {
		el.removeClass('is-invalid');
		return true;
	}
}

function updateTaskColor(color) {

	let completeTaskEl = $('.complete-task');
	let btnAddTaskEl = $('#btn-add-task');
	let btnSaveEl = $('#btn-save');
	let btnShowTaskEl = $('#btn-show-task');
	let titleEl = $('#title');
	let form = $('#update-task-list-form');

	completeTaskEl.removeClass('text-' + taskCompleteCurrentColor);
	completeTaskEl.addClass('text-' + color);

	btnAddTaskEl.removeClass('btn-' + taskCompleteCurrentColor);
	btnAddTaskEl.addClass('btn-' + color);

	btnSaveEl.removeClass('btn-' + taskCompleteCurrentColor);
	btnSaveEl.addClass('btn-' + color);

	btnShowTaskEl.removeClass('btn-outline-' + taskCompleteCurrentColor);
	btnShowTaskEl.addClass('btn-outline-' + color);

	titleEl.removeClass('border-' + taskCompleteCurrentColor);
	titleEl.addClass('border-' + color);

	taskCompleteCurrentColor = color;

    $.post($(form).attr("action"), $(form).serialize(), function(data) {
        console.log(data);
        showToast('Task List Color Updated');
    });

}

function showTask(task,created,completed) {
	$('#task-info').html(task);
	$('#task-date').html(created);
	if (completed === ''){
		$('#task-completed').text('Not Done');
	} else {
		$('#task-completed').text('Done');
	}

	$('#taskModal').modal('show');
}

function markTaskAsDone(id) {
    let form = $('#complete-task-form');
    $(form).prop('action',"/tasks/"+id);

    $.post($(form).attr("action"), $(form).serialize(), function(data) {
        console.log(data);
        showToast('Task Marked as Complete');
        $('#task-body-' + id).addClass('complete-task line-through text-' + taskCompleteCurrentColor);
        $('#task-body-' + id).removeClass('tapable');
        $('#task-check-complete-' + id).addClass('d-none');
        $('#task-delete-' + id).addClass('d-none');
    });

}

function deleteList(id, list) {
    $('#confirm-modal-title').html("<i class='fa fa-question-circle'></i> Delete Task List?");
    $('#confirm-modal-title').addClass("text-danger");

    $('#confirm-modal-body').html("Are you sure you want to delete <strong>" + list + "</strong> Tasks List? " +
        "This will delete all the tasks in this List too.");

    $('#btn-confirm-modal-confirm').html("<i class='fa fa-trash-alt'></i> Delete List");
    $('#btn-confirm-modal-confirm').addClass("btn-danger");
    $('#btn-confirm-modal-confirm').attr("onclick", "confirmDeleteList(" + id + ")");

    $('#confirmModal').modal('show');
}

function confirmDeleteList(id) {
    $('#confirmModal').modal('hide');
    $('#id').val(id);
    $('#delete-form').prop("action","/tasks-lists/" + id);
    $('#delete-form').submit();
}

function deleteTask(id) {
    $('#id').val(id);
    let form = $('#delete-form');

    showToast('Task Deleted. You can undo!', 'ok', 5000, true);

    activeTimer = setTimeout(function () {
        $('#task-' + id).slideUp();
        $.post($(form).attr("action"), $(form).serialize(), function(data) {
            console.log(data);
        });

    }, 5000);
}

function deleteNote(id, title) {

    $('#confirm-modal-title').html("<i class='fa fa-question-circle'></i> Delete Note?");
    $('#confirm-modal-title').addClass("text-danger");

    $('#confirm-modal-body').html("Are you sure you want to delete <strong>" + title + "</strong> Note?");

    $('#btn-confirm-modal-confirm').html("<i class='fa fa-trash-alt'></i> Delete Note");
    $('#btn-confirm-modal-confirm').addClass("btn-danger");
    $('#btn-confirm-modal-confirm').attr("onclick", "confirmDeleteNote(" + id + ")");

    $('#confirmModal').modal('show');
}

function confirmDeleteNote(id) {
    $('#confirmModal').modal('hide');
    $('#id').val(id);
    $('#delete-form').submit();
}

function deleteAccount() {

    $('#confirm-modal-title').html("<i class='fa fa-question-circle'></i> Delete your Account?");
    $('#confirm-modal-title').addClass("text-danger");

    $('#confirm-modal-body').html("Are you sure you want to delete your Account? " +
        "This is <strong>NOT Reversible</strong>! It will also delete all your <strong>Tasks</strong> and <strong>Notes</strong> permanently.");

    $('#btn-confirm-modal-confirm').html("<i class='fa fa-trash-alt'></i> Delete Account");
    $('#btn-confirm-modal-confirm').addClass("btn-danger");
    $('#btn-confirm-modal-confirm').attr("onclick", "confirmDeleteUser()");

    $('#confirmModal').modal('show');
}

function confirmDeleteUser() {
    $('#confirmModal').modal('hide');
    $('#delete-account-form').submit();
}


/*
* Helper methods
*/

function undo() {
	clearTimeout(activeTimer);
	showToast('Undo Successful');
}

function isEmail(value) {
	let emailReg = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
	return emailReg.test(value);
}

function showToast(text, type='ok', timeout=3000, undo=false) {
    let myToast = $('#myToast');

    if (type === 'ok'){
        $('#toast-status').html("<i class='fa fa-check-circle text-success'>");
        $('#toast-title').text('Success!');
    } else {
        $('#toast-status').html("<i class='fa fa-exclamation-circle text-danger'>");
        $('#toast-title').text('Error!');
    }

    if (undo === true){
        $('#btn-undo').removeClass('d-none');
    } else {
        $('#btn-undo').addClass('d-none');
    }


    $(myToast).attr('data-delay', timeout);
    $('#toast-body').text(text);

    $(myToast).toast('show');
}

function goTo(path) {
    location.href = path;
}
