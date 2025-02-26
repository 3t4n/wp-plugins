import React, { useState } from 'react';
import { useSelector } from 'react-redux';
import {
  AppBar,
  Toolbar,
  Typography,
  Button,
  Popper,
  Paper,
  Box,
} from '@material-ui/core';
import { makeStyles } from '@material-ui/core';
import { Info as InfoIcon } from '@material-ui/icons';
import Notifications from './Notifications';

const useStyles = makeStyles((theme) => ({
  title: {
    flexGrow: 1,
    color: theme.palette.primary.main,
  },
  popper: {
    zIndex: 9999,
  },
  paper: {
    width: 300,
  },
}));

export default function Header() {
  const classes = useStyles();
  const {plugin} = useSelector((state) => state.global);
  const [anchorEl, setAnchorEl] = useState(null);
  const [open, setOpen] = useState(false);

  const handleClick = (event) => {
    setAnchorEl(event.currentTarget);
    setOpen(!open);
  };

  return (
    <AppBar position="static" color={'inherit'} elevation={1}>
      <Toolbar>
        <Typography variant="h6" className={classes.title}>{plugin.name}</Typography>
        <div>
          <Notifications />
          <Button onClick={handleClick}>
            <InfoIcon />
          </Button>
          <Popper
            open={open}
            anchorEl={anchorEl}
            transition
            placement="bottom-end"
            disablePortal={true}
            modifiers={{
              flip: {
                enabled: true,
              },
              preventOverflow: {
                enabled: false,
                boundariesElement: 'scrollParent',
              },
            }}
            className={classes.popper}
          >
            <Paper className={classes.paper}>
              <Box p={2}>
                <Typography variant={'subtitle1'}>{`What is ${plugin.name}?`}</Typography>
                <Typography variant={'body2'}>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aliquam dolores eum explicabo,
                  facilis inventore molestiae obcaecati officia perspiciatis praesentium quam quas quasi quia rem
                  reprehenderit sequi suscipit unde voluptatum?
                </Typography>
                <Typography>version: {plugin.version}</Typography>
                <Button size={'small'}>Got it!</Button>
              </Box>
            </Paper>
          </Popper>
        </div>
      </Toolbar>
    </AppBar>
  );
}
