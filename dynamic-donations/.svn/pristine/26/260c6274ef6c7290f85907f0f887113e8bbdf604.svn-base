import React from 'react';
import PropTypes from 'prop-types';
import styled from 'styled-components';

const TextWrap = styled.div``;

const Title = styled.h6`
  text-align: center;

  @media only screen and (min-width: 48em) {
    text-align: ${({ textAlign }) => textAlign};
  }
`;

const Paragrapgh = styled.p`
  text-align: center;
  font-weight: lighter;

  @media only screen and (min-width: 48em) {
    text-align: ${({ textAlign }) => textAlign};
  }
`;

const PaymentResumeText = props => {
  const {
    title,
    paragraph,
    textAlign = 'center'
  } = props;

  return (
    <TextWrap>
      <Title textAlign={textAlign}>{title}</Title>
      <Paragrapgh textAlign={textAlign}>{paragraph}</Paragrapgh>
    </TextWrap>
  );
};

PaymentResumeText.propTypes = {
  title: PropTypes.string.isRequired,
  paragraph: PropTypes.any,
};

export default PaymentResumeText;
