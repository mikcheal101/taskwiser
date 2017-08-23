const express 		= require('express');
const bodyParser	= require('body-parser');
const cookieParser 	= require('cookie-parser');
const mysql 		= require('mysql2-bluebird')();
const passport 		= require('passport');
const localPass		= require('passport-local');
const path 			= require('path');

const app 			= express();
const router 		= express.Router();

var admin = require('./routes/admin')(router, passport);

app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: false }));
app.use(cookieParser());
app.use(express.static(path.join(__dirname, '../adminBackend')));
app.use(session({secret: 'JBUVuyvhgvhGVndkjsnfksjvnHJY&890987gNKBByu', saveUninitialized: true, resave:true}));
app.use(passport.initialize());
app.use(passport.session());

app.use('/api', admin)(router, passport);

/* catch 404 and forward to error handler
app.use(function(req, res, next) {
  var err = new Error('Not Found');
  err.status = 404;
  next(err);
});
*/

// error handler
app.use(function(err, req, res, next) {
  // set locals, only providing error in development
  res.locals.message = err.message;
  res.locals.error = req.app.get('env') === 'development' ? err : {};

  // render the error page
  res.status(err.status || 500);
  res.render('error');
});

module.exports = app;
