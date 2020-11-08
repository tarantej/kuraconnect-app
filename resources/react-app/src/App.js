import React, {Component, Fragment} from 'react';
import logo from './images/logo.png';
import './css/App.css';
import './css/userLogin.css';
import { Container, TextField, makeStyles, Button } from '@material-ui/core';

// const useStyles = makeStyles((theme) => ({
//   root: {
//     '& .MuiTextField-root': {
//       margin: theme.spacing(1),
//       width: '25ch',
//     },
//   },
// }));




function App() {

  // const classes = useStyles();
    return ( 
      <Fragment>
      {/* <div className="App"> */}
      {/* <header className="App-header"> */}
        {/* <img src={logo} className="App-logo" alt="logo" /> */}
      {/* <p>Edit <code>src/App.js</code> and save to reload.</p> */}
    {/* <a className="App-link" href="https://reactjs.org" target="_blank" rel="noopener noreferrer">Learn React</a> */}
  {/* </header> */}
    {/* </div> */}

<div>

  <main class="MuiContainer-root MuiContainer-maxWidthXs">
   
      <div className="jss1">
          <img src={logo} className="logo2" alt="logo" />
      </div>
      <div class="userLogin">
      <form class="jss3" noValidate autoComplete="off">

      </form>
    </div>
      
  
  </main>
<Container maxWidth="sm" />


  <form className="userLogin jss3" noValidate autoComplete="off">

  <div class="MuiInputBase-root MuiOutlinedInput-root MuiInputBase-fullWidth MuiInputBase-formControl">
  <input type="text" aria-invalid="false" autocomplete="text" autofocus="" id="username" name="username" required="" class="MuiInputBase-input MuiOutlinedInput-input" value="" />
  <fieldset aria-hidden="true" class="jss5 MuiOutlinedInput-notchedOutline">
    <legend class="jss7">
      <span>Username&nbsp;*</span>
      </legend>
      </fieldset>
  </div>

  <div class="MuiInputBase-root MuiOutlinedInput-root MuiInputBase-fullWidth MuiInputBase-formControl">
  <input type="password" aria-invalid="false" autocomplete="password" autofocus="" id="password" name="password" required="" class="MuiInputBase-input MuiOutlinedInput-input" value="" />
  <fieldset aria-hidden="true" class="jss5 MuiOutlinedInput-notchedOutline">
    <legend class="jss7">
      <span>Password&nbsp;*</span>
      </legend>
      </fieldset>
  </div>


  <TextField required id="username" name="username" label="Username" type="text" />

  <TextField required id="password" name="password" label="Password" type="password" />

  
    </form>
</div>

</Fragment>

    );
}

export default App;