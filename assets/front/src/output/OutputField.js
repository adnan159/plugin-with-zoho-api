import React, { useState, useEffect } from 'react';
import { makeStyles } from '@material-ui/core/styles';
import Table from '@material-ui/core/Table';
import TableBody from '@material-ui/core/TableBody';
import TableCell from '@material-ui/core/TableCell';
import TableContainer from '@material-ui/core/TableContainer';
import TableHead from '@material-ui/core/TableHead';
import TableRow from '@material-ui/core/TableRow';
import Paper from '@material-ui/core/Paper';
import { TextField, Box, Button } from '@material-ui/core';

const useStyles = makeStyles({
  table: {
    minWidth: 650,
  },
});

export default function OutputField() {
  const classes = useStyles();
  const [empBio, setempBio] = useState([]);

  function handleRefresh(event) {

    let data = {
      'action': 'zoho_output_action'
    };

    jQuery.post(output_ajax_object.ajax_url, data, (response) => {
      let bio_info = response.data.data;
      setempBio(bio_info);
    });
  }

  return (
    <TableContainer component={Paper}>
      <Table className={classes.table} aria-label="simple table">
        <TableHead>
          <TableRow>
            <TableCell>Company Name</TableCell>
            <TableCell align="right">Last Name</TableCell>
            <TableCell align="right">First Name</TableCell>
            <TableCell align="right">Email</TableCell>
            <TableCell align="right">State </TableCell>
          </TableRow>
        </TableHead>
        <TableBody>
          {empBio.map((row) => (
            <TableRow key={row.Company}>
              <TableCell component="th" scope="row">
                {row.Company}
              </TableCell>
              <TableCell align="right">{row.Last_Name}</TableCell>
              <TableCell align="right">{row.First_Name}</TableCell>
              <TableCell align="right">{row.Email}</TableCell>
              <TableCell align="right">{row.State}</TableCell>
            </TableRow>
          ))}
        </TableBody>
      </Table>
      <Button onClick={handleRefresh} variant="contained" color="primary" type="submit" fullWidth > Refresh </Button>
    </TableContainer>
  );
}