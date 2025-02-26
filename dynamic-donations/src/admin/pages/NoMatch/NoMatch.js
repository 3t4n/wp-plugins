import React from 'react';

import {Layout} from '../../layouts';



import { Typography } from '@material-ui/core';
import { LinkOff as SentimentDissatisfiedIcon } from '@material-ui/icons';

export default function NoMatch() {
  return (
    <Layout>
      <SentimentDissatisfiedIcon style={{fontSize: 60}} />
      <Typography variant={'h4'}>Link not found</Typography>
    </Layout>
  );
}
