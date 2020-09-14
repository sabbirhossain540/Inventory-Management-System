//Using for login sequrity check
class Notification{

	success(){
		new Noty({
		    type: 'success',
		    layout : 'topRight',
		    text: 'Successfully Done',
		    timeout: 1000,
		}).show();
	}


	alert(){
		new Noty({
		    type: 'alert',
		    layout : 'topRight',
		    text: 'Are you sure?',
		    timeout: 1000,
		}).show();
	}

	error(){
		new Noty({
		    type: 'alert',
		    layout : 'topRight',
		    text: 'Something Went Wrong',
		    timeout: 1000,
		}).show();
	}


	warning(){
		new Noty({
		    type: 'warning',
		    layout : 'topRight',
		    text: 'Oop! Wrong Something',
		    timeout: 1000,
		}).show();
	}


	image_validation(){
		new Noty({
		    type: 'error',
		    layout : 'topRight',
		    text: 'Upload Image Less than 1 MB Size',
		    timeout: 1000,
		}).show();
	}

}

export default Notification = new Notification();