
var Admin = (app) {
	
	var _router 	= app.router;
	var _passport 	= app.passport;
	var _mysql 		= app.mysql;
	
	// set response
	let response = {
		status: 200,
		message:null,
		data: []
	};

	// Error Handling
	var sendError = (err, res) => {
		response.status = 501;
		response.message = typeof err == 'object' ? err.message : err;
		res.status(response.status).json(response);
	};
	
	_router.get('/testing', (req, res) => {
		response.message = "hello";
		res.json(response);
	});
	
	return _router;
};

modules.export = Admin;