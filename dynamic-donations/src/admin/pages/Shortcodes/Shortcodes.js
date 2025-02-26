import React from 'react';
import {Layout} from '../../layouts';


import { Box } from '@material-ui/core';
import ShortcodesSection from './components/ShortcodesSection';

export default function Shortcodes() {
    return (
      <Layout>
        <Box mt={5}>
          <ShortcodesSection />
        </Box>
      </Layout>
    );
  }