import React, { useEffect, useRef, useState } from 'react';
import { Link } from 'react-router-dom';
import { useSelector } from 'react-redux';
import { useSnackbar } from 'notistack';
import {
  Badge,
  Box,
  Button, IconButton,
  List,
  ListItem,
  ListItemSecondaryAction,
  ListItemText,
} from '@material-ui/core';
import { Notifications as NotificationsIcon, Settings as SettingsIcon } from '@material-ui/icons';
import Popover from '@material-ui/core/Popover';
import PopupState, { bindTrigger, bindPopover } from 'material-ui-popup-state';

const Notifications = () => {
  const buttonEl = useRef(null);
  const { enqueueSnackbar } = useSnackbar();
  const {plugin} = useSelector((state) => state.global);
  const [items, setItems] = useState([]);

  useEffect(() => {
    if (plugin.options.stripePK === '' || plugin.options.stripeSK === '') {
      setItems([...items, {
        id: 'stripe-credentials',
        description: 'Missing stripe credentials',
        url: '/payments/stripe'
      }]);
    } else {
      setItems([...items.filter((item) => item.id !== 'stripe-credentials')])
    }
  }, [plugin.options]);

  return (
    <PopupState variant="popover" popupId="notifications-popup-popover">
      {(popupState) => (
        <>
          <Button {...bindTrigger(popupState)} ref={buttonEl}>
            <Badge color={items.length > 0 ? 'secondary' : 'default'} variant="dot">
              <NotificationsIcon />
            </Badge>
          </Button>
          <Popover
            {...bindPopover(popupState)}
            anchorOrigin={{
              vertical: 'bottom',
              horizontal: 'right',
            }}
            transformOrigin={{
              vertical: 'top',
              horizontal: 'right',
            }}
            anchorEl={buttonEl.current}
            hidden={items.length === 0}
          >
            <Box py={1} px={1}>
              <List>
                {
                  items.map((item) => (
                    <ListItem key={item.id} style={{ paddingRight: '60px' }}>
                      <ListItemText primary={item.description} />
                      <ListItemSecondaryAction>
                        <IconButton edge="end" component={Link} to={item.url}>
                          <SettingsIcon />
                        </IconButton>
                      </ListItemSecondaryAction>
                    </ListItem>
                  ))
                }
              </List>
            </Box>
          </Popover>
        </>
      )}
    </PopupState>
  );
}

export default Notifications;
