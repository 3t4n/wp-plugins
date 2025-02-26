import React, { useEffect, useState } from 'react';
import { Link, useLocation } from 'react-router-dom';
import { List, ListItem, ListItemIcon, ListItemText } from '@material-ui/core';
import { withStyles } from '@material-ui/core';
import {
  Dashboard as DashboardIcon,
  Payment as PaymentIcon,
  Settings as SettingsIcon,
  Style as StyleIcon,
  AccountBalanceWallet as AccountBalanceWalletIcon,
  Code as CodeIcon,
  CreditCard as CreditCardIcon

} from '@material-ui/icons';
import { WPRequest } from "../http-common";


const SideNavIcon = ({selected, icon}) => {
  const props = {};

  if (!selected) {
    props.color = 'primary'
  } else {
    props.style = {
      color: '#ffffff80',
    }
  }


  return (
    <>{React.cloneElement(icon, props)}</>
  );
}

const menu = [
  {
    to: '/',
    text: 'Dashboard',
    icon: (selected) => <SideNavIcon selected={selected} icon={<DashboardIcon />} />,
    submenu: [],
    badge:''
  },
  {
    to: '/donations',
    text: 'Donations',
    icon: (selected) => <SideNavIcon selected={selected} icon={<AccountBalanceWalletIcon />} />,
    submenu: [],
    badge:''
  },
  {
    to: '/payments',
    text: 'Payments',
    icon: (selected) => <SideNavIcon selected={selected} icon={<PaymentIcon />} />,
    submenu: [],
    badge:''
  },
  {
    to: '/shortcodes',
    text: 'Shortcodes',
    icon: (selected) => <SideNavIcon selected={selected} icon={<CodeIcon />} />,
    submenu: [],
    badge:''
  },
  {
    to: '/appearance',
    text: 'Appearance',
    icon: (selected) => <SideNavIcon selected={selected} icon={<StyleIcon />} />,
    submenu: [],
    badge:''
  },
  {
    to: '/expired-cards',
    text: 'Expired Cards',
    icon: (selected) => <SideNavIcon selected={selected} icon={<CreditCardIcon />} />,
    submenu: [],
    badge: 0 //expiredCards.length
  },
  {
    to: '/settings',
    text: 'Settings',
    icon: (selected) => <SideNavIcon selected={selected} icon={<SettingsIcon />} />,
    submenu: [],
    badge:''
  },
 
];

const StyledListItem = withStyles((theme) => ({
  root: {
    '&$selected': {
      backgroundColor: theme.palette.primary.main,
      color: '#fff',
      '&:hover': {
        backgroundColor: theme.palette.primary.main,
      },
      '& .MuiListItemText-primary': {
        color: '#fff',
      },
    },
  },
  selected: {},
}))(ListItem);

const styles = {
    alignItems: 'center',
    justifyContent: 'space-between',
    display: 'flex',
    width: '130px'
}

export default function SideNav() {
  const location = useLocation(); 
  const [expiredCards, setExpiredCards] = useState([]);

  useEffect(async () => {
    const res = await WPRequest({action: "dydo_get_list_of_users"});    
    setExpiredCards(res.data)
  }, []);
  return (
    <List>
      {
        menu.map((item, key) => (
          <StyledListItem
            button
            component={Link}
            to={item.to}
            key={key}
            selected={item.to === location.pathname || location.pathname.startsWith(`${item.to}/`)}
          >
            <ListItemIcon>
              {(item.icon(item.to === location.pathname || location.pathname.startsWith(`${item.to}/`)))}
            </ListItemIcon>
            <ListItemText primaryTypographyProps={{ style: styles }}>{item.text} {
              item.to == '/expired-cards' && 
              <span className='dydo_badge_notification'>{expiredCards.length}</span>
            } </ListItemText>
          </StyledListItem>
        ))
      }
    </List>
  );
}
