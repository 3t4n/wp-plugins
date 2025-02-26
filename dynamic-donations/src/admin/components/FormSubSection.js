import React from 'react';
import PropTypes from 'prop-types';
import {
  Box,
  Divider,
  Typography,
} from '@material-ui/core';

const FormSubSection = (props) => {
  const {
    children,
    title,
    description
  } = props;

  return (
    <>
      {
        title && (
          <>
            <Box p={2} style={{background: '#f6f8fb'}}>
              <Typography variant={'subtitle1'}>
                <Box fontWeight={'fontWeightNormal'}>{title}</Box>
              </Typography>
              {description && (<Typography variant="body2">{description}</Typography>)}
            </Box>
            <Divider />
          </>
        )
      }
      <Box px={2} py={3}>
        {children}
      </Box>
      <Divider />
    </>
  );
}

FormSubSection.propTypes = {
  children: PropTypes.node,
  title: PropTypes.string,
  description: PropTypes.string
}

export default FormSubSection;
