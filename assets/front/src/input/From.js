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
    firstName : '',
    lastName  : '',
    position : '',
    email : '',
    contactNumber: ''
  });

  return (
    <Box style={ { backgroundColor: '#cfe8fc' } } height="100%" width="75vh" p={2}>
      <form className={classes.root} >
        <TextField id="standard-basic" 
          label="First Name" 
          value = {bio.firstName}
          onChange = {(e) => setBio({...bio, firstName: e.target.value})}
        />
        <TextField id="standard-basic" 
          label="Last Name" 
          value = {bio.lastName}
          onChange = {(e) => setBio({...bio, lastName: e.target.value})}
        />
        <TextField id="standard-basic" 
          label="Position" 
          value={bio.position}
          onChange = {(e) => setBio({...bio, position: e.target.value})}
        />
        <TextField id="standard-basic" 
          label="Email" 
          value={bio.email}
          onChange = {(e) => setBio({...bio, email: e.target.value})}
        />
        <TextField id="standard-basic" 
          label="Contact Number"
          value={bio.contactNumber}
          onChange = {(e) => setBio({...bio, contactNumber: e.target.value})}
        />
        <Button variant="contained" color="primary">
          Save
        </Button>
      </form>
    </Box>
  );
}

