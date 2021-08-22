import React, { useState } from 'react';
import { createStyles, makeStyles, Theme } from '@material-ui/core/styles';
import { TextField, Box, Button } from '@material-ui/core';

const useStyles = makeStyles((theme, Theme) =>
  createStyles({
    root: {
      '& > *': {
        margin: theme.spacing(1),
        width: '50ch',
      },
    },
  }),
);

export default function From() {
  const classes = useStyles();

  const [bio, setBio] = useState({
    Company : '',
    Last_Name  : '',
    First_Name : '',
    Email : '',
    State: ''
  });

  function handleSubmit(event) {
    event.preventDefault();

    let data = {
      'action': 'zoho_from_action',
      'bio': bio    
    };

    jQuery.post(input_ajax_object.ajax_url, data, (response) => {
    });
  }

  return (
    <Box style={ { backgroundColor: '#cfe8fc' } } height="100%" width="75vh" p={2}>
      <form method="post"  className={classes.root} onSubmit={handleSubmit}>
        <TextField id="standard-basic" 
          label="Company" 
          value = {bio.Company}
          onChange = {(e) => setBio({...bio, Company: e.target.value})}
        />
        <TextField id="standard-basic" 
          label="Last Name" 
          value = {bio.Last_Name}
          onChange = {(e) => setBio({...bio, Last_Name: e.target.value})}
        />
        <TextField id="standard-basic" 
          label="First Name" 
          value={bio.First_Name}
          onChange = {(e) => setBio({...bio, First_Name: e.target.value})}
        />
        <TextField id="standard-basic" 
          label="Email" 
          value={bio.Email}
          onChange = {(e) => setBio({...bio, Email: e.target.value})}
        />
        <TextField id="standard-basic" 
          label="State"
          value={bio.State}
          onChange = {(e) => setBio({...bio, State: e.target.value})}
        />
        <Button variant="contained" color="primary" type="submit"> Save </Button>
      </form>
    </Box>
  );
}

