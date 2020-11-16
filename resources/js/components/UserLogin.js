import React, { Component, Fragment } from 'react';
import logo from './images/logo.png';
import './css/App.css';
import './css/userLogin.css';
import { withStyles, makeStyles, Button, Input, InputLabel, InputAdornment, FormControl } from '@material-ui/core';
import { grey, red } from '@material-ui/core/colors';
import { Person, Lock } from '@material-ui/icons';

// const useStyles = makeStyles((theme) => ({
//   root: {
//     '& .MuiTextField-root': {
//       margin: theme.spacing(1),
//       width: '25ch',
//     },
//   },
// }));

const useStyles = makeStyles((theme) => ({
    margin: {
        margin: theme.spacing(1),
    },
}));

const BlackButton = withStyles((theme) => ({
    root: {
        color: theme.palette.getContrastText(grey[900]),
        padding: '10px 120px',
        backgroundColor: grey[900],
        '&:hover': {
            backgroundColor: grey[800],
        },

    },
}))(Button);

const RedButton = withStyles((theme) => ({
    root: {
        color: theme.palette.getContrastText(red[500]),
        padding: '10px 100px',
        backgroundColor: red[500],
        '&:hover': {
            backgroundColor: red[700],
        },
    },
}))(Button);




function UserLogin() {

    const classes = useStyles();

    return (
      <Fragment>
      <div className="container">
          <div className="row justify-content-center">
              <div className="col-md-8">
                  <div className="card">
                      <div className="card-header">Example Component</div>

                      <div className="card-body">I'm an example component!</div>
                  </div>
              </div>
          </div>
      </div>
      </Fragment>
  );



    );
}

export default UserLogin;

if (document.getElementById('root')) {
    ReactDOM.render(<UserLogin />, document.getElementById('root'));
}
