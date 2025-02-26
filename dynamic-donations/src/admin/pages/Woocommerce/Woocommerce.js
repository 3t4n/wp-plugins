import React from 'react';
import {
  Grid,
  Paper,
  Box,
  Divider,
  Typography,
  Button
} from '@material-ui/core';
import {Layout} from '../../layouts';



export default function Woocommerce() {
  return (
    <Layout title={'Payment Gateway - Woocommerce'}>
      <Grid container spacing={3}>
        <Grid item xs={12} md={8}>
          <Paper>
            <Box p={2}>
              <Typography gutterBottom variant={'h6'}>Settings:</Typography>
              <Divider light />
              <Box py={2}>

              </Box>
              <Divider light />
              <Box mt={2} align={'right'}>
                <Button variant={'contained'} color={'primary'}>Save</Button>
              </Box>
            </Box>
          </Paper>
        </Grid>
        <Grid item xs={12} md={4}>
          <Paper>
            <Box p={2}>
              <Typography gutterBottom variant={'h6'}>Description:</Typography>
              <Typography variant={'body2'}>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur dolore impedit nostrum odit quam repellendus tenetur! Assumenda laborum neque numquam pariatur rem repudiandae voluptas. Assumenda doloremque nam quo repellendus totam!</Typography>
              <Box my={2}>
                <Divider light />
              </Box>
              <Typography gutterBottom variant={'h6'}>Shortcodes:</Typography>
              <Typography>[dydo_woocommerce]</Typography>
            </Box>
          </Paper>
        </Grid>
      </Grid>
    </Layout>
  );
}
